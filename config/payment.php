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
            'label' => 'QRIS (Gopay, OVO, Dana, ShopeePay, LinkAja)',
            'group' => 'qris',
            'icon' => 'qrcode',
            'fee' => 1000,
        ],
        'VA_BCA' => [
            'code' => 'VA_BCA',
            'channel' => 'BC', // Duitku
            'channel_tripay' => 'BCAVA', // Tripay
            'label' => 'BCA Virtual Account',
            'group' => 'va',
            'icon' => 'credit-card',
            'fee' => 3000,
        ],
        'VA_MANDIRI' => [
            'code' => 'VA_MANDIRI',
            'channel' => 'M2', // Duitku
            'channel_tripay' => 'MANDIRIVA', // Tripay
            'label' => 'Mandiri Virtual Account',
            'group' => 'va',
            'icon' => 'credit-card',
            'fee' => 3000,
        ],
        'VA_BRI' => [
            'code' => 'VA_BRI',
            'channel' => 'BR', // Duitku
            'channel_tripay' => 'BRIVA', // Tripay
            'label' => 'BRI Virtual Account',
            'group' => 'va',
            'icon' => 'credit-card',
            'fee' => 3000,
        ],
        'VA_BNI' => [
            'code' => 'VA_BNI',
            'channel' => 'I1', // Duitku
            'channel_tripay' => 'BNIVA', // Tripay
            'label' => 'BNI Virtual Account',
            'group' => 'va',
            'icon' => 'credit-card',
            'fee' => 3000,
        ],
        'SHOPEEPAY' => [
            'code' => 'SHOPEEPAY',
            'channel' => 'SP', // Duitku
            'channel_tripay' => 'SHOPEEPAY', // Tripay
            'label' => 'ShopeePay App Direct',
            'group' => 'ewallet',
            'icon' => 'mobile',
            'fee' => 1500,
        ],
    ],
];
