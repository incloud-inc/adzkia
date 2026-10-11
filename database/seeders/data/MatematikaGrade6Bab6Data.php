<?php

namespace Database\Seeders\Data;

class MatematikaGrade6Bab6Data
{
    /**
     * Data bundle asesmen Kelas 6 SD Kurikulum Merdeka Fase C.
     */
    public static function getAssessments(): array
    {
        return [
            [
                'title' => 'Kuis Bab 6 Matematika Kelas 6 (Paket 1 - Titik Koordinat & Kuadran Kartesius)',
                'type' => 'quiz',
                'description' => 'Asesmen formatif Bab 6 bagian 1: Menentukan absis, ordinat, kuadran, dan jarak antar titik pada bidang koordinat Kartesius.',
                'duration_minutes' => 45,
                'sections' => [
                    [
                        'title' => 'Bagian 1: Objektif Beragam (Pilihan Ganda, Pilihan Ganda Kompleks, Menjodohkan, Benar-Salah)',
                        'instructions' => 'Pilihlah dan jawablah soal-soal objektif berikut secara cermat dan teliti.',
                        'order' => 1,
                        'question_groups' => [
                            ['title' => 'Stimulus: Denah Taman Satwa Edukasi pada Bidang Kartesius', 'content' => 'Sebuah taman edukasi satwa memetakan area kandang hewan pada bidang koordinat Kartesius dengan titik pusat O(0,0) sebagai pos informasi utama.
[Keterangan Gambar: Denah koordinat Kartesius dengan sumbu X horizontal (-6 sampai 6) dan sumbu Y vertikal (-6 sampai 6). Pos Utama di O(0,0), Kandang Harimau di titik A(3, 4), Kandang Gajah di titik B(-4, 3), Kolam Lumba-lumba di titik C(-3, -5), dan Kandang Burung Cendrawasih di titik D(5, -2). Setiap 1 satuan pada petak mewakili jarak nyata 20 meter.]'],
                            ['title' => 'Stimulus: Ekspedisi Drone Pengukur Jarak', 'content' => 'Sebuah drone inspeksi terbang dari titik A(1, 2) bergerak lurus horizontal sejauh 5 satuan ke kanan ke titik B, lalu berbelok tegak lurus ke atas sejauh 4 satuan menuju titik C.
[Keterangan Gambar: Ilustrasi lintasan drone pada koordinat Kartesius. Titik awal A(1,2), titik singgah B(6,2), dan titik tujuan C(6,6). Garis penghubung AB dan BC membentuk segitiga siku-siku ABC jika dihubungkan langsung dari titik A ke C.]'],
                        ],
                        'questions' => [
                            [
                                'order' => 1,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Berdasarkan denah di atas, berapakah koordinat letak Kandang Gajah (titik B)?',
                                'explanation' => 'Kandang Gajah berada pada absis x = -4 dan ordinat y = 3, maka koordinatnya adalah (-4, 3).',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '(-4, 3)', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '(3, -4)', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '(4, 3)', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '(-3, 4)', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Kandang satwa manakah yang terletak pada Kuadran IV?',
                                'explanation' => 'Kuadran IV memiliki nilai sumbu X positif dan sumbu Y negatif, yaitu titik D(5, -2).',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Kandang Harimau A(3, 4)', 'is_correct' => false, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Kandang Gajah B(-4, 3)', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Kolam Lumba-lumba C(-3, -5)', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Kandang Burung D(5, -2)', 'is_correct' => true, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Tentukan semua pernyataan yang BENAR mengenai letak lokasi pada denah:',
                                'explanation' => 'Kolam lumba-lumba di (-3, -5) terletak di Kuadran III (bukan II). Pilihan A, B, dan D benar.',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Pos Utama berada pada koordinat (0, 0)', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Kandang Harimau terletak di Kuadran I', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Kolam Lumba-lumba terletak di Kuadran II', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Absis kandang Burung bernilai 5', 'is_correct' => true, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => 'Pasangkan nama lokasi dengan kuadran letaknya yang tepat:',
                                'explanation' => 'Pasangan koordinat tanda kuadran: (+,+) Kuadran I, (-,+) Kuadran II, (-,-) Kuadran III, (+,-) Kuadran IV.',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'Kandang Harimau A(3, 4)', 'is_correct' => false, 'match_key' => 'Kuadran I', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Kandang Gajah B(-4, 3)', 'is_correct' => false, 'match_key' => 'Kuadran II', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Kolam Lumba-lumba C(-3, -5)', 'is_correct' => false, 'match_key' => 'Kuadran III', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Kandang Burung D(5, -2)', 'is_correct' => false, 'match_key' => 'Kuadran IV', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Berapakah koordinat titik singgah B drone tersebut?',
                                'explanation' => 'Bergerak 5 satuan ke kanan menambah nilai x: 1 + 5 = 6. Nilai y tetap 2. Jadi titik B(6, 2).',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '(6, 2)', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '(1, 7)', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '(5, 2)', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '(6, 6)', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Berapakah koordinat titik tujuan akhir C drone tersebut?',
                                'explanation' => 'Dari B(6, 2) naik ke atas 4 satuan menambah y: 2 + 4 = 6. Absis tetap 6. Jadi titik C(6, 6).',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '(6, 6)', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '(6, 2)', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '(1, 6)', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '(10, 6)', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan kebenaran pernyataan mengenai lintasan drone:',
                                'explanation' => 'Jarak vertikal dari B ke C adalah 6 - 2 = 4 satuan (pernyataan 3 salah).',
                                'group_index' => 1,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Titik awal A(1, 2) berada di Kuadran I', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Jarak mendatar dari A ke B adalah 5 satuan', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Jarak vertikal dari B ke C adalah 6 satuan', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 3],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Bangun datar apa yang terbentuk jika titik A(1,2), B(6,2), dan C(6,6) dihubungkan?',
                                'explanation' => 'Sisi AB horizontal dan BC vertikal saling tegak lurus, membentuk segitiga siku-siku di titik B.',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Segitiga siku-siku', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Segitiga sama sisi', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Persegi panjang', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Jajar genjang', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Titik P memiliki absis -5 dan ordinat 8. Penulisan koordinat titik P yang tepat adalah...',
                                'explanation' => 'Koordinat ditulis (absis, ordinat) = (-5, 8).',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'P(-5, 8)', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'P(8, -5)', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'P(-5, -8)', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'P(5, 8)', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Titik yang terletak tepat pada sumbu X memiliki ciri khas...',
                                'explanation' => 'Setiap titik di sumbu X memiliki koordinat (x, 0), sehingga ordinat y selalu 0.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Nilai absis selalu nol', 'is_correct' => false, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Nilai ordinat (y) selalu nol', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Berada di Kuadran I', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Nilai x dan y selalu negatif', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 11,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Titik Q(0, -6) terletak pada...',
                                'explanation' => 'Karena x = 0 dan y = -6, titik Q berada tepat di sumbu Y negatif.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Sumbu Y negatif', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Sumbu X positif', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Kuadran III', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Kuadran IV', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 12,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Jarak titik R(3, 7) ke sumbu X adalah...',
                                'explanation' => 'Jarak sebuah titik ke sumbu X sama dengan nilai mutlak dari ordinatnya, yaitu |7| = 7 satuan.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '7 satuan', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '3 satuan', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '10 satuan', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '4 satuan', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 13,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Jarak titik S(-4, -9) ke sumbu Y adalah...',
                                'explanation' => 'Jarak ke sumbu Y sama dengan nilai mutlak dari absisnya, yaitu |-4| = 4 satuan.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '4 satuan', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '9 satuan', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '-4 satuan', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '13 satuan', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 14,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Diketahui tiga titik segitiga: K(1, 1), L(7, 1), dan M(1, 9). Panjang sisi alas KL adalah...',
                                'explanation' => 'Panjang sisi mendatar KL = 7 - 1 = 6 satuan.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '6 satuan', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '7 satuan', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '8 satuan', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '9 satuan', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 15,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Pilihlah titik-titik yang seluruhnya terletak pada Kuadran II:',
                                'explanation' => 'Titik kuadran II memiliki x negatif dan y positif: K(-2,5), L(-7,3), dan N(-1,8). M(4,-6) berada di Kuadran IV.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'K(-2, 5)', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'L(-7, 3)', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'M(4, -6)', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'N(-1, 8)', 'is_correct' => true, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 16,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Pilihlah bangun yang dapat dibentuk jika empat titik berikut dihubungkan: A(2, 2), B(8, 2), C(8, 6), dan D(2, 6):',
                                'explanation' => 'Panjang AB = 8 - 2 = 6, lebar AD = 6 - 2 = 4. Ini adalah persegi panjang dengan sudut siku-siku.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Memiliki 4 sudut siku-siku', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Merupakan bangun persegi panjang', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Panjang sisi mendatarnya 6 satuan', 'is_correct' => true, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Merupakan bangun belah ketupat', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 17,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => 'Pasangkan titik koordinat dengan posisinya terhadap sumbu:',
                                'explanation' => 'Pasangan posisi titik pada bidang Kartesius.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'Titik (4, 0)', 'is_correct' => false, 'match_key' => 'Terletak di sumbu X positif', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Titik (0, -3)', 'is_correct' => false, 'match_key' => 'Terletak di sumbu Y negatif', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Titik (-5, 2)', 'is_correct' => false, 'match_key' => 'Terletak di Kuadran II', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Titik (3, 6)', 'is_correct' => false, 'match_key' => 'Terletak di Kuadran I', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 18,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => 'Pasangkan dua titik dengan jarak mendatar (horizontal) antar titik:',
                                'explanation' => 'Jarak horizontal = selisih nilai absis x2 - x1.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '(2, 3) dan (8, 3)', 'is_correct' => false, 'match_key' => '6 satuan', 'order' => 1],
                                    ['label' => null, 'option_text' => '(-1, 5) dan (4, 5)', 'is_correct' => false, 'match_key' => '5 satuan', 'order' => 2],
                                    ['label' => null, 'option_text' => '(-3, 2) dan (4, 2)', 'is_correct' => false, 'match_key' => '7 satuan', 'order' => 3],
                                    ['label' => null, 'option_text' => '(0, -4) dan (9, -4)', 'is_correct' => false, 'match_key' => '9 satuan', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 19,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan kebenaran pernyataan mengenai koordinat Kartesius:',
                                'explanation' => 'Garis vertikal disebut sumbu Y (ordinat), garis horizontal disebut sumbu X (absis).',
                                'group_index' => null,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Titik pusat koordinat dilambangkan dengan O(0, 0)', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Garis vertikal pada bidang koordinat disebut sumbu absis', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Kuadran III memiliki nilai x negatif dan y negatif', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 3],
                                ],
                            ],
                            [
                                'order' => 20,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan kebenaran letak titik berikut:',
                                'explanation' => 'Titik (5,0) terletak di sumbu X, bukan di dalam Kuadran I.',
                                'group_index' => null,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Titik A(-3, -4) terletak di Kuadran III', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Titik B(5, 0) terletak di Kuadran I', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Titik C(0, 7) terletak di sumbu Y', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 3],
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
                                'prompt' => 'Nilai pada sumbu mendatar (horizontal) dalam koordinat Kartesius disebut nilai...',
                                'explanation' => 'Sumbu mendatar adalah sumbu X yang disebut absis.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'absis', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Nilai pada sumbu tegak (vertikal) dalam koordinat Kartesius disebut nilai...',
                                'explanation' => 'Sumbu tegak adalah sumbu Y yang disebut ordinat.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'ordinat', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Titik A(-6, 9) terletak pada kuadran ke-...',
                                'explanation' => 'Kuadran II memiliki nilai absis negatif dan ordinat positif.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '2', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Jarak titik P(-8, 5) terhadap sumbu tegak (sumbu Y) adalah ... satuan.',
                                'explanation' => 'Jarak ke sumbu Y adalah nilai mutlak absis |-8| = 8 satuan.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '8', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Jika titik A(2, 3) dan B(7, 3) dihubungkan, maka panjang ruas garis AB adalah ... satuan.',
                                'explanation' => 'Panjang garis = 7 - 2 = 5 satuan.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '5', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Diketahui titik K(3, 1), L(3, 7). Panjang ruas garis KL adalah ... satuan.',
                                'explanation' => 'Panjang garis vertikal = 7 - 1 = 6 satuan.',
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
                                'prompt' => 'Titik temu antara sumbu X dan sumbu Y yang berkoordinat (0, 0) disebut titik...',
                                'explanation' => 'Titik (0,0) disebut titik pangkal atau titik pusat koordinat (origin).',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'pangkal', 'is_correct' => true, 'match_key' => null, 'order' => 1],
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
                                'prompt' => 'Diketahui tiga titik sudut sebuah bangun datar pada bidang Kartesius yaitu A(1, 1), B(7, 1), dan C(7, 5).
a. Tentukan koordinat titik D agar bangun ABCD membentuk persegi panjang yang sempurna!
b. Hitunglah keliling dan luas persegi panjang ABCD tersebut!',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Langkah Penyelesaian:
a. Panjang AB = 7 - 1 = 6 satuan (horizontal), panjang BC = 5 - 1 = 4 satuan (vertikal).
   Agar membentuk persegi panjang, titik D harus memiliki absis sama dengan A (x = 1) dan ordinat sama dengan C (y = 5).
   Maka koordinat titik D = (1, 5).
b. Panjang = 6 satuan, Lebar = 4 satuan.
   Keliling = 2 x (p + l) = 2 x (6 + 4) = 2 x 10 = 20 satuan panjang.
   Luas = p x l = 6 x 4 = 24 satuan luas.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                            [
                                'order' => 2,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => 'Tiga pos pengamatan terletak pada koordinat P(-3, 2), Q(5, 2), dan R(1, 6).
a. Jika ketiga titik dihubungkan, bangun segitiga apa yang terbentuk? Jelaskan alasannya berdasarkan panjang sisi-sisinya!
b. Hitunglah luas daerah segitiga PQR tersebut!',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Langkah Penyelesaian:
a. Alas PQ adalah garis horizontal dengan panjang = 5 - (-3) = 8 satuan.
   Titik puncak R memiliki absis x = 1, yang terletak tepat di tengah-tengah PQ (karena (-3 + 5)/2 = 1).
   Jarak horizontal dari P(-3) ke R(1) adalah 4 satuan, dan dari R(1) ke Q(5) juga 4 satuan. Tinggi sama.
   Sehingga panjang sisi PR sama dengan sisi QR. Bangun yang terbentuk adalah Segitiga Sama Kaki.
b. Alas = 8 satuan. Tinggi segitiga = ordinat R - ordinat PQ = 6 - 2 = 4 satuan.
   Luas segitiga = 1/2 x alas x tinggi = 1/2 x 8 x 4 = 16 satuan luas.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                            [
                                'order' => 3,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => 'Sebuah kapal patroli bergerak dari dermaga O(0, 0) menuju pos A(4, 0), kemudian berlayar ke pos B(4, 3), dan kembali langsung ke dermaga O(0, 0).
a. Gambarkan sketsa perjalanan kapal tersebut dan tentukan bentuk lintasan yang dihasilkan!
b. Berapakah total jarak tempuh kapal patroli tersebut jika 1 satuan koordinat sama dengan 2 mil laut?',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Langkah Penyelesaian:
a. Lintasan bergerak dari (0,0) ke (4,0) mendatar 4 satuan, lalu (4,0) ke (4,3) vertikal 3 satuan, lalu kembali ke (0,0).
   Lintasan membentuk segitiga siku-siku dengan sisi penyiku 4 satuan dan 3 satuan.
b. Sisi miring (jarak kembali dari B(4,3) ke O(0,0)) dihitung dengan teorema Pythagoras:
   jarak = akar(4^2 + 3^2) = akar(16 + 9) = akar(25) = 5 satuan.
   Total satuan tempuh = 4 + 3 + 5 = 12 satuan.
   Karena 1 satuan = 2 mil laut, maka total jarak tempuh = 12 x 2 mil laut = 24 mil laut.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'title' => 'Kuis Bab 6 Matematika Kelas 6 (Paket 2 - Simetri & Pencerminan Geometris)',
                'type' => 'quiz',
                'description' => 'Asesmen formatif Bab 6 bagian 2: Menentukan simetri lipat, simetri putar, dan hasil refleksi pada bidang koordinat Kartesius.',
                'duration_minutes' => 45,
                'sections' => [
                    [
                        'title' => 'Bagian 1: Objektif Beragam (Pilihan Ganda, Pilihan Ganda Kompleks, Menjodohkan, Benar-Salah)',
                        'instructions' => 'Pilihlah dan jawablah soal-soal objektif berikut secara cermat dan teliti.',
                        'order' => 1,
                        'question_groups' => [
                            ['title' => 'Stimulus: Desain Ornamen Batik Geometris Nusantara', 'content' => 'Seorang perajin batik mendesain pola taplak meja berbasis motif geometris beraturan. Motif tersebut menggunakan bangun-bangun datar seperti persegi, lingkaran, belah ketupat, dan segitiga sama sisi yang digabungkan secara simetris.
[Keterangan Gambar: Sketsa ornamen batik berbentuk lingkaran besar dengan motif pusat persegi, dikelilingi 4 belah ketupat yang identik di setiap sisinya. Garis-garis lipatan putus-putus merah menunjukkan sumbu simetri yang membagi pola menjadi dua bagian yang kongruen persis saat dilipat atau diputar.]'],
                            ['title' => 'Stimulus: Eksperimen Pencerminan Titik pada Cermin Datar', 'content' => 'Dalam pelajaran sains dan matematika, siswa melakukan percobaan pencerminan titik lampu pada cermin datar yang diletakkan pada sumbu koordinat Kartesius.
[Keterangan Gambar: Ilustrasi cermin datar diletakkan berimpit dengan sumbu Y. Sebuah titik benda A(3, 4) dicerminkan terhadap sumbu Y menghasilkan bayangan A\'(-3, 4). Jarak benda ke cermin sama dengan jarak cermin ke bayangan (3 satuan), serta garis hubung tegak lurus cermin.]'],
                        ],
                        'questions' => [
                            [
                                'order' => 1,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Berapa banyak simetri lipat yang dimiliki oleh bangun persegi pada motif pusat batik tersebut?',
                                'explanation' => 'Persegi memiliki 4 sumbu simetri lipat (2 sumbu utama mendatar/tegak dan 2 sumbu diagonal).',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '4 simetri lipat', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '2 simetri lipat', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '6 simetri lipat', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '8 simetri lipat', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Berapakah tingkat simetri putar yang dimiliki oleh bangun persegi?',
                                'explanation' => 'Persegi dapat menempati bingkainya kembali sebanyak 4 kali dalam satu putaran penuh 360 derajat (setiap putaran 90 derajat).',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '4', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '2', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '3', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Tak hingga', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Tentukan semua bangun datar yang memiliki simetri putar lebih dari 1 tingkat:',
                                'explanation' => 'Trapesium sembarang hanya memiliki 1 tingkat simetri putar (kembali ke posisi awal setelah 360 derajat). Persegi (4), segitiga sama sisi (3), dan lingkaran (tak hingga).',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Persegi', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Segitiga sama sisi', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Lingkaran', 'is_correct' => true, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Trapesium sembarang', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => 'Pasangkan bangun datar berikut dengan jumlah simetri lipatnya:',
                                'explanation' => 'Pasangan jumlah simetri lipat bangun datar.',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'Persegi panjang', 'is_correct' => false, 'match_key' => '2 simetri lipat', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Segitiga sama sisi', 'is_correct' => false, 'match_key' => '3 simetri lipat', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Belah ketupat', 'is_correct' => false, 'match_key' => '2 simetri lipat', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Lingkaran', 'is_correct' => false, 'match_key' => 'Tak hingga simetri lipat', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Berdasarkan aturan refleksi terhadap sumbu Y, jika titik B(5, 2) dicerminkan terhadap sumbu Y, bayangan B\' berada di titik...',
                                'explanation' => 'Pencerminan terhadap sumbu Y mengubah tanda absis (x menjadi -x) sementara ordinat tetap: B(5, 2) -> B\'(-5, 2).',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '(-5, 2)', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '(5, -2)', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '(-5, -2)', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '(2, 5)', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Jika sebuah titik P(4, 6) dicerminkan terhadap sumbu X, koordinat bayangannya adalah...',
                                'explanation' => 'Pencerminan terhadap sumbu X mengubah tanda ordinat (y menjadi -y) sementara absis tetap: P(4, 6) -> P\'(4, -6).',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '(4, -6)', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '(-4, 6)', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '(-4, -6)', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '(6, 4)', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan kebenaran sifat pencerminan (refleksi) berikut:',
                                'explanation' => 'Pencerminan mempertahankan ukuran dan bentuk (kongruen), tidak memperkecil ukuran benda.',
                                'group_index' => 1,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Jarak titik benda ke cermin sama dengan jarak bayangan ke cermin', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Bentuk dan ukuran bayangan menjadi lebih kecil dari benda asli', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Garis yang menghubungkan benda dan bayangan tegak lurus terhadap cermin', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 3],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Bayangan dari titik K(-2, -5) jika dicerminkan terhadap titik pangkal O(0, 0) adalah...',
                                'explanation' => 'Pencerminan terhadap titik asal (0,0) mengubah tanda kedua koordinat: (x, y) -> (-x, -y). Maka (-2, -5) -> (2, 5).',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '(2, 5)', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '(-2, 5)', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '(2, -5)', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '(5, 2)', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Bangun layang-layang memiliki sumbu simetri lipat sebanyak...',
                                'explanation' => 'Layang-layang hanya memiliki 1 sumbu simetri lipat yang membagi dua sisi sama panjang.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '1', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '2', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '3', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '4', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Bangun datar yang memiliki simetri lipat tak terhingga banyaknya adalah...',
                                'explanation' => 'Lingkaran memiliki garis simetri yang melewati titik pusat sebanyak tak terhingga.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Lingkaran', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Persegi', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Segi delapan beraturan', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Elips', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 11,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Berapa tingkat simetri putar yang dimiliki oleh bangun jajar genjang?',
                                'explanation' => 'Jajar genjang memiliki 2 tingkat simetri putar (pada putaran 180 derajat dan 360 derajat), tetapi tidak memiliki simetri lipat.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '2', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '1', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '4', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '0', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 12,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Bangun datar berikut yang TIDAK memiliki sumbu simetri lipat sama sekali adalah...',
                                'explanation' => 'Jajar genjang tidak memiliki sumbu simetri lipat.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Jajar genjang', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Persegi panjang', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Belah ketupat', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Layang-layang', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 13,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Segitiga sama kaki memiliki sumbu simetri lipat sebanyak...',
                                'explanation' => 'Segitiga sama kaki hanya memiliki 1 sumbu simetri lipat.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '1', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '2', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '3', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '0', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 14,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Hasil pencerminan titik M(-3, 7) terhadap garis x = 0 (sumbu Y) adalah...',
                                'explanation' => 'Pencerminan thd sumbu Y (x=0) membalik absis: -(-3) = 3, y tetap 7 -> (3, 7).',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'M\'(3, 7)', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'M\'(-3, -7)', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'M\'(7, -3)', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'M\'(3, -7)', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 15,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Pilihlah bangun datar yang memiliki TEPAT 2 simetri lipat:',
                                'explanation' => 'Persegi panjang dan belah ketupat memiliki tepat 2 simetri lipat. Persegi memiliki 4, segitiga sama sisi memiliki 3.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Persegi panjang', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Belah ketupat', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Persegi', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Segitiga sama sisi', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 16,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Pilihlah pernyataan yang BENAR mengenai simetri putar:',
                                'explanation' => 'Trapesium sama kaki hanya memiliki 1 tingkat simetri putar (hanya kembali pada posisi awal 360 derajat). Pilihan A, B, D benar.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Segitiga sama sisi memiliki 3 tingkat simetri putar', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Persegi memiliki 4 tingkat simetri putar', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Trapesium sama kaki memiliki 2 tingkat simetri putar', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Lingkaran memiliki simetri putar tak terhingga', 'is_correct' => true, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 17,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => 'Pasangkan bangun datar dengan jumlah simetri putarnya:',
                                'explanation' => 'Pasangan tingkat simetri putar bangun datar.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'Segitiga sama sisi', 'is_correct' => false, 'match_key' => '3 tingkat', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Persegi', 'is_correct' => false, 'match_key' => '4 tingkat', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Jajar genjang', 'is_correct' => false, 'match_key' => '2 tingkat', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Segitiga sembarang', 'is_correct' => false, 'match_key' => '1 tingkat (hanya posisi awal)', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 18,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => 'Pasangkan koordinat awal dengan bayangannya setelah dicerminkan terhadap sumbu X:',
                                'explanation' => 'Refleksi terhadap sumbu X membalik tanda nilai y (ordinat).',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'Titik (3, 5)', 'is_correct' => false, 'match_key' => '(3, -5)', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Titik (-2, 4)', 'is_correct' => false, 'match_key' => '(-2, -4)', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Titik (6, -1)', 'is_correct' => false, 'match_key' => '(6, 1)', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Titik (-4, -7)', 'is_correct' => false, 'match_key' => '(-4, 7)', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 19,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan kebenaran pernyataan mengenai simetri lipat:',
                                'explanation' => 'Belah ketupat hanya memiliki 2 sumbu simetri lipat (sepanjang kedua diagonalnya).',
                                'group_index' => null,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Sumbu simetri membagi bangun menjadi dua bagian yang sama persis', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Belah ketupat memiliki 4 sumbu simetri lipat', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Persegi memiliki 4 sumbu simetri lipat', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 3],
                                ],
                            ],
                            [
                                'order' => 20,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan kebenaran refleksi titik koordinat berikut:',
                                'explanation' => 'Pencerminan thd sumbu X mengubah y menjadi -y, sehingga (4, 3) menjadi (4, -3), bukan (-4, 3).',
                                'group_index' => null,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Pencerminan titik (1, 8) terhadap sumbu Y menghasilkan (-1, 8)', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Pencerminan titik (4, 3) terhadap sumbu X menghasilkan (-4, 3)', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Pencerminan titik (0, 5) terhadap sumbu Y tetap menghasilkan (0, 5)', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 3],
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
                                'prompt' => 'Garis lipatan yang membagi suatu bangun datar menjadi dua bagian yang kongruen disebut...',
                                'explanation' => 'Garis pembagi tersebut dinamakan sumbu simetri atau garis simetri.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'sumbu simetri', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Banyaknya simetri lipat pada bangun segitiga sama sisi adalah...',
                                'explanation' => 'Segitiga sama sisi memiliki 3 sumbu simetri lipat.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '3', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Banyaknya sumetri putar pada bangun persegi panjang adalah ... tingkat.',
                                'explanation' => 'Persegi panjang memiliki 2 tingkat simetri putar.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '2', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Titik A(7, -4) jika dicerminkan terhadap sumbu X akan menghasilkan bayangan A\'(7, ...).',
                                'explanation' => 'Pencerminan thd sumbu X: y\' = -(-4) = 4.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '4', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Titik B(-5, 6) jika dicerminkan terhadap sumbu Y akan menghasilkan bayangan B\'(..., 6).',
                                'explanation' => 'Pencerminan thd sumbu Y: x\' = -(-5) = 5.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '5', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Tingkat simetri putar yang dimiliki oleh bangun belah ketupat adalah...',
                                'explanation' => 'Belah ketupat memiliki 2 tingkat simetri putar (putaran 180 dan 360 derajat).',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '2', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Bangun trapesium sama kaki memiliki sumbu simetri lipat sebanyak...',
                                'explanation' => 'Trapesium sama kaki hanya memiliki 1 sumbu simetri lipat vertikal.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '1', 'is_correct' => true, 'match_key' => null, 'order' => 1],
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
                                'prompt' => 'Jelaskan secara lengkap perbedaan antara sifat simetri lipat dan simetri putar pada sebuah bangun datar, lalu berikan contoh bangun datar yang memiliki simetri putar tetapi sama sekali tidak memiliki simetri lipat!',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Kunci Jawaban & Rubrik:
1. Simetri Lipat: Kemampuan suatu bangun datar untuk dilipat sepanjang suatu garis (sumbu simetri) sehingga satu bagian menutupi bagian lainnya dengan tepat dan kongruen.
2. Simetri Putar: Kemampuan suatu bangun datar untuk diputar pada titik pusatnya kurang dari satu putaran penuh (kurang dari 360 derajat) dan menempati bingkai aslinya kembali seperti semula.
3. Contoh bangun: Jajar genjang (memiliki 2 tingkat simetri putar, namun memiliki 0 simetri lipat).',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                            [
                                'order' => 2,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => 'Sebuah segitiga ABC memiliki koordinat titik-titik sudut A(1, 2), B(5, 2), dan C(3, 6).
a. Jika segitiga ABC dicerminkan terhadap sumbu X, tentukan koordinat bayangan titik A\', B\', dan C\'!
b. Jika segitiga ABC dicerminkan terhadap sumbu Y, tentukan koordinat bayangan titik A\'\', B\'\', dan C\'\'!',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Kunci Jawaban & Rubrik:
a. Pencerminan terhadap sumbu X mengubah tanda ordinat (y -> -y):
   - A(1, 2) -> A\'(1, -2)
   - B(5, 2) -> B\'(5, -2)
   - C(3, 6) -> C\'(3, -6)
b. Pencerminan terhadap sumbu Y mengubah tanda absis (x -> -x):
   - A(1, 2) -> A\'\'(-1, 2)
   - B(5, 2) -> B\'\'(-5, 2)
   - C(3, 6) -> C\'\'(-3, 2)',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                            [
                                'order' => 3,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => 'Diketahui persegi ABCD dengan koordinat A(-2, 2), B(2, 2), C(2, -2), dan D(-2, -2).
a. Tunjukkan bahwa titik pusat simetri putar bangun tersebut berada di titik O(0, 0)!
b. Sebutkan dan jelaskan 4 garis yang menjadi sumbu simetri lipat pada persegi tersebut!',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Kunci Jawaban & Rubrik:
a. Titik pusat diperoleh dari perpotongan diagonal AC dan BD:
   Titik tengah AC = ((-2 + 2)/2, (2 + -2)/2) = (0, 0). Titik O(0, 0) adalah pusat simetri putar persegi.
b. Empat sumbu simetri lipat persegi ABCD:
   1. Sumbu Y (garis x = 0): Membagi persegi menjadi bagian kiri dan kanan.
   2. Sumbu X (garis y = 0): Membagi persegi menjadi bagian atas dan bawah.
   3. Garis diagonal y = x: Garis miring yang menghubungkan titik (-2,-2) dan (2,2).
   4. Garis diagonal y = -x: Garis miring yang menghubungkan titik (-2,2) dan (2,-2).',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'title' => 'Kuis Bab 6 Matematika Kelas 6 (Paket 3 - Translasi & Transformasi Terpadu)',
                'type' => 'quiz',
                'description' => 'Asesmen formatif Bab 6 bagian 3: Menentukan pergeseran translasi, kombinasi refleksi, dan pemetaan posisi pada bidang koordinat.',
                'duration_minutes' => 45,
                'sections' => [
                    [
                        'title' => 'Bagian 1: Objektif Beragam (Pilihan Ganda, Pilihan Ganda Kompleks, Menjodohkan, Benar-Salah)',
                        'instructions' => 'Pilihlah dan jawablah soal-soal objektif berikut secara cermat dan teliti.',
                        'order' => 1,
                        'question_groups' => [
                            ['title' => 'Stimulus: Simulasi Navigasi Robot Pembersih Ruangan', 'content' => 'Sebuah robot otomatis diprogram untuk membersihkan lantai aula serbaguna. Lantai dimodelkan dalam petak koordinat Kartesius berukuran meter. Robot beroperasi dengan aturan pergeseran (translasi):
[Keterangan Gambar: Lintasan gerak robot dari stasiun awal S(2, 3) digeser sebesar T[4, 2] (artinya 4 meter ke arah timur/kanan dan 2 meter ke arah utara/atas) mencapai titik P1. Dari P1, robot bergeser lagi sebesar T[-3, 5] (3 meter ke barat dan 5 meter ke utara) mencapai titik tujuan akhir P2.]'],
                            ['title' => 'Stimulus: Pemetaan Rute Kapal pada Sistem GPS Sederhana', 'content' => 'Kapal nelayan modern dilengkapi sistem navigasi layar sentuh. Layar menampilkan kapal pada posisi A(-4, -2). Nahkoda mengarahkan kemudi sejauh 6 mil laut ke kanan (timur) dan 8 mil laut ke atas (utara).
[Keterangan Gambar: Garis panah berarah dari kuadran III menuju kuadran I. Titik pangkal A(-4, -2) ditarik vektor perpindahan menghasilkan titik akhir B(2, 6).]'],
                        ],
                        'questions' => [
                            [
                                'order' => 1,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Berdasarkan translasi pertama T[4, 2], koordinat posisi robot di P1 adalah...',
                                'explanation' => 'Translasi menambahkan komponen ke koordinat awal: x = 2 + 4 = 6; y = 3 + 2 = 5. Jadi P1(6, 5).',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '(6, 5)', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '(2, 5)', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '(6, 3)', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '(8, 6)', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Dari titik P1(6, 5), setelah ditranslasikan dengan T[-3, 5], di manakah posisi titik akhir P2 robot?',
                                'explanation' => 'x = 6 + (-3) = 3; y = 5 + 5 = 10. Posisi akhir P2 adalah (3, 10).',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '(3, 10)', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '(9, 10)', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '(3, 0)', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '(9, 0)', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Tentukan semua pernyataan yang BENAR mengenai perpindahan robot:',
                                'explanation' => 'Total perpindahan horizontal dari awal (x=2) ke akhir (x=3) adalah 3 - 2 = 1 satuan (bukan 7). Pilihan A, B, C benar.',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Translasi T[4, 2] menggerakkan robot 4 satuan ke kanan dan 2 satuan ke atas', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Posisi awal robot berada di Kuadran I', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Translasi T[-3, 5] menggerakkan robot ke arah kiri dan atas', 'is_correct' => true, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Total perpindahan horizontal dari S ke P2 adalah 7 satuan', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => 'Pasangkan pergeseran (translasi) dengan perubahannya pada koordinat:',
                                'explanation' => 'Pasangan komponen translasi mendatar dan tegak.',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'T[3, 0]', 'is_correct' => false, 'match_key' => 'Bergeser 3 satuan ke kanan', 'order' => 1],
                                    ['label' => null, 'option_text' => 'T[-4, 0]', 'is_correct' => false, 'match_key' => 'Bergeser 4 satuan ke kiri', 'order' => 2],
                                    ['label' => null, 'option_text' => 'T[0, 5]', 'is_correct' => false, 'match_key' => 'Bergeser 5 satuan ke atas', 'order' => 3],
                                    ['label' => null, 'option_text' => 'T[0, -2]', 'is_correct' => false, 'match_key' => 'Bergeser 2 satuan ke bawah', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Berapakah koordinat posisi baru kapal nelayan (titik B)?',
                                'explanation' => 'x = -4 + 6 = 2; y = -2 + 8 = 6. Titik B adalah (2, 6).',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '(2, 6)', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '(-2, 6)', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '(2, -6)', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '(10, 6)', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Posisi awal kapal berada di kuadran ..., dan posisi barunya berada di kuadran ...',
                                'explanation' => 'Titik A(-4, -2) ada di Kuadran III (negatif, negatif) dan titik B(2, 6) ada di Kuadran I (positif, positif).',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'III dan I', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'II dan IV', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'III dan II', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'IV dan I', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan kebenaran pernyataan mengenai posisi kapal:',
                                'explanation' => 'Kapal bergeser ke arah timur (kanan), bukan ke arah barat.',
                                'group_index' => 1,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Posisi awal kapal berada di Kuadran III', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Setelah bergeser, nilai absis kapal menjadi bernilai positif', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Jarak perpindahan kapal ke arah barat adalah 6 mil', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 3],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Jika dari titik B(2, 6) kapal ingin kembali ke dermaga O(0, 0), translasi yang harus dilakukan adalah...',
                                'explanation' => 'Untuk kembali ke (0,0) dari (2,6): T = (0 - 2, 0 - 6) = T[-2, -6].',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'T[-2, -6]', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'T[2, 6]', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'T[-2, 6]', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'T[2, -6]', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Titik P(1, 4) ditranslasikan oleh T[3, 2]. Bayangan titik P adalah...',
                                'explanation' => 'x\' = 1 + 3 = 4; y\' = 4 + 2 = 6. Koordinat P\'(4, 6).',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'P\'(4, 6)', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'P\'(2, 6)', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'P\'(4, 2)', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'P\'(3, 8)', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Titik Q(-3, 5) ditranslasikan oleh T[5, -2]. Bayangan titik Q adalah...',
                                'explanation' => 'x\' = -3 + 5 = 2; y\' = 5 + (-2) = 3. Koordinat Q\'(2, 3).',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Q\'(2, 3)', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Q\'(-8, 3)', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Q\'(2, 7)', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Q\'(-2, 3)', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 11,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Titik R(2, -1) digeser 4 satuan ke kiri dan 3 satuan ke atas. Koordinat hasil pergeseran adalah...',
                                'explanation' => 'x\' = 2 - 4 = -2; y\' = -1 + 3 = 2. Koordinat R\'(-2, 2).',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'R\'(-2, 2)', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'R\'(6, 2)', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'R\'(-2, -4)', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'R\'(6, -4)', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 12,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Bayangan titik A oleh translasi T[2, 3] adalah A\'(5, 7). Koordinat titik asal A adalah...',
                                'explanation' => 'x = 5 - 2 = 3; y = 7 - 3 = 4. Titik asal A(3, 4).',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '(3, 4)', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '(7, 10)', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '(3, 10)', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '(7, 4)', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 13,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Titik C(4, 1) dicerminkan terhadap sumbu Y menghasilkan C1, lalu C1 digeser oleh T[2, 3]. Koordinat akhir titik C adalah...',
                                'explanation' => 'Refleksi thd sumbu Y: C1(-4, 1). Translasi T[2, 3]: x = -4 + 2 = -2; y = 1 + 3 = 4. Hasil (-2, 4).',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '(-2, 4)', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '(2, 4)', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '(-2, -2)', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '(6, 4)', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 14,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Bangun datar yang ditranslasikan (digeser) akan mengalami...',
                                'explanation' => 'Translasi hanya memindahkan posisi tanpa mengubah ukuran atau orientasi bentuk.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Perubahan posisi tanpa perubahan bentuk dan ukuran', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Perubahan ukuran menjadi lebih besar', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Perubahan bentuk bangun', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Pembalikan arah hadap simetris', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 15,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Pilihlah translasi yang menghasilkan bayangan di Kuadran I jika titik asalnya adalah (1, 1):',
                                'explanation' => 'T[2,3] -> (3,4); T[0,4] -> (1,5); T[4,1] -> (5,2) semuanya di Kuadran I. T[-5,2] -> (-4,3) berada di Kuadran II.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'T[2, 3]', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'T[0, 4]', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'T[-5, 2]', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'T[4, 1]', 'is_correct' => true, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 16,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Pernyataan yang BENAR mengenai translasi titik pada koordinat Kartesius:',
                                'explanation' => 'Translasi tidak mengubah luas bangun datar (bangun tetap kongruen).',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Translasi mendatar ke kanan bernilai positif', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Translasi vertikal ke bawah bernilai negatif', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Translasi mengubah luas bangun datar', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Translasi dapat dirumuskan dengan penjumlahan koordinat', 'is_correct' => true, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 17,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => 'Pasangkan titik asal dan translasi dengan koordinat bayangannya:',
                                'explanation' => 'Pasangan hasil operasi translasi titik koordinat.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '(1, 2) ditranslasikan T[3, 4]', 'is_correct' => false, 'match_key' => '(4, 6)', 'order' => 1],
                                    ['label' => null, 'option_text' => '(5, -1) ditranslasikan T[-2, 3]', 'is_correct' => false, 'match_key' => '(3, 2)', 'order' => 2],
                                    ['label' => null, 'option_text' => '(-3, 0) ditranslasikan T[4, -2]', 'is_correct' => false, 'match_key' => '(1, -2)', 'order' => 3],
                                    ['label' => null, 'option_text' => '(0, 0) ditranslasikan T[-5, -5]', 'is_correct' => false, 'match_key' => '(-5, -5)', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 18,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => 'Pasangkan pergeseran verbal dengan vektor translasi:',
                                'explanation' => 'Pasangan translasi verbal dan vektor.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '5 langkah ke kanan, 2 langkah ke atas', 'is_correct' => false, 'match_key' => 'T[5, 2]', 'order' => 1],
                                    ['label' => null, 'option_text' => '3 langkah ke kiri, 4 langkah ke bawah', 'is_correct' => false, 'match_key' => 'T[-3, -4]', 'order' => 2],
                                    ['label' => null, 'option_text' => '2 langkah ke kiri, 6 langkah ke atas', 'is_correct' => false, 'match_key' => 'T[-2, 6]', 'order' => 3],
                                    ['label' => null, 'option_text' => '4 langkah ke kanan, 1 langkah ke bawah', 'is_correct' => false, 'match_key' => 'T[4, -1]', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 19,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan kebenaran pernyataan sifat transformasi geometri:',
                                'explanation' => 'Translasi ke kiri mengurangi nilai absis x (bernilai negatif).',
                                'group_index' => null,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Translasi menghasilkan bayangan yang kongruen dengan bangun asli', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Jika titik (3, 2) ditranslasi T[-3, -2], bayangannya adalah titik asal (0, 0)', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Translasi ke kiri menambah nilai absis x', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 3],
                                ],
                            ],
                            [
                                'order' => 20,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan kebenaran hasil translasi berikut:',
                                'explanation' => 'Titik (0, -3) digeser T[0, -3] menjadi (0, -6), bukan (0, 0).',
                                'group_index' => null,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Titik (2, 5) digeser T[1, 1] menjadi (3, 6)', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Titik (-4, 2) digeser T[4, 0] menjadi (0, 2)', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Titik (0, -3) digeser T[0, -3] menjadi (0, 0)', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 3],
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
                                'prompt' => 'Pergeseran setiap titik pada bidang geometri dengan jarak dan arah tertentu dinamakan...',
                                'explanation' => 'Pergeseran disebut translasi.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'translasi', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Titik A(3, 8) ditranslasikan dengan T[2, -5]. Koordinat bayangan A\' adalah (5, ...).',
                                'explanation' => 'y\' = 8 + (-5) = 3.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '3', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Jika titik B(-1, 4) digeser 5 satuan ke kanan, maka absis bayangan titik B menjadi...',
                                'explanation' => 'Absis baru = -1 + 5 = 4.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '4', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Titik P(0, 0) yang ditranslasikan oleh T[-4, 7] akan memiliki bayangan di kuadran ke-...',
                                'explanation' => 'Titik (-4, 7) terletak di Kuadran II.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '2', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Jika A(x, y) ditranslasi oleh T[a, b] menghasilkan A\'(x\', y\'), rumus x\' adalah x + ...',
                                'explanation' => 'x\' = x + a.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'a', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Bangun datar yang mengalami translasi memiliki luas yang ... dengan bangun aslinya.',
                                'explanation' => 'Translasi mempertahankan luas dan ukuran (kongruen/sama).',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'sama', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Sebuah titik P(6, 2) digeser menjadi P\'(9, 7). Vektor translasinya adalah T[3, ...].',
                                'explanation' => 'b = 7 - 2 = 5.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '5', 'is_correct' => true, 'match_key' => null, 'order' => 1],
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
                                'prompt' => 'Sebuah segitiga PQR memiliki titik-titik sudut P(1, 1), Q(4, 1), dan R(1, 5).
a. Tentukan koordinat bayangan P\', Q\', dan R\' jika segitiga tersebut ditranslasikan oleh T[3, 2]!
b. Hitunglah luas segitiga PQR sebelum translasi dan luas segitiga P\'Q\'R\' setelah translasi! Apakah luasnya berubah? Berikan kesimpulanmu!',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Kunci Jawaban & Rubrik:
a. Koordinat bayangan hasil translasi T[3, 2]:
   - P(1, 1) -> P\'(1+3, 1+2) = P\'(4, 3)
   - Q(4, 1) -> Q\'(4+3, 1+2) = Q\'(7, 3)
   - R(1, 5) -> R\'(1+3, 5+2) = R\'(4, 7)
b. Luas segitiga awal PQR:
   Alas PQ = 4 - 1 = 3 satuan; Tinggi PR = 5 - 1 = 4 satuan.
   Luas PQR = 1/2 x 3 x 4 = 6 satuan luas.
   Luas segitiga bayangan P\'Q\'R\':
   Alas P\'Q\' = 7 - 4 = 3 satuan; Tinggi P\'R\' = 7 - 3 = 4 satuan.
   Luas P\'Q\'R\' = 1/2 x 3 x 4 = 6 satuan luas.
   Kesimpulan: Luas segitiga tidak berubah karena translasi adalah transformasi kaku (isometri) yang mempertahankan bentuk dan ukuran bangun.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                            [
                                'order' => 2,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => 'Sebuah persegi panjang KLMN memiliki koordinat K(-3, -2), L(2, -2), M(2, 1), dan N(-3, 1).
a. Bangun tersebut mengalami pergeseran sehingga titik K berpindah ke K\'(1, 3). Tentukan vektor translasi T yang digunakan!
b. Tentukan koordinat titik bayangan L\', M\', dan N\' akibat translasi tersebut!',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Kunci Jawaban & Rubrik:
a. Menentukan vektor translasi T[a, b]:
   a = x\' - x = 1 - (-3) = 4
   b = y\' - y = 3 - (-2) = 5
   Maka translasi T = T[4, 5].
b. Menentukan bayangan titik lainnya:
   - L(2, -2) -> L\'(2+4, -2+5) = L\'(6, 3)
   - M(2, 1) -> M\'(2+4, 1+5) = M\'(6, 6)
   - N(-3, 1) -> N\'(-3+4, 1+5) = N\'(1, 6)',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                            [
                                'order' => 3,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => 'Titik A(2, 4) mengalami dua tahap transformasi berurutan:
Tahap 1: Dicerminkan terhadap sumbu X menghasilkan titik A1.
Tahap 2: Titik A1 kemudian ditranslasikan oleh T[-5, 6] menghasilkan titik A2.
a. Tentukan koordinat titik A1 hasil pencerminan!
b. Tentukan koordinat titik akhir A2 setelah translasi!
c. Di kuadran berapakah titik akhir A2 berada?',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Kunci Jawaban & Rubrik:
a. Tahap 1: Pencerminan titik A(2, 4) terhadap sumbu X membalik nilai y -> A1(2, -4).
b. Tahap 2: Titik A1(2, -4) ditranslasi T[-5, 6]:
   x2 = 2 + (-5) = -3
   y2 = -4 + 6 = 2
   Maka titik akhir A2 = (-3, 2).
c. Karena absis x2 bernilai negatif (-3) dan ordinat y2 bernilai positif (2), maka titik A2 berada di Kuadran II.',
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
