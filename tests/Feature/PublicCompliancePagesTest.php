<?php

namespace Tests\Feature;

use Tests\TestCase;

class PublicCompliancePagesTest extends TestCase
{
    /**
     * Test FAQ page is accessible and displays content.
     */
    public function test_faq_page_loads_successfully(): void
    {
        $response = $this->get('/faq');

        $response->assertStatus(200);
        $response->assertSee('Pertanyaan yang Sering Diajukan (FAQ)');
        $response->assertSee('Akun &amp; Pendaftaran', false);
        $response->assertSee('TriPay');
    }

    /**
     * Test Refund Policy page is accessible and displays refund rules.
     */
    public function test_refund_policy_page_loads_successfully(): void
    {
        $response = $this->get('/refund-policy');

        $response->assertStatus(200);
        $response->assertSee('Kebijakan Pengembalian Dana (Refund Policy)');
        $response->assertSee('adzkia.tryout@gmail.com');
        $response->assertSee('081329983555');
    }

    /**
     * Test Terms and Conditions page is accessible and displays terms.
     */
    public function test_terms_and_conditions_page_loads_successfully(): void
    {
        $response = $this->get('/terms-and-conditions');

        $response->assertStatus(200);
        $response->assertSee('Syarat &amp; Ketentuan (Terms &amp; Conditions)', false);
        $response->assertSee('Palangka Raya');
        $response->assertSee('adzkia.tryout@gmail.com');
    }

    /**
     * Test Contact Us page displays mandatory email, phone, and address.
     */
    public function test_contact_page_loads_successfully_and_displays_required_info(): void
    {
        $response = $this->get('/kontak');

        $response->assertStatus(200);
        $response->assertSee('Hubungi Kami');
        $response->assertSee('adzkia.tryout@gmail.com');
        $response->assertSee('081329983555');
        $response->assertSee('Jalan Sriwijaya RUSUN BPKP KALTENG NO 314 RT 005 RW 014, Panarung, Pahandut, Kota Palangka Raya, Kalimantan Tengah. 73111');
    }

    /**
     * Test Landing Page footer contains all compliance links and contact details.
     */
    public function test_landing_page_footer_contains_compliance_links_and_contact(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee(route('pages.faq'));
        $response->assertSee(route('pages.refund-policy'));
        $response->assertSee(route('pages.terms'));
        $response->assertSee(route('pages.contact'));
        $response->assertSee('adzkia.tryout@gmail.com');
        $response->assertSee('081329983555');
        $response->assertSee('Jalan Sriwijaya RUSUN BPKP KALTENG NO 314 RT 005 RW 014, Panarung, Pahandut, Kota Palangka Raya, Kalimantan Tengah. 73111');
    }
}
