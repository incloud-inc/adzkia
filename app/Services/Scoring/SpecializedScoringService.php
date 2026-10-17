<?php

namespace App\Services\Scoring;

use App\Models\Assessment;
use Illuminate\Support\Collection;

class SpecializedScoringService
{
    /**
     * Tabel konversi ETS TOEIC: Raw Score (0 - 100) -> Scaled Score Listening (5 - 495).
     */
    private const TOEIC_LISTENING_TABLE = [
        0 => 5, 1 => 5, 2 => 5, 3 => 5, 4 => 5, 5 => 5, 6 => 10, 7 => 15, 8 => 20, 9 => 25,
        10 => 30, 11 => 35, 12 => 40, 13 => 45, 14 => 50, 15 => 55, 16 => 60, 17 => 65, 18 => 70, 19 => 75,
        20 => 80, 21 => 85, 22 => 90, 23 => 95, 24 => 100, 25 => 110, 26 => 115, 27 => 120, 28 => 125, 29 => 130,
        30 => 135, 31 => 140, 32 => 145, 33 => 150, 34 => 160, 35 => 165, 36 => 170, 37 => 175, 38 => 180, 39 => 185,
        40 => 190, 41 => 195, 42 => 200, 43 => 210, 44 => 215, 45 => 220, 46 => 230, 47 => 240, 48 => 245, 49 => 250,
        50 => 255, 51 => 260, 52 => 265, 53 => 270, 54 => 275, 55 => 280, 56 => 290, 57 => 295, 58 => 300, 59 => 305,
        60 => 310, 61 => 315, 62 => 320, 63 => 325, 64 => 330, 65 => 335, 66 => 340, 67 => 345, 68 => 350, 69 => 355,
        70 => 360, 71 => 365, 72 => 370, 73 => 375, 74 => 380, 75 => 385, 76 => 390, 77 => 395, 78 => 400, 79 => 405,
        80 => 410, 81 => 415, 82 => 420, 83 => 425, 84 => 430, 85 => 435, 86 => 440, 87 => 445, 88 => 450, 89 => 455,
        90 => 460, 91 => 465, 92 => 470, 93 => 475, 94 => 480, 95 => 485, 96 => 490, 97 => 495, 98 => 495, 99 => 495,
        100 => 495,
    ];

    /**
     * Tabel konversi ETS TOEIC: Raw Score (0 - 100) -> Scaled Score Reading (5 - 495).
     */
    private const TOEIC_READING_TABLE = [
        0 => 5, 1 => 5, 2 => 5, 3 => 5, 4 => 5, 5 => 5, 6 => 10, 7 => 15, 8 => 20, 9 => 25,
        10 => 30, 11 => 35, 12 => 40, 13 => 45, 14 => 50, 15 => 55, 16 => 60, 17 => 65, 18 => 70, 19 => 75,
        20 => 80, 21 => 85, 22 => 90, 23 => 95, 24 => 100, 25 => 105, 26 => 110, 27 => 115, 28 => 120, 29 => 125,
        30 => 130, 31 => 135, 32 => 140, 33 => 145, 34 => 150, 35 => 155, 36 => 160, 37 => 165, 38 => 170, 39 => 175,
        40 => 180, 41 => 185, 42 => 190, 43 => 195, 44 => 200, 45 => 205, 46 => 210, 47 => 215, 48 => 220, 49 => 225,
        50 => 235, 51 => 240, 52 => 245, 53 => 250, 54 => 255, 55 => 260, 56 => 265, 57 => 270, 58 => 275, 59 => 280,
        60 => 285, 61 => 290, 62 => 295, 63 => 300, 64 => 305, 65 => 310, 66 => 315, 67 => 320, 68 => 325, 69 => 330,
        70 => 335, 71 => 340, 72 => 345, 73 => 350, 74 => 355, 75 => 360, 76 => 365, 77 => 370, 78 => 375, 79 => 380,
        80 => 385, 81 => 390, 82 => 395, 83 => 400, 84 => 405, 85 => 410, 86 => 415, 87 => 420, 88 => 425, 89 => 430,
        90 => 435, 91 => 440, 92 => 445, 93 => 450, 94 => 455, 95 => 465, 96 => 470, 97 => 480, 98 => 485, 99 => 490,
        100 => 495,
    ];

