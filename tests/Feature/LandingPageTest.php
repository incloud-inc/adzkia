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
        $response->assertSee('Aplikasi Ujian/Asesmen', false);
        $response->assertSee('Soal ASLI, Pembahasan AI.', false);
        $response->assertSee('ADZKIA CBT adalah platform ujian dan asesmen untuk Sekolah dan BIMBEL dengan Bank Soal ASLI TKA, UTBK, dan SKD Kedinasan & CPNS.', false);

        // 3. Card info mendatar (9 items)
        $response->assertSee('Sekolah dan BIMBEL Menggunakan ADZKIA');
        $response->assertSee('Murid (Siswa) melaksanakan Asesmen di ADZKIA');
        $response->assertSee('Free & PRO', false);
        $response->assertSee('Siap digunakan untuk Murid, Mahasiswa, Profesional');
        $response->assertSee('Soal Asli TKA, UTBK (Sejak 2019), dan SKD Kedinasan & CPNS lengkap dengan PEMBAHASAN', false);
        $response->assertSee('TOEIC Simulation, TOEFL Preparation, dan IELTS Mock Test.');
        $response->assertSee('Bank Soal Tersedia di ADZKIA');
        $response->assertSee('Sesi Asesmen dilaksanakan');
        $response->assertSee('Sesi Asesmen dilaksanakan bulan ini');
        $response->assertSee('Sesi Asesmen dilaksanakan pekan ini');

        // 4. Teaser & Features
        $response->assertSee('(PM UTBK 2025)');
        $response->assertSee('Untuk keperluan pengairan tanaman');
        $response->assertSee('Generate Pembahasan AI');
        $response->assertSee('Soal Asli sudah dilengkapi pembahasan oleh Guru dan Ahli, tapi kamu masih bisa minta penjelasan AI.');

        // 5. Navbar anchors
        $response->assertSee('href="#about"', false);
        $response->assertSee('href="#soal-asli"', false);
        $response->assertSee('href="#dibahas-ai"', false);
        $response->assertSee('href="#solusi"', false);
        $response->assertSee('href="#keunggulan"', false);
        $response->assertSee('href="#level-tenant"', false);
        $response->assertSee('Enterprise', false);
        $response->assertSee('href="#konsultasi"', false);

        // 5b. 3 Level Tenant (Starter Orange, Pro Green, Enterprise Blue)
        $response->assertSee('Pilih Level Tenant Sesuai Skala Institusi Anda');
        $response->assertSee('STARTER');
        $response->assertSee('PRO');
        $response->assertSee('ENTERPRISE');
        $response->assertSee('25%');
        $response->assertSee('50%');
        $response->assertSee('75%');
        $response->assertSee('Penerbitan Kupon Diskon Mandiri');
        $response->assertSee('Langkah awal terbaik bagi sekolah atau bimbel perintis yang ingin menyelenggarakan asesmen mandiri tanpa perlu repot membuat soal.');
        $response->assertSee('Ideal untuk bimbingan belajar dan sekolah dengan jumlah murid aktif reguler yang banyak dan mempunyai website sendiri. Siap SCALEUP bersama ADZKIA.');
        $response->assertSee('Dirancang untuk institusi pendidikan besar, yayasan sekolah, atau jaringan BIMBEL nasional. Eksklusif dengan WHITE LABEL.');

        // 6. Deleted terms must NOT be seen
        $response->assertDontSee('TIER 01');
        $response->assertDontSee('TIER 02');
        $response->assertDontSee('TIER 03');
        $response->assertDontSee('Kemitraan Utama');
        $response->assertDontSee('Paling Populer');
        $response->assertDontSee('Pemula / Sekolah');
        $response->assertDontSee('CBT & AI Engine');
        $response->assertDontSee('Model DeepSeek AI Engine');
        $response->assertDontSee('Konsultasi via WhatsApp');
        $response->assertDontSee('Klik untuk melihat simulasi penjelasan cerdas step-by-step');
        $response->assertDontSee('Portal mandiri, logo custom, dan bank soal terisolasi');
        $response->assertDontSee('Kurikulum Merdeka & K-13 dengan kisi-kisi per fase');

        // 7. Soft selling CTA
        $response->assertSee('Siap Menghadirkan Standar Asesmen Terbaik untuk Murid Anda?');
        $response->assertSee('adzkia.tryout@gmail.com');
    }
}
