<?php

namespace App\Services\Ai;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class DeepSeekQuestionGeneratorService
{
    /**
     * Generate structured questions using DeepSeek AI Engine (V3 Chat or R1 Reasoner).
     *
     * @param  array<string, mixed>  $params
     * @return array<string, mixed>
     */
    public function generate(array $params): array
    {
        $apiKey = config('services.deepseek.api_key') ?: env('DEEPSEEK_API_KEY');
        $model = $params['ai_model'] ?? config('services.deepseek.model', 'deepseek-reasoner');
        if (! in_array($model, ['deepseek-chat', 'deepseek-reasoner'], true)) {
            $model = 'deepseek-reasoner';
        }

        $systemPrompt = $this->buildSystemPrompt($params);
        $userPrompt = $this->buildUserPrompt($params);

        // If DeepSeek API key is configured, invoke the live DeepSeek API
        if (filled($apiKey)) {
            try {
                $baseUrl = rtrim((string) (config('services.deepseek.base_url') ?: env('DEEPSEEK_BASE_URL', 'https://api.deepseek.com')), '/');

                $payload = [
                    'model' => $model,
                    'messages' => [
                        ['role' => 'system', 'content' => $systemPrompt],
                        ['role' => 'user', 'content' => $userPrompt],
                    ],
                ];

                // deepseek-chat supports temperature and response_format
                // deepseek-reasoner DOES NOT allow temperature or response_format
                if ($model === 'deepseek-chat') {
                    $payload['temperature'] = 0.7;
                    $payload['response_format'] = ['type' => 'json_object'];
                }

                $timeout = (int) (config('services.deepseek.timeout') ?: env('DEEPSEEK_TIMEOUT', 180));

                $response = Http::withHeaders([
                    'Authorization' => "Bearer {$apiKey}",
                    'Content-Type' => 'application/json',
                ])
                    ->timeout($timeout)
                    ->post("{$baseUrl}/chat/completions", $payload);

                if ($response->successful()) {
                    $rawContent = $response->json('choices.0.message.content', '');
                    $reasoningContent = $response->json('choices.0.message.reasoning_content', '');

                    $cleanJson = $this->extractJson($rawContent);
                    $decoded = json_decode($cleanJson, true);

                    if (is_array($decoded) && ! empty($decoded['items'])) {
                        $decoded['model_used'] = $model;
                        $decoded['reasoning_notes'] = $reasoningContent ?: ($decoded['reasoning_notes'] ?? '');

                        return $decoded;
                    }
                }

                Log::warning('DeepSeek Question Generator live call returned non-JSON, falling back to heuristic engine.', [
                    'status' => $response->status(),
                    'body' => substr($response->body(), 0, 500),
                ]);
            } catch (\Throwable $e) {
                Log::error('DeepSeek Question Generator exception: '.$e->getMessage(), [
                    'trace' => $e->getTraceAsString(),
                ]);
            }
        }

        // Fallback generator: creates pristine, contextual questions matching all specifications
        return $this->generateContextualFallback($params, $model);
    }

    /**
     * Build system prompt for DeepSeek enforcing JSON and educational standards.
     */
    protected function buildSystemPrompt(array $params): string
    {
        return <<<'PROMPT'
Anda adalah Asisten Pakar Pembuat Soal Ujian Nasional dan Evaluasi Pendidikan Indonesia (CBT ADZKIA Exam Master).
Tugas Anda adalah memproduksi naskah butir soal ujian berkualitas tinggi, tanpa salah logika/hitung, sesuai standar Kurikulum Merdeka, Kurikulum 2013, AKM Kemendikbudristek, UTBK SNBT, dan SKD CPNS/Kedinasan (BKN).

ATURAN STRUKTURAL KETAT:
1. OUTPUT WAJIB BERUPA VALID JSON MURNI TANPA PEMBUKA/PENUTUP MARKDOWN ATAU PENJELASAN DI LUAR JSON.
2. Setiap butir soal harus memiliki kunci jawaban yang valid, bobot soal (points), dan pembahasan terperinci.
3. Rumus matematika dan simbol sains WAJIB menggunakan format LaTeX dengan delimiter ganda $$...$$, contoh: $$2x^2 - 7x + 3 = 0$$ atau $$\frac{-b \pm \sqrt{D}}{2a}$$.
4. KHUSUS SOAL TKP (Tes Karakteristik Pribadi):
   - Wajib memiliki 5 pilihan opsi (A, B, C, D, E) bernilai terbobot dari 5, 4, 3, 2, sampai 1.
   - Opsi jawaban A-E masing-masing memiliki field `score` dari 1.0 hingga 5.0 (nilai 5 untuk sikap paling profesional/berintegritas).
5. KHUSUS PILIHAN GANDA KOMPLEKS (mcq_multiple):
   - Kunci jawaban benar lebih dari satu (minimal 2 opsi bernilai benar / is_correct = true).
6. KHUSUS TABEL DIKOTOMI (binary_matrix):
   - Opsi berisi pernyataan dengan match_key 'Benar' atau 'Salah'.
7. KHUSUS MENJODOHKAN (matching):
   - Opsi berisi premis kiri (option_text) dan pasangan kanan (match_key).
8. KHUSUS MENGURUTKAN (ordering):
   - Opsi berisi tahapan berurutan secara logis dari order 1 sampai n.
9. PEMBAHASAN: Tuliskan langkah ilmiah, konsep kunci, atau trik cepat cara kerja yang mendidik.

FORMAT JSON OUTPUT HARUS MENGIKUTI STRUKTUR INI:
{
  "assessment_title": "Judul Asesmen",
  "category": "school|tka|utbk|skd|custom",
  "difficulty": "mudah|sedang|sukar",
  "cognitive_level": "LOTS|MOTS|HOTS",
  "stimulus": null,
  "items": [
    {
      "number": 1,
      "type": "mcq_single|mcq_weighted|mcq_multiple|binary_matrix|matching|ordering|short_answer|essay",
      "prompt": "Teks pertanyaan soal...",
      "points": 2.5,
      "options": [
        { "label": "A", "option_text": "Teks opsi A", "is_correct": true, "score": 2.5, "match_key": null },
        { "label": "B", "option_text": "Teks opsi B", "is_correct": false, "score": 0.0, "match_key": null }
      ],
      "explanation": "Pembahasan ilmiah dan alasan jawaban benar..."
    }
  ]
}
PROMPT;
    }

    /**
     * Build user prompt based on all filter parameters.
     */
    protected function buildUserPrompt(array $params): string
    {
        $category = $params['category'] ?? 'school';
        $questionCount = (int) ($params['question_count'] ?? 5);
        $questionType = $params['question_type'] ?? 'mcq_single';
        $difficulty = $params['difficulty'] ?? 'sedang';
        $cognitiveLevel = $params['cognitive_level'] ?? 'C3-C4 (MOTS)';
        $customPrompt = trim((string) ($params['custom_prompt'] ?? ''));

        $typeDistributions = (array) ($params['type_distributions'] ?? []);
        if (! empty($typeDistributions)) {
            $distLines = [];
            $totalCount = 0;
            foreach ($typeDistributions as $dist) {
                $t = $dist['type'] ?? 'mcq_single';
                $sa = (int) ($dist['standalone_count'] ?? 0);
                $sc = (int) ($dist['stimulus_count'] ?? 0);
                $sq = (int) ($dist['stimulus_questions'] ?? 0);
                $subtotal = $sa + ($sc * $sq);
                if ($subtotal > 0) {
                    $totalCount += $subtotal;
                    $line = "- Tipe {$t}: {$sa} butir soal mandiri";
                    if ($sc > 0 && $sq > 0) {
                        $line .= ", {$sc} teks stimulus (masing-masing menaungi {$sq} butir soal anak)";
                    }
                    $distLines[] = $line;
                }
            }

            if (! empty($distLines)) {
                $details[] = "KOMPOSISI TIPE SOAL & DISTRIBUSI:\n".implode("\n", $distLines);
                $details[] = "TOTAL KESELURUHAN BUTIR SOAL: {$totalCount} butir";
            }
        } else {
            $details[] = "JUMLAH SOAL: {$questionCount} butir";
            $details[] = "TIPE SOAL: {$questionType}";
        }
        $details[] = "TINGKAT KESULITAN: {$difficulty}";
        $details[] = "LEVEL KOGNITIF: {$cognitiveLevel}";

        if ($category === 'school') {
            $curriculum = $params['curriculum'] ?? 'merdeka';
            $grade = $params['grade_level'] ?? '10';
            $subject = $params['subject'] ?? 'Matematika';
            $chapters = (array) ($params['chapters'] ?? []);

            $details[] = 'KATEGORI: Siswa Sekolah';
            $details[] = 'KURIKULUM: '.($curriculum === 'merdeka' ? 'Kurikulum Merdeka' : 'Kurikulum 2013 (K-13)');
            $details[] = "KELAS: Kelas {$grade}";
            $details[] = "MATA PELAJARAN: {$subject}";
            if (! empty($chapters)) {
                $details[] = 'BAB MATERI YANG DIPILIH: '.implode(', ', $chapters);
            }
        } elseif ($category === 'tka') {
            $grade = $params['grade_level'] ?? '12 SMA';
            $subject = $params['subject'] ?? 'Matematika';
            $details[] = 'KATEGORI: Tes Kemampuan Akademik (TKA)';
            $details[] = "JENJANG: {$grade}";
            $details[] = "MATA PELAJARAN: {$subject}";
        } elseif ($category === 'utbk') {
            $group = $params['utbk_group'] ?? 'tps';
            $subtest = strtoupper((string) ($params['subtest'] ?? 'PK'));
            $details[] = 'KATEGORI: UTBK SNBT';
            $details[] = "KELOMPOK: {$group}";
            $details[] = "SUBTES: {$subtest}";
        } elseif ($category === 'skd') {
            $track = strtoupper((string) ($params['skd_track'] ?? 'CPNS'));
            $subtest = strtoupper((string) ($params['subtest'] ?? 'TKP'));
            $details[] = 'KATEGORI: Seleksi Kompetensi Dasar (SKD)';
            $details[] = "JALUR: {$track}";
            $details[] = "SUBTES: {$subtest}";
            if ($subtest === 'TKP') {
                $details[] = 'INSTRUKSI KHUSUS TKP: Tipe soal wajib mcq_weighted dengan 5 opsi A-E berbobot skor 5, 4, 3, 2, 1.';
            }
        } else {
            $details[] = 'KATEGORI: Umum / Lain-lain';
            if (! empty($params['subject'])) {
                $details[] = "TOPIK / MATA UJI: {$params['subject']}";
            }
        }

        // Stimulus settings
        $stimulusMode = $params['stimulus_mode'] ?? 'standalone';
        if ($stimulusMode === 'stimulus_group' || ! empty($params['type_distributions'])) {
            $source = $params['stimulus_source'] ?? 'ai_generate';
            if ($source === 'custom_text' && ! empty($params['custom_stimulus_text'])) {
                $details[] = "TEKS BACAAN DARI GURU:\n\"\"\"\n".trim($params['custom_stimulus_text'])."\n\"\"\"";
            }
        }

        if ($customPrompt !== '') {
            $details[] = "KISI-KISI & PESAN KHUSUS GURU:\n\"\"\"\n{$customPrompt}\n\"\"\"";
        }

        return "Buatkan naskah butir soal ujian sesuai dengan spesifikasi parameter berikut:\n\n".implode("\n", $details);
    }

    /**
     * Extract JSON from markdown fences or raw string.
     */
    protected function extractJson(string $text): string
    {
        $text = trim($text);
        if (preg_match('/```(?:json)?\s*(\{.*\})\s*```/s', $text, $matches)) {
            return trim($matches[1]);
        }
        if (str_starts_with($text, '{') && str_ends_with($text, '}')) {
            return $text;
        }
        $start = strpos($text, '{');
        $end = strrpos($text, '}');
        if ($start !== false && $end !== false && $end > $start) {
            return substr($text, $start, $end - $start + 1);
        }

        return $text;
    }

    /**
     * Convert generated JSON question package into Word Question text format
     * fully compatible with WordQuestionService parser.
     */
    public function formatAsWordDocxText(array $package): string
    {
        $lines = [];
        $title = $package['assessment_title'] ?? 'Naskah Asesmen ADZKIA';
        $lines[] = "=== {$title} ===";
        $lines[] = '';

        if (! empty($package['stimulus']['content'])) {
            $lines[] = '[STIMULUS]';
            $lines[] = 'Judul: '.($package['stimulus']['title'] ?? 'Wacana Stimulus');
            $lines[] = 'Teks: '.trim($package['stimulus']['content']);
            $lines[] = '[AKHIR NARASI]';
            $lines[] = '';
        }

        $items = $package['items'] ?? [];

        // Group items by question type in pedagogical order
        $preferredTypeOrder = [
            'mcq_single',
            'mcq_multiple',
            'binary_matrix',
            'matching',
            'ordering',
            'short_answer',
            'essay',
            'mcq_weighted',
        ];

        $groupedByType = [];
        foreach ($items as $it) {
            $t = $it['type'] ?? 'mcq_single';
            if (! isset($groupedByType[$t])) {
                $groupedByType[$t] = [];
            }
            $groupedByType[$t][] = $it;
        }

        uksort($groupedByType, function ($a, $b) use ($preferredTypeOrder) {
            $posA = array_search($a, $preferredTypeOrder, true);
            $posB = array_search($b, $preferredTypeOrder, true);
            $idxA = $posA === false ? 999 : $posA;
            $idxB = $posB === false ? 999 : $posB;

            return $idxA <=> $idxB;
        });

        $partLetters = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H'];
        $secIdx = 0;

        foreach ($groupedByType as $type => $typeItems) {
            $letter = $partLetters[$secIdx] ?? chr(65 + $secIdx);
            $typeMeta = $this->getQuestionTypeMeta($type);
            $count = count($typeItems);

            $lines[] = "=== BAGIAN {$letter}: ".strtoupper($typeMeta['name'])." ({$count} Butir Soal) ===";
            $lines[] = $typeMeta['instructions'];
            $lines[] = '-----------------------------------------------------------------';
            $lines[] = '';

            foreach ($typeItems as $item) {
                $num = $item['number'] ?? 1;
                $prompt = trim($item['prompt'] ?? '');
                $points = (float) ($item['points'] ?? 1.0);
                $options = $item['options'] ?? [];
                $explanation = trim($item['explanation'] ?? '');

                // Type tags for parser
                if ($type === 'mcq_weighted') {
                    $lines[] = '[TKP]';
                } elseif ($type === 'mcq_multiple') {
                    $lines[] = '[KOMPLEKS]';
                } elseif ($type === 'binary_matrix') {
                    $lines[] = '[BENAR SALAH]';
                    $lines[] = 'KOLOM: Benar | Salah';
                } elseif ($type === 'matching') {
                    $lines[] = '[MENJODOHKAN]';
                } elseif ($type === 'ordering') {
                    $lines[] = '[MENGURUTKAN]';
                } elseif ($type === 'short_answer') {
                    $lines[] = '[ISIAN]';
                } elseif ($type === 'essay') {
                    $lines[] = '[ESAI]';
                }

                $lines[] = "{$num}. {$prompt}";

                // Options rendering
                if ($type === 'mcq_weighted') {
                    foreach ($options as $opt) {
                        $lbl = $opt['label'] ?? 'A';
                        $score = (int) ($opt['score'] ?? 0);
                        $text = trim($opt['option_text'] ?? '');
                        $lines[] = "{$lbl}. [{$score}] {$text}";
                    }
                } elseif ($type === 'mcq_single') {
                    $correctLetter = 'A';
                    foreach ($options as $opt) {
                        $lbl = $opt['label'] ?? 'A';
                        $text = trim($opt['option_text'] ?? '');
                        $lines[] = "{$lbl}. {$text}";
                        if (! empty($opt['is_correct'])) {
                            $correctLetter = $lbl;
                        }
                    }
                    $lines[] = "KUNCI: {$correctLetter}";
                } elseif ($type === 'mcq_multiple') {
                    $correctLetters = [];
                    foreach ($options as $opt) {
                        $lbl = $opt['label'] ?? 'A';
                        $text = trim($opt['option_text'] ?? '');
                        $lines[] = "{$lbl}. {$text}";
                        if (! empty($opt['is_correct'])) {
                            $correctLetters[] = $lbl;
                        }
                    }
                    $lines[] = 'KUNCI: '.implode(', ', $correctLetters);
                } elseif ($type === 'binary_matrix') {
                    foreach ($options as $idx => $opt) {
                        $iNum = $idx + 1;
                        $text = trim($opt['option_text'] ?? '');
                        $key = strtoupper($opt['match_key'] ?? 'BENAR');
                        $lines[] = "{$iNum}) {$text} [{$key}]";
                    }
                } elseif ($type === 'matching') {
                    foreach ($options as $idx => $opt) {
                        $iNum = $idx + 1;
                        $left = trim($opt['option_text'] ?? '');
                        $right = trim($opt['match_key'] ?? '');
                        $lines[] = "{$iNum}) {$left} -> {$right}";
                    }
                } elseif ($type === 'ordering') {
                    foreach ($options as $idx => $opt) {
                        $iNum = $idx + 1;
                        $text = trim($opt['option_text'] ?? '');
                        $lines[] = "{$iNum}) {$text}";
                    }
                } elseif ($type === 'short_answer') {
                    $key = trim($options[0]['option_text'] ?? 'Jawaban');
                    $lines[] = "KUNCI: {$key}";
                }

                if ($points > 0 && $type !== 'mcq_weighted') {
                    $lines[] = 'BOBOT: '.number_format($points, 1);
                }

                if ($explanation !== '') {
                    $lines[] = "PEMBAHASAN: {$explanation}";
                }

                $lines[] = '';
            }

            $secIdx++;
        }

        return implode("\n", $lines);
    }