    /**
     * Tabel konversi ETS TOEFL ITP:
     * Section 1: Listening (Raw 0 - 50 -> Scaled 31 - 68)
     */
    private const TOEFL_LISTENING_TABLE = [
        0 => 31, 1 => 31, 2 => 31, 3 => 32, 4 => 32, 5 => 33, 6 => 33, 7 => 34, 8 => 35, 9 => 36,
        10 => 37, 11 => 38, 12 => 39, 13 => 40, 14 => 41, 15 => 41, 16 => 42, 17 => 43, 18 => 44, 19 => 45,
        20 => 45, 21 => 46, 22 => 47, 23 => 48, 24 => 48, 25 => 49, 26 => 50, 27 => 51, 28 => 51, 29 => 52,
        30 => 52, 31 => 53, 32 => 54, 33 => 54, 34 => 55, 35 => 56, 36 => 56, 37 => 57, 38 => 58, 39 => 59,
        40 => 60, 41 => 61, 42 => 62, 43 => 63, 44 => 64, 45 => 65, 46 => 66, 47 => 67, 48 => 68, 49 => 68,
        50 => 68,
    ];

    /**
     * Tabel konversi ETS TOEFL ITP:
     * Section 2: Structure & Written Expression (Raw 0 - 40 -> Scaled 31 - 68)
     */
    private const TOEFL_STRUCTURE_TABLE = [
        0 => 31, 1 => 31, 2 => 31, 3 => 32, 4 => 33, 5 => 34, 6 => 35, 7 => 36, 8 => 37, 9 => 38,
        10 => 40, 11 => 40, 12 => 41, 13 => 42, 14 => 43, 15 => 44, 16 => 45, 17 => 46, 18 => 47, 19 => 48,
        20 => 49, 21 => 50, 22 => 51, 23 => 52, 24 => 53, 25 => 54, 26 => 55, 27 => 56, 28 => 57, 29 => 58,
        30 => 59, 31 => 60, 32 => 61, 33 => 62, 34 => 63, 35 => 64, 36 => 65, 37 => 66, 38 => 67, 39 => 68,
        40 => 68,
    ];

    /**
     * Tabel konversi ETS TOEFL ITP:
     * Section 3: Reading Comprehension (Raw 0 - 50 -> Scaled 31 - 67)
     */
    private const TOEFL_READING_TABLE = [
        0 => 31, 1 => 31, 2 => 31, 3 => 32, 4 => 32, 5 => 33, 6 => 34, 7 => 35, 8 => 36, 9 => 37,
        10 => 38, 11 => 39, 12 => 40, 13 => 41, 14 => 42, 15 => 43, 16 => 43, 17 => 44, 18 => 45, 19 => 46,
        20 => 46, 21 => 47, 22 => 48, 23 => 48, 24 => 49, 25 => 50, 26 => 50, 27 => 51, 28 => 52, 29 => 52,
        30 => 53, 31 => 54, 32 => 54, 33 => 55, 34 => 56, 35 => 56, 36 => 57, 37 => 58, 38 => 58, 39 => 59,
        40 => 60, 41 => 61, 42 => 62, 43 => 63, 44 => 64, 45 => 65, 46 => 65, 47 => 66, 48 => 67, 49 => 67,
        50 => 67,
    ];

    /**
     * Periksa apakah asesmen menggunakan skala penilaian terstandar khusus.
     */
    public function isSpecializedScale(?Assessment $assessment): bool
    {
        return $this->resolveScaleType($assessment) !== null;
    }

