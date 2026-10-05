<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="antialiased">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    @php
        $guestSubdomain = request()->route('subdomain');
        $guestTenant = $guestSubdomain ? \App\Models\Tenant::where('subdomain', $guestSubdomain)->first() : (auth()->user()?->currentTenant ?? null);
        $resolvedTitle = \App\Support\PageTitleResolver::resolve($title ?? null, $guestTenant, auth()->user());
        $faviconUrl = ($guestTenant && $guestTenant->favicon_path) ? $guestTenant->favicon_url : asset('adzkia black app.png');
    @endphp
    <title>{{ $resolvedTitle }}</title>
    
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ $faviconUrl }}">
    <link rel="apple-touch-icon" href="{{ $faviconUrl }}">
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=outfit:400,500,600,700,800|open-sans:400,500,600,700" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    @endif
    
    <style>
        body { font-family: 'Open Sans', sans-serif; }
        .font-display { font-family: 'Outfit', sans-serif; }
        .hide-scrollbar::-webkit-scrollbar { display: none; }
        .hide-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
    </style>
</head>
<body class="h-screen w-screen overflow-hidden bg-gray-2 text-gray-12 flex justify-center">
    <main class="w-full h-full lg:h-screen lg:w-[100vh] bg-white flex flex-col relative lg:shadow-[0_12px_40px_rgba(0,0,0,0.06)] lg:border-x border-gray-6">
        {{ $slot }}
    </main>
</body>
</html>
