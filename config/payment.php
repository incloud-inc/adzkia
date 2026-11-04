<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Default Payment Gateway Driver
    |--------------------------------------------------------------------------
    | Supported: "ipaymu", "tripay"
    */
    'default' => env('PAYMENT_GATEWAY_DRIVER', 'ipaymu'),

    'gateways' => [
        'ipaymu' => [
            'va' => env('IPAYMU_VA', '1179001329983555'),
            'api_key' => env('IPAYMU_API_KEY', 'CEF02541-DB54-48EE-84C1-B96DD1FF0BB4'),
            'sandbox' => env('IPAYMU_SANDBOX', false),
            'base_url' => env('IPAYMU_SANDBOX', false)
                ? 'https://sandbox.ipaymu.com/api/v2/'
                : 'https://my.ipaymu.com/api/v2/',
            'expiry_period' => 1440, // 24 hours in minutes
        ],

        'tripay' => [
            'merchant_code' => env('TRIPAY_MERCHANT_CODE', ''),
            'api_key' => env('TRIPAY_API_KEY', ''),
            'private_key' => env('TRIPAY_PRIVATE_KEY', ''),
            'sandbox' => env('TRIPAY_SANDBOX', false),
            'base_url' => env('TRIPAY_SANDBOX', false)
                ? 'https://tripay.co.id/api-sandbox/'
                : 'https://tripay.co.id/api/',
            'expiry_period' => 1440, // 24 hours in minutes
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Supported Payment Methods
    |--------------------------------------------------------------------------
    | Kanal pembayaran resmi iPaymu untuk QRIS menggunakan tarif MDR resmi 0.70%
    | (tanpa biaya flat tambahan dan tanpa minimum fee).
    */
    'methods' => [
        'QRIS' => [
            'code' => 'QRIS',
            'channel_ipaymu' => 'qris',
            'method_ipaymu' => 'qris',
            'channel_tripay' => 'QRIS',
            'label' => 'QRIS Nasional (iPaymu)',
            'group' => 'qris',
            'icon' => 'qrcode',
            'fee_flat' => 0,
            'fee_percent' => 0.70,
            'fee_min' => 0,
            'fee' => 0,
            'fee_note' => '0.70% MDR Resmi iPaymu',
            'description' => 'Pembayaran instan dengan scan kode QRIS menggunakan seluruh aplikasi mobile banking (BCA, Mandiri, BRI, BNI, BSI) dan seluruh e-wallet (GoPay, OVO, DANA, ShopeePay, LinkAja).',
        ],
        'VA_BNI' => [
            'code' => 'VA_BNI',
            'channel_ipaymu' => 'bni',
            'method_ipaymu' => 'va',
            'channel_tripay' => 'BNIVA',
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
            'channel_ipaymu' => 'bri',
            'method_ipaymu' => 'va',
            'channel_tripay' => 'BRIVA',
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
            'channel_ipaymu' => 'mandiri',
            'method_ipaymu' => 'va',
            'channel_tripay' => 'MANDIRIVA',
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
            'channel_ipaymu' => 'bca',
            'method_ipaymu' => 'va',
            'channel_tripay' => 'BCAVA',
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
            'channel_ipaymu' => 'muamalat',
            'method_ipaymu' => 'va',
            'channel_tripay' => 'MUAMALATVA',
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
            'channel_ipaymu' => 'bsi',
            'method_ipaymu' => 'va',
            'channel_tripay' => 'BSIVA',
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
            'channel_ipaymu' => 'ovo',
            'method_ipaymu' => 'ewallet',
            'channel_tripay' => 'OVO',
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
            'channel_ipaymu' => 'dana',
            'method_ipaymu' => 'ewallet',
            'channel_tripay' => 'DANA',
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
            'channel_ipaymu' => 'shopeepay',
            'method_ipaymu' => 'ewallet',
            'channel_tripay' => 'SHOPEEPAY',
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
