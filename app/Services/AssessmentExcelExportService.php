<?php

namespace App\Services;

use App\Models\Assessment;
use App\Models\ExamSession;
use App\Models\Question;
use ZipArchive;

class AssessmentExcelExportService
{
    /**
     * Gather and format matrix data for both Excel export and interactive preview.
     */
    public function getMatrixData(Assessment $assessment, ?int $tenantId = null): array
    {
        // 1. Get all sections and their questions
        $sections = $assessment->sections()->orderBy('order')->get();
        $sectionsData = [];
        $totalQuestions = 0;

        foreach ($sections as $sIdx => $section) {
            $questions = Question::where('assessment_section_id', $section->id)
                ->orderBy('order')
                ->get();

            $qCount = $questions->count();
            $totalQuestions += $qCount;

            $sectionsData[] = [
                'id' => $section->id,
                'title' => $section->title ?: 'Section '.($sIdx + 1),
                'order' => $section->order,
                'duration_minutes' => $section->duration_minutes,
                'question_count' => $qCount,
                'questions' => $questions,
            ];
        }

        // 2. Query exam sessions
        $query = ExamSession::with([
            'user',
            'tenant',
            'answers',
        ])
            ->where('assessment_id', $assessment->id);

        if ($tenantId) {
            $query->where('tenant_id', $tenantId);
        }

        // Ordered by highest score descending (Rank 1 at the top)
        $sessions = $query->orderByDesc('score')
            ->orderBy('completed_at')
            ->get();

        // 3. Build student rows with item-by-item breakdown
        $rows = [];
        $rank = 1;

        foreach ($sessions as $session) {
            $answersByQuestion = $session->answers->keyBy('question_id');
            $maxScore = (float) ($session->max_score > 0 ? $session->max_score : 100);
            $rawScore = (float) $session->score;
            $finalPercentage = round(($rawScore / $maxScore) * 100, 1);

            $sectionBreakdowns = [];
            $totalCorrect = 0;
            $totalWrong = 0;
            $totalEmpty = 0;

            foreach ($sectionsData as $sData) {
                $secCorrect = 0;
                $secWrong = 0;
                $secEmpty = 0;
                $qDetails = [];

                foreach ($sData['questions'] as $qIdx => $question) {
                    $ans = $answersByQuestion->get($question->id);
                    $qNum = $qIdx + 1;
                    $qMaxPoints = (float) $question->points;

                    if ($ans && $ans->isAnswered()) {
                        $isCorrect = (bool) $ans->is_correct;
                        $awarded = (float) $ans->points_awarded;

                        if ($isCorrect || $awarded > 0) {
                            $status = 'correct';
                            $points = $awarded > 0 ? $awarded : $qMaxPoints;
                            $secCorrect++;
                            $totalCorrect++;
                        } else {
                            $status = 'wrong';
                            $points = $awarded;
                            $secWrong++;
                            $totalWrong++;
                        }
                    } else {
                        $status = 'empty';
                        $points = 0.0;
                        $secEmpty++;
                        $totalEmpty++;
                    }

                    $qDetails[] = [
                        'question_id' => $question->id,
                        'number' => $qNum,
                        'status' => $status, // 'correct' | 'wrong' | 'empty'
                        'points' => $points,
                        'max_points' => $qMaxPoints,
                        'prompt_preview' => mb_strimwidth(strip_tags($question->prompt ?? ''), 0, 80, '...'),
                    ];
                }

                $sectionBreakdowns[$sData['id']] = [
                    'correct' => $secCorrect,
                    'wrong' => $secWrong,
                    'empty' => $secEmpty,
                    'items' => $qDetails,
                ];
            }

            $rows[] = [
                'rank' => $rank++,
                'session_id' => $session->id,
                'uuid' => $session->uuid,
                'name' => $session->user?->name ?? 'Anonim',
                'email' => $session->user?->email ?? '-',
                'assessment_name' => $assessment->title,
                'tenant_name' => $session->tenant?->name ?? '-',
                'status' => $session->status,
                'score' => $rawScore,
                'max_score' => $maxScore,
                'final_percentage' => $finalPercentage,
                'total_correct' => $totalCorrect,
                'total_wrong' => $totalWrong,
                'total_empty' => $totalEmpty,
                'section_breakdowns' => $sectionBreakdowns,
            ];
        }

        return [
            'assessment' => $assessment,
            'sections' => $sectionsData,
            'total_questions' => $totalQuestions,
            'total_participants' => $sessions->count(),
            'rows' => $rows,
        ];
    }

