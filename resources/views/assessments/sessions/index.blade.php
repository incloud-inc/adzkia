<x-layouts.app>
    <x-slot:title>Monitoring & Riwayat Sesi Asesmen - ADZKIA</x-slot:title>

    <div class="space-y-6 pb-16">
        <!-- Header -->
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
            <div>
                <div class="flex items-center gap-2">
                    <span class="text-xs font-bold uppercase tracking-wider px-2 py-0.5 rounded-md bg-green-3 text-green-11 border border-green-6/50">
                        CBT Monitoring
                    </span>
                    <span class="text-xs font-semibold text-gray-11">Pusat Data Pengerjaan Ujian</span>
                </div>
                <h1 class="font-display font-extrabold text-2xl sm:text-3xl text-gray-12 tracking-tight mt-1">
                    Monitoring &amp; Riwayat Sesi Asesmen
                </h1>
                <p class="text-xs text-gray-11 mt-0.5">
                    Pantau seluruh aktivitas pengerjaan ujian siswa secara terpusat, pantau kendala koneksi perangkat, dan evaluasi hasil nilai secara transparan.
                </p>
            </div>

            <div class="flex items-center gap-2.5">
                <a href="{{ route('assessments.index') }}"
                   class="inline-flex items-center gap-1.5 px-4 py-2.5 rounded-xl border border-gray-6 bg-white hover:bg-gray-3 text-gray-12 text-xs font-semibold transition-all shadow-xs cursor-pointer">
                    <x-radix-icon name="file-text" class="w-4 h-4" />
                    <span>Daftar Asesmen</span>
                </a>
            </div>
        </div>

        @if(session('success'))
            <div class="p-4 rounded-xl bg-green-3 border border-green-6/50 text-green-11 text-xs font-semibold flex items-center justify-between">
                <span>{{ session('success') }}</span>
            </div>
        @endif

        @if(session('error'))
            <div class="p-4 rounded-xl bg-red-3 border border-red-6/50 text-red-11 text-xs font-semibold flex items-center justify-between">
                <span>{{ session('error') }}</span>
            </div>
        @endif

        <!-- 4 Summary Metric Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
            <!-- 1. Total Sesi -->
            <div class="bg-white p-5 rounded-2xl border border-gray-6 shadow-xs flex flex-col justify-between">
                <div class="flex items-center justify-between mb-3">
                    <span class="text-xs font-bold text-gray-11 uppercase tracking-wider">Total Sesi Ujian</span>
                    <div class="w-9 h-9 rounded-xl bg-gray-3 text-gray-12 flex items-center justify-center">
                        <x-radix-icon name="layers" class="w-4 h-4" />
                    </div>
                </div>
                <div>
                    <h3 class="font-display font-black text-2xl text-gray-12 tracking-tight">{{ number_format($totalSessions) }}</h3>
                    <p class="text-[11px] text-gray-10 mt-1">Seluruh percobaan ujian siswa</p>
                </div>
            </div>

            <!-- 2. Sedang Berlangsung (Active) -->
            <div class="bg-white p-5 rounded-2xl border border-blue-6/60 bg-blue-2/20 shadow-xs flex flex-col justify-between">
                <div class="flex items-center justify-between mb-3">
                    <span class="text-xs font-bold text-blue-11 uppercase tracking-wider flex items-center gap-1.5">
                        <span class="w-2 h-2 rounded-full bg-blue-600 animate-pulse"></span>
                        <span>Sedang Ujian (Live)</span>
                    </span>
                    <div class="w-9 h-9 rounded-xl bg-blue-3 text-blue-11 flex items-center justify-center">
                        <x-radix-icon name="activity-log" class="w-4 h-4" />
                    </div>
                </div>
                <div>
                    <h3 class="font-display font-black text-2xl text-blue-11 tracking-tight">{{ number_format($inProgressCount) }}</h3>
                    <p class="text-[11px] text-blue-9 mt-1">Siswa aktif di ruang pengerjaan</p>
                </div>
            </div>

            <!-- 3. Terkunci / Putus Jaringan -->
            <div class="bg-white p-5 rounded-2xl border {{ $lockedCount > 0 ? 'border-rose-6 bg-rose-2/25' : 'border-gray-6' }} shadow-xs flex flex-col justify-between">
                <div class="flex items-center justify-between mb-3">
                    <span class="text-xs font-bold {{ $lockedCount > 0 ? 'text-rose-11' : 'text-gray-11' }} uppercase tracking-wider">
                        Sesi Terkunci
                    </span>
                    <div class="w-9 h-9 rounded-xl {{ $lockedCount > 0 ? 'bg-rose-3 text-rose-11' : 'bg-gray-3 text-gray-11' }} flex items-center justify-center">
                        <x-radix-icon name="lock-closed" class="w-4 h-4" />
                    </div>
                </div>
                <div>
                    <h3 class="font-display font-black text-2xl {{ $lockedCount > 0 ? 'text-rose-11' : 'text-gray-12' }} tracking-tight">{{ number_format($lockedCount) }}</h3>
                    <p class="text-[11px] {{ $lockedCount > 0 ? 'text-rose-10 font-semibold' : 'text-gray-10' }} mt-1">
                        {{ $lockedCount > 0 ? 'Memerlukan izin buka kunci pengawas' : 'Tidak ada sesi yang terkunci' }}
                    </p>
                </div>
            </div>

            <!-- 4. Ujian Selesai -->
            <div class="bg-white p-5 rounded-2xl border border-green-6/60 bg-green-2/20 shadow-xs flex flex-col justify-between">
                <div class="flex items-center justify-between mb-3">
                    <span class="text-xs font-bold text-green-11 uppercase tracking-wider">Telah Selesai</span>
                    <div class="w-9 h-9 rounded-xl bg-green-3 text-green-11 flex items-center justify-center">
                        <x-radix-icon name="check-circled" class="w-4 h-4" />
                    </div>
                </div>
                <div>
                    <h3 class="font-display font-black text-2xl text-green-11 tracking-tight">{{ number_format($completedCount) }}</h3>
                    <p class="text-[11px] text-green-9 mt-1">Ujian selesai dikerjakan &amp; tersimpan</p>
                </div>
            </div>
        </div>

        <!-- Filter Form -->
        <div class="bg-white p-5 rounded-2xl border border-gray-6 shadow-xs">
            <form method="GET" action="{{ route('assessment-sessions.index') }}" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-6 gap-3.5 items-end">
                <!-- Search Input -->
                <div class="lg:col-span-2">
                    <label class="block text-xs font-semibold text-gray-11 mb-1">Cari Siswa / Asesmen</label>
                    <div class="relative">
                        <input type="text" name="search" value="{{ request('search') }}"
                               placeholder="Nama siswa, email, atau judul ujian..."
                               class="w-full text-xs rounded-xl border border-gray-7 pl-8 pr-3 py-2 outline-none focus:border-green-8">
                        <x-radix-icon name="magnifying-glass" class="w-3.5 h-3.5 text-gray-8 absolute left-2.5 top-1/2 -translate-y-1/2 pointer-events-none" />
                    </div>
                </div>

                <!-- Status Filter -->
                <div>
                    <label class="block text-xs font-semibold text-gray-11 mb-1">Status Sesi</label>
                    <select name="status" class="w-full text-xs rounded-xl border border-gray-7 px-3 py-2 outline-none focus:border-green-8 cursor-pointer">
                        <option value="all">Semua Status</option>
                        <option value="in_progress" {{ request('status') === 'in_progress' ? 'selected' : '' }}>Sedang Dikerjakan</option>
                        <option value="interrupted_locked" {{ request('status') === 'interrupted_locked' ? 'selected' : '' }}>Terkunci (Interrupted)</option>
                        <option value="completed" {{ request('status') === 'completed' ? 'selected' : '' }}>Telah Selesai</option>
                        <option value="pending_grading" {{ request('status') === 'pending_grading' ? 'selected' : '' }}>Perlu Koreksi Manual</option>
                    </select>
                </div>

                <!-- Assessment Filter (AJAX Combobox) -->
                <div>
                    <x-searchable-combobox
                        name="assessment_id"
                        :value="request('assessment_id')"
                        label="Asesmen / Ujian"
                        :selected-title="$selectedAssessment?->title"
                        all-label="Semua Asesmen"
                        placeholder="Ketik judul asesmen..."
                        :endpoint="route('assessment-sessions.search-assessments')"
                        :extra-params="['tenant_id' => request('tenant_id')]"
                    />
                </div>

                @if($isSuperUser)
                    <!-- Tenant Filter (Owner Only - AJAX Combobox) -->
                    <div>
                        <x-searchable-combobox
                            name="tenant_id"
                            :value="request('tenant_id')"
                            label="Institusi / Tenant"
                            :selected-title="$selectedTenant?->name"
                            all-label="Semua Tenant"
                            placeholder="Ketik nama tenant..."
                            :endpoint="route('assessment-sessions.search-tenants')"
                        />
                    </div>
                @else
                    <!-- Date Filter Start -->
                    <div>
                        <label class="block text-xs font-semibold text-gray-11 mb-1">Mulai Tanggal</label>
                        <input type="date" name="start_date" value="{{ request('start_date') }}"
                               class="w-full text-xs rounded-xl border border-gray-7 px-3 py-2 outline-none focus:border-green-8">
                    </div>
                @endif

                <!-- Action Buttons -->
                <div class="flex items-center gap-2">
                    <button type="submit"
                            class="flex-1 py-2 px-3 rounded-xl bg-green-9 hover:bg-green-10 active:bg-green-11 text-white text-xs font-semibold transition-all shadow-xs cursor-pointer text-center">
                        Terapkan
                    </button>
                    @if(request()->hasAny(['search', 'status', 'assessment_id', 'tenant_id', 'start_date', 'end_date']))
                        <a href="{{ route('assessment-sessions.index') }}"
                           class="py-2 px-3 rounded-xl border border-gray-6 bg-white hover:bg-gray-3 text-gray-11 text-xs font-semibold transition-all shadow-xs text-center cursor-pointer">
                            Reset
                        </a>
                    @endif
                </div>
            </form>
        </div>

        <!-- Table Card -->
        <div class="bg-white rounded-2xl border border-gray-6 shadow-xs overflow-hidden">
            <div class="p-4 border-b border-gray-5 flex items-center justify-between">
                <h3 class="font-display font-bold text-sm text-gray-12">Daftar Sesi Ujian Siswa</h3>
                <span class="text-xs text-gray-11">Total {{ $sessions->total() }} sesi ditemukan</span>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left text-xs border-collapse">
                    <thead class="bg-gray-2/60 text-gray-11 uppercase tracking-wider font-semibold border-b border-gray-5">
                        <tr>
                            <th class="py-3 px-4">Nama Siswa</th>
                            <th class="py-3 px-4">Asesmen / Ujian</th>
                            <th class="py-3 px-4 text-center">Status</th>
                            <th class="py-3 px-4 text-center">Skor / Nilai</th>
                            <th class="py-3 px-4">Waktu Mulai</th>
                            <th class="py-3 px-4 text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-5">
                        @forelse($sessions as $session)
                            <tr class="hover:bg-gray-2/40 transition-colors">
                                <!-- Siswa -->
                                <td class="py-3 px-4">
                                    <div class="flex items-center gap-3">
                                        <div class="w-8 h-8 rounded-full bg-emerald-100 text-emerald-800 flex items-center justify-center font-bold text-xs shrink-0 overflow-hidden">
                                            @if($session->user?->profile_photo_url)
                                                <img src="{{ $session->user->profile_photo_url }}" alt="{{ $session->user->name }}" class="w-full h-full object-cover">
                                            @else
                                                {{ strtoupper(substr($session->user->name ?? 'U', 0, 1)) }}
                                            @endif
                                        </div>
                                        <div>
                                            <div class="font-semibold text-gray-12 text-xs">
                                                {{ $session->user->name ?? 'Peserta Tidak Dikenal' }}
                                            </div>
                                            <div class="text-[11px] text-gray-10 font-mono">
                                                {{ $session->user->email ?? $session->user->username ?? '-' }}
                                            </div>
                                            @if($isSuperUser && $session->tenant)
                                                <span class="inline-flex items-center px-1.5 py-0.2 rounded text-[10px] font-medium bg-gray-3 text-gray-11 mt-0.5">
                                                    {{ $session->tenant->name }}
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </td>

                                <!-- Asesmen -->
                                <td class="py-3 px-4 max-w-xs">
                                    <div class="font-medium text-gray-12 truncate" title="{{ $session->assessment->title ?? '-' }}">
                                        {{ $session->assessment->title ?? '-' }}
                                    </div>
                                    <div class="text-[11px] text-gray-10 flex items-center gap-1.5 mt-0.5">
                                        @if($session->assessment?->subject)
                                            <span class="text-blue-11 font-semibold">{{ $session->assessment->subject->name }}</span>
                                            <span>•</span>
                                        @endif
                                        <span>{{ $session->question_count ?? ($session->assessment->questions_count ?? 0) }} Soal</span>
                                    </div>
                                </td>

                                <!-- Status Sesi -->
                                <td class="py-3 px-4 text-center whitespace-nowrap">
                                    @if($session->status === 'completed')
                                        <span class="px-2.5 py-1 rounded-full text-[11px] font-bold bg-green-3 text-green-11 border border-green-6/50 inline-flex items-center gap-1">
                                            <x-radix-icon name="check-circled" class="w-3.5 h-3.5" />
                                            <span>Selesai</span>
                                        </span>
                                    @elseif($session->status === 'in_progress')
                                        <span class="px-2.5 py-1 rounded-full text-[11px] font-bold bg-blue-3 text-blue-11 border border-blue-6/50 inline-flex items-center gap-1">
                                            <span class="w-2 h-2 rounded-full bg-blue-600 animate-pulse"></span>
                                            <span>Sedang Ujian</span>
                                        </span>
                                    @elseif($session->status === 'interrupted_locked')
                                        <span class="px-2.5 py-1 rounded-full text-[11px] font-bold bg-rose-3 text-rose-11 border border-rose-6/50 inline-flex items-center gap-1"
                                              title="{{ $session->lock_reason ?: 'Koneksi terputus' }}">
                                            <x-radix-icon name="lock-closed" class="w-3.5 h-3.5" />
                                            <span>Terkunci</span>
                                        </span>
                                    @else
                                        <span class="px-2.5 py-1 rounded-full text-[11px] font-semibold bg-gray-3 text-gray-11 border border-gray-6 inline-flex items-center gap-1">
                                            <span>{{ ucfirst(str_replace('_', ' ', $session->status)) }}</span>
                                        </span>
                                    @endif

                                    @if($session->grading_status === 'pending_manual')
                                        <span class="block text-[10px] text-amber-10 font-bold mt-1">
                                            (Perlu Koreksi Esai)
                                        </span>
                                    @endif
                                </td>

                                <!-- Skor -->
                                <td class="py-3 px-4 text-center whitespace-nowrap font-mono">
                                    @if($session->status === 'completed' && $session->score !== null)
                                        <div class="font-bold text-xs text-gray-12">
                                            {{ number_format((float) $session->score, 1) }}
                                            <span class="text-gray-9 text-[10px] font-normal">/ {{ number_format((float) ($session->max_score ?: 100), 0) }}</span>
                                        </div>
                                        @php
                                            $maxS = (float) ($session->max_score ?: 100);
                                            $pct = $maxS > 0 ? round(((float) $session->score / $maxS) * 100, 1) : 0;
                                        @endphp
                                        <div class="text-[10px] {{ $pct >= 70 ? 'text-green-11 font-semibold' : 'text-gray-10' }}">
                                            {{ $pct }}%
                                        </div>
                                    @elseif($session->status === 'completed')
                                        <span class="text-gray-9 text-xs italic">Menunggu Nilai</span>
                                    @else
                                        <span class="text-gray-8 text-xs">-</span>
                                    @endif
                                </td>

                                <!-- Waktu -->
                                <td class="py-3 px-4 text-gray-11 whitespace-nowrap text-[11px]">
                                    <div>{{ $session->started_at ? $session->started_at->format('d M Y H:i') : '-' }}</div>
                                    @if($session->completed_at)
                                        <div class="text-gray-9 text-[10px]">
                                            Selesai: {{ $session->completed_at->format('H:i') }}
                                        </div>
                                    @elseif($session->last_activity_at)
                                        <div class="text-gray-9 text-[10px]">
                                            Aktif: {{ $session->last_activity_at->diffForHumans() }}
                                        </div>
                                    @endif
                                </td>

                                <!-- Aksi -->
                                <td class="py-3 px-4 text-right whitespace-nowrap">
                                    <div class="flex items-center justify-end gap-1.5">
                                        @if($session->isLocked())
                                            <form action="{{ route('proctoring.sessions.unlock', $session) }}" method="POST" class="inline m-0">
                                                @csrf
                                                <button type="submit"
                                                        class="px-2.5 py-1 rounded-lg text-xs font-semibold bg-rose-9 hover:bg-rose-10 text-white transition-all shadow-xs cursor-pointer inline-flex items-center gap-1"
                                                        title="Buka kunci sesi ujian siswa sekarang">
                                                    <x-radix-icon name="lock-open-1" class="w-3.5 h-3.5" />
                                                    <span>Buka Kunci</span>
                                                </button>
                                            </form>
                                        @endif

                                        @if($session->isCompleted())
                                            <a href="{{ route('exam.result', $session) }}"
                                               class="px-2.5 py-1 rounded-lg text-xs font-semibold bg-emerald-3 hover:bg-emerald-4 text-emerald-11 transition-colors cursor-pointer"
                                               title="Lihat Rekap Hasil Ujian Siswa">
                                                Hasil
                                            </a>
                                            <a href="{{ route('exam.analysis', $session) }}"
                                               class="px-2.5 py-1 rounded-lg text-xs font-semibold bg-blue-3 hover:bg-blue-4 text-blue-11 transition-colors cursor-pointer"
                                               title="Analisis Butir Jawaban Siswa">
                                                Analisis
                                            </a>
                                        @endif

                                        @if($session->assessment_id)
                                            <a href="{{ route('assessments.proctoring', $session->assessment_id) }}"
                                               class="px-2.5 py-1 rounded-lg text-xs font-semibold bg-gray-3 hover:bg-gray-4 text-gray-12 transition-colors cursor-pointer"
                                               title="Ruang Pengawasan Asesmen Ini">
                                                Pengawasan
                                            </a>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="py-12 text-center text-gray-10">
                                    <div class="flex flex-col items-center justify-center gap-2">
                                        <x-radix-icon name="layers" class="w-8 h-8 text-gray-7" />
                                        <p class="font-semibold text-sm text-gray-12">Tidak Ada Sesi Asesmen Ditemukan</p>
                                        <p class="text-xs text-gray-10 max-w-sm">
                                            Belum ada pengerjaan ujian yang sesuai dengan kriteria filter pencarian Anda saat ini.
                                        </p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if($sessions->hasPages())
                <div class="p-4 border-t border-gray-5 bg-gray-2/20">
                    {{ $sessions->links() }}
                </div>
            @endif
        </div>
    </div>
</x-layouts.app>
