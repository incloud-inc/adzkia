<?php

namespace Database\Seeders\Data;

class MatematikaGrade6ASASSemester1Data
{
    /**
     * Data bundle asesmen Kelas 6 SD Kurikulum Merdeka Fase C.
     */
    public static function getAssessments(): array
    {
        return [
            [
                'title' => 'Asesmen Sumatif Akhir Semester (ASAS) 1 Matematika Kelas 6 (Paket A)',
                'type' => 'exam',
                'description' => 'Asesmen Sumatif Akhir Semester 1 mata pelajaran Matematika Kelas 6 Fase C Kurikulum Merdeka Paket A. Menguji capaian komprehensif Semester 1 (Bab 1 Pecahan & Desimal, Bab 2 Rasio & Skala, Bab 3 Lingkaran). Berbobot 40:30:30 skala 100.',
                'duration_minutes' => 90,
                'sections' => [
                    [
                        'title' => 'Bagian 1: Objektif Beragam (Pilihan Ganda, Pilihan Ganda Kompleks, Menjodohkan, Benar-Salah)',
                        'instructions' => 'Pilihlah dan jawablah soal-soal objektif berikut secara cermat dan teliti.',
                        'order' => 1,
                        'question_groups' => [
                            ['title' => 'Stimulus 1 (Paket A): Proyek Pembangunan Kolam Renang dan Taman Rekreasi', 'content' => '[Keterangan Gambar: Denah arsitektur kawasan taman rekreasi air berskala 1 : 500: Kolam renang melingkar dengan diameter 14 meter dan area pujasera persegi panjang berukuran 20 m x 15 m.]
Pemerintah daerah membangun kawasan sarana rekreasi terpadu di atas lahan seluas 1.500 m². Proyek ini mengintegrasikan fasilitas kolam renang anak berbentuk lingkaran dan area pujasera kuliner sehat.

Pada lembar denah arsitektur berskala 1 : 500, kolam renang digambar berbentuk lingkaran berdiameter 2,8 cm. Jarak dan ukuran sebenarnya dihitung dengan skala 500: Diameter sebenarnya kolam = 2,8 cm x 500 = 1.400 cm = 14 meter (jari-jari r = 7 meter). Luas kolam renang adalah L = 22/7 x 7 x 7 = 154 m², dan keliling kolam adalah K = 2 x 22/7 x 7 = 44 meter. Area pujasera berukuran 20 meter x 15 meter memiliki luas 300 m². Sebanyak 2/5 bagian dari total lahan 1.500 m² (yaitu 600 m²) dibangun taman bunga dan gazebo santai. Sisa lahan dialokasikan untuk area parkir kendaraan ramah lingkungan. Perhitungan pecahan, skala denah, dan geometri lingkaran bekerja sama menyukseskan proyek publik ini.'],
                            ['title' => 'Stimulus 2 (Paket A): Pengangkutan Komoditas Perkebunan Kopi dan Rasio Hasil', 'content' => '[Keterangan Gambar: Truk angkutan hasil bumi menimbang biji kopi arabika di pabrik pengolahan: Papan timbangan mencatat berat panen gabah kopi dan perbandingan hasil sortasi kualitas ekspor.]
Koperasi Petani Kopi "Lembah Asri" mengangkut 6 ton (6.000 kg) gelondong buah kopi merah hasil panen raya dari perkebunan pegunungan. Dalam proses pengolahan basah, buah kopi dikupas, difermentasi, dan dijemur hingga menjadi biji kopi beras (green bean).

Rasio rendemen biji kopi beras terhadap berat buah gelondong kopi adalah 1 : 5. Artinya, dari setiap 5 kg buah kopi basah diperoleh 1 kg biji kopi kering siap sangrai. Dari 6.000 kg buah kopi basah, diperoleh biji kopi kering sebanyak: 1/5 x 6.000 kg = 1.200 kg. Selanjutnya, biji kopi kering disortir: perbandingan kualitas super (ekspor) terhadap kualitas reguler adalah 3 : 2. Biji kopi kualitas super adalah 3/5 x 1.200 = 720 kg, sedangkan kualitas reguler adalah 2/5 x 1.200 = 480 kg. Biji kopi super dikemas ke dalam karung goni 0,3 kuintal (30 kg) untuk dikirim ke pelabuhan ekspor. Koperasi membutuhkan 720 : 30 = 24 karung goni.'],
                            ['title' => 'Stimulus 3 (Paket A): Ekspedisi Truk Distribusi dan Waktu Pengiriman Barang', 'content' => '[Keterangan Gambar: Truk kontainer logistik melintasi jalan tol antarkota: Peta rute jalan tol dengan skala 1 : 1.250.000 berjarak peta 16 cm.]
Sebuah perusahaan ekspedisi mendistribusikan sembako dari pusat logistik ke gudang cabang di kota lain. Rute pengiriman melalui jalan tol digambar pada peta berskala 1 : 1.250.000 dengan jarak garis peta sepanjang 16 cm.

Sopir truk menghitung jarak tempuh sebenarnya: Jarak sebenarnya = 16 cm x 1.250.000 = 20.000.000 cm = 200 km. Jika truk melaju dengan kecepatan rata-rata 50 km/jam, maka waktu yang dibutuhkan adalah: 200 km : 50 km/jam = 4 jam. Jika kecepatan dinaikkan menjadi 80 km/jam, waktu tempuh menjadi: 200 : 80 = 2,5 jam (2 jam 30 menit). Hubungan antara kecepatan dan waktu tempuh merupakan perbandingan berbalik nilai. Di perjalanan, truk menggunakan roda dengan diameter 100 cm (K = 3,14 x 100 = 314 cm = 3,14 m). Dalam menempuh jarak 200 km (200.000 meter), roda truk berputar sebanyak sekitar 63.694 kali.'],
                        ],
                        'questions' => [
                            [
                                'order' => 1,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Berdasarkan Stimulus 1 Paket A, berapa meter persegi luas kolam renang anak sebenarnya?',
                                'explanation' => 'L = 22/7 x 7 x 7 = 154 m².',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '154 m²', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '308 m²', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '44 m²', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '196 m²', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Berapa meter persegi luas lahan yang dialokasikan untuk taman bunga dan gazebo santai?',
                                'explanation' => '2/5 x 1.500 m² = 600 m².',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '600 m²', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '500 m²', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '750 m²', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '450 m²', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Pilihlah DUA pernyataan yang BENAR mengenai fasilitas taman rekreasi air!',
                                'explanation' => 'Diameter kolam = 14 m (r = 7 m); Keliling = 44 m.',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Diameter sebenarnya kolam renang adalah 14 meter.', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Keliling kolam renang adalah 44 meter.', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Luas area pujasera kuliner adalah 500 m².', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Skala denah 1 : 500 berarti 1 cm di denah mewakili 50 meter sebenarnya.', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan status kebenaran perhitungan fasilitas rekreasi!',
                                'explanation' => 'Total lahan adalah 1.500 m² (bukan 15.000 m²).',
                                'group_index' => 0,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Skala 1 : 500 berarti 1 cm di denah sama dengan 5 meter sebenarnya.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Luas area pujasera 20 m x 15 m adalah 300 m².', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Total lahan kawasan rekreasi adalah 15.000 m².', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Keliling kolam renang berdiameter 14 m adalah 44 m.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Berdasarkan Stimulus 2, berapa kilogram biji kopi kering yang dihasilkan dari 6 ton buah kopi basah?',
                                'explanation' => '1/5 x 6.000 kg = 1.200 kg.',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '1.200 kg', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '1.500 kg', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '1.000 kg', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '2.000 kg', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Berapa banyak karung goni berisi 30 kg yang dibutuhkan untuk mengemas seluruh biji kopi kualitas super?',
                                'explanation' => '720 kg : 30 kg = 24 karung.',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '24 karung', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '20 karung', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '25 karung', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '30 karung', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => 'Jodohkan data komoditas kopi dengan nilainya!',
                                'explanation' => 'Data hasil pengolahan komoditas kopi.',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'Total buah kopi basah', 'is_correct' => false, 'match_key' => '6.000 kg (6 ton)', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Total biji kopi kering (1 : 5)', 'is_correct' => false, 'match_key' => '1.200 kg', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Biji kopi kualitas super (3 bagian)', 'is_correct' => false, 'match_key' => '720 kg', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Biji kopi kualitas reguler (2 bagian)', 'is_correct' => false, 'match_key' => '480 kg', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan status kebenaran perhitungan kopi koperasi!',
                                'explanation' => 'Kualitas super (720 kg) lebih banyak dari reguler (480 kg).',
                                'group_index' => 1,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Rasio rendemen 1 : 5 berarti berat biji kopi adalah 20% dari buah basah.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Kopi kualitas super berjumlah 720 kg.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Kopi kualitas reguler lebih banyak daripada kualitas super.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Karung goni yang dibutuhkan untuk kualitas super adalah 24 buah.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Berdasarkan Stimulus 3, berapa kilometer jarak sebenarnya yang ditempuh truk kontainer tersebut?',
                                'explanation' => '16 x 12,5 km = 200 km.',
                                'group_index' => 2,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '200 km', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '180 km', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '250 km', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '160 km', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Berapa lama waktu tempuh truk jika melaju dengan kecepatan rata-rata 50 km/jam?',
                                'explanation' => '200 : 50 = 4 jam.',
                                'group_index' => 2,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '4 jam', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '3,5 jam', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '4,5 jam', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '5 jam', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 11,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Pilihlah DUA pernyataan yang BENAR mengenai perjalanan truk distribusi!',
                                'explanation' => 'Jarak = 200 km; hubungan kecepatan-waktu adalah berbalik nilai.',
                                'group_index' => 2,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Jarak sebenarnya antara pusat logistik dan gudang cabang adalah 200 km.', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Hubungan antara kecepatan kendaraan dan waktu tempuh adalah perbandingan berbalik nilai.', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Truk membutuhkan waktu 10 jam jika melaju 50 km/jam.', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Skala peta 1 : 1.250.000 berarti 1 cm mewakili 125 km.', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 12,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan status kebenaran prinsip perbandingan ekspedisi!',
                                'explanation' => 'Kecepatan dan waktu adalah perbandingan berbalik nilai.',
                                'group_index' => 2,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Jika kecepatan dinaikkan dari 50 ke 80 km/jam, waktu perjalanan berkurang.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Jarak pada peta 16 cm mewakili 200 km pada skala 1 : 1.250.000.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Kecepatan dan waktu tempuh adalah perbandingan senilai.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Keliling roda berdiameter 100 cm adalah 314 cm (3,14 m).', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 13,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Hasil dari 2 1/2 x 0,8 + 1 1/4 adalah ....',
                                'explanation' => '2,5 x 0,8 + 1,25 = 2,0 + 1,25 = 3,25.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '3,25', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '3,5', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '2,75', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '3,75', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 14,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Hasil dari 3 3/4 : 1,25 - 0,5 adalah ....',
                                'explanation' => '3,75 : 1,25 = 3; 3 - 0,5 = 2,5.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '2,5', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '3', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '2', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '1,5', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 15,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Bentuk paling sederhana dari perbandingan 48 : 72 adalah ....',
                                'explanation' => 'Dibagi 24 -> 2 : 3.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '2 : 3', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '3 : 4', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '4 : 5', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '1 : 2', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 16,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Perbandingan umur Ayah, Ibu, dan Anak adalah 8 : 7 : 3. Jika umur Anak 12 tahun, umur Ayah adalah ....',
                                'explanation' => '12 : 3 x 8 = 32 tahun.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '32 tahun', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '28 tahun', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '36 tahun', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '40 tahun', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 17,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Sebuah mobil membutuhkan 6 liter bensin untuk 72 km. Untuk menempuh 180 km, bensin yang dibutuhkan adalah ....',
                                'explanation' => '180 : 72 x 6 = 2,5 x 6 = 15 liter.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '15 liter', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '12 liter', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '18 liter', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '20 liter', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 18,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Suatu pekerjaan selesai dalam 20 hari oleh 9 pekerja. Jika pekerja ditambah 3 orang (menjadi 12 orang), pekerjaan selesai dalam ....',
                                'explanation' => '20 x 9 : 12 = 180 : 12 = 15 hari.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '15 hari', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '16 hari', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '12 hari', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '18 hari', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 19,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Jarak pada peta berskala 1 : 2.500.000 adalah 4,8 cm. Jarak sebenarnya adalah ....',
                                'explanation' => '4,8 x 25 km = 120 km.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '120 km', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '100 km', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '125 km', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '150 km', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 20,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Keliling lingkaran yang memiliki diameter 28 cm (pi = 22/7) adalah ....',
                                'explanation' => 'K = 22/7 x 28 = 88 cm.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '88 cm', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '44 cm', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '176 cm', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '616 cm', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 21,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Luas lingkaran yang memiliki jari-jari 21 cm (pi = 22/7) adalah ....',
                                'explanation' => 'L = 22/7 x 21 x 21 = 1.386 cm².',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '1.386 cm²', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '616 cm²', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '154 cm²', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '2.464 cm²', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 22,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Sebuah juring lingkaran memiliki sudut pusat 90° dan jari-jari 7 cm. Luas juring adalah ....',
                                'explanation' => '1/4 x 154 = 38,5 cm².',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '38,5 cm²', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '77 cm²', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '154 cm²', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '44 cm²', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 23,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Pilihlah DUA pernyataan yang BENAR mengenai perbandingan dan skala!',
                                'explanation' => 'Skala = JP/JS; 1 : 100.000 = 1 cm mewakili 1 km.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Skala peta adalah perbandingan jarak peta terhadap jarak sebenarnya.', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Jika skala 1 : 100.000, maka 1 cm di peta mewakili 1 km di lapangan.', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Perbandingan berbalik nilai menghasilkan grafik yang selalu naik lurus.', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Skala denah rumah biasanya bernilai 1 : 1.000.000.', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 24,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Pilihlah DUA unsur lingkaran yang merupakan garis lurus!',
                                'explanation' => 'Diameter dan tali busur adalah garis lurus.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Diameter', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Tali busur', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Busur lingkaran', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Juring', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 25,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Pilihlah DUA bentuk yang senilai dengan 75%!',
                                'explanation' => '75% = 3/4 = 0,75.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '3/4', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '0,75', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '4/5', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '0,7', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 26,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => 'Jodohkan operasi hitung dengan hasilnya!',
                                'explanation' => 'Operasi pecahan campuran.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '1/2 x 0,4', 'is_correct' => false, 'match_key' => '0,2', 'order' => 1],
                                    ['label' => null, 'option_text' => '0,9 : 3/10', 'is_correct' => false, 'match_key' => '3', 'order' => 2],
                                    ['label' => null, 'option_text' => '1 1/4 + 0,75', 'is_correct' => false, 'match_key' => '2', 'order' => 3],
                                    ['label' => null, 'option_text' => '2 - 1/4 x 4', 'is_correct' => false, 'match_key' => '1', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 27,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => 'Jodohkan istilah lingkaran dengan pengertiannya!',
                                'explanation' => 'Unsur lingkaran dan definisinya.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'Jari-jari', 'is_correct' => false, 'match_key' => 'Garis dari titik pusat ke lengkungan lingkaran', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Diameter', 'is_correct' => false, 'match_key' => 'Garis yang membelah lingkaran melalui titik pusat', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Juring', 'is_correct' => false, 'match_key' => 'Daerah diapit dua jari-jari dan satu busur', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Apotema', 'is_correct' => false, 'match_key' => 'Garis tegak lurus dari titik pusat ke tali busur', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 28,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => 'Jodohkan nilai jari-jari dengan luas lingkarannya (pi = 22/7)!',
                                'explanation' => 'Jari-jari dan luas lingkaran.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'r = 7 cm', 'is_correct' => false, 'match_key' => '154 cm²', 'order' => 1],
                                    ['label' => null, 'option_text' => 'r = 14 cm', 'is_correct' => false, 'match_key' => '616 cm²', 'order' => 2],
                                    ['label' => null, 'option_text' => 'r = 21 cm', 'is_correct' => false, 'match_key' => '1.386 cm²', 'order' => 3],
                                    ['label' => null, 'option_text' => 'r = 28 cm', 'is_correct' => false, 'match_key' => '2.464 cm²', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 29,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan status kebenaran materi matematika Semester 1!',
                                'explanation' => 'Sudut keliling putaran penuh lingkaran adalah 360° (bukan 180°).',
                                'group_index' => null,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Diameter lingkaran selalu dua kali panjang jari-jarinya.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Nilai 25% dari 400 adalah 100.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Perbandingan 1 km : 200 m adalah 5 : 1.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Sebuah lingkaran memiliki sudut keliling penuh sebesar 180°.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 30,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan status kebenaran perhitungan terapan!',
                                'explanation' => 'Kecepatan dan waktu adalah perbandingan berbalik nilai.',
                                'group_index' => null,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Luas lingkaran dengan r = 10 cm (pi = 3,14) adalah 314 cm².', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Keliling lingkaran dengan d = 14 cm (pi = 22/7) adalah 44 cm.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Jika 4 kg telur Rp80.000, maka 7 kg telur Rp140.000.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Hubungan kecepatan dan waktu tempuh adalah perbandingan senilai.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 4],
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
                                'prompt' => 'Hasil dari 3/4 x 1,6 adalah ....',
                                'explanation' => '3/4 x 16/10 = 12/10 = 1,2.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '1,2', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Hasil dari 2 1/2 : 0,25 adalah ....',
                                'explanation' => '2,5 : 0,25 = 10.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '10', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Bentuk paling sederhana dari perbandingan 35 : 49 adalah ....',
                                'explanation' => '5 : 7.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '5 : 7', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Perbandingan umur A dan B adalah 2 : 3. Jika jumlah umur mereka 30 tahun, umur A adalah ... tahun.',
                                'explanation' => '2/5 x 30 = 12 tahun.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '12', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Sebuah pekerjaan selesai 12 hari oleh 5 orang. Oleh 6 orang selesai dalam ... hari.',
                                'explanation' => '12 x 5 : 6 = 10 hari.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '10', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Jarak pada peta 4 cm dengan skala 1 : 500.000 sama dengan ... km sebenarnya.',
                                'explanation' => '4 x 5 km = 20 km.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '20', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Keliling lingkaran dengan r = 14 cm (pi = 22/7) adalah ... cm.',
                                'explanation' => '2 x 22/7 x 14 = 88 cm.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '88', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Luas lingkaran dengan r = 7 cm (pi = 22/7) adalah ... cm².',
                                'explanation' => '22/7 x 7 x 7 = 154 cm².',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '154', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Daerah lingkaran yang dibatasi oleh dua jari-jari dan sebuah busur disebut ....',
                                'explanation' => 'juring.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'juring', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Daerah lingkaran yang dibatasi oleh tali busur dan busurnya disebut ....',
                                'explanation' => 'tembereng.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'tembereng', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 11,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Bentuk persen dari 4/25 adalah ...%.',
                                'explanation' => '4/25 x 100% = 16%.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '16', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 12,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Sebuah roda berdiameter 70 cm berputar 100 kali menempuh jarak ... meter.',
                                'explanation' => 'K = 220 cm = 2,2 m; 100 x 2,2 = 220 meter.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '220', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 13,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Sudut pusat satu putaran penuh pada lingkaran adalah ... derajat.',
                                'explanation' => '360 derajat.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '360', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 14,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Jika diameter lingkaran 40 cm, maka panjang jari-jarinya adalah ... cm.',
                                'explanation' => '40 : 2 = 20 cm.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '20', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 15,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Bentuk desimal dari 3/8 adalah ....',
                                'explanation' => '0,375.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '0,375', 'is_correct' => true, 'match_key' => null, 'order' => 1],
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
                                'prompt' => 'Sebuah yayasan sosial menerima sumbangan beras seberat 2,4 ton. Sebanyak 3/8 bagian dibagikan ke panti asuhan, 30% dibagikan ke warga lansia kurang mampu, dan sisanya dibagikan ke 15 keluarga terdampak bencana banjir. Tentukan:
(a) Berat beras untuk panti asuhan (kg)
(b) Berat beras untuk warga lansia (kg)
(c) Sisa beras untuk keluarga korban banjir (kg)
(d) Berat beras yang diterima setiap keluarga korban banjir (kg)',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Total beras = 2,4 ton = 2.400 kg.
(a) Panti asuhan = 3/8 x 2.400 kg = 900 kg.
(b) Warga lansia = 30% x 2.400 kg = 720 kg.
(c) Sisa beras = 2.400 - (900 + 720) = 2.400 - 1.620 = 780 kg.
(d) Setiap keluarga korban = 780 kg : 15 keluarga = 52 kg beras.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                            [
                                'order' => 2,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => 'Perbandingan banyak kelereng merah dan kelereng biru adalah 4 : 5, sedangkan perbandingan kelereng biru dan kelereng kuning adalah 2 : 3. Jika jumlah kelereng merah adalah 40 butir, tentukan:
(a) Banyak kelereng biru
(b) Banyak kelereng kuning
(c) Jumlah seluruh kelereng ketiga warna tersebut',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
(a) Kelereng biru = 5/4 x Kelereng merah = 5/4 x 40 = 50 butir.
(b) Kelereng kuning: Rasio Biru : Kuning = 2 : 3. Karena biru = 50, maka kuning = 3/2 x 50 = 75 butir.
(c) Total kelereng = 40 (merah) + 50 (biru) + 75 (kuning) = 165 butir.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                            [
                                'order' => 3,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => 'Suatu proyek pembangunan jembatan direncanakan selesai dalam 30 hari oleh 12 orang pekerja. Setelah bekerja selama 10 hari, proyek dihentikan selama 5 hari karena hujan lebat. Jika jembatan harus selesai sesuai rencana semula, berapa orang pekerja tambahan yang diperlukan?',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Beban total = 30 x 12 = 360 hari-orang.
Beban selesai = 10 x 12 = 120 hari-orang.
Sisa beban = 360 - 120 = 240 hari-orang.
Sisa waktu = 30 - 10 - 5 = 15 hari.
Pekerja yang dibutuhkan = 240 : 15 = 16 orang pekerja.
Pekerja tambahan = 16 - 12 = 4 orang pekerja tambahan.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                            [
                                'order' => 4,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => 'Sebuah taman kota berbentuk lingkaran memiliki diameter 28 meter. Di sekeliling taman tersebut dibuat jalan setapak selebar 3,5 meter mengelilingi taman (sehingga jari-jari luar menjadi 14 + 3,5 = 17,5 meter). Tentukan:
(a) Luas taman bunga bagian dalam (r = 14 m)
(b) Luas seluruh area termasuk jalan setapak (R = 17,5 m)
(c) Luas jalan setapak saja
(d) Jika jalan setapak dipasang paving block dengan biaya Rp80.000 per m², hitung total biaya pemasangan paving block!',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
(a) Luas taman dalam = 22/7 x 14 x 14 = 616 m².
(b) Luas area luar (R = 17,5 m = 35/2 m) = 22/7 x 35/2 x 35/2 = 11 x 5 x 35 / 2 = 1.925 / 2 = 962,5 m².
(c) Luas jalan setapak = Luas luar - Luas dalam = 962,5 - 616 = 346,5 m².
(d) Biaya paving = 346,5 m² x Rp80.000 = Rp27.720.000.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                            [
                                'order' => 5,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => 'Sebuah sepeda memiliki roda dengan diameter 56 cm. Sepeda tersebut dikendarai melintasi rute lurus sejauh 1,76 kilometer. Hitunglah:
(a) Keliling roda sepeda tersebut (meter)
(b) Berapa kali roda sepeda tersebut berputar selama perjalanan?',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
(a) Keliling roda = pi x d = 22/7 x 56 cm = 176 cm = 1,76 meter.
(b) Jarak tempuh = 1,76 km = 1.760 meter.
    Banyak putaran roda = Jarak : Keliling roda = 1.760 m : 1,76 m = 1.000 kali putaran.
Jadi, keliling roda adalah 1,76 meter dan roda berputar sebanyak 1.000 kali.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'title' => 'Asesmen Sumatif Akhir Semester (ASAS) 1 Matematika Kelas 6 (Paket B)',
                'type' => 'exam',
                'description' => 'Asesmen Sumatif Akhir Semester 1 mata pelajaran Matematika Kelas 6 Fase C Kurikulum Merdeka Paket B. Menguji capaian komprehensif Semester 1 (Bab 1 Pecahan & Desimal, Bab 2 Rasio & Skala, Bab 3 Lingkaran). Berbobot 40:30:30 skala 100.',
                'duration_minutes' => 90,
                'sections' => [
                    [
                        'title' => 'Bagian 1: Objektif Beragam (Pilihan Ganda, Pilihan Ganda Kompleks, Menjodohkan, Benar-Salah)',
                        'instructions' => 'Pilihlah dan jawablah soal-soal objektif berikut secara cermat dan teliti.',
                        'order' => 1,
                        'question_groups' => [
                            ['title' => 'Stimulus 1 (Paket B): Proyek Pembangunan Kolam Renang dan Taman Rekreasi', 'content' => '[Keterangan Gambar: Denah arsitektur kawasan taman rekreasi air berskala 1 : 500: Kolam renang melingkar dengan diameter 14 meter dan area pujasera persegi panjang berukuran 20 m x 15 m.]
Pemerintah daerah membangun kawasan sarana rekreasi terpadu di atas lahan seluas 1.500 m². Proyek ini mengintegrasikan fasilitas kolam renang anak berbentuk lingkaran dan area pujasera kuliner sehat.

Pada lembar denah arsitektur berskala 1 : 500, kolam renang digambar berbentuk lingkaran berdiameter 2,8 cm. Jarak dan ukuran sebenarnya dihitung dengan skala 500: Diameter sebenarnya kolam = 2,8 cm x 500 = 1.400 cm = 14 meter (jari-jari r = 7 meter). Luas kolam renang adalah L = 22/7 x 7 x 7 = 154 m², dan keliling kolam adalah K = 2 x 22/7 x 7 = 44 meter. Area pujasera berukuran 20 meter x 15 meter memiliki luas 300 m². Sebanyak 2/5 bagian dari total lahan 1.500 m² (yaitu 600 m²) dibangun taman bunga dan gazebo santai. Sisa lahan dialokasikan untuk area parkir kendaraan ramah lingkungan. Perhitungan pecahan, skala denah, dan geometri lingkaran bekerja sama menyukseskan proyek publik ini.'],
                            ['title' => 'Stimulus 2 (Paket B): Pengangkutan Komoditas Perkebunan Kopi dan Rasio Hasil', 'content' => '[Keterangan Gambar: Truk angkutan hasil bumi menimbang biji kopi arabika di pabrik pengolahan: Papan timbangan mencatat berat panen gabah kopi dan perbandingan hasil sortasi kualitas ekspor.]
Koperasi Petani Kopi "Lembah Asri" mengangkut 6 ton (6.000 kg) gelondong buah kopi merah hasil panen raya dari perkebunan pegunungan. Dalam proses pengolahan basah, buah kopi dikupas, difermentasi, dan dijemur hingga menjadi biji kopi beras (green bean).

Rasio rendemen biji kopi beras terhadap berat buah gelondong kopi adalah 1 : 5. Artinya, dari setiap 5 kg buah kopi basah diperoleh 1 kg biji kopi kering siap sangrai. Dari 6.000 kg buah kopi basah, diperoleh biji kopi kering sebanyak: 1/5 x 6.000 kg = 1.200 kg. Selanjutnya, biji kopi kering disortir: perbandingan kualitas super (ekspor) terhadap kualitas reguler adalah 3 : 2. Biji kopi kualitas super adalah 3/5 x 1.200 = 720 kg, sedangkan kualitas reguler adalah 2/5 x 1.200 = 480 kg. Biji kopi super dikemas ke dalam karung goni 0,3 kuintal (30 kg) untuk dikirim ke pelabuhan ekspor. Koperasi membutuhkan 720 : 30 = 24 karung goni.'],
                            ['title' => 'Stimulus 3 (Paket B): Ekspedisi Truk Distribusi dan Waktu Pengiriman Barang', 'content' => '[Keterangan Gambar: Truk kontainer logistik melintasi jalan tol antarkota: Peta rute jalan tol dengan skala 1 : 1.250.000 berjarak peta 16 cm.]
Sebuah perusahaan ekspedisi mendistribusikan sembako dari pusat logistik ke gudang cabang di kota lain. Rute pengiriman melalui jalan tol digambar pada peta berskala 1 : 1.250.000 dengan jarak garis peta sepanjang 16 cm.

Sopir truk menghitung jarak tempuh sebenarnya: Jarak sebenarnya = 16 cm x 1.250.000 = 20.000.000 cm = 200 km. Jika truk melaju dengan kecepatan rata-rata 50 km/jam, maka waktu yang dibutuhkan adalah: 200 km : 50 km/jam = 4 jam. Jika kecepatan dinaikkan menjadi 80 km/jam, waktu tempuh menjadi: 200 : 80 = 2,5 jam (2 jam 30 menit). Hubungan antara kecepatan dan waktu tempuh merupakan perbandingan berbalik nilai. Di perjalanan, truk menggunakan roda dengan diameter 100 cm (K = 3,14 x 100 = 314 cm = 3,14 m). Dalam menempuh jarak 200 km (200.000 meter), roda truk berputar sebanyak sekitar 63.694 kali.'],
                        ],
                        'questions' => [
                            [
                                'order' => 1,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Berdasarkan Stimulus 1 Paket B, berapa meter persegi luas kolam renang anak sebenarnya?',
                                'explanation' => 'L = 22/7 x 7 x 7 = 154 m².',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '154 m²', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '308 m²', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '44 m²', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '196 m²', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Berapa meter persegi luas lahan yang dialokasikan untuk taman bunga dan gazebo santai?',
                                'explanation' => '2/5 x 1.500 m² = 600 m².',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '600 m²', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '500 m²', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '750 m²', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '450 m²', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Pilihlah DUA pernyataan yang BENAR mengenai fasilitas taman rekreasi air!',
                                'explanation' => 'Diameter kolam = 14 m (r = 7 m); Keliling = 44 m.',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Diameter sebenarnya kolam renang adalah 14 meter.', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Keliling kolam renang adalah 44 meter.', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Luas area pujasera kuliner adalah 500 m².', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Skala denah 1 : 500 berarti 1 cm di denah mewakili 50 meter sebenarnya.', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan status kebenaran perhitungan fasilitas rekreasi!',
                                'explanation' => 'Total lahan adalah 1.500 m² (bukan 15.000 m²).',
                                'group_index' => 0,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Skala 1 : 500 berarti 1 cm di denah sama dengan 5 meter sebenarnya.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Luas area pujasera 20 m x 15 m adalah 300 m².', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Total lahan kawasan rekreasi adalah 15.000 m².', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Keliling kolam renang berdiameter 14 m adalah 44 m.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Berdasarkan Stimulus 2, berapa kilogram biji kopi kering yang dihasilkan dari 6 ton buah kopi basah?',
                                'explanation' => '1/5 x 6.000 kg = 1.200 kg.',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '1.200 kg', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '1.500 kg', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '1.000 kg', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '2.000 kg', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Berapa banyak karung goni berisi 30 kg yang dibutuhkan untuk mengemas seluruh biji kopi kualitas super?',
                                'explanation' => '720 kg : 30 kg = 24 karung.',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '24 karung', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '20 karung', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '25 karung', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '30 karung', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => 'Jodohkan data komoditas kopi dengan nilainya!',
                                'explanation' => 'Data hasil pengolahan komoditas kopi.',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'Total buah kopi basah', 'is_correct' => false, 'match_key' => '6.000 kg (6 ton)', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Total biji kopi kering (1 : 5)', 'is_correct' => false, 'match_key' => '1.200 kg', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Biji kopi kualitas super (3 bagian)', 'is_correct' => false, 'match_key' => '720 kg', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Biji kopi kualitas reguler (2 bagian)', 'is_correct' => false, 'match_key' => '480 kg', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan status kebenaran perhitungan kopi koperasi!',
                                'explanation' => 'Kualitas super (720 kg) lebih banyak dari reguler (480 kg).',
                                'group_index' => 1,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Rasio rendemen 1 : 5 berarti berat biji kopi adalah 20% dari buah basah.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Kopi kualitas super berjumlah 720 kg.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Kopi kualitas reguler lebih banyak daripada kualitas super.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Karung goni yang dibutuhkan untuk kualitas super adalah 24 buah.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Berdasarkan Stimulus 3, berapa kilometer jarak sebenarnya yang ditempuh truk kontainer tersebut?',
                                'explanation' => '16 x 12,5 km = 200 km.',
                                'group_index' => 2,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '200 km', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '180 km', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '250 km', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '160 km', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Berapa lama waktu tempuh truk jika melaju dengan kecepatan rata-rata 50 km/jam?',
                                'explanation' => '200 : 50 = 4 jam.',
                                'group_index' => 2,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '4 jam', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '3,5 jam', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '4,5 jam', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '5 jam', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 11,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Pilihlah DUA pernyataan yang BENAR mengenai perjalanan truk distribusi!',
                                'explanation' => 'Jarak = 200 km; hubungan kecepatan-waktu adalah berbalik nilai.',
                                'group_index' => 2,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Jarak sebenarnya antara pusat logistik dan gudang cabang adalah 200 km.', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Hubungan antara kecepatan kendaraan dan waktu tempuh adalah perbandingan berbalik nilai.', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Truk membutuhkan waktu 10 jam jika melaju 50 km/jam.', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Skala peta 1 : 1.250.000 berarti 1 cm mewakili 125 km.', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 12,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan status kebenaran prinsip perbandingan ekspedisi!',
                                'explanation' => 'Kecepatan dan waktu adalah perbandingan berbalik nilai.',
                                'group_index' => 2,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Jika kecepatan dinaikkan dari 50 ke 80 km/jam, waktu perjalanan berkurang.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Jarak pada peta 16 cm mewakili 200 km pada skala 1 : 1.250.000.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Kecepatan dan waktu tempuh adalah perbandingan senilai.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Keliling roda berdiameter 100 cm adalah 314 cm (3,14 m).', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 13,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Hasil dari 2 1/2 x 0,8 + 1 1/4 adalah ....',
                                'explanation' => '2,5 x 0,8 + 1,25 = 2,0 + 1,25 = 3,25.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '3,25', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '3,5', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '2,75', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '3,75', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 14,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Hasil dari 3 3/4 : 1,25 - 0,5 adalah ....',
                                'explanation' => '3,75 : 1,25 = 3; 3 - 0,5 = 2,5.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '2,5', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '3', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '2', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '1,5', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 15,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Bentuk paling sederhana dari perbandingan 48 : 72 adalah ....',
                                'explanation' => 'Dibagi 24 -> 2 : 3.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '2 : 3', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '3 : 4', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '4 : 5', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '1 : 2', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 16,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Perbandingan umur Ayah, Ibu, dan Anak adalah 8 : 7 : 3. Jika umur Anak 12 tahun, umur Ayah adalah ....',
                                'explanation' => '12 : 3 x 8 = 32 tahun.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '32 tahun', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '28 tahun', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '36 tahun', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '40 tahun', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 17,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Sebuah mobil membutuhkan 6 liter bensin untuk 72 km. Untuk menempuh 180 km, bensin yang dibutuhkan adalah ....',
                                'explanation' => '180 : 72 x 6 = 2,5 x 6 = 15 liter.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '15 liter', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '12 liter', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '18 liter', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '20 liter', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 18,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Suatu pekerjaan selesai dalam 20 hari oleh 9 pekerja. Jika pekerja ditambah 3 orang (menjadi 12 orang), pekerjaan selesai dalam ....',
                                'explanation' => '20 x 9 : 12 = 180 : 12 = 15 hari.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '15 hari', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '16 hari', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '12 hari', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '18 hari', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 19,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Jarak pada peta berskala 1 : 2.500.000 adalah 4,8 cm. Jarak sebenarnya adalah ....',
                                'explanation' => '4,8 x 25 km = 120 km.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '120 km', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '100 km', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '125 km', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '150 km', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 20,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Keliling lingkaran yang memiliki diameter 28 cm (pi = 22/7) adalah ....',
                                'explanation' => 'K = 22/7 x 28 = 88 cm.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '88 cm', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '44 cm', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '176 cm', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '616 cm', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 21,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Luas lingkaran yang memiliki jari-jari 21 cm (pi = 22/7) adalah ....',
                                'explanation' => 'L = 22/7 x 21 x 21 = 1.386 cm².',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '1.386 cm²', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '616 cm²', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '154 cm²', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '2.464 cm²', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 22,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Sebuah juring lingkaran memiliki sudut pusat 90° dan jari-jari 7 cm. Luas juring adalah ....',
                                'explanation' => '1/4 x 154 = 38,5 cm².',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '38,5 cm²', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '77 cm²', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '154 cm²', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '44 cm²', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 23,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Pilihlah DUA pernyataan yang BENAR mengenai perbandingan dan skala!',
                                'explanation' => 'Skala = JP/JS; 1 : 100.000 = 1 cm mewakili 1 km.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Skala peta adalah perbandingan jarak peta terhadap jarak sebenarnya.', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Jika skala 1 : 100.000, maka 1 cm di peta mewakili 1 km di lapangan.', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Perbandingan berbalik nilai menghasilkan grafik yang selalu naik lurus.', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Skala denah rumah biasanya bernilai 1 : 1.000.000.', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 24,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Pilihlah DUA unsur lingkaran yang merupakan garis lurus!',
                                'explanation' => 'Diameter dan tali busur adalah garis lurus.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Diameter', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Tali busur', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Busur lingkaran', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Juring', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 25,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Pilihlah DUA bentuk yang senilai dengan 75%!',
                                'explanation' => '75% = 3/4 = 0,75.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '3/4', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '0,75', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '4/5', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '0,7', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 26,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => 'Jodohkan operasi hitung dengan hasilnya!',
                                'explanation' => 'Operasi pecahan campuran.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '1/2 x 0,4', 'is_correct' => false, 'match_key' => '0,2', 'order' => 1],
                                    ['label' => null, 'option_text' => '0,9 : 3/10', 'is_correct' => false, 'match_key' => '3', 'order' => 2],
                                    ['label' => null, 'option_text' => '1 1/4 + 0,75', 'is_correct' => false, 'match_key' => '2', 'order' => 3],
                                    ['label' => null, 'option_text' => '2 - 1/4 x 4', 'is_correct' => false, 'match_key' => '1', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 27,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => 'Jodohkan istilah lingkaran dengan pengertiannya!',
                                'explanation' => 'Unsur lingkaran dan definisinya.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'Jari-jari', 'is_correct' => false, 'match_key' => 'Garis dari titik pusat ke lengkungan lingkaran', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Diameter', 'is_correct' => false, 'match_key' => 'Garis yang membelah lingkaran melalui titik pusat', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Juring', 'is_correct' => false, 'match_key' => 'Daerah diapit dua jari-jari dan satu busur', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Apotema', 'is_correct' => false, 'match_key' => 'Garis tegak lurus dari titik pusat ke tali busur', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 28,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => 'Jodohkan nilai jari-jari dengan luas lingkarannya (pi = 22/7)!',
                                'explanation' => 'Jari-jari dan luas lingkaran.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'r = 7 cm', 'is_correct' => false, 'match_key' => '154 cm²', 'order' => 1],
                                    ['label' => null, 'option_text' => 'r = 14 cm', 'is_correct' => false, 'match_key' => '616 cm²', 'order' => 2],
                                    ['label' => null, 'option_text' => 'r = 21 cm', 'is_correct' => false, 'match_key' => '1.386 cm²', 'order' => 3],
                                    ['label' => null, 'option_text' => 'r = 28 cm', 'is_correct' => false, 'match_key' => '2.464 cm²', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 29,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan status kebenaran materi matematika Semester 1!',
                                'explanation' => 'Sudut keliling putaran penuh lingkaran adalah 360° (bukan 180°).',
                                'group_index' => null,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Diameter lingkaran selalu dua kali panjang jari-jarinya.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Nilai 25% dari 400 adalah 100.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Perbandingan 1 km : 200 m adalah 5 : 1.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Sebuah lingkaran memiliki sudut keliling penuh sebesar 180°.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 30,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan status kebenaran perhitungan terapan!',
                                'explanation' => 'Kecepatan dan waktu adalah perbandingan berbalik nilai.',
                                'group_index' => null,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Luas lingkaran dengan r = 10 cm (pi = 3,14) adalah 314 cm².', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Keliling lingkaran dengan d = 14 cm (pi = 22/7) adalah 44 cm.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Jika 4 kg telur Rp80.000, maka 7 kg telur Rp140.000.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Hubungan kecepatan dan waktu tempuh adalah perbandingan senilai.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 4],
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
                                'prompt' => 'Hasil dari 3/4 x 1,6 adalah ....',
                                'explanation' => '3/4 x 16/10 = 12/10 = 1,2.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '1,2', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Hasil dari 2 1/2 : 0,25 adalah ....',
                                'explanation' => '2,5 : 0,25 = 10.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '10', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Bentuk paling sederhana dari perbandingan 35 : 49 adalah ....',
                                'explanation' => '5 : 7.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '5 : 7', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Perbandingan umur A dan B adalah 2 : 3. Jika jumlah umur mereka 30 tahun, umur A adalah ... tahun.',
                                'explanation' => '2/5 x 30 = 12 tahun.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '12', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Sebuah pekerjaan selesai 12 hari oleh 5 orang. Oleh 6 orang selesai dalam ... hari.',
                                'explanation' => '12 x 5 : 6 = 10 hari.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '10', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Jarak pada peta 4 cm dengan skala 1 : 500.000 sama dengan ... km sebenarnya.',
                                'explanation' => '4 x 5 km = 20 km.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '20', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Keliling lingkaran dengan r = 14 cm (pi = 22/7) adalah ... cm.',
                                'explanation' => '2 x 22/7 x 14 = 88 cm.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '88', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Luas lingkaran dengan r = 7 cm (pi = 22/7) adalah ... cm².',
                                'explanation' => '22/7 x 7 x 7 = 154 cm².',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '154', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Daerah lingkaran yang dibatasi oleh dua jari-jari dan sebuah busur disebut ....',
                                'explanation' => 'juring.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'juring', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Daerah lingkaran yang dibatasi oleh tali busur dan busurnya disebut ....',
                                'explanation' => 'tembereng.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'tembereng', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 11,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Bentuk persen dari 4/25 adalah ...%.',
                                'explanation' => '4/25 x 100% = 16%.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '16', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 12,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Sebuah roda berdiameter 70 cm berputar 100 kali menempuh jarak ... meter.',
                                'explanation' => 'K = 220 cm = 2,2 m; 100 x 2,2 = 220 meter.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '220', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 13,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Sudut pusat satu putaran penuh pada lingkaran adalah ... derajat.',
                                'explanation' => '360 derajat.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '360', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 14,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Jika diameter lingkaran 40 cm, maka panjang jari-jarinya adalah ... cm.',
                                'explanation' => '40 : 2 = 20 cm.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '20', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 15,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Bentuk desimal dari 3/8 adalah ....',
                                'explanation' => '0,375.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '0,375', 'is_correct' => true, 'match_key' => null, 'order' => 1],
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
                                'prompt' => 'Sebuah yayasan sosial menerima sumbangan beras seberat 2,4 ton. Sebanyak 3/8 bagian dibagikan ke panti asuhan, 30% dibagikan ke warga lansia kurang mampu, dan sisanya dibagikan ke 15 keluarga terdampak bencana banjir. Tentukan:
(a) Berat beras untuk panti asuhan (kg)
(b) Berat beras untuk warga lansia (kg)
(c) Sisa beras untuk keluarga korban banjir (kg)
(d) Berat beras yang diterima setiap keluarga korban banjir (kg)',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Total beras = 2,4 ton = 2.400 kg.
(a) Panti asuhan = 3/8 x 2.400 kg = 900 kg.
(b) Warga lansia = 30% x 2.400 kg = 720 kg.
(c) Sisa beras = 2.400 - (900 + 720) = 2.400 - 1.620 = 780 kg.
(d) Setiap keluarga korban = 780 kg : 15 keluarga = 52 kg beras.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                            [
                                'order' => 2,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => 'Perbandingan banyak kelereng merah dan kelereng biru adalah 4 : 5, sedangkan perbandingan kelereng biru dan kelereng kuning adalah 2 : 3. Jika jumlah kelereng merah adalah 40 butir, tentukan:
(a) Banyak kelereng biru
(b) Banyak kelereng kuning
(c) Jumlah seluruh kelereng ketiga warna tersebut',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
(a) Kelereng biru = 5/4 x Kelereng merah = 5/4 x 40 = 50 butir.
(b) Kelereng kuning: Rasio Biru : Kuning = 2 : 3. Karena biru = 50, maka kuning = 3/2 x 50 = 75 butir.
(c) Total kelereng = 40 (merah) + 50 (biru) + 75 (kuning) = 165 butir.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                            [
                                'order' => 3,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => 'Suatu proyek pembangunan jembatan direncanakan selesai dalam 30 hari oleh 12 orang pekerja. Setelah bekerja selama 10 hari, proyek dihentikan selama 5 hari karena hujan lebat. Jika jembatan harus selesai sesuai rencana semula, berapa orang pekerja tambahan yang diperlukan?',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Beban total = 30 x 12 = 360 hari-orang.
Beban selesai = 10 x 12 = 120 hari-orang.
Sisa beban = 360 - 120 = 240 hari-orang.
Sisa waktu = 30 - 10 - 5 = 15 hari.
Pekerja yang dibutuhkan = 240 : 15 = 16 orang pekerja.
Pekerja tambahan = 16 - 12 = 4 orang pekerja tambahan.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                            [
                                'order' => 4,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => 'Sebuah taman kota berbentuk lingkaran memiliki diameter 28 meter. Di sekeliling taman tersebut dibuat jalan setapak selebar 3,5 meter mengelilingi taman (sehingga jari-jari luar menjadi 14 + 3,5 = 17,5 meter). Tentukan:
(a) Luas taman bunga bagian dalam (r = 14 m)
(b) Luas seluruh area termasuk jalan setapak (R = 17,5 m)
(c) Luas jalan setapak saja
(d) Jika jalan setapak dipasang paving block dengan biaya Rp80.000 per m², hitung total biaya pemasangan paving block!',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
(a) Luas taman dalam = 22/7 x 14 x 14 = 616 m².
(b) Luas area luar (R = 17,5 m = 35/2 m) = 22/7 x 35/2 x 35/2 = 11 x 5 x 35 / 2 = 1.925 / 2 = 962,5 m².
(c) Luas jalan setapak = Luas luar - Luas dalam = 962,5 - 616 = 346,5 m².
(d) Biaya paving = 346,5 m² x Rp80.000 = Rp27.720.000.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                            [
                                'order' => 5,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => 'Sebuah sepeda memiliki roda dengan diameter 56 cm. Sepeda tersebut dikendarai melintasi rute lurus sejauh 1,76 kilometer. Hitunglah:
(a) Keliling roda sepeda tersebut (meter)
(b) Berapa kali roda sepeda tersebut berputar selama perjalanan?',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
(a) Keliling roda = pi x d = 22/7 x 56 cm = 176 cm = 1,76 meter.
(b) Jarak tempuh = 1,76 km = 1.760 meter.
    Banyak putaran roda = Jarak : Keliling roda = 1.760 m : 1,76 m = 1.000 kali putaran.
Jadi, keliling roda adalah 1,76 meter dan roda berputar sebanyak 1.000 kali.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'title' => 'Asesmen Sumatif Akhir Semester (ASAS) 1 Matematika Kelas 6 (Paket C)',
                'type' => 'exam',
                'description' => 'Asesmen Sumatif Akhir Semester 1 mata pelajaran Matematika Kelas 6 Fase C Kurikulum Merdeka Paket C. Menguji capaian komprehensif Semester 1 (Bab 1 Pecahan & Desimal, Bab 2 Rasio & Skala, Bab 3 Lingkaran). Berbobot 40:30:30 skala 100.',
                'duration_minutes' => 90,
                'sections' => [
                    [
                        'title' => 'Bagian 1: Objektif Beragam (Pilihan Ganda, Pilihan Ganda Kompleks, Menjodohkan, Benar-Salah)',
                        'instructions' => 'Pilihlah dan jawablah soal-soal objektif berikut secara cermat dan teliti.',
                        'order' => 1,
                        'question_groups' => [
                            ['title' => 'Stimulus 1 (Paket C): Proyek Pembangunan Kolam Renang dan Taman Rekreasi', 'content' => '[Keterangan Gambar: Denah arsitektur kawasan taman rekreasi air berskala 1 : 500: Kolam renang melingkar dengan diameter 14 meter dan area pujasera persegi panjang berukuran 20 m x 15 m.]
Pemerintah daerah membangun kawasan sarana rekreasi terpadu di atas lahan seluas 1.500 m². Proyek ini mengintegrasikan fasilitas kolam renang anak berbentuk lingkaran dan area pujasera kuliner sehat.

Pada lembar denah arsitektur berskala 1 : 500, kolam renang digambar berbentuk lingkaran berdiameter 2,8 cm. Jarak dan ukuran sebenarnya dihitung dengan skala 500: Diameter sebenarnya kolam = 2,8 cm x 500 = 1.400 cm = 14 meter (jari-jari r = 7 meter). Luas kolam renang adalah L = 22/7 x 7 x 7 = 154 m², dan keliling kolam adalah K = 2 x 22/7 x 7 = 44 meter. Area pujasera berukuran 20 meter x 15 meter memiliki luas 300 m². Sebanyak 2/5 bagian dari total lahan 1.500 m² (yaitu 600 m²) dibangun taman bunga dan gazebo santai. Sisa lahan dialokasikan untuk area parkir kendaraan ramah lingkungan. Perhitungan pecahan, skala denah, dan geometri lingkaran bekerja sama menyukseskan proyek publik ini.'],
                            ['title' => 'Stimulus 2 (Paket C): Pengangkutan Komoditas Perkebunan Kopi dan Rasio Hasil', 'content' => '[Keterangan Gambar: Truk angkutan hasil bumi menimbang biji kopi arabika di pabrik pengolahan: Papan timbangan mencatat berat panen gabah kopi dan perbandingan hasil sortasi kualitas ekspor.]
Koperasi Petani Kopi "Lembah Asri" mengangkut 6 ton (6.000 kg) gelondong buah kopi merah hasil panen raya dari perkebunan pegunungan. Dalam proses pengolahan basah, buah kopi dikupas, difermentasi, dan dijemur hingga menjadi biji kopi beras (green bean).

Rasio rendemen biji kopi beras terhadap berat buah gelondong kopi adalah 1 : 5. Artinya, dari setiap 5 kg buah kopi basah diperoleh 1 kg biji kopi kering siap sangrai. Dari 6.000 kg buah kopi basah, diperoleh biji kopi kering sebanyak: 1/5 x 6.000 kg = 1.200 kg. Selanjutnya, biji kopi kering disortir: perbandingan kualitas super (ekspor) terhadap kualitas reguler adalah 3 : 2. Biji kopi kualitas super adalah 3/5 x 1.200 = 720 kg, sedangkan kualitas reguler adalah 2/5 x 1.200 = 480 kg. Biji kopi super dikemas ke dalam karung goni 0,3 kuintal (30 kg) untuk dikirim ke pelabuhan ekspor. Koperasi membutuhkan 720 : 30 = 24 karung goni.'],
                            ['title' => 'Stimulus 3 (Paket C): Ekspedisi Truk Distribusi dan Waktu Pengiriman Barang', 'content' => '[Keterangan Gambar: Truk kontainer logistik melintasi jalan tol antarkota: Peta rute jalan tol dengan skala 1 : 1.250.000 berjarak peta 16 cm.]
Sebuah perusahaan ekspedisi mendistribusikan sembako dari pusat logistik ke gudang cabang di kota lain. Rute pengiriman melalui jalan tol digambar pada peta berskala 1 : 1.250.000 dengan jarak garis peta sepanjang 16 cm.

Sopir truk menghitung jarak tempuh sebenarnya: Jarak sebenarnya = 16 cm x 1.250.000 = 20.000.000 cm = 200 km. Jika truk melaju dengan kecepatan rata-rata 50 km/jam, maka waktu yang dibutuhkan adalah: 200 km : 50 km/jam = 4 jam. Jika kecepatan dinaikkan menjadi 80 km/jam, waktu tempuh menjadi: 200 : 80 = 2,5 jam (2 jam 30 menit). Hubungan antara kecepatan dan waktu tempuh merupakan perbandingan berbalik nilai. Di perjalanan, truk menggunakan roda dengan diameter 100 cm (K = 3,14 x 100 = 314 cm = 3,14 m). Dalam menempuh jarak 200 km (200.000 meter), roda truk berputar sebanyak sekitar 63.694 kali.'],
                        ],
                        'questions' => [
                            [
                                'order' => 1,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Berdasarkan Stimulus 1 Paket C, berapa meter persegi luas kolam renang anak sebenarnya?',
                                'explanation' => 'L = 22/7 x 7 x 7 = 154 m².',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '154 m²', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '308 m²', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '44 m²', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '196 m²', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Berapa meter persegi luas lahan yang dialokasikan untuk taman bunga dan gazebo santai?',
                                'explanation' => '2/5 x 1.500 m² = 600 m².',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '600 m²', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '500 m²', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '750 m²', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '450 m²', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Pilihlah DUA pernyataan yang BENAR mengenai fasilitas taman rekreasi air!',
                                'explanation' => 'Diameter kolam = 14 m (r = 7 m); Keliling = 44 m.',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Diameter sebenarnya kolam renang adalah 14 meter.', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Keliling kolam renang adalah 44 meter.', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Luas area pujasera kuliner adalah 500 m².', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Skala denah 1 : 500 berarti 1 cm di denah mewakili 50 meter sebenarnya.', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan status kebenaran perhitungan fasilitas rekreasi!',
                                'explanation' => 'Total lahan adalah 1.500 m² (bukan 15.000 m²).',
                                'group_index' => 0,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Skala 1 : 500 berarti 1 cm di denah sama dengan 5 meter sebenarnya.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Luas area pujasera 20 m x 15 m adalah 300 m².', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Total lahan kawasan rekreasi adalah 15.000 m².', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Keliling kolam renang berdiameter 14 m adalah 44 m.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Berdasarkan Stimulus 2, berapa kilogram biji kopi kering yang dihasilkan dari 6 ton buah kopi basah?',
                                'explanation' => '1/5 x 6.000 kg = 1.200 kg.',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '1.200 kg', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '1.500 kg', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '1.000 kg', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '2.000 kg', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Berapa banyak karung goni berisi 30 kg yang dibutuhkan untuk mengemas seluruh biji kopi kualitas super?',
                                'explanation' => '720 kg : 30 kg = 24 karung.',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '24 karung', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '20 karung', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '25 karung', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '30 karung', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => 'Jodohkan data komoditas kopi dengan nilainya!',
                                'explanation' => 'Data hasil pengolahan komoditas kopi.',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'Total buah kopi basah', 'is_correct' => false, 'match_key' => '6.000 kg (6 ton)', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Total biji kopi kering (1 : 5)', 'is_correct' => false, 'match_key' => '1.200 kg', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Biji kopi kualitas super (3 bagian)', 'is_correct' => false, 'match_key' => '720 kg', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Biji kopi kualitas reguler (2 bagian)', 'is_correct' => false, 'match_key' => '480 kg', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan status kebenaran perhitungan kopi koperasi!',
                                'explanation' => 'Kualitas super (720 kg) lebih banyak dari reguler (480 kg).',
                                'group_index' => 1,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Rasio rendemen 1 : 5 berarti berat biji kopi adalah 20% dari buah basah.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Kopi kualitas super berjumlah 720 kg.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Kopi kualitas reguler lebih banyak daripada kualitas super.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Karung goni yang dibutuhkan untuk kualitas super adalah 24 buah.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Berdasarkan Stimulus 3, berapa kilometer jarak sebenarnya yang ditempuh truk kontainer tersebut?',
                                'explanation' => '16 x 12,5 km = 200 km.',
                                'group_index' => 2,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '200 km', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '180 km', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '250 km', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '160 km', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Berapa lama waktu tempuh truk jika melaju dengan kecepatan rata-rata 50 km/jam?',
                                'explanation' => '200 : 50 = 4 jam.',
                                'group_index' => 2,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '4 jam', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '3,5 jam', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '4,5 jam', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '5 jam', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 11,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Pilihlah DUA pernyataan yang BENAR mengenai perjalanan truk distribusi!',
                                'explanation' => 'Jarak = 200 km; hubungan kecepatan-waktu adalah berbalik nilai.',
                                'group_index' => 2,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Jarak sebenarnya antara pusat logistik dan gudang cabang adalah 200 km.', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Hubungan antara kecepatan kendaraan dan waktu tempuh adalah perbandingan berbalik nilai.', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Truk membutuhkan waktu 10 jam jika melaju 50 km/jam.', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Skala peta 1 : 1.250.000 berarti 1 cm mewakili 125 km.', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 12,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan status kebenaran prinsip perbandingan ekspedisi!',
                                'explanation' => 'Kecepatan dan waktu adalah perbandingan berbalik nilai.',
                                'group_index' => 2,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Jika kecepatan dinaikkan dari 50 ke 80 km/jam, waktu perjalanan berkurang.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Jarak pada peta 16 cm mewakili 200 km pada skala 1 : 1.250.000.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Kecepatan dan waktu tempuh adalah perbandingan senilai.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Keliling roda berdiameter 100 cm adalah 314 cm (3,14 m).', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 13,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Hasil dari 2 1/2 x 0,8 + 1 1/4 adalah ....',
                                'explanation' => '2,5 x 0,8 + 1,25 = 2,0 + 1,25 = 3,25.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '3,25', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '3,5', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '2,75', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '3,75', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 14,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Hasil dari 3 3/4 : 1,25 - 0,5 adalah ....',
                                'explanation' => '3,75 : 1,25 = 3; 3 - 0,5 = 2,5.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '2,5', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '3', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '2', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '1,5', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 15,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Bentuk paling sederhana dari perbandingan 48 : 72 adalah ....',
                                'explanation' => 'Dibagi 24 -> 2 : 3.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '2 : 3', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '3 : 4', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '4 : 5', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '1 : 2', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 16,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Perbandingan umur Ayah, Ibu, dan Anak adalah 8 : 7 : 3. Jika umur Anak 12 tahun, umur Ayah adalah ....',
                                'explanation' => '12 : 3 x 8 = 32 tahun.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '32 tahun', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '28 tahun', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '36 tahun', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '40 tahun', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 17,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Sebuah mobil membutuhkan 6 liter bensin untuk 72 km. Untuk menempuh 180 km, bensin yang dibutuhkan adalah ....',
                                'explanation' => '180 : 72 x 6 = 2,5 x 6 = 15 liter.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '15 liter', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '12 liter', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '18 liter', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '20 liter', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 18,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Suatu pekerjaan selesai dalam 20 hari oleh 9 pekerja. Jika pekerja ditambah 3 orang (menjadi 12 orang), pekerjaan selesai dalam ....',
                                'explanation' => '20 x 9 : 12 = 180 : 12 = 15 hari.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '15 hari', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '16 hari', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '12 hari', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '18 hari', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 19,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Jarak pada peta berskala 1 : 2.500.000 adalah 4,8 cm. Jarak sebenarnya adalah ....',
                                'explanation' => '4,8 x 25 km = 120 km.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '120 km', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '100 km', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '125 km', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '150 km', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 20,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Keliling lingkaran yang memiliki diameter 28 cm (pi = 22/7) adalah ....',
                                'explanation' => 'K = 22/7 x 28 = 88 cm.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '88 cm', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '44 cm', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '176 cm', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '616 cm', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 21,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Luas lingkaran yang memiliki jari-jari 21 cm (pi = 22/7) adalah ....',
                                'explanation' => 'L = 22/7 x 21 x 21 = 1.386 cm².',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '1.386 cm²', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '616 cm²', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '154 cm²', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '2.464 cm²', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 22,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Sebuah juring lingkaran memiliki sudut pusat 90° dan jari-jari 7 cm. Luas juring adalah ....',
                                'explanation' => '1/4 x 154 = 38,5 cm².',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '38,5 cm²', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '77 cm²', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '154 cm²', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '44 cm²', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 23,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Pilihlah DUA pernyataan yang BENAR mengenai perbandingan dan skala!',
                                'explanation' => 'Skala = JP/JS; 1 : 100.000 = 1 cm mewakili 1 km.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Skala peta adalah perbandingan jarak peta terhadap jarak sebenarnya.', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Jika skala 1 : 100.000, maka 1 cm di peta mewakili 1 km di lapangan.', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Perbandingan berbalik nilai menghasilkan grafik yang selalu naik lurus.', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Skala denah rumah biasanya bernilai 1 : 1.000.000.', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 24,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Pilihlah DUA unsur lingkaran yang merupakan garis lurus!',
                                'explanation' => 'Diameter dan tali busur adalah garis lurus.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Diameter', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Tali busur', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Busur lingkaran', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Juring', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 25,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Pilihlah DUA bentuk yang senilai dengan 75%!',
                                'explanation' => '75% = 3/4 = 0,75.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '3/4', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '0,75', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '4/5', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '0,7', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 26,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => 'Jodohkan operasi hitung dengan hasilnya!',
                                'explanation' => 'Operasi pecahan campuran.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '1/2 x 0,4', 'is_correct' => false, 'match_key' => '0,2', 'order' => 1],
                                    ['label' => null, 'option_text' => '0,9 : 3/10', 'is_correct' => false, 'match_key' => '3', 'order' => 2],
                                    ['label' => null, 'option_text' => '1 1/4 + 0,75', 'is_correct' => false, 'match_key' => '2', 'order' => 3],
                                    ['label' => null, 'option_text' => '2 - 1/4 x 4', 'is_correct' => false, 'match_key' => '1', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 27,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => 'Jodohkan istilah lingkaran dengan pengertiannya!',
                                'explanation' => 'Unsur lingkaran dan definisinya.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'Jari-jari', 'is_correct' => false, 'match_key' => 'Garis dari titik pusat ke lengkungan lingkaran', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Diameter', 'is_correct' => false, 'match_key' => 'Garis yang membelah lingkaran melalui titik pusat', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Juring', 'is_correct' => false, 'match_key' => 'Daerah diapit dua jari-jari dan satu busur', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Apotema', 'is_correct' => false, 'match_key' => 'Garis tegak lurus dari titik pusat ke tali busur', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 28,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => 'Jodohkan nilai jari-jari dengan luas lingkarannya (pi = 22/7)!',
                                'explanation' => 'Jari-jari dan luas lingkaran.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'r = 7 cm', 'is_correct' => false, 'match_key' => '154 cm²', 'order' => 1],
                                    ['label' => null, 'option_text' => 'r = 14 cm', 'is_correct' => false, 'match_key' => '616 cm²', 'order' => 2],
                                    ['label' => null, 'option_text' => 'r = 21 cm', 'is_correct' => false, 'match_key' => '1.386 cm²', 'order' => 3],
                                    ['label' => null, 'option_text' => 'r = 28 cm', 'is_correct' => false, 'match_key' => '2.464 cm²', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 29,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan status kebenaran materi matematika Semester 1!',
                                'explanation' => 'Sudut keliling putaran penuh lingkaran adalah 360° (bukan 180°).',
                                'group_index' => null,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Diameter lingkaran selalu dua kali panjang jari-jarinya.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Nilai 25% dari 400 adalah 100.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Perbandingan 1 km : 200 m adalah 5 : 1.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Sebuah lingkaran memiliki sudut keliling penuh sebesar 180°.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 30,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan status kebenaran perhitungan terapan!',
                                'explanation' => 'Kecepatan dan waktu adalah perbandingan berbalik nilai.',
                                'group_index' => null,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Luas lingkaran dengan r = 10 cm (pi = 3,14) adalah 314 cm².', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Keliling lingkaran dengan d = 14 cm (pi = 22/7) adalah 44 cm.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Jika 4 kg telur Rp80.000, maka 7 kg telur Rp140.000.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Hubungan kecepatan dan waktu tempuh adalah perbandingan senilai.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 4],
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
                                'prompt' => 'Hasil dari 3/4 x 1,6 adalah ....',
                                'explanation' => '3/4 x 16/10 = 12/10 = 1,2.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '1,2', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Hasil dari 2 1/2 : 0,25 adalah ....',
                                'explanation' => '2,5 : 0,25 = 10.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '10', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Bentuk paling sederhana dari perbandingan 35 : 49 adalah ....',
                                'explanation' => '5 : 7.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '5 : 7', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Perbandingan umur A dan B adalah 2 : 3. Jika jumlah umur mereka 30 tahun, umur A adalah ... tahun.',
                                'explanation' => '2/5 x 30 = 12 tahun.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '12', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Sebuah pekerjaan selesai 12 hari oleh 5 orang. Oleh 6 orang selesai dalam ... hari.',
                                'explanation' => '12 x 5 : 6 = 10 hari.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '10', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Jarak pada peta 4 cm dengan skala 1 : 500.000 sama dengan ... km sebenarnya.',
                                'explanation' => '4 x 5 km = 20 km.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '20', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Keliling lingkaran dengan r = 14 cm (pi = 22/7) adalah ... cm.',
                                'explanation' => '2 x 22/7 x 14 = 88 cm.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '88', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Luas lingkaran dengan r = 7 cm (pi = 22/7) adalah ... cm².',
                                'explanation' => '22/7 x 7 x 7 = 154 cm².',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '154', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Daerah lingkaran yang dibatasi oleh dua jari-jari dan sebuah busur disebut ....',
                                'explanation' => 'juring.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'juring', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Daerah lingkaran yang dibatasi oleh tali busur dan busurnya disebut ....',
                                'explanation' => 'tembereng.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'tembereng', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 11,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Bentuk persen dari 4/25 adalah ...%.',
                                'explanation' => '4/25 x 100% = 16%.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '16', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 12,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Sebuah roda berdiameter 70 cm berputar 100 kali menempuh jarak ... meter.',
                                'explanation' => 'K = 220 cm = 2,2 m; 100 x 2,2 = 220 meter.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '220', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 13,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Sudut pusat satu putaran penuh pada lingkaran adalah ... derajat.',
                                'explanation' => '360 derajat.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '360', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 14,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Jika diameter lingkaran 40 cm, maka panjang jari-jarinya adalah ... cm.',
                                'explanation' => '40 : 2 = 20 cm.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '20', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 15,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Bentuk desimal dari 3/8 adalah ....',
                                'explanation' => '0,375.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '0,375', 'is_correct' => true, 'match_key' => null, 'order' => 1],
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
                                'prompt' => 'Sebuah yayasan sosial menerima sumbangan beras seberat 2,4 ton. Sebanyak 3/8 bagian dibagikan ke panti asuhan, 30% dibagikan ke warga lansia kurang mampu, dan sisanya dibagikan ke 15 keluarga terdampak bencana banjir. Tentukan:
(a) Berat beras untuk panti asuhan (kg)
(b) Berat beras untuk warga lansia (kg)
(c) Sisa beras untuk keluarga korban banjir (kg)
(d) Berat beras yang diterima setiap keluarga korban banjir (kg)',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Total beras = 2,4 ton = 2.400 kg.
(a) Panti asuhan = 3/8 x 2.400 kg = 900 kg.
(b) Warga lansia = 30% x 2.400 kg = 720 kg.
(c) Sisa beras = 2.400 - (900 + 720) = 2.400 - 1.620 = 780 kg.
(d) Setiap keluarga korban = 780 kg : 15 keluarga = 52 kg beras.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                            [
                                'order' => 2,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => 'Perbandingan banyak kelereng merah dan kelereng biru adalah 4 : 5, sedangkan perbandingan kelereng biru dan kelereng kuning adalah 2 : 3. Jika jumlah kelereng merah adalah 40 butir, tentukan:
(a) Banyak kelereng biru
(b) Banyak kelereng kuning
(c) Jumlah seluruh kelereng ketiga warna tersebut',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
(a) Kelereng biru = 5/4 x Kelereng merah = 5/4 x 40 = 50 butir.
(b) Kelereng kuning: Rasio Biru : Kuning = 2 : 3. Karena biru = 50, maka kuning = 3/2 x 50 = 75 butir.
(c) Total kelereng = 40 (merah) + 50 (biru) + 75 (kuning) = 165 butir.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                            [
                                'order' => 3,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => 'Suatu proyek pembangunan jembatan direncanakan selesai dalam 30 hari oleh 12 orang pekerja. Setelah bekerja selama 10 hari, proyek dihentikan selama 5 hari karena hujan lebat. Jika jembatan harus selesai sesuai rencana semula, berapa orang pekerja tambahan yang diperlukan?',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Beban total = 30 x 12 = 360 hari-orang.
Beban selesai = 10 x 12 = 120 hari-orang.
Sisa beban = 360 - 120 = 240 hari-orang.
Sisa waktu = 30 - 10 - 5 = 15 hari.
Pekerja yang dibutuhkan = 240 : 15 = 16 orang pekerja.
Pekerja tambahan = 16 - 12 = 4 orang pekerja tambahan.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                            [
                                'order' => 4,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => 'Sebuah taman kota berbentuk lingkaran memiliki diameter 28 meter. Di sekeliling taman tersebut dibuat jalan setapak selebar 3,5 meter mengelilingi taman (sehingga jari-jari luar menjadi 14 + 3,5 = 17,5 meter). Tentukan:
(a) Luas taman bunga bagian dalam (r = 14 m)
(b) Luas seluruh area termasuk jalan setapak (R = 17,5 m)
(c) Luas jalan setapak saja
(d) Jika jalan setapak dipasang paving block dengan biaya Rp80.000 per m², hitung total biaya pemasangan paving block!',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
(a) Luas taman dalam = 22/7 x 14 x 14 = 616 m².
(b) Luas area luar (R = 17,5 m = 35/2 m) = 22/7 x 35/2 x 35/2 = 11 x 5 x 35 / 2 = 1.925 / 2 = 962,5 m².
(c) Luas jalan setapak = Luas luar - Luas dalam = 962,5 - 616 = 346,5 m².
(d) Biaya paving = 346,5 m² x Rp80.000 = Rp27.720.000.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                            [
                                'order' => 5,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => 'Sebuah sepeda memiliki roda dengan diameter 56 cm. Sepeda tersebut dikendarai melintasi rute lurus sejauh 1,76 kilometer. Hitunglah:
(a) Keliling roda sepeda tersebut (meter)
(b) Berapa kali roda sepeda tersebut berputar selama perjalanan?',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
(a) Keliling roda = pi x d = 22/7 x 56 cm = 176 cm = 1,76 meter.
(b) Jarak tempuh = 1,76 km = 1.760 meter.
    Banyak putaran roda = Jarak : Keliling roda = 1.760 m : 1,76 m = 1.000 kali putaran.
Jadi, keliling roda adalah 1,76 meter dan roda berputar sebanyak 1.000 kali.',
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
