<x-layouts.app>
    <x-slot:title>{{ $questionBank->title }} - Bank Soal</x-slot:title>

    <div class="max-w-6xl mx-auto space-y-6 pb-12">
        <div class="flex items-center gap-3">
            <a href="{{ route('question-banks.index') }}" class="p-2 rounded-xl border border-gray-6 bg-white hover:bg-gray-3 text-gray-12 transition-colors cursor-pointer">
                <x-radix-icon name="arrow-left" class="w-4 h-4" />
            </a>
            <div>
                <span class="text-xs font-bold uppercase tracking-wider text-green-11 bg-green-3 border border-green-6/50 px-2.5 py-0.5 rounded-md">
                    {{ $questionBank->subject?->name ?? 'Umum' }}
                </span>
                <h1 class="font-display font-extrabold text-2xl text-gray-12 tracking-tight mt-1">
                    {{ $questionBank->title }}
                </h1>
            </div>
        </div>

        <div class="bg-white p-5 rounded-2xl border border-gray-6 shadow-[0_1px_3px_rgba(0,0,0,0.03)] space-y-2">
            <div class="flex items-center gap-4 text-xs text-gray-11">
                <span>Dibuat oleh: <strong class="text-gray-12">{{ $questionBank->creator?->name ?? 'Admin' }}</strong></span>
                <span>•</span>
                <span>Tingkat: <strong class="text-gray-12">Kelas {{ $questionBank->grade_level ?? '-' }}</strong></span>
            </div>
            @if($questionBank->description)
                <p class="text-xs text-gray-12 leading-relaxed pt-2 border-t border-gray-5">
                    {{ $questionBank->description }}
                </p>
            @endif
        </div>

        <!-- Questions in this Bank -->
        <div class="space-y-4">
            <h3 class="font-display font-bold text-base text-gray-12">Daftar Soal di Bank Ini:</h3>
            @forelse($questionBank->questions as $qIndex => $q)
                <div class="bg-white border border-gray-6 rounded-2xl p-5 space-y-3 shadow-xs">
                    <div class="flex items-center justify-between border-b border-gray-5 pb-2.5">
                        <span class="w-6 h-6 rounded-md bg-gray-12 text-white flex items-center justify-center text-xs font-bold">{{ $qIndex + 1 }}</span>
                        <span class="text-xs font-bold uppercase tracking-wider text-green-11 bg-green-3 border border-green-6/50 px-2 py-0.5 rounded-md">
                            {{ $q->type }}
                        </span>
                    </div>
                    <p class="text-sm font-semibold text-gray-12">{{ $q->prompt }}</p>
                    @include('assessments.partials.options-render', ['question' => $q])
                </div>
            @empty
                <div class="bg-white border border-gray-6 rounded-2xl p-8 text-center text-gray-11 text-xs">
                    Belum ada butir soal mandiri di bank soal ini.
                </div>
            @endforelse
        </div>
    </div>
</x-layouts.app>
