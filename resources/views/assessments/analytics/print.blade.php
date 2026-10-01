<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cetak Rekap Nilai — {{ $assessment->title }}</title>
    <link rel="icon" type="image/png" href="{{ asset('images/icon-adzkia.png') }}">
    <style>
        @page {
            size: A4 portrait;
            margin: 15mm 15mm 20mm 15mm;
        }
        body {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 11pt;
            color: #111;
            margin: 0;
            padding: 0;
            background: #fff;
        }
        .header {
            text-align: center;
            border-bottom: 2px solid #000;
            padding-bottom: 8px;
            margin-bottom: 16px;
        }
        .header h1 {
            font-size: 14pt;
            margin: 0 0 4px 0;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        .header h2 {
            font-size: 12pt;
            font-weight: normal;
            margin: 0;
        }
        .meta-grid {
            display: table;
            width: 100%;
            margin-bottom: 16px;
            font-size: 10pt;
        }
        .meta-row {
            display: table-row;
        }
        .meta-label {
            display: table-cell;
            width: 22%;
            font-weight: bold;
            padding: 2px 0;
        }
        .meta-val {
            display: table-cell;
            width: 28%;
            padding: 2px 0;
        }
        .stats-box {
            border: 1px solid #ccc;
            background: #fbfbfb;
            padding: 8px 12px;
            margin-bottom: 16px;
            font-size: 9.5pt;
            border-radius: 4px;
        }
        .stats-box table {
            width: 100%;
            border-collapse: collapse;
        }
        .stats-box td {
            padding: 2px 4px;
        }
        table.data-table {
            width: 100%;
            border-collapse: collapse;
            font-size: 9.5pt;
            margin-bottom: 24px;
        }
        table.data-table th, table.data-table td {
            border: 1px solid #333;
            padding: 5px 6px;
        }
        table.data-table th {
            background-color: #f0f0f0;
            text-align: left;
            font-weight: bold;
            text-transform: uppercase;
            font-size: 8.5pt;
        }
        .text-center { text-align: center !important; }
        .text-right { text-align: right !important; }
        .font-bold { font-weight: bold; }
        .badge-lulus { color: #065f46; font-weight: bold; }
        .badge-remedial { color: #991b1b; font-weight: bold; }
        .signature-section {
            margin-top: 30px;
            display: table;
            width: 100%;
            page-break-inside: avoid;
        }
        .sig-col {
            display: table-cell;
            width: 50%;
            text-align: center;
            font-size: 10pt;
        }
        .sig-space {
            height: 60px;
        }
        .print-btn {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background: #2563eb;
            color: #fff;
            padding: 10px 18px;
            border-radius: 8px;
            border: none;
            font-size: 13px;
            font-weight: bold;
            cursor: pointer;
            box-shadow: 0 4px 10px rgba(0,0,0,0.15);
        }
        @media print {
            .no-print { display: none !important; }
            body { font-size: 10pt; }
        }
    </style>
</head>
<body>

    <button onclick="window.print()" class="print-btn no-print">🖨️ Cetak Dokumen</button>

    <div class="header">
        <h1>REKAPITULASI RESMI PENILAIAN HASIL BELAJAR (CBT)</h1>
        <h2>{{ $assessment->tenant?->name ?? 'PLATFORM PENDIDIKAN CBT ADZKIA' }}</h2>
    </div>

    <div class="meta-grid">
        <div class="meta-row">
            <div class="meta-label">Judul Asesmen:</div>
            <div class="meta-val">{{ $assessment->title }}</div>
            <div class="meta-label">Tanggal Ujian:</div>
            <div class="meta-val">{{ now()->translatedFormat('d F Y') }}</div>
        </div>
        <div class="meta-row">
            <div class="meta-label">Mata Pelajaran:</div>
            <div class="meta-val">{{ $assessment->subject?->name ?? 'Umum' }}</div>
            <div class="meta-label">Kriteria Ketuntasan (KKM):</div>
            <div class="meta-val">{{ $kkmEnabled ? $kkm : 'Tidak Diberlakukan' }}</div>
        </div>
        <div class="meta-row">
            <div class="meta-label">Tingkat / Kelas:</div>
            <div class="meta-val">Kelas {{ $assessment->grade_level ?? '-' }}</div>
            <div class="meta-label">Total Butir Soal:</div>
            <div class="meta-val">{{ $analysis['total_questions'] }} Soal</div>
        </div>
    </div>

    <!-- Ringkasan Statistik -->
    <div class="stats-box">
        <table>
            <tr>
                <td><strong>Total Peserta:</strong> {{ $sessions->count() }} orang</td>
                <td><strong>Nilai Rata-rata:</strong> {{ round($sessions->where('status', 'completed')->avg('score') ?? 0, 1) }}</td>
                <td><strong>Nilai Tertinggi:</strong> {{ $sessions->where('status', 'completed')->max('score') ?? 0 }}</td>
                <td><strong>Nilai Terendah:</strong> {{ $sessions->where('status', 'completed')->min('score') ?? 0 }}</td>
            </tr>
            <tr>
                <td><strong>Indeks Kesukaran (p):</strong> {{ $analysis['avg_difficulty'] }}</td>
                <td><strong>Daya Pembeda (D):</strong> {{ $analysis['avg_discrimination'] }}</td>
                <td><strong>Reliabilitas (KR-20):</strong> {{ $analysis['reliability_kr20'] ?? '-' }}</td>
                <td><strong>Ketuntasan KKM:</strong> {{ $sessions->where('status', 'completed')->count() > 0 ? round(($sessions->where('status', 'completed')->filter(fn($s) => ((float)$s->score / ($s->max_score ?: 100) * 100) >= $kkm)->count() / $sessions->where('status', 'completed')->count()) * 100, 1) : 0 }}%</td>
            </tr>
        </table>
    </div>

    <!-- Tabel Daftar Nilai -->
    <table class="data-table">
        <thead>
            <tr>
                <th class="text-center" style="width: 5%;">No</th>
                <th style="width: 32%;">Nama Siswa / Peserta</th>
                <th style="width: 22%;">Email / NISN</th>
                <th class="text-center" style="width: 12%;">Waktu Selesai</th>
                <th class="text-center" style="width: 9%;">Durasi</th>
                <th class="text-right" style="width: 10%;">Nilai (100)</th>
                <th class="text-center" style="width: 10%;">Ket. KKM</th>
            </tr>
        </thead>
        <tbody>
            @forelse($sessions as $index => $session)
                @php
                    $max = (float) ($session->max_score > 0 ? $session->max_score : 100);
                    $pct = round(((float) $session->score / $max) * 100, 1);
                    $isPassed = $kkmEnabled ? ($pct >= $kkm) : true;
                    $duration = ($session->started_at && $session->completed_at)
                        ? round($session->completed_at->diffInMinutes($session->started_at)) . ' m'
                        : '-';
                @endphp
                <tr>
                    <td class="text-center">{{ $index + 1 }}</td>
                    <td class="font-bold">{{ $session->user?->name ?? 'Anonim' }}</td>
                    <td>{{ $session->user?->email ?? '-' }}</td>
                    <td class="text-center">{{ $session->completed_at ? $session->completed_at->format('d/m/Y H:i') : '-' }}</td>
                    <td class="text-center">{{ $duration }}</td>
                    <td class="text-right font-bold">{{ $session->status === 'completed' ? $pct : '-' }}</td>
                    <td class="text-center">
                        @if($session->status === 'completed')
                            @if($isPassed)
                                <span class="badge-lulus">LULUS</span>
                            @else
                                <span class="badge-remedial">REMIDIAL</span>
                            @endif
                        @else
                            <em>{{ strtoupper($session->status) }}</em>
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center">Tidak ada data peserta ujian.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <!-- Tanda Tangan Pengesahan -->
    <div class="signature-section">
        <div class="sig-col">
            <p>Mengetahui,<br>Kepala Sekolah / Penanggung Jawab</p>
            <div class="sig-space"></div>
            <p class="font-bold">( .................................................... )<br><span style="font-size: 8pt; font-weight: normal;">NIP. .................................................</span></p>
        </div>
        <div class="sig-col">
            <p>{{ now()->translatedFormat('l, d F Y') }}<br>Guru Mata Pelajaran / Penguji</p>
            <div class="sig-space"></div>
            <p class="font-bold">( {{ auth()->user()->name ?? 'Dewan Guru' }} )<br><span style="font-size: 8pt; font-weight: normal;">NIP. .................................................</span></p>
        </div>
    </div>

</body>
</html>
