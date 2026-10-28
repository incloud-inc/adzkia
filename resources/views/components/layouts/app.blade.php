@props([
    'title' => null,
    'sidebarOpen' => null,
])
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @php
        $authUser = auth()->user();
        $isOwner = $authUser?->isSuperUser();
        // Jika user adalah Owner dan berada di mode platform (tanpa memilih tenant), jangan pernah fallback ke tenant pertama
        $currentTenant = app()->has('currentTenant') 
            ? app('currentTenant') 
            : ($authUser ? ($authUser->currentTenant ?? ($isOwner ? null : $authUser->tenants()->first())) : null);
        
        $resolvedTitle = \App\Support\PageTitleResolver::resolve($title ?? null, $currentTenant, $authUser);

        // Owner di platform mode (dan halaman tanpa tenant spesifik) SELALU menggunakan favicon resmi ADZKIA
        $isPlatformMode = ($isOwner && ! $authUser?->current_tenant_id && ! app()->has('currentTenant'));
        $faviconUrl = (! $isPlatformMode && $currentTenant && $currentTenant->favicon_path) 
            ? $currentTenant->favicon_url 
            : asset('adzkia black app.png');
    @endphp
    <title>{{ $resolvedTitle }}</title>
    <link rel="icon" type="image/png" href="{{ $faviconUrl }}">
    <link rel="apple-touch-icon" href="{{ $faviconUrl }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@600;700;800;900&family=Open+Sans:ital,wght@0,400;0,500;0,600;0,700;1,400&family=Outfit:wght@500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/marked/marked.min.js"></script>

    <!-- KaTeX for Math & LaTeX Support ($$...$$) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/KaTeX/0.16.9/katex.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/KaTeX/0.16.9/katex.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/KaTeX/0.16.9/contrib/auto-render.min.js"></script>
    <style>
        [x-cloak] { display: none !important; }
        /* Pastikan scrolling mulus dan responsif di HP (iOS & Android) */
        main {
            -webkit-overflow-scrolling: touch;
            overscroll-behavior-y: contain;
        }
    </style>
    <script>
        window.triggerKaTeX = function(el) {
            const target = el || document.body;
            if (window.renderMathInElement) {
                try {
                    window.renderMathInElement(target, {
                        delimiters: [
                            {left: '$$', right: '$$', display: true},
                            {left: '$', right: '$', display: false},
                            {left: '\\(', right: '\\)', display: false},
                            {left: '\\[', right: '\\]', display: true}
                        ],
                        ignoredTags: ["script", "noscript", "style", "textarea", "pre", "code", "input"],
                        throwOnError: false
                    });
                } catch(e) {
                    console.warn("KaTeX render error:", e);
                }
            }
        };

        document.addEventListener("DOMContentLoaded", function() {
            setTimeout(function() {
                if (window.triggerKaTeX) {
                    window.triggerKaTeX();
                }
            }, 100);
        });
    </script>
</head>
<body class="font-sans antialiased bg-gray-2 text-gray-12" 
      :class="{ 'overflow-hidden': sidebarOpen && isMobile, 'overflow-y-auto lg:overflow-hidden': !sidebarOpen || !isMobile }"
      x-data="{ 
          sidebarOpen: {{ isset($sidebarOpen) && $sidebarOpen !== null ? ($sidebarOpen ? 'true' : 'false') : 'window.innerWidth >= 1024' }}, 
          isMobile: window.innerWidth < 1024 
      }" 
      @resize.window="isMobile = window.innerWidth < 1024; if (isMobile && sidebarOpen) sidebarOpen = false;">
    <div class="h-screen h-[100dvh] min-h-[100dvh] flex overflow-hidden w-full relative">
        <!-- Backdrop Overlay untuk Mobile View saat Sidebar Terbuka -->
        <div x-show="sidebarOpen && isMobile" 
             @click="sidebarOpen = false" 
             x-transition:enter="transition-opacity ease-linear duration-200"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition-opacity ease-linear duration-200"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             class="fixed inset-0 bg-black/40 backdrop-blur-xs z-30 lg:hidden pointer-events-auto" 
             x-cloak>
        </div>

        <!-- Sidebar -->
        <x-sidebar />

        <!-- Main Content -->
        <div class="flex-1 flex flex-col min-w-0 min-h-0 h-full overflow-hidden">
            <!-- Header -->
            <x-header />

            <!-- Page Content (Workspace) -->
            <main class="flex-1 min-h-0 overflow-y-auto p-4 sm:p-6 overscroll-y-contain [webkit-overflow-scrolling:touch]">
                {{ $slot }}
            </main>
        </div>
    </div>
</body>
</html>
