<?php

namespace Database\Seeders\Data;

class BahasaIndonesiaGrade6Bab1Data
{
    /**
     * Data bundle asesmen Kelas 6 SD Kurikulum Merdeka Fase C.
     */
    public static function getAssessments(): array
    {
        return [
            [
                'title' => 'Kuis Bab 1 Bahasa Indonesia Kelas 6 (Paket 1 - Surat Resmi & Formulir Pendaftaran)',
                'type' => 'quiz',
                'description' => 'Asesmen formatif Bab 1 bagian 1: Memahami perbedaan surat resmi dan pribadi, struktur surat dinas, serta pengisian formulir pendaftaran akurat.',
                'duration_minutes' => 45,
                'sections' => [
                    [
                        'title' => 'Bagian 1: Objektif Beragam (Pilihan Ganda, Pilihan Ganda Kompleks, Menjodohkan, Benar-Salah)',
                        'instructions' => 'Pilihlah dan jawablah soal-soal objektif berikut secara cermat dan teliti.',
                        'order' => 1,
                        'question_groups' => [
                            ['title' => 'Stimulus 1: Surat Undangan Festival Budaya Pelajar Nusantara', 'content' => '[Keterangan Gambar: Lembar surat resmi berkop surat dinas resmi "SD CERDAS MANDIRI", dilengkapi nomor surat, tanggal surat, lampiran, perihal "Undangan Mengikuti Festival Budaya Nusantara", dan stempel dinas berwarna biru di atas tanda tangan kepala sekolah.]

Nomor : 045/SD-CM/IX/2026
Lampiran : 1 (satu) Berkas
Hal : Undangan Festival Budaya Pelajar

Yth. Bapak/Ibu Kepala SD Cendekia Bangsa
di Tempat

Dengan hormat,
Dalam rangka memperingati Hari Sumpah Pemuda serta menumbuhkan rasa cinta tanah air bagi generasi muda, kami bermaksud menyelenggarakan Festival Seni dan Budaya Nusantara antar-SD se-Kabupaten. Kegiatan ini akan menampilkan pameran baju adat daerah, tari tradisional, serta lomba mendongeng cerita rakyat nusantara.

Sehubungan dengan hal tersebut, kami mengundang perwakilan siswa dari sekolah yang Bapak/Ibu pimpin untuk berpartisipasi aktif pada kegiatan yang akan dilaksanakan pada:
hari, tanggal : Sabtu, 24 Oktober 2026
waktu : pukul 08.00 - 15.00 WIB
tempat : Gedung Kesenian Daerah

Demikian surat undangan ini kami sampaikan. Atas perhatian dan kerja sama Bapak/Ibu, kami ucapkan terima kasih.

Hormat kami,
Kepala Sekolah SD Cerdas Mandiri,
Dr. Hendra Wijaya, M.Pd.'],
                            ['title' => 'Stimulus 2: Pengisian Formulir Pendaftaran Anggota Pramuka Garuda', 'content' => '[Keterangan Gambar: Format formulir pendaftaran anggota Pramuka Garuda Penggalang, terdiri dari kolom data identitas pribadi: Nama Lengkap, Nomor Induk Siswa Nasional (NISN), Tempat/Tanggal Lahir, Alamat Rumah, Golongan Darah, Nama Pangkalan Gugus Depan, Minat/Bakat, serta tanda tangan pemohon.]

Formulir pendaftaran adalah lembar isian yang digunakan untuk menghimpun data identitas seseorang secara terstruktur dan akurat. Saat mengisi formulir pendaftaran kegiatan, calon peserta wajib menuliskan data yang sebenarnya (valid). Penulisan nama diri hendaknya menggunakan huruf kapital di awal kata atau seluruhnya dengan huruf cetak besar agar mudah dibaca oleh panitia seleksi. Kesalahan penulisan data dapat berakibat pada ketidaksesuaian pencetakan sertifikat atau kegagalan verifikasi administrasi.'],
                        ],
                        'questions' => [
                            [
                                'order' => 1,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Berdasarkan wacana Stimulus 1, tujuan utama diselenggarakannya Festival Seni dan Budaya Nusantara adalah ....',
                                'explanation' => 'Dalam surat tertulis: "Dalam rangka memperingati Hari Sumpah Pemuda serta menumbuhkan rasa cinta tanah air bagi generasi muda..."',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Memperingati Hari Sumpah Pemuda dan menumbuhkan cinta tanah air', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Menjual cinderamata tradisional dan baju adat daerah', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Mengisi waktu liburan semester ganjil para siswa', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Mencari dana bantuan renovasi gedung kesenian', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Ciri kebahasaan yang menandakan bahwa surat pada Stimulus 1 tergolong surat dinas resmi adalah ....',
                                'explanation' => 'Surat dinas resmi bercirikan kop surat, nomor surat, perihal, bahasa formal/baku, serta stempel resmi.',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Menggunakan kop surat, nomor surat, bahasa baku, dan stempel resmi instansi', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Menggunakan bahasa santai sehari-hari dan penuh emotikon', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Tidak memiliki tujuan penerima surat yang jelas', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Ditulis dengan tulisan tangan tanpa tanda tangan kepala sekolah', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Pilihlah DUA kegiatan yang akan dilombakan atau ditampilkan dalam festival tersebut!',
                                'explanation' => 'Kegiatan meliputi pameran baju adat daerah, tari tradisional, dan lomba mendongeng cerita rakyat nusantara.',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Tari tradisional nusantara', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Lomba mendongeng cerita rakyat nusantara', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Lomba balap sepeda motor mini', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Pentas band musik rok barat', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan status kebenaran (Benar/Salah) untuk setiap pernyataan berikut!',
                                'explanation' => 'Kegiatan dilaksanakan pada hari Sabtu di Gedung Kesenian Daerah. Surat resmi wajib menyertakan tanggal dan tanda tangan.',
                                'group_index' => 0,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Surat undangan tersebut ditujukan kepada Kepala SD Cendekia Bangsa.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Kegiatan festival diselenggarakan pada hari Minggu di aula sekolah.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Kalimat pembuka surat menggunakan salam resmi "Dengan hormat,".', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Surat resmi tidak memerlukan tanggal surat dan tanda tangan pengirim.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Fungsi utama dari formulir pendaftaran dalam suatu kegiatan organisasi adalah ....',
                                'explanation' => 'Formulir berfungsi menghimpun data identitas diri secara teratur dan akurat.',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Menghimpun data identitas calon peserta secara terstruktur dan akurat', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Menjadi sarana mengirimkan pesan rahasia kepada panitia', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Menggantikan peran kuitansi pembayaran iuran', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Menjadi surat izin resmi dari orang tua siswa', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Alasan penulisan data formulir disarankan menggunakan huruf kapital atau huruf cetak yang jelas adalah ....',
                                'explanation' => 'Huruf cetak/kapital memudahkan pembacaan dan mencegah kekeliruan administrasi.',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Agar data mudah dibaca dan menghindari kesalahan pencatatan oleh panitia', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Agar formulir terlihat penuh dengan tinta hitam', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Agar panitia tidak perlu memeriksa kelengkapan berkas', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Untuk menyamarkan identitas asli pengisi formulir', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => 'Jodohkan komponen formulir di kolom kiri dengan fungsinya di kolom kanan!',
                                'explanation' => 'Pasangan komponen data formulir dan kegunaannya.',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'Nama Lengkap', 'is_correct' => false, 'match_key' => 'Mengetahui identitas resmi pendaftar sesuai akta', 'order' => 1],
                                    ['label' => null, 'option_text' => 'NISN', 'is_correct' => false, 'match_key' => 'Nomor identitas unik siswa berskala nasional', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Alamat Rumah', 'is_correct' => false, 'match_key' => 'Mengetahui domisili tempat tinggal peserta', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Tanda Tangan', 'is_correct' => false, 'match_key' => 'Bukti pertanggungjawaban kebenaran data', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan status kebenaran pengisian data formulir!',
                                'explanation' => 'Data harus valid dan ditandatangani.',
                                'group_index' => 1,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Data nama lengkap wajib ditulis sesuai akta kelahiran.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Nomor telepon boleh diisi nomor sembarang asal terisi.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Formulir yang telah diisi ditandatangani oleh pemohon.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 3],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Unsur surat yang membedakan surat resmi dengan surat pribadi adalah keberadaan ....',
                                'explanation' => 'Kop surat dan nomor surat hanya ada pada surat resmi dinas.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Kepala (kop) surat dan nomor surat', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Nama pengirim dan salam penutup', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Isi pesan dan harapan pengirim', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Tempat dan tanggal penulisan', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Penulisan tempat dan tanggal surat dinas yang tepat menurut kaidah PUEBI adalah ....',
                                'explanation' => 'Tempat diikuti tanda koma, spasi, tanggal, bulan huruf, dan tahun tanpa titik di akhir.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Bandung, 20 Oktober 2026', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Bandung; 20-10-2026', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Bandung. 20 Oktober 2026.', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Bandung, 20-Oktober-2026', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 11,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Kalimat penutup surat resmi yang santun dan efektif adalah ....',
                                'explanation' => 'Kalimat penutup efektif tidak berbelit-belit dan menggunakan kata sapaan langsung (Bapak/Ibu), bukan akhiran -nya.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Atas perhatian Bapak/Ibu, kami ucapkan terima kasih.', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Atas perhatiannya, saya ucapkan banyak-banyak terima kasih.', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Sekian dulu undangan dari saya, harap datang ya.', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Semoga surat ini dibaca dan tidak diabaikan oleh Bapak.', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 12,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Dalam surat pribadi kepada sahabat, bahasa yang lazim digunakan adalah ....',
                                'explanation' => 'Surat pribadi menggunakan bahasa yang akrab dan santun.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Akrab, santun, dan komunikatif', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Kaku, formal, dan penuh istilah hukum', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Bahasa ilmiah populer dengan grafik', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Bahasa resmi dengan cap stempel keluarga', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 13,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Bagian surat yang berisi inti atau pokok maksud pengirim disebut ....',
                                'explanation' => 'Isi surat memuat pesan atau maksud utama pengirim.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Isi surat', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Kop surat', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Salam pembuka', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Kaki surat', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 14,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Data yang biasanya TIDAK diperlukan saat mengisi formulir pendaftaran lomba cerdas cermat adalah ....',
                                'explanation' => 'Kekayaan keluarga tidak relevan untuk pendaftaran lomba akademis.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Jumlah kekayaan keluarga pendaftar', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Nama lengkap siswa', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Asal sekolah dan kelas', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Nomor telepon yang dapat dihubungi', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 15,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Pilihlah DUA contoh surat yang termasuk ke dalam kategori surat resmi!',
                                'explanation' => 'Surat rapat dinas dan SK beasiswa adalah surat resmi.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Surat undangan rapat dinas kepala sekolah', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Surat keputusan penerimaan beasiswa prestasi', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Surat ucapan ulang tahun untuk sepupu', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Surat curahan hati di buku harian', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 16,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Pilihlah DUA hal yang harus diperhatikan saat mengisi formulir resmi!',
                                'explanation' => 'Data harus benar, jujur, dan ditulis rapi.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Menuliskan data yang jujur dan sesuai dokumen resmi', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Menulis dengan rapi dan mudah dibaca', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Mengisi dengan nama samaran agar lebih keren', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Mengosongkan bagian tanda tangan', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 17,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => 'Jodohkan istilah surat di sebelah kiri dengan maknanya di sebelah kanan!',
                                'explanation' => 'Pasangan istilah bagian-bagian surat dinas.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'Lampiran', 'is_correct' => false, 'match_key' => 'Dokumen penyerta yang dikirim bersama surat', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Perihal', 'is_correct' => false, 'match_key' => 'Pokok isi atau masalah yang dibahas dalam surat', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Tembusan', 'is_correct' => false, 'match_key' => 'Pihak lain yang turut menerima salinan surat', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Inisial Pengonsep', 'is_correct' => false, 'match_key' => 'Singkatan nama pembuat dan pengetik surat', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 18,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan status kebenaran pernyataan mengenai korespondensi berikut!',
                                'explanation' => 'Surat pribadi bebas dari format dinas. Salam resmi menggunakan "Dengan hormat,".',
                                'group_index' => null,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Surat pribadi tidak memerlukan nomor surat dan stempel dinas.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Salam pembuka pada surat resmi selalu berupa "Hai teman baikku,".', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Formulir kartu anggota perpustakaan berfungsi mencatat data peminjam buku.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 3],
                                ],
                            ],
                            [
                                'order' => 19,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan status kebenaran kaidah ejaan penulisan surat!',
                                'explanation' => 'Tahun surat tidak diakhiri tanda baca apapun.',
                                'group_index' => null,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Penulisan nama hari dan bulan wajib diawali huruf kapital.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Singkatan "Yth." merupakan kependekan dari "Yang Terhormat".', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Setelah penulisan tahun surat resmi diakhiri tanda titik rangkap dua.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 3],
                                ],
                            ],
                            [
                                'order' => 20,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Kalimat yang tepat untuk menyatakan permohonan izin dalam surat pribadi adalah ....',
                                'explanation' => 'Bahasa santun dalam surat pribadi.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Bolehkah saya meminjam buku ceritamu akhir pekan ini?', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Anda harus segera menyerahkan buku cerita itu kepada saya sekarang.', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Dengan ini saya putuskan meminjam buku ceritamu.', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Surat ini adalah surat perintah peminjaman buku.', 'is_correct' => false, 'match_key' => null, 'order' => 4],
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
                                'prompt' => 'Bagian teratas dari surat resmi yang memuat nama instansi, logo, dan alamat disebut ....',
                                'explanation' => 'Kop surat (kepala surat) memuat identitas instansi pengirim.',
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
                                'prompt' => 'Singkatan "Yth." dalam surat dinas kepanjangannya adalah ....',
                                'explanation' => 'Yth. adalah singkatan resmi dari Yang Terhormat.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'Yang Terhormat', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Lembar isian yang digunakan untuk mendaftarkan diri pada sebuah kegiatan disebut ....',
                                'explanation' => 'Formulir adalah lembar data isian.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'formulir', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Surat yang dikirim oleh seseorang kepada teman atau keluarga dengan bahasa akrab disebut surat ....',
                                'explanation' => 'Surat antarindividu nonformal adalah surat pribadi.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'pribadi', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Tanda tangan pada akhir formulir berfungsi sebagai bukti ... atas kebenaran data yang ditulis.',
                                'explanation' => 'Tanda tangan mengesahkan tanggung jawab pengisi data.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'pertanggungjawaban', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Huruf yang digunakan di awal nama diri, nama kota, dan nama lembaga adalah huruf ....',
                                'explanation' => 'Nama diri dan nama tempat diawali huruf kapital.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'kapital', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Pihak yang menerima salinan surat selain penerima utama dicantumkan pada bagian ....',
                                'explanation' => 'Tembusan memuat pihak penerima salinan.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'tembusan', 'is_correct' => true, 'match_key' => null, 'order' => 1],
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
                                'prompt' => 'Sebutkan dan jelaskan secara singkat empat perbedaan utama antara surat resmi dinas dengan surat pribadi!',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Rubrik Penilaian & Kunci Jawaban:
1. Kop/Kepala Surat: Surat resmi memiliki kop surat instansi, sedangkan surat pribadi tidak ada kop surat.
2. Nomor & Perihal: Surat resmi memiliki nomor surat, lampiran, dan perihal; surat pribadi tidak memilikinya.
3. Bahasa yang Digunakan: Surat resmi wajib menggunakan bahasa baku/formal; surat pribadi menggunakan bahasa santai, akrab, dan komunikatif.
4. Stempel/Cap: Surat resmi dibubuhi stempel instansi pengirim; surat pribadi cukup tanda tangan tanpa stempel.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                            [
                                'order' => 2,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => 'Mengapa saat mengisi formulir pendaftaran resmi kita wajib mengisi data yang sebenarnya (jujur) dan dilarang memalsukan informasi? Jelaskan dampak buruknya jika mengisi dengan data palsu!',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Rubrik Penilaian & Kunci Jawaban:
1. Alasan: Formulir adalah dokumen administratif yang menjadi dasar pencatatan hukum, verifikasi peserta, dan penerbitan berkas resmi (seperti ijazah atau sertifikat).
2. Dampak buruk data palsu: Dapat mengakibatkan diskualifikasi dari kegiatan, kesalahan pencetakan identitas resmi, hilangnya hak kepesertaan, serta merugikan pihak penyelenggara dan mencoreng integritas diri.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                            [
                                'order' => 3,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => 'Buatlah draf singkat bagian penutup sebuah surat resmi dari Ketua Panitia Perpisahan Kelas 6 kepada orang tua siswa yang berisi ucapan terima kasih dan permohonan kehadiran dengan bahasa yang santun dan efektif!',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Rubrik Penilaian & Kunci Jawaban:
Contoh Draf Penutup Surat Resmi:
"Demikian surat undangan ini kami sampaikan. Mengingat pentingnya acara tersebut, kami sangat mengharapkan kehadiran Bapak/Ibu tepat pada waktunya. Atas perhatian dan kerja sama yang baik, kami ucapkan terima kasih.

Hormat kami,
Ketua Panitia Perpisahan Kelas 6,
(Tanda Tangan & Nama Terang)"',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'title' => 'Kuis Bab 1 Bahasa Indonesia Kelas 6 (Paket 2 - Deskripsi Budaya & Cerapan Indra)',
                'type' => 'quiz',
                'description' => 'Asesmen formatif Bab 1 bagian 2: Menulis paragraf deskripsi kaya cerapan indra, menganalisis watak tokoh, dan memahami keberagaman busana adat.',
                'duration_minutes' => 45,
                'sections' => [
                    [
                        'title' => 'Bagian 1: Objektif Beragam (Pilihan Ganda, Pilihan Ganda Kompleks, Menjodohkan, Benar-Salah)',
                        'instructions' => 'Pilihlah dan jawablah soal-soal objektif berikut secara cermat dan teliti.',
                        'order' => 1,
                        'question_groups' => [
                            ['title' => 'Stimulus 1: Semarak Pakaian Adat di Hari Kemerdekaan', 'content' => '[Keterangan Gambar: Suasana upacara bendera di lapangan sekolah: para siswa berbaris rapi mengenakan aneka busana daerah dari Sabang sampai Merauke, mulai dari Ulos Batak, Baju Bodo Bugis, hingga Koteka dan rumbai Kasuari khas Papua.]

Pada peringatan Hari Ulang Tahun ke-81 Kemerdekaan Republik Indonesia, SD Nusantara menggelar upacara bendera yang sangat istimewa. Seluruh siswa dan guru diwajibkan mengenakan pakaian adat dari berbagai penjuru tanah air. Di barisan paling depan, Arga tampak gagah mengenakan beskap Jawa lengkap dengan blangkon batik dan kain jarik bermotif parang. Di sebelahnya, Meisya terlihat anggun memesona dalam balutan Baju Bodo khas Sulawesi Selatan berwarna merah marun berhias benang emas berkilau. Keragaman warna dan corak busana tersebut tidak menimbulkan sekat, melainkan justru memperindah potret persatuan sekolah, mewujudkan semboyan Bhinneka Tunggal Ika dalam tindakan nyata.'],
                            ['title' => 'Stimulus 2: Menulis Paragraf Deskripsi yang Hidup', 'content' => '[Keterangan Gambar: Siswa sedang mengamati kain tenun ikat Nusa Tenggara Timur dengan kaca pembesar untuk mencatat tekstur benang dan corak geometrisnya.]

Teks deskripsi adalah teks yang melukiskan suatu objek, tempat, atau suasana secara mendetail dan terperinci dengan melibatkan pancaindra (penglihatan, pendengaran, penciuman, perabaan, atau pencecapan). Tujuannya agar pembaca seolah-olah dapat melihat langsung, mendengar, atau merasakan sendiri apa yang sedang digambarkan oleh penulis. Dalam menulis deskripsi identitas budaya, penulis menggunakan kata-kata konkret, cerapan indra yang kaya, serta majas perbandingan untuk menghidupkan gambaran objek di benak pembaca.'],
                        ],
                        'questions' => [
                            [
                                'order' => 1,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Berdasarkan wacana Stimulus 1, pakaian adat yang dikenakan oleh Arga berasal dari daerah ....',
                                'explanation' => 'Dalam teks: "Arga tampak gagah mengenakan beskap Jawa lengkap dengan blangkon batik..."',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Jawa', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Sulawesi Selatan', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Sumatra Barat', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Papua', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Pesan utama yang ingin disampaikan pengarang melalui deskripsi suasana upacara tersebut adalah ....',
                                'explanation' => 'Keragaman busana memperindah potret persatuan sesuai semboyan Bhinneka Tunggal Ika.',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Perbedaan busana adat justru memperindah persatuan bangsa sesuai Bhinneka Tunggal Ika', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Pakaian adat daerah sangat mahal dan sulit dipakai oleh anak sekolah', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Upacara bendera sebaiknya selalu menggunakan pakaian seragam putih merah saja', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Hanya siswa berprestasi yang berhak mengenakan pakaian adat lengkap', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Pilihlah DUA ciri busana yang dikenakan oleh tokoh Meisya dalam cerita!',
                                'explanation' => 'Meisya mengenakan Baju Bodo merah marun berhias benang emas.',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Mengenakan Baju Bodo khas Sulawesi Selatan berwarna merah marun', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Dihiasi sulaman benang emas yang berkilau', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Mengenakan blangkon batik bermotif parang', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Mengenakan penutup kepala rumbai bulu kasuari', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => 'Jodohkan nama pakaian atau atribut adat dengan daerah asalnya!',
                                'explanation' => 'Pasangan atribut busana adat dan daerah asal.',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'Blangkon dan beskap', 'is_correct' => false, 'match_key' => 'Jawa', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Baju Bodo', 'is_correct' => false, 'match_key' => 'Sulawesi Selatan', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Ulos', 'is_correct' => false, 'match_key' => 'Sumatra Utara (Batak)', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Baju Kurung songket', 'is_correct' => false, 'match_key' => 'Minangkabau / Melayu', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Tujuan utama dari teks deskripsi adalah ....',
                                'explanation' => 'Deskripsi bertujuan membangkitkan cerapan indra pembaca terhadap objek.',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Membuat pembaca seolah-olah melihat, mendengar, atau merasakan sendiri objek yang digambarkan', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Meyakinkan pembaca untuk membeli barang yang ditawarkan', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Menjelaskan langkah-langkah ilmiah membuat suatu benda', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Menceritakan khayalan tokoh sakti masa lampau', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Kalimat berikut yang melibatkan cerapan indra penglihatan secara jelas adalah ....',
                                'explanation' => 'Warna merah menyala dan benang berkilau dirasakan melalui indra penglihatan.',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Kain tenun itu bermotif garis merah menyala dengan benang emas yang berkilau di bawah lampu.', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Alunan suara seruling bambu itu terdengar sangat merdu dan menyayat hati.', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Aroma masakan rendang yang gurih tercium semerbak dari dapur ibuku.', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Permukaan kain sutra itu terasa sangat halus dan dingin saat disentuh.', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan status kebenaran pernyataan mengenai ciri teks deskripsi!',
                                'explanation' => 'Cerapan indra sangat penting dalam teks deskripsi untuk menghidupkan tulisan.',
                                'group_index' => 1,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Teks deskripsi menggambarkan objek secara terperinci dan konkret.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Cerapan indra tidak diperlukan dalam menyusun paragraf deskripsi.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Penggunaan kata sifat membantu memperjelas watak dan ciri fisik objek.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 3],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Bagian awal dalam teks deskripsi yang berisi pengenalan nama objek atau lokasinya disebut bagian ....',
                                'explanation' => 'Identifikasi umum mengenalkan objek.',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Identifikasi umum', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Deskripsi bagian', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Simpulan atau kesan', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Komplikasi cerita', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Kalimat yang mengandung cerapan indra pendengaran adalah ....',
                                'explanation' => 'Gemerisik terdengar syahdu melibatkan indra pendengaran.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Suara gemerisik dedaunan bambu terdengar syahdu tertiup angin senja.', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Bunga melati di sudut teras tampak putih bersih bermekaran.', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Kue lapis legit buatan nenek terasa manis gurih di lidah.', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Hawa pegunungan pagi ini menusuk kulit hingga terasa dingin.', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Kalimat yang mengandung cerapan indra perabaan adalah ....',
                                'explanation' => 'Terasa agak kaku dan teranyam rapat melibatkan indra peraba.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Kain songket Palembang itu terasa agak kaku namun benangnya teranyam rapat.', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Cahaya mentari pagi menyinari hamparan sawah nan hijau.', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Aroma terasi bakar itu tercium tajam hingga ke ruang tamu.', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Dentuman drum marching band bergemuruh memekakkan telinga.', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 11,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Kata sifat yang tepat untuk melengkapi kalimat: "Anak yang ... selalu disenangi teman karena tutur katanya sopan dan tidak pernah sombong" adalah ....',
                                'explanation' => 'Rendah hati bermakna tidak sombong dan santun.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'rendah hati', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'tinggi hati', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'besar kepala', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'tebal muka', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 12,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Makna ungkapan "panjang akal" dalam konteks karakter anak berprestasi adalah ....',
                                'explanation' => 'Panjang akal berarti cerdik dan banyak akal/ide.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Banyak ide dan tidak mudah kehabisan cara mengatasi masalah', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Mudah menyerah jika diberi tugas berat', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Suka berbohong demi keuntungan pribadi', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Sering mengeluh saat bekerja keras', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 13,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Sinonim (persamaan kata) yang tepat untuk kata "otentik" dalam konteks budaya daerah adalah ....',
                                'explanation' => 'Otentik bermakna asli, sah, atau murni.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Asli / murni', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Tiruan', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Palsu', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Cacat', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 14,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Antonim (lawan kata) dari kata "kolektif" dalam kegiatan kelompok budaya adalah ....',
                                'explanation' => 'Kolektif berarti bersama-sama, lawannya individual.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Individual / pribadi', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Bersama', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Terpadu', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Serentak', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 15,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Pilihlah DUA kalimat yang termasuk cerapan indra penciuman!',
                                'explanation' => 'Harum wangi pandan dan bau tanah basah melibatkan indra penciuman.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Harum wangi pandan dan santan menyeruak dari periuk kolak pisang.', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Bau tanah basah seusai hujan lebat tercium menenangkan jiwa.', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Langit senja tampak berwarna jingga keemasan.', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Gong besar itu berbunyi nyaring menggema di aula.', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 16,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Pilihlah DUA kata yang bersinonim dengan kata "elok"!',
                                'explanation' => 'Elok bersinonim dengan indah, bagus, rupawan, molek.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Indah', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Molek', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Buruk', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Kusam', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 17,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => 'Jodohkan ungkapan di sebelah kiri dengan maknanya di sebelah kanan!',
                                'explanation' => 'Pasangan ungkapan dan maknanya.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'Besar kepala', 'is_correct' => false, 'match_key' => 'Sombong atau congkak', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Ringan tangan', 'is_correct' => false, 'match_key' => 'Suka membantu orang lain', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Rendah hati', 'is_correct' => false, 'match_key' => 'Tidak sombong dan bersahaja', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Banting tulang', 'is_correct' => false, 'match_key' => 'Bekerja keras tanpa kenal lelah', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 18,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan status kebenaran penggunaan ungkapan bahasa Indonesia!',
                                'explanation' => 'Berpangku tangan bermakna bermalas-malasan tidak berbuat apa-apa.',
                                'group_index' => null,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Ungkapan "lapang dada" bermakna ikhlas dan sabar menerima kenyataan.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Ungkapan "berpangku tangan" bermakna rajin membantu kedua orang tua.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Ungkapan "buah pena" bermakna karya tulis hasil karangan seseorang.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 3],
                                ],
                            ],
                            [
                                'order' => 19,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Kalimat yang mengandung cerapan indra pencecapan adalah ....',
                                'explanation' => 'Terasa gurih asam di lidah melibatkan indra pencecapan.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Gulai ikan patin khas Riau itu terasa gurih asam di lidah.', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Suara gemuruh ombak pantai terdengar dari kejauhan.', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Langit senja tampak berwarna merah lembayung.', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Udara dingin pegunungan menusuk kulit.', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 20,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Ungkapan "rendah hati" memiliki lawan makna yang setara dengan ....',
                                'explanation' => 'Tinggi hati berarti sombong.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Tinggi hati / sombong', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Murah hati', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Lapang dada', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Ringan tangan', 'is_correct' => false, 'match_key' => null, 'order' => 4],
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
                                'prompt' => 'Teks yang menggambarkan suatu objek secara mendalam hingga melibatkan pancaindra disebut teks ....',
                                'explanation' => 'Teks deskripsi melukiskan objek melalui cerapan indra.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'deskripsi', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Kalimat "Suara kicauan burung kepodang membangunkan tidurku" melibatkan indra ....',
                                'explanation' => 'Kicauan suara melibatkan indra pendengaran.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'pendengaran', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Lawan kata (antonim) dari kata sifat "angkuh" adalah ....',
                                'explanation' => 'Lawan kata angkuh/sombong adalah rendah hati/ramah.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'rendah hati', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Ungkapan yang berarti "suka menolong sesama teman" adalah ringan ....',
                                'explanation' => 'Ringan tangan bermakna suka membantu.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'tangan', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Semboyan persatuan bangsa Indonesia yang tertera pada lambang Garuda Pancasila adalah ....',
                                'explanation' => 'Bhinneka Tunggal Ika berarti berbeda-beda tetapi tetap satu.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'Bhinneka Tunggal Ika', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Unsur teks deskripsi yang memaparkan perincian bagian-bagian objek disebut bagian deskripsi ....',
                                'explanation' => 'Struktur teks deskripsi: identifikasi, deskripsi bagian, simpulan.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'bagian', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Kain tradisional kebanggaan bangsa Indonesia yang telah diakui UNESCO sebagai warisan budaya takbenda dunia adalah kain ....',
                                'explanation' => 'Batik adalah warisan dunia UNESCO asal Indonesia.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'batik', 'is_correct' => true, 'match_key' => null, 'order' => 1],
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
                                'prompt' => 'Tulislah sebuah paragraf deskripsi singkat (minimal 4-5 kalimat) yang menggambarkan keindahan salah satu pakaian adat atau tarian daerah Indonesia dengan melibatkan minimal dua cerapan indra yang berbeda (penglihatan dan pendengaran)!',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Rubrik Penilaian & Kunci Jawaban:
Contoh Jawaban Paragraf Deskripsi:
"Tari Saman dari Aceh dipentaskan dengan sangat memukau di atas panggung megah. Para penari mengenakan busana tradisional bermotif kantong merah dan kuning keemasan yang berkilau indah saat terkena sorot lampu (cerapan penglihatan). Gerakan tepukan dada dan paha para penari berpadu harmonis menciptakan irama ritmis yang dinamis. Suara syair nyanyian berbahasa Gayo terdengar kompak menggelegar memenuhi seluruh penjuru ruangan (cerapan pendengaran). Penonton terpana menyaksikan keselarasan gerak seribu tangan yang begitu cepat dan memikat."

Skor Maksimal (5): Terdapat 4-5 kalimat, alur padu, memuat cerapan penglihatan dan pendengaran yang jelas.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                            [
                                'order' => 2,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => 'Jelaskan apa yang dimaksud dengan ungkapan dalam bahasa Indonesia, dan berikan dua contoh kalimat yang menggunakan ungkapan untuk menggambarkan kepribadian anak yang terpuji!',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Rubrik Penilaian & Kunci Jawaban:
1. Pengertian: Ungkapan (idiom) adalah gabungan kata yang maknanya sudah menyatu dan tidak dapat ditafsirkan dengan makna kata-kata pembentuknya secara harfiah (memiliki makna kiasan).
2. Contoh Kalimat 1: "Meskipun berhasil menjuarai olimpiade matematika nasional, Farhan tetap rendah hati dan tidak pernah memamerkan kepintarannya kepada teman-temannya."
3. Contoh Kalimat 2: "Siti dikenal sebagai anak yang ringan tangan karena ia selalu sigap membantu tetangganya yang sedang kesulitan tanpa diminta."',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                            [
                                'order' => 3,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => 'Mengapa pengenalan pakaian adat dan budaya daerah penting bagi siswa kelas 6 SD menjelang kelulusan sekolah dasar? Kaitkan dengan nilai profil pelajar Pancasila!',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Rubrik Penilaian & Kunci Jawaban:
1. Menumbuhkan identitas diri: Mengenal warisan luhur bangsa membuat siswa bangga berakar pada budayanya sendiri.
2. Memupuk toleransi: Memahami keberagaman budaya melatih siswa menghargai perbedaan latar belakang teman-temannya.
3. Kaitan Profil Pelajar Pancasila: Sangat erat dengan dimensi "Berkebinekaan Global" dan "Cinta Tanah Air", di mana siswa mempertahankan budaya luhur, lokalitas, dan identitasnya, serta tetap berpikiran terbuka dalam berinteraksi dengan budaya lain.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'title' => 'Kuis Bab 1 Bahasa Indonesia Kelas 6 (Paket 3 - Sintaksis & Kaidah Kebahasaan)',
                'type' => 'quiz',
                'description' => 'Asesmen formatif Bab 1 bagian 3: Menguasai kalimat majemuk setara, peluluhan huruf KTPS, serta penggabungan klausa bahasa Indonesia.',
                'duration_minutes' => 45,
                'sections' => [
                    [
                        'title' => 'Bagian 1: Objektif Beragam (Pilihan Ganda, Pilihan Ganda Kompleks, Menjodohkan, Benar-Salah)',
                        'instructions' => 'Pilihlah dan jawablah soal-soal objektif berikut secara cermat dan teliti.',
                        'order' => 1,
                        'question_groups' => [
                            ['title' => 'Stimulus 1: Kiprah Duta Cilik Pelestari Lingkungan Hidup', 'content' => '[Keterangan Gambar: Profil anak laki-laki kelas 6 memegang bibit mangrove di pesisir pantai bersama teman-teman komunitas peduli laut.]

Ksatria (12 tahun) dinobatkan sebagai Duta Cilik Lingkungan Pesisir berkat dedikasinya merawat hutan bakau di desanya. Sejak dua tahun lalu, ia memprakarsai gerakan menanam bibit mangrove bersama teman-teman sebayanya. Menurut Ksatria, hutan bakau bukan hanya menahan abrasi gelombang laut, melainkan juga menyediakan habitat bagi aneka biota pesisir seperti kepiting bakau dan burung camar. Ksatria rajin menyosialisasikan pentingnya ekosistem pesisir ke berbagai sekolah dasar. Keberaniannya berbicara di forum pemuda membuktikan bahwa usia muda bukanlah halangan untuk berkontribusi nyata bagi kelestarian bumi nusantara.'],
                            ['title' => 'Stimulus 2: Menelaah Kalimat Majemuk Setara', 'content' => '[Keterangan Gambar: Bagan sintaksis kalimat majemuk setara yang menghubungkan dua klausa tunggal menggunakan konjungsi koordinatif seperti "dan", "tetapi", "serta", "atau", dan "sedangkan".]

Kalimat majemuk setara adalah kalimat yang terdiri atas dua klausa atau lebih yang memiliki kedudukan gramatikal setara (sama tinggi). Klausa-klausa tersebut dihubungkan oleh konjungsi koordinatif. Hubungan penjumlahan menggunakan kata hubung "dan" atau "serta". Hubungan pertentangan menggunakan kata hubung "tetapi", "namun", atau "sedangkan". Hubungan pemilihan menggunakan kata hubung "atau". Kalimat majemuk setara membantu penulis merangkai gagasan secara runtut dan padu dalam sebuah karangan utuh.'],
                        ],
                        'questions' => [
                            [
                                'order' => 1,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Berdasarkan teks Stimulus 1, kata "abrasi" memiliki makna ....',
                                'explanation' => 'Abrasi adalah proses pengikisan pantai oleh gelombang air laut.',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Pengikisan daratan pantai akibat hantaman gelombang laut', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Pencemaran air laut akibat tumpahan minyak mentah', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Penebangan liar pohon-pohon di hutan belantara', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Pengeringan tambak udang oleh para petani', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Kalimat majemuk setara yang menyatakan hubungan pertentangan pada wacana di atas adalah ....',
                                'explanation' => 'Bukan hanya ... melainkan juga ... menghubungkan klausa pertentangan penguatan.',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Hutan bakau bukan hanya menahan abrasi gelombang laut, melainkan juga menyediakan habitat bagi biota pesisir.', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Ksatria rajin menyosialisasikan pentingnya ekosistem pesisir ke berbagai sekolah dasar.', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Sejak dua tahun lalu, ia memprakarsai gerakan menanam bibit mangrove bersama teman-temannya.', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Ksatria dinobatkan sebagai Duta Cilik Lingkungan Pesisir.', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Pilihlah DUA manfaat hutan bakau yang diuraikan oleh tokoh Ksatria!',
                                'explanation' => 'Bakau menahan abrasi dan menyediakan habitat biota pesisir.',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Menahan abrasi atau pengikisan daratan pesisir oleh gelombang laut', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Menyediakan habitat dan tempat hidup bagi biota laut seperti kepiting', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Menghasilkan bahan bakar minyak bumi siap pakai', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Mencegah terjadinya gempa vulkanik di gunung berapi', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => 'Jodohkan istilah lingkungan pada teks dengan penjelasannya!',
                                'explanation' => 'Pasangan istilah keanekaragaman hayati dan maknanya.',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'Abrasi', 'is_correct' => false, 'match_key' => 'Pengikisan pantai oleh tenaga gelombang laut', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Habitat', 'is_correct' => false, 'match_key' => 'Tempat hidup alami bagi tumbuhan atau hewan', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Biota', 'is_correct' => false, 'match_key' => 'Seluruh makhluk hidup (flora dan fauna) di suatu daerah', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Ekosistem', 'is_correct' => false, 'match_key' => 'Sistem interaksi antara makhluk hidup dan lingkungannya', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Konjungsi yang digunakan untuk menyatakan hubungan pemilihan pada kalimat majemuk setara adalah ....',
                                'explanation' => 'Konjungsi "atau" digunakan untuk menyatakan pilihan.',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Atau', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Tetapi', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Dan', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Karena', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Contoh kalimat majemuk setara yang menyatakan hubungan pertentangan adalah ....',
                                'explanation' => 'Kata hubung "sedangkan" menyatakan pertentangan antara dua klausa.',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Danu menyukai tari saman dari Aceh, sedangkan Bayu lebih tertarik bermain angklung dari Jawa Barat.', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Ibu membeli sayur bayam dan ikan bandeng di pasar tradisional.', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Adik belajar membaca serta kakak mengerjakan tugas matematika.', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Kamu boleh memilih pakaian adat Betawi atau pakaian adat Sunda.', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan status kebenaran pernyataan mengenai kalimat majemuk berikut!',
                                'explanation' => 'Kalimat majemuk setara memiliki klausa setara, dan sebelum "tetapi" diberi tanda koma.',
                                'group_index' => 1,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Konjungsi "dan" digunakan untuk menyatakan hubungan penggabungan/penjumlahan.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Klausa dalam kalimat majemuk setara memiliki kedudukan yang berbeda tingkat.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Tanda koma (,) wajib diletakkan sebelum konjungsi "tetapi" dalam kalimat majemuk setara.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 3],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Kalimat majemuk setara yang menyatakan hubungan pemilihan ditandai dengan konjungsi ....',
                                'explanation' => 'Konjungsi atau menyatakan hubungan pemilihan.',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Atau', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Tetapi', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Dan', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Sehingga', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Kalimat majemuk setara yang menggunakan konjungsi penggabungan adalah ....',
                                'explanation' => 'Kata "dan" menyatakan penggabungan.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Ranti menari piring dengan lincah dan penonton menyambutnya dengan tepuk tangan meriah.', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Ranti ingin menari piring, tetapi kakinya terkilir kemarin sore.', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Apakah Ranti akan menari piring atau menari jaipong?', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Ranti tidak dapat menari piring karena demam tinggi.', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Kata dasar dari kata berimbuhan "memprakarsai" adalah ....',
                                'explanation' => 'Imbuhan mem- -i + prakarsa menjadi memprakarsai.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Prakarsa', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Karsa', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Karsa-i', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Inisiatif', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 11,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Imbuhan pe-an pada kata "pesisir" dan "pedesaan" menyatakan makna ....',
                                'explanation' => 'Pesisir / pedesaan menyatakan lingkungan daerah.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Daerah atau wilayah lingkungan sekitar', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Proses melakukan suatu perbuatan', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Alat untuk melakukan sesuatu', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Orang yang memiliki profesi tertentu', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 12,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Penulisan kata gabung serasi (senyawa) yang benar menurut ejaan baku adalah ....',
                                'explanation' => 'Tanggung jawab ditulis terpisah jika tidak mendapat awalan dan akhiran sekaligus.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Tanggung jawab', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Tanggungjawab', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Bumiputera', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Kacamatakuda', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 13,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Jika diberi awalan me- dan akhiran -kan, kata "tanggung jawab" ditulis menjadi ....',
                                'explanation' => 'Jika mendapat konfiks sekaligus (memper- -kan), kata gabung ditulis serangkai: mempertanggungjawabkan.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Mempertanggungjawabkan', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Menanggung jawabkan', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Mempertanggung jawabkan', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Menanggungjawabkan', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 14,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Kalimat berikut yang menggunakan tanda baca koma secara tepat adalah ....',
                                'explanation' => 'Anak kalimat di depan induk kalimat dipisahkan tanda koma.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Meskipun hujan lebat turun, para siswa tetap bersemangat membersihkan halaman sekolah.', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Meskipun hujan lebat turun para siswa, tetap bersemangat.', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Para siswa tetap bersemangat, meskipun hujan lebat turun.', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Meskipun, hujan lebat turun para siswa tetap bersemangat.', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 15,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Pilihlah DUA kalimat yang termasuk kalimat majemuk setara!',
                                'explanation' => 'Pilihan A dan B adalah majemuk setara (sedangkan, dan). Pilihan C dan D adalah majemuk bertingkat (karena, jika).',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Ardi gemar membaca buku sejarah, sedangkan adiknya gemar menggambar komik.', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Kakak merapikan rak buku dan adik menyapu lantai perpustakaan.', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Karena hari sudah malam, kami segera pulang ke rumah.', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Jika kamu rajin belajar, nilaimu pasti akan meningkat pesat.', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 16,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Pilihlah DUA kata bentukan yang mengalami peluluhan bunyi huruf k, p, t, s saat diberi awalan me-!',
                                'explanation' => 'Pesona menjadi memesona, sapu menjadi menyapu (luluh). Pukul juga luluh (memukul), dengar tidak luluh.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Memesona (dari kata pesona)', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Menyapu (dari kata sapu)', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Memukul (dari kata pukul)', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Mendengar (dari kata dengar)', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 17,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => 'Jodohkan konjungsi dengan jenis hubungan kalimat majemuk setaranya!',
                                'explanation' => 'Pasangan konjungsi koordinatif.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'Dan, serta', 'is_correct' => false, 'match_key' => 'Hubungan penggabungan (penjumlahan)', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Tetapi, melainkan, sedangkan', 'is_correct' => false, 'match_key' => 'Hubungan pertentangan', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Atau', 'is_correct' => false, 'match_key' => 'Hubungan pemilihan', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Lalu, kemudian', 'is_correct' => false, 'match_key' => 'Hubungan urutan waktu', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 18,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan status kebenaran kaidah pembentukan kata berikut!',
                                'explanation' => 'Kata dasar sosial diberi me- -kan luluh menjadi menyosialisasikan.',
                                'group_index' => null,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Kata dasar yang diawali huruf P luluh menjadi M saat diberi awalan me- (contoh: pesona -> memesona).', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Kata "mensosialisasikan" merupakan bentuk kata baku yang tepat menurut KBBI.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Bentuk yang baku menurut KBBI adalah "menyosialisasikan" karena huruf S luluh menjadi NY.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 3],
                                ],
                            ],
                            [
                                'order' => 19,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Kata "menterjemahkan" tidak baku menurut KBBI karena huruf T yang diikuti huruf vokal seharusnya luluh menjadi ....',
                                'explanation' => 'T luluh menjadi n: menerjemahkan.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Menerjemahkan', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Mengterjemahkan', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Mentranslasikan', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Menyuratkan', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 20,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Konjungsi yang tepat untuk melengkapi kalimat: "Ayah membaca koran pagi ... adik menonton kartun di televisi" adalah ....',
                                'explanation' => 'Sedangkan menyatakan hubungan pertentangan perbandingan.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'sedangkan', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'karena', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'sehingga', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'agar', 'is_correct' => false, 'match_key' => null, 'order' => 4],
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
                                'prompt' => 'Kalimat yang terdiri atas dua klausa yang setara kedudukannya disebut kalimat majemuk ....',
                                'explanation' => 'Kalimat majemuk setara memiliki klausa berderajat sama.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'setara', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Konjungsi koordinatif yang digunakan untuk menyatakan pertentangan antara dua fakta adalah ....',
                                'explanation' => 'Sedangkan atau tetapi menyatakan pertentangan.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'sedangkan', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Bentuk baku awalan me- pada kata dasar "target" yang diimbuhi akhiran -kan adalah men-...-kan.',
                                'explanation' => 'Menargetkan (t luluh).',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'targetkan', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Kata berimbuhan dari kata dasar "kibar" dengan awalan meng- dan akhiran -kan adalah ....',
                                'explanation' => 'Mengibarkan (k luluh).',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'mengibarkan', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Tanda baca yang digunakan sebelum kata "tetapi" dalam kalimat majemuk setara adalah tanda ....',
                                'explanation' => 'Tanda koma mendahului konjungsi pertentangan.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'koma', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Kata penghubung antar klausa dalam kalimat majemuk sering disebut ....',
                                'explanation' => 'Kata penghubung dinamakan konjungsi.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'konjungsi', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Lawan dari kalimat majemuk setara yang klausanya tidak setara (memiliki induk dan anak kalimat) adalah kalimat majemuk ....',
                                'explanation' => 'Kalimat majemuk bertingkat memiliki induk dan anak kalimat.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'bertingkat', 'is_correct' => true, 'match_key' => null, 'order' => 1],
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
                                'prompt' => 'Jelaskan aturan kaidah peluluhan huruf K, P, T, S ketika diberi awalan me- dalam bahasa Indonesia, dan berikan masing-masing satu contoh kata yang luluh serta satu contoh pengecualiannya!',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Rubrik Penilaian & Kunci Jawaban:
1. Aturan Peluluhan: Huruf pertama kata dasar K, P, T, S akan luluh (berubah menjadi ng, m, n, ny) jika huruf keduanya berupa huruf vokal (a, i, u, e, o).
2. Contoh kata luluh:
   - K: kirim -> mengirimkan
   - P: pesona -> memesona
   - T: tulis -> menulis
   - S: sapu -> menyapu
3. Pengecualian: Huruf K, P, T, S TIDAK luluh jika diikuti huruf konsonan (gugus konsonan), misalnya: praktik -> mempraktikkan, kritik -> mengkritik, traktir -> mentraktir, syarat -> mensyaratkan.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                            [
                                'order' => 2,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => 'Gabungkanlah dua kalimat tunggal berikut menjadi satu kalimat majemuk setara dengan konjungsi yang tepat!
Kalimat 1: Nanda sangat mahir memainkan alat musik sasando dari Nusa Tenggara Timur.
Kalimat 2: Nanda belum berani tampil dalam konser musik di hadapan banyak penonton.',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Rubrik Penilaian & Kunci Jawaban:
Kedua kalimat menunjukkan hubungan pertentangan antara kemahiran dan rasa belum berani tampil.
Penggabungan kalimat yang tepat:
"Nanda sangat mahir memainkan alat musik sasando dari Nusa Tenggara Timur, tetapi ia belum berani tampil dalam konser musik di hadapan banyak penonton."
(Atau menggunakan konjungsi "namun" / "sedangkan"). Penggunaan tanda koma sebelum konjungsi dinilai tepat.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                            [
                                'order' => 3,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => 'Buatlah tiga kalimat majemuk setara orisinal yang masing-masing menunjukkan:
a. Hubungan penjumlahan/penggabungan (dan/serta)
b. Hubungan pertentangan (tetapi/sedangkan)
c. Hubungan pemilihan (atau)',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Rubrik Penilaian & Kunci Jawaban:
a. Contoh penjumlahan: "Rafi menyiapkan kostum tari saman di belakang panggung dan Dimas menata tata suara pementasan."
b. Contoh pertentangan: "Ayu menyukai pelajaran bahasa Indonesia, sedangkan kakaknya lebih berminat pada sains dan matematika."
c. Contoh pemilihan: "Peserta lomba diperbolehkan membawakan lagu daerah Sumatra Barat atau lagu tradisional Jawa Barat."',
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
