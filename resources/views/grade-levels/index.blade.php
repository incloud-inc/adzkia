<x-layouts.app>
    <x-slot:title>Manajemen Tingkat Kelas & Jenjang - ADZKIA</x-slot:title>

    <div class="max-w-6xl mx-auto space-y-6 pb-12" x-data="gradeLevelManager()">
        
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
            <div>
                <h1 class="font-display font-bold text-2xl text-gray-12">Tingkat Kelas & Jenjang</h1>
                <p class="text-sm text-gray-11 mt-1">Kelola data tingkat kelas yang akan muncul pada dropdown wizard pembuatan soal.</p>
            </div>
            <button @click="openModal('create')" class="px-4 py-2 bg-green-9 hover:bg-green-10 text-white text-sm font-bold rounded-xl transition-colors flex items-center gap-2 shadow-sm">
                <x-radix-icon name="plus" class="w-4 h-4" />
                Tambah Baru
            </button>
        </div>

        @if(session('success'))
            <div class="p-4 bg-green-3 border border-green-6 text-green-11 text-sm font-medium rounded-xl flex items-center gap-3">
                <x-radix-icon name="check-circled" class="w-5 h-5" />
                {{ session('success') }}
            </div>
        @endif
        
        @if($errors->any())
            <div class="p-4 bg-red-3 border border-red-6 text-red-11 text-sm font-medium rounded-xl flex items-start gap-3">
                <x-radix-icon name="exclamation-triangle" class="w-5 h-5 shrink-0 mt-0.5" />
                <ul class="list-disc list-inside">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="bg-white border border-gray-6 rounded-2xl shadow-[0_1px_3px_rgba(0,0,0,0.03)] overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="border-b border-gray-5 bg-gray-2/50">
                            <th class="px-6 py-4 text-xs font-bold text-gray-11 uppercase tracking-wider">Urutan</th>
                            <th class="px-6 py-4 text-xs font-bold text-gray-11 uppercase tracking-wider">Grup</th>
                            <th class="px-6 py-4 text-xs font-bold text-gray-11 uppercase tracking-wider">Nama Kelas</th>
                            <th class="px-6 py-4 text-xs font-bold text-gray-11 uppercase tracking-wider">Value</th>
                            <th class="px-6 py-4 text-xs font-bold text-gray-11 uppercase tracking-wider">Status</th>
                            <th class="px-6 py-4 text-xs font-bold text-gray-11 uppercase tracking-wider text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-5">
                        @forelse($gradeLevels as $grade)
                            <tr class="hover:bg-gray-2/30 transition-colors">
                                <td class="px-6 py-4 text-sm font-mono text-gray-12">{{ $grade->order }}</td>
                                <td class="px-6 py-4 text-sm text-gray-11">{{ $grade->group ?? '-' }}</td>
                                <td class="px-6 py-4 text-sm font-bold text-gray-12">{{ $grade->name }}</td>
                                <td class="px-6 py-4 text-sm text-gray-11">
                                    <span class="font-mono bg-gray-3/50 px-2 py-1 rounded inline-block mt-3">{{ $grade->value }}</span>
                                </td>
                                <td class="px-6 py-4">
                                    @if($grade->is_active)
                                        <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-green-3 text-green-11">Aktif</span>
                                    @else
                                        <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-gray-3 text-gray-11">Nonaktif</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 text-right space-x-2">
                                    <button @click="openModal('edit', {{ json_encode($grade) }})" class="text-gray-11 hover:text-green-11 transition-colors p-1" title="Edit">
                                        <x-radix-icon name="pencil-1" class="w-4 h-4" />
                                    </button>
                                    <button @click="openModal('delete', {{ json_encode($grade) }})" class="text-gray-11 hover:text-red-11 transition-colors p-1" title="Hapus">
                                        <x-radix-icon name="trash" class="w-4 h-4" />
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-6 py-8 text-center text-gray-11 text-sm">Belum ada data tingkat kelas.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Form Modal -->
        <div x-show="isModalOpen" x-transition.opacity class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 backdrop-blur-sm p-4" style="display: none;">
            <div @click.away="closeModal()" class="bg-white rounded-2xl w-full max-w-lg shadow-xl overflow-hidden border border-gray-6"
                 x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                 x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100">
                
                <div class="px-6 py-4 border-b border-gray-5 flex items-center justify-between bg-gray-2/50">
                    <h3 class="font-bold text-gray-12" x-text="modalMode === 'create' ? 'Tambah Tingkat Kelas' : 'Edit Tingkat Kelas'"></h3>
                    <button @click="closeModal()" class="text-gray-11 hover:text-gray-12 p-1 rounded-md hover:bg-gray-4 transition-colors">
                        <x-radix-icon name="cross-2" class="w-5 h-5" />
                    </button>
                </div>

                <form :action="formAction" method="POST" class="p-6 space-y-4">
                    @csrf
                    <input type="hidden" name="_method" :value="modalMode === 'edit' ? 'PUT' : 'POST'">
                    
                    <div>
                        <label class="block text-sm font-bold text-gray-12 mb-1">Grup (Opsional)</label>
                        <input type="text" name="group" x-model="formData.group" placeholder="Misal: Sekolah Dasar (SD)" class="w-full rounded-xl border border-gray-6 px-4 py-2.5 text-sm text-gray-12 outline-none focus:border-green-8 focus:ring-1 focus:ring-green-8 transition-shadow">
                    </div>
                    
                    <div>
                        <label class="block text-sm font-bold text-gray-12 mb-1">Nama Kelas <span class="text-red-9">*</span></label>
                        <input type="text" name="name" x-model="formData.name" required placeholder="Misal: Kelas 1 SD" class="w-full rounded-xl border border-gray-6 px-4 py-2.5 text-sm text-gray-12 outline-none focus:border-green-8 focus:ring-1 focus:ring-green-8 transition-shadow">
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-gray-12 mb-1">Value (Unik) <span class="text-red-9">*</span></label>
                        <input type="text" name="value" x-model="formData.value" required placeholder="Misal: 1 SD" class="w-full rounded-xl border border-gray-6 px-4 py-2.5 text-sm text-gray-12 outline-none focus:border-green-8 focus:ring-1 focus:ring-green-8 transition-shadow">
                        <p class="text-xs text-gray-11 mt-1">Value ini disimpan ke database saat soal dibuat, sebaiknya jangan diubah jika sudah dipakai.</p>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-bold text-gray-12 mb-1">Urutan</label>
                            <input type="number" name="order" x-model="formData.order" class="w-full rounded-xl border border-gray-6 px-4 py-2.5 text-sm text-gray-12 outline-none focus:border-green-8 focus:ring-1 focus:ring-green-8 transition-shadow">
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-gray-12 mb-1">Status</label>
                            <select name="is_active" x-model="formData.is_active" class="w-full rounded-xl border border-gray-6 px-4 py-2.5 text-sm text-gray-12 outline-none focus:border-green-8 focus:ring-1 focus:ring-green-8 transition-shadow">
                                <option value="1">Aktif</option>
                                <option value="0">Nonaktif</option>
                            </select>
                        </div>
                    </div>

                    <div class="pt-4 flex justify-end gap-3">
                        <button type="button" @click="closeModal()" class="px-4 py-2 rounded-xl text-sm font-bold text-gray-11 hover:text-gray-12 hover:bg-gray-3 transition-colors">Batal</button>
                        <button type="submit" class="px-6 py-2 rounded-xl text-sm font-bold bg-green-9 hover:bg-green-10 text-white shadow-sm transition-colors">Simpan</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Delete Modal -->
        <div x-show="isDeleteModalOpen" x-transition.opacity class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 backdrop-blur-sm p-4" style="display: none;">
            <div @click.away="closeDeleteModal()" class="bg-white rounded-2xl w-full max-w-sm shadow-xl overflow-hidden border border-gray-6 text-center p-6"
                 x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                 x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100">
                
                <div class="w-12 h-12 rounded-full bg-red-3 text-red-11 flex items-center justify-center mx-auto mb-4">
                    <x-radix-icon name="exclamation-triangle" class="w-6 h-6" />
                </div>
                <h3 class="font-bold text-lg text-gray-12 mb-2">Hapus Tingkat Kelas?</h3>
                <p class="text-sm text-gray-11 mb-6">Tingkat kelas <strong x-text="formData.name" class="text-gray-12"></strong> akan dihapus permanen. Aksi ini tidak dapat dibatalkan.</p>
                
                <form :action="formAction" method="POST" class="flex justify-center gap-3">
                    @csrf
                    @method('DELETE')
                    <button type="button" @click="closeDeleteModal()" class="px-4 py-2 rounded-xl text-sm font-bold text-gray-11 hover:text-gray-12 hover:bg-gray-3 transition-colors">Batal</button>
                    <button type="submit" class="px-6 py-2 rounded-xl text-sm font-bold bg-red-9 hover:bg-red-10 text-white shadow-sm transition-colors">Ya, Hapus</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('gradeLevelManager', () => ({
                isModalOpen: false,
                isDeleteModalOpen: false,
                modalMode: 'create', // 'create' or 'edit'
                formAction: '{{ route('grade-levels.store') }}',
                formData: {
                    id: null,
                    group: '',
                    name: '',
                    value: '',
                    order: 0,
                    is_active: '1'
                },

                openModal(mode, data = null) {
                    this.modalMode = mode;
                    if (mode === 'create') {
                        this.formAction = '{{ route('grade-levels.store') }}';
                        this.formData = { id: null, group: '', name: '', value: '', order: 0, is_active: '1' };
                        this.isModalOpen = true;
                    } else if (mode === 'edit') {
                        this.formAction = `/grade-levels/${data.id}`;
                        this.formData = { 
                            ...data, 
                            is_active: data.is_active ? '1' : '0'
                        };
                        this.isModalOpen = true;
                    } else if (mode === 'delete') {
                        this.formAction = `/grade-levels/${data.id}`;
                        this.formData = data;
                        this.isDeleteModalOpen = true;
                    }
                },

                closeModal() {
                    this.isModalOpen = false;
                },

                closeDeleteModal() {
                    this.isDeleteModalOpen = false;
                }
            }));
        });
    </script>
</x-layouts.app>
