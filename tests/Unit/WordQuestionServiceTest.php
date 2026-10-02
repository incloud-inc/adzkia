<?php

namespace Tests\Unit;

use App\Services\WordQuestionService;
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
}