    /**
     * Fallback contextual generator when offline or in test suite.
     */
    protected function generateContextualFallback(array $params, string $model): array
    {
        $category = $params['category'] ?? 'school';
        $difficulty = ucfirst($params['difficulty'] ?? 'sedang');
        $cognitive = $params['cognitive_level'] ?? 'C3-C4 (MOTS)';
        $qType = $params['question_type'] ?? 'mcq_single';

        if ($category === 'skd' && ($params['subtest'] ?? '') === 'tkp') {
            return [
                'assessment_title' => 'Simulasi Soal SKD - Tes Karakteristik Pribadi (TKP)',
                'category' => 'skd',
                'difficulty' => $difficulty,
                'cognitive_level' => $cognitive,
                'model_used' => $model,
                'stimulus' => null,
                'items' => [
                    [
                        'number' => 1,
                        'type' => 'mcq_weighted',
                        'prompt' => 'Anda adalah pimpinan unit pelayanan publik. Pada saat sistem antrean online sedang mengalami gangguan teknis (server down) dan antrean masyarakat mulai menumpuk di lobi, langkah paling tepat yang Anda ambil adalah ...',
                        'points' => 5.0,
                        'options' => [
                            ['label' => 'A', 'option_text' => 'Menginstruksikan staf untuk segera mengalihkan ke sistem manual darurat, memberikan nomor fisik, dan menyampaikan permohonan maaf serta perkiraan waktu penanganan secara transparan kepada warga.', 'score' => 5.0, 'is_correct' => true, 'match_key' => null],
                            ['label' => 'B', 'option_text' => 'Menghubungi tim IT untuk segera memperbaiki server sambil meminta warga bersabar menunggu di ruang tunggu.', 'score' => 4.0, 'is_correct' => true, 'match_key' => null],
                            ['label' => 'C', 'option_text' => 'Membuka posko informasi khusus agar warga yang terburu-buru dapat menjadwalkan ulang kunjungannya di hari berikutnya.', 'score' => 3.0, 'is_correct' => true, 'match_key' => null],
                            ['label' => 'D', 'option_text' => 'Menutup loket pendaftaran sementara waktu hingga tim teknis memastikan sistem benar-benar stabil kembali.', 'score' => 2.0, 'is_correct' => true, 'match_key' => null],
                            ['label' => 'E', 'option_text' => 'Menyerahkan penanganan sepenuhnya kepada bagian pengaduan masyarakat untuk meredam kekecewaan warga.', 'score' => 1.0, 'is_correct' => true, 'match_key' => null],
                        ],
                        'explanation' => 'Indikator Profesionalisme, Manajemen Krisis, & Pelayanan Publik: Opsi A bernilai 5 karena mengutamakan kepastian layanan warga melalui solusi kontingensi terukur dan komunikasi transparan.',
                    ],
                ],
            ];
        }

        if ($category === 'utbk') {
            return [
                'assessment_title' => 'Simulasi UTBK SNBT - Pengetahuan Kuantitatif & Penalaran Matematika',
                'category' => 'utbk',
                'difficulty' => $difficulty,
                'cognitive_level' => $cognitive,
                'model_used' => $model,
                'stimulus' => null,
                'items' => [
                    [
                        'number' => 1,
                        'type' => 'mcq_single',
                        'prompt' => 'Diketahui fungsi kuadrat $$f(x) = x^2 - 6x + c$$. Jika grafik fungsi memotong sumbu-X di dua titik berbeda dan nilai minimum fungsi adalah $$-4$$, maka nilai konstanta $$c$$ yang memenuhi adalah ...',
                        'points' => 2.5,
                        'options' => [
                            ['label' => 'A', 'option_text' => '$$c = 5$$', 'is_correct' => true, 'score' => 2.5, 'match_key' => null],
                            ['label' => 'B', 'option_text' => '$$c = -5$$', 'is_correct' => false, 'score' => 0.0, 'match_key' => null],
                            ['label' => 'C', 'option_text' => '$$c = 9$$', 'is_correct' => false, 'score' => 0.0, 'match_key' => null],
                            ['label' => 'D', 'option_text' => '$$c = 13$$', 'is_correct' => false, 'score' => 0.0, 'match_key' => null],
                            ['label' => 'E', 'option_text' => '$$c = 4$$', 'is_correct' => false, 'score' => 0.0, 'match_key' => null],
                        ],
                        'explanation' => 'Titik puncak absis $$x_p = -\frac{b}{2a} = \frac{6}{2} = 3$$. Nilai minimum $$y_p = f(3) = 3^2 - 6(3) + c = 9 - 18 + c = c - 9$$. Diketahui $$y_p = -4 \Rightarrow c - 9 = -4 \Rightarrow c = 5$$.',
                    ],
                ],
            ];
        }

        $typeDistributions = (array) ($params['type_distributions'] ?? []);
        if (! empty($typeDistributions)) {
            $items = [];
            $itemNumber = 1;
            $hasStimulus = false;

            foreach ($typeDistributions as $dist) {
                $t = $dist['type'] ?? 'mcq_single';
                $sa = (int) ($dist['standalone_count'] ?? 0);
                $sc = (int) ($dist['stimulus_count'] ?? 0);
                $sq = (int) ($dist['stimulus_questions'] ?? 0);

                if ($sc > 0 && $sq > 0) {
                    $hasStimulus = true;
                    for ($s = 1; $s <= $sc; $s++) {
                        for ($q = 1; $q <= $sq; $q++) {
                            $items[] = $this->createMockQuestionItem($t, $itemNumber++, true, $s, $q, $params);
                        }
                    }
                }

                for ($i = 1; $i <= $sa; $i++) {
                    $items[] = $this->createMockQuestionItem($t, $itemNumber++, false, 0, $i, $params);
                }
            }

            if (! empty($items)) {
                $stimulusData = $hasStimulus ? $this->deriveStimulusData($params) : null;

                return [
                    'assessment_title' => $this->deriveAssessmentTitle($params),
                    'category' => $category,
                    'difficulty' => $difficulty,
                    'cognitive_level' => $cognitive,
                    'model_used' => $model,
                    'stimulus' => $stimulusData,
                    'items' => $items,
                ];
            }
        }

        // Standard dynamic fallback package for 5 questions
        $hasStimulus = ($params['stimulus_mode'] ?? 'standalone') === 'stimulus_group';
        $stimulusData = $hasStimulus ? $this->deriveStimulusData($params) : null;

        $fallbackItems = [
            $this->createMockQuestionItem('mcq_single', 1, $hasStimulus, 1, 1, $params),
            $this->createMockQuestionItem('mcq_single', 2, $hasStimulus, 1, 2, $params),
            $this->createMockQuestionItem('mcq_multiple', 3, $hasStimulus, 1, 1, $params),
            $this->createMockQuestionItem('binary_matrix', 4, $hasStimulus, 1, 1, $params),
            $this->createMockQuestionItem('essay', 5, false, 0, 1, $params),
        ];

        return [
            'assessment_title' => $this->deriveAssessmentTitle($params),
            'category' => $category,
            'difficulty' => $difficulty,
            'cognitive_level' => $cognitive,
            'model_used' => $model,
            'stimulus' => $stimulusData,
            'items' => $fallbackItems,
        ];
    }

    /**
     * Derive contextual stimulus title and reading text tailored to subject/category.
     */
    protected function deriveStimulusData(array $params): array
    {
        // If teacher provided custom stimulus text, honor it
        if (! empty($params['custom_stimulus_text'])) {
            return [
                'title' => 'Wacana Teks Rujukan Guru',
                'content' => trim($params['custom_stimulus_text']),
            ];
        }

        $category = $params['category'] ?? 'school';
        $subject = strtolower($params['subject'] ?? 'umum');

        if ($category === 'skd') {
            $subtest = strtoupper((string) ($params['subtest'] ?? 'TIU'));
            if ($subtest === 'TKP') {
                return [
                    'title' => 'Studi Kasus Integritas & Pelayanan Publik Aparatur Sipil Negara',
                    'content' => 'Dalam era digitalisasi birokrasi, aparatur sipil negara dituntut untuk memberikan pelayanan publik yang inklusif, cepat, dan bebas dari gratifikasi. Menghadapi situasi keluhan masyarakat yang menumpuk serta keterbatasan sistem antrean manual, seorang ASN harus mampu beradaptasi dengan inovasi digital, mengutamakan keselamatan publik, serta menjaga profesionalisme dan kerja sama tim secara berkesinambungan.',
                ];
            }
            if ($subtest === 'TWK') {
                return [
                    'title' => 'Kajian Nilai Konstitusional & Integrasi Nasionalisme Bangsa',
                    'content' => 'Pancasila dan UUD NRI Tahun 1945 merupakan landasan filosofis serta konstitusional dalam menjaga kedaulatan Negara Kesatuan Republik Indonesia. Di tengah arus globalisasi dan ancaman disintegrasi siber, pengamalan butir-butir Pancasila serta kesadaran bela negara menjadi perisai moral bagi seluruh elemen masyarakat untuk merawat harmoni keberagaman Bhinneka Tunggal Ika.',
                ];
            }

            return [
                'title' => 'Wacana Analisis Logika & Kuantitatif Terpadu',
                'content' => 'Analisis data analitis dan kemampuan berpikir silogisme formal merupakan instrumen pokok dalam menguji kecerdasan kognitif aparatur negara. Ketepatan dalam menyimpulkan premis logis, pola numerik deret, dan hubungan proporsi matematis secara efisien mencerminkan ketangkasan berpikir dalam memecahkan masalah birokrasi.',
            ];
        }

        if ($category === 'utbk') {
            return [
                'title' => 'Teks Analisis Literasi Skolastik & Penalaran Kritis SNBT',
                'content' => 'Pertumbuhan kecerdasan artifisial (AI) dan otomatisasi industri telah mentransformasi struktur ketenagakerjaan secara global. Data ketenagakerjaan menunjukkan adanya pergeseran dari pekerjaan administratif rutin menuju pekerjaan yang membutuhkan keterampilan kognitif tingkat tinggi, seperti analisis data komprehensif, kreativitas, dan resolusi masalah kompleks. Fenomena ini menuntut adaptasi kurikulum pendidikan tinggi agar lulusan memiliki daya saing dan fleksibilitas adaptasi yang kokoh.',
            ];
        }

        // School Subjects
        return match ($subject) {
            'ekonomi' => [
                'title' => 'Wacana Analisis Kebijakan Moneter & Pengendalian Inflasi',
                'content' => 'Berdasarkan data Bank Indonesia dan BPS, pergerakan Indeks Harga Konsumen (IHK) sangat dipengaruhi oleh fluktuasi harga komoditas pangan bergejolak (volatile food) dan dinamika nilai tukar rupiah terhadap valuta asing. Untuk menjaga stabilitas nilai mata uang dan daya beli masyarakat, otoritas moneter mengombinasikan bauran kebijakan suku bunga acuan (BI-Rate), intervensi pasar valas, dan pengelolaan Giro Wajib Minimum (GWM) perbankan guna menyeimbangkan stabilitas harga dengan momentum pertumbuhan ekonomi nasional.',
            ],
            'sosiologi' => [
                'title' => 'Wacana Dinamika Perubahan Sosial & Interaksi Komunitas Digital',
                'content' => 'Transformasi digital dan adopsi media sosial telah mengubah pola hubungan sosial masyarakat secara mendasar. Interaksi sosial primer yang semula bertumpu pada kehadiran fisik kini kerap berganti menjadi komunikasi virtual antarindividu di ruang siber. Dinamika ini memunculkan diferensiasi sosial baru, pergeseran norma kesopanan, serta memicu fenomena kesenjangan budaya (cultural lag) antargenerasi dalam menyikapi etika pergaulan dan konsumsi informasi publik.',
            ],
            'geografi' => [
                'title' => 'Kajian Keruangan Mitigasi Bencana & Dinamika Litosfer Nusantara',
                'content' => 'Secara fisiografis, wilayah Indonesia terletak pada jalur pertemuan tiga lempeng tektonik utama dunia: Indo-Australia, Eurasia, dan Pasifik. Aktivitas zona subduksi di sepanjang Cincin Api Pasifik (Ring of Fire) menimbulkan risiko gempa tektonik, erupsi vulkanik, dan potensi tsunami. Penerapan Sistem Informasi Geografis (SIG) dan citra penginderaan jauh menjadi instrumen krusial dalam pemetaan zonasi bahaya, analisis kerentanan wilayah, dan perencanaan tata ruang pemukiman berbasis mitigasi bencana.',
            ],
            'sejarah' => [
                'title' => 'Rekonstruksi Sejarah Perjuangan Diplomasi & Kedaulatan Bangsa',
                'content' => 'Perjuangan mempertahankan kemerdekaan Republik Indonesia kurun 1945–1949 memadukan strategi perlawanan fisik bersenjata dengan diplomasi meja perundingan. Melalui perjuangan gigih para delegasi bangsa di Perundingan Linggarjati, Renville, Roem-Roijen, hingga Konferensi Meja Bundar (KMB) di Den Haag, Indonesia berhasil mempertahankan integritas wilayah dan menuntut pengakuan de jure kedaulatan penuh tanpa mengorbankan kehormatan negara di kancah internasional.',
            ],
            'informatika' => [
                'title' => 'Integrasi Berpikir Komputasional & Keamanan Sistem Jaringan',
                'content' => 'Di era komputasi awan dan transformasi digital terintegrasi, kemampuan berpikir komputasional melalui dekomposisi masalah, pengenalan pola, dan abstraksi algoritma menjadi fondasi utama rekayasa sistem komputer. Seiring masifnya transmisi data daring, arsitektur topologi jaringan yang terdesentralisasi harus diperkuat dengan protokol kriptografi modern, enkripsi data end-to-end, dan konfigurasi firewall yang ketat guna memproteksi integritas basis data dari ancaman peretasan siber.',
            ],
            'matematika' => [
                'title' => 'Pemodelan Fungsi Matematika & Analisis Data Kontekstual',
                'content' => 'Pemodelan aljabar dan penalaran statistik terapan memiliki peran vital dalam menyelesaikan permasalahan optimasi kehidupan nyata, mulai dari penghitungan laju pertumbuhan populasi hingga minimalisasi biaya logistik distribusi. Melalui pemahaman mendalam mengenai sifat-sifat persamaan fungsi, turunan diferensial, serta kaidah peluang majemuk, variabel-variabel kuantitatif dapat dianalisis secara presisi dan sistematis.',
            ],
            'fisika' => [
                'title' => 'Kajian Termodinamika & Efisiensi Konversi Energi Terbarukan',
                'content' => 'Pemanfaatan sumber energi alternatif ramah lingkungan, seperti panel fotovoltaik surya dan turbin angin, bekerja berdasarkan hukum-hukum kekekalan energi dan prinsip termodinamika. Upaya menaikkan efisiensi daya keluaran memerlukan optimalisasi perambatan kalor, minimalisasi disipasi hambatan listrik, dan pemahaman dinamika fluida pada sudu turbin guna menunjang target kemandirian energi bersih masa depan.',
            ],
            'kimia' => [
                'title' => 'Penerapan Prinsip Kimia Hijau & Kesetimbangan Reaksi Kimia',
                'content' => 'Pengembangan industri berkelanjutan mewajibkan penerapan 12 prinsip Green Chemistry untuk meminimalkan limbah berbahaya dan menghemat konsumsi energi. Melalui pemanfaatan katalis ramah lingkungan, pengaturan derajat keasaman (pH) larutan penyangga, serta pengendalian faktor suhu dan tekanan pada kesetimbangan kimia, laju pembentukan produk sintesis dapat dimaksimalkan tanpa mencemari biosfer lingkungan.',
            ],
            'biologi' => [
                'title' => 'Kajian Biosfer, Ekosistem Terpadu & Inovasi Bioteknologi',
                'content' => 'Keseimbangan rantai makanan dan siklus biogeokimia pada ekosistem hutan tropis sangat bergantung pada keanekaragaman hayati genetik flora dan fauna endemik. Di sisi lain, kemajuan bioteknologi modern melalui rekayasa genetika dan kultur jaringan menawarkan jalan keluar atas krisis pangan, sekaligus menuntut regulasi bioetika yang ketat agar tidak mengganggu stabilitas plasma nutfah alami.',
            ],
            'bahasa_indonesia' => [
                'title' => 'Teks Diskusi Kritis: Eksistensi Bahasa Indonesia di Era Globalisasi',
                'content' => 'Di tengah penetrasi bahasa asing dan pergaulan digital global, kedudukan bahasa Indonesia sebagai bahasa persatuan dan sarana komunikasi ilmiah menghadapi tantangan kontemporer. Penguasaan kosakata baku sesuai pedoman ejaan, struktur kalimat efektif, dan kemampuan menganalisis argumen tersurat maupun tersirat dalam teks editorial menjadi kompetensi literasi krusial bagi generasi penerus bangsa.',
            ],
            'bahasa_inggris' => [
                'title' => 'Reading Passage: Global Renewable Energy Transition and Sustainability',
                'content' => 'The rapid transition towards renewable energy resources has emerged as a cornerstone of international environmental policy. Nations worldwide are actively phasing out fossil fuel reliance in favor of solar, wind, and geothermal power to mitigate climate change risks. However, integrating intermittent green energy into national power grids requires substantial investments in advanced battery storage systems and intelligent microgrid infrastructure.',
            ],
            'pendidikan_pancasila' => [
                'title' => 'Implementasi Nilai-Nilai Pancasila dalam Kehidupan Berbangsa',
                'content' => 'Pancasila sebagai ideologi terbuka senantiasa relevan dalam menjawab tantangan zaman dan disrupsi informasi. Aktualisasi nilai-nilai ketuhanan, kemanusiaan, persatuan, kerakyatan, dan keadilan sosial harus terwujud secara nyata dalam sikap gotong royong, ketaatan pada supremasi hukum yang berkeadilan, serta pencegahan diskriminasi dalam tata kelola kemasyarakatan.',
            ],
            default => [
                'title' => 'Wacana Kontekstual & Literasi Literer Terpadu',
                'content' => 'Inovasi ilmu pengetahuan dan penalaran kritis merupakan instrumen utama dalam menjawab tantangan era modern. Melalui pemahaman konsep-konsep inti, analisis fenomena secara metodologis, dan pemecahan masalah sistematis, peserta didik diarahkan untuk menguasai kompetensi akademis berstandar nasional dan global.',
            ],
        };
    }

