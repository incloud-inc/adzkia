<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @props(['title' => null, 'hideBottomNav' => false])
    @php
        $authUser = auth()->user();
        $currentTenant = app()->has('currentTenant') ? app('currentTenant') : ($authUser ? $authUser->currentTenant : null);
        $resolvedTitle = \App\Support\PageTitleResolver::resolve($title ?? null, $currentTenant, $authUser);
        $faviconUrl = ($currentTenant && $currentTenant->favicon_path) ? $currentTenant->favicon_url : asset('adzkia black app.png');
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
    
    <!-- KaTeX -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/KaTeX/0.16.9/katex.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/KaTeX/0.16.9/katex.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/KaTeX/0.16.9/contrib/auto-render.min.js"></script>
    
    <style>
        [x-cloak] { display: none !important; }
        /* Hide scrollbar for mobile feel */
        .no-scrollbar::-webkit-scrollbar { display: none; }
        .no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
    </style>
    <script>
        function appStoreList(items) {
            return {
                items: Array.isArray(items) ? items : [],
                searchQuery: '',

                get filteredItems() {
                    const q = this.searchQuery.trim().toLowerCase();
                    if (q.length >= 5) {
                        return this.items.filter(item => {
                            const title = (item.title || '').toLowerCase();
                            const subject = (item.subject || '').toLowerCase();
                            return title.includes(q) || subject.includes(q);
                        });
                    }
                    return this.items.slice(0, 5);
                }
            };
        }

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
                if (window.triggerKaTeX) window.triggerKaTeX();
            }, 100);
        });
    </script>
</head>
<body class="font-sans antialiased bg-gray-2 text-gray-12 min-h-screen selection:bg-emerald-500 selection:text-white" x-data="{ activeTab: '{{ addslashes(session('active_tab', request('tab', 'home'))) }}' }">
    <!-- Main Content Container: matching tenant public profile width (max-w-xl) -->
    <div class="w-full max-w-xl mx-auto min-h-screen flex flex-col relative bg-gray-2">
        
        <!-- Page Content: Clearance dikurangi 3/4 agar pas dan tidak ada ruang kosong berlebihan -->
        <main class="flex-1 pb-24 sm:pb-28 relative" style="padding-bottom: 5.5rem !important;">
            {{ $slot }}
        </main>

        <!-- Bottom Navigation Bar (Hanya muncul jika murid sudah login; riwayat ujian rahasia pribadi murid) -->
        @if(!isset($hideBottomNav) || !$hideBottomNav)
        @auth
        <div class="fixed bottom-6 inset-x-0 z-50 flex justify-center px-4 pointer-events-none">
            <div class="w-full max-w-xl flex justify-center pointer-events-none px-2 sm:px-4">
                <div class="bg-neutral-950/95 backdrop-blur-xl rounded-full p-2 flex items-center justify-between w-full shadow-[0_20px_50px_rgba(0,0,0,0.6)] border border-neutral-800/80 pointer-events-auto"
                     style="background-color: #09090b !important; border: 1px solid rgba(255, 255, 255, 0.12) !important; box-shadow: 0 20px 45px -10px rgba(0, 0, 0, 0.75) !important;">
                    <!-- Home -->
                    <button type="button" @click="activeTab = 'home'" class="flex items-center justify-center gap-2 px-3.5 py-2.5 rounded-full transition-all duration-300" :class="activeTab === 'home' ? 'bg-emerald-500 text-white shadow-lg shadow-emerald-500/25 ring-1 ring-emerald-400/40 font-bold' : 'text-neutral-400 hover:text-white hover:bg-white/10'">
                        <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                        <span x-show="activeTab === 'home'" x-transition.opacity.duration.200ms class="text-sm font-semibold tracking-wide whitespace-nowrap">Home</span>
                    </button>
                    
                    <!-- Assessment (Berbayar) -->
                    <button type="button" @click="activeTab = 'assessment'" class="flex items-center justify-center gap-2 px-3.5 py-2.5 rounded-full transition-all duration-300" :class="activeTab === 'assessment' ? 'bg-emerald-500 text-white shadow-lg shadow-emerald-500/25 ring-1 ring-emerald-400/40 font-bold' : 'text-neutral-400 hover:text-white hover:bg-white/10'">
                        <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                        <span x-show="activeTab === 'assessment'" x-transition.opacity.duration.200ms class="text-sm font-semibold tracking-wide whitespace-nowrap">Asesmen</span>
                    </button>

                    <!-- History -->
                    <button type="button" @click="activeTab = 'history'" class="flex items-center justify-center gap-2 px-3.5 py-2.5 rounded-full transition-all duration-300" :class="activeTab === 'history' ? 'bg-emerald-500 text-white shadow-lg shadow-emerald-500/25 ring-1 ring-emerald-400/40 font-bold' : 'text-neutral-400 hover:text-white hover:bg-white/10'">
                        <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"/></svg>
                        <span x-show="activeTab === 'history'" x-transition.opacity.duration.200ms class="text-sm font-semibold tracking-wide whitespace-nowrap">Riwayat</span>
                    </button>

                    <!-- Profile -->
                    <button type="button" @click="activeTab = 'profile'" class="flex items-center justify-center gap-2 px-3.5 py-2.5 rounded-full transition-all duration-300" :class="activeTab === 'profile' ? 'bg-emerald-500 text-white shadow-lg shadow-emerald-500/25 ring-1 ring-emerald-400/40 font-bold' : 'text-neutral-400 hover:text-white hover:bg-white/10'">
                        <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                        <span x-show="activeTab === 'profile'" x-transition.opacity.duration.200ms class="text-sm font-semibold tracking-wide whitespace-nowrap">Profil</span>
                    </button>
                </div>
            </div>
        </div>
        @endauth
        @endif
    </div>
</body>
</html>
