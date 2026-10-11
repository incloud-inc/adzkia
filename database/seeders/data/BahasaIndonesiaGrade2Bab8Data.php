<?php

namespace Database\Seeders\Data;

class BahasaIndonesiaGrade2Bab8Data
{
    public static function getAssessments(): array
    {
        return [
            [
                'title' => 'Quiz 1 Bab 8: Hobi yang Bermanfaat',
                'type' => 'ph',
                'duration_minutes' => 45,
                'description' => 'Asesmen formatif Bab 8 (Quiz 1) materi hobi membaca, olahraga fisik, keragaman hobi, dan disiplin berlatih.',
                'sections' => [
                    [
                        'title' => 'Bagian 1: Pilihan Ganda',
                        'instructions' => 'Pilihlah salah satu huruf A, B, atau C pada jawaban yang paling benar!',
                        'order' => 1,
                        'questions' => [
                            [
                                'order' => 1,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Kegiatan kegemaran yang dilakukan pada waktu luang untuk menyegarkan pikiran disebut ....',
                                'explanation' => 'Hobi adalah kegiatan menyenangkan yang ditekuni pada waktu senggang.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'pekerjaan berat', 'is_correct' => false],
                                    ['label' => 'B', 'option_text' => 'hobi', 'is_correct' => true],
                                    ['label' => 'C', 'option_text' => 'tugas piket', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Lani suka membaca bermacam-macam buku cerita dan sains. Manfaat hobi membaca adalah ....',
                                'explanation' => 'Membaca adalah jembatan ilmu pengetahuan.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'membuat mata cepat mengantuk', 'is_correct' => false],
                                    ['label' => 'B', 'option_text' => 'menambah ilmu pengetahuan dan wawasan', 'is_correct' => true],
                                    ['label' => 'C', 'option_text' => 'uang jajan cepat habis', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Edo memiliki hobi bermain sepak bola. Selain menyenangkan, bermain sepak bola membuat tubuh menjadi ....',
                                'explanation' => 'Olahraga rutin menyehatkan jantung dan otot tubuh.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'mudah sakit flu', 'is_correct' => false],
                                    ['label' => 'B', 'option_text' => 'sehat, kuat, dan bugar', 'is_correct' => true],
                                    ['label' => 'C', 'option_text' => 'lelah tidak bersemangat', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Tempat di sekolah yang paling tepat dikunjungi bagi anak yang memiliki hobi membaca adalah ....',
                                'explanation' => 'Perpustakaan menyediakan beragam buku bacaan.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'kantin sekolah', 'is_correct' => false],
                                    ['label' => 'B', 'option_text' => 'perpustakaan', 'is_correct' => true],
                                    ['label' => 'C', 'option_text' => 'ruang UKS', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Boni gemar menggambar pemandangan alam. Peralatan yang dibutuhkan Boni antara lain ....',
                                'explanation' => 'Buku gambar dan krayon/pensil warna alat utama menggambar.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'buku gambar dan pensil warna', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'panci dan wajan', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'bola dan peluit', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Jika teman kita memiliki hobi yang berbeda dengan kita, sikap kita sebaiknya ....',
                                'explanation' => 'Kita harus menghormati keragaman hobi teman.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'menghargai dan memberi semangat', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'mengejek hobinya membosankan', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'memaksa mengikuti hobi kita', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Menekuni hobi berkebun di halaman rumah bermanfaat untuk ....',
                                'explanation' => 'Berkebun menghasilkan tanaman hijau yang menyejukkan.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'membuat lingkungan rumah asri dan sejuk', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'menambah sampah plastik', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'mengotori air sumur', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Kalimat yang menceritakan sebuah hobi dengan benar adalah ....',
                                'explanation' => 'Kalimat tersebut menceritakan aktivitas hobi seni tari Made.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '\'Setiap sore Made berlatih menari Bali dengan tekun.\'', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '\'Kemarin Made tidak sengaja terpeleset.\'', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '\'Made sedang sakit demam.\'', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Agar hobi yang kita miliki dapat menghasilkan prestasi yang membanggakan, kita harus ....',
                                'explanation' => 'Latihan rutin dan disiplin kunci meraih prestasi.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'berlatih dengan sungguh-sungguh dan disiplin', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'berlatih sesuka hati jika ingat', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'malas-malasan di rumah', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Hobi yang dapat melatih kesabaran dan ketelitian tangan adalah ....',
                                'explanation' => 'Origami melatih konsentrasi dan keterampilan motorik halus.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'merakit lego atau melipat kertas origami', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'menonton televisi seharian', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'tidur siang lama', 'is_correct' => false],
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Bagian 2: Isian Singkat',
                        'instructions' => 'Isilah titik-titik di bawah ini dengan jawaban yang singkat dan tepat!',
                        'order' => 2,
                        'questions' => [
                            [
                                'order' => 1,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Kegiatan menyenangkan yang disukai dan dilakukan di waktu luang disebut ....',
                                'explanation' => 'hobi / kegemaran',
                            ],
                            [
                                'order' => 2,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Membaca buku bermanfaat untuk menambah .... dan ilmu.',
                                'explanation' => 'wawasan / pengetahuan',
                            ],
                            [
                                'order' => 3,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Orang yang gemar berolahraga lari memiliki tubuh yang .... dan sehat.',
                                'explanation' => 'bugar / kuat',
                            ],
                        ],
                    ],
                    [
                        'title' => 'Bagian 3: Uraian',
                        'instructions' => 'Jawablah pertanyaan berikut dengan uraian yang jelas dan santun!',
                        'order' => 3,
                        'questions' => [
                            [
                                'order' => 1,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => 'Apa arti dari kata \'hobi\'?',
                                'explanation' => 'Kegiatan menyenangkan yang digemari dan dilakukan pada waktu senggang.',
                            ],
                            [
                                'order' => 2,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => 'Sebutkan dua manfaat yang kamu peroleh jika menekuni hobi menggambar!',
                                'explanation' => 'Melatih daya imajinasi/kreativitas dan melatih kesabaran serta kerapian tangan.',
                            ],
                        ],
                    ],
                ],
            ],
            [
                'title' => 'Quiz 2 Bab 8: Hobi yang Bermanfaat',
                'type' => 'ph',
                'duration_minutes' => 45,
                'description' => 'Asesmen formatif Bab 8 (Quiz 2) materi keterampilan memasak, puisi kegemaran, sportivitas lomba, dan manajemen waktu hobi.',
                'sections' => [
                    [
                        'title' => 'Bagian 1: Pilihan Ganda',
                        'instructions' => 'Pilihlah salah satu huruf A, B, atau C pada jawaban yang paling benar!',
                        'order' => 1,
                        'questions' => [
                            [
                                'order' => 1,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Siti memiliki hobi memasak kue bersama ibu di dapur. Keterampilan yang dilatih dari hobi tersebut adalah ....',
                                'explanation' => 'Memasak melatih ketelitian takaran bahan dan kerja sama.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'keterampilan mengukur bahan dan kreativitas rasa', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'berlari kencang di lapangan', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'bernyanyi dengan suara tinggi', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Perhatikan puisi pendek: 
\'Buku, kau jendela duniaku
Setiap lembar kubuka ceritamu
Kau beri aku ilmu berguna\'
Puisi di atas menceritakan tentang ....',
                                'explanation' => 'Puisi tersebut bertema buku sebagai sumber ilmu.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'sepatu baru', 'is_correct' => false],
                                    ['label' => 'B', 'option_text' => 'buku bacaan', 'is_correct' => true],
                                    ['label' => 'C', 'option_text' => 'mainan layangan', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Hobi mengoleksi prangko atau koin antik sering disebut dengan istilah ....',
                                'explanation' => 'Mengoleksi prangko disebut hobi filateli.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'filateli / numismatik', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'fotografi', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'otomotif', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Bobi suka bermain catur. Permainan catur sangat baik untuk melatih kemampuan ....',
                                'explanation' => 'Catur adalah olahraga asah otak dan strategi.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'berpikir strategi dan konsentrasi otak', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'kekuatan otot kaki', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'kecepatan berenang', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Ketika mengikuti lomba mewarnai di balai kota, sikap kita jika belum menang adalah ....',
                                'explanation' => 'Tetap optimis dan pantang menyerah.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'merobek kertas gambar', 'is_correct' => false],
                                    ['label' => 'B', 'option_text' => 'tetap semangat dan terus giat berlatih', 'is_correct' => true],
                                    ['label' => 'C', 'option_text' => 'marah kepada juri lomba', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Hobi menyanyi dapat melatih kepercayaan diri saat tampil di ....',
                                'explanation' => 'Bernyanyi melatih vokal dan mental percaya diri di depan publik.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'kamar mandi tertutup', 'is_correct' => false],
                                    ['label' => 'B', 'option_text' => 'depan banyak orang / panggung', 'is_correct' => true],
                                    ['label' => 'C', 'option_text' => 'bawah selimut', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Waktu yang paling tepat untuk menyalurkan hobi kita adalah ....',
                                'explanation' => 'Hobi dilakukan di waktu luang tanpa mengabaikan kewajiban.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'saat guru sedang menjelaskan materi pelajaran di kelas', 'is_correct' => false],
                                    ['label' => 'B', 'option_text' => 'saat waktu senggang atau libur sekolah setelah tugas selesai', 'is_correct' => true],
                                    ['label' => 'C', 'option_text' => 'saat tengah malam waktu tidur', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Jika adikmu ingin belajar hobi barumu, sikapmu sebaiknya ....',
                                'explanation' => 'Berbagi ilmu dengan adik melatih kasih sayang.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'mengajarinya dengan sabar dan gembira', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'membentaknya agar menjauh', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'menyembunyikan perlengkapan main', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Perhatikan kata: berenang, bersepeda, senam. Semua hobi tersebut termasuk dalam kategori hobi ....',
                                'explanation' => 'Kegiatan tersebut merupakan aktivitas olahraga fisik.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'olahraga fisik', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'kesenian suara', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'kerajinan tangan', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Hasil karya dari hobi membuat kerajinan dari stik es krim dapat digunakan sebagai ....',
                                'explanation' => 'Stik es krim bisa dikreasikan jadi tempat pensil unik.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'tempat pensil meja yang cantik', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'bahan memasak sayur', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'bola sepak', 'is_correct' => false],
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Bagian 2: Isian Singkat',
                        'instructions' => 'Isilah titik-titik di bawah ini dengan jawaban yang singkat dan tepat!',
                        'order' => 2,
                        'questions' => [
                            [
                                'order' => 1,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Puisi pendek dibaca dengan memperhatikan lafal dan .... yang tepat.',
                                'explanation' => 'intonasi / ekspresi',
                            ],
                            [
                                'order' => 2,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Hobi berenang sangat baik untuk melatih pernapasan dan kekuatan .... tubuh.',
                                'explanation' => 'otot / stamina',
                            ],
                            [
                                'order' => 3,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Alat musik petik tradisional yang dimainkan dengan jari adalah ....',
                                'explanation' => 'gitar / kecapi / sasando',
                            ],
                        ],
                    ],
                    [
                        'title' => 'Bagian 3: Uraian',
                        'instructions' => 'Jawablah pertanyaan berikut dengan uraian yang jelas dan santun!',
                        'order' => 3,
                        'questions' => [
                            [
                                'order' => 1,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => 'Kapan waktu yang tepat bagi seorang siswa untuk melakukan kegemaran hobinya?',
                                'explanation' => 'Pada waktu senggang, saat libur sekolah, atau setelah semua tugas belajar dan pekerjaan rumah selesai dikerjakan.',
                            ],
                            [
                                'order' => 2,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => 'Tuliskan dua contoh hobi yang berhubungan dengan bidang kesenian!',
                                'explanation' => 'Menggambar (melukis) dan menari.',
                            ],
                        ],
                    ],
                ],
            ],
            [
                'title' => 'Quiz 3 Bab 8: Hobi yang Bermanfaat',
                'type' => 'ph',
                'duration_minutes' => 45,
                'description' => 'Asesmen formatif Bab 8 (Quiz 3) materi wawancara hobi, merawat hewan piaraan, kerja sama musik, dan berbagi keterampilan.',
                'sections' => [
                    [
                        'title' => 'Bagian 1: Pilihan Ganda',
                        'instructions' => 'Pilihlah salah satu huruf A, B, atau C pada jawaban yang paling benar!',
                        'order' => 1,
                        'questions' => [
                            [
                                'order' => 1,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Perhatikan teks wawancara singkat: 
Dani: "Wah, lukisanmu bagus sekali, Made! Sejak kapan kamu suka melukis?"
Made: "Terima kasih, Dani. Aku suka melukis sejak umur lima tahun."
Isi wawancara di atas membicarakan tentang ....',
                                'explanation' => 'Percakapan membahas kegemaran melukis yang ditekuni Made.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'hobi melukis Made', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'makanan kesukaan Dani', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'sepatu baru Made', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Seorang anak yang hobi memelihara ikan hias di akuarium harus rajin ....',
                                'explanation' => 'Merawat hewan piaraan membutuhkan tanggung jawab memberi pakan.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'menguras air akuarium dan memberi makan teratur', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'memasukkan sabun ke air akuarium', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'membiarkan ikan kelaparan', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Menyalurkan hobi secara positif dapat menghindarkan anak dari kebiasaan buruk, seperti ....',
                                'explanation' => 'Hobi positif mencegah kecanduan gadget.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'membaca buku cerita', 'is_correct' => false],
                                    ['label' => 'B', 'option_text' => 'bermain game di gawai secara berlebihan', 'is_correct' => true],
                                    ['label' => 'C', 'option_text' => 'membantu orang tua', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Hobi bermain musik angklung membutuhkan kerja sama karena angklung dimainkan secara ....',
                                'explanation' => 'Angklung dimainkan berkelompok membentuk nada lagu harmonis.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'sendirian di kamar gelap', 'is_correct' => false],
                                    ['label' => 'B', 'option_text' => 'bersama-sama dalam kelompok harmoni', 'is_correct' => true],
                                    ['label' => 'C', 'option_text' => 'tanpa bersuara', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Ketika kita membuat jurnal atau buku harian cerita, kita sedang melatih hobi ....',
                                'explanation' => 'Buku harian mengasah kebiasaan menulis cerita.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'menulis karangan', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'memasak makanan', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'memperbaiki sepeda', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Tono bercita-cita menjadi atlet bulu tangkis kebanggaan Indonesia. Yang harus dilakukan Tono adalah ....',
                                'explanation' => 'Latihan teratur membawa prestasi olahraga.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'berlatih teknik pukulan kok setiap hari dengan sungguh-sungguh', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'tidur seharian', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'hanya menonton televisi', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Dalam membaca puisi hobi, mimik wajah kita harus .... dengan isi puisi.',
                                'explanation' => 'Mimik wajah harus menjiwai perasaan puisi.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'sesuai dan ekspresif', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'datar tanpa perasaan', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'tertawa terus menerus', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Jika teman berhasil memenangkan lomba menyanyi tingkat kabupaten, kalimat selamat yang santun adalah ....',
                                'explanation' => 'Memberikan ucapan selamat tulus membahagiakan teman.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '\'Selamat atas keberhasilanmu ya, suaramu memang luar biasa!\'', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '\'Pasti jurinya salah pilih pemenang!\'', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '\'Aku tidak peduli kamu menang.\'', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Manfaat menekuni hobi fotografi alam adalah ....',
                                'explanation' => 'Fotografi melatih rasa estetika dan apresiasi alam.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'belajar mengamati keindahan ciptaan Tuhan melalui lensa', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'merusak pepohonan taman', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'membuang-buang waktu luang', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Menjadikan hobi sebagai hal yang bermanfaat bagi orang lain contohnya adalah ....',
                                'explanation' => 'Membagikan keterampilan kepada orang lain sangat bermanfaat.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'mengajari adik membaca buku cerita dengan ceria', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'pamer keahlian kepada tetangga', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'menghina orang yang tidak bisa', 'is_correct' => false],
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Bagian 2: Isian Singkat',
                        'instructions' => 'Isilah titik-titik di bawah ini dengan jawaban yang singkat dan tepat!',
                        'order' => 2,
                        'questions' => [
                            [
                                'order' => 1,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Alat musik tradisional Jawa Barat yang terbuat dari bambu dan digoyangkan adalah ....',
                                'explanation' => 'angklung',
                            ],
                            [
                                'order' => 2,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Membaca buku cerita kepada adik dengan suara berganti-ganti melatih seni ....',
                                'explanation' => 'bercerita / mendongeng',
                            ],
                            [
                                'order' => 3,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Sikap yang harus dihindari saat memiliki keahlian hobi yang hebat adalah bersikap ....',
                                'explanation' => 'sombong / ria / tinggi hati',
                            ],
                        ],
                    ],
                    [
                        'title' => 'Bagian 3: Uraian',
                        'instructions' => 'Jawablah pertanyaan berikut dengan uraian yang jelas dan santun!',
                        'order' => 3,
                        'questions' => [
                            [
                                'order' => 1,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => 'Bagaimana cara meraih prestasi juara dari hobi yang kita sukai?',
                                'explanation' => 'Dengan rajin berlatih dengan disiplin, pantang menyerah, serta mendengarkan bimbingan dari guru atau pelatih.',
                            ],
                            [
                                'order' => 2,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => 'Sebutkan dua contoh hobi yang dapat menghasilkan uang atau karya bermanfaat!',
                                'explanation' => 'Membuat kerajinan tangan (kriya) dan membuat kue / memasak.',
                            ],
                        ],
                    ],
                ],
            ],
        ];
    }
}