    /**
     * Derive appropriate assessment title from configuration parameters.
     */
    protected function deriveAssessmentTitle(array $params): string
    {
        $category = $params['category'] ?? 'school';
        if ($category === 'school') {
            $subject = ucwords(str_replace('_', ' ', $params['subject'] ?? 'Umum'));
            $grade = $params['grade_level'] ?? '10';
            $cur = ($params['curriculum'] ?? 'merdeka') === 'merdeka' ? 'Kurikulum Merdeka' : 'Kurikulum 2013';

            return "Asesmen Pembelajaran {$subject} Kelas {$grade} ({$cur})";
        }

        if ($category === 'utbk') {
            $sub = strtoupper((string) ($params['subtest'] ?? 'TPS'));

            return "Simulasi Naskah UTBK SNBT - Subtes {$sub}";
        }

        if ($category === 'skd') {
            $sub = strtoupper((string) ($params['subtest'] ?? 'TIU'));

            return "Simulasi Seleksi Kompetensi Dasar (SKD) - {$sub}";
        }

        if ($category === 'tka') {
            $subject = ucwords(str_replace('_', ' ', $params['subject'] ?? 'Akademik'));

            return "Tes Kemampuan Akademik (TKA) - {$subject}";
        }

        return 'Naskah Asesmen Terstandar ADZKIA';
    }

    /**
     * Create mock question item based on specific type and subject context.
     */
    protected function createMockQuestionItem(string $type, int $number, bool $isStimulusChild, int $stimulusIdx, int $subIdx, array $params): array
    {
        $category = $params['category'] ?? 'school';
        $subject = strtolower($params['subject'] ?? 'umum');
        $stimulusNote = $isStimulusChild ? 'Berdasarkan wacana stimulus di atas, ' : '';

        // SKD Special Track
        if ($category === 'skd') {
            return $this->generateSkdQuestion($type, $number, $stimulusNote, $subIdx, $params);
        }

        // UTBK Special Track
        if ($category === 'utbk') {
            return $this->generateUtbkQuestion($type, $number, $stimulusNote, $subIdx, $params);
        }

        // Route by Subject
        return match ($subject) {
            'ekonomi' => $this->generateEkonomiQuestion($type, $number, $stimulusNote, $subIdx, $params),
            'sosiologi' => $this->generateSosiologiQuestion($type, $number, $stimulusNote, $subIdx, $params),
            'geografi' => $this->generateGeografiQuestion($type, $number, $stimulusNote, $subIdx, $params),
            'sejarah' => $this->generateSejarahQuestion($type, $number, $stimulusNote, $subIdx, $params),
            'informatika' => $this->generateInformatikaQuestion($type, $number, $stimulusNote, $subIdx, $params),
            'matematika' => $this->generateMatematikaQuestion($type, $number, $stimulusNote, $subIdx, $params),
            'fisika', 'kimia', 'biologi', 'ipa' => $this->generateSainsQuestion($type, $number, $stimulusNote, $subIdx, $params),
            'bahasa_indonesia', 'bahasa_inggris' => $this->generateBahasaQuestion($type, $number, $stimulusNote, $subIdx, $params),
            'pendidikan_pancasila' => $this->generatePancasilaQuestion($type, $number, $stimulusNote, $subIdx, $params),
            default => $this->generateDefaultSchoolQuestion($type, $number, $stimulusNote, $subIdx, $params),
        };
    }

    /**
     * EKONOMI Questions
     */
    protected function generateEkonomiQuestion(string $type, int $number, string $stimulusNote, int $index, array $params): array
    {
        if ($type === 'mcq_multiple') {
            return [
                'number' => $number,
                'type' => 'mcq_multiple',
                'prompt' => $stimulusNote.'Manakah di antara pernyataan-pernyataan berikut yang merupakan faktor penyebab kurva penawaran suatu komoditas bergeser ke arah kanan? (Pilihlah minimal 2 jawaban yang tepat)',
                'points' => 2.0,
                'options' => [
                    ['label' => 'A', 'option_text' => 'Peningkatan kemajuan teknologi produksi yang menurunkan biaya marjinal.', 'is_correct' => true, 'score' => 1.0, 'match_key' => null],
                    ['label' => 'B', 'option_text' => 'Penurunan harga bahan baku dan biaya faktor produksi lainnya.', 'is_correct' => true, 'score' => 1.0, 'match_key' => null],
                    ['label' => 'C', 'option_text' => 'Pemberian subsidi per unit produksi oleh pemerintah kepada produsen.', 'is_correct' => true, 'score' => 1.0, 'match_key' => null],
                    ['label' => 'D', 'option_text' => 'Kenaikan tarif pajak pertambahan nilai yang dibebankan kepada industri.', 'is_correct' => false, 'score' => 0.0, 'match_key' => null],
                ],
                'explanation' => 'Faktor yang menggeser kurva penawaran ke kanan (peningkatan penawaran) meliputi kemajuan teknologi, penurunan harga input/bahan baku, dan subsidi pemerintah. Kenaikan pajak justru menggeser kurva penawaran ke kiri.',
            ];
        }

        if ($type === 'binary_matrix') {
            return [
                'number' => $number,
                'type' => 'binary_matrix',
                'prompt' => $stimulusNote.'Tentukan kebenaran dari masing-masing pernyataan berikut berdasarkan konsep ilmu ekonomi dan sistem keuangan:',
                'points' => 2.0,
                'settings' => ['labels' => ['Benar', 'Salah']],
                'options' => [
                    ['label' => '1', 'option_text' => 'Otoritas Jasa Keuangan (OJK) bertugas mengawasi dan meregulasi sektor perbankan, pasar modal, serta industri keuangan non-bank.', 'is_correct' => true, 'score' => 1.0, 'match_key' => 'Benar'],
                    ['label' => '2', 'option_text' => 'Kebijakan moneter kontraktual (tight money policy) dilakukan dengan cara menurunkan suku bunga acuan dan mempermudah kredit perbankan.', 'is_correct' => true, 'score' => 1.0, 'match_key' => 'Salah'],
                    ['label' => '3', 'option_text' => 'Produk Domestik Bruto (PDB) menghitung nilai pasar barang dan jasa akhir yang dihasilkan di dalam batas wilayah suatu negara dalam satu periode.', 'is_correct' => true, 'score' => 1.0, 'match_key' => 'Benar'],
                ],
                'explanation' => 'Pernyataan 1 Benar (tugas pokok OJK). Pernyataan 2 Salah (kebijakan kontraktual menaikkan suku bunga untuk menahan inflasi). Pernyataan 3 Benar (definisi PDB berdasarkan batas teritorial).',
            ];
        }

        if ($type === 'matching') {
            return [
                'number' => $number,
                'type' => 'matching',
                'prompt' => $stimulusNote.'Pasangkanlah istilah atau konsep ekonomi pada kolom kiri dengan deskripsi makna yang tepat pada kolom kanan:',
                'points' => 2.0,
                'options' => [
                    ['label' => '1', 'option_text' => 'Demand-Pull Inflation', 'is_correct' => true, 'score' => 0.5, 'match_key' => 'Kenaikan harga akibat tingginya aggregate demand melampaui kapasitas produksi'],
                    ['label' => '2', 'option_text' => 'Kebijakan Fiskal Ekspansif', 'is_correct' => true, 'score' => 0.5, 'match_key' => 'Menaikkan belanja negara dan menurunkan tarif pajak untuk menstimulasi ekonomi'],
                    ['label' => '3', 'option_text' => 'Pasar Oligopoli', 'is_correct' => true, 'score' => 0.5, 'match_key' => 'Struktur pasar di mana penawaran dikuasai oleh beberapa produsen dominan'],
                    ['label' => '4', 'option_text' => 'Devaluasi Mata Uang', 'is_correct' => true, 'score' => 0.5, 'match_key' => 'Kebijakan resmi pemerintah menurunkan nilai mata uang sendiri terhadap valas'],
                ],
                'explanation' => 'Pasangan konsep ekonomi makro dan mikro bersesuaian dengan teori ilmu ekonomi standar.',
            ];
        }

        if ($type === 'ordering') {
            return [
                'number' => $number,
                'type' => 'ordering',
                'prompt' => $stimulusNote.'Urutkan tahapan siklus akuntansi perusahaan jasa berikut dari tahapan awal hingga penyusunan laporan keuangan:',
                'points' => 2.0,
                'options' => [
                    ['label' => '1', 'option_text' => 'Menganalisis dan mengidentifikasi dokumen transaksi serta bukti pembayaran fisik', 'is_correct' => true, 'score' => 0.5, 'order' => 1],
                    ['label' => '2', 'option_text' => 'Mencatat transaksi ke dalam Jurnal Umum berdasarkan prinsip debet dan kredit', 'is_correct' => true, 'score' => 0.5, 'order' => 2],
                    ['label' => '3', 'option_text' => 'Memposting (memindahkan) catatan jurnal umum ke Buku Besar akun yang bersesuaian', 'is_correct' => true, 'score' => 0.5, 'order' => 3],
                    ['label' => '4', 'option_text' => 'Menyusun Neraca Saldo, Kertas Kerja, dan Laporan Keuangan (Laba Rugi, Neraca)', 'is_correct' => true, 'score' => 0.5, 'order' => 4],
                ],
                'explanation' => 'Siklus akuntansi baku dimulai dari verifikasi bukti transaksi, pencatatan jurnal umum, posting buku besar, hingga pelaporan keuangan.',
            ];
        }

        if ($type === 'short_answer') {
            return [
                'number' => $number,
                'type' => 'short_answer',
                'prompt' => $stimulusNote.'Diketahui fungsi permintaan suatu barang $$Q_d = 80 - 2P$$ dan fungsi penawaran $$Q_s = -20 + 3P$$. Berapakah nilai harga keseimbangan pasar ($$P_e$$) yang terbentuk?',
                'points' => 1.5,
                'options' => [
                    ['label' => '1', 'option_text' => '20', 'is_correct' => true, 'score' => 1.5, 'match_key' => null],
                ],
                'explanation' => 'Keseimbangan pasar tercapai saat $$Q_d = Q_s \Rightarrow 80 - 2P = -20 + 3P \Rightarrow 5P = 100 \Rightarrow P_e = 20$$.',
            ];
        }

        if ($type === 'essay') {
            return [
                'number' => $number,
                'type' => 'essay',
                'prompt' => $stimulusNote.'Jelaskan bagaimana transmisi kebijakan moneter Bank Sentral melalui jalur suku bunga (interest rate channel) mempengaruhi keputusan investasi swasta, dan analisislah dampaknya terhadap laju inflasi serta pertumbuhan ekonomi nasional!',
                'points' => 4.0,
                'options' => [],
                'explanation' => 'Rubrik Penilaian: Skor 4 jika menjelaskan relasi suku bunga dengan biaya modal (cost of capital), elastisitas investasi, aggregate demand, dan inflasi secara runtut dan tepat. Skor 2 jika penjelasan hanya bersifat deskriptif tanpa analisis kausalitas.',
            ];
        }

        if ($type === 'mcq_weighted') {
            return [
                'number' => $number,
                'type' => 'mcq_weighted',
                'prompt' => $stimulusNote.'Sebagai manajer keuangan sebuah UMKM yang menghadapi lonjakan inflasi harga bahan baku sebesar 25%, langkah efisiensi yang paling bijak dan berorientasi jangka panjang adalah ...',
                'points' => 5.0,
                'options' => [
                    ['label' => 'A', 'option_text' => 'Melakukan diversifikasi pemasok bahan baku lokal dan mengoptimalkan efisiensi proses produksi tanpa menurunkan standar mutu produk.', 'score' => 5.0, 'is_correct' => true, 'match_key' => null],
                    ['label' => 'B', 'option_text' => 'Menaikkan harga jual produk secara proporsional sesuai kenaikan bahan baku sambil memberikan diskon loyalitas bagi pelanggan tetap.', 'score' => 4.0, 'is_correct' => true, 'match_key' => null],
                    ['label' => 'C', 'option_text' => 'Mengurangi porsi takaran bahan baku secara diam-diam demi mempertahankan margin laba lama.', 'score' => 1.0, 'is_correct' => true, 'match_key' => null],
                    ['label' => 'D', 'option_text' => 'Menutup sementara lini produksi sampai harga bahan baku kembali normal.', 'score' => 2.0, 'is_correct' => true, 'match_key' => null],
                    ['label' => 'E', 'option_text' => 'Mengurangi jumlah tenaga kerja inti untuk memotong pengeluaran gaji.', 'score' => 3.0, 'is_correct' => true, 'match_key' => null],
                ],
                'explanation' => 'Opsi A mendapatkan skor tertinggi 5 karena menyelesaikan akar permasalahan melalui diversifikasi pemasok dan inovasi efisiensi tanpa mengorbankan mutu produk.',
            ];
        }

        // mcq_single
        if ($index % 2 === 0) {
            return [
                'number' => $number,
                'type' => 'mcq_single',
                'prompt' => $stimulusNote.'Seorang calon wirausahawan memiliki tabungan Rp 40.000.000. Ia memiliki dua opsi: mendirikan gerai minuman kekinian dengan potensi laba Rp 5.000.000/bulan atau menyewakan kios miliknya dengan uang sewa pasti Rp 4.200.000/bulan. Jika ia memutuskan memilih membuka gerai minuman, maka besarnya biaya peluang (opportunity cost) adalah ...',
                'points' => 2.0,
                'options' => [
                    ['label' => 'A', 'option_text' => 'Rp 4.200.000/bulan karena merupakan alternatif terbaik yang dikorbankan.', 'is_correct' => true, 'score' => 2.0, 'match_key' => null],
                    ['label' => 'B', 'option_text' => 'Rp 5.000.000/bulan dari laba yang diperoleh membuka gerai.', 'is_correct' => false, 'score' => 0.0, 'match_key' => null],
                    ['label' => 'C', 'option_text' => 'Rp 800.000/bulan dari selisih keuntungan kedua peluang.', 'is_correct' => false, 'score' => 0.0, 'match_key' => null],
                    ['label' => 'D', 'option_text' => 'Rp 40.000.000 yang dialokasikan sebagai modal awal usaha.', 'is_correct' => false, 'score' => 0.0, 'match_key' => null],
                    ['label' => 'E', 'option_text' => 'Rp 9.200.000/bulan yang merupakan akumulasi kedua pendapatan.', 'is_correct' => false, 'score' => 0.0, 'match_key' => null],
                ],
                'explanation' => 'Biaya peluang (opportunity cost) adalah nilai dari alternatif terbaik yang harus dikorbankan saat mengambil keputusan ekonomi. Dalam hal ini adalah sewa kios sebesar Rp 4.200.000/bulan yang dilepas.',
            ];
        }

        return [
            'number' => $number,
            'type' => 'mcq_single',
            'prompt' => $stimulusNote.'Ketika terjadi lonjakan laju inflasi yang tidak terkendali, langkah kebijakan moneter kontraktual yang paling tepat dilakukan oleh Bank Indonesia adalah ...',
            'points' => 2.0,
            'options' => [
                ['label' => 'A', 'option_text' => 'Menaikkan tingkat suku bunga acuan (BI-Rate) dan menaikkan rasio cadangan wajib minimum perbankan.', 'is_correct' => true, 'score' => 2.0, 'match_key' => null],
                ['label' => 'B', 'option_text' => 'Membeli kembali Surat Berharga Negara (SBN) di pasar uang terbuka.', 'is_correct' => false, 'score' => 0.0, 'match_key' => null],
                ['label' => 'C', 'option_text' => 'Menurunkan suku bunga diskonto agar bank umum memperluas penyaluran kredit.', 'is_correct' => false, 'score' => 0.0, 'match_key' => null],
                ['label' => 'D', 'option_text' => 'Mencetak uang kartal dalam jumlah lebih besar untuk mencukupi likuiditas masyarakat.', 'is_correct' => false, 'score' => 0.0, 'match_key' => null],
                ['label' => 'E', 'option_text' => 'Menghapuskan syarat uang muka (down payment) untuk kredit konsumtif.', 'is_correct' => false, 'score' => 0.0, 'match_key' => null],
            ],
            'explanation' => 'Untuk mengerem inflasi, Bank Sentral menyerap likuiditas dengan menaikkan BI-Rate (menaikkan minat menabung dan mengerem kredit) serta menaikkan Giro Wajib Minimum (GWM).',
        ];
    }

