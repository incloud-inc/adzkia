<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class PublicPageController extends Controller
{
    /**
     * Display the FAQ (Frequently Asked Questions) page.
     */
    public function faq(): View
    {
        return view('pages.faq', [
            'title' => 'Tanya Jawab (FAQ) - ADZKIA CBT',
        ]);
    }

    /**
     * Display the Refund Policy page.
     */
    public function refundPolicy(): View
    {
        return view('pages.refund-policy', [
            'title' => 'Kebijakan Pengembalian Dana (Refund Policy) - ADZKIA CBT',
        ]);
    }

    /**
     * Display the Terms and Conditions page.
     */
    public function terms(): View
    {
        return view('pages.terms-and-conditions', [
            'title' => 'Syarat & Ketentuan (Terms & Conditions) - ADZKIA CBT',
        ]);
    }

    /**
     * Display the Contact Us page.
     */
    public function contact(): View
    {
        return view('pages.contact', [
            'title' => 'Hubungi Kami (Kontak Resmi) - ADZKIA CBT',
        ]);
    }

    /**
     * Display the Privacy Policy page.
     */
    public function privacy(): View
    {
        return view('pages.privacy-policy', [
            'title' => 'Kebijakan Privasi (Privacy Policy) - ADZKIA CBT',
        ]);
    }
}