    /**
     * Dapatkan kode jenis skala khusus: 'toeic', 'toefl', 'utbk', atau null jika reguler.
     */
    public function resolveScaleType(?Assessment $assessment): ?string
    {
        if (! $assessment) {
            return null;
        }

        $type = strtolower(trim((string) $assessment->type));
        $scoringType = strtolower(trim((string) $assessment->scoring_type));
        $settings = (array) ($assessment->settings ?? []);
        $template = strtolower(trim((string) ($settings['scoring_template'] ?? '')));

        // 1. TOEIC
        if ($template === 'toeic' || in_array($scoringType, ['toeic', 'toeic_scale'], true) || ($type === 'toeic' && ! in_array($scoringType, ['standard', 'formula', 'weighted', 'rubric', 'manual'], true))) {
            return 'toeic';
        }

        // 2. TOEFL
        if ($template === 'toefl' || in_array($scoringType, ['toefl', 'toefl_scale'], true) || ($type === 'toefl' && ! in_array($scoringType, ['standard', 'formula', 'weighted', 'rubric', 'manual'], true))) {
            return 'toefl';
        }

        // 3. UTBK SNBT
        if ($template === 'utbk' || in_array($scoringType, ['utbk', 'utbk_irt', 'utbk_scale'], true) || ($type === 'utbk' && ! in_array($scoringType, ['standard', 'formula', 'weighted', 'rubric', 'manual'], true))) {
            return 'utbk';
        }

        return null;
    }

    /**
     * Hitung skor terkonversi resmi untuk asesmen berskala khusus.
     *
     * @param  Collection<int, mixed>  $sections
     * @param  Collection<int, mixed>  $questionMap
     * @param  Collection<int, mixed>|array  $answers
     * @return array{score: float, max_score: float, min_score: float, scale_type: string, scale_label: string, cefr: ?string, proficiency: ?string, breakdown: array}
     */
    public function calculateSpecializedScore(
        Assessment $assessment,
        Collection $sections,
        Collection $questionMap,
        $answers,
        float $scorePenalty = 0.0
    ): array {
        $scaleType = $this->resolveScaleType($assessment);

        return match ($scaleType) {
            'toeic' => $this->calculateToeic($sections, $questionMap, $answers, $scorePenalty),
            'toefl' => $this->calculateToefl($sections, $questionMap, $answers, $scorePenalty),
            'utbk' => $this->calculateUtbk($sections, $questionMap, $answers, $scorePenalty),
            default => [
                'score' => 0.0,
                'max_score' => 100.0,
                'min_score' => 0.0,
                'scale_type' => 'standard',
                'scale_label' => 'Skala Standar (0 - 100)',
                'cefr' => null,
                'proficiency' => null,
                'breakdown' => [],
            ],
        };
    }