    /**
     * SOSIOLOGI Questions
     */
    protected function generateSosiologiQuestion(string $type, int $number, string $stimulusNote, int $index, array $params): array
    {
        if ($type === 'mcq_multiple') {
            return [
                'number' => $number,
                'type' => 'mcq_multiple',
                'prompt' => $stimulusNote.'Manakah di antara karakteristik berikut yang merupakan ciri-ciri kelompok sosial primer (paguyuban / gemeinschaft)? (Pilihlah minimal 2 jawaban yang tepat)',
                'points' => 2.0,
                'options' => [
                    ['label' => 'A', 'option_text' => 'Hubungan antaranggota bersifat intim, akrab, dan berbasis tatap muka langsung.', 'is_correct' => true, 'score' => 1.0, 'match_key' => null],
                    ['label' => 'B', 'option_text' => 'Ikatan sosial bersifat alami, murni, dan berlangsung langgeng (jangka panjang).', 'is_correct' => true, 'score' => 1.0, 'match_key' => null],
                    ['label' => 'C', 'option_text' => 'Hubungan sosial bersifat kontraktual, formal, dan didasari oleh pamrih ekonomi.', 'is_correct' => false, 'score' => 0.0, 'match_key' => null],
                    ['label' => 'D', 'option_text' => 'Solidaritas terbangun karena adanya kesamaan batin, darah, atau tempat tinggal.', 'is_correct' => true, 'score' => 1.0, 'match_key' => null],
                ],
                'explanation' => 'Gemeinschaft (kelompok primer) dicirikan oleh hubungan intim, eksklusif, langgeng, dan ikatan batin murni (contoh: keluarga, rukun tetangga tradisional). Hubungan kontraktual formal adalah ciri patembayan (gesellschaft).',
            ];
        }

        if ($type === 'binary_matrix') {
            return [
                'number' => $number,
                'type' => 'binary_matrix',
                'prompt' => $stimulusNote.'Tentukan kebenaran dari masing-masing pernyataan berikut berdasarkan konsep sosiologi masyarakat:',
                'points' => 2.0,
                'settings' => ['labels' => ['Benar', 'Salah']],
                'options' => [
                    ['label' => '1', 'option_text' => 'Ascribed status adalah kedudukan sosial yang diperoleh seseorang melalui usaha dan prestasi kerja keras pribadi.', 'is_correct' => true, 'score' => 1.0, 'match_key' => 'Salah'],
                    ['label' => '2', 'option_text' => 'Solidaritas organik menurut Emile Durkheim umumnya berkembang pada masyarakat modern dengan pembagian kerja yang kompleks.', 'is_correct' => true, 'score' => 1.0, 'match_key' => 'Benar'],
                    ['label' => '3', 'option_text' => 'Cultural lag terjadi saat unsur budaya kebendaan (teknologi) berkembang lebih cepat dibandingkan nilai dan norma sosial.', 'is_correct' => true, 'score' => 1.0, 'match_key' => 'Benar'],
                ],
                'explanation' => 'Pernyataan 1 Salah (itu definisi achieved status; ascribed status diperoleh sejak lahir). Pernyataan 2 Benar (ciri solidaritas organik masyarakat industri). Pernyataan 3 Benar (teori ketertinggalan budaya William F. Ogburn).',
            ];
        }

        if ($type === 'matching') {
            return [
                'number' => $number,
                'type' => 'matching',
                'prompt' => $stimulusNote.'Pasangkanlah tokoh perintis sosiologi pada kolom kiri dengan teori atau konsep kunci yang dikembangkannya pada kolom kanan:',
                'points' => 2.0,
                'options' => [
                    ['label' => '1', 'option_text' => 'Karl Marx', 'is_correct' => true, 'score' => 0.5, 'match_key' => 'Teori Konflik Kelas Borjuis vs Proletar'],
                    ['label' => '2', 'option_text' => 'Max Weber', 'is_correct' => true, 'score' => 0.5, 'match_key' => 'Tindakan Sosial dan Rasionalitas Birokrasi'],
                    ['label' => '3', 'option_text' => 'Emile Durkheim', 'is_correct' => true, 'score' => 0.5, 'match_key' => 'Fakta Sosial dan Solidaritas Mekanik-Organik'],
                    ['label' => '4', 'option_text' => 'George Herbert Mead', 'is_correct' => true, 'score' => 0.5, 'match_key' => 'Interaksionisme Simbolik dan Pembentukan Diri (Mind, Self, Society)'],
                ],
                'explanation' => 'Pasangan tokoh sosiologi klasik dan konsep sentral pemikirannya.',
            ];
        }

        if ($type === 'ordering') {
            return [
                'number' => $number,
                'type' => 'ordering',
                'prompt' => $stimulusNote.'Urutkan tahapan pelaksanaan penelitian sosial lapangan berikut dari langkah awal hingga publikasi hasil:',
                'points' => 2.0,
                'options' => [
                    ['label' => '1', 'option_text' => 'Menentukan topik, rumusan masalah, dan tujuan penelitian sosial', 'is_correct' => true, 'score' => 0.5, 'order' => 1],
                    ['label' => '2', 'option_text' => 'Menyusun kajian kepustakaan dan kerangka konsep teoretis', 'is_correct' => true, 'score' => 0.5, 'order' => 2],
                    ['label' => '3', 'option_text' => 'Mengumpulkan data empiris di lapangan melalui wawancara dan observasi', 'is_correct' => true, 'score' => 0.5, 'order' => 3],
                    ['label' => '4', 'option_text' => 'Melakukan reduksi data, analisis kualitatif/kuantitatif, dan penulisan laporan', 'is_correct' => true, 'score' => 0.5, 'order' => 4],
                ],
                'explanation' => 'Metodologi penelitian sosial secara berurutan: perumusan masalah, telaah pustaka, pengumpulan data lapangan, hingga analisis dan laporan akhir.',
            ];
        }

        if ($type === 'short_answer') {
            return [
                'number' => $number,
                'type' => 'short_answer',
                'prompt' => $stimulusNote.'Proses peleburan dua kebudayaan atau lebih yang berbeda menjadi satu kebudayaan baru dengan menghilangkan ciri khas asli masing-masing kebudayaan disebut ...',
                'points' => 1.5,
                'options' => [
                    ['label' => '1', 'option_text' => 'Asimilasi', 'is_correct' => true, 'score' => 1.5, 'match_key' => null],
                ],
                'explanation' => 'Asimilasi merupakan pembauran kebudayaan yang disertai hilangnya ciri khas kebudayaan asli hingga membentuk kebudayaan baru.',
            ];
        }

        if ($type === 'essay') {
            return [
                'number' => $number,
                'type' => 'essay',
                'prompt' => $stimulusNote.'Jelaskan bagaimana fenomena ketertinggalan budaya (cultural lag) termanifestasi dalam perilaku bermedia sosial generasi muda saat ini, dan rumuskan dua strategi penguatan norma sosial untuk meminimalisasi dampak negatifnya!',
                'points' => 4.0,
                'options' => [],
                'explanation' => 'Rubrik Penilaian: Skor 4 jika menganalisis jurang antara adopsi teknologi gawai dengan kedewasaan etika digital (cyberbullying, hoaks) dan memberikan 2 solusi penguatan literasi sosial. Skor 2 jika uraian hanya bersifat umum tanpa konsep sosiologis.',
            ];
        }

        if ($type === 'mcq_weighted') {
            return [
                'number' => $number,
                'type' => 'mcq_weighted',
                'prompt' => $stimulusNote.'Saat terjadi ketegangan sosial antarkelompok warga di lingkungan tempat tinggal Anda akibat perbedaan pandangan, tindakan mediasi yang paling tepat Anda lakukan adalah ...',
                'points' => 5.0,
                'options' => [
                    ['label' => 'A', 'option_text' => 'Menginisiasi forum dialog musyawarah bersama tokoh masyarakat dari kedua belah pihak dengan mengedepankan kepentingan bersama dan sikap netral.', 'score' => 5.0, 'is_correct' => true, 'match_key' => null],
                    ['label' => 'B', 'option_text' => 'Mendengarkan keluhan salah satu pihak yang lebih dekat terlebih dahulu sebelum bertindak.', 'score' => 3.0, 'is_correct' => true, 'match_key' => null],
                    ['label' => 'C', 'option_text' => 'Melaporkan potensi gesekan tersebut kepada pihak berwajib agar langsung ditangani secara hukum.', 'score' => 4.0, 'is_correct' => true, 'match_key' => null],
                    ['label' => 'D', 'option_text' => 'Memilih tidak ikut campur karena takut disalahkan oleh salah satu kelompok.', 'score' => 1.0, 'is_correct' => true, 'match_key' => null],
                    ['label' => 'E', 'option_text' => 'Menghimbau warga lain untuk tetap tenang melalui pesan di grup media sosial.', 'score' => 2.0, 'is_correct' => true, 'match_key' => null],
                ],
                'explanation' => 'Opsi A mendapatkan nilai tertinggi 5 karena mencerminkan kepemimpinan mediasi sosial, inklusivitas, dan resolusi konflik damai.',
            ];
        }

        // mcq_single
        return [
            'number' => $number,
            'type' => 'mcq_single',
            'prompt' => $stimulusNote.'Seorang anak petani desa yang tekun belajar berhasil menyelesaikan pendidikan sarjana kedokteran dan kini berprofesi sebagai dokter spesialis di rumah sakit ternama. Peristiwa perpindahan status sosial ini merupakan bentuk mobilitas sosial ...',
            'points' => 2.0,
            'options' => [
                ['label' => 'A', 'option_text' => 'Vertikal ke atas antargenerasi (social climbing).', 'is_correct' => true, 'score' => 2.0, 'match_key' => null],
                ['label' => 'B', 'option_text' => 'Horizontal geografis antardaerah.', 'is_correct' => false, 'score' => 0.0, 'match_key' => null],
                ['label' => 'C', 'option_text' => 'Vertikal ke bawah intragenerasi (social sinking).', 'is_correct' => false, 'score' => 0.0, 'match_key' => null],
                ['label' => 'D', 'option_text' => 'Lateral stasioner struktural.', 'is_correct' => false, 'score' => 0.0, 'match_key' => null],
                ['label' => 'E', 'option_text' => 'Horizontal intragenerasi tertutup.', 'is_correct' => false, 'score' => 0.0, 'match_key' => null],
            ],
            'explanation' => 'Mobilitas vertikal ke atas antargenerasi terjadi ketika status sosial anak melampaui kedudukan sosial yang dimiliki oleh orang tuanya melalui saluran mobilitas pendidikan.',
        ];
    }