    /**
     * Generate pristine, professionally styled .xlsx spreadsheet file with full OpenXML.
     */
    public function exportToXlsx(Assessment $assessment, ?int $tenantId, string $outputPath): string
    {
        $matrixData = $this->getMatrixData($assessment, $tenantId);
        $sections = $matrixData['sections'];
        $rows = $matrixData['rows'];

        $dir = dirname($outputPath);
        if (! file_exists($dir)) {
            @mkdir($dir, 0755, true);
        }
        if (file_exists($outputPath)) {
            @unlink($outputPath);
        }

        $zip = new ZipArchive;
        if ($zip->open($outputPath, ZipArchive::CREATE | ZipArchive::OVERWRITE) !== true) {
            throw new \RuntimeException('Gagal membuat berkas Excel (.xlsx).');
        }

        // 1. [Content_Types].xml
        $contentTypes = '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>
<Types xmlns="http://schemas.openxmlformats.org/package/2006/content-types">
    <Default Extension="rels" ContentType="application/vnd.openxmlformats-package.relationships+xml"/>
    <Default Extension="xml" ContentType="application/xml"/>
    <Override PartName="/xl/workbook.xml" ContentType="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet.main+xml"/>
    <Override PartName="/xl/styles.xml" ContentType="application/vnd.openxmlformats-officedocument.spreadsheetml.styles+xml"/>
    <Override PartName="/xl/worksheets/sheet1.xml" ContentType="application/vnd.openxmlformats-officedocument.spreadsheetml.worksheet+xml"/>
</Types>';
        $zip->addFromString('[Content_Types].xml', $contentTypes);

        // 2. _rels/.rels
        $rootRels = '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>
<Relationships xmlns="http://schemas.openxmlformats.org/package/2006/relationships">
    <Relationship Id="rId1" Type="http://schemas.openxmlformats.org/officeDocument/2006/relationships/officeDocument" Target="xl/workbook.xml"/>
</Relationships>';
        $zip->addFromString('_rels/.rels', $rootRels);

        // 3. xl/_rels/workbook.xml.rels
        $wbRels = '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>
<Relationships xmlns="http://schemas.openxmlformats.org/package/2006/relationships">
    <Relationship Id="rId1" Type="http://schemas.openxmlformats.org/officeDocument/2006/relationships/worksheet" Target="worksheets/sheet1.xml"/>
    <Relationship Id="rId2" Type="http://schemas.openxmlformats.org/officeDocument/2006/relationships/styles" Target="styles.xml"/>
</Relationships>';
        $zip->addFromString('xl/_rels/workbook.xml.rels', $wbRels);

        // 4. xl/workbook.xml
        $workbook = '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>
<workbook xmlns="http://schemas.openxmlformats.org/spreadsheetml/2006/main" xmlns:r="http://schemas.openxmlformats.org/officeDocument/2006/relationships">
    <sheets>
        <sheet name="Rekap Hasil Ujian" sheetId="1" r:id="rId1"/>
    </sheets>
</workbook>';
        $zip->addFromString('xl/workbook.xml', $workbook);

        // 5. xl/styles.xml
        $styles = $this->generateStylesXml();
        $zip->addFromString('xl/styles.xml', $styles);

        // 6. xl/worksheets/sheet1.xml
        $sheetXml = $this->generateSheetXml($sections, $rows);
        $zip->addFromString('xl/worksheets/sheet1.xml', $sheetXml);

        $zip->close();

        return $outputPath;
    }

