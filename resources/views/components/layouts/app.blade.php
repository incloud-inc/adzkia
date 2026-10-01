<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ isset($title) ? $title . ' | ' . config('app.name', 'ADZKIA') : config('app.name', 'ADZKIA') }}</title>
    
    @php
        $currentTenant = auth()->check() ? auth()->user()->currentTenant : null;
    @endphp
    <link rel="icon" type="image/png" href="{{ $currentTenant && $currentTenant->favicon_url ? $currentTenant->favicon_url : asset('images/icon-adzkia.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('images/icon-adzkia.png') }}">

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
<body class="font-sans antialiased bg-gray-2 text-gray-12 overflow-hidden" x-data="{ sidebarOpen: true }">
    <div class="h-screen flex overflow-hidden w-full">
        <!-- Sidebar -->
        <x-sidebar />

        <!-- Main Content -->
        <div class="flex-1 flex flex-col min-w-0 overflow-hidden">
            <!-- Header -->
            <x-header />

            <!-- Page Content (Workspace) -->
            <main class="flex-1 overflow-y-auto p-6">
                {{ $slot }}
            </main>
        </div>
    </div>
</body>
</html>