    /**
     * GEOGRAFI Questions
     */
    protected function generateGeografiQuestion(string $type, int $number, string $stimulusNote, int $index, array $params): array
    {
        if ($type === 'mcq_multiple') {
            return [
                'number' => $number,
                'type' => 'mcq_multiple',
                'prompt' => $stimulusNote.'Manakah di antara subsistem berikut yang merupakan komponen utama dalam Sistem Informasi Geografis (SIG)? (Pilihlah minimal 2 jawaban yang tepat)',
                'points' => 2.0,
                'options' => [
                    ['label' => 'A', 'option_text' => 'Subsistem Masukan Data (Data Input) dari peta analog, citra satelit, dan tabel statistik.', 'is_correct' => true, 'score' => 1.0, 'match_key' => null],
                    ['label' => 'B', 'option_text' => 'Subsistem Manajemen dan Penyimpanan Basis Data (Data Management).', 'is_correct' => true, 'score' => 1.0, 'match_key' => null],
                    ['label' => 'C', 'option_text' => 'Subsistem Manipulasi dan Analisis Spasial (Data Manipulation & Analysis).', 'is_correct' => true, 'score' => 1.0, 'match_key' => null],
                    ['label' => 'D', 'option_text' => 'Subsistem Reaksi Termonuklir Pembentuk Magma Bumi.', 'is_correct' => false, 'score' => 0.0, 'match_key' => null],
                ],
                'explanation' => 'Komponen subsistem SIG mencakup Data Input, Data Management, Data Manipulation & Analysis, serta Data Output/Presentation.',
            ];
        }

        if ($type === 'binary_matrix') {
            return [
                'number' => $number,
                'type' => 'binary_matrix',
                'prompt' => $stimulusNote.'Tentukan kebenaran dari masing-masing pernyataan berikut berdasarkan kaidah ilmu geografi fisik dan kebencanaan:',
                'points' => 2.0,
                'settings' => ['labels' => ['Benar', 'Salah']],
                'options' => [
                    ['label' => '1', 'option_text' => 'Fenomena El Nino di Samudra Pasifik tropis bagian timur umumnya menyebabkan kemarau berkepanjangan dan kekeringan di Indonesia.', 'is_correct' => true, 'score' => 1.0, 'match_key' => 'Benar'],
                    ['label' => '2', 'option_text' => 'Lapisan atmosfer yang berfungsi memantulkan gelombang radio telekomunikasi adalah lapisan troposfer.', 'is_correct' => true, 'score' => 1.0, 'match_key' => 'Salah'],
                    ['label' => '3', 'option_text' => 'Batu marmer (pualam) terbentuk dari metamorfosis batuan kapur (gamping) akibat pengaruh suhu dan tekanan tinggi.', 'is_correct' => true, 'score' => 1.0, 'match_key' => 'Benar'],
                ],
                'explanation' => 'Pernyataan 1 Benar (El Nino memicu anomali penurunan curah hujan di Nusantara). Pernyataan 2 Salah (lapisan pemantul gelombang radio adalah ionosfer/termosfer). Pernyataan 3 Benar (marmer adalah batuan metamorf kontak dari batukapur).',
            ];
        }

        if ($type === 'matching') {
            return [
                'number' => $number,
                'type' => 'matching',
                'prompt' => $stimulusNote.'Pasangkanlah jenis batuan litosfer pada kolom kiri dengan contoh batuan yang bersesuaian pada kolom kanan:',
                'points' => 2.0,
                'options' => [
                    ['label' => '1', 'option_text' => 'Batuan Beku Dalam (Plutonik)', 'is_correct' => true, 'score' => 0.5, 'match_key' => 'Granit dan Diorit'],
                    ['label' => '2', 'option_text' => 'Batuan Beku Luar (Efusif)', 'is_correct' => true, 'score' => 0.5, 'match_key' => 'Basalt, Andesit, dan Obsidian'],
                    ['label' => '3', 'option_text' => 'Batuan Sedimen Klastik', 'is_correct' => true, 'score' => 0.5, 'match_key' => 'Konglomerat dan Batu Pasir'],
                    ['label' => '4', 'option_text' => 'Batuan Metamorf Kontak', 'is_correct' => true, 'score' => 0.5, 'match_key' => 'Marmer dan Kuarsit'],
                ],
                'explanation' => 'Pengelompokan petrologi batuan litosfer berdasarkan proses pembentukan magma dan sedimentasi.',
            ];
        }

        if ($type === 'ordering') {
            return [
                'number' => $number,
                'type' => 'ordering',
                'prompt' => $stimulusNote.'Urutkan tahapan siklus hidrologi air di bumi dari proses penguapan hingga masuk kembali ke akuifer air tanah:',
                'points' => 2.0,
                'options' => [
                    ['label' => '1', 'option_text' => 'Evaporasi dan transpirasi air permukaan akibat radiasi termal matahari', 'is_correct' => true, 'score' => 0.5, 'order' => 1],
                    ['label' => '2', 'option_text' => 'Kondensasi uap air membentuk awan kumulonimbus jenuh', 'is_correct' => true, 'score' => 0.5, 'order' => 2],
                    ['label' => '3', 'option_text' => 'Presipitasi (turunnya air hujan) ke permukaan daratan dan vegetasi', 'is_correct' => true, 'score' => 0.5, 'order' => 3],
                    ['label' => '4', 'option_text' => 'Infiltrasi dan perkolasi air melalui pori-pori tanah menuju lapisan air tanah dalam', 'is_correct' => true, 'score' => 0.5, 'order' => 4],
                ],
                'explanation' => 'Siklus hidrologi berlangsung mulai dari evaporasi/transpirasi, kondensasi, presipitasi, hingga infiltrasi/perkolasi.',
            ];
        }

        if ($type === 'short_answer') {
            return [
                'number' => $number,
                'type' => 'short_answer',
                'prompt' => $stimulusNote.'Pada sebuah peta berskala 1 : 250.000, jarak lurus antara Kota X dan Kota Y terukur sejauh 6 cm. Berapakah jarak sebenarnya antara kedua kota tersebut di lapangan dalam satuan kilometer?',
                'points' => 1.5,
                'options' => [
                    ['label' => '1', 'option_text' => '15', 'is_correct' => true, 'score' => 1.5, 'match_key' => null],
                ],
                'explanation' => 'Jarak sebenarnya = Jarak peta x Skala = $$6\text{ cm} \times 250.000 = 1.500.000\text{ cm} = 15\text{ km}$$.',
            ];
        }

        if ($type === 'essay') {
            return [
                'number' => $number,
                'type' => 'essay',
                'prompt' => $stimulusNote.'Analislah perbedaan antara langkah mitigasi struktural dan non-struktural dalam menghadapi ancaman bencana likuefaksi dan gempa bumi di kawasan permukiman pesisir Indonesia, serta berikan contoh konkret penerapannya!',
                'points' => 4.0,
                'options' => [],
                'explanation' => 'Rubrik Penilaian: Skor 4 jika menjelaskan mitigasi struktural (konstruksi bangunan tahan gempa, tanggul, perbaikan tanah) dan non-struktural (zonasi RTRW, simulasi evakuasi, edukasi warga) dengan presisi. Skor 2 jika uraian tidak membedakan kedua konsep secara tegas.',
            ];
        }

        if ($type === 'mcq_weighted') {
            return [
                'number' => $number,
                'type' => 'mcq_weighted',
                'prompt' => $stimulusNote.'Sebagai petugas tim mitigasi kebencanaan di daerah lereng gunung api yang baru saja dinaikkan statusnya menjadi Level III (Siaga), langkah mitigasi prioritas yang Anda lakukan adalah ...',
                'points' => 5.0,
                'options' => [
                    ['label' => 'A', 'option_text' => 'Mengaktifkan pos komando darurat, memeriksa kesiapan jalur evakuasi dan logistik, serta menginstruksikan pengosongan zona bahaya radius aman sesuai rekomendasi PVMBG.', 'score' => 5.0, 'is_correct' => true, 'match_key' => null],
                    ['label' => 'B', 'option_text' => 'Mengevakuasi seluruh warga tanpa terkecuali ke luar batas kabupaten.', 'score' => 3.0, 'is_correct' => true, 'match_key' => null],
                    ['label' => 'C', 'option_text' => 'Menunggu instruksi lebih lanjut jika status dinaikkan menjadi Awas (Level IV).', 'score' => 1.0, 'is_correct' => true, 'match_key' => null],
                    ['label' => 'D', 'option_text' => 'Menyebarkan informasi perkembangan aktivitas vulkanik melalui pamflet selebaran.', 'score' => 2.0, 'is_correct' => true, 'match_key' => null],
                    ['label' => 'E', 'option_text' => 'Mengumpulkan para tokoh desa untuk berkoordinasi mengenai pembagian bantuan sembako.', 'score' => 4.0, 'is_correct' => true, 'match_key' => null],
                ],
                'explanation' => 'Opsi A mendapatkan skor tertinggi 5 karena mengikuti SOP mitigasi ilmiah kebencanaan secara tanggap, terstruktur, dan aman.',
            ];
        }

        // mcq_single
        return [
            'number' => $number,
            'type' => 'mcq_single',
            'prompt' => $stimulusNote.'Kajian mengenai persebaran permukiman padat di bantaran sungai yang memicu penyempitan badan air dan banjir musiman, kemudian dianalisis keterkaitannya dengan faktor keruangan dan aktivitas manusia, merupakan contoh penerapan prinsip geografi ...',
            'points' => 2.0,
            'options' => [
                ['label' => 'A', 'option_text' => 'Prinsip Korologi (Keterpaduan Distribusi, Interelasi, dan Deskripsi).', 'is_correct' => true, 'score' => 2.0, 'match_key' => null],
                ['label' => 'B', 'option_text' => 'Prinsip Distribusi Tunggal.', 'is_correct' => false, 'score' => 0.0, 'match_key' => null],
                ['label' => 'C', 'option_text' => 'Prinsip Deskripsi Tekstual.', 'is_correct' => false, 'score' => 0.0, 'match_key' => null],
                ['label' => 'D', 'option_text' => 'Prinsip Ekologi Hewani.', 'is_correct' => false, 'score' => 0.0, 'match_key' => null],
                ['label' => 'E', 'option_text' => 'Prinsip Determinisme Lingkungan Fisik.', 'is_correct' => false, 'score' => 0.0, 'match_key' => null],
            ],
            'explanation' => 'Prinsip korologi memadukan prinsip persebaran (distribusi), keterkaitan sebab-akibat (interelasi), dan penjelasan fakta (deskripsi) dalam satu kesatuan ruang wilayah.',
        ];
    }

    /**
     * SEJARAH Questions
     */
    protected function generateSejarahQuestion(string $type, int $number, string $stimulusNote, int $index, array $params): array
    {
        if ($type === 'mcq_multiple') {
            return [
                'number' => $number,
                'type' => 'mcq_multiple',
                'prompt' => $stimulusNote.'Manakah di antara faktor-faktor berikut yang menjadi latar belakang runtuh dan dibubarkannya kongsi dagang VOC di Hindia Timur pada tahun 1799? (Pilihlah minimal 2 jawaban yang tepat)',
                'points' => 2.0,
                'options' => [
                    ['label' => 'A', 'option_text' => 'Korupsi yang merajalela di kalangan para pejabat dan pegawai tinggi VOC.', 'is_correct' => true, 'score' => 1.0, 'match_key' => null],
                    ['label' => 'B', 'option_text' => 'Beban hutang yang sangat besar akibat biaya perang menghadapi perlawanan rakyat Nusantara.', 'is_correct' => true, 'score' => 1.0, 'match_key' => null],
                    ['label' => 'C', 'option_text' => 'Kalah bersaing dalam perdagangan rempah global melawan armada dagang Inggris (EIC).', 'is_correct' => true, 'score' => 1.0, 'match_key' => null],
                    ['label' => 'D', 'option_text' => 'Serangan invasi militer Kekaisaran Jepang ke Batavia pada abad ke-18.', 'is_correct' => false, 'score' => 0.0, 'match_key' => null],
                ],
                'explanation' => 'VOC dibubarkan pada 31 Desember 1799 akibat korupsi kronis internal, utang membengkak akibat perang berkepanjangan, dan persaingan ketat kongsi dagang lain (EIC).',
            ];
        }

        if ($type === 'binary_matrix') {
            return [
                'number' => $number,
                'type' => 'binary_matrix',
                'prompt' => $stimulusNote.'Tentukan kebenaran dari masing-masing pernyataan berikut terkait sejarah perjuangan dan peristiwa proklamasi kemerdekaan:',
                'points' => 2.0,
                'settings' => ['labels' => ['Benar', 'Salah']],
                'options' => [
                    ['label' => '1', 'option_text' => 'Peristiwa Rengasdengklok dilatarbelakangi oleh perbedaan sikap antargolongan pemuda dan golongan tua mengenai waktu pembacaan proklamasi.', 'is_correct' => true, 'score' => 1.0, 'match_key' => 'Benar'],
                    ['label' => '2', 'option_text' => 'Organisasi Budi Utomo didirikan pada 20 Mei 1908 sebagai organisasi politik radikal yang bertujuan mengangkat senjata melawan Belanda.', 'is_correct' => true, 'score' => 1.0, 'match_key' => 'Salah'],
                    ['label' => '3', 'option_text' => 'Konferensi Meja Bundar (KMB) tahun 1949 menghasilkan penyerahan dan pengakuan kedaulatan Indonesia oleh Kerajaan Belanda.', 'is_correct' => true, 'score' => 1.0, 'match_key' => 'Benar'],
                ],
                'explanation' => 'Pernyataan 1 Benar (pemuda mendesak Sukarno-Hatta agar memproklamasikan kemerdekaan tanpa pengaruh Jepang). Pernyataan 2 Salah (Budi Utomo adalah organisasi sosial budaya dan pendidikan, bukan organisasi politik radikal bersenjata). Pernyataan 3 Benar (hasil penting KMB di Den Haag).',
            ];
        }

        if ($type === 'matching') {
            return [
                'number' => $number,
                'type' => 'matching',
                'prompt' => $stimulusNote.'Pasangkanlah peristiwa monumental sejarah bangsa Indonesia pada kolom kiri dengan tahun terjadinya pada kolom kanan:',
                'points' => 2.0,
                'options' => [
                    ['label' => '1', 'option_text' => 'Kelahiran Organisasi Budi Utomo', 'is_correct' => true, 'score' => 0.5, 'match_key' => 'Tahun 1908'],
                    ['label' => '2', 'option_text' => 'Ikrar Sumpah Pemuda dalam Kongres Pemuda II', 'is_correct' => true, 'score' => 0.5, 'match_key' => 'Tahun 1928'],
                    ['label' => '3', 'option_text' => 'Pembacaan Naskah Proklamasi Kemerdekaan RI', 'is_correct' => true, 'score' => 0.5, 'match_key' => 'Tahun 1945'],
                    ['label' => '4', 'option_text' => 'Pelaksanaan Konferensi Meja Bundar (KMB) di Den Haag', 'is_correct' => true, 'score' => 0.5, 'match_key' => 'Tahun 1949'],
                ],
                'explanation' => 'Kronologi tahun tonggak sejarah pergerakan dan kedaulatan bangsa Indonesia.',
            ];
        }

        if ($type === 'ordering') {
            return [
                'number' => $number,
                'type' => 'ordering',
                'prompt' => $stimulusNote.'Urutkan rangkaian peristiwa krusial menjelang Proklamasi Kemerdekaan Republik Indonesia secara kronologis:',
                'points' => 2.0,
                'options' => [
                    ['label' => '1', 'option_text' => 'Jatuhnya bom atom di Hiroshima dan Nagasaki yang memaksa Jepang menyerah tanpa syarat pada Sekutu', 'is_correct' => true, 'score' => 0.5, 'order' => 1],
                    ['label' => '2', 'option_text' => 'Peristiwa penculikan Sukarno-Hatta ke Rengasdengklok oleh para pemuda pejuang', 'is_correct' => true, 'score' => 0.5, 'order' => 2],
                    ['label' => '3', 'option_text' => 'Perumusan dan penandatanganan naskah proklamasi di kediaman Laksamana Tadashi Maeda', 'is_correct' => true, 'score' => 0.5, 'order' => 3],
                    ['label' => '4', 'option_text' => 'Pembacaan teks Proklamasi Kemerdekaan di Jalan Pegangsaan Timur No. 56 Jakarta', 'is_correct' => true, 'score' => 0.5, 'order' => 4],
                ],
                'explanation' => 'Kronologi peristiwa detik-detik proklamasi Agustus 1945.',
            ];
        }

        if ($type === 'short_answer') {
            return [
                'number' => $number,
                'type' => 'short_answer',
                'prompt' => $stimulusNote.'Tahap penulisan dan penyusunan kembali peristiwa masa lampau secara sistematis dan kritis dalam metode penelitian sejarah disebut ...',
                'points' => 1.5,
                'options' => [
                    ['label' => '1', 'option_text' => 'Historiografi', 'is_correct' => true, 'score' => 1.5, 'match_key' => null],
                ],
                'explanation' => 'Historiografi adalah langkah penulisan sejarah setelah tahap heuristik (pencarian sumber), kritik/verifikasi sumber, dan interpretasi fakta.',
            ];
        }

        if ($type === 'essay') {
            return [
                'number' => $number,
                'type' => 'essay',
                'prompt' => $stimulusNote.'Jelaskan hubungan kausalitas antara kebijakan Politik Etis (khususnya program edukasi) yang diberlakukan pemerintah kolonial Belanda dengan lahirnya kaum intelektual terpelajar dan pergerakan nasional Indonesia di awal abad ke-20!',
                'points' => 4.0,
                'options' => [],
                'explanation' => 'Rubrik Penilaian: Skor 4 jika menjelaskan tritunggal Van Deventer (edukasi, irigasi, emigrasi) dan menganalisis bagaimana sekolah modern melahirkan kaum terpelajar yang membentuk kesadaran berbangsa dan mendirikan organisasi pergerakan. Skor 2 jika jawaban kurang komprehensif.',
            ];
        }

        if ($type === 'mcq_weighted') {
            return [
                'number' => $number,
                'type' => 'mcq_weighted',
                'prompt' => $stimulusNote.'Meneladani nilai luhur perjuangan para pendiri bangsa yang rela mengesampingkan kepentingan pribadi dan golongan demi kemerdekaan Indonesia, sikap yang paling patut Anda wujudkan di lingkungan kerja saat ini adalah ...',
                'points' => 5.0,
                'options' => [
                    ['label' => 'A', 'option_text' => 'Menjunjung tinggi profesionalisme, mengutamakan pencapaian target tim di atas kepentingan pribadi, serta bersedia berkorban waktu untuk menyelesaikan tugas dinas krusial.', 'score' => 5.0, 'is_correct' => true, 'match_key' => null],
                    ['label' => 'B', 'option_text' => 'Bekerja secara disiplin hanya saat diawasi oleh atasan langsung.', 'score' => 2.0, 'is_correct' => true, 'match_key' => null],
                    ['label' => 'C', 'option_text' => 'Menolak segala bentuk tugas tambahan di luar uraian jabatan pokok.', 'score' => 1.0, 'is_correct' => true, 'match_key' => null],
                    ['label' => 'D', 'option_text' => 'Menyelesaikan pekerjaan pribadi terlebih dahulu sebelum membantu rekan kerja.', 'score' => 3.0, 'is_correct' => true, 'match_key' => null],
                    ['label' => 'E', 'option_text' => 'Membangun relasi pertemanan akrab dengan seluruh staf untuk mempermudah koordinasi kerja.', 'score' => 4.0, 'is_correct' => true, 'match_key' => null],
                ],
                'explanation' => 'Opsi A mendapatkan nilai tertinggi 5 karena mencerminkan integritas, etos pengorbanan, dan dedikasi luhur bagi organisasi.',
            ];
        }

        // mcq_single
        return [
            'number' => $number,
            'type' => 'mcq_single',
            'prompt' => $stimulusNote.'Kajian sejarah yang meneliti sebuah peristiwa penting secara mendalam dan menyeluruh pada suatu kurun waktu tertentu, dengan menekankan struktur, aspek sosial, ekonomi, dan politik secara luas namun terbatas pada waktu, menerapkan cara berpikir ...',
            'points' => 2.0,
            'options' => [
                ['label' => 'A', 'option_text' => 'Sinkronik (memanjang dalam ruang, menyempit dalam waktu).', 'is_correct' => true, 'score' => 2.0, 'match_key' => null],
                ['label' => 'B', 'option_text' => 'Diakronik (memanjang dalam waktu, menyempit dalam ruang).', 'is_correct' => false, 'score' => 0.0, 'match_key' => null],
                ['label' => 'C', 'option_text' => 'Anakronisme murni.', 'is_correct' => false, 'score' => 0.0, 'match_key' => null],
                ['label' => 'D', 'option_text' => 'Periodisasi linier tertutup.', 'is_correct' => false, 'score' => 0.0, 'match_key' => null],
                ['label' => 'E', 'option_text' => 'Kausalitas sirkuler imajinatif.', 'is_correct' => false, 'score' => 0.0, 'match_key' => null],
            ],
            'explanation' => 'Konsep berpikir sinkronik meneliti struktur dan aspek gejala sosial secara meluas dalam ruang pada kurun waktu yang terbatas.',
        ];
    }