    /**
     * Hitung Skor TOEIC Resmi ETS: Skala 10 - 990 (Kelipatan 5).
     */
    private function calculateToeic(
        Collection $sections,
        Collection $questionMap,
        $answers,
        float $scorePenalty = 0.0
    ): array {
        $listeningStats = ['correct' => 0, 'total' => 0];
        $readingStats = ['correct' => 0, 'total' => 0];

        // Kelompokkan butir soal per seksi
        $sectionQuestionCounts = [];
        foreach ($questionMap as $q) {
            $secId = $q->assessment_section_id ?: ($q->questionGroup?->assessment_section_id ?? null);
            if ($secId) {
                $sectionQuestionCounts[$secId] = ($sectionQuestionCounts[$secId] ?? 0) + 1;
            }
        }

        // Petakan tiap seksi: Listening vs Reading
        $sectionRoles = [];
        $secIndex = 0;
        foreach ($sections as $section) {
            $title = strtolower((string) $section->title);
            if (str_contains($title, 'listen')) {
                $sectionRoles[$section->id] = 'listening';
            } elseif (str_contains($title, 'read') || str_contains($title, 'structure') || str_contains($title, 'grammar')) {
                $sectionRoles[$section->id] = 'reading';
            } else {
                $sectionRoles[$section->id] = ($secIndex === 0) ? 'listening' : 'reading';
            }
            $secIndex++;
        }

        // Akumulasi total soal per peran
        foreach ($sectionQuestionCounts as $secId => $count) {
            $role = $sectionRoles[$secId] ?? 'listening';
            if ($role === 'listening') {
                $listeningStats['total'] += $count;
            } else {
                $readingStats['total'] += $count;
            }
        }

        // Akumulasi jawaban benar per peran
        foreach ($answers as $ans) {
            $qId = is_array($ans) ? ($ans['question_id'] ?? null) : ($ans->question_id ?? null);
            $q = $questionMap->get($qId);
            if (! $q) {
                continue;
            }

            $secId = $q->assessment_section_id ?: ($q->questionGroup?->assessment_section_id ?? null);
            $role = $sectionRoles[$secId] ?? 'listening';

            $isCorrect = is_array($ans) ? (bool) ($ans['is_correct'] ?? false) : (bool) ($ans->is_correct ?? false);
            if ($isCorrect) {
                if ($role === 'listening') {
                    $listeningStats['correct']++;
                } else {
                    $readingStats['correct']++;
                }
            }
        }

        // Normalisasi Raw Score ke basis 100 soal standar ETS
        $listeningRawNorm = $listeningStats['total'] > 0
            ? (int) round(($listeningStats['correct'] / $listeningStats['total']) * 100)
            : 0;
        $listeningRawNorm = min(100, max(0, $listeningRawNorm));

        $readingRawNorm = $readingStats['total'] > 0
            ? (int) round(($readingStats['correct'] / $readingStats['total']) * 100)
            : 0;
        $readingRawNorm = min(100, max(0, $readingRawNorm));

        // Konversi ke Scaled Score TOEIC (5 - 495)
        $listeningScaled = self::TOEIC_LISTENING_TABLE[$listeningRawNorm] ?? 5;
        $readingScaled = self::TOEIC_READING_TABLE[$readingRawNorm] ?? 5;

        // Total skor TOEIC: 10 - 990 (harus selalu kelipatan 5)
        $rawTotal = $listeningScaled + $readingScaled;
        $finalScore = max(10, min(990, (int) (round($rawTotal / 5) * 5) - (int) $scorePenalty));

        // Pemetaan CEFR Level TOEIC Resmi
        $cefr = match (true) {
            $finalScore >= 905 => 'C1',
            $finalScore >= 785 => 'B2',
            $finalScore >= 550 => 'B1',
            $finalScore >= 225 => 'A2',
            default => 'A1',
        };

        $proficiency = match (true) {
            $finalScore >= 905 => 'International Proficiency (C1)',
            $finalScore >= 785 => 'Working Proficiency Plus (B2)',
            $finalScore >= 550 => 'Limited Working Proficiency (B1)',
            $finalScore >= 225 => 'Elementary Proficiency (A2)',
            default => 'Basic / Novice Proficiency (A1)',
        };

        return [
            'score' => (float) $finalScore,
            'max_score' => 990.0,
            'min_score' => 10.0,
            'scale_type' => 'toeic',
            'scale_label' => 'Skala TOEIC (10 - 990)',
            'cefr' => $cefr,
            'proficiency' => $proficiency,
            'breakdown' => [
                'listening' => [
                    'title' => 'Listening Comprehension',
                    'raw_correct' => $listeningStats['correct'],
                    'raw_total' => $listeningStats['total'],
                    'raw_percentage' => $listeningStats['total'] > 0 ? round(($listeningStats['correct'] / $listeningStats['total']) * 100, 1) : 0,
                    'scaled_score' => $listeningScaled,
                    'max_scaled' => 495,
                    'min_scaled' => 5,
                ],
                'reading' => [
                    'title' => 'Reading Comprehension',
                    'raw_correct' => $readingStats['correct'],
                    'raw_total' => $readingStats['total'],
                    'raw_percentage' => $readingStats['total'] > 0 ? round(($readingStats['correct'] / $readingStats['total']) * 100, 1) : 0,
                    'scaled_score' => $readingScaled,
                    'max_scaled' => 495,
                    'min_scaled' => 5,
                ],
            ],
        ];
    }

