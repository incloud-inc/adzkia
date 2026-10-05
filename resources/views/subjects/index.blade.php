<x-layouts.app>
    <x-slot:title>Mata Pelajaran - ADZKIA</x-slot:title>

    <div x-data="{ showModal: false, isEdit: false, form: { id: '', name: '', code: '', description: '' } }" class="space-y-6">
        <!-- Header & Action Button -->
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
            <div>
                <h1 class="font-display font-bold text-2xl text-gray-12 tracking-tight">Mata Pelajaran</h1>
                <p class="text-sm text-gray-11 mt-1">Daftar mata pelajaran untuk pengelompokan bank soal dan asesmen ujian.</p>
            </div>

            <button type="button" @click="isEdit = false; form = { id: '', name: '', code: '', description: '' }; showModal = true"
                    class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl bg-green-9 hover:bg-green-10 active:bg-green-11 text-white text-sm font-semibold transition-all shadow-[0_1px_2px_rgba(0,0,0,0.06)] active:scale-[0.98] cursor-pointer">
                <x-radix-icon name="plus" class="w-4 h-4" />
                <span>Tambah Mata Pelajaran</span>
            </button>
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
            <form method="GET" action="{{ route('subjects.index') }}" class="flex gap-3">
                <div class="relative flex-1">
                    <span class="absolute left-3.5 top-1/2 -translate-y-1/2 text-gray-9 pointer-events-none">
                        <x-radix-icon name="magnifying-glass" class="w-4 h-4" />
                    </span>
                    <input type="text" name="search" value="{{ request('search') }}" 
                           placeholder="Cari berdasarkan nama atau kode mapel..." 
                           class="w-full rounded-lg border border-gray-7 bg-white pl-10 pr-3.5 py-2 text-sm text-gray-12 placeholder:text-gray-8 outline-none focus:border-green-8 focus:ring-1 focus:ring-green-8">
                </div>
                <button type="submit" class="px-4 py-2 rounded-lg bg-gray-3 hover:bg-gray-4 text-gray-12 text-sm font-semibold transition-colors cursor-pointer">
                    Cari
                </button>
            </form>
        </div>

        <!-- Subjects Table -->
        <div class="bg-white border border-gray-6 rounded-xl shadow-[0_1px_3px_rgba(0,0,0,0.03)] overflow-hidden">
            <div class="overflow-x-auto touch-pan-x hide-scrollbar">
                <table class="w-full min-w-[720px] sm:min-w-full text-left border-collapse text-xs">
                    <thead>
                        <tr class="border-b border-gray-6 bg-gray-2/50 text-gray-11 uppercase tracking-wider font-semibold">
                            <th class="py-3.5 px-5">Nama Mata Pelajaran</th>
                            <th class="py-3.5 px-4">Kode</th>
                            <th class="py-3.5 px-4 text-center">Asesmen</th>
                            <th class="py-3.5 px-4 text-center">Bank Soal</th>
                            <th class="py-3.5 px-4 text-center">Ujian</th>
                            <th class="py-3.5 px-4">Keterangan</th>
                            <th class="py-3.5 px-5 text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-5">
                        @forelse($subjects as $item)
                            <tr class="hover:bg-gray-2/40 transition-colors">
                                <td class="py-3.5 px-5 font-semibold text-gray-12 text-sm whitespace-nowrap">
                                    {{ $item->name }}
                                </td>
                                <td class="py-3.5 px-4 font-mono font-bold text-gray-11 whitespace-nowrap">
                                    {{ $item->code ?? '-' }}
                                </td>
                                <td class="py-3.5 px-4 text-center whitespace-nowrap">
                                    <span class="inline-flex items-center px-2 py-0.5 rounded-md font-semibold text-purple-11 bg-purple-3 border border-purple-6/50 font-mono">
                                        {{ number_format($item->assessments_count ?? 0) }} asesmen
                                    </span>
                                </td>
                                <td class="py-3.5 px-4 text-center whitespace-nowrap">
                                    <span class="inline-flex items-center px-2 py-0.5 rounded-md font-semibold text-blue-11 bg-blue-3 border border-blue-6/50 font-mono">
                                        {{ number_format($item->questions_count ?? 0) }} soal
                                    </span>
                                </td>
                                <td class="py-3.5 px-4 text-center whitespace-nowrap">
                                    <span class="inline-flex items-center px-2 py-0.5 rounded-md font-semibold text-green-11 bg-green-3 border border-green-6/50 font-mono">
                                        {{ number_format($item->exam_sessions_count ?? 0) }} kali dikerjakan
                                    </span>
                                </td>
                                <td class="py-3.5 px-4 text-gray-11 max-w-xs truncate">
                                    {{ $item->description ?? '-' }}
                                </td>
                                <td class="py-3.5 px-5 text-right whitespace-nowrap">
                                    <div class="flex items-center justify-end gap-2">
                                        <button type="button" 
                                                @click="isEdit = true; form = { id: '{{ $item->id }}', name: '{{ addslashes($item->name) }}', code: '{{ $item->code }}', description: '{{ addslashes($item->description) }}' }; showModal = true"
                                                class="px-2.5 py-1 rounded-lg text-xs font-semibold bg-gray-3 hover:bg-gray-4 text-gray-12 transition-colors cursor-pointer">
                                            Edit
                                        </button>
                                        <form method="POST" action="{{ route('subjects.destroy', $item) }}" class="m-0 inline-block" onsubmit="return confirm('Apakah Anda yakin ingin menghapus mata pelajaran {{ $item->name }}?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="px-2.5 py-1 rounded-lg text-xs font-semibold bg-red-3 hover:bg-red-4 text-red-11 transition-colors cursor-pointer">
                                                Hapus
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="py-12 text-center text-gray-11">
                                    Belum ada mata pelajaran. Klik tombol "Tambah Mata Pelajaran" untuk membuat.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if($subjects->hasPages())
                <div class="p-4 border-t border-gray-6 bg-gray-2/30">
                    {{ $subjects->links() }}
                </div>
            @endif
        </div>

        <!-- Add / Edit Modal (Alpine.js) -->
        <div x-show="showModal" style="display: none;" 
             x-transition.opacity
             class="fixed inset-0 z-50 bg-gray-12/40 backdrop-blur-xs flex items-center justify-center p-4">
            <div @click.away="showModal = false" 
                 class="bg-white border border-gray-6 rounded-2xl max-w-md w-full p-6 space-y-5 shadow-xl">
                <div class="flex items-center justify-between border-b border-gray-5 pb-3">
                    <h3 class="font-display font-bold text-base text-gray-12" x-text="isEdit ? 'Edit Mata Pelajaran' : 'Tambah Mata Pelajaran'"></h3>
                    <button type="button" @click="showModal = false" class="text-gray-9 hover:text-gray-12 p-1 cursor-pointer">
                        <x-radix-icon name="cross-2" class="w-4 h-4" />
                    </button>
                </div>

                <form :action="isEdit ? '{{ url('subjects') }}/' + form.id : '{{ route('subjects.store') }}'" method="POST" class="space-y-4">
                    @csrf
                    <template x-if="isEdit">
                        <input type="hidden" name="_method" value="PUT">
                    </template>

                    <div class="space-y-1.5">
                        <label class="block text-xs font-bold text-gray-12">Nama Mata Pelajaran <span class="text-red-9">*</span></label>
                        <input type="text" name="name" x-model="form.name" required placeholder="Contoh: Matematika Peminatan"
                               class="w-full rounded-xl border border-gray-7 bg-white px-3.5 py-2 text-sm text-gray-12 outline-none focus:border-green-8">
                    </div>

                    <div class="space-y-1.5">
                        <label class="block text-xs font-bold text-gray-12">Kode Singkat (Opsional)</label>
                        <input type="text" name="code" x-model="form.code" placeholder="Contoh: MAT-PEM"
                               class="w-full rounded-xl border border-gray-7 bg-white px-3.5 py-2 text-sm text-gray-12 uppercase font-mono outline-none focus:border-green-8">
                    </div>

                    <div class="space-y-1.5">
                        <label class="block text-xs font-bold text-gray-12">Deskripsi / Keterangan</label>
                        <textarea name="description" x-model="form.description" rows="2" placeholder="Keterangan singkat mata pelajaran..."
                                  class="w-full rounded-xl border border-gray-7 bg-white px-3.5 py-2 text-sm text-gray-12 outline-none focus:border-green-8"></textarea>
                    </div>

                    <div class="flex items-center justify-end gap-3 pt-2">
                        <button type="button" @click="showModal = false" class="px-4 py-2 rounded-xl border border-gray-6 text-xs font-semibold text-gray-12 hover:bg-gray-3 cursor-pointer">
                            Batal
                        </button>
                        <button type="submit" class="px-5 py-2 rounded-xl bg-green-9 text-white text-xs font-bold hover:bg-green-10 transition-colors shadow-xs cursor-pointer">
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layouts.app>