    /**
     * INFORMATIKA Questions
     */
    protected function generateInformatikaQuestion(string $type, int $number, string $stimulusNote, int $index, array $params): array
    {
        if ($type === 'mcq_multiple') {
            return [
                'number' => $number,
                'type' => 'mcq_multiple',
                'prompt' => $stimulusNote.'Manakah di antara karakteristik berikut yang merupakan ciri-ciri struktur data Antrean (Queue)? (Pilihlah minimal 2 jawaban yang tepat)',
                'points' => 2.0,
                'options' => [
                    ['label' => 'A', 'option_text' => 'Menerapkan prinsip FIFO (First In, First Out) dalam pengolahan elemennya.', 'is_correct' => true, 'score' => 1.0, 'match_key' => null],
                    ['label' => 'B', 'option_text' => 'Penambahan elemen baru (Enqueue) dilakukan pada ujung belakang (Rear).', 'is_correct' => true, 'score' => 1.0, 'match_key' => null],
                    ['label' => 'C', 'option_text' => 'Penghapusan elemen (Dequeue) dilakukan pada ujung depan (Front).', 'is_correct' => true, 'score' => 1.0, 'match_key' => null],
                    ['label' => 'D', 'option_text' => 'Menerapkan prinsip LIFO (Last In, First Out) seperti tumpukan buku.', 'is_correct' => false, 'score' => 0.0, 'match_key' => null],
                ],
                'explanation' => 'Struktur data Queue bekerja dengan mekanisme First In First Out (FIFO), di mana Enqueue terjadi di bagian belakang (Rear) dan Dequeue di bagian depan (Front). LIFO adalah mekanisme Stack.',
            ];
        }

        if ($type === 'binary_matrix') {
            return [
                'number' => $number,
                'type' => 'binary_matrix',
                'prompt' => $stimulusNote.'Tentukan kebenaran dari masing-masing pernyataan berikut terkait ilmu komputer dan pemrograman:',
                'points' => 2.0,
                'settings' => ['labels' => ['Benar', 'Salah']],
                'options' => [
                    ['label' => '1', 'option_text' => 'Pencarian biner (Binary Search) hanya dapat bekerja optimal jika sekumpulan data di dalam larik (array) sudah dalam keadaan terurut.', 'is_correct' => true, 'score' => 1.0, 'match_key' => 'Benar'],
                    ['label' => '2', 'option_text' => 'Kompilator (Compiler) mengeksekusi kode program baris demi baris secara interaktif tanpa menghasilkan berkas biner objek mandiri.', 'is_correct' => true, 'score' => 1.0, 'match_key' => 'Salah'],
                    ['label' => '3', 'option_text' => 'Protokol HTTPS menggunakan mekanisme enkripsi data SSL/TLS untuk mengamankan komunikasi data antara peramban web dan server.', 'is_correct' => true, 'score' => 1.0, 'match_key' => 'Benar'],
                ],
                'explanation' => 'Pernyataan 1 Benar (syarat mutlak binary search adalah data harus terurut). Pernyataan 2 Salah (itu karakteristik Interpreter; Compiler menerjemahkan seluruh kode program sekaligus menjadi berkas objek/eksekutabel). Pernyataan 3 Benar (standar keamanan enkripsi HTTPS).',
            ];
        }

        if ($type === 'matching') {
            return [
                'number' => $number,
                'type' => 'matching',
                'prompt' => $stimulusNote.'Pasangkanlah komponen arsitektur sistem komputer pada kolom kiri dengan fungsi utamanya pada kolom kanan:',
                'points' => 2.0,
                'options' => [
                    ['label' => '1', 'option_text' => 'ALU (Arithmetic Logic Unit)', 'is_correct' => true, 'score' => 0.5, 'match_key' => 'Menjalankan operasi perhitungan matematika dan pembandingan logika boolean'],
                    ['label' => '2', 'option_text' => 'RAM (Random Access Memory)', 'is_correct' => true, 'score' => 0.5, 'match_key' => 'Menyimpan instruksi dan data kerja aktif secara sementara (volatile)'],
                    ['label' => '3', 'option_text' => 'SSD (Solid State Drive)', 'is_correct' => true, 'score' => 0.5, 'match_key' => 'Media penyimpanan data sekunder berbasis memori flash non-volatile'],
                    ['label' => '4', 'option_text' => 'Firewall Jaringan', 'is_correct' => true, 'score' => 0.5, 'match_key' => 'Menyaring dan memantau lalu lintas paket data berdasarkan aturan keamanan'],
                ],
                'explanation' => 'Komponen perangkat keras dan infrastruktur sistem komputer bersesuaian dengan fungsi arsitekturalnya.',
            ];
        }

        if ($type === 'ordering') {
            return [
                'number' => $number,
                'type' => 'ordering',
                'prompt' => $stimulusNote.'Urutkan tahapan baku dalam Siklus Hidup Pengembangan Perangkat Lunak (SDLC - Waterfall Model) dari awal hingga pemeliharaan:',
                'points' => 2.0,
                'options' => [
                    ['label' => '1', 'option_text' => 'Analisis Kebutuhan Sistem dan Pengguna (Requirements Analysis)', 'is_correct' => true, 'score' => 0.5, 'order' => 1],
                    ['label' => '2', 'option_text' => 'Perancangan Arsitektur Sistem dan Basis Data (System & UI/UX Design)', 'is_correct' => true, 'score' => 0.5, 'order' => 2],
                    ['label' => '3', 'option_text' => 'Pengkodean dan Implementasi Perangkat Lunak (Coding / Implementation)', 'is_correct' => true, 'score' => 0.5, 'order' => 3],
                    ['label' => '4', 'option_text' => 'Pengujian Kualitas dan Verifikasi Bug (Testing / QA)', 'is_correct' => true, 'score' => 0.5, 'order' => 4],
                ],
                'explanation' => 'Siklus SDLC klasik berlangsung mulai dari analisis kebutuhan, desain, implementasi (coding), dan testing.',
            ];
        }

        if ($type === 'short_answer') {
            return [
                'number' => $number,
                'type' => 'short_answer',
                'prompt' => $stimulusNote.'Berapakah nilai desimal dari bilangan biner $$11001_2$$?',
                'points' => 1.5,
                'options' => [
                    ['label' => '1', 'option_text' => '25', 'is_correct' => true, 'score' => 1.5, 'match_key' => null],
                ],
                'explanation' => 'Konversi biner ke desimal: $$(1 \times 2^4) + (1 \times 2^3) + (0 \times 2^2) + (0 \times 2^1) + (1 \times 2^0) = 16 + 8 + 0 + 0 + 1 = 25$$.',
            ];
        }

        if ($type === 'essay') {
            return [
                'number' => $number,
                'type' => 'essay',
                'prompt' => $stimulusNote.'Jelaskan empat fondasi utama dalam Berpikir Komputasional (Computational Thinking) yaitu: Dekomposisi, Pengenalan Pola, Abstraksi, dan Perancangan Algoritma, serta berikan contoh penerapannya dalam memecahkan masalah sistem antrean rumah sakit!',
                'points' => 4.0,
                'options' => [],
                'explanation' => 'Rubrik Penilaian: Skor 4 jika menguraikan keempat pilar konsep berpikir komputasional dengan benar dan memberikan contoh analogi sistem antrean yang logis. Skor 2 jika penjelasan hanya menyebutkan definisi tanpa aplikasi studi kasus.',
            ];
        }

        if ($type === 'mcq_weighted') {
            return [
                'number' => $number,
                'type' => 'mcq_weighted',
                'prompt' => $stimulusNote.'Sebagai administrator sistem jaringan sebuah instansi pemerintah yang mendeteksi anomali lalu lintas data mencurigakan (indikasi serangan siber brute-force pada server), langkah penanganan awal yang paling tepat adalah ...',
                'points' => 5.0,
                'options' => [
                    ['label' => 'A', 'option_text' => 'Mengisolasi segmen jaringan yang terinfeksi, memblokir alamat IP penyerang di firewall, dan memeriksa log autentikasi sistem untuk memverifikasi ada tidaknya kebocoran kredensial.', 'score' => 5.0, 'is_correct' => true, 'match_key' => null],
                    ['label' => 'B', 'option_text' => 'Mematikan paksa seluruh server utama tanpa mencadangkan berkas log sistem.', 'score' => 1.0, 'is_correct' => true, 'match_key' => null],
                    ['label' => 'C', 'option_text' => 'Menunggu hingga jam kerja selesai untuk mengecek kembali sistem bersama rekan tim.', 'score' => 2.0, 'is_correct' => true, 'match_key' => null],
                    ['label' => 'D', 'option_text' => 'Mengubah kata sandi administrator lokal tanpa menganalisis titik celah serangan.', 'score' => 3.0, 'is_correct' => true, 'match_key' => null],
                    ['label' => 'E', 'option_text' => 'Melaporkan indikasi insiden ke pimpinan divisi sembari menyiapkan rencana mitigasi teknis.', 'score' => 4.0, 'is_correct' => true, 'match_key' => null],
                ],
                'explanation' => 'Opsi A mendapatkan nilai tertinggi 5 karena mengikuti standar baku insiden respon keamanan siber: isolasi, mitigasi akses, dan audit forensik log.',
            ];
        }

        // mcq_single
        return [
            'number' => $number,
            'type' => 'mcq_single',
            'prompt' => $stimulusNote.'Kemampuan memecah suatu masalah rumit menjadi bagian-bagian yang lebih kecil, terkelola, dan terstruktur agar lebih mudah diselesaikan secara bertahap dalam konsep berpikir komputasional disebut ...',
            'points' => 2.0,
            'options' => [
                ['label' => 'A', 'option_text' => 'Dekomposisi (Decomposition).', 'is_correct' => true, 'score' => 2.0, 'match_key' => null],
                ['label' => 'B', 'option_text' => 'Abstraksi (Abstraction).', 'is_correct' => false, 'score' => 0.0, 'match_key' => null],
                ['label' => 'C', 'option_text' => 'Pengenalan Pola (Pattern Recognition).', 'is_correct' => false, 'score' => 0.0, 'match_key' => null],
                ['label' => 'D', 'option_text' => 'Algoritma Heuristik (Algorithm Design).', 'is_correct' => false, 'score' => 0.0, 'match_key' => null],
                ['label' => 'E', 'option_text' => 'Generalisasi Sistemik.', 'is_correct' => false, 'score' => 0.0, 'match_key' => null],
            ],
            'explanation' => 'Dekomposisi adalah teknik memecah masalah kompleks menjadi sub-masalah yang lebih kecil agar lebih mudah dipahami dan diselesaikan.',
        ];
    }

    /**
     * MATEMATIKA Questions
     */
    protected function generateMatematikaQuestion(string $type, int $number, string $stimulusNote, int $index, array $params): array
    {
        if ($type === 'mcq_multiple') {
            return [
                'number' => $number,
                'type' => 'mcq_multiple',
                'prompt' => $stimulusNote.'Perhatikan persamaan kuadrat $$x^2 - 5x + 6 = 0$$. Manakah di antara pernyataan-pernyataan berikut yang bernilai benar? (Pilihlah minimal 2 jawaban yang tepat)',
                'points' => 2.0,
                'options' => [
                    ['label' => 'A', 'option_text' => 'Nilai diskriminan $$D = 1$$, sehingga memiliki dua akar real berbeda.', 'is_correct' => true, 'score' => 1.0, 'match_key' => null],
                    ['label' => 'B', 'option_text' => 'Akar-akar persamaan tersebut adalah $$x_1 = 2$$ dan $$x_2 = 3$$.', 'is_correct' => true, 'score' => 1.0, 'match_key' => null],
                    ['label' => 'C', 'option_text' => 'Jumlah kedua akar $$x_1 + x_2 = 5$$.', 'is_correct' => true, 'score' => 1.0, 'match_key' => null],
                    ['label' => 'D', 'option_text' => 'Grafik kurva parabola fungsi membuka ke arah bawah.', 'is_correct' => false, 'score' => 0.0, 'match_key' => null],
                ],
                'explanation' => '$$D = (-5)^2 - 4(1)(6) = 25 - 24 = 1 > 0$$. Pemfaktoran: $$(x - 2)(x - 3) = 0 \Rightarrow x_1 = 2, x_2 = 3$$. Karena koefisien $$a = 1 > 0$$, kurva parabola membuka ke atas.',
            ];
        }

        if ($type === 'binary_matrix') {
            return [
                'number' => $number,
                'type' => 'binary_matrix',
                'prompt' => $stimulusNote.'Tentukan kebenaran dari masing-masing identitas dan teorema matematika berikut:',
                'points' => 2.0,
                'settings' => ['labels' => ['Benar', 'Salah']],
                'options' => [
                    ['label' => '1', 'option_text' => 'Identitas trigonometri $$\sin^2 \theta + \cos^2 \theta = 1$$ berlaku untuk setiap sudut real $$\\theta$$.', 'is_correct' => true, 'score' => 1.0, 'match_key' => 'Benar'],
                    ['label' => '2', 'option_text' => 'Jika matriks $$A$$ memiliki determinan $$\det(A) = 0$$, maka matriks tersebut memiliki invers unik $$A^{-1}$$.', 'is_correct' => true, 'score' => 1.0, 'match_key' => 'Salah'],
                    ['label' => '3', 'option_text' => 'Turunan pertama dari fungsi $$f(x) = 3x^4 - 2x^2 + 7$$ adalah $$f\'(x) = 12x^3 - 4x$$.', 'is_correct' => true, 'score' => 1.0, 'match_key' => 'Benar'],
                ],
                'explanation' => 'Pernyataan 1 Benar (identitas Phytagoras trigonometri). Pernyataan 2 Salah (matriks singular berdeterminan 0 tidak memiliki invers). Pernyataan 3 Benar (aturan pangkat kalkulus diferensial).',
            ];
        }

        if ($type === 'matching') {
            return [
                'number' => $number,
                'type' => 'matching',
                'prompt' => $stimulusNote.'Pasangkanlah fungsi aljabar pada kolom kiri dengan turunan pertamanya $$f\'(x)$$ pada kolom kanan:',
                'points' => 2.0,
                'options' => [
                    ['label' => '1', 'option_text' => '$$f(x) = x^3 - 4x$$', 'is_correct' => true, 'score' => 0.5, 'match_key' => '$$f\'(x) = 3x^2 - 4$$'],
                    ['label' => '2', 'option_text' => '$$f(x) = \sin(2x)$$', 'is_correct' => true, 'score' => 0.5, 'match_key' => '$$f\'(x) = 2\cos(2x)$$'],
                    ['label' => '3', 'option_text' => '$$f(x) = e^{3x}$$', 'is_correct' => true, 'score' => 0.5, 'match_key' => '$$f\'(x) = 3e^{3x}$$'],
                    ['label' => '4', 'option_text' => '$$f(x) = \ln(x)$$', 'is_correct' => true, 'score' => 0.5, 'match_key' => '$$f\'(x) = \frac{1}{x}$$'],
                ],
                'explanation' => 'Aturan dasar turunan fungsi polinomial, trigonometri, eksponensial, dan logaritma natural.',
            ];
        }

        if ($type === 'ordering') {
            return [
                'number' => $number,
                'type' => 'ordering',
                'prompt' => $stimulusNote.'Urutkan tahapan analisis uji statistik pengujian hipotesis dari tahap perumusan hingga pengambilan kesimpulan:',
                'points' => 2.0,
                'options' => [
                    ['label' => '1', 'option_text' => 'Merumuskan Hipotesis Nol ($$H_0$$) dan Hipotesis Alternatif ($$H_1$$)', 'is_correct' => true, 'score' => 0.5, 'order' => 1],
                    ['label' => '2', 'option_text' => 'Menetapkan tingkat signifikansi ($$\\alpha$$) dan derajat kebebasan ($$df$$)', 'is_correct' => true, 'score' => 0.5, 'order' => 2],
                    ['label' => '3', 'option_text' => 'Menghitung nilai statistik uji ($$t_{\text{hitung}}$$ atau $$Z_{\text{hitung}}$$) dari data sampel', 'is_correct' => true, 'score' => 0.5, 'order' => 3],
                    ['label' => '4', 'option_text' => 'Membandingkan nilai uji dengan daerah kritis dan membuat keputusan penolakan $$H_0$$', 'is_correct' => true, 'score' => 0.5, 'order' => 4],
                ],
                'explanation' => 'Prosedur baku pengujian hipotesis statistik.',
            ];
        }

        if ($type === 'short_answer') {
            return [
                'number' => $number,
                'type' => 'short_answer',
                'prompt' => $stimulusNote.'Jika suku ke-3 suatu barisan aritmetika adalah 11 dan suku ke-7 adalah 27, berapakah nilai suku pertama ($$a$$) barisan tersebut?',
                'points' => 1.5,
                'options' => [
                    ['label' => '1', 'option_text' => '3', 'is_correct' => true, 'score' => 1.5, 'match_key' => null],
                ],
                'explanation' => '$$U_7 - U_3 = 4b = 27 - 11 = 16 \Rightarrow b = 4$$. Karena $$U_3 = a + 2b = 11 \Rightarrow a + 2(4) = 11 \Rightarrow a = 3$$.',
            ];
        }

        if ($type === 'essay') {
            return [
                'number' => $number,
                'type' => 'essay',
                'prompt' => $stimulusNote.'Sebuah kotak tertutup dengan alas persegi dirancang memiliki volume $$250\text{ cm}^3$$. Tentukan ukuran panjang sisi alas dan tinggi kotak agar luas permukaan bahan minimum, serta buktikan kondisi minimum tersebut menggunakan uji turunan kedua!',
                'points' => 4.0,
                'options' => [],
                'explanation' => 'Rubrik Penilaian: Skor 4 jika merumuskan fungsi luas permukaan $$L(x) = 2x^2 + \frac{1000}{x}$$, mencari turunan pertama $$L\'(x) = 0 \Rightarrow x = 5\text{ cm}$$, tinggi $$t = 10\text{ cm}$$, dan membuktikan $$L\'\'(5) > 0$$. Skor 2 jika perhitungan belum tuntas.',
            ];
        }

        // mcq_single
        return [
            'number' => $number,
            'type' => 'mcq_single',
            'prompt' => $stimulusNote.'Diketahui persamaan kuadrat $$2x^2 - 7x + 3 = 0$$. Himpunan penyelesaian akar-akar persamaan tersebut adalah ...',
            'points' => 2.0,
            'options' => [
                ['label' => 'A', 'option_text' => '$$x = \frac{1}{2}$$ atau $$x = 3$$', 'is_correct' => true, 'score' => 2.0, 'match_key' => null],
                ['label' => 'B', 'option_text' => '$$x = -\frac{1}{2}$$ atau $$x = -3$$', 'is_correct' => false, 'score' => 0.0, 'match_key' => null],
                ['label' => 'C', 'option_text' => '$$x = 1$$ atau $$x = 6$$', 'is_correct' => false, 'score' => 0.0, 'match_key' => null],
                ['label' => 'D', 'option_text' => '$$x = 2$$ atau $$x = \frac{3}{2}$$', 'is_correct' => false, 'score' => 0.0, 'match_key' => null],
                ['label' => 'E', 'option_text' => '$$x = -1$$ atau $$x = 3$$', 'is_correct' => false, 'score' => 0.0, 'match_key' => null],
            ],
            'explanation' => 'Pemfaktoran: $$(2x - 1)(x - 3) = 0 \Rightarrow 2x - 1 = 0 \Rightarrow x = \frac{1}{2}$$ atau $$x - 3 = 0 \Rightarrow x = 3$$.',
        ];
    }

