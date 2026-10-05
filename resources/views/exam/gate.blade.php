{{-- resources/views/exam/gate.blade.php --}}
<!DOCTYPE html>
<html lang="id" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @php
        $examTenant = $assessment->tenant ?? auth()->user()?->currentTenant ?? auth()->user()?->tenants()->first();
        $examFavicon = ($examTenant && $examTenant->favicon_path) ? $examTenant->favicon_url : asset('adzkia black app.png');
    @endphp
    <title>{{ \App\Support\PageTitleResolver::resolve("Gerbang Ujian — {$assessment->title}", $examTenant, auth()->user()) }}</title>
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ $examFavicon }}">
    <link rel="apple-touch-icon" href="{{ $examFavicon }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        html, body {
            background-color: #a5d8ff !important;
            background-image: none !important;
        }
        @keyframes pulse-dot {
            0%, 100% { opacity: 1; transform: scale(1); }
            50%       { opacity: .5; transform: scale(1.3); }
        }
        .dot-pulse { animation: pulse-dot 1.8s ease-in-out infinite; }
        @keyframes fade-in-up {
            from { opacity:0; transform: translateY(12px); }
            to   { opacity:1; transform: translateY(0); }
        }
        .fade-up { animation: fade-in-up .45s ease both; }
        .fade-up-2 { animation: fade-in-up .55s .08s ease both; }
        .fade-up-3 { animation: fade-in-up .6s .15s ease both; }
    </style>
</head>
<body class="min-h-screen text-slate-800 antialiased" style="font-family: 'Open Sans', ui-sans-serif, system-ui, sans-serif; background-color: #a5d8ff !important; background-image: none !important;">

