<?php

namespace Database\Seeders\Data;

class MatematikaGrade6Bab3Data
{
    /**
     * Data bundle asesmen Kelas 6 SD Kurikulum Merdeka Fase C.
     */
    public static function getAssessments(): array
    {
        return [
            [
                'title' => 'Quiz 1 Bab 3: Unsur-unsur Geometri Lingkaran',
                'type' => 'quiz',
                'description' => 'Asesmen formatif Matematika Kelas 6 Bab 3 Quiz 1. Menguji penguasaan unsur-unsur lingkaran (titik pusat, jari-jari, diameter, busur, tali busur, juring, tembereng, apotema).',
                'duration_minutes' => 60,
                'sections' => [
                    [
                        'title' => 'Bagian 1: Objektif Beragam (Pilihan Ganda, Pilihan Ganda Kompleks, Menjodohkan, Benar-Salah)',
                        'instructions' => 'Pilihlah dan jawablah soal-soal objektif berikut secara cermat dan teliti.',
                        'order' => 1,
                        'question_groups' => [
                            ['title' => 'Stimulus 1: Menelaah Komponen Roda Sepeda Ontel Kuno', 'content' => '[Keterangan Gambar: Ilustrasi roda sepeda ontel kuno dengan poros pusat roda, jari-jari kawat ruji-ruji, ban melingkar luar, dan juring reflektor lampu.]
Dalam pameran cagar budaya transportasi, sebuah sepeda ontel kuno buatan tahun 1940 menarik perhatian para siswa kelas 6. Guru matematika, Pak Suryo, memanfaatkan roda sepeda tersebut untuk menjelaskan konsep geometri unsur-unsur lingkaran secara nyata.

Pak Suryo menjelaskan: "Poros besi tepat di tengah roda merupakan titik pusat lingkaran. Kawat ruji-ruji lurus yang menghubungkan poros pusat ke pinggiran pelek roda merupakan jari-jari (r). Jika dua ruji membentuk garis lurus yang membelah roda melalui titik pusat, garis itu dinamakan diameter (d). Panjang diameter selalu dua kali panjang jari-jari (d = 2r). Pinggiran karet ban yang melengkung merupakan busur lingkaran. Daerah permukaan segitiga melengkung di antara dua ruji dan busur dinamakan juring, sedangkan tali lurus yang menghubungkan dua titik pada busur dinamakan tali busur. Garis terpendek tegak lurus dari titik pusat ke tali busur disebut apotema." Siswa mencatat setiap komponen lingkaran dengan antusias.'],
                            ['title' => 'Stimulus 2: Taman Bunga Jam Gadang dan Desain Geometri', 'content' => '[Keterangan Gambar: Denah taman bunga berbentuk lingkaran dengan tugu jam di pusat: Daerah tembereng ditanami rumput hias hijau, daerah juring ditanami bunga mawar merah, dan garis apotema dibuat jalan setapak paving.]
Taman kota di alun-alun dirancang arsitek dengan denah geometri lingkaran berdiameter 28 meter. Tugu jam kota berdiri kokoh tepat di titik pusat taman (titik O).

Arsitek membagi area taman menjadi beberapa zona tematik. Zona A berupa juring seluas seperempat lingkaran (sudut 90 derajat) yang ditanami mawar merah merekah. Zona B berupa tembereng, yaitu daerah yang dibatasi oleh tali busur AB dan busur AB, yang ditanami rumput gajah mini berhias lampu taman. Garis apotema OD dibuat sebagai jalan setapak berbatu kerikil selebar 1 meter yang tegak lurus dengan tali busur AB. Pengunjung dapat menikmati keindahan tata ruang taman sambil mempelajari aplikasi praktis geometri lingkaran.'],
                        ],
                        'questions' => [
                            [
                                'order' => 1,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Berdasarkan Stimulus 1, garis lurus yang menghubungkan titik pusat lingkaran dengan titik pada lengkungan lingkaran adalah ....',
                                'explanation' => 'Garis dari pusat ke lengkungan lingkaran adalah jari-jari.',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Jari-jari (r)', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Diameter (d)', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Tali busur', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Apotema', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Daerah di dalam lingkaran yang dibatasi oleh dua jari-jari dan sebuah busur lingkaran disebut ....',
                                'explanation' => 'Daerah antara dua jari-jari dan satu busur adalah juring.',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Juring', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Tembereng', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Apotema', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Sudut keliling', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Pilihlah DUA pernyataan yang BENAR mengenai unsur-unsur lingkaran!',
                                'explanation' => 'd = 2r; garis tegak lurus pusat ke tali busur adalah apotema.',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Panjang diameter lingkaran selalu dua kali panjang jari-jarinya (d = 2r).', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Garis tegak lurus dari titik pusat ke tali busur dinamakan apotema.', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Tembereng dibatasi oleh dua buah diameter lingkaran.', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Titik pusat lingkaran terletak pada garis lengkung busur.', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan status kebenaran unsur-unsur lingkaran!',
                                'explanation' => 'Jari-jari adalah setengah dari diameter (lebih pendek).',
                                'group_index' => 0,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Poros tengah roda sepeda melambangkan titik pusat lingkaran.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Tali busur terpanjang pada lingkaran adalah diameter.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Jari-jari lingkaran selalu lebih panjang daripada diameternya.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Busur lingkaran berupa garis lengkung pada keliling lingkaran.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Berdasarkan Stimulus 2, daerah pada lingkaran yang dibatasi oleh sebuah tali busur dan busurnya disebut ....',
                                'explanation' => 'Daerah antara tali busur dan busur adalah tembereng.',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Tembereng', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Juring', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Apotema', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Jari-jari', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Jika diameter taman adalah 28 meter, maka panjang jari-jari taman tersebut adalah ....',
                                'explanation' => 'r = d / 2 = 28 / 2 = 14 meter.',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '14 meter', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '7 meter', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '21 meter', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '28 meter', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => 'Jodohkan unsur lingkaran dengan pengertiannya!',
                                'explanation' => 'Unsur-unsur geometri lingkaran.',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'Titik Pusat', 'is_correct' => false, 'match_key' => 'Titik tepat di tengah lingkaran yang berjarak sama ke semua sisi', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Diameter', 'is_correct' => false, 'match_key' => 'Garis lurus yang menghubungkan dua titik pada lingkaran melalui pusat', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Tali Busur', 'is_correct' => false, 'match_key' => 'Garis lurus yang menghubungkan dua titik pada lingkaran', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Apotema', 'is_correct' => false, 'match_key' => 'Jarak terpendek tegak lurus dari titik pusat ke tali busur', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan status kebenaran bagian-bagian taman lingkaran!',
                                'explanation' => 'Diameter taman adalah 28 meter (jari-jarinya 14 meter).',
                                'group_index' => 1,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Tembereng dibatasi oleh tali busur dan busur lingkaran.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Juring seperempat lingkaran memiliki sudut pusat 90 derajat.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Diameter taman adalah 14 meter.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Jari-jari taman adalah setengah dari diameternya.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Garis lurus terpanjang yang menghubungkan dua titik pada lingkaran dinamakan ....',
                                'explanation' => 'Diameter adalah tali busur terpanjang melalui pusat.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Diameter', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Tali busur', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Apotema', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Jari-jari', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Jika panjang jari-jari sebuah lingkaran 15 cm, panjang diameternya adalah ....',
                                'explanation' => 'd = 2 x 15 = 30 cm.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '30 cm', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '25 cm', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '45 cm', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '7,5 cm', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 11,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Jika panjang diameter sebuah lingkaran 24 cm, panjang jari-jarinya adalah ....',
                                'explanation' => 'r = 24 : 2 = 12 cm.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '12 cm', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '48 cm', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '16 cm', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '18 cm', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 12,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Bagian lingkaran berupa ruas garis lengkung disebut ....',
                                'explanation' => 'Garis lengkung adalah busur.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Busur', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Tali busur', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Apotema', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Juring', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 13,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Garis tegak lurus yang menghubungkan titik pusat lingkaran dengan tali busur dinamakan ....',
                                'explanation' => 'Apotema.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Apotema', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Jari-jari', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Diameter', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Busur', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 14,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Daerah yang dibatasi oleh dua buah jari-jari dan sebuah busur dinamakan ....',
                                'explanation' => 'Juring.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Juring', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Tembereng', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Sudut pusat', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Segitiga', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 15,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Pilihlah DUA unsur lingkaran yang berupa DAERAH (bidang dua dimensi)!',
                                'explanation' => 'Juring dan tembereng adalah daerah/luasan.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Juring lingkaran', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Tembereng lingkaran', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Tali busur', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Diameter', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 16,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Pilihlah DUA unsur lingkaran yang berupa RUAS GARIS LURUS!',
                                'explanation' => 'Jari-jari dan tali busur adalah ruas garis lurus.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Jari-jari (r)', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Tali busur', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Busur lingkaran', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Tembereng', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 17,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => 'Jodohkan lambang unsur lingkaran dengan istilahnya!',
                                'explanation' => 'Simbol dan istilah lingkaran.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'r', 'is_correct' => false, 'match_key' => 'Jari-jari lingkaran', 'order' => 1],
                                    ['label' => null, 'option_text' => 'd', 'is_correct' => false, 'match_key' => 'Diameter lingkaran', 'order' => 2],
                                    ['label' => null, 'option_text' => 'AB melengkung', 'is_correct' => false, 'match_key' => 'Busur lingkaran', 'order' => 3],
                                    ['label' => null, 'option_text' => 'OD tegak lurus', 'is_correct' => false, 'match_key' => 'Apotema', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 18,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => 'Jodohkan hubungan antarunsur lingkaran!',
                                'explanation' => 'Hubungan matematis lingkaran.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'd', 'is_correct' => false, 'match_key' => '2 x r', 'order' => 1],
                                    ['label' => null, 'option_text' => 'r', 'is_correct' => false, 'match_key' => '1/2 x d', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Sudut satu putaran penuh', 'is_correct' => false, 'match_key' => '360 derajat', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Sudut setengah lingkaran', 'is_correct' => false, 'match_key' => '180 derajat', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 19,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan status kebenaran unsur geometri lingkaran!',
                                'explanation' => 'Lingkaran memiliki tak terhingga banyaknya tali busur.',
                                'group_index' => null,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Semua jari-jari pada lingkaran yang sama memiliki panjang yang sama.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Sebuah lingkaran hanya memiliki satu buah tali busur.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Diameter selalu membagi lingkaran menjadi dua bagian yang sama besar.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Titik pusat berada tepat di tengah-tengah lingkaran.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 20,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan kebenaran pernyataan perbandingan sudut lingkaran!',
                                'explanation' => 'Satu putaran lingkaran penuh memiliki total sudut 360°.',
                                'group_index' => null,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Juring setengah lingkaran memiliki sudut pusat 180°.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Juring seperempat lingkaran memiliki sudut pusat 90°.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Satu lingkaran penuh memiliki total sudut 180°.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Juring sepertiga lingkaran memiliki sudut pusat 120°.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 4],
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
                                'prompt' => 'Ruas garis yang menghubungkan titik pusat dengan titik pada lengkungan lingkaran adalah ....',
                                'explanation' => 'jari-jari (r).',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'jari-jari', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Garis lurus yang menghubungkan dua titik pada lingkaran dan melalui titik pusat disebut ....',
                                'explanation' => 'diameter (d).',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'diameter', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Jika panjang jari-jari 18 cm, maka panjang diameter adalah ... cm.',
                                'explanation' => '2 x 18 = 36 cm.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '36', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Jika panjang diameter 50 cm, maka panjang jari-jari adalah ... cm.',
                                'explanation' => '50 : 2 = 25 cm.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '25', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Daerah yang dibatasi oleh tali busur dan busurnya disebut ....',
                                'explanation' => 'tembereng.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'tembereng', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Daerah yang dibatasi oleh dua jari-jari dan satu busur disebut ....',
                                'explanation' => 'juring.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'juring', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Garis tegak lurus dari titik pusat ke tali busur disebut ....',
                                'explanation' => 'apotema.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'apotema', 'is_correct' => true, 'match_key' => null, 'order' => 1],
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
                                'prompt' => 'Sebutkan dan jelaskan 5 unsur penting yang ada pada sebuah lingkaran (titik pusat, jari-jari, diameter, busur, juring) beserta fungsinya masing-masing!',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
1. Titik Pusat: Titik yang terletak tepat di tengah-tengah lingkaran yang berjarak sama ke semua titik pada lengkungan lingkaran.
2. Jari-jari (r): Ruas garis lurus yang menghubungkan titik pusat lingkaran dengan titik pada lengkungan lingkaran.
3. Diameter (d): Ruas garis lurus yang menghubungkan dua titik pada keliling lingkaran dan melewati titik pusat (panjangnya d = 2r).
4. Busur: Garis lengkung yang merupakan bagian dari keliling lingkaran.
5. Juring: Daerah luas di dalam lingkaran yang dibatasi oleh dua jari-jari dan satu busur lingkaran yang diapit kedua jari-jari tersebut.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                            [
                                'order' => 2,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => 'Jelaskan perbedaan mendasar antara "Juring" dan "Tembereng" pada sebuah lingkaran, sertakan gambaran unsur-unsur pembatas dari kedua daerah tersebut!',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Perbedaan mendasar:
1. Juring:
- Pembatas: Dibatasi oleh dua buah jari-jari lingkaran dan sebuah busur lingkaran di antaranya.
- Bentuk: Menyerupai potongan juring kue piza yang meruncing di titik pusat lingkaran.
2. Tembereng:
- Pembatas: Dibatasi oleh sebuah tali busur (garis lurus) dan busur lingkaran (garis lengkung) yang bersesuaian.
- Bentuk: Berupa tembereng lengkung di pinggiran lingkaran dan tidak menyentuh titik pusat lingkaran.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                            [
                                'order' => 3,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => 'Sebuah lingkaran memiliki diameter 40 cm. Di dalam lingkaran tersebut dibuat sebuah juring dengan sudut pusat 72 derajat. Tentukan:
(a) Panjang jari-jari lingkaran tersebut
(b) Pecahan yang menyatakan besar bagian juring tersebut terhadap satu putaran lingkaran penuh',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
(a) Jari-jari (r) = d : 2 = 40 cm : 2 = 20 cm.
(b) Pecahan juring = Sudut pusat / 360° = 72° / 360° = 1/5 bagian lingkaran.
Jadi, panjang jari-jari adalah 20 cm dan juring tersebut merupakan 1/5 bagian dari lingkaran penuh.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'title' => 'Quiz 2 Bab 3: Keliling dan Luas Lingkaran',
                'type' => 'quiz',
                'description' => 'Asesmen formatif Matematika Kelas 6 Bab 3 Quiz 2. Menguji perhitungan keliling dan luas lingkaran menggunakan pi = 22/7 dan 3,14, serta bangun datar gabungan lingkaran.',
                'duration_minutes' => 60,
                'sections' => [
                    [
                        'title' => 'Bagian 1: Objektif Beragam (Pilihan Ganda, Pilihan Ganda Kompleks, Menjodohkan, Benar-Salah)',
                        'instructions' => 'Pilihlah dan jawablah soal-soal objektif berikut secara cermat dan teliti.',
                        'order' => 1,
                        'question_groups' => [
                            ['title' => 'Stimulus 1: Menghitung Keliling dan Luas Kolam Air Mancur Taman', 'content' => '[Keterangan Gambar: Kolam air mancur berbentuk lingkaran dengan diameter 14 meter di alun-alun kota: Di sekeliling kolam dipasangi pagar pengaman besi dan lantai keramik anti-licin.]
Pemerintah kota mempercantik alun-alun dengan membangun kolam air mancur melingkar berdiameter 14 meter (jari-jari r = 7 meter). Untuk menjamin keselamatan pengunjung anak-anak, di sekeliling bibir kolam dipasang pagar pembatas besi tempa.

Petugas tata kota menghitung keliling kolam untuk menentukan panjang pagar besi: K = 2 x pi x r = 2 x 22/7 x 7 = 44 meter. Di sekeliling pagar besi dipasang lampu hias setiap jarak 2 meter, sehingga banyak lampu hias yang dipasang adalah 44 : 2 = 22 lampu. Sementara itu, dasar kolam dilapisi keramik biru anti-licin seluas: L = pi x r² = 22/7 x 7 x 7 = 154 m². Jika biaya pemasangan keramik adalah Rp200.000 per meter persegi, total biaya pengerjaan lantai keramik kolam adalah 154 x Rp200.000 = Rp30.800.000. Perhitungan geometri lingkaran yang teliti membantu efisiensi anggaran belanja daerah.'],
                            ['title' => 'Stimulus 2: Meja Bundar Rapat Kayu Jati Berputar', 'content' => '[Keterangan Gambar: Meja bundar rapat kantor dari kayu jati dengan piringan putar (lazy susan) di tengahnya: Diameter meja utama 200 cm (jari-jari 100 cm, pi = 3,14).]
Sebuah ruang rapat pimpinan dilengkapi dengan meja bundar elegan yang terbuat dari kayu jati berdiameter 200 cm (jari-jari r = 100 cm). Karena jari-jari meja bukan kelipatan 7, pengrajin kayu menggunakan pendekatan nilai pi = 3,14 dalam perhitungannya.

Pengrajin menghitung luas permukaan meja: L = pi x r² = 3,14 x 100 x 100 = 31.400 cm² (setara dengan 3,14 m²). Di sekeliling tepi luar meja dipasangi list pelindung kuningan sepanjang keliling meja: K = pi x d = 3,14 x 200 = 628 cm (atau 6,28 meter). Tepat di tengah meja diletakkan piringan putar kaca berdiameter 80 cm (jari-jari 40 cm) dengan luas: L = 3,14 x 40 x 40 = 5.024 cm². Mengetahui rumus lingkaran memudahkan penentuan kebutuhan bahan baku mebel dengan presisi tinggi.'],
                        ],
                        'questions' => [
                            [
                                'order' => 1,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Berdasarkan Stimulus 1, panjang pagar pembatas di sekeliling kolam (keliling kolam) adalah ....',
                                'explanation' => 'K = 2 x 22/7 x 7 = 44 meter.',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '44 meter', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '88 meter', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '154 meter', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '28 meter', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Berapa meter persegi luas lantai dasar kolam air mancur tersebut?',
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
                                'order' => 3,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Pilihlah DUA pernyataan yang BENAR mengenai perhitungan kolam air mancur!',
                                'explanation' => 'Lampu = 44 : 2 = 22 lampu; Biaya = 154 x 200.000 = Rp30.800.000.',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Banyak lampu hias yang dipasang di sekeliling kolam adalah 22 lampu.', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Biaya keramik lantai dasar kolam adalah Rp30.800.000.', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Panjang jari-jari kolam air mancur adalah 14 meter.', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Keliling kolam air mancur adalah 88 meter.', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan status kebenaran rumus lingkaran kolam!',
                                'explanation' => 'Untuk r kelipatan 7, nilai pi = 22/7 lebih mudah dan tepat.',
                                'group_index' => 0,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Rumus keliling lingkaran adalah K = 2 x pi x r atau K = pi x d.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Rumus luas lingkaran adalah L = pi x r².', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Nilai pi yang digunakan untuk r = 7 adalah 3,14.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Keliling kolam berdiameter 14 m adalah 44 m.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Berdasarkan Stimulus 2, berapa luas permukaan meja bundar kayu jati tersebut?',
                                'explanation' => 'L = 3,14 x 100 x 100 = 31.400 cm².',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '31.400 cm² (3,14 m²)', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '62.800 cm²', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '15.700 cm²', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '6.280 cm²', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Berapa sentimeter panjang list kuningan pelindung tepi meja (keliling meja)?',
                                'explanation' => 'K = 3,14 x 200 = 628 cm.',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '628 cm (6,28 meter)', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '314 cm', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '1.256 cm', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '500 cm', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => 'Jodohkan data meja bundar dengan nilai perhitungannya!',
                                'explanation' => 'Perhitungan meja bundar jati.',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'Jari-jari meja utama (r = 100 cm)', 'is_correct' => false, 'match_key' => 'Luas meja = 31.400 cm²', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Diameter meja utama (d = 200 cm)', 'is_correct' => false, 'match_key' => 'Keliling meja = 628 cm', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Jari-jari piringan putar (r = 40 cm)', 'is_correct' => false, 'match_key' => 'Luas piringan = 5.024 cm²', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Nilai pendekatan pi yang dipakai', 'is_correct' => false, 'match_key' => '3,14', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan status kebenaran perhitungan meja bundar!',
                                'explanation' => 'Luas piringan kaca (5.024 cm²) jauh lebih kecil dari meja (31.400 cm²).',
                                'group_index' => 1,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Penggunaan pi = 3,14 mempermudah perhitungan jari-jari kelipatan 10 atau 100.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Panjang list kuningan sama dengan keliling meja.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Luas piringan kaca lebih besar dari luas meja utama.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Luas lingkaran menggunakan satuan pangkat dua (persegi).', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Keliling lingkaran dengan jari-jari 14 cm (pi = 22/7) adalah ....',
                                'explanation' => 'K = 2 x 22/7 x 14 = 88 cm.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '88 cm', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '44 cm', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '154 cm', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '616 cm', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Luas lingkaran dengan jari-jari 14 cm (pi = 22/7) adalah ....',
                                'explanation' => 'L = 22/7 x 14 x 14 = 616 cm².',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '616 cm²', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '154 cm²', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '308 cm²', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '88 cm²', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 11,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Keliling lingkaran dengan diameter 20 cm (pi = 3,14) adalah ....',
                                'explanation' => 'K = 3,14 x 20 = 62,8 cm.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '62,8 cm', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '31,4 cm', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '125,6 cm', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '314 cm', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 12,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Luas lingkaran dengan diameter 20 cm (pi = 3,14) adalah ....',
                                'explanation' => 'r = 10. L = 3,14 x 10 x 10 = 314 cm².',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '314 cm²', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '628 cm²', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '157 cm²', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '62,8 cm²', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 13,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Sebuah lingkaran memiliki keliling 44 cm. Panjang jari-jari lingkaran tersebut (pi = 22/7) adalah ....',
                                'explanation' => 'r = 44 / (2 x 22/7) = 44 / (44/7) = 7 cm.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '7 cm', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '14 cm', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '3,5 cm', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '10 cm', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 14,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Luas setengah lingkaran dengan jari-jari 7 cm adalah ....',
                                'explanation' => '1/2 x 22/7 x 7 x 7 = 1/2 x 154 = 77 cm².',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '77 cm²', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '154 cm²', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '44 cm²', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '88 cm²', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 15,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Pilihlah DUA rumus keliling lingkaran yang BENAR!',
                                'explanation' => 'K = 2 x pi x r dan K = pi x d.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'K = 2 x pi x r', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'K = pi x d', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'K = pi x r²', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'K = 2 x pi x d', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 16,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Pilihlah DUA nilai pendekatan konstanta pi yang umum digunakan!',
                                'explanation' => '22/7 dan 3,14 adalah pendekatan pi.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '22/7', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '3,14', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '3 1/2', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '24/7', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 17,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => 'Jodohkan jari-jari lingkaran dengan luasnya (pi = 22/7)!',
                                'explanation' => 'Jari-jari dan luas lingkaran kelipatan 7.',
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
                                'order' => 18,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => 'Jodohkan diameter dengan kelilingnya (pi = 22/7)!',
                                'explanation' => 'Diameter dan keliling lingkaran.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'd = 7 cm', 'is_correct' => false, 'match_key' => '22 cm', 'order' => 1],
                                    ['label' => null, 'option_text' => 'd = 14 cm', 'is_correct' => false, 'match_key' => '44 cm', 'order' => 2],
                                    ['label' => null, 'option_text' => 'd = 21 cm', 'is_correct' => false, 'match_key' => '66 cm', 'order' => 3],
                                    ['label' => null, 'option_text' => 'd = 28 cm', 'is_correct' => false, 'match_key' => '88 cm', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 19,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan status kebenaran sifat keliling dan luas lingkaran!',
                                'explanation' => 'K = 3,14 x 10 = 31,4 cm (bukan 314 cm).',
                                'group_index' => null,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Jika jari-jari diperbesar 2 kali, keliling menjadi 2 kali lipat.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Jika jari-jari diperbesar 2 kali, luas menjadi 4 kali lipat (2²).', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Luas lingkaran berbanding lurus dengan kuadrat jari-jarinya.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Keliling lingkaran dengan diameter 10 cm adalah 314 cm.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 20,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan kebenaran perhitungan luas bagian lingkaran!',
                                'explanation' => 'Satuan keliling (cm) dan luas (cm²) berbeda konsep.',
                                'group_index' => null,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Luas seperempat lingkaran = 1/4 x pi x r².', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Luas tiga perempat lingkaran = 3/4 x pi x r².', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Luas setengah lingkaran dengan r = 14 cm adalah 308 cm².', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Keliling setengah lingkaran sama persis dengan luasnya.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 4],
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
                                'prompt' => 'Rumus keliling lingkaran dengan jari-jari r adalah K = 2 x ... x r.',
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
                                'prompt' => 'Keliling lingkaran dengan r = 7 cm (pi = 22/7) adalah ... cm.',
                                'explanation' => '2 x 22/7 x 7 = 44 cm.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '44', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 3,
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
                                'order' => 4,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Keliling lingkaran dengan d = 10 cm (pi = 3,14) adalah ... cm.',
                                'explanation' => '3,14 x 10 = 31,4 cm.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '31,4', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Luas lingkaran dengan r = 10 cm (pi = 3,14) adalah ... cm².',
                                'explanation' => '3,14 x 10 x 10 = 314 cm².',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '314', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Luas seperempat lingkaran dengan r = 14 cm adalah ... cm².',
                                'explanation' => '1/4 x 616 = 154 cm².',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '154', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Nilai pendekatan pi yang tepat untuk bilangan kelipatan 7 adalah ....',
                                'explanation' => '22/7.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '22/7', 'is_correct' => true, 'match_key' => null, 'order' => 1],
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
                                'prompt' => 'Sebuah taman bunga berbentuk lingkaran memiliki diameter 28 meter. Di dalam taman tersebut terdapat kolam air berbentuk lingkaran dengan diameter 14 meter tepat di tengahnya. Sisa lahan taman di luar kolam akan ditanami rumput hias hijau. Tentukan:
(a) Luas taman seluruhnya
(b) Luas kolam air
(c) Luas lahan taman yang ditanami rumput hias
(d) Jika biaya rumput Rp25.000 per m², hitung total biaya penanaman rumput!',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
(a) Jari-jari taman R = 14 m. Luas taman = 22/7 x 14 x 14 = 616 m².
(b) Jari-jari kolam r = 7 m. Luas kolam = 22/7 x 7 x 7 = 154 m².
(c) Luas rumput = Luas taman - Luas kolam = 616 m² - 154 m² = 462 m².
(d) Biaya rumput = 462 m² x Rp25.000 = Rp11.550.000.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                            [
                                'order' => 2,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => 'Hitunglah keliling dan luas dari bangun gabungan berikut:
Sebuah persegi berukuran sisi 14 cm yang pada salah satu sisinya berimpit dengan diameter setengah lingkaran di bagian luar. (Gunakan pi = 22/7)!',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Langkah penyelesaian:
1. Bangun terdiri dari persegi (sisi s = 14 cm) dan setengah lingkaran (diameter d = 14 cm, r = 7 cm).
2. Keliling bangun (garis batas luar):
   - 3 sisi persegi = 3 x 14 cm = 42 cm
   - Busur setengah lingkaran = 1/2 x (pi x d) = 1/2 x (22/7 x 14) = 1/2 x 44 = 22 cm
   - Total Keliling = 42 + 22 = 64 cm.
3. Luas bangun:
   - Luas persegi = 14 x 14 = 196 cm²
   - Luas setengah lingkaran = 1/2 x pi x r² = 1/2 x 22/7 x 7 x 7 = 77 cm²
   - Total Luas = 196 + 77 = 273 cm².',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                            [
                                'order' => 3,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => 'Sebuah lingkaran memiliki luas 1.256 cm². Hitunglah:
(a) Jari-jari lingkaran tersebut (gunakan pi = 3,14)
(b) Diameter lingkaran tersebut
(c) Keliling lingkaran tersebut',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
(a) L = pi x r² -> 1.256 = 3,14 x r² -> r² = 1.256 : 3,14 = 400 -> r = akar(400) = 20 cm.
(b) Diameter d = 2 x r = 2 x 20 cm = 40 cm.
(c) Keliling K = 2 x pi x r = 2 x 3,14 x 20 = 125,6 cm (atau 3,14 x 40 = 125,6 cm).',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'title' => 'Quiz 3 Bab 3: Penerapan Geometri Lingkaran dalam Kehidupan Nyata',
                'type' => 'quiz',
                'description' => 'Asesmen formatif Matematika Kelas 6 Bab 3 Quiz 3. Menguji pemecahan masalah putaran roda kendaraan, lintasan atletik stadion, dan perhitungan busur serta juring lingkaran.',
                'duration_minutes' => 60,
                'sections' => [
                    [
                        'title' => 'Bagian 1: Objektif Beragam (Pilihan Ganda, Pilihan Ganda Kompleks, Menjodohkan, Benar-Salah)',
                        'instructions' => 'Pilihlah dan jawablah soal-soal objektif berikut secara cermat dan teliti.',
                        'order' => 1,
                        'question_groups' => [
                            ['title' => 'Stimulus 1: Mengukur Jarak Tempuh Bersepeda Santai', 'content' => '[Keterangan Gambar: Roda sepeda gunung berputar melintasi jalan aspal lurus: Ban sepeda dengan diameter 70 cm dan alat penghitung putaran roda (odometer mekanik).]
Pada hari Minggu pagi, Dimas mengikuti kegiatan bersepeda santai (fun bike) sejauh 4,4 kilometer bersama komunitas sepeda sekolah. Dimas memasang alat sensor penghitung putaran pada roda sepedanya.

Roda sepeda Dimas memiliki diameter 70 cm (jari-jari r = 35 cm). Dimas menghitung panjang lintasan yang ditempuh roda dalam satu kali putaran penuh, yang sama dengan keliling roda: Keliling roda = pi x d = 22/7 x 70 = 220 cm (atau 2,2 meter). Karena jarak total yang ditempuh adalah 4,4 km = 4.400 meter, Dimas dapat menghitung total putaran rodanya selama perjalanan: Banyak putaran = Jarak total : Keliling roda = 4.400 meter : 2,2 meter = 2.000 kali putaran. Pengetahuan tentang keliling lingkaran menjadi dasar cara kerja odometer kendaraan bermotor.'],
                            ['title' => 'Stimulus 2: Lintasan Lari Atletik Stadion dan Biaya Rumput', 'content' => '[Keterangan Gambar: Lintasan lari atletik berbentuk stadion: Lapangan sepak bola persegi panjang di tengah (panjang 100 m, lebar 70 m) diapit oleh dua setengah lingkaran di kedua ujungnya.]
Stadion olahraga daerah direnovasi untuk persiapan Pekan Olahraga Pelajar Nasional. Lapangan tengah stadion berbentuk gabungan persegi panjang dan dua setengah lingkaran di kedua ujung lebarnya.

Panjang sisi lurus persegi panjang adalah 100 meter dan lebarnya adalah 70 meter. Di kedua ujungnya terdapat dua setengah lingkaran berdiameter 70 meter (jari-jari r = 35 meter). Jika kedua setengah lingkaran digabungkan, keduanya membentuk satu lingkaran penuh berdiameter 70 meter. Luas lapangan rumput di tengah adalah: Luas persegi panjang = 100 x 70 = 7.000 m²; Luas satu lingkaran penuh = 22/7 x 35 x 35 = 3.850 m². Total luas lapangan hijau adalah: 7.000 + 3.850 = 10.850 m². Sementara itu, atlet yang berlari satu putaran di lintasan terluar menempuh jarak: 2 sisi lurus + keliling lingkaran = (2 x 100) + (22/7 x 70) = 200 + 220 = 420 meter.'],
                        ],
                        'questions' => [
                            [
                                'order' => 1,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Berdasarkan Stimulus 1, keliling roda sepeda Dimas (panjang lintasan satu putaran roda) adalah ....',
                                'explanation' => 'K = 22/7 x 70 = 220 cm = 2,2 meter.',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '220 cm (2,2 meter)', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '440 cm (4,4 meter)', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '154 cm', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '350 cm', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Berapa kali roda sepeda Dimas berputar untuk menempuh jarak 4,4 km?',
                                'explanation' => '4.400 m : 2,2 m = 2.000 kali putaran.',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '2.000 kali putaran', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '1.500 kali putaran', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '2.500 kali putaran', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '3.000 kali putaran', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Pilihlah DUA pernyataan yang BENAR mengenai putaran roda sepeda Dimas!',
                                'explanation' => '1 putaran = keliling; 4,4 km = 4.400 meter.',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Satu kali putaran roda sama dengan keliling roda lingkaran.', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Jarak 4,4 kilometer sama dengan 4.400 meter.', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Roda sepeda berputar sebanyak 200 kali saja.', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Panjang jari-jari roda sepeda adalah 70 cm.', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan status kebenaran perhitungan putaran roda!',
                                'explanation' => 'Keliling roda sepeda Dimas adalah 2,2 meter (bukan 70 meter).',
                                'group_index' => 0,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Rumus Jarak Tempuh = Banyak Putaran x Keliling Roda.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Konversi 1 km adalah 1.000 meter.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Keliling roda sepeda Dimas adalah 70 meter.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Jika roda berputar 1.000 kali, jarak tempuh adalah 2,2 km.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Berdasarkan Stimulus 2, berapa meter jarak yang ditempuh seorang atlet jika berlari 1 putaran penuh mengelilingi lapangan?',
                                'explanation' => '2 x 100 + 220 = 420 meter.',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '420 meter', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '340 meter', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '500 meter', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '440 meter', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Berapa meter persegi total luas lapangan rumput hijau di dalam stadion tersebut?',
                                'explanation' => '7.000 + 3.850 = 10.850 m².',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '10.850 m²', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '7.000 m²', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '3.850 m²', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '14.700 m²', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => 'Jodohkan bagian lapangan stadion dengan luas/panjangnya!',
                                'explanation' => 'Komponen geometri lapangan stadion atletik.',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'Luas bagian persegi panjang tengah', 'is_correct' => false, 'match_key' => '7.000 m²', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Luas bagian dua setengah lingkaran gabungan', 'is_correct' => false, 'match_key' => '3.850 m²', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Total luas seluruh lapangan', 'is_correct' => false, 'match_key' => '10.850 m²', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Panjang satu putaran lari mengelilingi lapangan', 'is_correct' => false, 'match_key' => '420 meter', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan status kebenaran perhitungan lapangan stadion!',
                                'explanation' => 'Luas lingkaran ujung adalah 3.850 m² (7.000 m² adalah luas persegi panjang).',
                                'group_index' => 1,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Dua setengah lingkaran dengan diameter sama membentuk satu lingkaran penuh.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Keliling satu putaran lintasan adalah 420 meter.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Luas lingkaran ujung adalah 7.000 m².', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Jari-jari lingkaran di kedua ujung lapangan adalah 35 meter.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Sebuah roda pedati berdiameter 56 cm berputar sebanyak 500 kali. Jarak yang ditempuh pedati adalah ....',
                                'explanation' => 'K = 22/7 x 56 = 176 cm = 1,76 m. Jarak = 500 x 1,76 = 880 meter.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '880 meter', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '440 meter', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '1.760 meter', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '88 meter', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Sebuah mobil menempuh jarak 660 meter. Jika roda mobil berputar sebanyak 300 kali, keliling roda mobil adalah ....',
                                'explanation' => 'K = 660 : 300 = 2,2 meter = 220 cm.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '2,2 meter (220 cm)', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '1,5 meter', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '3 meter', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '2 meter', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 11,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Di sekeliling kolam melingkar berdiameter 21 meter akan ditanami pohon palem setiap jarak 3 meter. Banyak pohon palem adalah ....',
                                'explanation' => 'K = 22/7 x 21 = 66 m. Banyak pohon = 66 : 3 = 22 pohon.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '22 pohon', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '21 pohon', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '20 pohon', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '24 pohon', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 12,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Sebuah juring lingkaran memiliki sudut pusat 90 derajat dan jari-jari 14 cm. Luas juring tersebut adalah ....',
                                'explanation' => '90/360 x 22/7 x 14 x 14 = 1/4 x 616 = 154 cm².',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '154 cm²', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '308 cm²', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '77 cm²', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '616 cm²', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 13,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Sebuah juring lingkaran memiliki sudut pusat 60 derajat dan keliling lingkaran 132 cm. Panjang busur juring tersebut adalah ....',
                                'explanation' => 'Panjang busur = 60/360 x 132 = 1/6 x 132 = 22 cm.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '22 cm', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '44 cm', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '33 cm', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '66 cm', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 14,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Sebuah koin berputar menempuh jarak 314 cm. Jika keliling koin 15,7 cm, banyak putaran koin adalah ....',
                                'explanation' => '314 : 15,7 = 20 kali putaran.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '20 kali', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '15 kali', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '25 kali', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '10 kali', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 15,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Pilihlah DUA rumus yang BENAR mengenai juring dan busur lingkaran!',
                                'explanation' => 'Rumus panjang busur dan luas juring sebanding dengan sudut pusat.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Panjang Busur = (Sudut Pusat / 360°) x Keliling Lingkaran', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Luas Juring = (Sudut Pusat / 360°) x Luas Lingkaran', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Panjang Busur = (Sudut Pusat / 180°) x Luas Lingkaran', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Luas Juring = Jari-jari x Keliling Lingkaran', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 16,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Pilihlah DUA pernyataan yang BENAR tentang hubungan roda dan jarak!',
                                'explanation' => 'Jarak = Putaran x Keliling; roda besar melaju lebih jauh per putaran.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Jarak tempuh roda = Banyak putaran x Keliling roda', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Semakin besar diameter roda, jarak tempuh dalam satu putaran semakin jauh', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Banyak putaran roda tidak dipengaruhi oleh ukuran jari-jari roda', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Keliling roda dihitung dengan rumus luas lingkaran', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 17,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => 'Jodohkan sudut pusat dengan bagian lingkarannya!',
                                'explanation' => 'Pecahan juring sudut pusat.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'Sudut pusat 180°', 'is_correct' => false, 'match_key' => '1/2 bagian lingkaran', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Sudut pusat 90°', 'is_correct' => false, 'match_key' => '1/4 bagian lingkaran', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Sudut pusat 60°', 'is_correct' => false, 'match_key' => '1/6 bagian lingkaran', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Sudut pusat 45°', 'is_correct' => false, 'match_key' => '1/8 bagian lingkaran', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 18,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => 'Jodohkan masalah kontekstual roda dengan perhitungannya!',
                                'explanation' => 'Keliling putaran roda.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'Roda d = 14 cm satu putaran', 'is_correct' => false, 'match_key' => 'Menempuh 44 cm', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Roda d = 28 cm satu putaran', 'is_correct' => false, 'match_key' => 'Menempuh 88 cm', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Roda d = 70 cm satu putaran', 'is_correct' => false, 'match_key' => 'Menempuh 220 cm', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Roda d = 100 cm satu putaran (pi = 3,14)', 'is_correct' => false, 'match_key' => 'Menempuh 314 cm', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 19,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan status kebenaran perhitungan busur dan juring!',
                                'explanation' => 'Juring adalah bagian dari lingkaran, sehingga luasnya selalu lebih kecil.',
                                'group_index' => null,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Juring 90 derajat adalah seperempat lingkaran penuh.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Panjang busur lingkaran dihitung dari perbandingan sudut pusat terhadap 360 derajat.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Roda sepeda yang berputar menghasilkan lintasan lurus sepanjang kelilingnya.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Luas juring lingkaran selalu lebih besar dari luas lingkaran penuh.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 20,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan kebenaran pernyataan seputar lingkaran!',
                                'explanation' => 'd = 14 cm -> K = 22/7 x 14 = 44 cm (bukan 88 cm).',
                                'group_index' => null,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Jarum jam membentuk sudut 90 derajat pada pukul 03.00.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Jarum jam membentuk sudut 180 derajat pada pukul 06.00.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Roda berdiameter 1 meter memiliki keliling 3,14 meter.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Jarak 1 putaran roda berdiameter 14 cm adalah 88 cm.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 4],
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
                                'prompt' => 'Roda berdiameter 28 cm berputar 100 kali. Jarak yang ditempuh adalah ... meter.',
                                'explanation' => 'K = 22/7 x 28 = 88 cm = 0,88 m. Jarak = 100 x 0,88 = 88 meter.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '88', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Panjang busur seperempat lingkaran (sudut 90°) dengan keliling 88 cm adalah ... cm.',
                                'explanation' => '1/4 x 88 = 22 cm.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '22', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Luas juring dengan sudut pusat 90° pada lingkaran berluas 616 cm² adalah ... cm².',
                                'explanation' => '1/4 x 616 = 154 cm².',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '154', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Jarak 1.320 meter ditempuh oleh roda sepeda berputar 600 kali. Keliling roda adalah ... meter.',
                                'explanation' => '1.320 : 600 = 2,2 meter.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '2,2', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Sebuah taman melingkar berdiameter 14 meter dipasangi lampu setiap 4 meter di sekelilingnya. Banyak lampu adalah ... lampu.',
                                'explanation' => 'K = 44 m; 44 : 4 = 11 lampu.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '11', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Sudut pusat 60° mewakili ... bagian lingkaran.',
                                'explanation' => '60/360 = 1/6.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '1/6', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Rumus mencari jarak tempuh roda adalah Banyak Putaran dikali ....',
                                'explanation' => 'keliling roda.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'keliling roda', 'is_correct' => true, 'match_key' => null, 'order' => 1],
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
                                'prompt' => 'Sebuah sepeda motor memiliki roda dengan jari-jari 28 cm. Sepeda motor tersebut melaju di jalan raya lurus hingga rodanya berputar sebanyak 1.500 kali putaran penuh. Hitunglah jarak tempuh sepeda motor tersebut dalam satuan meter dan kilometer! (Gunakan pi = 22/7)!',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Langkah penyelesaian:
1. Hitung keliling roda sepeda motor:
   K = 2 x pi x r = 2 x 22/7 x 28 cm = 2 x 22 x 4 = 176 cm.
2. Hitung jarak tempuh total:
   Jarak = Banyak putaran x Keliling roda
         = 1.500 x 176 cm = 264.000 cm.
3. Konversi satuan ke meter dan kilometer:
   - Dalam meter = 264.000 : 100 = 2.640 meter.
   - Dalam kilometer = 2.640 : 1.000 = 2,64 km.
Jadi, jarak yang ditempuh sepeda motor adalah 2.640 meter atau 2,64 km.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                            [
                                'order' => 2,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => 'Sebuah taman kota berbentuk juring lingkaran dengan sudut pusat 60 derajat dan jari-jari 21 meter. Di sekeliling taman tersebut akan dipasang pagar pembatas (termasuk kedua sisi jari-jari dan busur lingkarannya). Tentukan:
(a) Panjang busur taman tersebut
(b) Panjang kawat pagar yang dibutuhkan untuk mengelilingi taman tersebut
(c) Luas area taman juring tersebut',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
(a) Panjang busur = (Sudut pusat / 360°) x (2 x pi x r)
    = (60° / 360°) x (2 x 22/7 x 21 m) = 1/6 x (132 m) = 22 meter.
(b) Keliling taman juring = 2 x r + Panjang busur
    = (2 x 21 m) + 22 m = 42 m + 22 m = 64 meter pagar.
(c) Luas juring = (Sudut pusat / 360°) x (pi x r²)
    = (60° / 360°) x (22/7 x 21 x 21 m²) = 1/6 x (1.386 m²) = 231 m².',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                            [
                                'order' => 3,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => 'Sebuah roda pedati berdiameter 70 cm menempuh jarak 1,1 kilometer. Berapa kali roda pedati tersebut telah berputar selama perjalanan? Tuliskan langkah perhitungannya!',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Langkah penyelesaian:
1. Konversi jarak ke cm:
   1,1 km = 1,1 x 100.000 cm = 110.000 cm.
2. Hitung keliling roda pedati:
   K = pi x d = 22/7 x 70 cm = 220 cm.
3. Hitung banyak putaran roda:
   Putaran = Jarak total : Keliling roda
           = 110.000 cm : 220 cm = 500 kali putaran.
Jadi, roda pedati tersebut telah berputar sebanyak 500 kali.',
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