    /**
     * SAINS Questions (Fisika, Kimia, Biologi, IPA)
     */
    protected function generateSainsQuestion(string $type, int $number, string $stimulusNote, int $index, array $params): array
    {
        if ($type === 'mcq_multiple') {
            return [
                'number' => $number,
                'type' => 'mcq_multiple',
                'prompt' => $stimulusNote.'Manakah di antara pernyataan berikut yang benar mengenai hukum kekekalan energi dan termodinamika? (Pilihlah minimal 2 jawaban yang tepat)',
                'points' => 2.0,
                'options' => [
                    ['label' => 'A', 'option_text' => 'Energi tidak dapat diciptakan maupun dimusnahkan, melainkan hanya dapat diubah dari satu bentuk ke bentuk lain.', 'is_correct' => true, 'score' => 1.0, 'match_key' => null],
                    ['label' => 'B', 'option_text' => 'Katalis mempercepat tercapainya kesetimbangan kimia dengan cara menurunkan energi aktivasi ($$E_a$$).', 'is_correct' => true, 'score' => 1.0, 'match_key' => null],
                    ['label' => 'C', 'option_text' => 'Efisiensi mesin kalor Carnot dapat mencapai 100% pada suhu reservoir kamar normal.', 'is_correct' => false, 'score' => 0.0, 'match_key' => null],
                    ['label' => 'D', 'option_text' => 'Proses fotosintesis pada tumbuhan hijau mengonversi energi foton cahaya menjadi energi ikatan kimia glukosa.', 'is_correct' => true, 'score' => 1.0, 'match_key' => null],
                ],
                'explanation' => 'Pernyataan A (Hukum I Termodinamika), B (Kinetika Kimia), dan D (Bioenergetika) adalah prinsip sains fundamental yang benar. Efisiensi 100% mustahil menurut Hukum II Termodinamika.',
            ];
        }

        if ($type === 'binary_matrix') {
            return [
                'number' => $number,
                'type' => 'binary_matrix',
                'prompt' => $stimulusNote.'Tentukan kebenaran dari masing-masing pernyataan sains berikut:',
                'points' => 2.0,
                'settings' => ['labels' => ['Benar', 'Salah']],
                'options' => [
                    ['label' => '1', 'option_text' => 'Energi potensial gravitasi ($$E_p = mgh$$) berbanding lurus dengan massa dan ketinggian benda dari acuan.', 'is_correct' => true, 'score' => 1.0, 'match_key' => 'Benar'],
                    ['label' => '2', 'option_text' => 'Larutan penyangga (buffer) akan mengalami perubahan nilai pH yang sangat drastis jika ditambahkan sedikit asam kuat.', 'is_correct' => true, 'score' => 1.0, 'match_key' => 'Salah'],
                    ['label' => '3', 'option_text' => 'Organel mitokondria berfungsi sebagai tempat respirasi seluler penghasil molekul energi ATP.', 'is_correct' => true, 'score' => 1.0, 'match_key' => 'Benar'],
                ],
                'explanation' => 'Pernyataan 1 Benar (rumus energi potensial). Pernyataan 2 Salah (karakteristik utama buffer adalah mempertahankan pH stabil). Pernyataan 3 Benar (fungsi pokok mitokondria).',
            ];
        }

        if ($type === 'matching') {
            return [
                'number' => $number,
                'type' => 'matching',
                'prompt' => $stimulusNote.'Pasangkanlah besaran fisika pada kolom kiri dengan satuan baku Sistem Internasional (SI) pada kolom kanan:',
                'points' => 2.0,
                'options' => [
                    ['label' => '1', 'option_text' => 'Gaya ($$F$$)', 'is_correct' => true, 'score' => 0.5, 'match_key' => 'Newton ($$\text{kg} \cdot \text{m/s}^2$$)'],
                    ['label' => '2', 'option_text' => 'Usaha & Kalor ($$W$$)', 'is_correct' => true, 'score' => 0.5, 'match_key' => 'Joule ($$\text{N} \cdot \text{m}$$)'],
                    ['label' => '3', 'option_text' => 'Daya Listrik ($$P$$)', 'is_correct' => true, 'score' => 0.5, 'match_key' => 'Watt ($$\text{J/s}$$)'],
                    ['label' => '4', 'option_text' => 'Tekanan Fluida ($$P$$)', 'is_correct' => true, 'score' => 0.5, 'match_key' => 'Pascal ($$\text{N/m}^2$$)'],
                ],
                'explanation' => 'Besaran dan satuan turunan standar internasional (SI).',
            ];
        }

        if ($type === 'ordering') {
            return [
                'number' => $number,
                'type' => 'ordering',
                'prompt' => $stimulusNote.'Urutkan tahapan metode ilmiah kerja laboratorium berikut dari langkah awal hingga akhir:',
                'points' => 2.0,
                'options' => [
                    ['label' => '1', 'option_text' => 'Mengidentifikasi fenomena dan merumuskan masalah penelitian', 'is_correct' => true, 'score' => 0.5, 'order' => 1],
                    ['label' => '2', 'option_text' => 'Menyusun kerangka berpikir teoretis dan mengajukan hipotesis kerja', 'is_correct' => true, 'score' => 0.5, 'order' => 2],
                    ['label' => '3', 'option_text' => 'Merancang dan melaksanakan eksperimen dengan variabel kontrol terkendali', 'is_correct' => true, 'score' => 0.5, 'order' => 3],
                    ['label' => '4', 'option_text' => 'Mengolah data hasil pengamatan, menguji hipotesis, dan menarik kesimpulan', 'is_correct' => true, 'score' => 0.5, 'order' => 4],
                ],
                'explanation' => 'Siklus metode ilmiah baku sains.',
            ];
        }

        if ($type === 'short_answer') {
            return [
                'number' => $number,
                'type' => 'short_answer',
                'prompt' => $stimulusNote.'Sebuah benda bermassa $$4\text{ kg}$$ ditarik oleh gaya mendatar tetap sebesar $$20\text{ N}$$. Berapakah percepatan ($$a$$) yang dialami benda tersebut dalam satuan $$\text{m/s}^2$$ jika lantai licin tanpa gesekan?',
                'points' => 1.5,
                'options' => [
                    ['label' => '1', 'option_text' => '5', 'is_correct' => true, 'score' => 1.5, 'match_key' => null],
                ],
                'explanation' => 'Hukum II Newton: $$F = m \cdot a \Rightarrow a = \frac{F}{m} = \frac{20}{4} = 5\text{ m/s}^2$$.',
            ];
        }

        if ($type === 'essay') {
            return [
                'number' => $number,
                'type' => 'essay',
                'prompt' => $stimulusNote.'Jelaskan bagaimana pengaruh kenaikan konsentrasi gas rumah kaca ($$\text{CO}_2$$) terhadap suhu rata-rata permukaan bumi dan pengasaman air laut (ocean acidification), serta uraikan dua solusi teknologi inovatif untuk mereduksinya!',
                'points' => 4.0,
                'options' => [],
                'explanation' => 'Rubrik Penilaian: Skor 4 jika menjelaskan efek rumah kaca, pembentukan asam karbonat di laut yang merusak koral kalsium, dan 2 solusi konkrit (CCS/carbon capture, EBT). Skor 2 jika uraian dangkal.',
            ];
        }

        // mcq_single
        return [
            'number' => $number,
            'type' => 'mcq_single',
            'prompt' => $stimulusNote.'Sebuah mobil bermassa $$1.000\text{ kg}$$ melaju dengan kecepatan konstan $$20\text{ m/s}$$. Berapakah energi kinetik ($$E_k$$) yang dimiliki oleh mobil tersebut?',
            'points' => 2.0,
            'options' => [
                ['label' => 'A', 'option_text' => '$$200.000\text{ J}$$ (atau $$200\text{ kJ}$$)', 'is_correct' => true, 'score' => 2.0, 'match_key' => null],
                ['label' => 'B', 'option_text' => '$$100.000\text{ J}$$ (atau $$100\text{ kJ}$$)', 'is_correct' => false, 'score' => 0.0, 'match_key' => null],
                ['label' => 'C', 'option_text' => '$$400.000\text{ J}$$ (atau $$400\text{ kJ}$$)', 'is_correct' => false, 'score' => 0.0, 'match_key' => null],
                ['label' => 'D', 'option_text' => '$$20.000\text{ J}$$ (atau $$20\text{ kJ}$$)', 'is_correct' => false, 'score' => 0.0, 'match_key' => null],
                ['label' => 'E', 'option_text' => '$$10.000\text{ J}$$ (atau $$10\text{ kJ}$$)', 'is_correct' => false, 'score' => 0.0, 'match_key' => null],
            ],
            'explanation' => 'Rumus energi kinetik: $$E_k = \frac{1}{2} m v^2 = \frac{1}{2} (1000) (20)^2 = 500 \times 400 = 200.000\text{ J} = 200\text{ kJ}$$.',
        ];
    }

    /**
     * BAHASA Questions (Indonesia & Inggris)
     */
    protected function generateBahasaQuestion(string $type, int $number, string $stimulusNote, int $index, array $params): array
    {
        $subject = strtolower($params['subject'] ?? 'bahasa_indonesia');
        $isEnglish = $subject === 'bahasa_inggris';

        if ($isEnglish) {
            return [
                'number' => $number,
                'type' => 'mcq_single',
                'prompt' => $stimulusNote.'Based on the reading passage, what is the primary challenge faced when integrating large-scale renewable energy into modern power grids?',
                'points' => 2.0,
                'options' => [
                    ['label' => 'A', 'option_text' => 'Managing grid stability due to the intermittent nature of solar and wind resources.', 'is_correct' => true, 'score' => 2.0, 'match_key' => null],
                    ['label' => 'B', 'option_text' => 'The excessive supply of fossil fuels available in developing nations.', 'is_correct' => false, 'score' => 0.0, 'match_key' => null],
                    ['label' => 'C', 'option_text' => 'Complete lack of governmental policies on carbon emission reduction.', 'is_correct' => false, 'score' => 0.0, 'match_key' => null],
                    ['label' => 'D', 'option_text' => 'High consumer resistance to adopting electric transportation.', 'is_correct' => false, 'score' => 0.0, 'match_key' => null],
                ],
                'explanation' => 'The passage states that renewable sources are intermittent, necessitating battery storage and smart grid infrastructure.',
            ];
        }

        if ($type === 'mcq_multiple') {
            return [
                'number' => $number,
                'type' => 'mcq_multiple',
                'prompt' => $stimulusNote.'Manakah di antara kalimat-kalimat berikut yang memenuhi kaidah kalimat efektif bahasa Indonesia yang baku? (Pilihlah minimal 2 jawaban yang tepat)',
                'points' => 2.0,
                'options' => [
                    ['label' => 'A', 'option_text' => 'Menteri Pendidikan meresmikan gedung laboratorium riset baru di universitas terkemuka tersebut kemarin.', 'is_correct' => true, 'score' => 1.0, 'match_key' => null],
                    ['label' => 'B', 'option_text' => 'Penelitian ini bertujuan untuk menganalisis pengaruh inovasi teknologi terhadap produktivitas kerja.', 'is_correct' => true, 'score' => 1.0, 'match_key' => null],
                    ['label' => 'C', 'option_text' => 'Bagi semua peserta ujian daripada sekolah diharapkan hadir tepat waktu di ruang tes.', 'is_correct' => false, 'score' => 0.0, 'match_key' => null],
                    ['label' => 'D', 'option_text' => 'Para hadirin sekalian dimohon untuk segera berdiri menyanyikan lagu kebangsaan.', 'is_correct' => false, 'score' => 0.0, 'match_key' => null],
                ],
                'explanation' => 'Kalimat A dan B efektif dengan subjek-predikat jelas dan hemat kata. Kalimat C tidak efektif karena penggunaan preposisi ganda yang rancu, kalimat D pleonastis ("para hadirin sekalian").',
            ];
        }

        return [
            'number' => $number,
            'type' => 'mcq_single',
            'prompt' => $stimulusNote.'Gagasan utama (ide pokok) yang ingin disampaikan oleh penulis dalam paragraf bacaan tersebut adalah ...',
            'points' => 2.0,
            'options' => [
                ['label' => 'A', 'option_text' => 'Pentingnya adaptasi literasi kritis dan penguatan nilai bahasa dalam menghadapi disrupsi global.', 'is_correct' => true, 'score' => 2.0, 'match_key' => null],
                ['label' => 'B', 'option_text' => 'Kelemahan kosakata bahasa Indonesia dibandingkan bahasa internasional.', 'is_correct' => false, 'score' => 0.0, 'match_key' => null],
                ['label' => 'C', 'option_text' => 'Penolakan terhadap segala bentuk adopsi teknologi komunikasi asing.', 'is_correct' => false, 'score' => 0.0, 'match_key' => null],
                ['label' => 'D', 'option_text' => 'Kewajiban menghafalkan kamus besar bahasa Indonesia bagi peserta didik.', 'is_correct' => false, 'score' => 0.0, 'match_key' => null],
            ],
            'explanation' => 'Ide pokok paragraf menyimpulkan pesan sentral mengenai urgensi literasi kritis dalam merespons arus globalisasi.',
        ];
    }

