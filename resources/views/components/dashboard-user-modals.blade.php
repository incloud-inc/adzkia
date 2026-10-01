@props(['tenants' => collect(), 'currentTenant' => null])

<!-- ========================================================================= -->
<!-- MODAL 1: FORM TAMBAH / EDIT ANGGOTA (GURU, SISWA, ADMIN)                 -->
<!-- ========================================================================= -->
<div x-show="showModal" 
     x-transition:enter="transition ease-out duration-300"
     x-transition:enter-start="opacity-0"
     x-transition:enter-end="opacity-100"
     x-transition:leave="transition ease-in duration-200"
     x-transition:leave-start="opacity-100"
     x-transition:leave-end="opacity-0"
     class="fixed inset-0 z-50 overflow-y-auto bg-black/60 backdrop-blur-xs flex items-center justify-center p-4"
     style="display: none;">
    <div @click.away="showModal = false"
         class="bg-white rounded-2xl border border-gray-6 shadow-2xl max-w-lg w-full overflow-hidden transform transition-all">
        
        <form :action="modalMode === 'create' ? '{{ route('dashboard.users.store') }}' : '/dashboard/users/' + modalUser.id" 
              method="POST" class="p-6 space-y-5">
            @csrf
            <template x-if="modalMode === 'edit'">
                <input type="hidden" name="_method" value="PUT">
            </template>

            <!-- Header Modal -->
            <div class="flex items-center justify-between border-b border-gray-5 pb-3.5">
                <div>
                    <h3 class="font-display font-bold text-lg text-gray-12 tracking-tight" 
                        x-text="modalMode === 'create' ? 'Tambah' : 'Edit Data'"></h3>
                    <p class="text-xs text-gray-11 mt-0.5">Kelola akun dan hak akses guru, siswa, dan admin institusi.</p>
                </div>
                <button type="button" @click="showModal = false" class="text-gray-9 hover:text-gray-12 p-1.5 rounded-xl hover:bg-gray-3 transition-colors">
                    <x-radix-icon name="cross-1" class="w-4 h-4" />
                </button>
            </div>

            <!-- Pilihan Jenis Anggota (Guru / Siswa / Admin) -->
            <div class="space-y-1.5">
                <label class="block text-xs font-bold text-gray-11 uppercase tracking-wider">
                    Pilih Peran / Jenis Anggota <span class="text-red-9">*</span>
                </label>
                <div class="grid grid-cols-3 gap-2.5">
                    <!-- Opsi Guru -->
                    <button type="button" 
                            @click="modalUser.role = 'T'"
                            :class="modalUser.role === 'T' ? 'bg-blue-3 border-blue-7 text-blue-11 font-bold shadow-xs ring-2 ring-blue-7/30' : 'bg-gray-2 border-gray-6 text-gray-11 hover:bg-gray-3 hover:text-gray-12 font-medium'"
                            class="py-3 px-3 rounded-xl border text-xs flex flex-col items-center gap-1.5 transition-all cursor-pointer">
                        <span class="text-xl">🎓</span>
                        <span class="font-bold">Guru / Pengawas</span>
                    </button>

                    <!-- Opsi Siswa -->
                    <button type="button" 
                            @click="modalUser.role = 'U'"
                            :class="modalUser.role === 'U' ? 'bg-amber-3 border-amber-7 text-amber-11 font-bold shadow-xs ring-2 ring-amber-7/30' : 'bg-gray-2 border-gray-6 text-gray-11 hover:bg-gray-3 hover:text-gray-12 font-medium'"
                            class="py-3 px-3 rounded-xl border text-xs flex flex-col items-center gap-1.5 transition-all cursor-pointer">
                        <span class="text-xl">🎒</span>
                        <span class="font-bold">Siswa / Murid</span>
                    </button>

                    <!-- Opsi Admin -->
                    <button type="button" 
                            @click="modalUser.role = 'A'"
                            :class="modalUser.role === 'A' ? 'bg-red-3 border-red-7 text-red-11 font-bold shadow-xs ring-2 ring-red-7/30' : 'bg-gray-2 border-gray-6 text-gray-11 hover:bg-gray-3 hover:text-gray-12 font-medium'"
                            class="py-3 px-3 rounded-xl border text-xs flex flex-col items-center gap-1.5 transition-all cursor-pointer">
                        <span class="text-xl">🛡️</span>
                        <span class="font-bold">Administrator</span>
                    </button>
                </div>
                <input type="hidden" name="role" :value="modalUser.role">
            </div>

            <!-- Nama Lengkap -->
            <div class="space-y-1">
                <label for="modal_user_name" class="block text-xs font-semibold text-gray-12">
                    Nama Lengkap <span class="text-red-9">*</span>
                </label>
                <input type="text" id="modal_user_name" name="name" x-model="modalUser.name" required
                       placeholder="Contoh: Muhammad Ihsan, S.Pd"
                       class="w-full rounded-xl border border-gray-7 bg-white px-3.5 py-2.5 text-xs text-gray-12 placeholder:text-gray-8 transition-colors focus:border-green-8 focus:ring-1 focus:ring-green-8 outline-none">
            </div>

            <!-- Email Login -->
            <div class="space-y-1">
                <label for="modal_user_email" class="block text-xs font-semibold text-gray-12">
                    Alamat Email Akun <span class="text-red-9">*</span>
                </label>
                <input type="email" id="modal_user_email" name="email" x-model="modalUser.email" required
                       placeholder="email@sekolah.sch.id"
                       class="w-full rounded-xl border border-gray-7 bg-white px-3.5 py-2.5 text-xs text-gray-12 placeholder:text-gray-8 transition-colors focus:border-green-8 focus:ring-1 focus:ring-green-8 outline-none">
            </div>

            <!-- Kontak WhatsApp -->
            <div class="space-y-1">
                <label for="modal_user_wa" class="block text-xs font-semibold text-gray-12">
                    Nomor Kontak WhatsApp (Opsional)
                </label>
                <input type="text" id="modal_user_wa" name="whatsapp_number" x-model="modalUser.whatsapp_number"
                       placeholder="Contoh: 081234567890"
                       class="w-full rounded-xl border border-gray-7 bg-white px-3.5 py-2.5 text-xs text-gray-12 placeholder:text-gray-8 transition-colors focus:border-green-8 focus:ring-1 focus:ring-green-8 outline-none font-mono">
            </div>

            <!-- Pilihan Tenant / Institusi -->
            @if($tenants->count() > 1)
                <div class="space-y-1">
                    <label for="modal_user_tenant" class="block text-xs font-semibold text-gray-12">
                        Pilih Institusi / Cabang <span class="text-red-9">*</span>
                    </label>
                    <select id="modal_user_tenant" name="tenant_id" x-model="modalUser.tenant_id" required
                            class="w-full rounded-xl border border-gray-7 bg-white px-3 py-2.5 text-xs text-gray-12 transition-colors focus:border-green-8 focus:ring-1 focus:ring-green-8 outline-none cursor-pointer">
                        @foreach($tenants as $tn)
                            <option value="{{ $tn->id }}">{{ $tn->name }} ({{ $tn->subdomain }})</option>
                        @endforeach
                    </select>
                </div>
            @elseif($currentTenant)
                <input type="hidden" name="tenant_id" value="{{ $currentTenant->id }}">
            @elseif($tenants->isNotEmpty())
                <input type="hidden" name="tenant_id" value="{{ $tenants->first()->id }}">
            @endif

            <!-- Notifikasi Password Default -->
            <template x-if="modalMode === 'create'">
                <div class="bg-blue-2 border border-blue-6 text-blue-11 rounded-xl p-3 text-xs leading-relaxed flex items-center gap-2">
                    <x-radix-icon name="info-circled" class="w-4 h-4 text-blue-9 shrink-0" />
                    <span>Password default otomatis disetel ke: <strong class="font-mono text-blue-12">Masuk123!</strong></span>
                </div>
            </template>

            <!-- Tombol Submit & Batal -->
            <div class="flex items-center justify-end gap-2.5 pt-4 border-t border-gray-5">
                <button type="button" @click="showModal = false"
                        class="px-4 py-2.5 rounded-xl border border-gray-6 text-gray-11 hover:bg-gray-2 text-xs font-semibold transition-colors cursor-pointer">
                    Batal
                </button>
                <button type="submit"
                        class="px-5 py-2.5 rounded-xl bg-green-9 hover:bg-green-10 active:bg-green-11 text-white text-xs font-bold transition-all shadow-xs flex items-center gap-2 cursor-pointer active:scale-95">
                    <x-radix-icon name="check" class="w-4 h-4" />
                    <span x-text="modalMode === 'create' ? 'Simpan' : 'Perbarui Data'"></span>
                </button>
            </div>
        </form>
    </div>
