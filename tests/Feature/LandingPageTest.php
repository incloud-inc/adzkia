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
        $response->assertSee('<title>Aplikasi Ujian/Asesmen - ADZKIA CBT | Bank Soal ASLI & Pembahasan AI</title>', false);
        $response->assertSee('Aplikasi Ujian &amp; Asesmen ADZKIA CBT dengan Soal ASLI dan Pembahasan AI.', false);

        // 2. Headlines & Eyebrow
        $response->assertSee('Sekolah & BIMBEL Optimalkan Pembelajaran, ADZKIA CBT Sempurnakan Pencapaian', false);
        $response->assertSee('Aplikasi Ujian/Asesmen.', false);
        $response->assertSee('Soal ASLI, Pembahasan AI.', false);
        $response->assertSee('ADZKIA CBT adalah platform ujian dan asesmen untuk Sekolah dan BIMBEL dengan Bank Soal ASLI TKA, UTBK, dan SKD Kedinasan & CPNS.', false);

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