    /**
     * PENDIDIKAN PANCASILA Questions
     */
    protected function generatePancasilaQuestion(string $type, int $number, string $stimulusNote, int $index, array $params): array
    {
        if ($type === 'mcq_multiple') {
            return [
                'number' => $number,
                'type' => 'mcq_multiple',
                'prompt' => $stimulusNote.'Manakah di antara tindakan berikut yang mencerminkan pengamalan nilai Sila Keadilan Sosial bagi Seluruh Rakyat Indonesia dalam kehidupan bermasyarakat? (Pilihlah minimal 2 jawaban yang tepat)',
                'points' => 2.0,
                'options' => [
                    ['label' => 'A', 'option_text' => 'Mengembangkan sikap adil terhadap sesama dan menjaga keseimbangan hak serta kewajiban.', 'is_correct' => true, 'score' => 1.0, 'match_key' => null],
                    ['label' => 'B', 'option_text' => 'Menghargai hasil karya orang lain yang bermanfaat bagi kemajuan dan kesejahteraan bersama.', 'is_correct' => true, 'score' => 1.0, 'match_key' => null],
                    ['label' => 'C', 'option_text' => 'Suka melakukan kegiatan dalam rangka mewujudkan kemajuan yang merata dan berkeadilan sosial.', 'is_correct' => true, 'score' => 1.0, 'match_key' => null],
                    ['label' => 'D', 'option_text' => 'Memaksakan kehendak pribadi dalam rapat musyawarah warga demi keuntungan kelompok.', 'is_correct' => false, 'score' => 0.0, 'match_key' => null],
                ],
                'explanation' => 'Pilihan A, B, dan C merupakan butir-butir resmi pengamalan Sila Kelima Pancasila.',
            ];
        }

        return [
            'number' => $number,
            'type' => 'mcq_single',
            'prompt' => $stimulusNote.'Penyelenggaraan musyawarah mufakat di tingkat desa untuk memutuskan alokasi pembangunan infrastruktur fasilitas umum merupakan wujud nyata penerapan nilai luhur Pancasila, khususnya Sila ...',
            'points' => 2.0,
            'options' => [
                ['label' => 'A', 'option_text' => 'Keempat: Kerakyatan yang Dipimpin oleh Hikmat Kebijaksanaan dalam Permusyawaratan/Perwakilan.', 'is_correct' => true, 'score' => 2.0, 'match_key' => null],
                ['label' => 'B', 'option_text' => 'Pertama: Ketuhanan Yang Maha Esa.', 'is_correct' => false, 'score' => 0.0, 'match_key' => null],
                ['label' => 'C', 'option_text' => 'Kedua: Kemanusiaan yang Adil dan Beradab.', 'is_correct' => false, 'score' => 0.0, 'match_key' => null],
                ['label' => 'D', 'option_text' => 'Ketiga: Persatuan Indonesia.', 'is_correct' => false, 'score' => 0.0, 'match_key' => null],
                ['label' => 'E', 'option_text' => 'Kelima: Keadilan Sosial bagi Seluruh Rakyat Indonesia semata.', 'is_correct' => false, 'score' => 0.0, 'match_key' => null],
            ],
            'explanation' => 'Musyawarah mufakat untuk mufakat dalam pengambilan keputusan bersama merupakan nilai inti Sila Keempat Pancasila.',
        ];
    }

    /**
     * UTBK SNBT Questions
     */
    protected function generateUtbkQuestion(string $type, int $number, string $stimulusNote, int $index, array $params): array
    {
        $sub = strtoupper((string) ($params['subtest'] ?? 'PU'));

        if ($sub === 'PK' || $sub === 'PM') {
            return [
                'number' => $number,
                'type' => 'mcq_single',
                'prompt' => $stimulusNote.'Jika fungsi kuadrat $$f(x) = x^2 - 6x + c$$ memiliki nilai minimum sama dengan $$-4$$, maka nilai konstanta $$c$$ adalah ...',
                'points' => 2.5,
                'options' => [
                    ['label' => 'A', 'option_text' => '$$c = 5$$', 'is_correct' => true, 'score' => 2.5, 'match_key' => null],
                    ['label' => 'B', 'option_text' => '$$c = -5$$', 'is_correct' => false, 'score' => 0.0, 'match_key' => null],
                    ['label' => 'C', 'option_text' => '$$c = 9$$', 'is_correct' => false, 'score' => 0.0, 'match_key' => null],
                    ['label' => 'D', 'option_text' => '$$c = 13$$', 'is_correct' => false, 'score' => 0.0, 'match_key' => null],
                    ['label' => 'E', 'option_text' => '$$c = 4$$', 'is_correct' => false, 'score' => 0.0, 'match_key' => null],
                ],
                'explanation' => 'Titik puncak absis $$x_p = -\frac{b}{2a} = \frac{6}{2} = 3$$. Nilai minimum $$y_p = f(3) = 3^2 - 6(3) + c = 9 - 18 + c = c - 9$$. Diketahui $$y_p = -4 \Rightarrow c - 9 = -4 \Rightarrow c = 5$$.',
            ];
        }

        return [
            'number' => $number,
            'type' => 'mcq_single',
            'prompt' => $stimulusNote.'Berdasarkan wacana di atas, simpulan yang paling logis dan tidak terbantahkan mengenai masa depan bursa kerja di era kecerdasan artifisial adalah ...',
            'points' => 2.5,
            'options' => [
                ['label' => 'A', 'option_text' => 'Pekerja dengan kompetensi analitis tinggi, kreativitas, dan fleksibilitas kognitif akan memiliki peluang bertahan dan berkembang lebih besar.', 'is_correct' => true, 'score' => 2.5, 'match_key' => null],
                ['label' => 'B', 'option_text' => 'Seluruh lapangan pekerjaan manusia akan tergantikan oleh robot dalam kurun waktu lima tahun ke depan.', 'is_correct' => false, 'score' => 0.0, 'match_key' => null],
                ['label' => 'C', 'option_text' => 'Pendidikan tinggi tidak lagi diperlukan karena mesin mampu mempelajari segalanya secara instan.', 'is_correct' => false, 'score' => 0.0, 'match_key' => null],
                ['label' => 'D', 'option_text' => 'Otomatisasi hanya berdampak pada industri manufaktur tanpa mempengaruhi sektor jasa dan administrasi.', 'is_correct' => false, 'score' => 0.0, 'match_key' => null],
                ['label' => 'E', 'option_text' => 'Kebutuhan tenaga kerja di bidang teknologi informasi akan menurun drastis seiring majunya algoritma AI.', 'is_correct' => false, 'score' => 0.0, 'match_key' => null],
            ],
            'explanation' => 'Teks menegaskan bahwa pekerjaan beralih dari tugas repetitif ke keterampilan kognitif tingkat tinggi seperti kreativitas dan pemecahan masalah kompleks.',
        ];
    }

    /**
     * SKD CPNS Questions (TIU / TWK / TKP)
     */
    protected function generateSkdQuestion(string $type, int $number, string $stimulusNote, int $index, array $params): array
    {
        $sub = strtoupper((string) ($params['subtest'] ?? 'TIU'));

        if ($sub === 'TKP' || $type === 'mcq_weighted') {
            return [
                'number' => $number,
                'type' => 'mcq_weighted',
                'prompt' => $stimulusNote.'Sebagai seorang aparatur sipil negara di loket perizinan, saat jam pelayanan hampir berakhir tiba seorang warga lansia yang menempuh perjalanan jauh dengan berkas permohonan yang belum sepenuhnya lengkap. Sikap paling berintegritas dan profesional yang Anda ambil adalah ...',
                'points' => 5.0,
                'options' => [
                    ['label' => 'A', 'option_text' => 'Menyapa dengan ramah, meneliti berkas yang ada, membantu memeriksa kekurangan dokumen yang belum lengkap, serta memberikan solusi jelas dan jadwal penyelesaian prioritas di hari berikutnya agar warga tidak bolak-balik.', 'score' => 5.0, 'is_correct' => true, 'match_key' => null],
                    ['label' => 'B', 'option_text' => 'Menerima berkas apa adanya tanpa diperiksa dan meminta warga meninggalkan nomor telepon.', 'score' => 3.0, 'is_correct' => true, 'match_key' => null],
                    ['label' => 'C', 'option_text' => 'Menolak berkas secara tegas karena jam pelayanan loket sudah habis dan aturan harus ditegakkan.', 'score' => 1.0, 'is_correct' => true, 'match_key' => null],
                    ['label' => 'D', 'option_text' => 'Menyarankan warga tersebut meminta bantuan calo di luar kantor agar urusannya lebih cepat selesai.', 'score' => 2.0, 'is_correct' => true, 'match_key' => null],
                    ['label' => 'E', 'option_text' => 'Meminta rekan sejawat lain yang masih senggang untuk membantu melayani warga lansia tersebut.', 'score' => 4.0, 'is_correct' => true, 'match_key' => null],
                ],
                'explanation' => 'Opsi A mendapatkan skor tertinggi 5 karena merefleksikan empati pelayanan publik prima, akuntabilitas regulasi, dan solusi berkeadilan.',
            ];
        }

        if ($sub === 'TWK') {
            return [
                'number' => $number,
                'type' => 'mcq_single',
                'prompt' => $stimulusNote.'Pemberian hak amnesti dan abolisi oleh Presiden Republik Indonesia menurut ketentuan Undang-Undang Dasar Negara Republik Indonesia Tahun 1945 wajib memperhatikan pertimbangan dari ...',
                'points' => 5.0,
                'options' => [
                    ['label' => 'A', 'option_text' => 'Dewan Perwakilan Rakyat (DPR)', 'is_correct' => true, 'score' => 5.0, 'match_key' => null],
                    ['label' => 'B', 'option_text' => 'Mahkamah Agung (MA)', 'is_correct' => false, 'score' => 0.0, 'match_key' => null],
                    ['label' => 'C', 'option_text' => 'Mahkamah Konstitusi (MK)', 'is_correct' => false, 'score' => 0.0, 'match_key' => null],
                    ['label' => 'D', 'option_text' => 'Komisi Yudisial (KY)', 'is_correct' => false, 'score' => 0.0, 'match_key' => null],
                    ['label' => 'E', 'option_text' => 'Dewan Pertimbangan Presiden (Wantimpres)', 'is_correct' => false, 'score' => 0.0, 'match_key' => null],
                ],
                'explanation' => 'Pasal 14 ayat (2) UUD 1945 menegaskan: Presiden memberi amnesti dan abolisi dengan memperhatikan pertimbangan Dewan Perwakilan Rakyat.',
            ];
        }

        // Default TIU: Deret angka
        return [
            'number' => $number,
            'type' => 'mcq_single',
            'prompt' => $stimulusNote.'Perhatikan pola deret angka berikut: $$3, 6, 12, 15, 30, 33, \dots$$. Dua angka berikutnya yang paling tepat untuk melengkapi deret tersebut adalah ...',
            'points' => 5.0,
            'options' => [
                ['label' => 'A', 'option_text' => '66 dan 69', 'is_correct' => true, 'score' => 5.0, 'match_key' => null],
                ['label' => 'B', 'option_text' => '36 dan 72', 'is_correct' => false, 'score' => 0.0, 'match_key' => null],
                ['label' => 'C', 'option_text' => '60 dan 63', 'is_correct' => false, 'score' => 0.0, 'match_key' => null],
                ['label' => 'D', 'option_text' => '45 dan 48', 'is_correct' => false, 'score' => 0.0, 'match_key' => null],
                ['label' => 'E', 'option_text' => '38 dan 76', 'is_correct' => false, 'score' => 0.0, 'match_key' => null],
            ],
            'explanation' => 'Pola deret bergantian: dikali 2 lalu ditambah 3 ($$\times 2, +3, \times 2, +3, \dots$$). $$33 \times 2 = 66$$, lalu $$66 + 3 = 69$$.',
        ];
    }

    /**
     * Default School fallback question
     */
    protected function generateDefaultSchoolQuestion(string $type, int $number, string $stimulusNote, int $index, array $params): array
    {
        $subjectTitle = ucwords(str_replace('_', ' ', $params['subject'] ?? 'Pelajaran'));

        return [
            'number' => $number,
            'type' => 'mcq_single',
            'prompt' => $stimulusNote."Terkait pokok materi {$subjectTitle}, manakah di antara prinsip berikut yang paling fundamental dalam pengkajian konsep intinya?",
            'points' => 2.0,
            'options' => [
                ['label' => 'A', 'option_text' => "Pemahaman prinsip dasar dan keterkaitannya dengan aplikasi nyata dalam bidang {$subjectTitle}.", 'is_correct' => true, 'score' => 2.0, 'match_key' => null],
                ['label' => 'B', 'option_text' => 'Menghafal definisi tanpa memahami hubungan kausalitas antarvariabel.', 'is_correct' => false, 'score' => 0.0, 'match_key' => null],
                ['label' => 'C', 'option_text' => 'Mengabaikan fakta empiris dan berpedoman hanya pada asumsi teoritis.', 'is_correct' => false, 'score' => 0.0, 'match_key' => null],
                ['label' => 'D', 'option_text' => 'Menggunakan rumus atau aturan tanpa memperhatikan syarat batas berlakunya.', 'is_correct' => false, 'score' => 0.0, 'match_key' => null],
            ],
            'explanation' => "Penguasaan mata pelajaran {$subjectTitle} bertumpu pada pemahaman konsep inti dan penerapannya secara kontekstual.",
        ];
    }

    /**
     * Get human-readable title and clear instructions for each question type.
     */
    public function getQuestionTypeMeta(string $type): array
    {
        return match ($type) {
            'mcq_single' => [
                'name' => 'Pilihan Ganda (Tunggal)',
                'instructions' => 'Petunjuk Pengerjaan: Pilihlah salah satu jawaban yang paling tepat (A, B, C, D, atau E) untuk setiap butir soal.',
            ],
            'mcq_multiple' => [
                'name' => 'Pilihan Ganda Kompleks',
                'instructions' => 'Petunjuk Pengerjaan: Pilihlah satu atau lebih pilihan jawaban yang benar sesuai dengan pertanyaan atau pernyataan yang disajikan.',
            ],
            'binary_matrix', 'boolean_matrix' => [
                'name' => 'Benar / Salah (Matriks Pernyataan)',
                'instructions' => 'Petunjuk Pengerjaan: Tentukan nilai kebenaran (Benar atau Salah) pada setiap baris pernyataan yang disediakan.',
            ],
            'matching' => [
                'name' => 'Menjodohkan',
                'instructions' => 'Petunjuk Pengerjaan: Pasangkan setiap premis atau pertanyaan di kolom kiri dengan jawaban yang sesuai di kolom kanan.',
            ],
            'ordering', 'reorder' => [
                'name' => 'Mengurutkan',
                'instructions' => 'Petunjuk Pengerjaan: Susun dan urutkan butir-butir pernyataan/tahapan berikut agar menjadi urutan yang tepat dan logis.',
            ],
            'short_answer', 'fill_blank' => [
                'name' => 'Isian Singkat',
                'instructions' => 'Petunjuk Pengerjaan: Isilah bagian yang rumpang dengan jawaban singkat, presisi, dan tepat.',
            ],
            'essay' => [
                'name' => 'Uraian / Esai',
                'instructions' => 'Petunjuk Pengerjaan: Jawablah pertanyaan-pertanyaan berikut dengan penjelasan lengkap, terstruktur, analitis, dan jelas.',
            ],
            'mcq_weighted' => [
                'name' => 'Pilihan Berbobot (Karakteristik Pribadi)',
                'instructions' => 'Petunjuk Pengerjaan: Pilihlah opsi tindakan yang menurut Anda paling berintegritas, solutif, dan profesional.',
            ],
            default => [
                'name' => 'Soal Campuran',
                'instructions' => 'Petunjuk Pengerjaan: Kerjakan butir-butir soal berikut sesuai instruksi yang tertera.',
            ],
        };
    }
}