    /**
     * Hitung Skor TOEFL ITP Resmi ETS: Skala 310 - 677.
     * Formula: round(((Scaled L + Scaled S + Scaled R) * 10) / 3)
     */
    private function calculateToefl(
        Collection $sections,
        Collection $questionMap,
        $answers,
        float $scorePenalty = 0.0
    ): array {
        $stats = [
            'listening' => ['correct' => 0, 'total' => 0],
            'structure' => ['correct' => 0, 'total' => 0],
            'reading' => ['correct' => 0, 'total' => 0],
        ];

        $sectionQuestionCounts = [];
        foreach ($questionMap as $q) {
            $secId = $q->assessment_section_id ?: ($q->questionGroup?->assessment_section_id ?? null);
            if ($secId) {
                $sectionQuestionCounts[$secId] = ($sectionQuestionCounts[$secId] ?? 0) + 1;
            }
        }

        $sectionRoles = [];
        $secIndex = 0;
        foreach ($sections as $section) {
            $title = strtolower((string) $section->title);
            if (str_contains($title, 'listen')) {
                $sectionRoles[$section->id] = 'listening';
            } elseif (str_contains($title, 'struct') || str_contains($title, 'written') || str_contains($title, 'grammar')) {
                $sectionRoles[$section->id] = 'structure';
            } elseif (str_contains($title, 'read')) {
                $sectionRoles[$section->id] = 'reading';
            } else {
                $fallbackRoles = ['listening', 'structure', 'reading'];
                $sectionRoles[$section->id] = $fallbackRoles[$secIndex % 3];
            }
            $secIndex++;
        }

        foreach ($sectionQuestionCounts as $secId => $count) {
            $role = $sectionRoles[$secId] ?? 'listening';
            $stats[$role]['total'] += $count;
        }

        foreach ($answers as $ans) {
            $qId = is_array($ans) ? ($ans['question_id'] ?? null) : ($ans->question_id ?? null);
            $q = $questionMap->get($qId);
            if (! $q) {
                continue;
            }

            $secId = $q->assessment_section_id ?: ($q->questionGroup?->assessment_section_id ?? null);
            $role = $sectionRoles[$secId] ?? 'listening';

            $isCorrect = is_array($ans) ? (bool) ($ans['is_correct'] ?? false) : (bool) ($ans->is_correct ?? false);
            if ($isCorrect) {
                $stats[$role]['correct']++;
            }
        }

        // Normalisasi Raw Score ke standar soal resmi ETS TOEFL ITP:
        // Listening: 50 soal, Structure: 40 soal, Reading: 50 soal
        $listeningNorm = $stats['listening']['total'] > 0
            ? (int) round(($stats['listening']['correct'] / $stats['listening']['total']) * 50)
            : 0;
        $listeningNorm = min(50, max(0, $listeningNorm));

        $structureNorm = $stats['structure']['total'] > 0
            ? (int) round(($stats['structure']['correct'] / $stats['structure']['total']) * 40)
            : 0;
        $structureNorm = min(40, max(0, $structureNorm));

        $readingNorm = $stats['reading']['total'] > 0
            ? (int) round(($stats['reading']['correct'] / $stats['reading']['total']) * 50)
            : 0;
        $readingNorm = min(50, max(0, $readingNorm));

        $scaledL = self::TOEFL_LISTENING_TABLE[$listeningNorm] ?? 31;
        $scaledS = self::TOEFL_STRUCTURE_TABLE[$structureNorm] ?? 31;
        $scaledR = self::TOEFL_READING_TABLE[$readingNorm] ?? 31;

        // Formula Resmi ETS TOEFL ITP
        $totalRaw = round((($scaledL + $scaledS + $scaledR) * 10) / 3);
        $finalScore = max(310, min(677, (int) $totalRaw - (int) $scorePenalty));

        // CEFR Mapping TOEFL ITP
        $cefr = match (true) {
            $finalScore >= 627 => 'C1',
            $finalScore >= 543 => 'B2',
            $finalScore >= 460 => 'B1',
            $finalScore >= 343 => 'A2',
            default => 'Below A2',
        };

        $proficiency = match (true) {
            $finalScore >= 627 => 'Gold / Advanced (C1)',
            $finalScore >= 543 => 'Silver / High Intermediate (B2)',
            $finalScore >= 460 => 'Bronze / Intermediate (B1)',
            $finalScore >= 343 => 'Basic / Elementary (A2)',
            default => 'Elementary / Beginner',
        };

        return [
            'score' => (float) $finalScore,
            'max_score' => 677.0,
            'min_score' => 310.0,
            'scale_type' => 'toefl',
            'scale_label' => 'Skala TOEFL ITP (310 - 677)',
            'cefr' => $cefr,
            'proficiency' => $proficiency,
            'breakdown' => [
                'listening' => [
                    'title' => 'Listening Comprehension',
                    'raw_correct' => $stats['listening']['correct'],
                    'raw_total' => $stats['listening']['total'],
                    'scaled_score' => $scaledL,
                    'max_scaled' => 68,
                    'min_scaled' => 31,
                ],
                'structure' => [
                    'title' => 'Structure & Written Expression',
                    'raw_correct' => $stats['structure']['correct'],
                    'raw_total' => $stats['structure']['total'],
                    'scaled_score' => $scaledS,
                    'max_scaled' => 68,
                    'min_scaled' => 31,
                ],
                'reading' => [
                    'title' => 'Reading Comprehension',
                    'raw_correct' => $stats['reading']['correct'],
                    'raw_total' => $stats['reading']['total'],
                    'scaled_score' => $scaledR,
                    'max_scaled' => 67,
                    'min_scaled' => 31,
                ],
            ],
        ];
    }

