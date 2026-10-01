<x-layouts.app>
    <x-slot:title>{{ $title }} - ADZKIA</x-slot:title>

    <div class="max-w-6xl mx-auto space-y-6 pb-12">
        <div class="bg-white border border-gray-6 rounded-2xl p-6 md:p-8 shadow-[0_1px_3px_rgba(0,0,0,0.03)] text-center min-h-[400px] flex flex-col items-center justify-center">
            <x-radix-icon name="rocket" class="w-16 h-16 text-green-9 mb-4" />
            <h1 class="font-display font-bold text-2xl text-gray-12 mb-2">{{ $title }}</h1>
            <p class="text-gray-11 mb-6">Halaman ini sedang dalam tahap pengembangan (Coming Soon).</p>
            <a href="{{ route('dashboard') }}" class="px-5 py-2.5 rounded-xl bg-green-9 text-white text-sm font-semibold hover:bg-green-10 transition-colors shadow-sm">
                Kembali ke Dashboard
            </a>
        </div>
    </div>
</x-layouts.app>
