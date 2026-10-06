<?php

namespace Tests\Feature;

use Tests\TestCase;

class LandingPageTest extends TestCase
{
    /**
     * Test the Landing Page displays all required headlines, meta tags, and horizontal cards.
     */
    public function test_landing_page_renders_with_required_content(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);

        // 1. Title & Meta
        $response->assertSee('<title>Aplikasi Ujian ADZKIA</title>', false);
        $response->assertSee('Aplikasi Ujian dengan Soal ASLI dan Pembahasan AI.');

        // 2. Headlines & Eyebrow
        $response->assertSee('Untuk Lembaga yang Siap Pembelajaran Mendalam dengan AI');
        $response->assertSee('Refined Assessment.');
        $response->assertSee('Soal ASLI, Pembahasan AI.');
        $response->assertSee('Dengan ADZKIA, Sekolah dan BIMBEL punya QUIZ, Ujian, Asesmen, dan TryOut untuk Murid-nya.');

        // 3. Card info mendatar (9 items)
        $response->assertSee('Sekolah dan BIMBEL Menggunakan ADZKIA');
        $response->assertSee('Murid/Pelajar melaksanakan Asesmen di ADZKIA');
        $response->assertSee('Asesmen untuk Kelas 1 SD sampai 12 SMA');
        $response->assertSee('Asesmen untuk TKA, UTBK, dan SKD Kedinasan CPNS');
        $response->assertSee('TOEIC, TOEFL, dan IELTS');
        $response->assertSee('Bank Soal Tersedia di ADZKIA');
        $response->assertSee('Sesi Asesmen dilaksanakan');
        $response->assertSee('Sesi Asesmen dilaksanakan bulan ini');
        $response->assertSee('Sesi Asesmen dilaksanakan pekan ini');

        // 4. Teaser & Features
        $response->assertSee('Contoh Soal Asli UTBK SNBT:');
        $response->assertSee('(PM UTBK 2025) Untuk keperluan pengairan tanaman');
        $response->assertSee('Generate Pembahasan AI');
        $response->assertSee('Solusi');
        $response->assertSee('Guru menjelaskan singkat,<br>AI menjabarkan sampai jelas.', false);

        // 5. Deleted terms must NOT be seen
        $response->assertDontSee('CBT & AI Engine');
        $response->assertDontSee('Model DeepSeek AI Engine');

        // 6. Soft selling CTA
        $response->assertSee('Siap Menghadirkan Standar Asesmen Terbaik untuk Murid Anda?');
        $response->assertSee('Tanya Santai via WhatsApp');
    }
}
