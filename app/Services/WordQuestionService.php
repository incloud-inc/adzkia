<?php

namespace App\Services;

use ZipArchive;

class WordQuestionService
{
    /**
     * Parse a .docx file and extract structured questions with formatting and LaTeX preserved.
     */
    public function parseDocx(string $filePath): array
    {
        $zip = new ZipArchive;
        if ($zip->open($filePath) !== true) {
            throw new \RuntimeException('Gagal membuka file Word (.docx). Pastikan file tidak rusak.');
        }

        $xmlIndex = $zip->locateName('word/document.xml');
        if ($xmlIndex === false) {
            $zip->close();
            throw new \RuntimeException('Struktur dokumen Word tidak valid (word/document.xml tidak ditemukan).');
        }

        $xmlContent = $zip->getFromIndex($xmlIndex);
        $zip->close();

        // Parse XML content preserving formatting runs
        $paragraphs = $this->extractParagraphsWithFormatting($xmlContent);

        // Parse lines into structured items (Standalone Questions & Question Groups)
        return $this->buildStructuredItems($paragraphs);
    }

    /**
     * Extract paragraphs from Word XML while preserving Bold, Italic, Underline, and LaTeX.
     */
    protected function extractParagraphsWithFormatting(string $xmlContent): array
    {
        $paragraphs = [];

        // Suppress XML errors for robust parsing
        $dom = new \DOMDocument;
        libxml_use_internal_errors(true);
        $dom->loadXML($xmlContent);
        libxml_clear_errors();

        $xpath = new \DOMXPath($dom);
        $xpath->registerNamespace('w', 'http://schemas.openxmlformats.org/wordprocessingml/2006/main');

        $pNodes = $xpath->query('//w:p');
        foreach ($pNodes as $pNode) {
            $pText = '';
            $rNodes = $xpath->query('.//w:r', $pNode);

            foreach ($rNodes as $rNode) {
                // Check run properties
                $isBold = $xpath->query('.//w:rPr/w:b', $rNode)->length > 0 || $xpath->query('.//w:rPr/w:bCs', $rNode)->length > 0;
                $isItalic = $xpath->query('.//w:rPr/w:i', $rNode)->length > 0 || $xpath->query('.//w:rPr/w:iCs', $rNode)->length > 0;
                $isUnderline = $xpath->query('.//w:rPr/w:u', $rNode)->length > 0;

                // Extract text from w:t nodes
                $tNodes = $xpath->query('.//w:t', $rNode);
                $runText = '';
                foreach ($tNodes as $tNode) {
                    $runText .= $tNode->nodeValue;
                }

                if ($runText === '') {
                    continue;
                }

                // Apply Markdown / HTML formatting for Bold, Italic, Underline
                // Don't format whitespace-only strings
                if (trim($runText) !== '') {
                    if ($isBold) {
                        $runText = "**{$runText}**";
                    }
                    if ($isItalic) {
                        $runText = "*{$runText}*";
                    }
                    if ($isUnderline) {
                        $runText = "<u>{$runText}</u>";
                    }
                }

                $pText .= $runText;
            }

            $trimmed = trim($pText);
            if ($trimmed !== '') {
                $paragraphs[] = $trimmed;
            }
        }

        return $paragraphs;
    }

