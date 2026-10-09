<?php

namespace Tests\Unit;

use App\Services\WordQuestionService;
use App\Support\MarkdownRenderer;
use PHPUnit\Framework\TestCase;

class WordQuestionServiceTest extends TestCase
{
    protected WordQuestionService $service;

    protected function setUp(): void
    {
        parent::setUp();
        $this->service = new WordQuestionService;
    }

    public function test_generate_template_creates_valid_docx(): void
    {
        $tmp = tempnam(sys_get_temp_dir(), 'test_tpl_').'.docx';
        $createdPath = $this->service->generateTemplate($tmp);

        $this->assertFileExists($createdPath);
        $this->assertGreaterThan(1000, filesize($createdPath));

        @unlink($tmp);
    }

    public function test_it_parses_all_question_types_from_template(): void
    {
        $tmp = tempnam(sys_get_temp_dir(), 'test_parse_').'.docx';
        $this->service->generateTemplate($tmp);

        $items = $this->service->parseDocx($tmp);
        @unlink($tmp);

        $this->assertCount(9, $items);

        // 1. Pilihan Ganda Tunggal dengan Bobot >= 2.0 (2.5) dan LaTeX
        $q1 = $items[0];
        $this->assertFalse($q1['is_group']);
        $this->assertEquals('mcq_single', $q1['type']);
        $this->assertEquals(2.5, $q1['points']);
        $this->assertStringContainsString('$$x = \frac{-b \pm \sqrt{b^2 - 4ac}}{2a}$$', $q1['prompt']);
        $this->assertCount(4, $q1['options']);
        $this->assertEquals(2.5, $q1['options'][0]['score']);
        $this->assertTrue($q1['options'][0]['is_correct']);
        $this->assertEquals(0.0, $q1['options'][1]['score']);

        // 2. TKP / Pilihan Ganda Berbobot (Format 2: Skor di Awal Opsi)
        $q2 = $items[1];
        $this->assertEquals('mcq_weighted', $q2['type']);
        $this->assertEquals(5.0, $q2['points']);
        $this->assertCount(5, $q2['options']);
        $this->assertEquals(5.0, $q2['options'][0]['score']);
        $this->assertEquals(4.0, $q2['options'][1]['score']);
        $this->assertEquals(3.0, $q2['options'][2]['score']);
        $this->assertEquals(2.0, $q2['options'][3]['score']);
        $this->assertEquals(1.0, $q2['options'][4]['score']);
        $this->assertStringNotContainsString('[5]', $q2['options'][0]['option_text']);

        // 3. Pilihan Ganda Kompleks
        $q3 = $items[2];
        $this->assertEquals('mcq_multiple', $q3['type']);
        $this->assertEquals(2.0, $q3['points']);
        $this->assertTrue($q3['options'][0]['is_correct']);
        $this->assertFalse($q3['options'][1]['is_correct']);
        $this->assertTrue($q3['options'][2]['is_correct']);

        // 4. Tabel Dikotomi / Analisis Benar-Salah
        $q4 = $items[3];
        $this->assertEquals('binary_matrix', $q4['type']);
        $this->assertEquals(3.0, $q4['points']);
        $this->assertCount(3, $q4['options']);
        $this->assertEquals('Benar', $q4['options'][0]['match_key']);
        $this->assertEquals('Salah', $q4['options'][1]['match_key']);
        $this->assertEquals('Benar', $q4['options'][2]['match_key']);

        // 5. Menjodohkan
        $q5 = $items[4];
        $this->assertEquals('matching', $q5['type']);
        $this->assertEquals(4.0, $q5['points']);
        $this->assertCount(4, $q5['options']);
        $this->assertEquals('New York, Amerika Serikat', $q5['options'][0]['match_key']);

        // 6. Mengurutkan
        $q6 = $items[5];
        $this->assertEquals('ordering', $q6['type']);
        $this->assertEquals(3.0, $q6['points']);
        $this->assertCount(5, $q6['options']);
        $this->assertEquals(1, $q6['options'][0]['order']);
        $this->assertEquals(5, $q6['options'][4]['order']);

        // 7. Isian Singkat
        $q7 = $items[6];
        $this->assertEquals('short_answer', $q7['type']);
        $this->assertEquals(2.0, $q7['points']);
        $this->assertEquals('Jantung', $q7['options'][0]['option_text']);

        // 8. Esai
        $q8 = $items[7];
        $this->assertEquals('essay', $q8['type']);
        $this->assertEquals(5.0, $q8['points']);
        $this->assertNotEmpty($q8['explanation']);

        // 9. Grup Stimulus Narasi Wacana
        $grp = $items[8];
        $this->assertTrue($grp['is_group']);
        $this->assertEquals('Konservasi Segitiga Terumbu Karang Nusantara', $grp['title']);
        $this->assertCount(2, $grp['questions']);
        $this->assertEquals('mcq_single', $grp['questions'][0]['type']);
        $this->assertEquals(2.0, $grp['questions'][0]['points']);
        $this->assertEquals('mcq_multiple', $grp['questions'][1]['type']);
        $this->assertEquals(2.0, $grp['questions'][1]['points']);
    }

