<x-layouts.app>
    <x-slot:title>Bank Soal - ADZKIA</x-slot:title>

    @php
        $user = auth()->user();
        $isSuper = $user && $user->isSuperUser();
        $currentTenant = $user?->currentTenant ?? $user?->tenants()->first();
        $canCreate = $user && ($isSuper || ($currentTenant && $currentTenant->canCreateAssessments()));
        $canAccessStudioAi = $user && ($isSuper || ($currentTenant && $currentTenant->canAccessStudioAi()));
    @endphp

    <div class="space-y-6">
        <!-- Header & Action Button -->
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
            <div>
                <h1 class="font-display font-bold text-2xl text-gray-12 tracking-tight">Bank Soal</h1>
                <p class="text-sm text-gray-11 mt-1">Penyimpanan dan pengelompokan butir soal berdasarkan mata pelajaran dan topik.</p>
            </div>

            <div class="flex items-center gap-3">
                @if($canAccessStudioAi)
                    <a href="{{ route('question-generator.index') }}" 
                       class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl bg-gradient-to-r from-emerald-600 via-teal-600 to-indigo-600 hover:from-emerald-700 hover:to-indigo-700 text-white text-xs font-bold transition-all shadow-xs cursor-pointer active:scale-95" 
                       title="Buat soal otomatis dengan DeepSeek AI">
                        <x-radix-icon name="magic-wand" class="w-4 h-4" />
                        <span>Studio Pembuat Soal AI</span>
                    </a>
                @endif
                <a href="{{ route('assessments.index') }}" 
                   class="inline-flex items-center gap-2 px-3.5 py-2.5 rounded-xl text-white text-xs font-semibold transition-all shadow-xs cursor-pointer hover:opacity-90 active:scale-95" 
                   style="background-color: #0f172a !important; color: #ffffff !important;"
                   title="Ruang Pengawasan Ujian Real-Time">
                    <span>Pengawasan Ujian</span>
                </a>
                <a href="{{ route('subjects.index') }}" class="inline-flex items-center gap-2 px-3.5 py-2.5 rounded-xl border border-gray-6 bg-white hover:bg-gray-3 text-gray-12 text-xs font-semibold transition-colors cursor-pointer">
                    <x-radix-icon name="file-text" class="w-4 h-4" />
                    <span>Kelola Mapel</span>
                </a>
                @if($canCreate)
                    <a href="{{ route('assessments.wizard') }}" class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl bg-green-9 hover:bg-green-10 text-white text-xs font-semibold transition-colors shadow-xs cursor-pointer">
                        <x-radix-icon name="plus" class="w-4 h-4" />
                        <span>Buat Ujian Baru (Wizard)</span>
                    </a>
                @endif
            </div>
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
        <div class="bg-white p-4 rounded-xl border border-gray-6 shadow-[0_1px_3px_rgba(0,0,0,0.03)]">
            <form method="GET" action="{{ route('question-banks.index') }}" class="flex flex-col sm:flex-row gap-3">
                <div class="relative flex-1">
                    <span class="absolute left-3.5 top-1/2 -translate-y-1/2 text-gray-9 pointer-events-none">
                        <x-radix-icon name="magnifying-glass" class="w-4 h-4" />
                    </span>
                    <input type="text" name="search" value="{{ request('search') }}" 
                           placeholder="Cari berdasarkan judul bank soal..." 
                           class="w-full rounded-lg border border-gray-7 bg-white pl-10 pr-3.5 py-2 text-sm text-gray-12 placeholder:text-gray-8 outline-none focus:border-green-8 focus:ring-1 focus:ring-green-8">
                </div>

                <div class="w-full sm:w-48">
                    <select name="subject_id" onchange="this.form.submit()" 
                            class="w-full rounded-lg border border-gray-7 bg-white px-3 py-2 text-sm text-gray-12 outline-none cursor-pointer">
                        <option value="">Semua Mapel</option>
                        @foreach($subjects as $sub)
                            <option value="{{ $sub->id }}" {{ request('subject_id') == $sub->id ? 'selected' : '' }}>{{ $sub->name }}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="px-4 py-2 rounded-lg bg-gray-3 hover:bg-gray-4 text-gray-12 text-sm font-semibold transition-colors cursor-pointer">
                    Filter
                </button>
            </form>
        </div>

        <!-- Question Banks Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
            @forelse($questionBanks as $bank)
                <div class="bg-white border border-gray-6 rounded-2xl p-5 shadow-[0_1px_3px_rgba(0,0,0,0.03)] flex flex-col justify-between hover:border-green-8 transition-colors group">
                    <div>
                        <div class="flex items-center justify-between mb-3">
                            <span class="text-xs font-bold uppercase tracking-wider text-green-11 bg-green-3 border border-green-6/50 px-2.5 py-0.5 rounded-md">
                                {{ $bank->subject?->name ?? 'Umum' }}
                            </span>
                            <span class="text-[11px] font-mono text-gray-11">
                                Kelas {{ $bank->grade_level ?? '-' }}
                            </span>
                        </div>
                        <h3 class="font-display font-bold text-base text-gray-12 group-hover:text-green-11 transition-colors">
                            {{ $bank->title }}
                        </h3>
                        <p class="text-xs text-gray-11 mt-1.5 line-clamp-2">
                            {{ $bank->description ?? 'Tidak ada deskripsi.' }}
                        </p>
                    </div>

                    <div class="mt-4 pt-3 border-t border-gray-5 flex items-center justify-between text-xs">
                        <span class="text-gray-11 font-medium">
                            <strong class="text-gray-12 font-bold">{{ $bank->questions_count }}</strong> butir soal
                        </span>
                        <div class="flex items-center gap-1.5">
                            <a href="{{ route('assessments.index') }}" 
                               class="px-2.5 py-1 rounded-lg text-white font-semibold transition-all hover:opacity-90" 
                               style="background-color: #0f172a !important; color: #ffffff !important;"
                               title="Pengawasan Ujian">
                                Pengawasan
                            </a>
                            <a href="{{ route('question-banks.show', $bank) }}" class="px-2.5 py-1 rounded-lg bg-gray-3 hover:bg-gray-4 text-gray-12 font-semibold transition-colors">
                                Lihat
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full bg-white border border-gray-6 rounded-2xl p-12 text-center text-gray-11">
                    <p class="font-semibold text-sm text-gray-12">Belum ada bank soal tercatat</p>
                    <p class="text-xs text-gray-9 mt-1 mb-4">
                        {{ $canCreate ? 'Gunakan tombol "Buat Ujian Baru (Wizard)" untuk mulai menyusun paket ujian dan bank soal.' : 'Bank soal dan ujian kurasi ADZKIA akan tampil di halaman pengawasan.' }}
                    </p>
                    @if($canCreate)
                        <a href="{{ route('assessments.wizard') }}" class="inline-flex items-center gap-2 px-4 py-2 rounded-xl bg-green-9 text-white text-xs font-semibold hover:bg-green-10 transition-colors">
                            <x-radix-icon name="plus" class="w-4 h-4" />
                            <span>Mulai Buat Ujian</span>
                        </a>
                    @endif
                </div>
            @endforelse
        </div>

        @if($questionBanks->hasPages())
            <div class="p-4 bg-white rounded-xl border border-gray-6">
                {{ $questionBanks->links() }}
            </div>
        @endif
    </div>
</x-layouts.app>