    /**
     * Build structured items (standalone questions and narrative groups) from paragraph strings.
     */
    protected function buildStructuredItems(array $paragraphs): array
    {
        $items = [];
        $inNarrative = false;
        $currentNarrative = [
            'title' => '',
            'content' => [],
            'questions' => [],
        ];

        $currentQuestion = null;

        $saveCurrentQuestion = function () use (&$items, &$currentNarrative, &$currentQuestion, &$inNarrative) {
            if (! $currentQuestion) {
                return;
            }

            // Ensure options have correct labels and matches
            $letters = ['A', 'B', 'C', 'D', 'E', 'F'];
            foreach ($currentQuestion['options'] as $idx => &$opt) {
                $opt['label'] = $letters[$idx] ?? (string) ($idx + 1);
                $opt['is_correct'] = (strtoupper($opt['label']) === strtoupper($currentQuestion['correct_key']));
                $opt['score'] = $opt['is_correct'] ? (float) $currentQuestion['points'] : 0.0;
            }

            $questionItem = [
                'id' => 'q_imp_'.uniqid(),
                'is_group' => false,
                'type' => 'mcq_single',
                'prompt' => $currentQuestion['prompt'],
                'explanation' => $currentQuestion['explanation'],
                'points' => (float) $currentQuestion['points'],
                'settings' => [
                    'labels' => ['Benar', 'Salah'],
                ],
                'options' => $currentQuestion['options'],
            ];

            if ($inNarrative) {
                $currentNarrative['questions'][] = $questionItem;
            } else {
                $items[] = $questionItem;
            }

            $currentQuestion = null;
        };

        $saveNarrativeGroup = function () use (&$items, &$currentNarrative) {
            if (! empty($currentNarrative['questions']) || ! empty($currentNarrative['content'])) {
                $items[] = [
                    'id' => 'grp_imp_'.uniqid(),
                    'is_group' => true,
                    'title' => $currentNarrative['title'] ?: 'Stimulus Narasi '.(count($items) + 1),
                    'stimulus_type' => 'text',
                    'stimulus_content' => implode("\n\n", $currentNarrative['content']),
                    'questions' => $currentNarrative['questions'],
                ];
                $currentNarrative = [
                    'title' => '',
                    'content' => [],
                    'questions' => [],
                ];
            }
        };

        foreach ($paragraphs as $line) {
            $upperLine = strtoupper($line);
            $cleanLine = trim(str_replace(['**', '*', '<u>', '</u>'], '', $line));
            $cleanUpper = strtoupper($cleanLine);

            // Standalone Question Marker (Allows returning to standalone questions at any point: start, middle, or end)
            if (
                str_contains($cleanUpper, '[SOAL TUNGGAL]') ||
                str_contains($cleanUpper, '[SOAL BIASA]') ||
                str_contains($cleanUpper, '[SOAL MANDIRI]') ||
                str_contains($cleanUpper, '[SOAL REGULER]') ||
                str_contains($cleanUpper, '[STANDALONE]') ||
                str_contains($cleanUpper, '[NON-STIMULUS]') ||
                str_contains($cleanUpper, '[TANPA STIMULUS]')
            ) {
                $saveCurrentQuestion();
                if ($inNarrative) {
                    $saveNarrativeGroup();
                    $inNarrative = false;
                }

                $strippedLine = preg_replace('/\[(?:SOAL TUNGGAL|SOAL BIASA|SOAL MANDIRI|SOAL REGULER|STANDALONE|NON-STIMULUS|TANPA STIMULUS)\]/i', '', $line);
                $cleanLine = trim(str_replace(['**', '*', '<u>', '</u>'], '', $strippedLine));
                if (trim($cleanLine) === '') {
                    continue;
                }
                $line = trim($strippedLine);
                $cleanUpper = strtoupper($cleanLine);
            }

            // 1. Narrative Stimulus Start Tag (Can be placed at the very beginning, middle, or anywhere)
            if (
                str_contains($cleanUpper, '[NARASI]') ||
                str_contains($cleanUpper, '[STIMULUS]') ||
                str_contains($cleanUpper, '[WACANA]') ||
                str_contains($cleanUpper, '[TEKS BACAAN]')
            ) {
                $saveCurrentQuestion();
                if ($inNarrative) {
                    $saveNarrativeGroup();
                }
                $inNarrative = true;
                $currentNarrative = [
                    'title' => 'Stimulus Narasi '.(count($items) + 1),
                    'content' => [],
                    'questions' => [],
                ];

                continue;
            }

            // 2. Narrative Stimulus End Tag
            if (
                str_contains($cleanUpper, '[AKHIR NARASI]') ||
                str_contains($cleanUpper, '[/NARASI]') ||
                str_contains($cleanUpper, '[AKHIR STIMULUS]') ||
                str_contains($cleanUpper, '[/STIMULUS]') ||
                str_contains($cleanUpper, '[SELESAI NARASI]') ||
                str_contains($cleanUpper, '[AKHIR WACANA]')
            ) {
                $saveCurrentQuestion();
                // If narrative already contains child questions, this tag closes the group.
                // If not, it marks the end of narrative text passage and following questions belong to this narrative.
                if (! empty($currentNarrative['questions'])) {
                    $saveNarrativeGroup();
                    $inNarrative = false;
                }

                continue;
            }

            // If in narrative but not question yet, check for Title / Teks
            if ($inNarrative && ! $currentQuestion && ! preg_match('/^\d+[\.\)]/i', $cleanLine)) {
                if (preg_match('/^(?:JUDUL|TITLE)\s*:\s*(.*)$/i', $cleanLine, $m)) {
                    $currentNarrative['title'] = trim($m[1]);
                } elseif (preg_match('/^(?:TEKS|KONTEN|ISI)\s*:\s*(.*)$/i', $cleanLine, $m)) {
                    $currentNarrative['content'][] = trim($m[1]);
                } else {
                    $currentNarrative['content'][] = $line;
                }

                continue;
            }

            // 3. Question Prompt Check: "1. Teks soal..." or "1) Teks soal..." or "Soal 1. ..."
            if (preg_match('/^(?:Soal\s*)?(\d+)[\.\)]\s*(.*)$/i', $cleanLine, $matchesClean)) {
                $saveCurrentQuestion();
                preg_match('/^(?:(?:\*\*|\*|<u>)?(?:Soal\s*)?\d+[\.\)](?:\*\*|\*|<\/u>)?\s*)(.*)$/i', $line, $matchesLine);
                $promptText = isset($matchesLine[1]) && trim($matchesLine[1]) !== '' ? trim($matchesLine[1]) : trim($matchesClean[2]);

                $currentQuestion = [
                    'number' => $matchesClean[1],
                    'prompt' => $promptText,
                    'options' => [],
                    'correct_key' => 'A',
                    'points' => 1.0,
                    'explanation' => '',
                ];

                continue;
            }

            // 4. Option Check: "A. Opsi teks" or "A) Opsi teks"
            if ($currentQuestion && preg_match('/^([A-E])[\.\)]\s*(.*)$/i', $cleanLine, $matchesClean)) {
                $letter = strtoupper($matchesClean[1]);
                preg_match('/^(?:(?:\*\*|\*|<u>)?[A-E][\.\)](?:\*\*|\*|<\/u>)?\s*)(.*)$/i', $line, $matchesLine);
                $optText = isset($matchesLine[1]) && trim($matchesLine[1]) !== '' ? trim($matchesLine[1]) : trim($matchesClean[2]);

                $currentQuestion['options'][] = [
                    'id' => 'opt_imp_'.uniqid().'_'.$letter,
                    'label' => $letter,
                    'option_text' => $optText,
                    'is_correct' => false,
                    'score' => 0.0,
                    'match_key' => null,
                ];

                continue;
            }

            // 5. Correct Key Check: "KUNCI: A" or "JAWABAN: A" or "KUNCI JAWABAN: A"
            if ($currentQuestion && preg_match('/^(?:KUNCI(?:\s*JAWABAN)?|JAWABAN)\s*:\s*([A-E])/i', $cleanLine, $matches)) {
                $currentQuestion['correct_key'] = strtoupper($matches[1]);

                continue;
            }

            // 6. Points / Bobot Check: "BOBOT: 2.0" or "POIN: 2"
            if ($currentQuestion && preg_match('/^(?:BOBOT|POIN|POINT|SKOR)\s*:\s*([\d\.]+)/i', $cleanLine, $matches)) {
                $currentQuestion['points'] = (float) $matches[1];

                continue;
            }

            // 7. Explanation / Pembahasan: "PEMBAHASAN: ..."
            if ($currentQuestion && preg_match('/^(?:PEMBAHASAN|PENJELASAN|KETERANGAN)\s*:\s*(.*)$/i', $cleanLine, $matchesClean)) {
                preg_match('/^(?:(?:\*\*|\*|<u>)?(?:PEMBAHASAN|PENJELASAN|KETERANGAN)\s*:(?:\*\*|\*|<\/u>)?\s*)(.*)$/i', $line, $matchesLine);
                $currentQuestion['explanation'] = isset($matchesLine[1]) && trim($matchesLine[1]) !== '' ? trim($matchesLine[1]) : trim($matchesClean[1]);

                continue;
            }

            // Multiline continuation for prompt or last option
            if ($currentQuestion) {
                if (empty($currentQuestion['options'])) {
                    $currentQuestion['prompt'] .= "\n".$line;
                } else {
                    $lastIdx = count($currentQuestion['options']) - 1;
                    $currentQuestion['options'][$lastIdx]['option_text'] .= "\n".$line;
                }
            }
        }

        // Save last pending question
        $saveCurrentQuestion();

        if ($inNarrative) {
            $saveNarrativeGroup();
        }

        return $items;
    }