<div class="mx-auto max-w-6xl px-4 py-8 md:py-14">

    {{-- Flash Messages --}}
    @if(session('error'))
        <div class="mb-6 rounded-2xl border border-red-200 bg-red-50 px-5 py-4 text-sm text-red-700 fade-up flex items-start gap-3 shadow-xs">
            <svg class="mt-0.5 h-5 w-5 shrink-0 text-red-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <circle cx="12" cy="12" r="10"/><path d="M12 8v4m0 4h.01"/>
            </svg>
            <span>{{ session('error') }}</span>
        </div>
    @endif
    @if(session('info'))
        <div class="mb-6 rounded-2xl border border-sky-200 bg-sky-50 px-5 py-4 text-sm text-sky-800 fade-up flex items-start gap-3 shadow-xs">
            <svg class="mt-0.5 h-5 w-5 shrink-0 text-sky-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <circle cx="12" cy="12" r="10"/><path d="M12 16v-4m0-4h.01"/>
            </svg>
            <span>{{ session('info') }}</span>
        </div>
    @endif

    {{-- Header --}}
    <header class="mb-8 flex items-center justify-between fade-up">
        <div class="flex items-center gap-3">
            <div class="h-12 w-12 rounded-2xl bg-white p-1.5 shadow-md shadow-blue-500/20 ring-1 ring-blue-100 flex items-center justify-center shrink-0">
                <img src="{{ asset('images/icon-adzkia.png') }}" class="h-full w-full object-contain" alt="Icon ADZKIA">
            </div>
            <div>
                <p class="text-[11px] font-bold uppercase tracking-widest text-blue-900/70">ADZKIA CBT Platform</p>
                <h1 class="text-xl font-extrabold leading-none text-slate-900">Gerbang Ujian</h1>
            </div>
        </div>
        <div class="hidden items-center gap-2 rounded-full border border-blue-200 bg-white/90 px-3.5 py-1.5 text-xs font-semibold text-slate-700 shadow-xs md:flex">
            <span class="relative h-2.5 w-2.5 shrink-0">
                <span class="absolute inset-0 rounded-full bg-emerald-500 dot-pulse"></span>
            </span>
            Sistem Siap & Terhubung
        </div>
    </header>

    {{-- Locked State --}}
    @if($locked)
        <div class="rounded-2xl border border-amber-300 bg-white p-8 text-center shadow-md fade-up">
            <div class="mx-auto mb-4 grid h-16 w-16 place-items-center rounded-2xl bg-amber-100 text-amber-600">
                <svg class="h-8 w-8" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <rect x="3" y="11" width="18" height="11" rx="2"/>
                    <path d="M7 11V7a5 5 0 0110 0v4"/>
                </svg>
            </div>
            <h2 class="text-xl font-bold text-slate-900">Sesi Ujian Terkunci</h2>
            <p class="mt-2 text-sm text-slate-600 max-w-md mx-auto">
                Sesi ujian Anda terkunci karena: <strong class="font-semibold text-amber-700">{{ $session->lock_reason ?? 'Tidak diketahui' }}</strong>.<br>
                Silakan hubungi pengawas/guru untuk membuka kunci sesi Anda.
            </p>
            <div class="mt-6 flex items-center justify-center gap-3 text-xs text-slate-500">
                <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <circle cx="12" cy="12" r="9"/><path d="M12 7v5l3 2"/>
                </svg>
                Dimulai: {{ $session->started_at?->translatedFormat('d M Y, H:i') ?? '-' }}
            </div>
        </div>
    @else

    <div class="grid gap-6 lg:grid-cols-5">

        {{-- LEFT COLUMN: Identitas + Info Ujian + Tata Tertib --}}
        <section class="lg:col-span-3 space-y-5">

            {{-- Kartu Identitas Peserta --}}
            <div class="rounded-2xl border border-blue-200/80 bg-white p-6 shadow-sm fade-up">
                <p class="mb-3 text-[11px] font-bold uppercase tracking-wider text-slate-500">Peserta Ujian</p>
                <div class="flex items-start justify-between gap-4">
                    <div class="flex items-center gap-3.5">
                        <div class="grid h-12 w-12 shrink-0 place-items-center rounded-xl bg-blue-100 text-xl font-bold text-blue-700">
                            {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                        </div>
                        <div>
                            <h2 class="text-lg font-bold leading-tight text-slate-900">{{ auth()->user()->name }}</h2>
                            <p class="text-xs text-slate-500">{{ auth()->user()->email }}</p>
                        </div>
                    </div>
                    @if(auth()->user()->currentTenant)
                        <div class="shrink-0 rounded-xl bg-blue-50 border border-blue-100 px-3 py-2 text-right">
                            <p class="text-[10px] uppercase tracking-wider text-blue-700 font-bold">Lembaga</p>
                            <p class="text-sm font-semibold text-slate-800">{{ auth()->user()->currentTenant->name }}</p>
                        </div>
                    @endif
                </div>
            </div>

            {{-- Info Ujian --}}
            <div class="rounded-2xl border border-blue-200/80 bg-white p-6 shadow-sm fade-up-2">
                <div class="mb-4 flex items-center justify-between">
                    <p class="text-[11px] font-bold uppercase tracking-wider text-slate-500">Detail Ujian</p>
                    <span class="rounded-full bg-blue-100 px-3 py-1 text-xs font-bold uppercase text-blue-700">
                        {{ strtoupper($assessment->type) }}
                    </span>
                </div>
                <h2 class="text-2xl font-bold leading-snug text-slate-900">{{ $assessment->title }}</h2>
                @if($assessment->description)
                    <p class="mt-2 text-sm text-slate-600 leading-relaxed">{{ Str::limit(strip_tags($assessment->description), 180) }}</p>
                @endif

                <div class="mt-6 grid grid-cols-2 gap-3 md:grid-cols-4">
                    @php
                        $cells = [
                            ['Mata Pelajaran', $stats['subject_name']],
                            ['Jenjang',        $stats['grade_level']],
                            ['Jumlah Soal',    $stats['question_count'].' Soal'],
                            ['Durasi',         $stats['duration_minutes'].' Menit'],
                        ];
                    @endphp
                    @foreach($cells as [$label, $value])
                        <div class="rounded-xl bg-blue-50 border border-blue-100 px-3.5 py-2.5">
                            <p class="text-[10px] uppercase tracking-wider text-blue-700 font-bold mb-0.5">{{ $label }}</p>
                            <p class="text-sm font-semibold text-slate-800 truncate" title="{{ $value }}">{{ $value }}</p>
                        </div>
                    @endforeach
                </div>

                @if($window['from'] || $window['to'])
                    <div class="mt-4 flex items-center gap-2 rounded-xl bg-blue-50 border border-blue-200 px-3 py-2 text-xs text-blue-800">
                        <svg class="h-4 w-4 shrink-0 text-blue-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <circle cx="12" cy="12" r="9"/><path d="M12 7v5l3 2"/>
                        </svg>
                        <span>
                            Periode:
                            <strong>{{ $window['from'] ? \Carbon\Carbon::parse($window['from'])->translatedFormat('d M Y H:i') : '—' }}</strong>
                            s.d.
                            <strong>{{ $window['to'] ? \Carbon\Carbon::parse($window['to'])->translatedFormat('d M Y H:i') : '—' }}</strong>
                        </span>
                    </div>
                @endif
            </div>

            {{-- Tata Tertib --}}
            <div class="rounded-2xl border border-blue-200/80 bg-white p-6 shadow-sm fade-up-3">
                <div class="mb-4 flex items-center gap-2">
                    <svg class="h-5 w-5 text-amber-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M12 9v4m0 4h.01M10.29 3.86L1.82 18a2 2 0 001.71 3h16.94a2 2 0 001.71-3L13.71 3.86a2 2 0 00-3.42 0z"/>
                    </svg>
                    <h3 class="text-xs font-bold uppercase tracking-wider text-slate-700">Tata Tertib Pengerjaan</h3>
                </div>
                <ol class="space-y-3 text-sm text-slate-700">
                    @foreach([
                        'Ujian dikerjakan dalam <strong>mode layar penuh (fullscreen)</strong>. Keluar dari mode ini akan dicatat sebagai pelanggaran.',
                        'Berpindah tab/aplikasi lain selama ujian akan <strong>dicatat dan dilaporkan</strong> ke pengawas.',
                        'Jawaban <strong>disimpan otomatis</strong>. Jangan menutup browser sebelum menekan tombol "Kumpulkan Jawaban".',
                        '<strong>Timer berjalan di server</strong>. Waktu akan berakhir dan sesi dikumpulkan otomatis saat durasi habis.',
                        'Dilarang berkomunikasi dengan peserta lain atau pihak yang tidak berkepentingan selama ujian.',
                        'Segala bentuk kecurangan dapat menyebabkan ujian dibatalkan dan dinilai tidak sah.',
                    ] as $i => $rule)
                        <li class="flex items-start gap-3">
                            <span class="mt-0.5 grid h-6 w-6 shrink-0 place-items-center rounded-full bg-blue-100 text-xs font-bold text-blue-700">
                                {{ $i + 1 }}
                            </span>
                            <span class="leading-relaxed">{!! $rule !!}</span>
                        </li>
                    @endforeach
                </ol>
            </div>

        </section>

        {{-- RIGHT COLUMN: Ringkasan & CTA --}}
        <aside class="lg:col-span-2 space-y-5">

            {{-- Ringkasan --}}
            <div class="rounded-2xl border border-blue-200/80 bg-white p-6 shadow-sm fade-up">
                <h3 class="mb-4 text-[11px] font-bold uppercase tracking-wider text-slate-500">Ringkasan Sesi</h3>
                <div class="space-y-3">
                    @php
                        $summaryRows = [
                            ['Status', '<span class="rounded-full bg-emerald-100 px-2.5 py-0.5 text-xs font-bold text-emerald-800">Siap Dimulai</span>'],
                            ['Durasi', e($stats['duration_minutes']).' menit'],
                            ['Jumlah Soal', e($stats['question_count']).' soal'],
                        ];
                        if ($stats['passing_grade'] > 0) {
                            $summaryRows[] = ['KKM / Lulus', e($stats['passing_grade'])];
                        }
                        if ($stats['randomize_questions']) {
                            $summaryRows[] = ['Urutan Soal', 'Diacak'];
                        }
                        if ($stats['randomize_options']) {
                            $summaryRows[] = ['Urutan Opsi', 'Diacak'];
                        }
                    @endphp
                    @foreach($summaryRows as [$label, $val])
                        <div class="flex items-center justify-between text-sm py-1 border-b border-slate-100 last:border-0">
                            <span class="text-slate-500 font-medium">{{ $label }}</span>
                            <span class="font-bold text-slate-800">{!! $val !!}</span>
                        </div>
                    @endforeach
                </div>
            </div>

            {{-- Resume warning --}}
            @if($session && $session->isInProgress())
                <div class="rounded-2xl border border-amber-300 bg-amber-50 p-4 text-sm text-amber-900 shadow-sm fade-up">
                    <div class="mb-1 flex items-center gap-2 font-bold text-amber-800">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <circle cx="12" cy="12" r="9"/><path d="M12 7v5l3 2"/>
                        </svg>
                        Sesi Aktif Ditemukan
                    </div>
                    <p class="text-xs text-amber-800 leading-relaxed">
                        Anda memiliki sesi yang sedang berjalan.
                        Sisa waktu: <strong>≈ {{ $session->remainingMinutes() }} menit</strong>.
                        Melanjutkan akan memakai timer yang sudah berjalan.
                    </p>
                </div>
            @endif

            {{-- Form Mulai --}}
            <div class="rounded-2xl border border-blue-200/80 bg-white p-6 shadow-sm fade-up-2">
                <form method="POST" action="{{ route('exam.start', ['assessment' => $assessment->id]) }}"
                      id="start-form" class="space-y-4">
                    @csrf

                    {{-- Checkbox setuju --}}
                    <label for="agree"
                           class="flex cursor-pointer items-start gap-3 rounded-xl border border-slate-200 bg-slate-50/70 p-4 text-sm text-slate-700 transition hover:border-blue-400 hover:bg-blue-50/50"
                           id="agree-label">
                        <input type="checkbox" name="agree" value="1" id="agree"
                               class="mt-0.5 h-4 w-4 shrink-0 cursor-pointer rounded border-slate-300 text-blue-600 focus:ring-blue-500">
                        <span class="text-xs leading-relaxed font-medium">Saya telah membaca, memahami, dan menyetujui seluruh tata tertib pengerjaan ujian.</span>
                    </label>

                    @error('agree')
                        <p class="text-xs text-red-600 font-semibold">{{ $message }}</p>
                    @enderror

                    <button type="submit" id="start-btn"
                            class="group relative flex w-full items-center justify-center gap-2.5 rounded-xl bg-blue-600 hover:bg-blue-700 px-4 py-3.5 text-sm font-bold text-white shadow-md shadow-blue-500/20 transition active:scale-[.98] disabled:cursor-not-allowed disabled:opacity-50">
                        <svg class="h-5 w-5 transition group-hover:translate-x-0.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path d="M5 3l14 9-14 9V3z"/>
                        </svg>
                        <span>{{ ($session && $session->isInProgress()) ? 'Lanjutkan Pengerjaan Ujian' : 'Mulai Pengerjaan Ujian' }}</span>
                    </button>

                    <p class="text-center text-[11px] text-slate-500">
                        Dengan menekan tombol di atas, browser akan masuk ke mode layar penuh.
                    </p>
                </form>
            </div>

            {{-- Bantuan --}}
            <div class="rounded-2xl border border-blue-200/80 bg-white p-5 shadow-sm fade-up-3">
                <h4 class="mb-2 flex items-center gap-2 text-xs font-bold uppercase tracking-wider text-slate-700">
                    <svg class="h-4 w-4 text-blue-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <circle cx="12" cy="12" r="10"/><path d="M9.09 9a3 3 0 015.83 1c0 2-3 3-3 3m0 4h.01"/>
                    </svg>
                    Butuh Bantuan?
                </h4>
                <p class="text-xs text-slate-500 leading-relaxed">
                    Jika mengalami kendala teknis (layar tidak bisa fullscreen, timer tidak berjalan, soal tidak tampil),
                    segera angkat tangan dan lapor ke pengawas ruangan.
                </p>
            </div>

        </aside>
    </div>
    @endif
</div>

{{-- Fullscreen + Form validation script --}}
<script>
(() => {
    const form   = document.getElementById('start-form');
    const agree  = document.getElementById('agree');
    const label  = document.getElementById('agree-label');
    const btn    = document.getElementById('start-btn');

    if (!form) return;

    // Visual feedback saat checkbox dicentang
    agree?.addEventListener('change', () => {
        label?.classList.toggle('border-blue-500', agree.checked);
        label?.classList.toggle('bg-blue-50', agree.checked);
    });

    form.addEventListener('submit', async (e) => {
        if (!agree?.checked) {
            e.preventDefault();
            label?.classList.add('ring-2', 'ring-red-500');
            agree?.focus();
            setTimeout(() => label?.classList.remove('ring-2', 'ring-red-500'), 1500);
            return;
        }

        // Best-effort fullscreen (tidak memblokir submit jika gagal)
        try {
            const el = document.documentElement;
            if (el.requestFullscreen)           await el.requestFullscreen();
            else if (el.webkitRequestFullscreen) el.webkitRequestFullscreen();
            else if (el.msRequestFullscreen)     el.msRequestFullscreen();
        } catch (_) { /* ignore */ }

        if (btn) {
            btn.disabled = true;
            const span = btn.querySelector('span') || btn;
            if (span !== btn) span.textContent = 'Menyiapkan…';
            else btn.textContent = 'Menyiapkan…';
        }
    });
})();
</script>
</body>
</html>
