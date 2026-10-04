<x-layouts.app>
    <x-slot:title>Manajemen Asesmen & Ujian - ADZKIA</x-slot:title>

    @php
        $user = auth()->user();
        $isSuper = $user && $user->isSuperUser();
        $isAdmin = $user && $user->isAdmin();
        $isTeacher = $user && $user->isTeacher();
        $canManage = $user && ($isTeacher || $isAdmin || $isSuper);
        $currentTenant = $user?->currentTenant ?? $user?->tenants()->first();
        $canCreate = $user && ($isSuper || ($currentTenant && $currentTenant->canCreateAssessments()));
        $canAccessStudioAi = $user && ($isSuper || ($currentTenant && $currentTenant->canAccessStudioAi()));
    @endphp

    <div class="space-y-6">
        <!-- Header & Action Button -->
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
            <div>
                <h1 class="font-display font-bold text-2xl text-gray-12 tracking-tight">
                    {{ $canManage ? 'Daftar Asesmen & Ujian' : 'Katalog Asesmen & Ujian Siswa' }}
                </h1>
                <p class="text-sm text-gray-11 mt-1">
                    {{ $canManage ? 'Kelola bank ujian, pantau sesi ujian siswa (proctoring), dan jadwal evaluasi.' : 'Pilih dan ikuti ujian aktif untuk menguji pemahaman materi belajar Anda.' }}
                </p>
            </div>

            @if($canManage)
                <div class="flex flex-wrap items-center gap-2.5">
                    @if($canAccessStudioAi)
                        <a href="{{ route('question-generator.index') }}" 
                           class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl bg-gradient-to-r from-emerald-600 via-teal-600 to-indigo-600 hover:from-emerald-700 hover:to-indigo-700 text-white text-xs font-bold transition-all shadow-xs cursor-pointer active:scale-95" 
                           title="Buat soal otomatis dengan DeepSeek AI">
                            <x-radix-icon name="magic-wand" class="w-4 h-4" />
                            <span>Studio Pembuat Soal AI</span>
                        </a>
                    @endif
                    @if($canCreate)
                        <a href="{{ route('assessments.wizard') }}" 
                           class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl bg-green-9 hover:bg-green-10 active:bg-green-11 text-white text-sm font-semibold transition-all shadow-[0_1px_2px_rgba(0,0,0,0.06)] active:scale-[0.98] cursor-pointer">
                            <x-radix-icon name="plus" class="w-4 h-4" />
                            <span>Buat Ujian Baru (Wizard 8 Langkah)</span>
                        </a>
                    @else
                        <div class="inline-flex items-center gap-2 px-4 py-2 rounded-xl bg-amber-50 border border-amber-300 text-amber-900 text-xs font-semibold" title="Pembuatan asesmen mandiri dan Studio AI hanya tersedia untuk paket ENTERPRISE. Guru pada paket STARTER dan PRO berfokus pada Pengawasan Ujian kurasi ADZKIA.">
                            <span>🔒 Pembuatan Asesmen & Studio AI: Khusus Tenant ENTERPRISE</span>
                        </div>
                    @endif
                </div>
            @endif
        </div>

        @if(session('success'))
            <div class="p-4 rounded-xl bg-green-3 border border-green-6/50 text-green-11 text-sm font-semibold flex items-center justify-between">
                <span>{{ session('success') }}</span>
                <button type="button" @click="$el.parentElement.remove()" class="text-green-9 hover:text-green-11 cursor-pointer">
                    <x-radix-icon name="cross-2" class="w-4 h-4" />
                </button>
            </div>
        @endif

        <!-- Filter & Search Bar -->
        <div class="bg-white p-3 rounded-xl border border-gray-6 shadow-[0_1px_3px_rgba(0,0,0,0.03)]">
            <form method="GET" action="{{ route('assessments.index') }}" class="flex flex-col sm:flex-row gap-2 sm:items-center">
                <div class="relative flex-1 min-w-0">
                    <span class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-9 pointer-events-none">
                        <x-radix-icon name="magnifying-glass" class="w-3.5 h-3.5" />
                    </span>
                    <input type="text" name="search" value="{{ request('search') }}" 
                           placeholder="Cari judul ujian..." 
                           class="w-full rounded-lg border border-gray-7 bg-white pl-8 pr-3 py-1.5 text-xs text-gray-12 placeholder:text-gray-8 transition-colors focus:border-green-8 focus:ring-1 focus:ring-green-8 outline-none">
                </div>

                <div class="w-full sm:w-28 shrink-0">
                    <select name="grade_level" onchange="this.form.submit()" 
                            class="w-full rounded-lg border border-gray-7 bg-white px-2 py-1.5 text-xs text-gray-12 outline-none cursor-pointer truncate">
                        <option value="">Semua Kelas</option>
                        @foreach($gradeLevels ?? [] as $gl)
                            <option value="{{ $gl->value }}" {{ request('grade_level') == $gl->value ? 'selected' : '' }}>
                                {{ $gl->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="w-full sm:w-24 shrink-0">
                    <select name="subject_id" onchange="this.form.submit()" 
                            class="w-full rounded-lg border border-gray-7 bg-white px-2 py-1.5 text-xs text-gray-12 outline-none cursor-pointer truncate">
                        <option value="">Semua Mapel</option>
                        @foreach($subjects as $sub)
                            <option value="{{ $sub->id }}" {{ request('subject_id') == $sub->id ? 'selected' : '' }}>{{ $sub->name }}</option>
                        @endforeach
                    </select>
                </div>

                @if($canManage)
                    <div class="w-full sm:w-20 shrink-0">
                        <select name="status" onchange="this.form.submit()" 
                                class="w-full rounded-lg border border-gray-7 bg-white px-2 py-1.5 text-xs text-gray-12 outline-none cursor-pointer truncate">
                            <option value="">Status</option>
                            <option value="draft" {{ request('status') === 'draft' ? 'selected' : '' }}>Draf</option>
                            <option value="published" {{ request('status') === 'published' ? 'selected' : '' }}>Published</option>
                            <option value="archived" {{ request('status') === 'archived' ? 'selected' : '' }}>Arsip</option>
                        </select>
                    </div>
                @endif

                <button type="submit" class="px-2.5 py-1.5 rounded-lg bg-gray-3 hover:bg-gray-4 text-gray-12 text-xs font-semibold transition-colors cursor-pointer shrink-0">
                    Filter
                </button>

                @if(request()->hasAny(['search', 'grade_level', 'subject_id', 'status', 'type']))
                    <a href="{{ route('assessments.index') }}" class="px-2 py-1.5 rounded-lg bg-gray-2 hover:bg-gray-3 text-gray-11 hover:text-gray-12 text-xs font-semibold flex items-center justify-center transition-colors shrink-0">
                        Reset
                    </a>
                @endif
            </form>
        </div>

        <!-- Assessments Table -->
        <div class="bg-white border border-gray-6 rounded-xl shadow-[0_1px_3px_rgba(0,0,0,0.03)] overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse text-xs">
                    <thead>
                        <tr class="border-b border-gray-6 bg-gray-2/50 text-gray-11 uppercase tracking-wider font-semibold">
                            <th class="py-3.5 px-5">Judul Ujian</th>
                            <th class="py-3.5 px-4">Mata Pelajaran</th>
                            @if($user && $user->isSuperUser())
                                <th class="py-3.5 px-4 text-center" title="Hak Prerogatif Owner ADZKIA untuk mengunci ujian sebagai Wajib Tayang Nasional bagi semua tenant Enterprise">Wajib Nasional (Owner)</th>
                            @endif
                            @if($canManage)
                                <th class="py-3.5 px-4 text-center">Awasi</th>
                            @else
                                <th class="py-3.5 px-4 text-center">HARI (percobaan)</th>
                            @endif
                            <th class="py-3.5 px-5 text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-5">
                        @forelse($assessments as $item)
                            <tr class="hover:bg-gray-2/40 transition-colors">
                                <td class="py-3.5 px-5 font-semibold text-gray-12">
                                    <a href="{{ route('assessments.show', $item) }}" class="hover:text-green-11 transition-colors text-sm">
                                        {{ $item->title }}
                                    </a>
                                    <p class="text-[11px] text-gray-9 mt-0.5 font-normal">
                                        Kelas {{ $item->grade_level ?? '-' }}
                                    </p>
                                </td>
                                <td class="py-3.5 px-4 text-gray-12 font-medium">
                                    {{ $item->subject?->name ?? 'Umum' }}
                                </td>
                                @if($user && $user->isSuperUser())
                                    <td class="py-3.5 px-4 text-center">
                                        <form method="POST" action="{{ route('assessments.toggle-mandatory', $item) }}" class="m-0 inline-block">
                                            @csrf
                                            @method('PATCH')
                                            <select name="is_mandatory" onchange="this.form.submit()"
                                                    class="rounded-lg text-[11px] font-bold py-1 px-2 cursor-pointer outline-none shadow-2xs border {{ $item->is_mandatory ? 'bg-amber-100 text-amber-900 border-amber-300' : 'bg-gray-100 text-gray-700 border-gray-300' }}">
                                                <option value="1" {{ $item->is_mandatory ? 'selected' : '' }}>🔒 WAJIB NASIONAL</option>
                                                <option value="0" {{ ! $item->is_mandatory ? 'selected' : '' }}>⚪ PILIHAN TENANT</option>
                                            </select>
                                        </form>
                                    </td>
                                @endif
                                @if($canManage)
                                    <td class="py-3.5 px-4 text-center whitespace-nowrap">
                                        <a href="{{ route('assessments.proctoring', $item) }}" 
                                           class="inline-flex items-center justify-center px-3 py-1.5 rounded-lg text-xs font-semibold text-white transition-all cursor-pointer shadow-xs hover:opacity-90 active:scale-95"
                                           style="background-color: #0f172a !important; color: #ffffff !important; display: inline-flex;"
                                           title="Masuk ke Ruang Pengawasan Ujian Real-Time">
                                            Pengawasan
                                        </a>
                                    </td>
                                @else
                                    @php
                                        $userAccess = $item->accesses->first();
                                        $days = $userAccess ? $userAccess->daysRemaining() : 0;
                                        $attempts = $userAccess ? $userAccess->availableAttempts() : 0;
                                        $isFree = ($item->price_type === 'free' || (float) $item->price <= 0);
                                    @endphp
                                    <td class="py-3.5 px-4 text-center whitespace-nowrap">
                                        @if($isFree)
                                            <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-lg text-xs font-bold bg-emerald-100 text-emerald-800 border border-emerald-300">
                                                Free (Forever)
                                            </span>
                                        @elseif($userAccess)
                                            <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-lg text-xs font-bold {{ $userAccess->isValid() ? 'bg-amber-100 text-amber-900 border border-amber-300' : 'bg-gray-100 text-gray-600 border border-gray-300' }}">
                                                {{ $days }} Hari ({{ $attempts }}x)
                                            </span>
                                        @else
                                            <span class="text-xs text-gray-9 font-medium">Belum Dibeli / -</span>
                                        @endif
                                    </td>
                                @endif
                                <td class="py-3.5 px-5 text-right">
                                    @if($canManage)
                                        <div class="flex items-center justify-end gap-1.5">
                                            <!-- Tombol Analisis -->
                                            <a href="{{ route('assessments.analytics', $item) }}" 
                                               class="relative group p-2 rounded-lg transition-all hover:opacity-90 active:scale-95 shadow-2xs inline-flex items-center justify-center cursor-pointer"
                                               style="background-color: #ffd8a8; color: #f76707;"
                                               title="Analisis Butir Soal & Statistik Nilai"
                                               aria-label="Analisis Butir Soal">
                                                <x-radix-icon name="bar-chart" class="w-4 h-4" />
                                                <span class="pointer-events-none absolute bottom-full left-1/2 -translate-x-1/2 mb-1.5 hidden group-hover:block bg-gray-900 text-white text-[11px] font-medium rounded-md px-2 py-1 shadow-lg whitespace-nowrap z-50">
                                                    Analisis Butir Soal
                                                </span>
                                            </a>

                                            <!-- Tombol Grading / Koreksi -->
                                            @php
                                                $pendingThis = $pendingGradingPerAssessment[$item->id] ?? 0;
                                            @endphp
                                            <a href="{{ route('assessments.grading', $item) }}" 
                                               class="relative group p-2 rounded-lg transition-all hover:opacity-90 active:scale-95 shadow-2xs inline-flex items-center justify-center cursor-pointer"
                                               style="background-color: #a5d8ff; color: #1c7ed6;"
                                               title="Grading & Koreksi Ujian Siswa{{ $pendingThis > 0 ? ' ('.$pendingThis.' butuh koreksi)' : '' }}"
                                               aria-label="Grading & Koreksi">
                                                <x-radix-icon name="pencil2" class="w-4 h-4" />
                                                @if($pendingThis > 0)
                                                    <span class="absolute -top-1.5 -right-1.5 min-w-[17px] h-[17px] px-1 rounded-full bg-rose-600 text-white text-[10px] font-black flex items-center justify-center border-2 border-white shadow-xs font-mono">
                                                        {{ $pendingThis }}
                                                    </span>
                                                @endif
                                                <span class="pointer-events-none absolute bottom-full left-1/2 -translate-x-1/2 mb-1.5 hidden group-hover:block bg-gray-900 text-white text-[11px] font-medium rounded-md px-2 py-1 shadow-lg whitespace-nowrap z-50">
                                                    Grading &amp; Koreksi @if($pendingThis > 0)<span class="text-rose-300 font-bold">({{ $pendingThis }} Butuh Koreksi)</span>@endif
                                                </span>
                                            </a>

                                            <!-- Tombol Detail -->
                                            <a href="{{ route('assessments.show', $item) }}" 
                                               class="relative group p-2 rounded-lg bg-gray-3 hover:bg-gray-4 text-gray-12 transition-all active:scale-95 shadow-2xs inline-flex items-center justify-center cursor-pointer"
                                               title="Lihat Detail & Konfigurasi Asesmen"
                                               aria-label="Lihat Detail Asesmen">
                                                <x-radix-icon name="eye-open" class="w-4 h-4" />
                                                <span class="pointer-events-none absolute bottom-full left-1/2 -translate-x-1/2 mb-1.5 hidden group-hover:block bg-gray-900 text-white text-[11px] font-medium rounded-md px-2 py-1 shadow-lg whitespace-nowrap z-50">
                                                    Lihat Detail
                                                </span>
                                            </a>

                                            <!-- Tombol Hapus -->
                                            @if($canCreate)
                                                <form method="POST" action="{{ route('assessments.destroy', $item) }}" class="m-0 inline-block" onsubmit="return confirm('Apakah Anda yakin ingin menghapus ujian ini?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" 
                                                            class="relative group p-2 rounded-lg bg-red-3 hover:bg-red-4 text-red-11 transition-all active:scale-95 shadow-2xs inline-flex items-center justify-center cursor-pointer"
                                                            title="Hapus Ujian Ini"
                                                            aria-label="Hapus Ujian">
                                                        <x-radix-icon name="trash" class="w-4 h-4" />
                                                        <span class="pointer-events-none absolute bottom-full left-1/2 -translate-x-1/2 mb-1.5 hidden group-hover:block bg-gray-900 text-white text-[11px] font-medium rounded-md px-2 py-1 shadow-lg whitespace-nowrap z-50">
                                                            Hapus Ujian
                                                        </span>
                                                    </button>
                                                </form>
                                            @endif
                                        </div>
                                    @else
                                        <a href="{{ route('assessments.show', $item) }}" 
                                           class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full text-xs font-bold bg-sky-600 hover:bg-sky-700 text-white transition-colors shadow-xs">
                                            <span>Ikuti Ujian</span>
                                            <x-radix-icon name="arrow-right" class="w-3.5 h-3.5" />
                                        </a>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="{{ $canManage ? ($user?->isSuperUser() ? '5' : '4') : '4' }}" class="py-12 text-center text-gray-11">
                                    <div class="max-w-sm mx-auto">
                                        <p class="font-semibold text-sm text-gray-12">Belum ada asesmen yang tersedia</p>
                                        <p class="text-xs text-gray-9 mt-1 mb-4">
                                            {{ $canManage ? 'Gunakan Wizard 8 Langkah untuk mulai membuat ujian pertama Anda.' : 'Ujian yang diterbitkan oleh dewan guru akan ditampilkan di halaman ini.' }}
                                        </p>
                                        @if($canCreate)
                                            <a href="{{ route('assessments.wizard') }}" class="inline-flex items-center gap-2 px-4 py-2 rounded-xl bg-green-9 text-white text-xs font-semibold hover:bg-green-10 transition-colors">
                                                <x-radix-icon name="plus" class="w-4 h-4" />
                                                <span>Mulai Buat Ujian</span>
                                            </a>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if($assessments->hasPages())
                <div class="p-4 border-t border-gray-6 bg-gray-2/30">
                    {{ $assessments->links() }}
                </div>
            @endif
        </div>
    </div>
</x-layouts.app>