    /**
     * Generate a pristine .docx template with Bold, Italic, Underline, LaTeX formulas,
     * demonstrating flexible positioning: Stimulus at start, middle, and standalone questions in-between or at the end.
     */
    public function generateTemplate(string $outputPath): string
    {
        $dir = dirname($outputPath);
        if (! file_exists($dir)) {
            @mkdir($dir, 0755, true);
        }
        if (file_exists($outputPath)) {
            @unlink($outputPath);
        }

        $zip = new ZipArchive;
        if ($zip->open($outputPath, ZipArchive::CREATE | ZipArchive::OVERWRITE) !== true) {
            throw new \RuntimeException('Gagal membuat file template Word.');
        }

        // 1. [Content_Types].xml
        $contentTypes = '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>
<Types xmlns="http://schemas.openxmlformats.org/package/2006/content-types">
    <Default Extension="rels" ContentType="application/vnd.openxmlformats-package.relationships+xml"/>
    <Default Extension="xml" ContentType="application/xml"/>
    <Override PartName="/word/document.xml" ContentType="application/vnd.openxmlformats-officedocument.wordprocessingml.document.main+xml"/>
</Types>';
        $zip->addFromString('[Content_Types].xml', $contentTypes);

        // 2. _rels/.rels
        $rels = '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>
<Relationships xmlns="http://schemas.openxmlformats.org/package/2006/relationships">
    <Relationship Id="rId1" Type="http://schemas.openxmlformats.org/officeDocument/2006/relationships/officeDocument" Target="word/document.xml"/>
</Relationships>';
        $zip->addFromString('_rels/.rels', $rels);

        // 3. word/document.xml with flexible stimulus ordering
        $documentXml = '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>
<w:document xmlns:w="http://schemas.openxmlformats.org/wordprocessingml/2006/main">
    <w:body>
        <w:p>
            <w:pPr><w:jc w:val="center"/></w:pPr>
            <w:r><w:rPr><w:b/><w:sz w:val="28"/><w:color w:val="1c7ed6"/></w:rPr><w:t>CONTOH FORMAT IMPORT SOAL CBT ADZKIA</w:t></w:r>
        </w:p>
        <w:p>
            <w:r><w:rPr><w:i/><w:color w:val="666666"/></w:rPr><w:t>Petunjuk: Posisi soal fleksibel dan acak! Soal berstimulus wacana bisa diletakkan di awal, tengah, maupun akhir. Gunakan tag [SOAL TUNGGAL] untuk kembali ke soal mandiri/biasa.</w:t></w:r>
        </w:p>
        <w:p><w:r><w:t></w:t></w:r></w:p>
        
        <!-- ======================================================== -->
        <!-- CONTOH 1: SOAL BERSTIMULUS DI AWAL                      -->
        <!-- ======================================================== -->
        <w:p><w:r><w:rPr><w:b/><w:color w:val="2f9e44"/></w:rPr><w:t>[STIMULUS]</w:t></w:r></w:p>
        <w:p><w:r><w:rPr><w:b/></w:rPr><w:t>Judul: Transisi Energi Bersih dan Masa Depan Kelistrikan Indonesia</w:t></w:r></w:p>
        <w:p>
            <w:r><w:t>Teks: Indonesia menargetkan bauran energi baru terbarukan (EBT) sebesar 23% pada tahun 2025. Potensi energi surya, angin, dan panas bumi di Nusantara sangat melimpah. Melalui adopsi teknologi panel fotovoltaik efisiensi tinggi, pemerintah berupaya mengurangi ketergantungan pada pembangkit listrik tenaga uap (PLTU) batu bara guna menekan emisi gas rumah kaca secara signifikan.</w:t></w:r>
        </w:p>
        <w:p><w:r><w:rPr><w:b/><w:color w:val="2f9e44"/></w:rPr><w:t>[AKHIR NARASI]</w:t></w:r></w:p>
        <w:p><w:r><w:t></w:t></w:r></w:p>

        <!-- Anak Soal 1 dari Stimulus di Awal -->
        <w:p>
            <w:r><w:t>1. Berdasarkan wacana di atas, target bauran energi terbarukan Indonesia pada tahun 2025 adalah sebesar ...</w:t></w:r>
        </w:p>
        <w:p><w:r><w:t>A. 15%</w:t></w:r></w:p>
        <w:p><w:r><w:t>B. 23%</w:t></w:r></w:p>
        <w:p><w:r><w:t>C. 35%</w:t></w:r></w:p>
        <w:p><w:r><w:t>D. 50%</w:t></w:r></w:p>
        <w:p><w:r><w:rPr><w:b/></w:rPr><w:t>KUNCI: B</w:t></w:r></w:p>
        <w:p><w:r><w:t>BOBOT: 1.0</w:t></w:r></w:p>
        <w:p><w:r><w:t></w:t></w:r></w:p>

        <!-- Anak Soal 2 dari Stimulus di Awal -->
        <w:p>
            <w:r><w:t>2. Pembangkit konvensional apa yang sedang dikurangi pengoperasiannya untuk menekan emisi karbon?</w:t></w:r>
        </w:p>
        <w:p><w:r><w:t>A. PLTU Batu Bara</w:t></w:r></w:p>
        <w:p><w:r><w:t>B. PLTA Air Mikro</w:t></w:r></w:p>
        <w:p><w:r><w:t>C. PLTS Surya Terapung</w:t></w:r></w:p>
        <w:p><w:r><w:t>D. PLTB Tenaga Bayu</w:t></w:r></w:p>
        <w:p><w:r><w:rPr><w:b/></w:rPr><w:t>KUNCI: A</w:t></w:r></w:p>
        <w:p><w:r><w:t></w:t></w:r></w:p>

        <!-- ======================================================== -->
        <!-- CONTOH 2: KEMBALI KE SOAL TUNGGAL / BIASA DI TENGAH      -->
        <!-- Gunakan tag [SOAL TUNGGAL] atau [SOAL BIASA]            -->
        <!-- ======================================================== -->
        <w:p><w:r><w:rPr><w:b/><w:color w:val="d9480f"/></w:rPr><w:t>[SOAL TUNGGAL]</w:t></w:r></w:p>
        
        <!-- Soal 3: Soal Tunggal dengan Rumus LaTeX & Bold/Underline -->
        <w:p>
            <w:r><w:t>3. Nilai dari rumus kuadrat </w:t></w:r>
            <w:r><w:t>$$x = \frac{-b \pm \sqrt{b^2 - 4ac}}{2a}$$</w:t></w:r>
            <w:r><w:t> untuk persamaan </w:t></w:r>
            <w:r><w:rPr><w:b/></w:rPr><w:t>x^2 - 5x + 6 = 0</w:t></w:r>
            <w:r><w:t> dengan koefisien </w:t></w:r>
            <w:r><w:rPr><w:u w:val="single"/></w:rPr><w:t>a = 1</w:t></w:r>
            <w:r><w:t> adalah ...</w:t></w:r>
        </w:p>
        <w:p><w:r><w:t>A. $$x_1 = 2$$ dan $$x_2 = 3$$</w:t></w:r></w:p>
        <w:p><w:r><w:t>B. $$x_1 = -2$$ dan $$x_2 = -3$$</w:t></w:r></w:p>
        <w:p><w:r><w:t>C. $$x_1 = 1$$ dan $$x_2 = 6$$</w:t></w:r></w:p>
        <w:p><w:r><w:t>D. $$x_1 = -1$$ dan $$x_2 = -6$$</w:t></w:r></w:p>
        <w:p><w:r><w:rPr><w:b/></w:rPr><w:t>KUNCI: A</w:t></w:r></w:p>
        <w:p><w:r><w:t>BOBOT: 1.0</w:t></w:r></w:p>
        <w:p>
            <w:r><w:rPr><w:i/></w:rPr><w:t>PEMBAHASAN: Faktorisasi (x - 2)(x - 3) = 0 menghasilkan akar x = 2 atau x = 3.</w:t></w:r>
        </w:p>
        <w:p><w:r><w:t></w:t></w:r></w:p>

        <!-- Soal 4: Soal Tunggal Sejarah -->
        <w:p>
            <w:r><w:t>4. Lagu kebangsaan Republik Indonesia yang diciptakan oleh </w:t></w:r>
            <w:r><w:rPr><w:b/></w:rPr><w:t>Wage Rudolf Soepratman</w:t></w:r>
            <w:r><w:t> pertama kali diperdengarkan secara resmi pada Kongres Pemuda II tahun berapa?</w:t></w:r>
        </w:p>
        <w:p><w:r><w:t>A. 1928</w:t></w:r></w:p>
        <w:p><w:r><w:t>B. 1945</w:t></w:r></w:p>
        <w:p><w:r><w:t>C. 1908</w:t></w:r></w:p>
        <w:p><w:r><w:t>D. 1926</w:t></w:r></w:p>
        <w:p><w:r><w:rPr><w:b/></w:rPr><w:t>KUNCI: A</w:t></w:r></w:p>
        <w:p><w:r><w:t></w:t></w:r></w:p>

        <!-- ======================================================== -->
        <!-- CONTOH 3: STIMULUS KEDUA DI TENGAH ASESMEN               -->
        <!-- ======================================================== -->
        <w:p><w:r><w:rPr><w:b/><w:color w:val="2f9e44"/></w:rPr><w:t>[STIMULUS]</w:t></w:r></w:p>
        <w:p><w:r><w:rPr><w:b/></w:rPr><w:t>Judul: Konservasi Terumbu Karang Segitiga Karang Dunia</w:t></w:r></w:p>
        <w:p>
            <w:r><w:t>Teks: Perairan Indonesia merupakan jantung dari Coral Triangle dunia yang menopang ribuan spesies terumbu karang dan biota laut langka. Ancaman penangkapan ikan ilegal dan pemutihan karang (coral bleaching) akibat kenaikan suhu laut membutuhkan aksi pelestarian terpadu.</w:t></w:r>
        </w:p>
        <w:p><w:r><w:rPr><w:b/><w:color w:val="2f9e44"/></w:rPr><w:t>[AKHIR NARASI]</w:t></w:r></w:p>
        <w:p><w:r><w:t></w:t></w:r></w:p>

        <!-- Anak Soal 5 dari Stimulus Kedua -->
        <w:p>
            <w:r><w:t>5. Apa nama kawasan perairan dunia tempat Indonesia berada yang memiliki keanekaragaman karang tertinggi?</w:t></w:r>
        </w:p>
        <w:p><w:r><w:t>A. Coral Triangle</w:t></w:r></w:p>
        <w:p><w:r><w:t>B. Ring of Fire</w:t></w:r></w:p>
        <w:p><w:r><w:t>C. Mariana Trench</w:t></w:r></w:p>
        <w:p><w:r><w:t>D. Great Barrier</w:t></w:r></w:p>
        <w:p><w:r><w:rPr><w:b/></w:rPr><w:t>KUNCI: A</w:t></w:r></w:p>
        <w:p><w:r><w:t></w:t></w:r></w:p>

        <!-- Anak Soal 6 dari Stimulus Kedua -->
        <w:p>
            <w:r><w:t>6. Fenomena perubahan warna karang menjadi putih akibat stres suhu panas disebut ...</w:t></w:r>
        </w:p>
        <w:p><w:r><w:t>A. Coral Bleaching</w:t></w:r></w:p>
        <w:p><w:r><w:t>B. Coral Spawning</w:t></w:r></w:p>
        <w:p><w:r><w:t>C. Coral Calcification</w:t></w:r></w:p>
        <w:p><w:r><w:t>D. Coral Sedimentation</w:t></w:r></w:p>
        <w:p><w:r><w:rPr><w:b/></w:rPr><w:t>KUNCI: A</w:t></w:r></w:p>
        <w:p><w:r><w:t></w:t></w:r></w:p>

        <!-- ======================================================== -->
        <!-- CONTOH 4: SOAL TUNGGAL DI AKHIR ASESMEN                  -->
        <!-- ======================================================== -->
        <w:p><w:r><w:rPr><w:b/><w:color w:val="d9480f"/></w:rPr><w:t>[SOAL TUNGGAL]</w:t></w:r></w:p>
        <w:p>
            <w:r><w:t>7. Satuan internasional (SI) untuk mengukur intensitas cahaya adalah ...</w:t></w:r>
        </w:p>
        <w:p><w:r><w:t>A. Candela (cd)</w:t></w:r></w:p>
        <w:p><w:r><w:t>B. Lumen (lm)</w:t></w:r></w:p>
        <w:p><w:r><w:t>C. Lux (lx)</w:t></w:r></w:p>
        <w:p><w:r><w:t>D. Watt (W)</w:t></w:r></w:p>
        <w:p><w:r><w:rPr><w:b/></w:rPr><w:t>KUNCI: A</w:t></w:r></w:p>
    </w:body>
</w:document>';
        $zip->addFromString('word/document.xml', $documentXml);

        $zip->close();

        return $outputPath;
    }
}
