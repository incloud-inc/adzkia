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

class ShowcaseScoringAssessmentSeeder extends Seeder
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

        $subjectUmum = Subject::firstOrCreate(
            ['name' => 'Umum / Pengetahuan Umum'],
            ['code' => 'UMUM', 'description' => 'Mata uji kompetensi umum, penalaran, dan literasi terapan.']
        );

        $this->command->info('Memulai pembuatan 4 Asesmen Model Penilaian Unggulan SAAS (Untuk Demo / Showcase)...');

        DB::beginTransaction();

        try {
            $showcaseTitles = [
                'Demo Penilaian: Partial Credit (% Capaian Proporsional)',
                'Demo Penilaian: Rubrik Kriteria Terstruktur (Essay)',
                'Demo Penilaian: Penilaian Manual Guru (Ujian Praktik / Lisan)',
                'Demo Penilaian: Formula Pembobotan Bagian (PG 70% + Essay 30%)',
            ];

            $oldAssessments = Assessment::withoutGlobalScopes()->whereIn('title', $showcaseTitles)->get();
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
            // 1. ASESMEN: PARTIAL CREDIT (% CAPAIAN)
            // Multi-Answer, Menjodohkan, & Mengurutkan
            // =========================================================================
            $assPartial = Assessment::create([
                'tenant_id' => $tenant->id,
                'subject_id' => $subjectUmum->id,
                'created_by' => $user->id,
                'title' => 'Demo Penilaian: Partial Credit (% Capaian Proporsional)',
                'type' => 'custom',
                'grade_level' => 'Umum',
                'description' => 'Showcase keunggulan penilaian parsial: Siswa tetap memperoleh nilai proporsional (100%, 75%, 50%, 25%) berdasarkan butir jawaban yang benar pada soal Pilihan Ganda Kompleks, Menjodohkan, dan Mengurutkan.',
                'duration_minutes' => 10,
                'scoring_type' => 'partial',
                'status' => 'published',
                'price_type' => 'free',
                'price' => 0.00,
                'settings' => [
                    'token' => 'PRT'.rand(100, 999),
                    'validity_type' => 'forever',
                    'passing_grade' => ['enabled' => true, 'min_score' => 75],
                    'scoring_template' => 'partial',
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

            $secPartial = AssessmentSection::create([
                'assessment_id' => $assPartial->id,
                'title' => 'Bagian I: Soal Kompleks dengan Penilaian Parsial (Partial Credit)',
                'instructions' => 'Jawablah setiap butir soal berikut. Sistem secara cerdas memberikan nilai persentase capaian sesuai jumlah elemen jawaban yang tepat.',
                'order' => 1,
                'duration_minutes' => 10,
            ]);

            // Soal 1: Multi-Answer (PG Kompleks)
            $q1Partial = Question::create([
                'assessment_section_id' => $secPartial->id,
                'type' => 'mcq_multiple',
                'prompt' => 'Manakah di antara pilihan berikut yang termasuk ke dalam sumber energi baru dan terbarukan (EBT)? (Pilihlah semua yang benar)',
                'explanation' => 'Kunci: Energi Surya, Panas Bumi, dan Angin adalah EBT. Batubara adalah energi fosil. Skor parsial dihitung proporsional dari ketepatan opsi yang dicentang siswa.',
                'points' => 3.00,
                'order' => 1,
            ]);

            $q1Options = [
                ['label' => 'A', 'text' => 'Energi Surya (Sinar Matahari)', 'is_correct' => true, 'score' => 1.0],
                ['label' => 'B', 'text' => 'Energi Batubara Termal', 'is_correct' => false, 'score' => 0.0],
                ['label' => 'C', 'text' => 'Energi Panas Bumi (Geotermal)', 'is_correct' => true, 'score' => 1.0],
                ['label' => 'D', 'text' => 'Energi Bayu / Kincir Angin', 'is_correct' => true, 'score' => 1.0],
            ];
            foreach ($q1Options as $idx => $opt) {
                QuestionOption::create([
                    'question_id' => $q1Partial->id,
                    'label' => $opt['label'],
                    'option_text' => $opt['text'],
                    'is_correct' => $opt['is_correct'],
                    'score' => $opt['score'],
                    'order' => $idx + 1,
                ]);
            }

            // Soal 2: Menjodohkan (Matching Pairs)
            $q2Partial = Question::create([
                'assessment_section_id' => $secPartial->id,
                'type' => 'matching',
                'prompt' => 'Jodohkanlah nama ibu kota negara berikut dengan negaranya yang sesuai:',
                'explanation' => 'Setiap pasangan bernilai 1 poin (total 4 poin). Siswa mendapat skor parsial sesuai jumlah pasangan yang dijodohkan dengan tepat.',
                'points' => 4.00,
                'order' => 2,
            ]);

            $q2Pairs = [
                ['premis' => 'Indonesia', 'jawaban' => 'Nusantara / Jakarta'],
                ['premis' => 'Jepang', 'jawaban' => 'Tokyo'],
                ['premis' => 'Australia', 'jawaban' => 'Canberra'],
                ['premis' => 'Prancis', 'jawaban' => 'Paris'],
            ];
            foreach ($q2Pairs as $idx => $pair) {
                QuestionOption::create([
                    'question_id' => $q2Partial->id,
                    'label' => (string) ($idx + 1),
                    'option_text' => $pair['premis'],
                    'match_key' => $pair['jawaban'],
                    'is_correct' => true,
                    'score' => 1.00,
                    'order' => $idx + 1,
                ]);
            }

            // Soal 3: Mengurutkan (Sequencing)
            $q3Partial = Question::create([
                'assessment_section_id' => $secPartial->id,
                'type' => 'ordering',
                'prompt' => 'Urutkan tahapan pembuatan secangkir teh manis hangat dari langkah paling awal:',
                'explanation' => 'Urutan yang benar: 1) Rebus air, 2) Masukkan kantong teh ke cangkir, 3) Tuang air panas, 4) Tambahkan gula & aduk rata.',
                'points' => 4.00,
                'order' => 3,
            ]);

            $q3Steps = [
                'Rebus air bersih hingga mendidih.',
                'Siapkan cangkir dan masukkan kantong teh celup.',
                'Tuang air mendidih ke dalam cangkir hingga teh larut merata.',
                'Tambahkan gula secukupnya lalu aduk hingga larut sempurna.',
            ];
            foreach ($q3Steps as $idx => $step) {
                QuestionOption::create([
                    'question_id' => $q3Partial->id,
                    'label' => 'Langkah '.($idx + 1),
                    'option_text' => $step,
                    'is_correct' => true,
                    'score' => 1.00,
                    'order' => $idx + 1,
                ]);
            }

            // =========================================================================
            // 2. ASESMEN: PENILAIAN RUBRIK (KRITERIA) UNTUK ESSAY
            // =========================================================================
            $assRubric = Assessment::create([
                'tenant_id' => $tenant->id,
                'subject_id' => $subjectUmum->id,
                'created_by' => $user->id,
                'title' => 'Demo Penilaian: Rubrik Kriteria Terstruktur (Essay)',
                'type' => 'custom',
                'grade_level' => 'Umum',
                'description' => 'Showcase keunggulan koreksi essay berbasis rubrik analitik terstruktur: Guru menilai secara transparan berdasarkan 4 kriteria utama (Ketepatan Jawaban, Kelengkapan Fakta, Kekuatan Argumen, dan Kerapian Bahasa).',
                'duration_minutes' => 15,
                'scoring_type' => 'rubric',
                'status' => 'published',
                'price_type' => 'free',
                'price' => 0.00,
                'settings' => [
                    'token' => 'RBK'.rand(100, 999),
                    'validity_type' => 'forever',
                    'passing_grade' => ['enabled' => true, 'min_score' => 75],
                    'scoring_template' => 'rubric',
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

            $secRubric = AssessmentSection::create([
                'assessment_id' => $assRubric->id,
                'title' => 'Bagian I: Analisis Studi Kasus dengan Rubrik Penilaian',
                'instructions' => 'Tuliskan esai analisis Anda. Jawaban akan dievaluasi oleh dewan juri/guru menggunakan rubrik 4 kriteria terstandarisasi.',
                'order' => 1,
                'duration_minutes' => 15,
            ]);

            // Soal 1 Rubrik
            Question::create([
                'assessment_section_id' => $secRubric->id,
                'type' => 'essay',
                'prompt' => "Jelaskan langkah-langkah praktis pengelolaan sampah rumah tangga berprinsip 3R (*Reduce, Reuse, Recycle*) di lingkungan permukiman padat penduduk!\n\nUraikan contoh implementasi konkret serta solusi dalam mengajak warga sekitar berpartisipasi aktif.",
                'explanation' => 'Evaluasi guru menggunakan panduan rubrik terstruktur 4 kriteria dengan total nilai maksimum 100 poin.',
                'points' => 50.00,
                'order' => 1,
                'settings' => [
                    'rubric' => [
                        ['name' => '1. Ketepatan Konsep 3R', 'max_points' => 15, 'description' => 'Definisi dan penerapan Reduce, Reuse, Recycle dijelaskan secara tepat tanpa kekeliruan konsep.'],
                        ['name' => '2. Kelengkapan Contoh Konkret', 'max_points' => 15, 'description' => 'Menyertakan contoh nyata pemilahan sampah organik, anorganik, dan bank sampah di tingkat RT/RW.'],
                        ['name' => '3. Kekuatan Argumen & Solusi Partisipasi', 'max_points' => 10, 'description' => 'Gagasan persuasif mengajak warga didukung penalaran sosial yang logis dan solutif.'],
                        ['name' => '4. Tata Bahasa & Kerapian Struktur', 'max_points' => 10, 'description' => 'Penggunaan ejaan baku (PUEBI), kalimat efektif, dan alur penulisan yang runtut.'],
                    ],
                ],
            ]);

            // Soal 2 Rubrik
            Question::create([
                'assessment_section_id' => $secRubric->id,
                'type' => 'essay',
                'prompt' => "Mengapa literasi keuangan sejak dini sangat penting bagi generasi muda di era transaksi non-tunai (*cashless society*)?\n\nBerikan analisis risiko finansial jika tidak memiliki literasi keuangan serta strategi menabung yang disiplin.",
                'explanation' => 'Evaluasi komprehensif literasi finansial dengan bobot butir 50 poin berdasarkan kriteria rubrik.',
                'points' => 50.00,
                'order' => 2,
                'settings' => [
                    'rubric' => [
                        ['name' => '1. Ketepatan Analisis Finansial', 'max_points' => 15, 'description' => 'Pemahaman terhadap instrumen transaksi digital, kemudahan belanja impulsif, dan mitigasi utang.'],
                        ['name' => '2. Kelengkapan Fakta & Ilustrasi', 'max_points' => 15, 'description' => 'Mencantumkan data/contoh skema alokasi keuangan pribadi (misal formula 50/30/20).'],
                        ['name' => '3. Ketajaman Argumen & Rekomendasi', 'max_points' => 10, 'description' => 'Argumentasi persuasif tentang pentingnya dana darurat dan investasi yang sehat.'],
                        ['name' => '4. Tata Bahasa & Alur Logika', 'max_points' => 10, 'description' => 'Sistematika esai tertata rapi, kohesif, dan mudah dipahami.'],
                    ],
                ],
            ]);

            // =========================================================================
            // 3. ASESMEN: PENILAIAN MANUAL GURU (PRAKTIK / WAWANCARA / ESAI)
            // =========================================================================
            $assManual = Assessment::create([
                'tenant_id' => $tenant->id,
                'subject_id' => $subjectUmum->id,
                'created_by' => $user->id,
                'title' => 'Demo Penilaian: Penilaian Manual Guru (Ujian Praktik / Lisan)',
                'type' => 'custom',
                'grade_level' => 'Umum',
                'description' => 'Showcase fleksibilitas ujian penilaian manual: Nilai diinput langsung oleh guru atau penguji setelah memeriksa portofolio, demonstrasi praktik laboratorium, presentasi, atau wawancara langsung siswa.',
                'duration_minutes' => 15,
                'scoring_type' => 'manual',
                'status' => 'published',
                'price_type' => 'free',
                'price' => 0.00,
                'settings' => [
                    'token' => 'MNL'.rand(100, 999),
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

            $secManual = AssessmentSection::create([
                'assessment_id' => $assManual->id,
                'title' => 'Bagian I: Uji Praktik Komunikasi & Public Speaking (Koreksi Langsung Guru)',
                'instructions' => 'Siswa menampilkan presentasi singkat atau mengunggah rekaman praktik. Guru menginput nilai angka langsung (0 - 100) dan catatan evaluasi kualitatif.',
                'order' => 1,
                'duration_minutes' => 15,
            ]);

            Question::create([
                'assessment_section_id' => $secManual->id,
                'type' => 'essay',
                'prompt' => "Praktik Orasi / Pidato Singkat: Sampaikan gagasan inspiratif bertema 'Pemuda Penggerak Literasi Digital' dalam durasi 3 menit di hadapan penguji.\n\nTuliskan ringkasan materi pidato Anda di kolom jawaban ini sebelum memulai demonstrasi lisan.",
                'explanation' => 'Penguji menginput skor langsung pada sistem CBT berdasarkan intonasi suara, kontak mata, penguasaan panggung, dan resonansi pesan.',
                'points' => 50.00,
                'order' => 1,
            ]);

            Question::create([
                'assessment_section_id' => $secManual->id,
                'type' => 'essay',
                'prompt' => "Sesi Tanya Jawab (Q&A) Interaktif: Respons secara spontan 2 pertanyaan kritis dari dewan penguji terkait relevansi materi yang Anda presentasikan sebelumnya.\n\nTuliskan refleksi singkat hasil diskusi tanya jawab bersama penguji.",
                'explanation' => 'Skor diinput langsung oleh guru berdasarkan ketangkasan berpikir kritis dan kesantunan berbahasa.',
                'points' => 50.00,
                'order' => 2,
            ]);

            // =========================================================================
            // 4. ASESMEN: FORMULA PEMBOBOTAN BAGIAN (PG 70% + ESSAY 30% = 100%)
            // =========================================================================
            $assFormula = Assessment::create([
                'tenant_id' => $tenant->id,
                'subject_id' => $subjectUmum->id,
                'created_by' => $user->id,
                'title' => 'Demo Penilaian: Formula Pembobotan Bagian (PG 70% + Essay 30%)',
                'type' => 'custom',
                'grade_level' => 'Umum',
                'description' => 'Showcase formula perhitungan multi-section: Nilai akhir dikalkulasi secara otomatis dengan pembobotan persentase per bagian, yaitu Bagian I (Pilihan Ganda) berbobot 70% dan Bagian II (Essay Analitis) berbobot 30% hingga genap 100%.',
                'duration_minutes' => 20,
                'scoring_type' => 'formula',
                'status' => 'published',
                'price_type' => 'free',
                'price' => 0.00,
                'settings' => [
                    'token' => 'FML'.rand(100, 999),
                    'validity_type' => 'forever',
                    'passing_grade' => ['enabled' => true, 'min_score' => 75],
                    'scoring_template' => 'formula',
                    'formula_type' => 'weighted_percentage',
                    'section_weights' => [], // diisi dinamis setelah sections dibuat
                    'post_exam_policy' => [
                        'teacher_review_required' => true,
                        'show_breakdown' => true,
                        'show_ranking' => true,
                        'show_instant_score' => false,
                        'release_mode' => 'teacher_review',
                    ],
                ],
            ]);

            // Section 1: PG (Bobot 70%)
            $secPgFormula = AssessmentSection::create([
                'assessment_id' => $assFormula->id,
                'title' => 'Bagian I: Uji Pemahaman Teori (Pilihan Ganda - Bobot 70%)',
                'instructions' => 'Pilihlah salah satu jawaban yang paling tepat. Bagian ini berkontribusi sebesar 70% terhadap nilai akhir.',
                'order' => 1,
                'duration_minutes' => 10,
            ]);

            $formulaPgQuestions = [
                [
                    'prompt' => 'Apa tujuan utama dari proses penyaringan (filtrasi) pada pengolahan air bersih?',
                    'options' => [
                        ['label' => 'A', 'text' => 'Memisahkan partikel padat tersuspensi dari cairan air.', 'correct' => true],
                        ['label' => 'B', 'text' => 'Mengubah rasa air menjadi manis alami.', 'correct' => false],
                        ['label' => 'C', 'text' => 'Meningkatkan suhu air hingga titik didih.', 'correct' => false],
                        ['label' => 'D', 'text' => 'Mengikat gas oksigen agar air berkarbonasi.', 'correct' => false],
                    ],
                ],
                [
                    'prompt' => 'Salah satu ciri utama dari ekosistem hutan hujan tropis yang sehat adalah...',
                    'options' => [
                        ['label' => 'A', 'text' => 'Keanekaragaman hayati (biodiversitas) flora dan fauna yang sangat tinggi.', 'correct' => true],
                        ['label' => 'B', 'text' => 'Curah hujan yang sangat rendah sepanjang tahun.', 'correct' => false],
                        ['label' => 'C', 'text' => 'Didominasi oleh vegetasi semak gurun pasir.', 'correct' => false],
                        ['label' => 'D', 'text' => 'Hanya dihuni oleh satu spesies hewan herbivora.', 'correct' => false],
                    ],
                ],
            ];

            foreach ($formulaPgQuestions as $idx => $fq) {
                $q = Question::create([
                    'assessment_section_id' => $secPgFormula->id,
                    'type' => 'mcq_single',
                    'prompt' => $fq['prompt'],
                    'explanation' => 'Soal teori dasar pilihan ganda untuk menguji penguasaan materi konseptual.',
                    'points' => 1.00,
                    'order' => $idx + 1,
                ]);

                foreach ($fq['options'] as $oIdx => $opt) {
                    QuestionOption::create([
                        'question_id' => $q->id,
                        'label' => $opt['label'],
                        'option_text' => $opt['text'],
                        'is_correct' => $opt['correct'],
                        'score' => $opt['correct'] ? 1.00 : 0.00,
                        'order' => $oIdx + 1,
                    ]);
                }
            }

            // Section 2: Essay (Bobot 30%)
            $secEssayFormula = AssessmentSection::create([
                'assessment_id' => $assFormula->id,
                'title' => 'Bagian II: Aplikasi Gagasan Kontekstual (Essay - Bobot 30%)',
                'instructions' => 'Tuliskan uraian solusi nyata Anda. Bagian ini berkontribusi sebesar 30% terhadap nilai akhir.',
                'order' => 2,
                'duration_minutes' => 10,
            ]);

            Question::create([
                'assessment_section_id' => $secEssayFormula->id,
                'type' => 'essay',
                'prompt' => "Berdasarkan pemahaman teori pada Bagian I, rancanglah sebuah model filter air sederhana berbahan alami (seperti pasir, kerikil, arang aktif, dan ijuk) yang dapat diaplikasikan warga saat kondisi darurat pascabencana banjir!\n\nJelaskan fungsi spesifik arang aktif dalam model filter tersebut.",
                'explanation' => 'Rubrik Penilaian Essay (30% dari total nilai akhir): Kelayakan desain filter (15%) dan ketepatan penjelasan fungsi arang aktif sebagai adsorben bau dan zat organik (15%).',
                'points' => 10.00,
                'order' => 1,
            ]);

            // Set section weights in assessment settings (70% and 30%)
            $formulaSettings = $assFormula->settings;
            $formulaSettings['section_weights'] = [
                $secPgFormula->id => 70,
                $secEssayFormula->id => 30,
            ];
            $assFormula->update(['settings' => $formulaSettings]);

            DB::commit();
            $this->command->info('SUKSES! 4 Asesmen Model Penilaian Unggulan SAAS berhasil dibuat dan diterbitkan!');
        } catch (\Throwable $e) {
            DB::rollBack();
            $this->command->error('Terjadi error: '.$e->getMessage());
            throw $e;
        }
    }
}