</div>

<!-- ========================================================================= -->
<!-- MODAL 2: DETAIL PENGGUNA                                                  -->
<!-- ========================================================================= -->
<div x-show="showDetailModal" 
     x-transition:enter="transition ease-out duration-300"
     x-transition:enter-start="opacity-0"
     x-transition:enter-end="opacity-100"
     x-transition:leave="transition ease-in duration-200"
     x-transition:leave-start="opacity-100"
     x-transition:leave-end="opacity-0"
     class="fixed inset-0 z-50 overflow-y-auto bg-black/60 backdrop-blur-xs flex items-center justify-center p-4"
     style="display: none;">
    <div @click.away="showDetailModal = false"
         class="bg-white rounded-2xl border border-gray-6 shadow-2xl max-w-md w-full overflow-hidden p-6 space-y-5 transform transition-all">
        
        <!-- Header Detail -->
        <div class="flex items-center justify-between border-b border-gray-5 pb-3">
            <h3 class="font-display font-bold text-base text-gray-12">Detail Anggota Institusi</h3>
            <button type="button" @click="showDetailModal = false" class="text-gray-9 hover:text-gray-12 p-1.5 rounded-xl hover:bg-gray-3 transition-colors">
                <x-radix-icon name="cross-1" class="w-4 h-4" />
            </button>
        </div>

        <div class="space-y-4">
            <!-- Avatar & Profil Utama -->
            <div class="flex items-center gap-3.5">
                <div class="w-12 h-12 rounded-2xl bg-green-3 text-green-11 font-extrabold flex items-center justify-center text-base border border-green-6 shrink-0 shadow-xs">
                    <span x-text="detailUser.name ? detailUser.name.substring(0, 2).toUpperCase() : 'US'"></span>
                </div>
                <div>
                    <h4 class="font-bold text-sm text-gray-12" x-text="detailUser.name"></h4>
                    <p class="text-xs text-gray-10 font-mono" x-text="detailUser.email"></p>
                </div>
            </div>

            <!-- List Informasi Lengkap -->
            <div class="bg-gray-2/60 rounded-xl border border-gray-5 p-4 space-y-3 text-xs">
                <div class="flex items-center justify-between">
                    <span class="text-gray-11 font-medium">Peran / Hak Akses:</span>
                    <span class="font-bold px-2.5 py-0.5 rounded-full bg-blue-3 text-blue-11 border border-blue-6/60" x-text="detailUser.role_label"></span>
                </div>
                <div class="flex items-center justify-between">
                    <span class="text-gray-11 font-medium">Institusi Tertaut:</span>
                    <span class="font-bold text-gray-12" x-text="detailUser.tenant_name"></span>
                </div>
                <div class="flex items-center justify-between">
                    <span class="text-gray-11 font-medium">Username:</span>
                    <span class="font-mono text-gray-12" x-text="detailUser.username || '-'"></span>
                </div>
                <div class="flex items-center justify-between">
                    <span class="text-gray-11 font-medium">Kontak WhatsApp:</span>
                    <span class="font-mono text-gray-12" x-text="detailUser.whatsapp_number || '-'"></span>
                </div>
                <div class="flex items-center justify-between">
                    <span class="text-gray-11 font-medium">Terdaftar Sejak:</span>
                    <span class="text-gray-12" x-text="detailUser.created_at"></span>
                </div>
            </div>
        </div>

        <!-- Tombol Tutup -->
        <div class="flex justify-end pt-2 border-t border-gray-5">
            <button type="button" @click="showDetailModal = false"
                    class="px-4 py-2 rounded-xl bg-gray-3 hover:bg-gray-4 text-gray-12 text-xs font-semibold transition-colors cursor-pointer">
                Tutup
            </button>
        </div>
    </div>
</div>
