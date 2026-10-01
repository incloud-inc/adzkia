<?php

namespace Database\Seeders;

use App\Models\Assessment;
use App\Models\AssessmentSection;
use App\Models\Question;
use App\Models\QuestionOption;
use App\Models\Subject;
use App\Models\Tenant;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SpecializedAssessmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tenant = Tenant::first() ?? Tenant::create([
            'name' => 'KEMENTERIAN PENDIDIKAN',
            'subdomain' => 'kemendik',
            'plan' => 'gratis',
        ]);

        $user = User::first() ?? User::create([
            'name' => 'Administrator',
            'email' => 'admin@adzkia.id',
            'password' => bcrypt('Masuk123!'),
            'current_tenant_id' => $tenant->id,
        ]);

        // 1. Mata Pelajaran
        $subjectBind = Subject::firstOrCreate(
            ['name' => 'Bahasa Indonesia'],
            ['code' => 'BIND', 'description' => 'Mata pelajaran wajib tata bahasa, literasi, dan teks sastra.']
        );

        $subjectUmum = Subject::firstOrCreate(
            ['name' => 'Umum / Pengetahuan Umum'],
            ['code' => 'UMUM', 'description' => 'Mata uji kompetensi umum, penalaran, dan literasi terapan.']
        );

        $this->command->info('Memulai pembuatan 4 Asesmen Spesifik (Tingkat Umum)...');

        DB::beginTransaction();

        try {
            // Hapus asesmen serupa sebelumnya jika pernah dibuat
            $targetTitles = [
                'Ujian Pilihan Ganda Berbobot (Skala Likert / TKP) - Umum',
                'Ujian Tabel Dikotomi Komprehensif (9 Preset) - Umum',
                'Ujian Mengurutkan (Sequencing Logic) - Umum',
                'Ujian Essay & Analisis Mendalam (Penilaian Manual Guru) - Umum',
            ];

            $oldAssessments = Assessment::withoutGlobalScopes()->whereIn('title', $targetTitles)->get();
            foreach ($oldAssessments as $old) {
                foreach ($old->sections as $s) {
                    foreach ($s->questions as $q) {
                        $q->options()->delete();
                        $q->delete();
                    }
                    $s->delete();
                }
                $old->delete();
            }

            // =========================================================================
            // 1. ASESMEN: PILIHAN GANDA BERBOBOT (5 Soal, 5 Menit, Umum)
            // =========================================================================
            $assWeighted = Assessment::create([
                'tenant_id' => $tenant->id,
                'subject_id' => $subjectUmum->id,
                'created_by' => $user->id,
                'title' => 'Ujian Pilihan Ganda Berbobot (Skala Likert / TKP) - Umum',
                'type' => 'custom',
                'grade_level' => 'Umum',
                'description' => 'Uji kompetensi perilaku, profesionalisme, dan integritas menggunakan model penilaian pilihan ganda berskala skor bobot butir (1 sampai 5).',
                'duration_minutes' => 5,
                'scoring_type' => 'weighted',
                'status' => 'published',
                'price_type' => 'free',
                'price' => 0.00,
                'settings' => [
                    'token' => 'WGT'.rand(100, 999),
                    'validity_type' => 'forever',
                    'passing_grade' => ['enabled' => true, 'min_score' => 75],
                    'scoring_template' => 'weighted',
                    'formula_type' => 'raw_sum',
                    'post_exam_policy' => [
                        'teacher_review_required' => false,
                        'show_breakdown' => true,
                        'show_ranking' => true,
                        'show_instant_score' => true,
                        'release_mode' => 'immediate',
                    ],
                ],
            ]);

            $secWeighted = AssessmentSection::create([
                'assessment_id' => $assWeighted->id,
                'title' => 'Bagian I: Tes Karakteristik Pribadi & Kepemimpinan (Pilihan Ganda Berbobot)',
                'instructions' => 'Pilihlah opsi yang paling mencerminkan tindakan Anda. Setiap opsi memiliki skor bobot bertingkat 1 sampai 5 poin.',
                'order' => 1,
                'duration_minutes' => 5,
            ]);

            $weightedQuestions = [
                [
                    'prompt' => 'Ketika menghadapi tenggat waktu (deadline) proyek yang sangat mendesak sementara rekan tim Anda mengalami kendala teknis mendadak, tindakan Anda adalah...',
                    'options' => [
                        ['label' => 'A', 'text' => 'Mengidentifikasi akar masalah rekan tim dan memberikan asistensi terukur sembari menuntaskan porsi tugas utama saya.', 'score' => 5],
                        ['label' => 'B', 'text' => 'Mengkoordinasikan pembagian ulang beban kerja secara transparan kepada seluruh anggota tim yang lain.', 'score' => 4],
                        ['label' => 'C', 'text' => 'Fokus menyelesaikan tugas mandiri terlebih dahulu, baru kemudian menanyakan kondisi rekan tim.', 'score' => 3],
                        ['label' => 'D', 'text' => 'Melaporkan kendala rekan tim secara langsung kepada pimpinan agar segera dicarikan solusi.', 'score' => 2],
                        ['label' => 'E', 'text' => 'Meminta perpanjangan waktu pengumpulan proyek kepada pihak penyelenggara.', 'score' => 1],
                    ],
                ],
                [
                    'prompt' => 'Saat kebijakan baru di tempat kerja Anda diterapkan dan menuai resistensi dari sebagian staf senior, sikap Anda sebaiknya...',
                    'options' => [
                        ['label' => 'A', 'text' => 'Mempelajari dasar rasional kebijakan baru secara komprehensif dan menjadi jembatan edukatif persuasif antarstaf.', 'score' => 5],
                        ['label' => 'B', 'text' => 'Menjalankan kebijakan baru secara disiplin sembari memberikan masukan konstruktif pada sesi evaluasi.', 'score' => 4],
                        ['label' => 'C', 'text' => 'Menunggu instruksi resmi lebih lanjut sebelum memutuskan langkah adaptasi.', 'score' => 3],
                        ['label' => 'D', 'text' => 'Menampung keluhan staf senior tanpa mengambil tindakan yang memicu perdebatan.', 'score' => 2],
                        ['label' => 'E', 'text' => 'Menolak perubahan karena berpotensi menurunkan kenyamanan ritme kerja organisasi.', 'score' => 1],
                    ],
                ],
                [
                    'prompt' => 'Anda menemukan adanya celah (vulnerabilitas) administratif yang dapat menguntungkan divisi Anda namun berisiko merugikan tata kelola integritas organisasi...',
                    'options' => [
                        ['label' => 'A', 'text' => 'Menolak memanfaatkan celah tersebut dan segera menyusun usulan audit sistem perbaikan kepada manajemen.', 'score' => 5],
                        ['label' => 'B', 'text' => 'Mendiskusikan celah tersebut secara formal dengan penanggung jawab tata kelola kepatuhan.', 'score' => 4],
                        ['label' => 'C', 'text' => 'Mengabaikan celah tersebut dan tetap bekerja sesuai dengan prosedur operasional baku.', 'score' => 3],
                        ['label' => 'D', 'text' => 'Memanfaatkan celah secara terbatas hanya untuk kepentingan mendesak organisasi.', 'score' => 2],
                        ['label' => 'E', 'text' => 'Membiarkan celah tersebut dimanfaatkan karena dianggap sebagai peluang fleksibilitas divisi.', 'score' => 1],
                    ],
                ],
                [
                    'prompt' => 'Dalam suatu forum konsultasi publik, salah seorang peserta menyampaikan kritik yang sangat tajam dan bernada emosional terhadap hasil kerja tim Anda. Respons Anda adalah...',
                    'options' => [
                        ['label' => 'A', 'text' => 'Mendengarkan dengan tenang, mengapresiasi keberanian publik, serta mencatat substansi keluhan sebagai bahan evaluasi komprehensif.', 'score' => 5],
                        ['label' => 'B', 'text' => 'Memberikan klarifikasi berbasis data faktual secara santun setelah peserta selesai berbicara.', 'score' => 4],
                        ['label' => 'C', 'text' => 'Mencatat pokok permasalahan dan menjanjikan jawaban tertulis melalui kanal komunikasi resmi.', 'score' => 3],
                        ['label' => 'D', 'text' => 'Menyela pembicaraan secara langsung jika terdapat data keluhan yang dinilai keliru.', 'score' => 2],
                        ['label' => 'E', 'text' => 'Membiarkan moderator yang menangani kritik tersebut tanpa memberikan tanggapan.', 'score' => 1],
                    ],
                ],
                [
                    'prompt' => 'Organisasi Anda menuntut pemanfaatan teknologi kecerdasan buatan (AI) untuk otomasi alur kerja, padahal mayoritas staf belum memiliki literasi memadai. Langkah prioritas Anda...',
                    'options' => [
                        ['label' => 'A', 'text' => 'Menginisiasi sesi pendampingan sebaya (peer learning) dan panduan praktis implementasi etis AI yang mudah dipelajari.', 'score' => 5],
                        ['label' => 'B', 'text' => 'Mempelajari teknologi tersebut secara mandiri dan menerapkannya pada lingkup tugas pribadi sebagai percontohan.', 'score' => 4],
                        ['label' => 'C', 'text' => 'Mengusulkan penganggaran pelatihan profesional eksternal kepada pimpinan organisasi.', 'score' => 3],
                        ['label' => 'D', 'text' => 'Menunggu petunjuk teknis baku dari divisi teknologi informasi sebelum mencoba implementasi.', 'score' => 2],
                        ['label' => 'E', 'text' => 'Menyarankan penundaan pemanfaatan teknologi hingga seluruh staf benar-benar siap.', 'score' => 1],
                    ],
                ],
            ];

            foreach ($weightedQuestions as $qIdx => $wq) {
                $q = Question::create([
                    'assessment_section_id' => $secWeighted->id,
                    'type' => 'mcq_weighted',
                    'prompt' => $wq['prompt'],
                    'explanation' => 'Penilaian berbobot mengukur kematangan profesional, empati kepemimpinan, integritas, dan kapasitas problem solving.',
                    'points' => 5.00,
                    'order' => $qIdx + 1,
                ]);

                foreach ($wq['options'] as $oIdx => $opt) {
                    QuestionOption::create([
                        'question_id' => $q->id,
                        'label' => $opt['label'],
                        'option_text' => $opt['text'],
                        'score' => $opt['score'],
                        'is_correct' => ($opt['score'] === 5),
                        'order' => $oIdx + 1,
                    ]);
                }
            }

            // =========================================================================
            // 2. ASESMEN: TABEL DIKOTOMI (9 PRESET, MASING-MASING 2 SOAL = 18 SOAL)
            // =========================================================================
            $assBinary = Assessment::create([
                'tenant_id' => $tenant->id,
                'subject_id' => $subjectUmum->id,
                'created_by' => $user->id,
                'title' => 'Ujian Tabel Dikotomi Komprehensif (9 Preset) - Umum',
                'type' => 'custom',
                'grade_level' => 'Umum',
                'description' => 'Evaluasi logika dan penalaran dikotomis mencakup 9 variasi preset standar: Benar/Salah, Ya/Tidak, Sesuai/Tidak Sesuai, Mendukung/Tidak Mendukung, True/False, Similarity/Difference, Preparation/Break, Conversation/Relaxation, dan Fakta/Opini.',
                'duration_minutes' => 25,
                'scoring_type' => 'standard',
                'status' => 'published',
                'price_type' => 'free',
                'price' => 0.00,
                'settings' => [
                    'token' => 'BIN'.rand(100, 999),
                    'validity_type' => 'forever',
                    'passing_grade' => ['enabled' => true, 'min_score' => 75],
                    'scoring_template' => 'standard',
                    'formula_type' => 'raw_sum',
                    'post_exam_policy' => [
                        'teacher_review_required' => false,
                        'show_breakdown' => true,
                        'show_ranking' => true,
                        'show_instant_score' => true,
                        'release_mode' => 'immediate',
                    ],
                ],
            ]);

            $secBinary = AssessmentSection::create([
                'assessment_id' => $assBinary->id,
                'title' => 'Bagian I: Tabel Analisis Dikotomi Dinamis (18 Butir Soal)',
                'instructions' => 'Perhatikan label kolom pada masing-masing tabel dikotomi dan tentukan klasifikasi yang tepat untuk setiap baris pernyataan.',
                'order' => 1,
                'duration_minutes' => 25,
            ]);

            $binaryPresetDefinitions = [
                [
                    'labels' => ['Benar', 'Salah'],
                    'items' => [
                        [
                            'prompt' => 'Analisislah kebenaran dari pernyataan sains dasar berikut ini:',
                            'statements' => [
                                ['text' => 'Molekul air tersusun atas dua atom hidrogen dan satu atom oksigen ($H_2O$).', 'match' => 'Benar'],
                                ['text' => 'Matahari mengelilingi planet bumi dalam sistem tata surya heliosentris.', 'match' => 'Salah'],
                                ['text' => 'Kecepatan cahaya merambat lebih cepat daripada kecepatan rambat gelombang suara di atmosfer.', 'match' => 'Benar'],
                            ],
                        ],
                        [
                            'prompt' => 'Tentukan status validitas hukum fisika dan termodinamika di bawah ini:',
                            'statements' => [
                                ['text' => 'Energi dapat diciptakan dari ketiadaan dan dapat dimusnahkan secara mutlak.', 'match' => 'Salah'],
                                ['text' => 'Gaya gravitasi antara dua benda berbanding terbalik dengan kuadrat jarak keduanya.', 'match' => 'Benar'],
                                ['text' => 'Hukum aksi-reaksi Newton menyatakan bahwa gaya aksi selalu sebanding dan berlawanan arah dengan gaya reaksi.', 'match' => 'Benar'],
                            ],
                        ],
                    ],
                ],
                [
                    'labels' => ['Ya', 'Tidak'],
                    'items' => [
                        [
                            'prompt' => 'Apakah prosedur keselamatan kerja (K3) berikut wajib dipatuhi di lingkungan laboratorium kimia?',
                            'statements' => [
                                ['text' => 'Mengenakan kacamata pelindung goggle saat menuang asam pekat.', 'match' => 'Ya'],
                                ['text' => 'Menyimpan bahan kimia yang mudah terbakar tepat di samping api bunsen.', 'match' => 'Tidak'],
                                ['text' => 'Mencuci tangan dengan sabun dan air mengalir seusai praktikum.', 'match' => 'Ya'],
                            ],
                        ],
                        [
                            'prompt' => 'Apakah tindakan berikut termasuk dalam prinsip etika perlindungan data pribadi (privasi)?',
                            'statements' => [
                                ['text' => 'Membagikan kata sandi (password) perbankan kepada pihak yang mengaku petugas survei via telepon.', 'match' => 'Tidak'],
                                ['text' => 'Mengaktifkan otentikasi dua faktor (2FA) pada akun email utama.', 'match' => 'Ya'],
                                ['text' => 'Melakukan pembaruan rutin pada sistem operasi peranti lunak komputer.', 'match' => 'Ya'],
                            ],
                        ],
                    ],
                ],
                [
                    'labels' => ['Sesuai', 'Tidak Sesuai'],
                    'items' => [
                        [
                            'prompt' => 'Tentukan kesesuaian penulisan ejaan berikut dengan Pedoman Umum Ejaan Bahasa Indonesia (PUEBI):',
                            'statements' => [
                                ['text' => 'Penulisan kata "antarkota" dirangkai tanpa spasi.', 'match' => 'Sesuai'],
                                ['text' => 'Penulisan kata "pasca panen" dipisah menggunakan spasi tunggal.', 'match' => 'Tidak Sesuai'],
                                ['text' => 'Penulisan singkatan "a.n." untuk menyatakan "atas nama" menggunakan titik pada tiap huruf.', 'match' => 'Sesuai'],
                            ],
                        ],
                        [
                            'prompt' => 'Tentukan kesesuaian tata laksana penulisan karya ilmiah berikut:',
                            'statements' => [
                                ['text' => 'Mencantumkan seluruh sumber rujukan kutipan ke dalam daftar pustaka secara alfabetis.', 'match' => 'Sesuai'],
                                ['text' => 'Menyalin kalimat orang lain secara utuh tanpa menyertakan nama penulis aslinya.', 'match' => 'Tidak Sesuai'],
                                ['text' => 'Menyertakan rumusan masalah yang selaras dengan tujuan penelitian.', 'match' => 'Sesuai'],
                            ],
                        ],
                    ],
                ],
                [
                    'labels' => ['Mendukung', 'Tidak Mendukung'],
                    'items' => [
                        [
                            'prompt' => 'Evaluasi argumen berikut: "Apakah program reboisasi perkotaan berdampak positif pada penurunan polusi udara?"',
                            'statements' => [
                                ['text' => 'Pohon menyerap karbon dioksida dan melepaskan oksigen segar melalui fotosintesis.', 'match' => 'Mendukung'],
                                ['text' => 'Biaya perawatan taman kota membutuhkan alokasi anggaran daerah.', 'match' => 'Tidak Mendukung'],
                                ['text' => 'Kanopi dedaunan hijau mampu menjebak partikel debu mikro (PM 2.5).', 'match' => 'Mendukung'],
                            ],
                        ],
                        [
                            'prompt' => 'Evaluasi data berikut terhadap hipotesis: "Penerapan kendaraan listrik mengurangi ketergantungan bahan bakar fosil"',
                            'statements' => [
                                ['text' => 'Peningkatan rasio pemakaian energi baru dan terbarukan (EBT) pada pembangkit tenaga listrik.', 'match' => 'Mendukung'],
                                ['text' => 'Pembangkit listrik masih dominan membakar batu bara berkadar emisi tinggi.', 'match' => 'Tidak Mendukung'],
                                ['text' => 'Efisiensi konversi daya motor listrik mencapai lebih dari 85% dibanding mesin pembakaran dalam.', 'match' => 'Mendukung'],
                            ],
                        ],
                    ],
                ],
                [
                    'labels' => ['True', 'False'],
                    'items' => [
                        [
                            'prompt' => 'Evaluate the truth value of the following mathematical statements:',
                            'statements' => [
                                ['text' => 'The square root of 144 is 12 ($\sqrt{144} = 12$).', 'match' => 'True'],
                                ['text' => 'Zero is an odd prime number.', 'match' => 'False'],
                                ['text' => 'The sum of all internal angles in any euclidean triangle equals $180^\circ$.', 'match' => 'True'],
                            ],
                        ],
                        [
                            'prompt' => 'Verify the accuracy of the following fundamental computer science concepts:',
                            'statements' => [
                                ['text' => 'Binary number $1010_2$ is equal to decimal value $10_{10}$.', 'match' => 'True'],
                                ['text' => 'RAM (Random Access Memory) preserves its stored data when computer power is completely shut down.', 'match' => 'False'],
                                ['text' => 'Stack data structure operates on a Last-In, First-Out (LIFO) principle.', 'match' => 'True'],
                            ],
                        ],
                    ],
                ],
                [
                    'labels' => ['Similarity', 'Difference'],
                    'items' => [
                        [
                            'prompt' => 'Categorize whether the following comparative features between Plant Cells and Animal Cells represent a Similarity or Difference:',
                            'statements' => [
                                ['text' => 'Both cell types contain a defined nucleus enclosed by a nuclear membrane.', 'match' => 'Similarity'],
                                ['text' => 'Plant cells have a rigid cellulose cell wall, whereas animal cells do not.', 'match' => 'Difference'],
                                ['text' => 'Both cell types utilize mitochondria for cellular respiration to produce ATP.', 'match' => 'Similarity'],
                            ],
                        ],
                        [
                            'prompt' => 'Compare Relational Databases (SQL) and Document Databases (NoSQL):',
                            'statements' => [
                                ['text' => 'Both systems are engineered to store, retrieve, and manage digital persistent data.', 'match' => 'Similarity'],
                                ['text' => 'SQL mandates strict tabular schemas, whereas NoSQL allows dynamic schema flexibility.', 'match' => 'Difference'],
                                ['text' => 'Both systems provide indexing mechanisms to accelerate query response times.', 'match' => 'Similarity'],
                            ],
                        ],
                    ],
                ],
                [
                    'labels' => ['Preparation', 'Break'],
                    'items' => [
                        [
                            'prompt' => 'Classify the following routine activities of an athlete according to their primary training phase:',
                            'statements' => [
                                ['text' => 'Dynamic stretching, joint mobility drill, and light cardiovascular warm-up.', 'match' => 'Preparation'],
                                ['text' => 'Hydration session, static resting in a shaded lounge, and deep breathing interval.', 'match' => 'Break'],
                                ['text' => 'Inspecting track footwear grip and calibrating starting blocks.', 'match' => 'Preparation'],
                            ],
                        ],
                        [
                            'prompt' => 'Categorize the workflow tasks in an orchestral concert timetable:',
                            'statements' => [
                                ['text' => 'Tuning instruments to concert pitch A440 and reviewing score notations.', 'match' => 'Preparation'],
                                ['text' => 'Fifteen-minute intermission between symphonic movements for audience and musician rest.', 'match' => 'Break'],
                                ['text' => 'Soundcheck balance test with the audio engineering crew.', 'match' => 'Preparation'],
                            ],
                        ],
                    ],
                ],
                [
                    'labels' => ['Conversation', 'Relaxation'],
                    'items' => [
                        [
                            'prompt' => 'Distinguish the interpersonal dynamics and cognitive states in human social activities:',
                            'statements' => [
                                ['text' => 'Exchanging verbal perspectives and debating topic concepts during a roundtable discussion.', 'match' => 'Conversation'],
                                ['text' => 'Listening passively to soothing acoustic instrumental music with eyes closed in a quiet room.', 'match' => 'Relaxation'],
                                ['text' => 'Conducting an interview session with interactive question-and-answer dialogue.', 'match' => 'Conversation'],
                            ],
                        ],
                        [
                            'prompt' => 'Classify the following wellbeing activities conducted in an office workspace:',
                            'statements' => [
                                ['text' => 'Brainstorming project concepts while walking together around the campus quad.', 'match' => 'Conversation'],
                                ['text' => 'Ten-minute guided mindfulness meditation in the sensory decompression pod.', 'match' => 'Relaxation'],
                                ['text' => 'Engaging in an informal coffee chat regarding weekend personal hobbies.', 'match' => 'Conversation'],
                            ],
                        ],
                    ],
                ],
                [
                    'labels' => ['Fakta', 'Opini'],
                    'items' => [
                        [
                            'prompt' => 'Klasifikasikan pernyataan dalam wacana jurnalistik berikut ke dalam Fakta atau Opini:',
                            'statements' => [
                                ['text' => 'Candi Borobudur didirikan pada abad ke-8 masehi oleh wangsa Syailendra di Magelang, Jawa Tengah.', 'match' => 'Fakta'],
                                ['text' => 'Candi Borobudur adalah destinasi wisata paling mempesona dan tak tertandingi di benua Asia.', 'match' => 'Opini'],
                                ['text' => 'UNESCO secara resmi menetapkan Kompleks Candi Borobudur sebagai Situs Warisan Dunia pada tahun 1991.', 'match' => 'Fakta'],
                            ],
                        ],
                        [
                            'prompt' => 'Klasifikasikan butir kalimat dalam teks editorial ekonomi berikut:',
                            'statements' => [
                                ['text' => 'Bank Indonesia menaikkan suku bunga acuan BI-Rate sebesar 25 basis poin pada kuartal lalu.', 'match' => 'Fakta'],
                                ['text' => 'Kenaikan suku bunga acuan adalah kebijakan paling tepat dan brilian untuk menyelamatkan nilai tukar rupiah.', 'match' => 'Opini'],
                                ['text' => 'Tingkat inflasi tahunan (year-on-year) tercatat sebesar 2,8 persen pada periode bulan yang sama.', 'match' => 'Fakta'],
                            ],
                        ],
                    ],
                ],
            ];

            $totalBinQ = 1;
            foreach ($binaryPresetDefinitions as $preset) {
                foreach ($preset['items'] as $item) {
                    $q = Question::create([
                        'assessment_section_id' => $secBinary->id,
                        'type' => 'binary_matrix',
                        'prompt' => $item['prompt'],
                        'explanation' => "Preset Label: {$preset['labels'][0]} vs {$preset['labels'][1]}. Analisis didasarkan pada ketepatan data faktual dan kaidah logika.",
                        'points' => 1.00,
                        'settings' => ['labels' => $preset['labels']],
                        'order' => $totalBinQ,
                    ]);

                    foreach ($item['statements'] as $sIdx => $st) {
                        QuestionOption::create([
                            'question_id' => $q->id,
                            'label' => (string) ($sIdx + 1),
                            'option_text' => $st['text'],
                            'match_key' => $st['match'],
                            'is_correct' => true,
                            'score' => 1.00,
                            'order' => $sIdx + 1,
                        ]);
                    }

                    $totalBinQ++;
                }
            }

            // =========================================================================
            // 3. ASESMEN: MENGURUTKAN / SEQUENCING (5 Soal, 15 Menit, Umum)
            // =========================================================================
            $assOrdering = Assessment::create([
                'tenant_id' => $tenant->id,
                'subject_id' => $subjectUmum->id,
                'created_by' => $user->id,
                'title' => 'Ujian Mengurutkan (Sequencing Logic) - Umum',
                'type' => 'custom',
                'grade_level' => 'Umum',
                'description' => 'Asesmen kemampuan penalaran prosedural, kronologi sejarah, metode ilmiah, dan algoritma alur kerja.',
                'duration_minutes' => 15,
                'scoring_type' => 'standard',
                'status' => 'published',
                'price_type' => 'free',
                'price' => 0.00,
                'settings' => [
                    'token' => 'ORD'.rand(100, 999),
                    'validity_type' => 'forever',
                    'passing_grade' => ['enabled' => true, 'min_score' => 75],
                    'scoring_template' => 'standard',
                    'formula_type' => 'raw_sum',
                    'post_exam_policy' => [
                        'teacher_review_required' => false,
                        'show_breakdown' => true,
                        'show_ranking' => true,
                        'show_instant_score' => true,
                        'release_mode' => 'immediate',
                    ],
                ],
            ]);

            $secOrdering = AssessmentSection::create([
                'assessment_id' => $assOrdering->id,
                'title' => 'Bagian I: Pengurutan Kronologis & Algoritma Prosedur (5 Soal)',
                'instructions' => 'Susunlah tahapan-tahapan berikut ke dalam urutan yang logis dan benar dari tahap awal hingga tahap akhir.',
                'order' => 1,
                'duration_minutes' => 15,
            ]);

            $orderingQuestions = [
                [
                    'prompt' => 'Urutkan tahapan metode ilmiah dalam penelitian sains dari awal hingga akhir!',
                    'steps' => [
                        'Merumuskan masalah atau pertanyaan penelitian berdasarkan observasi fenomena.',
                        'Menyusun kerangka teori dan merumuskan hipotesis yang dapat diuji.',
                        'Merancang dan melaksanakan eksperimen untuk mengumpulkan data empiris.',
                        'Menganalisis data hasil eksperimen secara kuantitatif maupun kualitatif.',
                        'Menarik kesimpulan serta mempublikasikan laporan hasil penelitian.',
                    ],
                ],
                [
                    'prompt' => 'Urutkan siklus daur air (hidrologi) di bumi secara berkesinambungan:',
                    'steps' => [
                        'Evaporasi dan transpirasi: Penguapan air dari permukaan laut dan tumbuhan akibat panas matahari.',
                        'Kondensasi: Uap air mengalami pendinginan dan membentuk partikel awan di atmosfer.',
                        'Presipitasi: Butiran air jatuh kembali ke permukaan bumi dalam bentuk hujan atau salju.',
                        'Infiltrasi dan perkolasi: Penyerapan air ke dalam lapisan tanah menjadi air tanah.',
                        'Limpasan permukaan (surface runoff): Air mengalir melalui sungai menuju kembali ke lautan.',
                    ],
                ],
                [
                    'prompt' => 'Urutkan siklus hidup pengembangan perangkat lunak (Software Development Life Cycle - SDLC):',
                    'steps' => [
                        'Analisis kebutuhan pengguna dan studi kelayakan sistem (Requirement Analysis).',
                        'Perancangan arsitektur peranti lunak dan desain UI/UX antarmuka (System Design).',
                        'Implementasi penulisan kode sumber aplikasi (Implementation / Coding).',
                        'Pengujian fungsionalitas, performa, dan keamanan sistem (Software Testing / QA).',
                        'Penyebaran sistem ke lingkungan produksi dan pemeliharaan berkala (Deployment & Maintenance).',
                    ],
                ],
                [
                    'prompt' => 'Urutkan kronologi peristiwa bersejarah Proklamasi Kemerdekaan Indonesia pada Agustus 1945:',
                    'steps' => [
                        'Jepang menyerah tanpa syarat kepada Sekutu setelah pengeboman Hiroshima dan Nagasaki.',
                        'Peristiwa Rengasdengklok: Golongan muda mengamankan Soekarno dan Hatta ke Karawang.',
                        'Perumusan naskah teks proklamasi di kediaman Laksamana Tadashi Maeda di Jakarta.',
                        'Pengetikan naskah otentik proklamasi oleh Sayuti Melik dengan penandatanganan Soekarno-Hatta.',
                        'Pembacaan teks Proklamasi Kemerdekaan di Jalan Pegangsaan Timur No. 56 pada 17 Agustus 1945.',
                    ],
                ],
                [
                    'prompt' => 'Urutkan prosedur pertolongan pertama (Bantuan Hidup Dasar - BHD) saat menemukan korban henti napas mendadak:',
                    'steps' => [
                        'Pastikan keamanan diri, keamanan lingkungan sekitar, dan keamanan korban (3A).',
                        'Periksa respons kesadaran korban dengan menepuk bahu dan memanggil nama.',
                        'Hubungi layanan darurat medis (call for help) atau minta bantuan orang di sekitar.',
                        'Periksa ada tidaknya denyut nadi karotis dan hembusan napas normal korban.',
                        'Lakukan kompresi dada berkualitas tinggi (CPR) secara berkelanjutan hingga tim medis tiba.',
                    ],
                ],
            ];

            foreach ($orderingQuestions as $qIdx => $oq) {
                $q = Question::create([
                    'assessment_section_id' => $secOrdering->id,
                    'type' => 'ordering',
                    'prompt' => $oq['prompt'],
                    'explanation' => 'Urutan kunci dinilai berdasarkan alur kronologis kausalitas dan metodologi terstandar.',
                    'points' => 2.00,
                    'order' => $qIdx + 1,
                ]);

                foreach ($oq['steps'] as $sIdx => $stepText) {
                    QuestionOption::create([
                        'question_id' => $q->id,
                        'label' => 'Langkah '.($sIdx + 1),
                        'option_text' => $stepText,
                        'is_correct' => true,
                        'score' => 1.00,
                        'order' => $sIdx + 1,
                    ]);
                }
            }

            // =========================================================================
            // 4. ASESMEN: ESSAY DENGAN PENILAIAN MANUAL GURU (5 Soal, 30 Menit, Umum)
            // =========================================================================
            $assEssay = Assessment::create([
                'tenant_id' => $tenant->id,
                'subject_id' => $subjectUmum->id,
                'created_by' => $user->id,
                'title' => 'Ujian Essay & Analisis Mendalam (Penilaian Manual Guru) - Umum',
                'type' => 'custom',
                'grade_level' => 'Umum',
                'description' => 'Evaluasi penalaran kritis, argumentasi komprehensif, dan kecakapan sintesis gagasan. Hasil pengerjaan memerlukan verifikasi dan penilaian manual oleh guru / penguji.',
                'duration_minutes' => 30,
                'scoring_type' => 'manual',
                'status' => 'published',
                'price_type' => 'free',
                'price' => 0.00,
                'settings' => [
                    'token' => 'ESY'.rand(100, 999),
                    'validity_type' => 'forever',
                    'passing_grade' => ['enabled' => true, 'min_score' => 75],
                    'scoring_template' => 'manual',
                    'formula_type' => 'raw_sum',
                    'post_exam_policy' => [
                        'teacher_review_required' => true,
                        'show_breakdown' => true,
                        'show_ranking' => false,
                        'show_instant_score' => false,
                        'release_mode' => 'teacher_review',
                    ],
                ],
            ]);

            $secEssay = AssessmentSection::create([
                'assessment_id' => $assEssay->id,
                'title' => 'Bagian I: Uraian Bebas & Studi Kasus Analitis (5 Soal Essay)',
                'instructions' => 'Tuliskan jawaban Anda secara rinci, logis, dan argumentatif. Penilaian butir soal ini dilakukan melalui pemeriksaan manual oleh guru berdasarkan rubrik kedalaman materi.',
                'order' => 1,
                'duration_minutes' => 30,
            ]);

            $essayQuestions = [
                [
                    'prompt' => "Jelaskan secara komprehensif dampak disrupsi teknologi kecerdasan buatan (*Artificial Intelligence*) terhadap etika ketenagakerjaan di Indonesia!\n\nSertakan analisis mengenai potensi pergeseran lapangan kerja, tanggung jawab korporasi dalam reskilling karyawan, serta rekomendasi kebijakan afirmatif pemerintah.",
                    'explanation' => 'Rubrik Penilaian: Pemahaman konsep AI (25%), analisis dampak sosiologis (25%), elaborasi solusi etis ketenagakerjaan (25%), dan kejelasan struktur bahasa (25%).',
                    'points' => 20.00,
                ],
                [
                    'prompt' => "Dalam konteks mitigasi krisis iklim global, transisi energi dari bahan bakar fosil menuju energi baru dan terbarukan (EBT) menghadapi dilema 'trilema energi': ketahanan (*security*), keterjangkauan (*affordability*), dan keberlanjutan (*sustainability*).\n\nBagaimana strategi negara berkembang seperti Indonesia dalam menyeimbangkan ketiga aspek tersebut tanpa membebani daya beli masyarakat berpenghasilan rendah?",
                    'explanation' => 'Rubrik Penilaian: Identifikasi trilema energi (25%), kontekstualisasi tantangan Indonesia (25%), strategi fiskal dan subsidi terarah (25%), dan kelayakan implementasi (25%).',
                    'points' => 20.00,
                ],
                [
                    'prompt' => 'Bahasa Indonesia diproyeksikan sebagai bahasa internasional dan telah resmi diakui dalam Sidang Umum UNESCO. Jelaskan strategi diplomasi kebahasaan yang efektif untuk memperluas penutur Bahasa Indonesia bagi Penutur Asing (BIPA) di ranah akademik global dan industri digital!',
                    'explanation' => 'Rubrik Penilaian: Analisis posisi BIPA saat ini (25%), inovasi digitalisasi materi kebahasaan (25%), diplomasi multinasional (25%), dan kesimpulan logis (25%).',
                    'points' => 20.00,
                ],
                [
                    'prompt' => "Perhatikan fenomena merebaknya polarisasi opini dan penyebaran berita bohong (*hoaks*) di ruang media sosial.\n\nRancanglah sebuah kerangka model pembelajaran literasi digital kritis yang dapat diterapkan pada institusi pendidikan guna membentuk imunitas intelektual generasi muda terhadap manipulasi informasi!",
                    'explanation' => 'Rubrik Penilaian: Identifikasi faktor disinformasi (25%), rancangan kerangka kurikuler literasi (30%), metode evaluasi kemampuan verifikasi siswa (25%), dan sistematika penulisan (20%).',
                    'points' => 20.00,
                ],
                [
                    'prompt' => 'Ketahanan pangan nasional kerap bertumpu pada komoditas beras monokultur. Uraikan urgensi diversifikasi pangan berbasis pangan lokal nusantara (seperti sagu, singkong, sorgum, dan jagung) dari perspektif kesehatan metabolik dan adaptasi perubahan iklim!',
                    'explanation' => 'Rubrik Penilaian: Analisis kelemahan monokultur beras (25%), pemaparan nilai nutrisi pangan lokal (25%), strategi ketahanan ekologis (25%), dan rekomendasi intervensi pasar (25%).',
                    'points' => 20.00,
                ],
            ];

            foreach ($essayQuestions as $qIdx => $eq) {
                Question::create([
                    'assessment_section_id' => $secEssay->id,
                    'type' => 'essay',
                    'prompt' => $eq['prompt'],
                    'explanation' => $eq['explanation'],
                    'points' => $eq['points'],
                    'order' => $qIdx + 1,
                ]);
            }

            DB::commit();
            $this->command->info('SUKSES! 4 Asesmen Spesifik Umum (Berbobot, 9 Preset Dikotomi, Mengurutkan, dan Essay Manual) berhasil dibuat dan dipublish!');
        } catch (\Throwable $e) {
            DB::rollBack();
            $this->command->error('Terjadi kesalahan: '.$e->getMessage());
            throw $e;
        }
    }
}
