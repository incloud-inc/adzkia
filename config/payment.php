<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Default Payment Gateway Driver
    |--------------------------------------------------------------------------
    | Supported: "duitku", "doku", "sandbox"
    */
    'default' => env('PAYMENT_GATEWAY_DRIVER', 'duitku'),

    'gateways' => [
        'duitku' => [
            'merchant_code' => env('DUITKU_MERCHANT_CODE', ''),
            'api_key' => env('DUITKU_API_KEY', ''),
            'sandbox' => env('DUITKU_SANDBOX', true),
            'base_url' => env('DUITKU_SANDBOX', true)
                ? 'https://sandbox.duitku.com/webapi/api/merchant/v2/inquiry'
                : 'https://passport.duitku.com/webapi/api/merchant/v2/inquiry',
            'expiry_period' => 1440, // 24 hours in minutes
        ],

        'tripay' => [
            'merchant_code' => env('TRIPAY_MERCHANT_CODE', ''),
            'api_key' => env('TRIPAY_API_KEY', ''),
            'private_key' => env('TRIPAY_PRIVATE_KEY', ''),
            'sandbox' => env('TRIPAY_SANDBOX', true),
            'base_url' => env('TRIPAY_SANDBOX', true)
                ? 'https://tripay.co.id/api-sandbox/'
                : 'https://tripay.co.id/api/',
            'expiry_period' => 1440, // 24 hours in minutes
        ],

        'doku' => [
            'client_id' => env('DOKU_CLIENT_ID', ''),
            'secret_key' => env('DOKU_SECRET_KEY', ''),
            'sandbox' => env('DOKU_SANDBOX', true),
        ],

        'midtrans' => [
            'server_key' => env('MIDTRANS_SERVER_KEY', ''),
            'client_key' => env('MIDTRANS_CLIENT_KEY', ''),
            'merchant_id' => env('MIDTRANS_MERCHANT_ID', ''),
            'sandbox' => env('MIDTRANS_SANDBOX', true),
            'snap_url' => env('MIDTRANS_SANDBOX', true)
                ? 'https://app.sandbox.midtrans.com/snap/v1/transactions'
                : 'https://app.midtrans.com/snap/v1/transactions',
            'expiry_period' => 1440, // 24 hours in minutes
        ],

        'sandbox' => [
            'auto_settle' => env('PAYMENT_SANDBOX_AUTO_SETTLE', false),
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Supported Payment Methods
    |--------------------------------------------------------------------------
    */
    'methods' => [
        'QRIS' => [
            'code' => 'QRIS',
            'channel' => 'SP', // Duitku
            'channel_tripay' => 'QRIS', // Tripay
            'channel_midtrans' => 'gopay', // Midtrans (gopay / qris)
            'label' => 'QRIS Nasional',
            'group' => 'qris',
            'icon' => 'qrcode',
            'fee_flat' => 750,
            'fee_percent' => 0.70,
            'fee_min' => 750,
            'fee' => 750,
            'description' => 'Pembayaran dengan cara scan QR Code yang dapat digunakan di berbagai dompet digital seperti OVO, Dana, GoPay dll.',
        ],
        'VA_BNI' => [
            'code' => 'VA_BNI',
            'channel' => 'I1', // Duitku
            'channel_tripay' => 'BNIVA', // Tripay
            'channel_midtrans' => 'bni_va', // Midtrans
            'label' => 'BNI Virtual Account',
            'group' => 'va',
            'icon' => 'credit-card',
            'fee_flat' => 4250,
            'fee_percent' => 0,
            'fee_min' => 0,
            'fee' => 4250,
            'description' => 'Pembayaran dengan cara transfer ke nomor rekening virtual dari bank BNI',
        ],
        'VA_BRI' => [
            'code' => 'VA_BRI',
            'channel' => 'BR', // Duitku
            'channel_tripay' => 'BRIVA', // Tripay
            'channel_midtrans' => 'bri_va', // Midtrans
            'label' => 'BRI Virtual Account (BRIVA)',
            'group' => 'va',
            'icon' => 'credit-card',
            'fee_flat' => 4250,
            'fee_percent' => 0,
            'fee_min' => 0,
            'fee' => 4250,
            'description' => 'Pembayaran dengan cara transfer ke nomor rekening virtual dari bank BRI',
        ],
        'VA_MANDIRI' => [
            'code' => 'VA_MANDIRI',
            'channel' => 'M2', // Duitku
            'channel_tripay' => 'MANDIRIVA', // Tripay
            'channel_midtrans' => 'echannel', // Midtrans Mandiri Bill
            'label' => 'Mandiri Virtual Account',
            'group' => 'va',
            'icon' => 'credit-card',
            'fee_flat' => 4250,
            'fee_percent' => 0,
            'fee_min' => 0,
            'fee' => 4250,
            'description' => 'Pembayaran dengan cara transfer ke nomor rekening virtual dari bank Mandiri',
        ],
        'VA_BCA' => [
            'code' => 'VA_BCA',
            'channel' => 'BC', // Duitku
            'channel_tripay' => 'BCAVA', // Tripay
            'channel_midtrans' => 'bca_va', // Midtrans
            'label' => 'BCA Virtual Account',
            'group' => 'va',
            'icon' => 'credit-card',
            'fee_flat' => 5500,
            'fee_percent' => 0,
            'fee_min' => 0,
            'fee' => 5500,
            'fee_note' => '* Masa kliring fixed H+3',
            'description' => 'Pembayaran dengan cara transfer ke nomor rekening virtual dari bank BCA (* Masa kliring fixed H+3)',
        ],
        'VA_MUAMALAT' => [
            'code' => 'VA_MUAMALAT',
            'channel' => 'MU', // Duitku
            'channel_tripay' => 'MUAMALATVA', // Tripay
            'channel_midtrans' => 'other_va', // Midtrans
            'label' => 'Muamalat Virtual Account',
            'group' => 'va',
            'icon' => 'credit-card',
            'fee_flat' => 4250,
            'fee_percent' => 0,
            'fee_min' => 0,
            'fee' => 4250,
            'description' => 'Pembayaran dengan cara transfer ke nomor rekening virtual dari bank Muamalat',
        ],
        'VA_BSI' => [
            'code' => 'VA_BSI',
            'channel' => 'BT', // Duitku
            'channel_tripay' => 'BSIVA', // Tripay
            'channel_midtrans' => 'other_va', // Midtrans
            'label' => 'BSI Virtual Account',
            'group' => 'va',
            'icon' => 'credit-card',
            'fee_flat' => 4250,
            'fee_percent' => 0,
            'fee_min' => 0,
            'fee' => 4250,
            'description' => 'Pembayaran melalui nomor rekening virtual dari Bank Syariah Indonesia (BSI)',
        ],
        'OVO' => [
            'code' => 'OVO',
            'channel' => 'OV', // Duitku
            'channel_tripay' => 'OVO', // Tripay
            'channel_midtrans' => 'ovo', // Midtrans
            'label' => 'OVO',
            'group' => 'ewallet',
            'icon' => 'mobile',
            'fee_flat' => 0,
            'fee_percent' => 3.00,
            'fee_min' => 1000,
            'fee' => 1000,
            'description' => 'Pembayaran dengan metode push payment atau prompt tagihan yang muncul di aplikasi OVO pelanggan',
        ],
        'DANA' => [
            'code' => 'DANA',
            'channel' => 'DA', // Duitku
            'channel_tripay' => 'DANA', // Tripay
            'channel_midtrans' => 'dana', // Midtrans
            'label' => 'DANA',
            'group' => 'ewallet',
            'icon' => 'mobile',
            'fee_flat' => 0,
            'fee_percent' => 3.00,
            'fee_min' => 1000,
            'fee' => 1000,
            'description' => 'Pembayaran melalui E-Wallet DANA',
        ],
        'SHOPEEPAY' => [
            'code' => 'SHOPEEPAY',
            'channel' => 'SP', // Duitku
            'channel_tripay' => 'SHOPEEPAY', // Tripay
            'channel_midtrans' => 'shopeepay', // Midtrans
            'label' => 'ShopeePay',
            'group' => 'ewallet',
            'icon' => 'mobile',
            'fee_flat' => 0,
            'fee_percent' => 3.00,
            'fee_min' => 1000,
            'fee' => 1000,
            'fee_note' => 'Khusus perangkat mobile',
            'description' => 'Pembayaran dengan cara dialihkan ke aplikasi e-wallet ShopeePay (khusus pengguna perangkat mobile)',
        ],
    ],
];