    /**
     * Generate OpenXML styles.xml with refined Adzkia brand colors:
     * - Primary Adzkia Green (#2B8A3E) for Primary Master Headers
     * - Accent Fresh Green (#51CF66) for Section Titles
     * - Soft Mint Green (#EBFBEE) for Question Count / Final Scores
     * - Green (#D3F9D8 / #2B8A3E) for Benar / Correct
     * - Orange (#FFE8CC / #D9480F) for Salah / Wrong
     * - Gray (#F1F3F5 / #868E96) for Kosong / Empty
     */
    protected function generateStylesXml(): string
    {
        return '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>
<styleSheet xmlns="http://schemas.openxmlformats.org/spreadsheetml/2006/main">
    <fonts count="8">
        <!-- 0: Regular base font -->
        <font><sz val="10"/><name val="Aptos"/><color theme="1"/></font>
        <!-- 1: Bold White (Primary Headers) -->
        <font><b/><sz val="11"/><name val="Aptos"/><color rgb="FFFFFFFF"/></font>
        <!-- 2: Bold Dark Adzkia Green (#2B8A3E) -->
        <font><b/><sz val="10"/><name val="Aptos"/><color rgb="FF2B8A3E"/></font>
        <!-- 3: Bold Dark Green (Benar) -->
        <font><b/><sz val="10"/><name val="Aptos"/><color rgb="FF2B8A3E"/></font>
        <!-- 4: Bold Dark Orange (Salah) -->
        <font><b/><sz val="10"/><name val="Aptos"/><color rgb="FFD9480F"/></font>
        <!-- 5: Muted Gray (Kosong) -->
        <font><sz val="10"/><name val="Aptos"/><color rgb="FF868E96"/></font>
        <!-- 6: Bold Dark Forest (Section on #51CF66 / Headers) -->
        <font><b/><sz val="10"/><name val="Aptos"/><color rgb="FF184E25"/></font>
        <!-- 7: Small Subtitle -->
        <font><i/><sz val="9"/><name val="Aptos"/><color rgb="FF2B8A3E"/></font>
    </fonts>
    <fills count="11">
        <!-- 0 & 1: Required defaults -->
        <fill><patternFill patternType="none"/></fill>
        <fill><patternFill patternType="gray125"/></fill>
        <!-- 2: Primary Adzkia Green Header (#2B8A3E) -->
        <fill><patternFill patternType="solid"><fgColor rgb="FF2B8A3E"/></patternFill></fill>
        <!-- 3: Accent Fresh Green Header (#51CF66) -->
        <fill><patternFill patternType="solid"><fgColor rgb="FF51CF66"/></patternFill></fill>
        <!-- 4: Subheader Soft Mint Green (#EBFBEE) -->
        <fill><patternFill patternType="solid"><fgColor rgb="FFEBFBEE"/></patternFill></fill>
        <!-- 5: Green / Benar (#D3F9D8) -->
        <fill><patternFill patternType="solid"><fgColor rgb="FFD3F9D8"/></patternFill></fill>
        <!-- 6: Orange / Salah (#FFE8CC) -->
        <fill><patternFill patternType="solid"><fgColor rgb="FFFFE8CC"/></patternFill></fill>
        <!-- 7: Gray / Kosong (#F1F3F5) -->
        <fill><patternFill patternType="solid"><fgColor rgb="FFF1F3F5"/></patternFill></fill>
        <!-- 8: Zebra Light Gray (#F8F9FA) -->
        <fill><patternFill patternType="solid"><fgColor rgb="FFF8F9FA"/></patternFill></fill>
        <!-- 9: Soft Green Tint (#EBFBEE) -->
        <fill><patternFill patternType="solid"><fgColor rgb="FFEBFBEE"/></patternFill></fill>
        <!-- 10: Soft Orange Tint (#FFF4E6) -->
        <fill><patternFill patternType="solid"><fgColor rgb="FFFFF4E6"/></patternFill></fill>
    </fills>
    <borders count="2">
        <!-- 0: None -->
        <border><left/><right/><top/><bottom/></border>
        <!-- 1: Thin light gray border (#CED4DA) -->
        <border>
            <left style="thin"><color rgb="FFCED4DA"/></left>
            <right style="thin"><color rgb="FFCED4DA"/></right>
            <top style="thin"><color rgb="FFCED4DA"/></top>
            <bottom style="thin"><color rgb="FFCED4DA"/></bottom>
        </border>
    </borders>
    <cellStyleXfs count="1">
        <xf numFmtId="0" fontId="0" fillId="0" borderId="0"/>
    </cellStyleXfs>
    <cellXfs count="17">
        <!-- 0: Default Normal -->
        <xf numFmtId="0" fontId="0" fillId="0" borderId="1" xfId="0" applyFont="1" applyBorder="1"/>
        <!-- 1: Primary Header Dark Blue (Rank, Nama, Nama Asesmen) -->
        <xf numFmtId="0" fontId="1" fillId="2" borderId="1" xfId="0" applyFont="1" applyFill="1" applyBorder="1" applyAlignment="1">
            <alignment horizontal="center" vertical="center" wrapText="1"/>
        </xf>
        <!-- 2: Section Header Blue -->
        <xf numFmtId="0" fontId="1" fillId="3" borderId="1" xfId="0" applyFont="1" applyFill="1" applyBorder="1" applyAlignment="1">
            <alignment horizontal="center" vertical="center"/>
        </xf>
        <!-- 3: Subheader Soal (Jumlah Soal) -->
        <xf numFmtId="0" fontId="2" fillId="4" borderId="1" xfId="0" applyFont="1" applyFill="1" applyBorder="1" applyAlignment="1">
            <alignment horizontal="center" vertical="center"/>
        </xf>
        <!-- 4: Header Benar (Green) -->
        <xf numFmtId="0" fontId="3" fillId="5" borderId="1" xfId="0" applyFont="1" applyFill="1" applyBorder="1" applyAlignment="1">
            <alignment horizontal="center" vertical="center"/>
        </xf>
        <!-- 5: Header Salah (Orange) -->
        <xf numFmtId="0" fontId="4" fillId="6" borderId="1" xfId="0" applyFont="1" applyFill="1" applyBorder="1" applyAlignment="1">
            <alignment horizontal="center" vertical="center"/>
        </xf>
        <!-- 6: Header Kosong (Gray) -->
        <xf numFmtId="0" fontId="5" fillId="7" borderId="1" xfId="0" applyFont="1" applyFill="1" applyBorder="1" applyAlignment="1">
            <alignment horizontal="center" vertical="center"/>
        </xf>
        <!-- 7: Question Number Header (1, 2, 3...) -->
        <xf numFmtId="0" fontId="6" fillId="7" borderId="1" xfId="0" applyFont="1" applyFill="1" applyBorder="1" applyAlignment="1">
            <alignment horizontal="center" vertical="center"/>
        </xf>
        <!-- 8: Data Cell Left (Nama Siswa, Asesmen) -->
        <xf numFmtId="0" fontId="0" fillId="0" borderId="1" xfId="0" applyFont="1" applyBorder="1" applyAlignment="1">
            <alignment horizontal="left" vertical="center"/>
        </xf>
        <!-- 9: Data Cell Center (Rank) -->
        <xf numFmtId="0" fontId="6" fillId="0" borderId="1" xfId="0" applyFont="1" applyBorder="1" applyAlignment="1">
            <alignment horizontal="center" vertical="center"/>
        </xf>
        <!-- 10: Cell Answer BENAR (Green fill + dark green text) -->
        <xf numFmtId="0" fontId="3" fillId="5" borderId="1" xfId="0" applyFont="1" applyFill="1" applyBorder="1" applyAlignment="1">
            <alignment horizontal="center" vertical="center"/>
        </xf>
        <!-- 11: Cell Answer SALAH (Orange fill + dark orange text) -->
        <xf numFmtId="0" fontId="4" fillId="6" borderId="1" xfId="0" applyFont="1" applyFill="1" applyBorder="1" applyAlignment="1">
            <alignment horizontal="center" vertical="center"/>
        </xf>
        <!-- 12: Cell Answer KOSONG (Gray fill + muted text) -->
        <xf numFmtId="0" fontId="5" fillId="7" borderId="1" xfId="0" applyFont="1" applyFill="1" applyBorder="1" applyAlignment="1">
            <alignment horizontal="center" vertical="center"/>
        </xf>
        <!-- 13: Summary Benar Count -->
        <xf numFmtId="0" fontId="3" fillId="9" borderId="1" xfId="0" applyFont="1" applyFill="1" applyBorder="1" applyAlignment="1">
            <alignment horizontal="center" vertical="center"/>
        </xf>
        <!-- 14: Summary Salah Count -->
        <xf numFmtId="0" fontId="4" fillId="10" borderId="1" xfId="0" applyFont="1" applyFill="1" applyBorder="1" applyAlignment="1">
            <alignment horizontal="center" vertical="center"/>
        </xf>
        <!-- 15: Summary Kosong Count -->
        <xf numFmtId="0" fontId="5" fillId="7" borderId="1" xfId="0" applyFont="1" applyBorder="1" applyAlignment="1">
            <alignment horizontal="center" vertical="center"/>
        </xf>
        <!-- 16: Total Score Highlight -->
        <xf numFmtId="0" fontId="2" fillId="4" borderId="1" xfId="0" applyFont="1" applyFill="1" applyBorder="1" applyAlignment="1">
            <alignment horizontal="center" vertical="center"/>
        </xf>
    </cellXfs>
</styleSheet>';
    }

    /**
     * Generate sheet1.xml with the 4-row header structure requested:
     * Row 1: Rank | Nama | Nama Asesmen | Section 1 (merged) | Section 2 (merged) ... | Total Skor
     * Row 2: (merged) | (merged) | (merged) | [N] Soal (merged) | [N] Soal (merged) ... | (merged)
     * Row 3: (merged) | (merged) | (merged) | benar | salah | kosong | (Nomor Soal) ... | (merged)
     * Row 4: (merged) | (merged) | (merged) | (benar) | (salah) | (kosong) | 1 | 2 | 3 ... | (merged)
     * Row 5+: Data rows with colored question cells (Green/Orange/Gray).
     */
    protected function generateSheetXml(array $sections, array $rows): string
    {
        $mergeCells = [];
        $colWidths = [
            1 => 8,   // Rank
            2 => 28,  // Nama Siswa
            3 => 32,  // Nama Asesmen
        ];

        // Fixed columns: 1 = Rank, 2 = Nama, 3 = Nama Asesmen
        $mergeCells[] = 'A1:A4';
        $mergeCells[] = 'B1:B4';
        $mergeCells[] = 'C1:C4';

        // Calculate columns for each section
        $currentColIdx = 4;
        $sectionColMap = [];

        foreach ($sections as $sIdx => $sec) {
            $qCount = $sec['question_count'];
            $secStartCol = $currentColIdx;

            // Summary columns: Benar, Salah, Kosong
            $colBenar = $currentColIdx++;
            $colSalah = $currentColIdx++;
            $colKosong = $currentColIdx++;

            $colWidths[$colBenar] = 9;
            $colWidths[$colSalah] = 9;
            $colWidths[$colKosong] = 9;

            $mergeCells[] = self::getColumnLetter($colBenar).'3:'.self::getColumnLetter($colBenar).'4';
            $mergeCells[] = self::getColumnLetter($colSalah).'3:'.self::getColumnLetter($colSalah).'4';
            $mergeCells[] = self::getColumnLetter($colKosong).'3:'.self::getColumnLetter($colKosong).'4';

            // Question columns: 1..qCount
            $questionCols = [];
            for ($q = 1; $q <= $qCount; $q++) {
                $qCol = $currentColIdx++;
                $questionCols[] = $qCol;
                $colWidths[$qCol] = 6;
            }

            $secEndCol = $currentColIdx - 1;

            // Row 1 merge: Section Title
            $mergeCells[] = self::getColumnLetter($secStartCol).'1:'.self::getColumnLetter($secEndCol).'1';
            // Row 2 merge: Jumlah Soal
            $mergeCells[] = self::getColumnLetter($secStartCol).'2:'.self::getColumnLetter($secEndCol).'2';

            // If there are questions, merge Row 3 for the question numbers header
            if (! empty($questionCols)) {
                $mergeCells[] = self::getColumnLetter($questionCols[0]).'3:'.self::getColumnLetter(end($questionCols)).'3';
            }

            $sectionColMap[$sec['id']] = [
                'start_col' => $secStartCol,
                'end_col' => $secEndCol,
                'col_benar' => $colBenar,
                'col_salah' => $colSalah,
                'col_kosong' => $colKosong,
                'question_cols' => $questionCols,
            ];
        }

        // Final Column: Total Skor
        $finalScoreCol = $currentColIdx++;
        $colWidths[$finalScoreCol] = 14;
        $mergeCells[] = self::getColumnLetter($finalScoreCol).'1:'.self::getColumnLetter($finalScoreCol).'4';

        // Build XML
        $xml = '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>'.PHP_EOL;
        $xml .= '<worksheet xmlns="http://schemas.openxmlformats.org/spreadsheetml/2006/main" xmlns:r="http://schemas.openxmlformats.org/officeDocument/2006/relationships">'.PHP_EOL;

        // Frozen Header Pane: 4 Header rows frozen, and first 3 columns frozen
        $xml .= '    <sheetViews>'.PHP_EOL;
        $xml .= '        <sheetView tabSelected="1" workbookViewId="0">'.PHP_EOL;
        $xml .= '            <pane xSplit="3" ySplit="4" topLeftCell="D5" activePane="bottomRight" state="frozen"/>'.PHP_EOL;
        $xml .= '        </sheetView>'.PHP_EOL;
        $xml .= '    </sheetViews>'.PHP_EOL;

        // Column widths
        $xml .= '    <cols>'.PHP_EOL;
        foreach ($colWidths as $colNum => $width) {
            $xml .= "        <col min=\"{$colNum}\" max=\"{$colNum}\" width=\"{$width}\" customWidth=\"1\"/>".PHP_EOL;
        }
        $xml .= '    </cols>'.PHP_EOL;

        $xml .= '    <sheetData>'.PHP_EOL;

        // ─── ROW 1: Section Headers & Master Titles ────────────────────────
        $xml .= '        <row r="1" ht="28" customHeight="1">'.PHP_EOL;
        $xml .= '            <c r="A1" s="1" t="inlineStr"><is><t>Rank</t></is></c>'.PHP_EOL;
        $xml .= '            <c r="B1" s="1" t="inlineStr"><is><t>Nama Siswa</t></is></c>'.PHP_EOL;
        $xml .= '            <c r="C1" s="1" t="inlineStr"><is><t>Nama Asesmen</t></is></c>'.PHP_EOL;

        foreach ($sections as $sIdx => $sec) {
            $map = $sectionColMap[$sec['id']];
            $startLet = self::getColumnLetter($map['start_col']);
            $titleText = htmlspecialchars($sec['title']);
            $xml .= "            <c r=\"{$startLet}1\" s=\"2\" t=\"inlineStr\"><is><t>{$titleText}</t></is></c>".PHP_EOL;

            // Fill intermediate merged cells with style so borders look solid
            for ($c = $map['start_col'] + 1; $c <= $map['end_col']; $c++) {
                $let = self::getColumnLetter($c);
                $xml .= "            <c r=\"{$let}1\" s=\"2\"/>".PHP_EOL;
            }
        }

        $finalLet = self::getColumnLetter($finalScoreCol);
        $xml .= "            <c r=\"{$finalLet}1\" s=\"1\" t=\"inlineStr\"><is><t>Total Skor</t></is></c>".PHP_EOL;
        $xml .= '        </row>'.PHP_EOL;

        // ─── ROW 2: Jumlah Soal ───────────────────────────────────────────
        $xml .= '        <row r="2" ht="22" customHeight="1">'.PHP_EOL;
        $xml .= '            <c r="A2" s="1"/>'.PHP_EOL;
        $xml .= '            <c r="B2" s="1"/>'.PHP_EOL;
        $xml .= '            <c r="C2" s="1"/>'.PHP_EOL;

        foreach ($sections as $sec) {
            $map = $sectionColMap[$sec['id']];
            $startLet = self::getColumnLetter($map['start_col']);
            $countText = "{$sec['question_count']} Soal";
            $xml .= "            <c r=\"{$startLet}2\" s=\"3\" t=\"inlineStr\"><is><t>{$countText}</t></is></c>".PHP_EOL;

            for ($c = $map['start_col'] + 1; $c <= $map['end_col']; $c++) {
                $let = self::getColumnLetter($c);
                $xml .= "            <c r=\"{$let}2\" s=\"3\"/>".PHP_EOL;
            }
        }

        $xml .= "            <c r=\"{$finalLet}2\" s=\"1\"/>".PHP_EOL;
        $xml .= '        </row>'.PHP_EOL;

        // ─── ROW 3: benar | salah | kosong | Detail Butir Soal ───────────
        $xml .= '        <row r="3" ht="20" customHeight="1">'.PHP_EOL;
        $xml .= '            <c r="A3" s="1"/>'.PHP_EOL;
        $xml .= '            <c r="B3" s="1"/>'.PHP_EOL;
        $xml .= '            <c r="C3" s="1"/>'.PHP_EOL;

        foreach ($sections as $sec) {
            $map = $sectionColMap[$sec['id']];
            $xml .= '            <c r="'.self::getColumnLetter($map['col_benar']).'3" s="4" t="inlineStr"><is><t>Benar</t></is></c>'.PHP_EOL;
            $xml .= '            <c r="'.self::getColumnLetter($map['col_salah']).'3" s="5" t="inlineStr"><is><t>Salah</t></is></c>'.PHP_EOL;
            $xml .= '            <c r="'.self::getColumnLetter($map['col_kosong']).'3" s="6" t="inlineStr"><is><t>Kosong</t></is></c>'.PHP_EOL;

            if (! empty($map['question_cols'])) {
                $firstQLet = self::getColumnLetter($map['question_cols'][0]);
                $xml .= "            <c r=\"{$firstQLet}3\" s=\"7\" t=\"inlineStr\"><is><t>Nomor Soal</t></is></c>".PHP_EOL;
                for ($qi = 1; $qi < count($map['question_cols']); $qi++) {
                    $qLet = self::getColumnLetter($map['question_cols'][$qi]);
                    $xml .= "            <c r=\"{$qLet}3\" s=\"7\"/>".PHP_EOL;
                }
            }
        }

        $xml .= "            <c r=\"{$finalLet}3\" s=\"1\"/>".PHP_EOL;
        $xml .= '        </row>'.PHP_EOL;

        // ─── ROW 4: Nomor Soal (1, 2, 3...) ──────────────────────────────
        $xml .= '        <row r="4" ht="20" customHeight="1">'.PHP_EOL;
        $xml .= '            <c r="A4" s="1"/>'.PHP_EOL;
        $xml .= '            <c r="B4" s="1"/>'.PHP_EOL;
        $xml .= '            <c r="C4" s="1"/>'.PHP_EOL;

        foreach ($sections as $sec) {
            $map = $sectionColMap[$sec['id']];
            $xml .= '            <c r="'.self::getColumnLetter($map['col_benar']).'4" s="4"/>'.PHP_EOL;
            $xml .= '            <c r="'.self::getColumnLetter($map['col_salah']).'4" s="5"/>'.PHP_EOL;
            $xml .= '            <c r="'.self::getColumnLetter($map['col_kosong']).'4" s="6"/>'.PHP_EOL;

            foreach ($map['question_cols'] as $idx => $qCol) {
                $qNum = $idx + 1;
                $let = self::getColumnLetter($qCol);
                $xml .= "            <c r=\"{$let}4\" s=\"7\"><v>{$qNum}</v></c>".PHP_EOL;
            }
        }

        $xml .= "            <c r=\"{$finalLet}4\" s=\"1\"/>".PHP_EOL;
        $xml .= '        </row>'.PHP_EOL;

        // ─── DATA ROWS (Row 5+) ──────────────────────────────────────────
        $rowNum = 5;
        foreach ($rows as $rowData) {
            $xml .= "        <row r=\"{$rowNum}\" ht=\"20\">".PHP_EOL;

            // Fixed columns
            $xml .= "            <c r=\"A{$rowNum}\" s=\"9\"><v>{$rowData['rank']}</v></c>".PHP_EOL;
            $cleanName = htmlspecialchars($rowData['name']);
            $xml .= "            <c r=\"B{$rowNum}\" s=\"8\" t=\"inlineStr\"><is><t>{$cleanName}</t></is></c>".PHP_EOL;
            $cleanAssess = htmlspecialchars($rowData['assessment_name']);
            $xml .= "            <c r=\"C{$rowNum}\" s=\"8\" t=\"inlineStr\"><is><t>{$cleanAssess}</t></is></c>".PHP_EOL;

            // Section details
            foreach ($sections as $sec) {
                $map = $sectionColMap[$sec['id']];
                $secResult = $rowData['section_breakdowns'][$sec['id']] ?? [
                    'correct' => 0,
                    'wrong' => 0,
                    'empty' => 0,
                    'items' => [],
                ];

                // Summary counts
                $xml .= '            <c r="'.self::getColumnLetter($map['col_benar'])."{$rowNum}\" s=\"13\"><v>{$secResult['correct']}</v></c>".PHP_EOL;
                $xml .= '            <c r="'.self::getColumnLetter($map['col_salah'])."{$rowNum}\" s=\"14\"><v>{$secResult['wrong']}</v></c>".PHP_EOL;
                $xml .= '            <c r="'.self::getColumnLetter($map['col_kosong'])."{$rowNum}\" s=\"15\"><v>{$secResult['empty']}</v></c>".PHP_EOL;

                // Question items (Green for correct, Orange for wrong, Gray for empty)
                foreach ($map['question_cols'] as $idx => $qCol) {
                    $item = $secResult['items'][$idx] ?? ['status' => 'empty', 'points' => 0.0];
                    $let = self::getColumnLetter($qCol);
                    $styleId = match ($item['status']) {
                        'correct' => 10, // Green
                        'wrong' => 11,   // Orange
                        default => 12,   // Gray
                    };
                    $pts = (float) $item['points'];
                    $xml .= "            <c r=\"{$let}{$rowNum}\" s=\"{$styleId}\"><v>{$pts}</v></c>".PHP_EOL;
                }
            }

            // Total Score
            $xml .= "            <c r=\"{$finalLet}{$rowNum}\" s=\"16\"><v>{$rowData['score']}</v></c>".PHP_EOL;

            $xml .= '        </row>'.PHP_EOL;
            $rowNum++;
        }

        $xml .= '    </sheetData>'.PHP_EOL;

        // Merged cells
        $xml .= '    <mergeCells count="'.count($mergeCells).'">'.PHP_EOL;
        foreach ($mergeCells as $ref) {
            $xml .= "        <mergeCell ref=\"{$ref}\"/>".PHP_EOL;
        }
        $xml .= '    </mergeCells>'.PHP_EOL;

        $xml .= '</worksheet>'.PHP_EOL;

        return $xml;
    }

    /**
     * Helper to get Excel column letter (1 -> A, 26 -> Z, 27 -> AA...).
     */
    public static function getColumnLetter(int $colIndex): string
    {
        $letter = '';
        while ($colIndex > 0) {
            $mod = ($colIndex - 1) % 26;
            $letter = chr(65 + $mod).$letter;
            $colIndex = (int) (($colIndex - $mod) / 26);
        }

        return $letter;
    }
}
