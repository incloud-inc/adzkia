<?php

namespace Database\Seeders\Data;

class MatematikaBab7Data
{
    public static function getAssessments(): array
    {
        return [
            [
                'title' => 'Quiz 1 Bab 7: Mengukur Panjang dan Waktu Non-Standar',
                'type' => 'ph',
                'duration_minutes' => 45,
                'description' => 'Kuis 1 Bab 7 Matematika Kelas 1 SD Kurikulum Merdeka: Mengukur panjang benda dengan satuan tidak baku (jengkal, langkah, klip kertas) dan membandingkan satuan waktu (lama vs sebentar).',
                'sections' => [
                    [
                        'title' => 'Bagian 1: Pilihan Ganda',
                        'instructions' => 'Pilihlah salah satu jawaban yang paling tepat (A, B, atau C)!',
                        'order' => 1,
                        'questions' => [
                            [
                                'order' => 1,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Dua buah pensil: pensil A panjang 15 cm dan pensil B panjang 8 cm]
Pensil A ... daripada pensil B.',
                                'explanation' => 'Pensil A lebih panjang dari pensil B.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'lebih panjang', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'lebih pendek', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'sama panjang', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Tangan terbuka mengukur meja dengan jengkal]
Alat ukur panjang tidak baku pada gambar adalah ....',
                                'explanation' => 'Mengukur dengan jari tangan terbuka adalah jengkal.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'jengkal', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'langkah', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'depa', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Penghapus dan penggaris]
Penghapus ... daripada penggaris.',
                                'explanation' => 'Penghapus lebih pendek daripada penggaris.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'lebih pendek', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'lebih panjang', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'sama panjang', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Mengukur panjang lapangan sekolah paling mudah menggunakan ....',
                                'explanation' => 'Lapangan luas diukur dengan langkah kaki.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'langkah kaki', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'jengkal tangan', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'klip kertas', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Pensil diukur panjangnya sejajar dengan 5 buah klip kertas]
Panjang pensil sama dengan ... klip kertas.',
                                'explanation' => 'Panjang pensil = 5 klip kertas.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '5', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '4', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '6', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Matahari baru terbit dan anak berangkat sekolah]
Kegiatan pada gambar dilakukan pada waktu ....',
                                'explanation' => 'Berangkat sekolah di pagi hari.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'pagi hari', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'malam hari', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'siang hari', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Bulan dan bintang di langit malam, anak tidur di kasur]
Kita tidur malam pada waktu ....',
                                'explanation' => 'Tidur malam dilakukan waktu malam hari.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'malam hari', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'siang hari', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'sore hari', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Kegiatan yang membutuhkan waktu lebih lama adalah ....',
                                'explanation' => 'Tidur malam butuh waktu beberapa jam (lama).',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'tidur malam', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'minum air', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'mencuci tangan', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Kegiatan yang membutuhkan waktu sebentar adalah ....',
                                'explanation' => 'Berkedip hanya butuh satu detik (sebentar).',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'berkedip', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'belajar di sekolah', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'tidur siang', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Makan siang dilakukan pada waktu ....',
                                'explanation' => 'Makan siang pada waktu siang hari.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'siang hari', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'pagi hari', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'malam hari', 'is_correct' => false],
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Bagian 2: Isian Singkat',
                        'instructions' => 'Isilah titik-titik dengan jawaban yang tepat!',
                        'order' => 2,
                        'questions' => [
                            [
                                'order' => 1,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Keterangan Gambar: Penggaris kayu diukur dengan jengkal]
Panjang penggaris ada 3 ... tangan.',
                                'explanation' => 'jengkal',
                            ],
                            [
                                'order' => 2,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Upacara bendera di sekolah dilakukan pada ... hari.',
                                'explanation' => 'pagi',
                            ],
                            [
                                'order' => 3,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Menonton film membutuhkan waktu lebih ... daripada mengedipkan mata.',
                                'explanation' => 'lama',
                            ],
                        ],
                    ],
                    [
                        'title' => 'Bagian 3: Uraian',
                        'instructions' => 'Jawablah pertanyaan dengan jelas dan teliti!',
                        'order' => 3,
                        'questions' => [
                            [
                                'order' => 1,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => '[Keterangan Gambar: Pensil Budi panjangnya 6 klip kertas, pensil Siti panjangnya 4 klip kertas]
Bandingkan panjang kedua pensil tersebut! Pensil siapakah yang lebih panjang?',
                                'explanation' => 'Pensil Budi (6 klip kertas) lebih panjang daripada pensil Siti (4 klip kertas).',
                            ],
                            [
                                'order' => 2,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => 'Sebutkan 2 contoh kegiatan sehari-hari yang membutuhkan waktu lama dan 2 kegiatan yang membutuhkan waktu sebentar!',
                                'explanation' => 'Waktu lama: tidur malam, belajar di sekolah. Waktu sebentar: minum air, bersin, mencuci tangan.',
                            ],
                        ],
                    ],
                ],
            ],
            [
                'title' => 'Quiz 2 Bab 7: Mengukur Panjang dan Waktu Non-Standar',
                'type' => 'ph',
                'duration_minutes' => 45,
                'description' => 'Kuis 2 Bab 7 Matematika Kelas 1 SD Kurikulum Merdeka: Mengukur panjang benda dengan satuan tidak baku (jengkal, langkah, klip kertas) dan membandingkan satuan waktu (lama vs sebentar).',
                'sections' => [
                    [
                        'title' => 'Bagian 1: Pilihan Ganda',
                        'instructions' => 'Pilihlah salah satu jawaban yang paling tepat (A, B, atau C)!',
                        'order' => 1,
                        'questions' => [
                            [
                                'order' => 1,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Penghapus pensil dan sedotan es]
Sedotan ... daripada penghapus.',
                                'explanation' => 'Sedotan lebih panjang.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'lebih panjang', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'lebih pendek', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'sama panjang', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Tangan terbuka mengukur meja dengan jengkal]
Alat ukur panjang tidak baku pada gambar adalah ....',
                                'explanation' => 'Mengukur dengan jari tangan terbuka adalah jengkal.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'jengkal', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'langkah', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'depa', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Penghapus dan penggaris]
Penghapus ... daripada penggaris.',
                                'explanation' => 'Penghapus lebih pendek daripada penggaris.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'lebih pendek', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'lebih panjang', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'sama panjang', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Mengukur panjang lapangan sekolah paling mudah menggunakan ....',
                                'explanation' => 'Lapangan luas diukur dengan langkah kaki.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'langkah kaki', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'jengkal tangan', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'klip kertas', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Pensil diukur panjangnya sejajar dengan 5 buah klip kertas]
Panjang pensil sama dengan ... klip kertas.',
                                'explanation' => 'Panjang pensil = 5 klip kertas.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '5', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '4', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '6', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Matahari baru terbit dan anak berangkat sekolah]
Kegiatan pada gambar dilakukan pada waktu ....',
                                'explanation' => 'Berangkat sekolah di pagi hari.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'pagi hari', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'malam hari', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'siang hari', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Bulan dan bintang di langit malam, anak tidur di kasur]
Kita tidur malam pada waktu ....',
                                'explanation' => 'Tidur malam dilakukan waktu malam hari.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'malam hari', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'siang hari', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'sore hari', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Kegiatan yang membutuhkan waktu lebih lama adalah ....',
                                'explanation' => 'Belajar di kelas berlangsung lama.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'belajar di kelas', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'menyisir rambut', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'memakai sepatu', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Kegiatan yang membutuhkan waktu sebentar adalah ....',
                                'explanation' => 'Berkedip hanya butuh satu detik (sebentar).',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'berkedip', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'belajar di sekolah', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'tidur siang', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Makan siang dilakukan pada waktu ....',
                                'explanation' => 'Makan siang pada waktu siang hari.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'siang hari', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'pagi hari', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'malam hari', 'is_correct' => false],
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Bagian 2: Isian Singkat',
                        'instructions' => 'Isilah titik-titik dengan jawaban yang tepat!',
                        'order' => 2,
                        'questions' => [
                            [
                                'order' => 1,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Keterangan Gambar: Penggaris kayu diukur dengan jengkal]
Panjang penggaris ada 3 ... tangan.',
                                'explanation' => 'jengkal',
                            ],
                            [
                                'order' => 2,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Upacara bendera di sekolah dilakukan pada ... hari.',
                                'explanation' => 'pagi',
                            ],
                            [
                                'order' => 3,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Menonton film membutuhkan waktu lebih ... daripada mengedipkan mata.',
                                'explanation' => 'lama',
                            ],
                        ],
                    ],
                    [
                        'title' => 'Bagian 3: Uraian',
                        'instructions' => 'Jawablah pertanyaan dengan jelas dan teliti!',
                        'order' => 3,
                        'questions' => [
                            [
                                'order' => 1,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => '[Keterangan Gambar: Pensil Budi panjangnya 6 klip kertas, pensil Siti panjangnya 4 klip kertas]
Bandingkan panjang kedua pensil tersebut! Pensil siapakah yang lebih panjang?',
                                'explanation' => 'Pensil Budi (6 klip kertas) lebih panjang daripada pensil Siti (4 klip kertas).',
                            ],
                            [
                                'order' => 2,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => 'Sebutkan 2 contoh kegiatan sehari-hari yang membutuhkan waktu lama dan 2 kegiatan yang membutuhkan waktu sebentar!',
                                'explanation' => 'Waktu lama: tidur malam, belajar di sekolah. Waktu sebentar: minum air, bersin, mencuci tangan.',
                            ],
                        ],
                    ],
                ],
            ],
            [
                'title' => 'Quiz 3 Bab 7: Mengukur Panjang dan Waktu Non-Standar',
                'type' => 'ph',
                'duration_minutes' => 45,
                'description' => 'Kuis 3 Bab 7 Matematika Kelas 1 SD Kurikulum Merdeka: Mengukur panjang benda dengan satuan tidak baku (jengkal, langkah, klip kertas) dan membandingkan satuan waktu (lama vs sebentar).',
                'sections' => [
                    [
                        'title' => 'Bagian 1: Pilihan Ganda',
                        'instructions' => 'Pilihlah salah satu jawaban yang paling tepat (A, B, atau C)!',
                        'order' => 1,
                        'questions' => [
                            [
                                'order' => 1,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Dua buah pensil: pensil A panjang 15 cm dan pensil B panjang 8 cm]
Pensil A ... daripada pensil B.',
                                'explanation' => 'Pensil A lebih panjang dari pensil B.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'lebih panjang', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'lebih pendek', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'sama panjang', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Tangan terbuka mengukur meja dengan jengkal]
Alat ukur panjang tidak baku pada gambar adalah ....',
                                'explanation' => 'Mengukur dengan jari tangan terbuka adalah jengkal.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'jengkal', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'langkah', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'depa', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Tali merah 4 jengkal dan tali biru 7 jengkal]
Tali merah ... daripada tali biru.',
                                'explanation' => '4 jengkal lebih pendek dari 7 jengkal.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'lebih pendek', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'lebih panjang', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'sama panjang', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Mengukur panjang lapangan sekolah paling mudah menggunakan ....',
                                'explanation' => 'Lapangan luas diukur dengan langkah kaki.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'langkah kaki', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'jengkal tangan', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'klip kertas', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Pensil diukur panjangnya sejajar dengan 5 buah klip kertas]
Panjang pensil sama dengan ... klip kertas.',
                                'explanation' => 'Panjang pensil = 5 klip kertas.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '5', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '4', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '6', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Matahari baru terbit dan anak berangkat sekolah]
Kegiatan pada gambar dilakukan pada waktu ....',
                                'explanation' => 'Berangkat sekolah di pagi hari.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'pagi hari', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'malam hari', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'siang hari', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Bulan dan bintang di langit malam, anak tidur di kasur]
Kita tidur malam pada waktu ....',
                                'explanation' => 'Tidur malam dilakukan waktu malam hari.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'malam hari', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'siang hari', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'sore hari', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Kegiatan yang membutuhkan waktu lebih lama adalah ....',
                                'explanation' => 'Tidur malam butuh waktu beberapa jam (lama).',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'tidur malam', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'minum air', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'mencuci tangan', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Kegiatan berikut yang paling sebentar adalah ....',
                                'explanation' => 'Bersin berlangsung sangat sebentar.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'bersin', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'mandi', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'makan malam', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Makan siang dilakukan pada waktu ....',
                                'explanation' => 'Makan siang pada waktu siang hari.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'siang hari', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'pagi hari', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'malam hari', 'is_correct' => false],
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Bagian 2: Isian Singkat',
                        'instructions' => 'Isilah titik-titik dengan jawaban yang tepat!',
                        'order' => 2,
                        'questions' => [
                            [
                                'order' => 1,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Keterangan Gambar: Penggaris kayu diukur dengan jengkal]
Panjang penggaris ada 3 ... tangan.',
                                'explanation' => 'jengkal',
                            ],
                            [
                                'order' => 2,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Upacara bendera di sekolah dilakukan pada ... hari.',
                                'explanation' => 'pagi',
                            ],
                            [
                                'order' => 3,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Menonton film membutuhkan waktu lebih ... daripada mengedipkan mata.',
                                'explanation' => 'lama',
                            ],
                        ],
                    ],
                    [
                        'title' => 'Bagian 3: Uraian',
                        'instructions' => 'Jawablah pertanyaan dengan jelas dan teliti!',
                        'order' => 3,
                        'questions' => [
                            [
                                'order' => 1,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => '[Keterangan Gambar: Pensil Budi panjangnya 6 klip kertas, pensil Siti panjangnya 4 klip kertas]
Bandingkan panjang kedua pensil tersebut! Pensil siapakah yang lebih panjang?',
                                'explanation' => 'Pensil Budi (6 klip kertas) lebih panjang daripada pensil Siti (4 klip kertas).',
                            ],
                            [
                                'order' => 2,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => 'Sebutkan 2 contoh kegiatan sehari-hari yang membutuhkan waktu lama dan 2 kegiatan yang membutuhkan waktu sebentar!',
                                'explanation' => 'Waktu lama: tidur malam, belajar di sekolah. Waktu sebentar: minum air, bersin, mencuci tangan.',
                            ],
                        ],
                    ],
                ],
            ],
        ];
    }
}
