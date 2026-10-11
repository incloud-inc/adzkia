<?php

namespace Database\Seeders\Data;

class BahasaIndonesiaGrade6Bab6Data
{
    /**
     * Data bundle asesmen Kelas 6 SD Kurikulum Merdeka Fase C.
     */
    public static function getAssessments(): array
    {
        return [
            [
                'title' => 'Kuis Bab 6 Bahasa Indonesia Kelas 6 (Paket 1 - Cerpen & Unsur Intrinsik)',
                'type' => 'quiz',
                'description' => 'Asesmen formatif Bab 6 bagian 1: Menganalisis tema, tokoh protagonis/antagonis, penokohan analitik/dramatik, dan latar cerita fiksi.',
                'duration_minutes' => 45,
                'sections' => [
                    [
                        'title' => 'Bagian 1: Objektif Beragam (Pilihan Ganda, Pilihan Ganda Kompleks, Menjodohkan, Benar-Salah)',
                        'instructions' => 'Pilihlah dan jawablah soal-soal objektif berikut secara cermat dan teliti.',
                        'order' => 1,
                        'question_groups' => [
                            ['title' => 'Stimulus 1: Malam Api Unggun di Bumi Perkemahan Cibodas', 'content' => '[Keterangan Gambar: Suasana hangat malam perpisahan kelas 6 di sekeliling api unggun perkemahan: puluhan siswa saling bergandengan tangan menyanyikan lagu perpisahan dengan mata berbinar-binar haru di bawah gemerlap bintang pegunungan.]

Malam kian larut di Bumi Perkemahan Cibodas, namun kehangatan kobaran api unggun menepis hawa dingin lereng Gunung Gede. Rombongan siswa kelas 6 SD Melati duduk melingkar mengelilingi lidah-lidah api yang menari lincah. Wajah-wajah sahabat karib yang telah enam tahun bersama tampak berseri sekaligus diliputi keharuan mendalam.

Bagas, sang ketua kelas yang selalu bertanggung jawab dan penuh perhatian, melangkah maju ke depan lingkaran. Dengan suara sedikit bergetar, ia menyampaikan sepatah kata perpisahan: "Teman-teman, malam ini adalah malam terakhir perkemahan kita sebelum menempuh ujian kelulusan dan melanjutkan ke jenjang SMP. Jangan pernah melupakan kebersamaan kita saat belajar, tertawa, dan saling membantu di kelas dasar ini." Air mata haru menetes di pipi Rasti, gadis periang yang malam itu tampak begitu larut dalam nostalgia pertemanan mereka. Suasana perkemahan hening sejenak, berganti dengan lantunan lagu "Kemersaan" yang mereka nyanyikan bersama dengan penuh penghayatan.'],
                            ['title' => 'Stimulus 2: Menelaah Unsur Intrinsik Cerita Pendek (Cerpen)', 'content' => '[Keterangan Gambar: Bagan roda unsur intrinsik karya fiksi: 1. Tema (gagasan pokok cerita), 2. Tokoh & Penokohan (pelaku dan perwatakan), 3. Latar/Setting (tempat, waktu, suasana), 4. Alur/Plot (jalannya peristiwa), 5. Sudut Pandang (posisi pengarang), 6. Amanat (pesan moral).]

Unsur intrinsik adalah unsur-unsur yang membangun karya sastra dari dalam cerita itu sendiri. Penokohan atau perwatakan dapat disampaikan secara langsung (analitik) oleh pengarang atau secara tidak langsung (dramatik) melalui dialog antartokoh, tingkah laku fisik, dan jalan pikiran tokoh. Latar (*setting*) tidak hanya berfungsi sebagai tempat fisik terjadinya cerita, tetapi juga turut menciptakan atmosfer psikologis dan suasana batin yang menyentuh perasaan pembaca.'],
                        ],
                        'questions' => [
                            [
                                'order' => 1,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Berdasarkan cerpen di atas, latar tempat berlangsungnya peristiwa malam perpisahan kelas adalah ....',
                                'explanation' => 'Dalam teks: "Malam kian larut di Bumi Perkemahan Cibodas... lereng Gunung Gede."',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Bumi Perkemahan Cibodas di lereng Gunung Gede', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Ruang kelas 6 SD Melati di perkotaan', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Gedung aula kantor dinas pendidikan', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Pantai Pasir Putih di sore hari', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Watak tokoh Bagas dalam cerita tersebut digambarkan sebagai sosok yang ....',
                                'explanation' => 'Bagas adalah ketua kelas yang bertanggung jawab dan penuh perhatian.',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Bertanggung jawab, penuh perhatian, dan bijaksana', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Penakut, pemalu, dan penyendiri', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Pemarah, sombong, dan egois', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Suka berbohong kepada teman-temannya', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Pilihlah DUA latar waktu dan suasana yang tercermin dalam kutipan cerita!',
                                'explanation' => 'Latar malam hari dingin dan suasana haru hangat.',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Latar waktu: Malam hari yang dingin', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Latar suasana: Penuh keharuan dan kehangatan persahabatan', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Latar waktu: Pagi hari yang cerah benderang', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Latar suasana: Mencekam dan menakutkan', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => 'Jodohkan tokoh cerita di kolom kiri dengan perannya di kolom kanan!',
                                'explanation' => 'Pasangan tokoh dan perannya dalam cerita perpisahan.',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'Bagas', 'is_correct' => false, 'match_key' => 'Ketua kelas yang bertanggung jawab menyampaikan pesan perpisahan', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Rasti', 'is_correct' => false, 'match_key' => 'Gadis periang yang terharu meneteskan air mata nostalgia', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Teman-teman sekelas', 'is_correct' => false, 'match_key' => 'Peserta perkemahan yang bernyanyi bersama mengelilingi api unggun', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Bumi Perkemahan Cibodas', 'is_correct' => false, 'match_key' => 'Latar tempat perkemahan perpisahan kelas 6', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Unsur intrinsik cerpen yang menjadi gagasan atau ide pokok yang mendasari seluruh cerita dinamakan ....',
                                'explanation' => 'Tema adalah gagasan pokok cerita.',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Tema', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Alur', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Latar', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Amanat', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Penggambaran watak tokoh melalui dialog dan perbuatan tokoh disebut teknik penokohan secara ....',
                                'explanation' => 'Dramatik menggambarkan watak lewat dialog dan tindakan.',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Dramatik (tidak langsung)', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Analitik (langsung)', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Monolog statis', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Deskriptif kaku', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan status kebenaran unsur intrinsik cerpen!',
                                'explanation' => 'Unsur intrinsik berasal dari dalam teks, unsur ekstrinsik dari luar teks.',
                                'group_index' => 1,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Latar cerita meliputi latar tempat, latar waktu, dan latar suasana.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Amanat adalah pesan moral yang ingin disampaikan pengarang kepada pembaca.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Unsur intrinsik adalah unsur yang berasal dari luar teks cerita sastra.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 3],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Tokoh yang memegang peranan utama dan berwatak baik dalam cerita disebut tokoh ....',
                                'explanation' => 'Tokoh utama berwatak baik adalah protagonis.',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Protagonis', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Antagonis', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Tritagonis', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Figuran', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Tokoh penentang tokoh utama yang berwatak jahat atau memicu konflik disebut tokoh ....',
                                'explanation' => 'Tokoh jahat/penentang adalah antagonis.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Antagonis', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Protagonis', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Tritagonis', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Figuran', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Tokoh penengah yang membantu menyelesaikan perselisihan antartokoh disebut tokoh ....',
                                'explanation' => 'Tritagonis adalah tokoh penengah.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Tritagonis', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Antagonis', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Protagonis', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Sampingan', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 11,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Kalimat yang menunjukkan latar suasana tegang adalah ....',
                                'explanation' => 'Jantung berdegup kencang menggambarkan suasana tegang.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Jantung Rudi berdegup kencang saat menunggu giliran pembacaan surat keputusan kelulusan.', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Suara gemericik air sungai terdengar menenangkan jiwa para pendaki.', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Tawa riang anak-anak membahana di taman bermain sekolah.', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Semilir angin sepoi-sepoi membuat matanya terasa mengantuk.', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 12,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Metode penggambaran watak tokoh secara langsung oleh pengarang di dalam teks dinamakan metode ....',
                                'explanation' => 'Metode langsung disebut analitik.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Analitik', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Dramatik', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Kinestetik', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Akustik', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 13,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Kalimat yang menunjukkan latar waktu fajar adalah ....',
                                'explanation' => 'Merekah di ufuk timur saat ayam berkokok adalah fajar pagi.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Cahaya merah keemasan mulai merekah di ufuk timur saat ayam jantan berkokok.', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Bulan purnama bersinar terang di tengah langit malam yang kelam.', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Matahari tepat berada di atas kepala membakar kulit para petani.', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Lampu-lampu jalan mulai dinyalakan menyambut kedatangan senja.', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 14,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Amanat dalam sebuah cerita pendek biasanya dapat disimpulkan setelah pembaca ....',
                                'explanation' => 'Amanat disimpulkan setelah membaca utuh cerita.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Membaca seluruh isi cerita dari awal hingga akhir', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Melihat warna sampul depan buku cerita saja', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Menghitung jumlah halaman pada buku cerpen', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Mengetahui harga jual buku di toko buku', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 15,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Pilihlah DUA hal yang termasuk ke dalam unsur intrinsik karya fiksi!',
                                'explanation' => 'Alur dan sudut pandang adalah unsur intrinsik.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Alur cerita (plot)', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Sudut pandang pengarang (point of view)', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Biaya percetakan buku di penerbit', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Jumlah royalti yang diterima pengarang', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 16,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Pilihlah DUA contoh watak tokoh protagonis yang patut diteladani!',
                                'explanation' => 'Pemaaf, setia kawan, jujur, bertanggung jawab adalah watak terpuji protagonis.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Pemaaf dan setia kawan', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Jujur dan bertanggung jawab', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Pendendam dan mudah marah', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Kikir dan suka mencuri', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 17,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => 'Jodohkan jenis tokoh cerita dengan perannya!',
                                'explanation' => 'Pasangan jenis tokoh fiksi.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'Protagonis', 'is_correct' => false, 'match_key' => 'Tokoh utama pembawa nilai-nilai kebaikan', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Antagonis', 'is_correct' => false, 'match_key' => 'Tokoh penentang yang memicu timbulnya konflik', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Tritagonis', 'is_correct' => false, 'match_key' => 'Tokoh penengah yang bijaksana mendamaikan konflik', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Figuran', 'is_correct' => false, 'match_key' => 'Tokoh pelengkap pembantu yang melengkapi suasana latar', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 18,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => 'Jodohkan contoh kutipan dengan unsur latar yang ditunjukkannya!',
                                'explanation' => 'Pasangan kutipan kalimat dan latarnya.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '"Hujan rintik membasahi teras rumah panggung."', 'is_correct' => false, 'match_key' => 'Latar Tempat', 'order' => 1],
                                    ['label' => null, 'option_text' => '"Tepat saat lonceng berdentang dua belas kali tengah malam."', 'is_correct' => false, 'match_key' => 'Latar Waktu', 'order' => 2],
                                    ['label' => null, 'option_text' => '"Ketakutan mencekam menyelimuti lorong gua yang sunyi."', 'is_correct' => false, 'match_key' => 'Latar Suasana', 'order' => 3],
                                    ['label' => null, 'option_text' => '"Di kaki perbukitan teh perkebunan Malabar."', 'is_correct' => false, 'match_key' => 'Latar Tempat', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 19,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan status kebenaran penokohan dalam cerpen!',
                                'explanation' => 'Fiksi adalah cerita rekaan, bukan rekaman peristiwa nyata mutlak.',
                                'group_index' => null,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Watak tokoh dapat diketahui melalui pikiran dan dialog antartokoh.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Cerita fiksi selalu menyajikan peristiwa yang benar-benar terjadi di dunia nyata.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Latar suasana dapat berubah-ubah seiring jalannya alur cerita.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 3],
                                ],
                            ],
                            [
                                'order' => 20,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan status kebenaran tema dan amanat cerita!',
                                'explanation' => 'Amanat umumnya tersirat dalam jalinan cerita.',
                                'group_index' => null,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Tema merupakan dasar pengembangan cerita yang menjiwai seluruh alur.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Amanat selalu diucapkan secara terang-terangan oleh pengarang di setiap halaman.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Amanat cerita fiksi sering disampaikan secara tersirat di akhir kisah.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 3],
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
                                'prompt' => 'Unsur pembangun karya sastra yang berasal dari dalam teks cerita dinamakan unsur ....',
                                'explanation' => 'Unsur intrinsik.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'intrinsik', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Gagasan sentral atau ide pokok yang mendasari seluruh cerita fiksi disebut ....',
                                'explanation' => 'Tema cerita.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'tema', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Tokoh utama yang memiliki watak baik dan berbudi pekerti luhur disebut tokoh ....',
                                'explanation' => 'Protagonis.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'protagonis', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Keterangan mengenai waktu, tempat, dan suasana terjadinya cerita dinamakan ....',
                                'explanation' => 'Latar / setting.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'latar', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Tokoh yang memicu pertentangan dan berwatak jahat dinamakan tokoh ....',
                                'explanation' => 'Antagonis.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'antagonis', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Pesan moral atau nasihat kebaikan yang ingin disampaikan pengarang kepada pembaca disebut ....',
                                'explanation' => 'Amanat cerita.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'amanat', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Pemberian sifat atau watak pada tokoh-tokoh cerita dinamakan ....',
                                'explanation' => 'Penokohan / perwatakan.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'penokohan', 'is_correct' => true, 'match_key' => null, 'order' => 1],
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
                                'prompt' => 'Sebutkan dan jelaskan secara lengkap enam unsur intrinsik yang membangun sebuah cerita pendek (tema, tokoh/penokohan, latar, alur, sudut pandang, dan amanat)!',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Rubrik Penilaian & Kunci Jawaban:
1. Tema: Pokok gagasan pikiran yang menjadi dasar cerita.
2. Tokoh & Penokohan: Pelaku cerita dan watak/karakter kepribadian yang melekat padanya.
3. Latar (Setting): Tempat, waktu, dan suasana terjadinya rangkaian peristiwa dalam cerita.
4. Alur (Plot): Jalinan peristiwa yang memiliki hubungan sebab-akibat dari awal hingga akhir.
5. Sudut Pandang (Point of View): Cara pandang pengarang menempatkan dirinya dalam cerita (orang pertama "aku" atau orang ketiga "dia/ia").
6. Amanat: Nasihat bijak atau pesan moral yang ingin disampaikan penulis kepada pembaca.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                            [
                                'order' => 2,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => 'Jelaskan dua teknik penggambaran watak tokoh dalam cerpen, yaitu teknik analitik (langsung) dan teknik dramatik (tidak langsung), serta berikan contoh kalimat untuk masing-masing teknik tersebut!',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Rubrik Penilaian & Kunci Jawaban:
1. Teknik Analitik: Pengarang memaparkan langsung watak tokoh tanpa perantara.
   - Contoh: "Hendra adalah anak yang penyabar, hemat, dan tidak pernah mengeluh meskipun harus berjalan kaki sejauh tiga kilometer setiap pergi ke sekolah."
2. Teknik Dramatik: Pengarang menggambarkan watak tokoh melalui dialog, tindakan nyata, reaksi tokoh lain, atau jalan pikiran tokoh itu sendiri.
   - Contoh: "Ketika melihat uang lima puluh ribu rupiah terjatuh di koridor kelas, Farhan segera memungutnya dan bergegas menyerahkannya ke meja guru piket tanpa ragu sedikit pun." (Mencerminkan watak jujur dan amanah).',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                            [
                                'order' => 3,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => 'Bacalah kutipan cerpen berikut, lalu tentukan latar tempat, latar waktu, latar suasana, serta watak tokoh utamanya beserta bukti kalimat pendukungnya!

"Lonceng sekolah berdentang tiga kali menandakan pelajaran telah usai. Langit siang di atas atap sekolah tampak mendung gelap disusul deru petir. Dina tidak segera pulang, melainkan dengan teliti memeriksa seluruh jendela kelas dan mematikan kipas angin yang masih berputar agar hemat listrik."',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Rubrik Penilaian & Kunci Jawaban:
1. Latar Tempat: Di ruang kelas sekolah (Bukti: memeriksa jendela kelas dan kipas angin).
2. Latar Waktu: Siang hari saat pulang sekolah (Bukti: lonceng usai pelajaran berdentang, langit siang).
3. Latar Suasana: Mendung mencekam dan menegangkan (Bukti: mendung gelap disusul deru petir).
4. Watak Tokoh Dina: Bertanggung jawab, teliti, dan peduli lingkungan (Bukti: memeriksa jendela dan mematikan kipas angin agar hemat listrik).',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'title' => 'Kuis Bab 6 Bahasa Indonesia Kelas 6 (Paket 2 - Alur, Konflik & Sudut Pandang)',
                'type' => 'quiz',
                'description' => 'Asesmen formatif Bab 6 bagian 2: Menganalisis kurva alur cerita, klimaks konflik internal/eksternal, dan sudut pandang pengarang fiksi.',
                'duration_minutes' => 45,
                'sections' => [
                    [
                        'title' => 'Bagian 1: Objektif Beragam (Pilihan Ganda, Pilihan Ganda Kompleks, Menjodohkan, Benar-Salah)',
                        'instructions' => 'Pilihlah dan jawablah soal-soal objektif berikut secara cermat dan teliti.',
                        'order' => 1,
                        'question_groups' => [
                            ['title' => 'Stimulus 1: Dilema Kotak Rahasia di Sudut Loteng Sekolah', 'content' => '[Keterangan Gambar: Tiga anak berseragam SD menemukan sebuah kotak kayu antik berukir daun teratai yang terkunci rapat di sudut loteng perpustakaan tua sekolah mereka.]

Aku, Danu, dan Riko sedang membantu Ibu Guru merapikan arsip lama di loteng perpustakaan sekolah. Tanpa sengaja, ujung sepatuku menabrak sebuah kotak kayu jati tua yang tersembunyi di balik tumpukan koran usang. Kotak itu berukir indah, namun terkunci dengan gembok kuno berkarat.

"Buka saja gemboknya dengan obeng, pasti di dalamnya ada harta karun peninggalan zaman dulu!" desak Riko dengan mata berbinar penasaran. Konflik batin seketika berkecamuk di dalam hatiku. Sebagai ketua regu, aku tahu membuka barang yang bukan milik kita tanpa izin adalah perbuatan lancang dan tidak beretika. Akan tetapi, rasa penasaran yang amat besar seolah menarik tanganku untuk menuruti saran Riko.

"Tidak, Riko. Kita harus menyerahkan kotak ini kepada Bu Ratna terlebih dahulu," tegasku sambil menarik kotak itu menjauh. Ketegangan mereda ketika Bu Ratna tersenyum bangga atas kejujuran kami dan menceritakan bahwa kotak itu adalah kapsul waktu peninggalan angkatan pertama sekolah kami tiga puluh tahun yang lalu.'],
                            ['title' => 'Stimulus 2: Memahami Tahapan Alur dan Sudut Pandang Pengarang', 'content' => '[Keterangan Gambar: Diagram kurva dramatik Freytag: 1. Pengenalan cerita (orientasi), 2. Pemunculan masalah (konflik awal), 3. Puncak ketegangan (klimaks), 4. Penurunan ketegangan (antiklimaks), 5. Penyelesaian (resolusi/koda). Di sampingnya tabel sudut pandang orang pertama (aku/kami) dan orang ketiga (dia/ia/nama tokoh).]

Alur (*plot*) adalah rangkaian peristiwa yang dijalin oleh hubungan sebab-akibat. Alur maju bergerak runtut ke masa depan, alur mundur (kilas balik/*flashback*) menelusuri masa lalu, dan alur campuran memadukan keduanya. Sudut pandang (*point of view*) adalah posisi pengarang saat menuturkan cerita. Pada sudut pandang orang pertama, pengarang bertindak sebagai tokoh cerita (menggunakan kata ganti "aku/saya"). Pada sudut pandang orang ketiga, pengarang berada di luar cerita sebagai pengamat yang serbatahu (menggunakan kata ganti "dia/ia" atau nama tokoh).'],
                        ],
                        'questions' => [
                            [
                                'order' => 1,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Sudut pandang pengarang yang digunakan dalam kutipan cerita Stimulus 1 adalah sudut pandang ....',
                                'explanation' => 'Penggunaan kata ganti "Aku" yang terlibat langsung menandakan sudut pandang orang pertama tokoh utama.',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Orang pertama tokoh utama ("Aku")', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Orang ketiga serbatahu ("Dia/Ia")', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Orang kedua ("Kamu")', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Orang ketiga pengamat serba diam', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Konflik batin yang dialami tokoh "Aku" dalam cerita tersebut timbul karena ....',
                                'explanation' => 'Konflik batin timbul antara dorongan penasaran dengan prinsip kejujuran.',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Pertentangan antara rasa penasaran ingin membuka kotak dengan prinsip kejujuran', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Rasa takut dimarahi orang tua karena pulang terlambat', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Perebutan uang jajan antara Danu dan Riko', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Kekhawatiran akan hantu yang menakutkan di loteng', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Pilihlah DUA tahap alur cerita yang tampak jelas pada kutipan tersebut!',
                                'explanation' => 'Tahap pemunculan konflik batin dan penyelesaian (resolusi) penyerahan kotak.',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Pemunculan konflik (Riko mendesak membuka kotak dan tokoh Aku bimbang)', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Penyelesaian konflik (Tokoh Aku memutuskan menyerahkan kotak kepada Bu Ratna)', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Perang saudara berdarah antar-kerajaan', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Bencana alam banjir bandang melanda sekolah', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => 'Jodohkan tahapan alur cerpen dengan peristiwanya!',
                                'explanation' => 'Pasangan tahapan alur cerita cerpen.',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'Pengenalan (Orientasi)', 'is_correct' => false, 'match_key' => 'Tokoh Aku, Danu, dan Riko merapikan loteng perpustakaan', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Muncul Masalah (Komplikasi)', 'is_correct' => false, 'match_key' => 'Riko mendesak membuka gembok kotak antik tanpa izin', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Puncak Masalah (Klimaks)', 'is_correct' => false, 'match_key' => 'Pertentangan batin hebat tokoh Aku mengambil keputusan', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Penyelesaian (Resolusi)', 'is_correct' => false, 'match_key' => 'Kotak diserahkan ke guru dan terungkap sebagai kapsul waktu', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Tahapan alur saat ketegangan masalah mencapai titik paling kritis dan menegangkan disebut ....',
                                'explanation' => 'Klimaks adalah puncak ketegangan masalah.',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Klimaks (puncak konflik)', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Orientasi', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Antiklimaks', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Penyelesaian', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Alur yang menceritakan peristiwa masa lalu tokoh (kilas balik) dinamakan alur ....',
                                'explanation' => 'Alur mundur menelusuri masa lalu.',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Mundur (flashback)', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Maju (progresif)', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Campuran', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Melompat', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan status kebenaran mengenai alur dan sudut pandang!',
                                'explanation' => 'Konflik adalah nyawa penggerak alur cerita karya sastra.',
                                'group_index' => 1,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Sudut pandang orang pertama ditandai penggunaan kata ganti "aku" atau "saya".', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Pada sudut pandang orang ketiga serbatahu, pengarang mengetahui seluruh pikiran tokoh.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Sebuah cerita tidak memerlukan konflik sama sekali agar menarik dibaca.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 3],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Tahapan alur saat ketegangan mulai mereda menuju penyelesaian dinamakan ....',
                                'explanation' => 'Meredanya ketegangan adalah antiklimaks.',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Antiklimaks', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Klimaks', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Komplikasi awal', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Orientasi', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Kutipan: "Rian memandang jendela kamar dengan hampa. Ia teringat kembali pesan almarhum kakeknya lima tahun lalu saat mengajarinya menunggang kuda..." menggunakan alur ....',
                                'explanation' => 'Teringat masa lalu 5 tahun lalu mencerminkan alur mundur.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Mundur (flashback)', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Maju murni', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Melingkar', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Statis', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Sudut pandang kutipan: "Karin mengayuh sepedanya dengan sekuat tenaga. Dalam hatinya ia berjanji tidak akan terlambat lagi..." adalah ....',
                                'explanation' => 'Orang ketiga (Karin/ia) dengan mengetahui isi hatinya.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Orang ketiga serbatahu', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Orang pertama tokoh utama', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Orang pertama tokoh sampingan', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Orang kedua', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 11,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Konflik antartokoh dalam cerita (misalnya perdebatan sengit antara dua sahabat) disebut jenis konflik ....',
                                'explanation' => 'Pertentangan antartokoh adalah konflik sosial eksternal.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Konflik sosial (eksternal)', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Konflik batin (internal)', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Konflik alamiah', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Konflik semu', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 12,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Konflik yang terjadi di dalam hati atau pikiran tokoh sendiri dinamakan konflik ....',
                                'explanation' => 'Pertentangan dalam diri sendiri adalah konflik batin.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Batin (internal)', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Sosial', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Fisik', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Geografis', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 13,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Tahap pengenalan tokoh, watak, dan latar di awal cerita dinamakan tahap ....',
                                'explanation' => 'Orientasi mengawali pengenalan cerita.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Orientasi', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Klimaks', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Resolusi', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Koda', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 14,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Tahap akhir cerita saat semua masalah berhasil diselesaikan dengan baik dinamakan tahap ....',
                                'explanation' => 'Resolusi adalah tahap penyelesaian masalah.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Resolusi (penyelesaian)', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Komplikasi', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Klimaks', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Orientasi', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 15,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Pilihlah DUA jenis alur cerita berdasarkan urutan waktu penuturannya!',
                                'explanation' => 'Alur maju dan alur mundur adalah jenis alur waktu.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Alur maju (progresif)', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Alur mundur (kilas balik)', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Alur datar tanpa peristiwa', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Alur zigzag tanpa tokoh', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 16,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Pilihlah DUA ciri sudut pandang orang pertama dalam karya fiksi!',
                                'explanation' => 'Sudut pandang orang pertama memakai "aku/saya" dan terlibat dalam cerita.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Pengarang menggunakan kata ganti "aku" atau "kami"', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Pengarang terlibat langsung sebagai tokoh pelaku dalam cerita', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Pengarang hanya menggunakan nama tokoh orang ketiga', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Pengarang tidak mengetahui perasaan tokoh utama', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 17,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => 'Jodohkan jenis konflik dengan contoh peristiwanya!',
                                'explanation' => 'Pasangan jenis konflik fiksi.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'Konflik Batin', 'is_correct' => false, 'match_key' => 'Bimbang antara harus berbohong demi menyelamatkan teman atau berkata jujur', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Konflik Sosial', 'is_correct' => false, 'match_key' => 'Perdebatan sengit antara dua siswa mengenai pembagian tugas kelompok', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Konflik Fisik', 'is_correct' => false, 'match_key' => 'Perkelahian antara prajurit dengan perompak di laut lepas', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Konflik Alam', 'is_correct' => false, 'match_key' => 'Warga desa berjuang menyelamatkan diri dari hantaman badai topan', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 18,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => 'Jodohkan sudut pandang pengarang dengan kata ganti dominannya!',
                                'explanation' => 'Pasangan sudut pandang dan cirinya.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'Orang Pertama Tokoh Utama', 'is_correct' => false, 'match_key' => 'Aku / Saya (sebagai pusat penceritaan)', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Orang Pertama Tokoh Sampingan', 'is_correct' => false, 'match_key' => 'Aku (menceritakan riwayat sahabatku Doni)', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Orang Ketiga Serbatahu', 'is_correct' => false, 'match_key' => 'Ia / Dia / Nama tokoh (pengarang tahu isi hati semua tokoh)', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Orang Ketiga Pengamat', 'is_correct' => false, 'match_key' => 'Dia / Mereka (pengarang hanya mencatat apa yang tampak dari luar)', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 19,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan status kebenaran tahapan alur fiksi!',
                                'explanation' => 'Orientasi berada di awal cerita, bukan di akhir.',
                                'group_index' => null,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Klimaks merupakan puncak pertikaian dalam cerita.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Tahap orientasi selalu diletakkan di akhir cerita setelah klimaks.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Resolusi berisi jalan keluar dari masalah yang dihadapi tokoh.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 3],
                                ],
                            ],
                            [
                                'order' => 20,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan status kebenaran jenis alur!',
                                'explanation' => 'Alur dibangun oleh hubungan kausalitas sebab-akibat antarperistiwa.',
                                'group_index' => null,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Alur maju menceritakan peristiwa dari awal hingga akhir secara kronologis.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Cerita yang diawali dengan peristiwa sekarang lalu mengingat masa lalu disebut alur campuran.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Alur cerita tidak ada hubungannya dengan sebab-akibat peristiwa.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 3],
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
                                'prompt' => 'Rangkaian peristiwa yang terjalin oleh hubungan sebab-akibat dalam cerpen disebut ....',
                                'explanation' => 'Alur / plot.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'alur', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Puncak ketegangan dalam sebuah cerita pendek dinamakan ....',
                                'explanation' => 'Klimaks.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'klimaks', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Tahap penyelesaian masalah pada bagian akhir cerita dinamakan ....',
                                'explanation' => 'Resolusi.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'resolusi', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Sudut pandang yang menggunakan kata ganti "aku" atau "saya" adalah sudut pandang orang ....',
                                'explanation' => 'Sudut pandang orang pertama.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'pertama', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Pertentangan yang terjadi di dalam hati atau pikiran seorang tokoh disebut konflik ....',
                                'explanation' => 'Konflik batin (internal).',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'batin', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Alur yang menelusuri kembali peristiwa masa lalu dinamakan alur ....',
                                'explanation' => 'Alur mundur / flashback.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'mundur', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Bagian pengenalan tokoh dan latar pada permulaan alur disebut tahap ....',
                                'explanation' => 'Tahap orientasi.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'orientasi', 'is_correct' => true, 'match_key' => null, 'order' => 1],
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
                                'prompt' => 'Gambarkan dan jelaskan secara terperinci lima tahapan alur cerita (orientasi, komplikasi, klimaks, antiklimaks, resolusi) dalam sebuah cerpen bertema perpisahan sekolah!',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Rubrik Penilaian & Kunci Jawaban:
1. Orientasi: Pengenalan suasana kelas 6 menjelang hari kelulusan, pengenalan tokoh Edo dan sahabatnya Ardi di bangku kelas.
2. Komplikasi (Muncul Masalah): Muncul perselisihan paham antara Edo dan Ardi mengenai tujuan sekolah lanjutan yang berbeda dan rasa takut kehilangan sahabat karib.
3. Klimaks (Puncak Ketegangan): Terjadi adu argumen emosional pada malam gladi bersih perpisahan yang membuat keduanya saling mendiamkan dan terancam tidak tampil bersama.
4. Antiklimaks (Peredaan Masalah): Wali kelas memanggil keduanya dan menasihati dengan bijak bahwa jarak sekolah baru tidak akan pernah memutus tali persahabatan sejati.
5. Resolusi (Penyelesaian): Edo dan Ardi saling berpelukan memaafkan di panggung perpisahan dan berjanji saling mendukung cita-cita masing-masing.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                            [
                                'order' => 2,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => 'Jelaskan perbedaan antara sudut pandang orang pertama tokoh utama ("Aku") dengan sudut pandang orang ketiga serbatahu ("Dia/Nama Tokoh")! Uraikan kelebihan masing-masing sudut pandang tersebut bagi kenyamanan pembaca!',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Rubrik Penilaian & Kunci Jawaban:
1. Sudut Pandang Orang Pertama Tokoh Utama:
   - Ciri: Menggunakan kata ganti "aku/saya", pengarang bertindak sebagai tokoh sentral.
   - Kelebihan: Cerita terasa sangat dekat, intim, nyata, dan pembaca mudah bersimpati dengan gejolak emosi tokoh secara mendalam.
2. Sudut Pandang Orang Ketiga Serbatahu:
   - Ciri: Menggunakan kata ganti "dia/ia" atau nama tokoh, pengarang berada di luar cerita.
   - Kelebihan: Jangkauan penceritaan sangat luas dan bebas; pengarang dapat berpindah tempat sewaktu-waktu dan menyingkap isi hati serta rahasia banyak tokoh sekaligus.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                            [
                                'order' => 3,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => 'Ubahlah kutipan cerpen berikut yang bersudut pandang orang pertama ("Aku") menjadi sudut pandang orang ketiga serbatahu ("Dia/Nama Tokoh Faris")!

"Aku melangkah ragu menaiki anak tangga panggung. Jantungku berdegup kencang melihat ratusan pasang mata orang tua murid menatapku. Namun, aku segera menarik napas dalam-dalam dan meyakinkan diriku bahwa aku pasti mampu membawakan pidato perpisahan ini dengan lancar."',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Rubrik Penilaian & Kunci Jawaban:
Hasil Pengubahan ke Sudut Pandang Orang Ketiga:
"Faris melangkah ragu menaiki anak tangga panggung. Jantungnya berdegup kencang melihat ratusan pasang mata orang tua murid menatapnya. Namun, ia segera menarik napas dalam-dalam dan meyakinkan dirinya bahwa ia pasti mampu membawakan pidato perpisahan itu dengan lancar."
(Penggantian kata: Aku -> Faris/ia, -ku -> -nya, ini -> itu).',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'title' => 'Kuis Bab 6 Bahasa Indonesia Kelas 6 (Paket 3 - Amanat, Nilai Sastra & Resensi Buku)',
                'type' => 'quiz',
                'description' => 'Asesmen formatif Bab 6 bagian 3: Menemukan amanat tersirat, menganalisis nilai moral/sosial sastra, dan menyusun teks ulasan buku sastra anak.',
                'duration_minutes' => 45,
                'sections' => [
                    [
                        'title' => 'Bagian 1: Objektif Beragam (Pilihan Ganda, Pilihan Ganda Kompleks, Menjodohkan, Benar-Salah)',
                        'instructions' => 'Pilihlah dan jawablah soal-soal objektif berikut secara cermat dan teliti.',
                        'order' => 1,
                        'question_groups' => [
                            ['title' => 'Stimulus 1: Hadiah Lukisan Terindah untuk Pak Guru Tua', 'content' => '[Keterangan Gambar: Seorang siswa berlutut menyerahkan lukisan pemandangan sawah berbingkai kayu jati kepada guru tua berambut putih yang meneteskan air mata haru di ruang guru sekolah.]

Pak Danu telah mengabdi sebagai guru sekolah dasar selama tiga puluh lima tahun dan tahun ini adalah tahun terakhirnya mengajar sebelum memasuki masa purnatugas. Selama berbulan-bulan, Gilang diam-diam menyisihkan uang sakunya dan melukis potret sekolah tua tempat Pak Danu mencurahkan ilmunya dengan penuh keikhlasan.

Pada hari terakhir semester genap, Gilang menyerahkan lukisan tersebut dengan kedua tangannya yang gemetar. Pak Danu menyentuh kanvas lukisan itu dengan mata berkaca-kaca. "Pak Guru tidak pernah meminta balasan atas ilmu yang kuberikan, Gilang. Namun, melihatmu tumbuh menjadi anak yang santun, berbudi pekerti luhur, dan menghargai jerih payah guru adalah mahkota termegah bagi masa pensiun Bapak," bisik Pak Danu dengan suara bergetar. Seluruh ruangan kelas seketika larut dalam keharuan yang mendalam. Mereka menyadari bahwa ketulusan guru adalah cahaya yang tak pernah padam di sanubari murid-muridnya.'],
                            ['title' => 'Stimulus 2: Menulis Resensi dan Ulasan Buku Sastra Anak', 'content' => '[Keterangan Gambar: Format ulasan buku sastra (resensi): 1. Identitas Buku (judul, penulis, penerbit, tebal halaman, tahun terbit), 2. Sinopsis / Ringkasan Cerita, 3. Keunggulan Buku (kelebihan gaya bahasa, pesan moral mendalam, ilustrasi menarik), 4. Kelemahan Buku (kekurangan kecil ejaan atau alur lambat), 5. Rekomendasi pembaca.]

Teks ulasan buku (resensi) adalah tulisan kritis yang mengkaji kualitas sebuah karya sastra secara objektif. Melalui ulasan buku, pembaca mendapatkan gambaran menyeluruh mengenai kekuatan cerita, nilai-nilai moral yang terkandung, serta kelayakan buku tersebut dibaca oleh anak-anak seusianya. Sikap kritis dalam mengulas buku melatih siswa bernalar logis, mengapresiasi keindahan bahasa, serta menumbuhkan kecintaan pada dunia literasi.'],
                        ],
                        'questions' => [
                            [
                                'order' => 1,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Berdasarkan wacana Stimulus 1, amanat utama yang tersirat dalam cerita adalah ....',
                                'explanation' => 'Amanat: Menghormati dan menghargai ketulusan jasa guru.',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Kita wajib menghormati dan menghargai jasa para guru yang telah mendidik dengan penuh ketulusan', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Hadiah barang mewah dan mahal adalah syarat utama kelulusan sekolah', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Seorang guru hanya bahagia jika diberikan uang tunai dalam jumlah besar', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Menuntut ilmu hanya diperlukan saat menjelang masa pensiun guru', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Nilai kehidupan yang paling menonjol pada tokoh Gilang adalah ....',
                                'explanation' => 'Nilai moral rasa terima kasih dan bakti kepada pendidik.',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Nilai moral rasa terima kasih dan bakti santun kepada guru', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Nilai materialistis mencari keuntungan dagang lukisan', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Nilai kesombongan memamerkan bakat di depan umum', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Nilai ketakutan akan ancaman hukuman nilai', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Pilihlah DUA sikap terpuji yang ditunjukkan oleh tokoh Pak Danu dalam cerita!',
                                'explanation' => 'Pak Danu mengabdi ikhlas dan bangga muridnya berakhlak mulia.',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Ikhlas mengabdi selama puluhan tahun tanpa mengharap pamrih materi', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Sangat bangga dan bahagia melihat muridnya berakhlak mulia dan santun', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Memaksa siswa membelikan barang mahal sebagai kenang-kenangan', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Membeda-bedakan perhatian kepada siswa berdasarkan kekayaan', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => 'Jodohkan nilai kehidupan di kolom kiri dengan perwujudannya di kolom kanan!',
                                'explanation' => 'Pasangan nilai kehidupan dalam karya sastra.',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'Nilai Moral', 'is_correct' => false, 'match_key' => 'Budi pekerti santun dan menghormati orang yang lebih tua', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Nilai Sosial', 'is_correct' => false, 'match_key' => 'Kepedulian dan kebersamaan di lingkungan sekolah', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Nilai Pendidikan (Edukatif)', 'is_correct' => false, 'match_key' => 'Menuntut ilmu dengan tekun selama masa sekolah dasar', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Nilai Estetika', 'is_correct' => false, 'match_key' => 'Keindahan karya seni lukisan cat air di atas kanvas', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Bagian dalam teks ulasan buku yang memuat judul, nama pengarang, penerbit, dan tebal halaman disebut ....',
                                'explanation' => 'Identitas buku mencakup data bibliografi.',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Identitas buku', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Sinopsis cerita', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Kelemahan buku', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Rekomendasi', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Bagian teks ulasan yang memaparkan kelebihan atau daya tarik karya sastra disebut bagian ....',
                                'explanation' => 'Keunggulan buku memaparkan kekuatan karya.',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Keunggulan buku', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Kelemahan buku', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Sinopsis', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Identitas buku', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan status kebenaran teks ulasan buku!',
                                'explanation' => 'Ulasan buku ditulis oleh pembaca atau kritikus sastra, bukan oleh penulisnya sendiri.',
                                'group_index' => 1,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Ulasan buku harus ditulis secara objektif dan seimbang (memuat kelebihan dan kekurangan).', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Sinopsis buku memuat ringkasan jalan cerita tanpa membocorkan seluruh akhir cerita secara membosankan.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Teks ulasan buku hanya boleh ditulis oleh pengarang buku itu sendiri.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 3],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Bagian penutup teks ulasan yang berisi saran kelayakan pembaca untuk membaca buku tersebut disebut ....',
                                'explanation' => 'Rekomendasi berisi saran kelayakan pembaca.',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Rekomendasi / simpulan', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Sinopsis', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Identitas buku', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Komplikasi', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Pesan moral dalam karya sastra yang disampaikan secara tersirat berarti pesan tersebut ....',
                                'explanation' => 'Tersirat berarti tersembunyi dalam jalinan kisah.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Tersembunyi di dalam jalinan peristiwa dan harus disimpulkan sendiri oleh pembaca', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Tertulis secara langsung dan terang-terangan di halaman pertama', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Tidak ada sama sekali di dalam seluruh isi cerita', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Hanya diketahui oleh penerbit buku', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Nilai moral yang berkaitan dengan ketaatan beribadah dan rasa syukur kepada Tuhan Yang Maha Esa disebut nilai ....',
                                'explanation' => 'Nilai religius berkaitan dengan Ketuhanan.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Religius (keagamaan)', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Sosial', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Budaya', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Estetika', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 11,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Nilai kehidupan yang berkaitan dengan adat istiadat dan kebiasaan luhur masyarakat di suatu daerah disebut nilai ....',
                                'explanation' => 'Nilai budaya berkaitan dengan tradisi masyarakat.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Budaya', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Moral', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Religius', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Politik', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 12,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Bagian ulasan buku yang berisi ringkasan jalan cerita dinamakan ....',
                                'explanation' => 'Sinopsis adalah ringkasan alur cerita.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Sinopsis', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Identitas buku', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Kelemahan', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Amanat', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 13,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Kalimat yang menunjukkan keunggulan buku dalam teks resensi adalah ....',
                                'explanation' => 'Kalimat pertama memuji kelebihan bahasa dan nilai moral buku.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Bahasa yang digunakan sangat mengalir, santun, dan sarat dengan nilai-nilai persahabatan yang menyentuh hati.', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Huruf cetak pada buku ini berukuran terlalu kecil sehingga membuat mata cepat lelah.', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Halaman belakang buku ini robek dan dijilid kurang rapi.', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Harga buku ini terlalu mahal bagi kantong anak sekolah.', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 14,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Kalimat yang menunjukkan kekurangan atau kelemahan buku adalah ....',
                                'explanation' => 'Kesalahan cetak adalah kelemahan buku.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Sayangnya, terdapat beberapa kesalahan ejaan cetak pada nama-nama tokoh di bab akhir.', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Ilustrasi gambar sampul sangat memikat dan penuh warna cerah.', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Pesan moralnya sangat relevan untuk siswa kelas enam SD.', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Alur cerita tersusun sangat rapi dan logis.', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 15,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Pilihlah DUA nilai moral yang sering ditemukan dalam buku sastra perpisahan sekolah!',
                                'explanation' => 'Setia kawan dan bakti kepada guru adalah nilai moral terpuji.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Menjaga silaturahmi dan rasa setia kawan antarsahabat', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Rasa hormat dan bakti santun kepada para guru', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Sifat iri hati terhadap prestasi teman sebangku', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Menghalalkan segala cara demi menjadi juara kelas', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 16,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Pilihlah DUA komponen yang wajib ada dalam identitas buku resensi!',
                                'explanation' => 'Judul, penulis, penerbit, dan tahun terbit adalah identitas buku.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Judul buku dan nama penulis', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Nama penerbit dan tahun terbit', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Daftar makanan kesukaan pengarang', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Nomor rekening bank penulis', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 17,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => 'Jodohkan jenis nilai dalam karya sastra dengan definisinya!',
                                'explanation' => 'Pasangan jenis nilai kehidupan fiksi.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'Nilai Religius', 'is_correct' => false, 'match_key' => 'Nilai yang berkaitan dengan ketakwaan dan ibadah kepada Tuhan', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Nilai Moral', 'is_correct' => false, 'match_key' => 'Nilai yang berkaitan dengan akhlak, etika, dan budi pekerti luhur', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Nilai Sosial', 'is_correct' => false, 'match_key' => 'Nilai yang berkaitan dengan kepedulian terhadap sesama manusia', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Nilai Budaya', 'is_correct' => false, 'match_key' => 'Nilai yang berkaitan dengan tradisi dan kearifan lokal daerah', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 18,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => 'Jodohkan struktur teks resensi buku dengan isinya!',
                                'explanation' => 'Pasangan struktur teks ulasan buku sastra.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'Identitas Buku', 'is_correct' => false, 'match_key' => 'Judul: Sahabat Sejati, Penulis: Andrea, Penerbit: Cendekia', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Sinopsis', 'is_correct' => false, 'match_key' => 'Cerita mengisahkan tiga anak yang berjuang merakit kincir angin', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Keunggulan', 'is_correct' => false, 'match_key' => 'Ilustrasi gambar berwarna indah dan alur cerita sangat menyentuh', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Kelemahan', 'is_correct' => false, 'match_key' => 'Terdapat beberapa kata asing yang tidak disertai catatan kaki', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 19,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan status kebenaran nilai sastra!',
                                'explanation' => 'Sastra berperan sangat besar dalam pembentukan budi pekerti anak.',
                                'group_index' => null,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Karya sastra yang baik selalu membawa pesan moral dan pencerahan batin bagi pembaca.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Nilai sosial tercermin dalam tindakan tokoh yang saling tolong-menolong.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Membaca karya sastra tidak memiliki manfaat apapun bagi pembentukan karakter anak.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 3],
                                ],
                            ],
                            [
                                'order' => 20,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan status kebenaran penulisan resensi!',
                                'explanation' => 'Identitas buku adalah komponen wajib pada resensi.',
                                'group_index' => null,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Resensi yang baik harus berimbang dalam membedah kelebihan dan kelemahan buku.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Pembaca resensi dapat menilai apakah sebuah buku layak dibeli atau dibaca.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Resensi buku tidak boleh menyertakan identitas buku sama sekali.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 3],
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
                                'prompt' => 'Pesan moral yang ingin disampaikan pengarang melalui karyanya disebut ....',
                                'explanation' => 'Amanat cerita.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'amanat', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Nilai yang berkaitan dengan tingkah laku, budi pekerti, dan akhlak baik dinamakan nilai ....',
                                'explanation' => 'Nilai moral.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'moral', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Nilai yang berkaitan dengan hubungan interaksi antarsesama manusia dalam masyarakat disebut nilai ....',
                                'explanation' => 'Nilai sosial.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'sosial', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Tulisan yang mengulas kelebihan, kekurangan, dan kualitas sebuah buku dinamakan ....',
                                'explanation' => 'Resensi / ulasan buku.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'resensi', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Ringkasan singkat isi jalan cerita sebuah buku dinamakan ....',
                                'explanation' => 'Sinopsis buku.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'sinopsis', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Amanat yang disampaikan secara tersembunyi di balik peristiwa dinamakan amanat ....',
                                'explanation' => 'Amanat tersirat.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'tersirat', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Amanat yang disampaikan secara terus terang dan tertulis jelas dinamakan amanat ....',
                                'explanation' => 'Amanat tersurat.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'tersurat', 'is_correct' => true, 'match_key' => null, 'order' => 1],
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
                                'prompt' => 'Jelaskan perbedaan antara amanat tersurat dan amanat tersirat dalam sebuah karya fiksi, serta bagaimana cara pembaca menemukan amanat tersirat dari sebuah cerpen perpisahan sekolah!',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Rubrik Penilaian & Kunci Jawaban:
1. Perbedaan:
   - Amanat Tersurat: Pesan moral yang disampaikan secara langsung, terbuka, dan jelas tertulis di dalam teks kalimat cerita oleh pengarang.
   - Amanat Tersirat: Pesan moral yang tersembunyi di balik jalinan peristiwa, karakter tokoh, dan penyelesaian konflik, sehingga menuntut pembaca menyimpulkannya sendiri.
2. Cara Menemukan Amanat Tersirat:
   - Mengamati nasib akhir tokoh protagonis (perbuatan baik apa yang membuahkan hasil bahagia).
   - Mengamati akibat buruk yang menimpa tokoh berwatak jahat atau ceroboh.
   - Menghubungkan konflik cerita dengan norma dan nilai kehidupan di dunia nyata untuk menarik benang merah nasihat moralnya.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                            [
                                'order' => 2,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => 'Sebutkan lima bagian pokok yang wajib ada dalam sebuah teks ulasan buku sastra (resensi) anak, dan jelaskan apa saja yang diuraikan pada masing-masing bagian tersebut!',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Rubrik Penilaian & Kunci Jawaban:
1. Identitas Buku: Memuat judul, nama penulis, penerbit, tahun terbit, ketebalan halaman, dan nomor ISBN.
2. Sinopsis Cerita: Ringkasan padat alur cerita tanpa membocorkan rahasia akhir cerita secara tuntas.
3. Keunggulan Buku: Mengulas kelebihan karya dari segi keindahan bahasa, kekuatan karakter tokoh, pesan moral, dan estetika ilustrasi gambar.
4. Kelemahan Buku: Menguraikan kekurangan kecil (misalnya ukuran huruf, istilah yang sulit dipahami, atau jilidan kertas).
5. Rekomendasi/Simpulan: Memberikan pertimbangan akhir mengenai kelayakan buku dibaca oleh target pembaca (anak-anak SD).',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                            [
                                'order' => 3,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => 'Tulislah sebuah draf ulasan singkat (resensi) tentang sebuah buku kumpulan cerpen anak berjudul "Gemerlap Bintang di Ujung Senja" (karya Ratih Kumala, Penerbit Tunas Aksara) yang memuat identitas ringkas, satu kalimat sinopsis, satu kalimat keunggulan, dan satu kalimat rekomendasi pembaca!',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Rubrik Penilaian & Kunci Jawaban:
Contoh Draf Resensi Singkat:
"Judul Buku: Gemerlap Bintang di Ujung Senja | Penulis: Ratih Kumala | Penerbit: Tunas Aksara, 2026 (Identitas).
Buku ini menghimpun sepuluh kisah inspiratif tentang persahabatan tulus anak-anak sekolah dasar yang saling menguatkan menjelang kelulusan dan perpindahan sekolah (Sinopsis).
Keunggulan buku ini terletak pada gaya bahasanya yang sangat puitis, hangat, dan sarat akan pesan moral budi pekerti luhur yang menyentuh emosi pembaca (Keunggulan).
Buku kumpulan cerpen ini sangat direkomendasikan untuk dibaca oleh seluruh siswa kelas enam sekolah dasar sebagai bekal berharga menumbuhkan rasa empati dan persahabatan abadi (Rekomendasi)."',
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