    public function test_it_parses_questions_with_embedded_images(): void
    {
        $tmp = tempnam(sys_get_temp_dir(), 'test_img_docx_').'.docx';
        $zip = new \ZipArchive;
        $this->assertTrue($zip->open($tmp, \ZipArchive::CREATE | \ZipArchive::OVERWRITE));

        $pngData = base64_decode('iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVR42mNk+M9QDwADhgGAWjR9awAAAABJRU5ErkJggg==');

        $zip->addFromString('[Content_Types].xml', '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>
<Types xmlns="http://schemas.openxmlformats.org/package/2006/content-types">
    <Default Extension="rels" ContentType="application/vnd.openxmlformats-package.relationships+xml"/>
    <Default Extension="xml" ContentType="application/xml"/>
    <Default Extension="png" ContentType="image/png"/>
    <Override PartName="/word/document.xml" ContentType="application/vnd.openxmlformats-officedocument.wordprocessingml.document.main+xml"/>
</Types>');

        $zip->addFromString('_rels/.rels', '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>
<Relationships xmlns="http://schemas.openxmlformats.org/package/2006/relationships">
    <Relationship Id="rId1" Type="http://schemas.openxmlformats.org/officeDocument/2006/relationships/officeDocument" Target="word/document.xml"/>
</Relationships>');

        $zip->addFromString('word/_rels/document.xml.rels', '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>
<Relationships xmlns="http://schemas.openxmlformats.org/package/2006/relationships">
    <Relationship Id="rIdImg1" Type="http://schemas.openxmlformats.org/officeDocument/2006/relationships/image" Target="media/image1.png"/>
    <Relationship Id="rIdImg2" Type="http://schemas.openxmlformats.org/officeDocument/2006/relationships/image" Target="media/image2.png"/>
</Relationships>');

        $zip->addFromString('word/media/image1.png', $pngData);
        $zip->addFromString('word/media/image2.png', $pngData);

        $documentXml = '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>
<w:document xmlns:w="http://schemas.openxmlformats.org/wordprocessingml/2006/main"
            xmlns:r="http://schemas.openxmlformats.org/officeDocument/2006/relationships"
            xmlns:a="http://schemas.openxmlformats.org/drawingml/2006/main"
            xmlns:wp="http://schemas.openxmlformats.org/drawingml/2006/wordprocessingDrawing"
            xmlns:pic="http://schemas.openxmlformats.org/drawingml/2006/picture">
    <w:body>
        <w:p>
            <w:r><w:t>1. Perhatikan gambar siklus sel di bawah ini:</w:t></w:r>
        </w:p>
        <w:p>
            <w:r>
                <w:drawing>
                    <wp:inline>
                        <wp:docPr id="1" name="Diagram Sel" descr="Gambar Siklus Sel"/>
                        <a:graphic>
                            <a:graphicData uri="http://schemas.openxmlformats.org/drawingml/2006/picture">
                                <pic:pic>
                                    <pic:blipFill>
                                        <a:blip r:embed="rIdImg1"/>
                                    </pic:blipFill>
                                </pic:pic>
                            </a:graphicData>
                        </a:graphic>
                    </wp:inline>
                </w:drawing>
            </w:r>
        </w:p>
        <w:p>
            <w:r><w:t>Fase pembelahan yang ditunjukkan adalah ...</w:t></w:r>
        </w:p>
        <w:p><w:r><w:t>A. Metafase</w:t></w:r></w:p>
        <w:p><w:r><w:t>B. Anafase</w:t></w:r></w:p>
        <w:p><w:r><w:t>C. Telofase</w:t></w:r></w:p>
        <w:p><w:r><w:t>D. Profase</w:t></w:r></w:p>
        <w:p><w:r><w:t>KUNCI: A</w:t></w:r></w:p>
        <w:p><w:r><w:t>PEMBAHASAN: Pada metafase, kromosom berjajar di bidang ekuator.</w:t></w:r></w:p>
        <w:p>
            <w:r><w:t>2. [KOMPLEKS] Manakah organel yang memiliki membran ganda?</w:t></w:r>
        </w:p>
        <w:p><w:r><w:t>A. Mitokondria</w:t></w:r></w:p>
        <w:p>
            <w:r><w:t>B. Kloroplas </w:t></w:r>
            <w:r>
                <w:drawing>
                    <wp:inline>
                        <wp:docPr id="2" name="Kloroplas" descr="Gambar Kloroplas"/>
                        <a:graphic>
                            <a:graphicData uri="http://schemas.openxmlformats.org/drawingml/2006/picture">
                                <pic:pic>
                                    <pic:blipFill>
                                        <a:blip r:embed="rIdImg2"/>
                                    </pic:blipFill>
                                </pic:pic>
                            </a:graphicData>
                        </a:graphic>
                    </wp:inline>
                </w:drawing>
            </w:r>
        </w:p>
        <w:p><w:r><w:t>C. Ribosom</w:t></w:r></w:p>
        <w:p><w:r><w:t>KUNCI: A, B</w:t></w:r></w:p>
    </w:body>
</w:document>';
        $zip->addFromString('word/document.xml', $documentXml);
        $zip->close();

        $items = $this->service->parseDocx($tmp);
        @unlink($tmp);

        $this->assertCount(2, $items);

        // Q1: prompt has image
        $q1 = $items[0];
        $this->assertEquals('mcq_single', $q1['type']);
        $this->assertStringContainsString('Perhatikan gambar siklus sel di bawah ini:', $q1['prompt']);
        $this->assertStringContainsString('Fase pembelahan yang ditunjukkan adalah ...', $q1['prompt']);
        $this->assertStringContainsString('![Gambar Siklus Sel](', $q1['prompt']);
        $this->assertStringContainsString('Pada metafase, kromosom berjajar di bidang ekuator.', $q1['explanation']);

        // Q2: option B has image
        $q2 = $items[1];
        $this->assertEquals('mcq_multiple', $q2['type']);
        $this->assertCount(3, $q2['options']);
        $this->assertEquals('Mitokondria', $q2['options'][0]['option_text']);
        $this->assertStringContainsString('Kloroplas', $q2['options'][1]['option_text']);
        $this->assertStringContainsString('![Gambar Kloroplas](', $q2['options'][1]['option_text']);
        $this->assertTrue($q2['options'][0]['is_correct']);
        $this->assertTrue($q2['options'][1]['is_correct']);
        $this->assertFalse($q2['options'][2]['is_correct']);
    }

    public function test_it_converts_word_omml_equations_to_markdown_latex(): void
    {
        $tmp = tempnam(sys_get_temp_dir(), 'test_omml_').'.docx';
        $zip = new \ZipArchive;
        $zip->open($tmp, \ZipArchive::CREATE | \ZipArchive::OVERWRITE);

        $contentTypes = '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>
<Types xmlns="http://schemas.openxmlformats.org/package/2006/content-types">
    <Default Extension="rels" ContentType="application/vnd.openxmlformats-package.relationships+xml"/>
    <Default Extension="xml" ContentType="application/xml"/>
    <Override PartName="/word/document.xml" ContentType="application/vnd.openxmlformats-officedocument.wordprocessingml.document.main+xml"/>
</Types>';
        $zip->addFromString('[Content_Types].xml', $contentTypes);

        $rels = '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>
<Relationships xmlns="http://schemas.openxmlformats.org/package/2006/relationships">
    <Relationship Id="rId1" Type="http://schemas.openxmlformats.org/officeDocument/2006/relationships/officeDocument" Target="word/document.xml"/>
</Relationships>';
        $zip->addFromString('_rels/.rels', $rels);

        $documentXml = '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>
<w:document xmlns:w="http://schemas.openxmlformats.org/wordprocessingml/2006/main"
            xmlns:m="http://schemas.openxmlformats.org/officeDocument/2006/math">
    <w:body>
        <w:p>
            <w:r><w:t>1. Hitunglah nilai dari </w:t></w:r>
            <m:oMath>
                <m:f>
                    <m:num><m:r><m:t>1</m:t></m:r></m:num>
                    <m:den><m:r><m:t>2</m:t></m:r></m:den>
                </m:f>
                <m:r><m:t> + </m:t></m:r>
                <m:rad>
                    <m:deg/>
                    <m:e><m:r><m:t>16</m:t></m:r></m:e>
                </m:rad>
                <m:r><m:t> + </m:t></m:r>
                <m:sSup>
                    <m:e><m:r><m:t>x</m:t></m:r></m:e>
                    <m:sup><m:r><m:t>2</m:t></m:r></m:sup>
                </m:sSup>
            </m:oMath>
            <w:r><w:t> jika x = 3.</w:t></w:r>
        </w:p>
        <w:p><w:r><w:t>A. 13,5</w:t></w:r></w:p>
        <w:p><w:r><w:t>B. 14</w:t></w:r></w:p>
        <w:p><w:r><w:t>KUNCI: A</w:t></w:r></w:p>
        <w:p>
            <w:r><w:t>PEMBAHASAN: Persamaan kuadrat dengan rumus integral: </w:t></w:r>
            <m:oMathPara>
                <m:oMath>
                    <m:nary>
                        <m:naryPr><m:chr m:val="∫"/></m:naryPr>
                        <m:sub><m:r><m:t>0</m:t></m:r></m:sub>
                        <m:sup><m:r><m:t>1</m:t></m:r></m:sup>
                        <m:e>
                            <m:sSup>
                                <m:e><m:r><m:t>x</m:t></m:r></m:e>
                                <m:sup><m:r><m:t>2</m:t></m:r></m:sup>
                            </m:sSup>
                            <m:r><m:t> dx</m:t></m:r>
                        </m:e>
                    </m:nary>
                </m:oMath>
            </m:oMathPara>
        </w:p>
    </w:body>
</w:document>';
        $zip->addFromString('word/document.xml', $documentXml);
        $zip->close();

        $items = $this->service->parseDocx($tmp);
        @unlink($tmp);

        $this->assertCount(1, $items);
        $q = $items[0];

        // Memastikan pecahan (\frac{1}{2}), akar (\sqrt{16}), dan pangkat ({x}^{2}) menjadi LaTeX inline $...$
        $this->assertStringContainsString('$\\frac{1}{2} + \\sqrt{16} + {x}^{2}$', $q['prompt']);

        // Memastikan integral blok (\int_{0}^{1}) menjadi LaTeX display $$...$$
        $this->assertStringContainsString('$$\\int_{0}^{1} {x}^{2} dx$$', preg_replace('/\s+/', ' ', $q['explanation']));
    }

    public function test_format_math_in_plain_text_converts_sqrt_akar_and_symbols_to_markdown_latex(): void
    {
        $input = 'Berapakah nilai dari sqrt(16) + akar(25) - sqrt[3]{8} dan √144?';
        $formatted = $this->service->formatMathInPlainText($input);

        $this->assertStringContainsString('$\\sqrt{16}$', $formatted);
        $this->assertStringContainsString('$\\sqrt{25}$', $formatted);
        $this->assertStringContainsString('$\\sqrt[3]{8}$', $formatted);
        $this->assertStringContainsString('$\\sqrt{144}$', $formatted);

        // Uji rumus LaTeX terbuka yang otomatis dibungkus $...$
        $inputLatex = 'Hitung nilai \frac{10}{2} + \sqrt{100}';
        $formattedLatex = $this->service->formatMathInPlainText($inputLatex);
        $this->assertStringContainsString('$\\frac{10}{2}$', $formattedLatex);
        $this->assertStringContainsString('$\\sqrt{100}$', $formattedLatex);

        // Lindungi rumus yang sudah berada di dalam $...$ atau $$...$$ agar tidak double wrapped
        $inputProtected = 'Rumus $x = \sqrt{a+b}$ dan $$E = mc^2$$ tidak boleh rusak.';
        $formattedProtected = $this->service->formatMathInPlainText($inputProtected);
        $this->assertEquals($inputProtected, $formattedProtected);
    }

    public function test_it_handles_word_vertalign_superscript_and_subscript(): void
    {
        $tmp = tempnam(sys_get_temp_dir(), 'test_vertalign_').'.docx';
        $zip = new \ZipArchive;
        $zip->open($tmp, \ZipArchive::CREATE | \ZipArchive::OVERWRITE);

        $contentTypes = '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>
<Types xmlns="http://schemas.openxmlformats.org/package/2006/content-types">
    <Default Extension="rels" ContentType="application/vnd.openxmlformats-package.relationships+xml"/>
    <Default Extension="xml" ContentType="application/xml"/>
    <Override PartName="/word/document.xml" ContentType="application/vnd.openxmlformats-officedocument.wordprocessingml.document.main+xml"/>
</Types>';
        $zip->addFromString('[Content_Types].xml', $contentTypes);

        $rels = '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>
<Relationships xmlns="http://schemas.openxmlformats.org/package/2006/relationships">
    <Relationship Id="rId1" Type="http://schemas.openxmlformats.org/officeDocument/2006/relationships/officeDocument" Target="word/document.xml"/>
</Relationships>';
        $zip->addFromString('_rels/.rels', $rels);

        $documentXml = '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>
<w:document xmlns:w="http://schemas.openxmlformats.org/wordprocessingml/2006/main">
    <w:body>
        <w:p>
            <w:r><w:t>1. Rumus senyawa kimia air adalah H</w:t></w:r>
            <w:r>
                <w:rPr><w:vertAlign w:val="subscript"/></w:rPr>
                <w:t>2</w:t>
            </w:r>
            <w:r><w:t>O dan persamaan matematika x</w:t></w:r>
            <w:r>
                <w:rPr><w:vertAlign w:val="superscript"/></w:rPr>
                <w:t>2</w:t>
            </w:r>
            <w:r><w:t> + y = 0.</w:t></w:r>
        </w:p>
        <w:p><w:r><w:t>A. Benar</w:t></w:r></w:p>
        <w:p><w:r><w:t>B. Salah</w:t></w:r></w:p>
        <w:p><w:r><w:t>KUNCI: A</w:t></w:r></w:p>
    </w:body>
</w:document>';
        $zip->addFromString('word/document.xml', $documentXml);
        $zip->close();

        $items = $this->service->parseDocx($tmp);
        @unlink($tmp);

        $this->assertCount(1, $items);
        $q = $items[0];

        $this->assertStringContainsString('H<sub>2</sub>O', $q['prompt']);
        $this->assertStringContainsString('x<sup>2</sup>', $q['prompt']);
    }

    public function test_it_converts_nth_roots_and_preserves_latex_in_markdown(): void
    {
        // 1. Uji akar pangkat verbal bahasa Indonesia
        $res1 = $this->service->formatMathInPlainText('Berapa nilai dari akar pangkat 3 dari 8?');
        $this->assertStringContainsString('$\\sqrt[3]{8}$', $res1);

        // 2. Uji akar kurung siku
        $res2 = $this->service->formatMathInPlainText('Hitung sqrt[4]{16} dan akar[5]{32}');
        $this->assertStringContainsString('$\\sqrt[4]{16}$', $res2);
        $this->assertStringContainsString('$\\sqrt[5]{32}$', $res2);

        // 3. Uji simbol Unicode akar (∜, ∛, √)
        $res3 = $this->service->formatMathInPlainText('Tentukan ∜81 dan ∛27 serta √144');
        $this->assertStringContainsString('$\\sqrt[4]{81}$', $res3);
        $this->assertStringContainsString('$\\sqrt[3]{27}$', $res3);
        $this->assertStringContainsString('$\\sqrt{144}$', $res3);

        // 4. Uji makro LaTeX terbuka yang belum dibungkus $
        $res4 = $this->service->formatMathInPlainText('Rumus adalah \sqrt[3]{x+1} dan \frac{a}{b}');
        $this->assertStringContainsString('$\\sqrt[3]{x+1}$', $res4);
        $this->assertStringContainsString('$\\frac{a}{b}$', $res4);

        // 5. Uji MarkdownRenderer menjaga formula dari perusakan CommonMark
        $html = MarkdownRenderer::render('Hitung $\\sqrt[3]{x}$ dan $\\sum_{i=1}^n x_i$');
        $this->assertStringContainsString('$\\sqrt[3]{x}$', $html);
        $this->assertStringContainsString('$\\sum_{i=1}^n x_i$', $html);
        $this->assertStringNotContainsString('<em>', $html);
    }
}