    /**
     * Hitung Skor UTBK SNBT Standar Seleksi Nasional: Skala 200 - 1000.
     * Mendukung seluruh rumpun tes:
     * 1. Tes Literasi & Numerasi:
     *    - Subtes 1: Literasi dalam Bahasa Indonesia (LBI)
     *    - Subtes 2: Literasi dalam Bahasa Inggris (LBE)
     *    - Subtes 3: Penalaran Matematika / Numerasi (PM)
     * 2. Tes Potensi Skolastik (TPS):
     *    - Kemampuan Penalaran Umum (KPU)
     *    - Pengetahuan & Pemahaman Umum (PPU)
     *    - Kemampuan Memahami Bacaan & Menulis (PBM)
     *    - Pengetahuan Kuantitatif (PK)
     */
    private function calculateUtbk(
        Collection $sections,
        Collection $questionMap,
        $answers,
        float $scorePenalty = 0.0
    ): array {
        $sectionStats = [];
        foreach ($sections as $section) {
            $sectionStats[$section->id] = [
                'correct' => 0,
                'incorrect' => 0,
                'unanswered' => 0,
                'total_questions' => 0,
                'raw_earned' => 0.0,
                'raw_max' => 0.0,
            ];
        }

        foreach ($questionMap as $q) {
            $secId = $q->assessment_section_id ?: ($q->questionGroup?->assessment_section_id ?? null);
            if ($secId && isset($sectionStats[$secId])) {
                $sectionStats[$secId]['total_questions']++;
                $sectionStats[$secId]['raw_max'] += (float) ($q->points ?? 1);
            }
        }

        $answersByQ = collect($answers)->keyBy(fn ($a) => is_array($a) ? ($a['question_id'] ?? null) : ($a->question_id ?? null));

        foreach ($questionMap as $q) {
            $secId = $q->assessment_section_id ?: ($q->questionGroup?->assessment_section_id ?? null);
            if (! $secId || ! isset($sectionStats[$secId])) {
                continue;
            }

            $ans = $answersByQ->get($q->id);
            if (! $ans) {
                $sectionStats[$secId]['unanswered']++;

                continue;
            }

            $isCorrect = is_array($ans) ? (bool) ($ans['is_correct'] ?? false) : (bool) ($ans->is_correct ?? false);
            $pointsAwarded = (float) (is_array($ans) ? ($ans['points_awarded'] ?? 0.0) : ($ans->points_awarded ?? 0.0));
            $isAnswered = is_array($ans)
                ? (! empty($ans['answer_payload']) && ! empty(array_filter((array) $ans['answer_payload'])))
                : (! empty($ans->answer_payload) && ! empty(array_filter((array) $ans->answer_payload)));

            if ($isCorrect) {
                $sectionStats[$secId]['correct']++;
            } elseif ($isAnswered || $pointsAwarded > 0) {
                $sectionStats[$secId]['incorrect']++;
            } else {
                $sectionStats[$secId]['unanswered']++;
            }

            $sectionStats[$secId]['raw_earned'] += $pointsAwarded;
        }

        $sectionBreakdown = [];
        $subtestScores = [];
        $groupAverages = [];

        foreach ($sections as $section) {
            $stats = $sectionStats[$section->id] ?? [
                'correct' => 0, 'incorrect' => 0, 'unanswered' => 0, 'total_questions' => 0, 'raw_earned' => 0.0, 'raw_max' => 0.0,
            ];
            $meta = $this->identifyUtbkSubtest((string) $section->title);

            $secMax = $stats['raw_max'] > 0 ? $stats['raw_max'] : 1.0;
            $secEarned = $stats['raw_earned'];
            $secPct = min(1.0, max(0.0, $secEarned / $secMax));
            $secScore = round(200.0 + ($secPct * 800.0), 1);

            $subtestProficiency = match (true) {
                $secScore >= 750 => 'Sangat Tinggi (Peluang Sangat Besar PTN Top)',
                $secScore >= 650 => 'Tinggi (Kompetitif PTN Favorit)',
                $secScore >= 550 => 'Sedang (Rata-rata Nasional SNBT)',
                $secScore >= 450 => 'Cukup',
                default => 'Perlu Peningkatan',
            };

            $subtestScores[$section->id] = $secScore;
            $groupAverages[$meta['group']][] = $secScore;

            $sectionBreakdown[$section->id] = [
                'title' => $meta['standard_title'],
                'original_title' => $section->title,
                'subtest_code' => $meta['code'],
                'subtest_group' => $meta['group'],
                'subtest_group_label' => $meta['group_label'],
                'raw_score' => $stats['correct'],
                'correct' => $stats['correct'],
                'incorrect' => $stats['incorrect'],
                'unanswered' => $stats['unanswered'],
                'total_questions' => $stats['total_questions'],
                'raw_earned' => round($secEarned, 1),
                'raw_max' => round($secMax, 1),
                'scaled_score' => $secScore,
                'max_scaled' => 1000,
                'min_scaled' => 200,
                'proficiency' => $subtestProficiency,
            ];
        }

        // Skor Komposit Resmi UTBK SNBT: Rata-rata terstandar dari setiap subtes yang diujikan
        $countSubtests = count($subtestScores);
        $meanScore = $countSubtests > 0 ? (array_sum($subtestScores) / $countSubtests) : 200.0;
        $finalScore = max(200.0, min(1000.0, round($meanScore - $scorePenalty, 1)));

        // Rata-rata per rumpun (Literasi & Numerasi vs TPS)
        $rumpunAverages = [];
        foreach ($groupAverages as $grpKey => $scores) {
            $rumpunAverages[$grpKey] = count($scores) > 0 ? round(array_sum($scores) / count($scores), 1) : 200.0;
        }

        $proficiency = match (true) {
            $finalScore >= 750 => 'Sangat Tinggi (Peluang Sangat Besar PTN Top)',
            $finalScore >= 650 => 'Tinggi (Kompetitif PTN Favorit)',
            $finalScore >= 550 => 'Sedang (Rata-rata Nasional SNBT)',
            $finalScore >= 450 => 'Cukup',
            default => 'Perlu Peningkatan',
        };

        return [
            'score' => (float) $finalScore,
            'max_score' => 1000.0,
            'min_score' => 200.0,
            'scale_type' => 'utbk',
            'scale_label' => 'Skala UTBK SNBT (200 - 1000)',
            'cefr' => null,
            'proficiency' => $proficiency,
            'rumpun_averages' => $rumpunAverages,
            'breakdown' => $sectionBreakdown,
        ];
    }

