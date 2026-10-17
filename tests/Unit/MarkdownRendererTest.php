<?php

namespace Tests\Unit;

use App\Support\MarkdownRenderer;
use Tests\TestCase;

class MarkdownRendererTest extends TestCase
{
    public function test_it_preserves_latex_math_formulas(): void
    {
        $html = MarkdownRenderer::render('Hitung $\sqrt[3]{x}$ dan $\sum_{i=1}^n x_i$');
        $this->assertStringContainsString('$\sqrt[3]{x}$', $html);
        $this->assertStringContainsString('$\sum_{i=1}^n x_i$', $html);
        $this->assertStringNotContainsString('<em>', $html);
    }

    public function test_it_strips_autoplay_from_audio_and_video(): void
    {
        $input = 'Dengarkan rekaman berikut: <audio controls autoplay src="https://example.com/audio.mp3"></audio>';
        $output = MarkdownRenderer::render($input);

        $this->assertStringNotContainsString('autoplay', $output);
        $this->assertStringContainsString('<audio', $output);
        $this->assertStringContainsString('controls', $output);
        $this->assertStringContainsString('preload="metadata"', $output);
        $this->assertStringContainsString('src="https://example.com/audio.mp3"', $output);

        $inputVideo = 'Simak video ini: <video controls autoplay="true" playsinline src="https://example.com/video.mp4"></video>';
        $outputVideo = MarkdownRenderer::render($inputVideo);

        $this->assertStringNotContainsString('autoplay', $outputVideo);
        $this->assertStringContainsString('<video', $outputVideo);
        $this->assertStringContainsString('controls', $outputVideo);
        $this->assertStringContainsString('playsinline', $outputVideo);
        $this->assertStringContainsString('preload="metadata"', $outputVideo);
    }

    public function test_it_preserves_existing_preload_attribute(): void
    {
        $input = '<audio controls preload="none" src="https://example.com/audio.mp3"></audio>';
        $output = MarkdownRenderer::render($input);

        $this->assertStringContainsString('preload="none"', $output);
        $this->assertStringNotContainsString('preload="metadata"', $output);
    }
}
