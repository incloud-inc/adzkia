<?php

namespace Tests\Feature;

use Tests\TestCase;

class LandingPageLegalModalTest extends TestCase
{
    public function test_landing_page_displays_legal_and_about_links_in_footer(): void
    {
        $response = $this->get('/');

        $response->assertOk();

        // Verifikasi bahwa teks lama sudah tidak ada
        $response->assertDontSeeText('Solusi Platform');
        $response->assertDontSeeText('Bank Soal Asli Terstandarisasi');
        $response->assertDontSeeText('Pembahasan AI Langkah demi Langkah');
        $response->assertDontSeeText('Anti-Curang (Proctoring Mandiri)');
        $response->assertDontSeeText('Portal Multi-Tenant White-Label');
        $response->assertDontSeeText('Analisis Butir Soal & Rekap Nilai');

        // Verifikasi teks baru pada kolom footer
        $response->assertSeeText('Kebijakan Privasi');
        $response->assertSeeText('Tentang Kami');
        $response->assertSeeText('Syarat & Ketentuan');

        // Verifikasi struktur modal popup
        $response->assertSee('id="legal-modal"', false);
        $response->assertSee('id="content-privacy"', false);
        $response->assertSee('id="content-about"', false);
        $response->assertSee('id="content-terms"', false);
        $response->assertSee('openLegalModal', false);
    }
}