    /**
     * Identifikasi subtes UTBK SNBT berdasarkan judul seksi asesmen.
     *
     * @return array{code: string, standard_title: string, group: string, group_label: string}
     */
    public function identifyUtbkSubtest(string $title): array
    {
        $normalized = strtolower(trim($title));

        // 1. Literasi dalam Bahasa Indonesia (LBI)
        if (str_contains($normalized, 'literasi') && (str_contains($normalized, 'indonesia') || str_contains($normalized, 'indo') || str_contains($normalized, 'lbi'))) {
            return [
                'code' => 'LBI',
                'standard_title' => 'Literasi dalam Bahasa Indonesia',
                'group' => 'literasi_numerasi',
                'group_label' => 'Tes Literasi & Numerasi',
            ];
        }

        // 2. Literasi dalam Bahasa Inggris (LBE)
        if (str_contains($normalized, 'literasi') && (str_contains($normalized, 'inggris') || str_contains($normalized, 'english') || str_contains($normalized, 'lbe'))) {
            return [
                'code' => 'LBE',
                'standard_title' => 'Literasi dalam Bahasa Inggris',
                'group' => 'literasi_numerasi',
                'group_label' => 'Tes Literasi & Numerasi',
            ];
        }

        // 3. Penalaran Matematika / Numerasi (PM)
        if (str_contains($normalized, 'penalaran matematika') || str_contains($normalized, 'numerasi') || str_contains($normalized, 'penalaran mtk') || str_contains($normalized, 'matematika kontekstual') || str_ends_with($normalized, ' pm') || $normalized === 'pm') {
            return [
                'code' => 'PM',
                'standard_title' => 'Penalaran Matematika (Numerasi)',
                'group' => 'literasi_numerasi',
                'group_label' => 'Tes Literasi & Numerasi',
            ];
        }

        // 4. TPS: Kemampuan Penalaran Umum (KPU)
        if (str_contains($normalized, 'penalaran umum') || str_contains($normalized, 'kpu')) {
            return [
                'code' => 'KPU',
                'standard_title' => 'Kemampuan Penalaran Umum',
                'group' => 'tps',
                'group_label' => 'Tes Potensi Skolastik (TPS)',
            ];
        }

        // 5. TPS: Pengetahuan & Pemahaman Umum (PPU)
        if (str_contains($normalized, 'pemahaman umum') || str_contains($normalized, 'ppu')) {
            return [
                'code' => 'PPU',
                'standard_title' => 'Pengetahuan & Pemahaman Umum',
                'group' => 'tps',
                'group_label' => 'Tes Potensi Skolastik (TPS)',
            ];
        }

        // 6. TPS: Kemampuan Memahami Bacaan & Menulis (PBM / KMBM)
        if (str_contains($normalized, 'memahami bacaan') || str_contains($normalized, 'pbm') || str_contains($normalized, 'kmbm') || (str_contains($normalized, 'bacaan') && str_contains($normalized, 'menulis'))) {
            return [
                'code' => 'PBM',
                'standard_title' => 'Kemampuan Memahami Bacaan & Menulis',
                'group' => 'tps',
                'group_label' => 'Tes Potensi Skolastik (TPS)',
            ];
        }

        // 7. TPS: Pengetahuan Kuantitatif (PK)
        if (str_contains($normalized, 'kuantitatif') || str_contains($normalized, 'pk')) {
            return [
                'code' => 'PK',
                'standard_title' => 'Pengetahuan Kuantitatif',
                'group' => 'tps',
                'group_label' => 'Tes Potensi Skolastik (TPS)',
            ];
        }

        // Fallback untuk subtes custom atau variasi judul lain
        $cleanedTitle = preg_replace('/^(?:subtes|bagian|section)\s+\d+\s*[:\-–]\s*/i', '', trim($title));

        return [
            'code' => 'SUB',
            'standard_title' => filled($cleanedTitle) ? $cleanedTitle : $title,
            'group' => 'general',
            'group_label' => 'Subtes UTBK',
        ];
    }
}
