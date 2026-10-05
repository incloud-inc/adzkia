<x-layouts.app>
    @if(isset($isOwner) && $isOwner)
        <!-- ================================================================= -->
        <!--                   OWNER / SUPER USER DASHBOARD                    -->
        <!-- ================================================================= -->
        <div class="space-y-6" x-data="{
            activeTab: 'tenants',
            showModal: false,
            modalMode: 'create',
            addType: 'single',
            modalUser: { id: null, name: '', email: '', role: 'T', whatsapp_number: '', tenant_id: '{{ $tenants->first()?->id ?? '' }}' },
            showDetailModal: false,
            detailUser: {},
            openCreateModal(defaultRole = 'T') {
                this.modalMode = 'create';
                this.addType = 'single';
                this.modalUser = { id: null, name: '', email: '', role: defaultRole, whatsapp_number: '', tenant_id: '{{ $tenants->first()?->id ?? '' }}' };
                this.showModal = true;
            },
            async openEditModal(userId) {
                try {
                    const res = await fetch('/dashboard/users/' + userId, { headers: { 'Accept': 'application/json' } });
                    const data = await res.json();
                    this.modalMode = 'edit';
                    this.modalUser = {
                        id: data.id,
                        name: data.name,
                        email: data.email,
                        role: data.role,
                        whatsapp_number: data.whatsapp_number === '-' ? '' : data.whatsapp_number,
                        tenant_id: '{{ $tenants->first()?->id ?? '' }}'
                    };
                    this.showModal = true;
                } catch(e) {
                    alert('Gagal memuat data anggota.');
                }
            },
            async openDetailModal(userId) {
                try {
                    const res = await fetch('/dashboard/users/' + userId, { headers: { 'Accept': 'application/json' } });
                    this.detailUser = await res.json();
                    this.showDetailModal = true;
                } catch(e) {
                    alert('Gagal memuat detail anggota.');
                }
            }
        }">
            <!-- Header Title -->
            <header class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                <div>
                    <div class="flex items-center gap-2.5">
                        <h1 class="font-display font-bold text-2xl sm:text-3xl text-gray-12 tracking-tight">Dashboard Pemilik ADZKIA</h1>
                        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold bg-amber-3 text-amber-11 border border-amber-6/60 shadow-xs">
                            <x-radix-icon name="star-filled" class="w-3.5 h-3.5 text-amber-9" />
                            <span>Super User</span>
                        </span>
                    </div>
                    <p class="font-sans text-sm text-gray-11 mt-1">Pusat kendali ekosistem seluruh institusi, tenaga pendidik, dan siswa terdaftar.</p>
                </div>

                <div class="flex flex-wrap items-center gap-2.5">
                    @if(auth()->user()->current_tenant_id)
                        <form method="POST" action="{{ route('tenant.switch', 'global') }}" class="m-0">
                            @csrf
                            <button type="submit" class="px-4 py-2.5 rounded-xl border border-gray-6 bg-white text-gray-12 hover:bg-gray-2 hover:border-gray-7 active:scale-[0.98] text-xs font-semibold flex items-center gap-2 transition-all duration-200 cursor-pointer shadow-xs">
                                <x-radix-icon name="globe" class="w-4 h-4 text-green-9" />
                                <span>Kembali ke Mode Global</span>
                            </button>
                        </form>
                    @endif

                    <button type="button" @click="openCreateModal('T')" 
                            class="px-4 py-2.5 rounded-xl bg-green-9 hover:bg-green-10 active:bg-green-11 text-white text-xs sm:text-sm font-bold transition-all shadow-[0_1px_2px_rgba(0,0,0,0.06)] flex items-center gap-2 active:scale-[0.98] cursor-pointer">
                        <x-radix-icon name="plus" class="w-4 h-4" />
                        <span>Tambah</span>
                    </button>
                </div>
            </header>


            <!-- Quick Stats Cards (4 Radix Metrics) - Swipeable Snap Carousel on Mobile -->
            <section class="flex overflow-x-auto sm:grid sm:grid-cols-2 lg:grid-cols-4 gap-3.5 pb-2 -mx-4 px-4 sm:mx-0 sm:px-0 hide-scrollbar snap-x snap-mandatory touch-pan-x">
                <!-- Total Tenant -->
                <article class="min-w-[250px] xs:min-w-[270px] sm:min-w-0 snap-start shrink-0 sm:shrink flex-1 sm:flex-initial bg-white p-5 rounded-2xl border border-gray-6 shadow-xs hover:border-green-7 hover:-translate-y-0.5 hover:shadow-md active:translate-y-0 active:scale-[0.99] transition-all duration-200 flex flex-col justify-between">
                    <div class="flex items-center justify-between mb-3">
                        <span class="font-sans text-xs font-semibold text-gray-11 uppercase tracking-wider">Total Tenant</span>
                        <div class="w-10 h-10 rounded-xl bg-green-3 text-green-11 flex items-center justify-center shadow-xs">
                            <x-radix-icon name="backpack" class="w-5 h-5" />
                        </div>
                    </div>
                    <div class="flex items-baseline justify-between">
                        <span class="font-display font-black text-3xl text-gray-12 tracking-tight">{{ $stats['total_tenants'] ?? 0 }}</span>
                        <span class="text-xs font-semibold text-green-11 bg-green-3 border border-green-6/60 px-2.5 py-0.5 rounded-full">Sekolah &amp; Bimbel</span>
                    </div>
                </article>

                <!-- Total Guru -->
                <article class="min-w-[250px] xs:min-w-[270px] sm:min-w-0 snap-start shrink-0 sm:shrink flex-1 sm:flex-initial bg-white p-5 rounded-2xl border border-gray-6 shadow-xs hover:border-blue-7 hover:-translate-y-0.5 hover:shadow-md active:translate-y-0 active:scale-[0.99] transition-all duration-200 flex flex-col justify-between">
                    <div class="flex items-center justify-between mb-3">
                        <span class="font-sans text-xs font-semibold text-gray-11 uppercase tracking-wider">Total Guru</span>
                        <div class="w-10 h-10 rounded-xl bg-blue-3 text-blue-11 flex items-center justify-center shadow-xs">
                            <x-radix-icon name="person" class="w-5 h-5" />
                        </div>
                    </div>
                    <div class="flex items-baseline justify-between">
                        <span class="font-display font-black text-3xl text-gray-12 tracking-tight">{{ $stats['total_teachers'] ?? 0 }}</span>
                        <span class="text-xs font-semibold text-blue-11 bg-blue-3 border border-blue-6/60 px-2.5 py-0.5 rounded-full">Tenaga Pendidik</span>
                    </div>
                </article>

                <!-- Total Murid -->
                <article class="min-w-[250px] xs:min-w-[270px] sm:min-w-0 snap-start shrink-0 sm:shrink flex-1 sm:flex-initial bg-white p-5 rounded-2xl border border-gray-6 shadow-xs hover:border-amber-7 hover:-translate-y-0.5 hover:shadow-md active:translate-y-0 active:scale-[0.99] transition-all duration-200 flex flex-col justify-between">
                    <div class="flex items-center justify-between mb-3">
                        <span class="font-sans text-xs font-semibold text-gray-11 uppercase tracking-wider">Total Siswa</span>
                        <div class="w-10 h-10 rounded-xl bg-amber-3 text-amber-11 flex items-center justify-center shadow-xs">
                            <x-radix-icon name="avatar" class="w-5 h-5" />
                        </div>
                    </div>
                    <div class="flex items-baseline justify-between">
                        <span class="font-display font-black text-3xl text-gray-12 tracking-tight">{{ $stats['total_students'] ?? 0 }}</span>
                        <span class="text-xs font-semibold text-amber-11 bg-amber-3 border border-amber-6/60 px-2.5 py-0.5 rounded-full">Siswa Terdaftar</span>
                    </div>
                </article>

                <!-- Total Admin Tenant -->
                <article class="min-w-[250px] xs:min-w-[270px] sm:min-w-0 snap-start shrink-0 sm:shrink flex-1 sm:flex-initial bg-white p-5 rounded-2xl border border-gray-6 shadow-xs hover:border-red-7 hover:-translate-y-0.5 hover:shadow-md active:translate-y-0 active:scale-[0.99] transition-all duration-200 flex flex-col justify-between">
                    <div class="flex items-center justify-between mb-3">
                        <span class="font-sans text-xs font-semibold text-gray-11 uppercase tracking-wider">Admin Cabang</span>
                        <div class="w-10 h-10 rounded-xl bg-red-3 text-red-11 flex items-center justify-center shadow-xs">
                            <x-radix-icon name="badge" class="w-5 h-5" />
                        </div>
                    </div>
                    <div class="flex items-baseline justify-between">
                        <span class="font-display font-black text-3xl text-gray-12 tracking-tight">{{ $stats['total_admins'] ?? 0 }}</span>
                        <span class="text-xs font-semibold text-red-11 bg-red-3 border border-red-6/60 px-2.5 py-0.5 rounded-full">Pengelola Cabang</span>
                    </div>
                </article>
            </section>

            <!-- Tab Navigation & Data Table Card -->
            <section class="space-y-4">
                <nav class="flex items-center gap-2 border-b border-gray-6 pb-2 overflow-x-auto hide-scrollbar -mx-4 px-4 sm:mx-0 sm:px-0 touch-pan-x">
                    <button 
                        @click="activeTab = 'tenants'"
                        :class="activeTab === 'tenants' ? 'bg-green-3 text-green-11 border-green-7 font-bold shadow-xs' : 'text-gray-11 hover:bg-gray-2 hover:text-gray-12 font-medium border-transparent'"
                        class="px-4 py-2.5 rounded-xl text-xs sm:text-sm border transition-all duration-200 flex items-center gap-2 shrink-0 cursor-pointer active:scale-[0.98]"
                    >
                        <x-radix-icon name="backpack" class="w-4 h-4 text-green-9" />
                        <span>Data Tenant ({{ $tenants->count() }})</span>
                    </button>
                    <button 
                        @click="activeTab = 'teachers'"
                        :class="activeTab === 'teachers' ? 'bg-blue-3 text-blue-11 border-blue-7 font-bold shadow-xs' : 'text-gray-11 hover:bg-gray-2 hover:text-gray-12 font-medium border-transparent'"
                        class="px-4 py-2.5 rounded-xl text-xs sm:text-sm border transition-all duration-200 flex items-center gap-2 shrink-0 cursor-pointer active:scale-[0.98]"
                    >
                        <x-radix-icon name="person" class="w-4 h-4 text-blue-9" />
                        <span>Data Guru ({{ $teachers->count() }})</span>
                    </button>
                    <button 
                        @click="activeTab = 'students'"
                        :class="activeTab === 'students' ? 'bg-amber-3 text-amber-11 border-amber-7 font-bold shadow-xs' : 'text-gray-11 hover:bg-gray-2 hover:text-gray-12 font-medium border-transparent'"
                        class="px-4 py-2.5 rounded-xl text-xs sm:text-sm border transition-all duration-200 flex items-center gap-2 shrink-0 cursor-pointer active:scale-[0.98]"
                    >
                        <x-radix-icon name="avatar" class="w-4 h-4 text-amber-9" />
                        <span>Data Siswa ({{ $students->count() }})</span>
                    </button>
                    <button 
                        @click="activeTab = 'admins'"
                        :class="activeTab === 'admins' ? 'bg-red-3 text-red-11 border-red-7 font-bold shadow-xs' : 'text-gray-11 hover:bg-gray-2 hover:text-gray-12 font-medium border-transparent'"
                        class="px-4 py-2.5 rounded-xl text-xs sm:text-sm border transition-all duration-200 flex items-center gap-2 shrink-0 cursor-pointer active:scale-[0.98]"
                    >
                        <x-radix-icon name="badge" class="w-4 h-4 text-red-9" />
                        <span>Admin Cabang ({{ $admins->count() }})</span>
                    </button>
                </nav>

                <!-- Table Card Container -->
                <div class="bg-white border border-gray-6 rounded-2xl shadow-xs overflow-hidden">
                    <!-- Tab: Tenants -->
                    <div x-show="activeTab === 'tenants'" class="overflow-x-auto touch-pan-x hide-scrollbar">
                        <!-- Mobile Swipe Hint for Table -->
                        <div class="sm:hidden px-4 py-2 bg-gray-2/60 border-b border-gray-5 flex items-center gap-1.5 text-[11px] text-gray-11 font-medium">
                            <x-radix-icon name="arrow-right" class="w-3.5 h-3.5 text-green-9 animate-pulse shrink-0" />
                            <span>Geser tabel ke samping untuk melihat kolom lengkap</span>
                        </div>
                        <table class="w-full text-left border-collapse text-xs min-w-[640px] sm:min-w-full">
                            <thead>
                                <tr class="border-b border-gray-6 bg-gray-2/60 text-gray-11 uppercase tracking-wider font-semibold whitespace-nowrap">
                                    <th class="py-3.5 px-5">Nama Tenant</th>
                                    <th class="py-3.5 px-4">Subdomain</th>
                                    <th class="py-3.5 px-4 text-center">Guru</th>
                                    <th class="py-3.5 px-4 text-center">Murid</th>
                                    <th class="py-3.5 px-4">Paket</th>
                                    <th class="py-3.5 px-5 text-right">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-5">
                                @forelse($tenants as $t)
                                    <tr class="hover:bg-gray-2/50 transition-colors">
                                        <td class="py-3.5 px-5 font-semibold text-gray-12 whitespace-nowrap">
                                            <a href="{{ route('tenants.show', $t) }}" class="hover:text-green-11 transition-colors flex items-center gap-2">
                                                <span class="w-2 h-2 rounded-full bg-green-9 shrink-0"></span>
                                                <span>{{ $t->name }}</span>
                                            </a>
                                        </td>
                                        <td class="py-3.5 px-4 font-mono text-gray-11 whitespace-nowrap">{{ $t->subdomain }}.{{ config('app.url_base_domain', 'localhost') }}</td>
                                        <td class="py-3.5 px-4 text-center whitespace-nowrap">
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full font-semibold text-blue-11 bg-blue-3 border border-blue-6/60">
                                                {{ $t->teachers_count }} guru
                                            </span>
                                        </td>
                                        <td class="py-3.5 px-4 text-center whitespace-nowrap">
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full font-semibold text-amber-11 bg-amber-3 border border-amber-6/60">
                                                {{ $t->students_count }} siswa
                                            </span>
                                        </td>
                                        <td class="py-3.5 px-4 whitespace-nowrap">
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full font-bold text-green-11 bg-green-3 border border-green-6/60 uppercase text-[10px]">
                                                {{ $t->plan ?? 'Gratis' }}
                                            </span>
                                        </td>
                                        <td class="py-3.5 px-5 text-right whitespace-nowrap">
                                            <div class="flex items-center justify-end gap-2">
                                                <a href="{{ route('tenants.branding.edit', $t) }}" class="px-3 py-1.5 rounded-lg text-xs font-semibold bg-gray-2 hover:bg-gray-3 text-gray-12 border border-gray-6 transition-all duration-200 active:scale-95 flex items-center gap-1.5">
                                                    <x-radix-icon name="image" class="w-3.5 h-3.5 text-gray-11" />
                                                    <span>Branding</span>
                                                </a>
                                                <a href="{{ route('tenants.show', $t) }}" class="px-3 py-1.5 rounded-lg text-xs font-semibold bg-blue-3 hover:bg-blue-4 text-blue-11 border border-blue-6/60 transition-all duration-200 active:scale-95 flex items-center gap-1">
                                                    <span>Detail</span>
                                                    <x-radix-icon name="arrow-right" class="w-3.5 h-3.5" />
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="py-12 text-center text-gray-11">Belum ada tenant yang terdaftar.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- Tab: Teachers -->
                    <div x-show="activeTab === 'teachers'" style="display: none;" class="overflow-x-auto touch-pan-x hide-scrollbar">
                        <!-- Mobile Swipe Hint -->
                        <div class="sm:hidden px-4 py-2 bg-gray-2/60 border-b border-gray-5 flex items-center gap-1.5 text-[11px] text-gray-11 font-medium">
                            <x-radix-icon name="arrow-right" class="w-3.5 h-3.5 text-blue-9 animate-pulse shrink-0" />
                            <span>Geser tabel ke samping untuk melihat kolom lengkap</span>
                        </div>
                        <table class="w-full text-left border-collapse text-xs min-w-[580px] sm:min-w-full">
                            <thead>
                                <tr class="border-b border-gray-6 bg-gray-2/60 text-gray-11 uppercase tracking-wider font-semibold whitespace-nowrap">
                                    <th class="py-3.5 px-5">Nama Guru</th>
                                    <th class="py-3.5 px-4">Email</th>
                                    <th class="py-3.5 px-4">Institusi</th>
                                    <th class="py-3.5 px-5 text-right">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-5">
                                @forelse($teachers as $tch)
                                    <tr class="hover:bg-gray-2/50 transition-colors">
                                        <td class="py-3.5 px-5 font-semibold text-gray-12 whitespace-nowrap">{{ $tch->name }}</td>
                                        <td class="py-3.5 px-4 font-mono text-gray-11 whitespace-nowrap">{{ $tch->email }}</td>
                                        <td class="py-3.5 px-4 whitespace-nowrap">
                                            <div class="flex flex-wrap gap-1.5">
                                                @foreach($tch->tenants as $t)
                                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full font-medium text-blue-11 bg-blue-3 border border-blue-6/60 text-[10px]">
                                                        {{ $t->name }}
                                                    </span>
                                                @endforeach
                                            </div>
                                        </td>
                                        <td class="py-3.5 px-5 text-right whitespace-nowrap">
                                            <div class="flex items-center justify-end gap-1.5">
                                                <button type="button" @click="openDetailModal({{ $tch->id }})" 
                                                        class="px-2.5 py-1 rounded-lg text-xs font-semibold bg-gray-3 hover:bg-gray-4 text-gray-12 transition-colors cursor-pointer">
                                                    Detail
                                                </button>
                                                <button type="button" @click="openEditModal({{ $tch->id }})" 
                                                        class="px-2.5 py-1 rounded-lg text-xs font-semibold bg-blue-3 hover:bg-blue-4 text-blue-11 transition-colors cursor-pointer">
                                                    Edit
                                                </button>
                                                <form method="POST" action="{{ route('dashboard.users.destroy', $tch->id) }}" class="m-0 inline-block" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data anggota {{ addslashes($tch->name) }}?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" 
                                                            class="px-2.5 py-1 rounded-lg text-xs font-semibold bg-red-3 hover:bg-red-4 text-red-11 transition-colors cursor-pointer">
                                                        Hapus
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="py-12 text-center text-gray-11">Belum ada data guru.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- Tab: Students -->
                    <div x-show="activeTab === 'students'" style="display: none;" class="overflow-x-auto touch-pan-x hide-scrollbar">
                        <!-- Mobile Swipe Hint -->
                        <div class="sm:hidden px-4 py-2 bg-gray-2/60 border-b border-gray-5 flex items-center gap-1.5 text-[11px] text-gray-11 font-medium">
                            <x-radix-icon name="arrow-right" class="w-3.5 h-3.5 text-amber-9 animate-pulse shrink-0" />
                            <span>Geser tabel ke samping untuk melihat kolom lengkap</span>
                        </div>
                        <table class="w-full text-left border-collapse text-xs min-w-[580px] sm:min-w-full">
                            <thead>
                                <tr class="border-b border-gray-6 bg-gray-2/60 text-gray-11 uppercase tracking-wider font-semibold whitespace-nowrap">
                                    <th class="py-3.5 px-5">Nama Siswa</th>
                                    <th class="py-3.5 px-4">Email</th>
                                    <th class="py-3.5 px-4">Institusi</th>
                                    <th class="py-3.5 px-5 text-right">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-5">
                                @forelse($students as $stu)
                                    <tr class="hover:bg-gray-2/50 transition-colors">
                                        <td class="py-3.5 px-5 font-semibold text-gray-12 whitespace-nowrap">{{ $stu->name }}</td>
                                        <td class="py-3.5 px-4 font-mono text-gray-11 whitespace-nowrap">{{ $stu->email }}</td>
                                        <td class="py-3.5 px-4 whitespace-nowrap">
                                            <div class="flex flex-wrap gap-1.5">
                                                @foreach($stu->tenants as $t)
                                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full font-medium text-amber-11 bg-amber-3 border border-amber-6/60 text-[10px]">
                                                        {{ $t->name }}
                                                    </span>
                                                @endforeach
                                            </div>
                                        </td>
                                        <td class="py-3.5 px-5 text-right whitespace-nowrap">
                                            <div class="flex items-center justify-end gap-1.5">
                                                <button type="button" @click="openDetailModal({{ $stu->id }})" 
                                                        class="px-2.5 py-1 rounded-lg text-xs font-semibold bg-gray-3 hover:bg-gray-4 text-gray-12 transition-colors cursor-pointer">
                                                    Detail
                                                </button>
                                                <button type="button" @click="openEditModal({{ $stu->id }})" 
                                                        class="px-2.5 py-1 rounded-lg text-xs font-semibold bg-blue-3 hover:bg-blue-4 text-blue-11 transition-colors cursor-pointer">
                                                    Edit
                                                </button>
                                                <form method="POST" action="{{ route('dashboard.users.destroy', $stu->id) }}" class="m-0 inline-block" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data siswa {{ addslashes($stu->name) }}?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" 
                                                            class="px-2.5 py-1 rounded-lg text-xs font-semibold bg-red-3 hover:bg-red-4 text-red-11 transition-colors cursor-pointer">
                                                        Hapus
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="py-12 text-center text-gray-11">Belum ada data siswa.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- Tab: Admins -->
                    <div x-show="activeTab === 'admins'" style="display: none;" class="overflow-x-auto touch-pan-x hide-scrollbar">
                        <!-- Mobile Swipe Hint -->
                        <div class="sm:hidden px-4 py-2 bg-gray-2/60 border-b border-gray-5 flex items-center gap-1.5 text-[11px] text-gray-11 font-medium">
                            <x-radix-icon name="arrow-right" class="w-3.5 h-3.5 text-red-9 animate-pulse shrink-0" />
                            <span>Geser tabel ke samping untuk melihat kolom lengkap</span>
                        </div>
                        <table class="w-full text-left border-collapse text-xs min-w-[580px] sm:min-w-full">
                            <thead>
                                <tr class="border-b border-gray-6 bg-gray-2/60 text-gray-11 uppercase tracking-wider font-semibold whitespace-nowrap">
                                    <th class="py-3.5 px-5">Nama Admin</th>
                                    <th class="py-3.5 px-4">Email</th>
                                    <th class="py-3.5 px-4">Institusi Kelolaan</th>
                                    <th class="py-3.5 px-5 text-right">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-5">
                                @forelse($admins as $adm)
                                    <tr class="hover:bg-gray-2/50 transition-colors">
                                        <td class="py-3.5 px-5 font-semibold text-gray-12 whitespace-nowrap">{{ $adm->name }}</td>
                                        <td class="py-3.5 px-4 font-mono text-gray-11 whitespace-nowrap">{{ $adm->email }}</td>
                                        <td class="py-3.5 px-4 whitespace-nowrap">
                                            <div class="flex flex-wrap gap-1.5">
                                                @foreach($adm->tenants as $t)
                                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full font-medium text-red-11 bg-red-3 border border-red-6/60 text-[10px]">
                                                        {{ $t->name }}
                                                    </span>
                                                @endforeach
                                            </div>
                                        </td>
                                        <td class="py-3.5 px-5 text-right whitespace-nowrap">
                                            <div class="flex items-center justify-end gap-1.5">
                                                <button type="button" @click="openDetailModal({{ $adm->id }})" 
                                                        class="px-2.5 py-1 rounded-lg text-xs font-semibold bg-gray-3 hover:bg-gray-4 text-gray-12 transition-colors cursor-pointer">
                                                    Detail
                                                </button>
                                                <button type="button" @click="openEditModal({{ $adm->id }})" 
                                                        class="px-2.5 py-1 rounded-lg text-xs font-semibold bg-blue-3 hover:bg-blue-4 text-blue-11 transition-colors cursor-pointer">
                                                    Edit
                                                </button>
                                                <form method="POST" action="{{ route('dashboard.users.destroy', $adm->id) }}" class="m-0 inline-block" onsubmit="return confirm('Apakah Anda yakin ingin menghapus admin {{ addslashes($adm->name) }}?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" 
                                                            class="px-2.5 py-1 rounded-lg text-xs font-semibold bg-red-3 hover:bg-red-4 text-red-11 transition-colors cursor-pointer">
                                                        Hapus
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="py-12 text-center text-gray-11">Belum ada data admin cabang.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>

            <!-- Modals CRUD untuk Guru, Siswa, Admin -->
            <x-dashboard-user-modals :tenants="$tenants" />
        </div>

    @elseif(isset($role) && $role === 'student')
        <!-- ================================================================= -->
        <!--                   SISI MURID / SISWA DASHBOARD                    -->
        <!-- ================================================================= -->
        @php
            $user = auth()->user();
            $baseDomain = config('app.url_base_domain', 'localhost');
            $portalUrl = $tenant ? 'http://' . $tenant->subdomain . '.' . $baseDomain . (request()->getPort() && request()->getPort() != 80 ? ':'.request()->getPort() : '') : '#';
        @endphp

        <div class="space-y-6">
            <!-- Hero Welcome Card Siswa (Radix Blue Premium Surface) -->
            <header class="bg-gradient-to-r from-blue-10 via-blue-9 to-indigo-10 rounded-2xl p-6 sm:p-8 text-white shadow-lg shadow-blue-12/10 relative overflow-hidden">
                <div class="absolute -right-12 -bottom-12 w-64 h-64 bg-white/10 rounded-full blur-2xl pointer-events-none"></div>

                <div class="relative z-10 flex flex-col sm:flex-row sm:items-center justify-between gap-6">
                    <div class="flex items-center gap-4 sm:gap-5">
                        <img src="{{ $user->profile_photo_url }}" alt="{{ $user->name }}" class="w-16 h-16 sm:w-20 sm:h-20 rounded-2xl border-2 border-white/90 object-cover shadow-md bg-white/20">
                        <div>
                            <div class="flex items-center gap-2 mb-1.5 flex-wrap">
                                <span class="px-3 py-0.5 rounded-full text-xs font-bold bg-white/20 text-white backdrop-blur-md border border-white/30">
                                    SISWA TERDAFTAR
                                </span>
                                @if($tenant)
                                    <span class="text-xs text-blue-2 font-medium flex items-center gap-1">
                                        • {{ $tenant->name }}
                                    </span>
                                @endif
                            </div>
                            <h1 class="font-display font-black text-2xl sm:text-3xl text-white tracking-tight">
                                Halo, {{ $user->name }}!
                            </h1>
                            <p class="font-sans text-blue-2 text-sm mt-1 max-w-xl line-clamp-1">
                                {{ $user->bio ?: 'Selamat datang di portal pembelajaran dan evaluasi belajar mandiri Anda.' }}
                            </p>
                        </div>
                    </div>

                    <!-- Quick Action Buttons (Tersusun Rapi & Horizontal) -->
                    <div class="flex flex-wrap items-center gap-2.5 shrink-0">
                        @if($user->username)
                            <a href="{{ route('global.student.profile', $user->username) }}" target="_blank" class="px-3.5 py-2 rounded-xl bg-white text-blue-11 hover:bg-blue-2 active:scale-[0.98] text-xs font-bold transition-all duration-200 shadow-sm text-center flex items-center justify-center gap-1.5 hover:shadow">
                                <x-radix-icon name="avatar" class="w-4 h-4 text-blue-9" />
                                <span>Lihat Profil Publik</span>
                            </a>
                        @endif
                        <a href="{{ route('profile.edit') }}" class="px-3.5 py-2 rounded-xl bg-white text-blue-11 hover:bg-blue-2 active:scale-[0.98] text-xs font-bold transition-all duration-200 shadow-sm text-center flex items-center justify-center gap-1.5 hover:shadow">
                            <x-radix-icon name="pencil1" class="w-4 h-4 text-blue-9" />
                            <span>Edit Profil &amp; Foto</span>
                        </a>
                        @if($tenant)
                            <a href="{{ $portalUrl }}" target="_blank" class="px-3.5 py-2 rounded-xl bg-white text-blue-11 hover:bg-blue-2 active:scale-[0.98] text-xs font-bold transition-all duration-200 shadow-sm text-center flex items-center justify-center gap-1.5 hover:shadow">
                                <x-radix-icon name="globe" class="w-4 h-4 text-blue-9" />
                                <span>Portal Sekolah ↗</span>
                            </a>
                        @endif
                    </div>
                </div>
            </header>


            <!-- Stats Ringkasan Siswa (4 Metric Cards) - Swipeable Snap Carousel on Mobile -->
            <section class="flex overflow-x-auto sm:grid grid-cols-2 sm:grid-cols-4 gap-3.5 pb-2 -mx-4 px-4 sm:mx-0 sm:px-0 hide-scrollbar snap-x snap-mandatory touch-pan-x">
                <article class="min-w-[220px] xs:min-w-[250px] sm:min-w-0 snap-start shrink-0 sm:shrink flex-1 sm:flex-initial bg-white p-5 rounded-2xl border border-gray-6 shadow-xs hover:border-blue-7 hover:-translate-y-0.5 hover:shadow-md active:translate-y-0 active:scale-[0.99] transition-all duration-200">
                    <div class="flex items-center justify-between mb-2">
                        <span class="font-sans text-xs font-semibold text-gray-11 uppercase tracking-wider">Ujian Tersedia</span>
                        <div class="w-9 h-9 rounded-xl bg-blue-3 text-blue-11 flex items-center justify-center">
                            <x-radix-icon name="file-text" class="w-4 h-4" />
                        </div>
                    </div>
                    <div class="font-display font-black text-3xl text-gray-12">{{ $totalAvailable ?? 0 }}</div>
                    <div class="font-sans text-xs text-blue-11 font-medium mt-1">Siap dikerjakan</div>
                </article>

                <article class="min-w-[220px] xs:min-w-[250px] sm:min-w-0 snap-start shrink-0 sm:shrink flex-1 sm:flex-initial bg-white p-5 rounded-2xl border border-gray-6 shadow-xs hover:border-indigo-7 hover:-translate-y-0.5 hover:shadow-md active:translate-y-0 active:scale-[0.99] transition-all duration-200">
                    <div class="flex items-center justify-between mb-2">
                        <span class="font-sans text-xs font-semibold text-gray-11 uppercase tracking-wider">Mata Pelajaran</span>
                        <div class="w-9 h-9 rounded-xl bg-indigo-3 text-indigo-11 flex items-center justify-center">
                            <x-radix-icon name="backpack" class="w-4 h-4" />
                        </div>
                    </div>
                    <div class="font-display font-black text-3xl text-gray-12">{{ $subjectsCount ?? 0 }}</div>
                    <div class="font-sans text-xs text-indigo-11 font-medium mt-1">Bidang studi aktif</div>
                </article>

                <article class="min-w-[220px] xs:min-w-[250px] sm:min-w-0 snap-start shrink-0 sm:shrink flex-1 sm:flex-initial bg-white p-5 rounded-2xl border border-gray-6 shadow-xs hover:border-green-7 hover:-translate-y-0.5 hover:shadow-md active:translate-y-0 active:scale-[0.99] transition-all duration-200">
                    <div class="flex items-center justify-between mb-2">
                        <span class="font-sans text-xs font-semibold text-gray-11 uppercase tracking-wider">Status Akun</span>
                        <div class="w-9 h-9 rounded-xl bg-green-3 text-green-11 flex items-center justify-center">
                            <x-radix-icon name="check-circled" class="w-4 h-4" />
                        </div>
                    </div>
                    <div class="font-display font-bold text-lg text-green-11 mt-1">Aktif &amp; Terverifikasi</div>
                    <div class="font-sans text-xs text-gray-11 mt-0.5">Siswa Terdaftar</div>
                </article>

                <article class="min-w-[220px] xs:min-w-[250px] sm:min-w-0 snap-start shrink-0 sm:shrink flex-1 sm:flex-initial bg-white p-5 rounded-2xl border border-gray-6 shadow-xs hover:border-amber-7 hover:-translate-y-0.5 hover:shadow-md active:translate-y-0 active:scale-[0.99] transition-all duration-200">
                    <div class="flex items-center justify-between mb-2">
                        <span class="font-sans text-xs font-semibold text-gray-11 uppercase tracking-wider">Institusi Mitra</span>
                        <div class="w-9 h-9 rounded-xl bg-amber-3 text-amber-11 flex items-center justify-center">
                            <x-radix-icon name="badge" class="w-4 h-4" />
                        </div>
                    </div>
                    <div class="font-display font-bold text-base text-gray-12 mt-1 truncate">{{ $tenant->name ?? 'Ekosistem ADZKIA' }}</div>
                    <div class="mt-1">
                        @if($tenant)
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-md text-[11px] font-bold tracking-wide uppercase {{ $tenant->isEnterprise() ? 'bg-purple-3 text-purple-11 border border-purple-6/50' : ($tenant->isPro() ? 'bg-emerald-3 text-emerald-11 border border-emerald-6/50' : 'bg-amber-3 text-amber-11 border border-amber-6/50') }}">
                                {{ $tenant->level_label }}
                            </span>
                        @else
                            <span class="inline-flex items-center px-2 py-0.5 rounded-md text-[11px] font-bold tracking-wide uppercase bg-gray-3 text-gray-11 border border-gray-6">
                                Mitra ADZKIA
                            </span>
                        @endif
                    </div>
                </article>
            </section>

            <!-- Asesmen & Ujian Siap Dikerjakan -->
            <section class="bg-white border border-gray-6 rounded-2xl p-4 sm:p-6 shadow-xs">
                <div class="flex items-center justify-between mb-5">
                    <div>
                        <h2 class="font-display font-bold text-lg text-gray-12 tracking-tight">Ujian &amp; Asesmen Siap Dikerjakan</h2>
                        <p class="font-sans text-xs text-gray-11 mt-0.5">Pilih salah satu asesmen di bawah ini untuk memulai evaluasi belajar mandiri.</p>
                    </div>
                    <a href="{{ route('assessments.index') }}" class="font-sans text-xs font-bold text-blue-11 hover:text-blue-12 hover:underline inline-flex items-center gap-1 shrink-0">
                        <span>Lihat Semua Ujian</span>
                        <x-radix-icon name="arrow-right" class="w-3.5 h-3.5" />
                    </a>
                </div>

                @if($availableAssessments && $availableAssessments->count() > 0)
                    <!-- Mobile Swipe Hint for Exam Cards -->
                    <div class="md:hidden flex items-center justify-end text-[11px] text-blue-11 font-medium pb-2 px-1">
                        <span class="flex items-center gap-1">
                            <span>Geser kartu ujian ke samping</span>
                            <x-radix-icon name="arrow-right" class="w-3 h-3 animate-pulse" />
                        </span>
                    </div>

                    <div class="flex overflow-x-auto md:grid md:grid-cols-2 lg:grid-cols-3 gap-4 pb-2 -mx-4 px-4 sm:mx-0 sm:px-0 hide-scrollbar snap-x snap-mandatory touch-pan-x md:overflow-visible">
                        @foreach($availableAssessments as $exam)
                            @php
                                $access = $exam->accesses?->first();
                                $isPurchased = !is_null($access);
                            @endphp
                            <article class="min-w-[280px] xs:min-w-[320px] md:min-w-0 snap-start shrink-0 md:shrink flex-1 p-5 rounded-2xl border transition-all duration-200 flex flex-col justify-between hover:shadow-md hover:-translate-y-0.5 active:translate-y-0 active:scale-[0.99] {{ $isPurchased ? 'border-amber-400 shadow-xs' : 'border-gray-6 bg-gray-1 hover:bg-white hover:border-blue-6' }}"
                                     style="{{ $isPurchased ? 'background-color: #ffd8a8 !important;' : '' }}">
                                <div>
                                    <div class="flex items-center justify-between gap-2 mb-2.5">
                                        <span class="px-2.5 py-0.5 rounded-full text-[10px] font-bold uppercase {{ $isPurchased ? 'bg-amber-200 text-amber-900 border border-amber-300' : 'bg-blue-3 text-blue-11 border border-blue-6/60' }}">
                                            {{ $exam->subject?->name ?? 'Umum' }}
                                        </span>
                                        @if($isPurchased)
                                            <span class="px-2 py-0.5 rounded-full text-[10px] font-extrabold bg-amber-900 text-white shadow-2xs">
                                                {{ $access->daysRemaining() }} Hari ({{ $access->availableAttempts() }}x)
                                            </span>
                                        @else
                                            <span class="text-xs text-gray-11 font-medium flex items-center gap-1">
                                                <x-radix-icon name="timer" class="w-3 h-3 text-gray-10" />
                                                <span>{{ $exam->duration_minutes }} menit</span>
                                            </span>
                                        @endif
                                    </div>
                                    <h3 class="font-display font-bold text-sm text-gray-12 line-clamp-2">
                                        {{ $exam->title }}
                                    </h3>
                                    <p class="font-sans text-xs text-gray-11 mt-1.5 line-clamp-2">
                                        {{ $exam->description ?: 'Evaluasi pemahaman terstruktur dengan CBT engine berstandar nasional.' }}
                                    </p>
                                </div>

                                <div class="mt-4 pt-3.5 border-t {{ $isPurchased ? 'border-amber-300/80' : 'border-gray-5' }} flex items-center justify-between">
                                    <span class="font-sans text-xs {{ $isPurchased ? 'text-amber-900 font-semibold' : 'text-gray-11' }}">
                                        {{ $exam->questions_count }} Butir Soal
                                    </span>
                                    <div class="flex items-center gap-2">
                                        <a href="{{ route('assessments.show', $exam) }}" class="px-2.5 py-1.5 rounded-xl border {{ $isPurchased ? 'border-amber-300 bg-amber-50 hover:bg-white text-amber-900' : 'border-gray-6 bg-white hover:bg-gray-3 text-gray-12' }} text-xs font-semibold transition-all">
                                            Detail
                                        </a>
                                        <a href="{{ route('exam.gate.show', $exam) }}" class="px-3.5 py-1.5 rounded-xl {{ $isPurchased ? 'bg-amber-900 hover:bg-black text-white' : 'bg-blue-9 hover:bg-blue-10 text-white' }} text-xs font-bold transition-all duration-200 shadow-xs active:scale-95 inline-flex items-center gap-1.5">
                                            <x-radix-icon name="pencil1" class="w-3.5 h-3.5" />
                                            <span>Mulai Ujian</span>
                                        </a>
                                    </div>
                                </div>
                            </article>
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-14 bg-gray-2/40 rounded-2xl border border-dashed border-gray-6">
                        <div class="w-12 h-12 bg-blue-3 text-blue-11 rounded-2xl flex items-center justify-center mx-auto mb-3 shadow-xs">
                            <x-radix-icon name="file-text" class="w-5 h-5" />
                        </div>
                        <h4 class="font-display font-bold text-sm text-gray-12">Belum ada ujian yang dijadwalkan</h4>
                        <p class="font-sans text-xs text-gray-11 mt-1">Ujian aktif yang diterbitkan oleh guru atau sekolah Anda akan muncul di sini.</p>
                    </div>
                @endif
            </section>
        </div>

    @elseif(isset($role) && $role === 'teacher')
        <!-- ================================================================= -->
        <!--                 SISI GURU / TENAGA PENDIDIK DASHBOARD             -->
        <!-- ================================================================= -->
        @php
            $user = auth()->user();
            $baseDomain = config('app.url_base_domain', 'localhost');
            $portalUrl = $tenant ? 'http://' . $tenant->subdomain . '.' . $baseDomain . (request()->getPort() && request()->getPort() != 80 ? ':'.request()->getPort() : '') : '#';
        @endphp

        <div class="space-y-6">
            <!-- Hero Welcome Card Guru (Radix Emerald Premium Surface) -->
            <header class="bg-gradient-to-r from-green-10 via-teal-9 to-green-10 rounded-2xl p-6 sm:p-8 text-white shadow-lg shadow-green-12/10 relative overflow-hidden">
                <div class="absolute -right-12 -bottom-12 w-64 h-64 bg-white/10 rounded-full blur-2xl pointer-events-none"></div>

                <div class="relative z-10 flex flex-col sm:flex-row sm:items-center justify-between gap-6">
                    <div class="flex items-center gap-4 sm:gap-5">
                        <img src="{{ $user->profile_photo_url }}" alt="{{ $user->name }}" class="w-16 h-16 sm:w-20 sm:h-20 rounded-2xl border-2 border-white/90 object-cover shadow-md bg-white/20">
                        <div>
                            <div class="flex items-center gap-2 mb-1.5 flex-wrap">
                                <span class="px-3 py-0.5 rounded-full text-xs font-bold bg-white/20 text-white backdrop-blur-md border border-white/30">
                                    TENAGA PENDIDIK
                                </span>
                                @if($tenant)
                                    <span class="text-xs text-green-2 font-medium flex items-center gap-1">
                                        • {{ $tenant->name }}
                                    </span>
                                @endif
                            </div>
                            <h1 class="font-display font-black text-2xl sm:text-3xl text-white tracking-tight">
                                Selamat Bertugas, {{ $user->name }}!
                            </h1>
                            <p class="font-sans text-green-2 text-sm mt-1 max-w-xl line-clamp-1">
                                {{ $user->bio ?: 'Kelola bank soal, jadwal ujian, dan pantau capaian evaluasi belajar siswa binaan Anda.' }}
                            </p>
                        </div>
                    </div>

                    <!-- Quick Action Buttons Guru -->
                    <div class="flex flex-wrap sm:flex-col gap-2.5 shrink-0">
                        @if($tenant && ! $tenant->canCreateAssessments())
                            <a href="{{ route('assessments.index') }}" class="px-4 py-2.5 rounded-xl bg-gray-12 text-white hover:bg-black active:scale-[0.98] text-xs font-semibold transition-all duration-200 shadow-xs text-center flex items-center justify-center" title="Paket Starter & Pro berfokus pada pengawasan ujian kurasi ADZKIA">
                                <span>Pengawasan Ujian ADZKIA</span>
                            </a>
                        @else
                            <a href="{{ route('assessments.wizard') }}" class="px-4 py-2.5 rounded-xl bg-white text-green-11 hover:bg-green-2 active:scale-[0.98] text-xs font-bold transition-all duration-200 shadow-xs text-center flex items-center justify-center gap-2">
                                <x-radix-icon name="plus" class="w-4 h-4 text-green-9" />
                                <span>Buat Ujian Baru (Wizard)</span>
                            </a>
                        @endif
                        <a href="{{ route('question-banks.index') }}" class="px-4 py-2.5 rounded-xl bg-white/15 hover:bg-white/25 active:scale-[0.98] text-white text-xs font-bold backdrop-blur-md border border-white/20 transition-all duration-200 text-center flex items-center justify-center gap-2">
                            <x-radix-icon name="file-text" class="w-4 h-4" />
                            <span>Kelola Bank Soal</span>
                        </a>
                        @if($user->username)
                            <a href="{{ route('global.student.profile', $user->username) }}" target="_blank" class="px-4 py-2.5 rounded-xl bg-white/10 hover:bg-white/20 active:scale-[0.98] text-green-2 text-xs font-semibold backdrop-blur-md transition-all duration-200 text-center flex items-center justify-center gap-2">
                                <x-radix-icon name="avatar" class="w-4 h-4" />
                                <span>Profil Guru (/@username) ↗</span>
                            </a>
                        @endif
                    </div>
                </div>
            </header>


            <!-- Stats Ringkasan Guru - Swipeable Snap Carousel on Mobile -->
            <section class="flex overflow-x-auto sm:grid grid-cols-2 sm:grid-cols-4 gap-3.5 pb-2 -mx-4 px-4 sm:mx-0 sm:px-0 hide-scrollbar snap-x snap-mandatory touch-pan-x">
                <article class="min-w-[220px] xs:min-w-[250px] sm:min-w-0 snap-start shrink-0 sm:shrink flex-1 sm:flex-initial bg-white p-5 rounded-2xl border border-gray-6 shadow-xs hover:border-green-7 hover:-translate-y-0.5 hover:shadow-md active:translate-y-0 active:scale-[0.99] transition-all duration-200">
                    <div class="flex items-center justify-between mb-2">
                        <span class="font-sans text-xs font-semibold text-gray-11 uppercase tracking-wider">Ujian Dibuat</span>
                        <div class="w-9 h-9 rounded-xl bg-green-3 text-green-11 flex items-center justify-center">
                            <x-radix-icon name="timer" class="w-4 h-4" />
                        </div>
                    </div>
                    <div class="font-display font-black text-3xl text-gray-12">{{ $totalMyAssessments ?? 0 }}</div>
                    <div class="font-sans text-xs text-green-11 font-medium mt-1">Asesmen binaan saya</div>
                </article>

                <article class="min-w-[220px] xs:min-w-[250px] sm:min-w-0 snap-start shrink-0 sm:shrink flex-1 sm:flex-initial bg-white p-5 rounded-2xl border border-gray-6 shadow-xs hover:border-blue-7 hover:-translate-y-0.5 hover:shadow-md active:translate-y-0 active:scale-[0.99] transition-all duration-200">
                    <div class="flex items-center justify-between mb-2">
                        <span class="font-sans text-xs font-semibold text-gray-11 uppercase tracking-wider">Bank Soal</span>
                        <div class="w-9 h-9 rounded-xl bg-blue-3 text-blue-11 flex items-center justify-center">
                            <x-radix-icon name="file-text" class="w-4 h-4" />
                        </div>
                    </div>
                    <div class="font-display font-black text-3xl text-gray-12">{{ $questionBanksCount ?? 0 }}</div>
                    <div class="font-sans text-xs text-blue-11 font-medium mt-1">Paket soal tersimpan</div>
                </article>

                <article class="min-w-[220px] xs:min-w-[250px] sm:min-w-0 snap-start shrink-0 sm:shrink flex-1 sm:flex-initial bg-white p-5 rounded-2xl border border-gray-6 shadow-xs hover:border-amber-7 hover:-translate-y-0.5 hover:shadow-md active:translate-y-0 active:scale-[0.99] transition-all duration-200">
                    <div class="flex items-center justify-between mb-2">
                        <span class="font-sans text-xs font-semibold text-gray-11 uppercase tracking-wider">Siswa Terdaftar</span>
                        <div class="w-9 h-9 rounded-xl bg-amber-3 text-amber-11 flex items-center justify-center">
                            <x-radix-icon name="avatar" class="w-4 h-4" />
                        </div>
                    </div>
                    <div class="font-display font-black text-3xl text-gray-12">{{ $studentsCount ?? 0 }}</div>
                    <div class="font-sans text-xs text-amber-11 font-medium mt-1">Peserta didik aktif</div>
                </article>

                <article class="min-w-[220px] xs:min-w-[250px] sm:min-w-0 snap-start shrink-0 sm:shrink flex-1 sm:flex-initial bg-white p-5 rounded-2xl border border-gray-6 shadow-xs hover:border-teal-7 hover:-translate-y-0.5 hover:shadow-md active:translate-y-0 active:scale-[0.99] transition-all duration-200">
                    <div class="flex items-center justify-between mb-2">
                        <span class="font-sans text-xs font-semibold text-gray-11 uppercase tracking-wider">Institusi Sekolah</span>
                        <div class="w-9 h-9 rounded-xl bg-teal-3 text-teal-11 flex items-center justify-center">
                            <x-radix-icon name="backpack" class="w-4 h-4" />
                        </div>
                    </div>
                    <div class="font-display font-bold text-base text-gray-12 mt-1 truncate">{{ $tenant->name ?? 'Sekolah Mitra' }}</div>
                    <div class="font-sans text-xs text-teal-11 font-semibold mt-0.5">Layanan Aktif</div>
                </article>
            </section>

            <!-- Asesmen Binaan Pendidik -->
            <section class="bg-white border border-gray-6 rounded-2xl p-4 sm:p-6 shadow-xs">
                <div class="flex items-center justify-between mb-5">
                    <div>
                        <h2 class="font-display font-bold text-lg text-gray-12 tracking-tight">Asesmen &amp; Ujian Binaan Saya</h2>
                        <p class="font-sans text-xs text-gray-11 mt-0.5">Daftar evaluasi yang telah Anda rancang melalui CBT Engine.</p>
                    </div>
                    @if($tenant && $tenant->canCreateAssessments())
                    <a href="{{ route('assessments.wizard') }}" class="px-4 py-2 rounded-xl bg-green-9 hover:bg-green-10 text-white text-xs font-bold transition-all duration-200 flex items-center gap-1.5 shadow-xs active:scale-95 shrink-0">
                        <x-radix-icon name="plus" class="w-4 h-4" />
                        <span>Buat Ujian</span>
                    </a>
                    @endif
                </div>

                @if($myAssessments && $myAssessments->count() > 0)
                    <div class="overflow-x-auto touch-pan-x hide-scrollbar">
                        <!-- Mobile Swipe Hint for Table -->
                        <div class="sm:hidden px-4 py-2 bg-gray-2/60 border-b border-gray-5 flex items-center gap-1.5 text-[11px] text-gray-11 font-medium">
                            <x-radix-icon name="arrow-right" class="w-3.5 h-3.5 text-green-9 animate-pulse shrink-0" />
                            <span>Geser tabel ke samping untuk melihat kolom lengkap</span>
                        </div>
                        <table class="w-full text-left border-collapse text-xs min-w-[620px] sm:min-w-full">
                            <thead>
                                <tr class="border-b border-gray-6 bg-gray-2/60 text-gray-11 uppercase tracking-wider font-semibold whitespace-nowrap">
                                    <th class="py-3 px-4">Judul Ujian</th>
                                    <th class="py-3 px-4">Mata Pelajaran</th>
                                    <th class="py-3 px-4 text-center">Durasi</th>
                                    <th class="py-3 px-4 text-center">Butir Soal</th>
                                    <th class="py-3 px-4">Status</th>
                                    <th class="py-3 px-4 text-right">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-5">
                                @foreach($myAssessments as $exam)
                                    <tr class="hover:bg-gray-2/50 transition-colors">
                                        <td class="py-3 px-4 font-semibold text-gray-12 whitespace-nowrap">
                                            <a href="{{ route('assessments.show', $exam) }}" class="hover:text-green-11 transition-colors">
                                                {{ $exam->title }}
                                            </a>
                                        </td>
                                        <td class="py-3 px-4 text-gray-11 whitespace-nowrap">{{ $exam->subject?->name ?? 'Umum' }}</td>
                                        <td class="py-3 px-4 text-center text-gray-11 font-mono whitespace-nowrap">{{ $exam->duration_minutes }} mnt</td>
                                        <td class="py-3 px-4 text-center text-gray-11 font-mono whitespace-nowrap">{{ $exam->questions_count }} soal</td>
                                        <td class="py-3 px-4 whitespace-nowrap">
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[10px] font-bold uppercase {{ $exam->status === 'published' ? 'bg-green-3 text-green-11 border border-green-6/60' : 'bg-gray-3 text-gray-11' }}">
                                                {{ $exam->status === 'published' ? 'Published' : 'Draf' }}
                                            </span>
                                        </td>
                                        <td class="py-3 px-4 text-right whitespace-nowrap">
                                            <div class="flex items-center justify-end gap-2">
                                                <a href="{{ route('assessments.result-preview', $exam) }}" class="px-3 py-1.5 rounded-lg text-xs font-semibold bg-green-3 text-green-11 hover:bg-green-4 border border-green-6/60 transition-all duration-200 active:scale-95">
                                                    Pratinjau Hasil
                                                </a>
                                                <a href="{{ route('assessments.show', $exam) }}" class="px-3 py-1.5 rounded-lg text-xs font-semibold bg-gray-2 text-gray-12 hover:bg-gray-3 border border-gray-6 transition-all duration-200 active:scale-95">
                                                    Detail
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="text-center py-14 bg-gray-2/40 rounded-2xl border border-dashed border-gray-6">
                        <div class="w-12 h-12 bg-green-3 text-green-11 rounded-2xl flex items-center justify-center mx-auto mb-3 shadow-xs">
                            <x-radix-icon name="pencil-1" class="w-5 h-5" />
                        </div>
                        <h4 class="font-display font-bold text-sm text-gray-12">Belum ada asesmen yang dibuat</h4>
                        <p class="font-sans text-xs text-gray-11 mt-1 mb-4">Mulai rancang ujian perdana Anda dengan wizard komprehensif 8 langkah.</p>
                        @if($tenant && $tenant->canCreateAssessments())
                        <a href="{{ route('assessments.wizard') }}" class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl bg-green-9 text-white text-xs font-bold hover:bg-green-10 shadow-xs transition-all duration-200 active:scale-95">
                            <x-radix-icon name="plus" class="w-4 h-4" />
                            <span>Mulai Rancang Ujian</span>
                        </a>
                        @else
                        <div class="inline-flex items-center gap-2 px-4 py-2 rounded-xl bg-amber-50 border border-amber-300 text-amber-900 text-xs font-semibold">
                            <span>🔒 Pembuatan Asesmen Mandiri Khusus Tenant Level ENTERPRISE</span>
                        </div>
                        @endif
                    </div>
                @endif
            </section>
        </div>

    @else
        <!-- ================================================================= -->
        <!--                   SISI ADMINISTRATOR TENANT DASHBOARD             -->
        <!-- ================================================================= -->
        @php
            $user = auth()->user();
            $baseDomain = config('app.url_base_domain', 'localhost');
            $port = request()->getPort();
            $portSuffix = ($port && $port != 80 && $port != 443) ? ':'.$port : '';
            $fullPortalUrl = $tenant ? $tenant->subdomain . '.' . $baseDomain . $portSuffix : 'portal.adzkia.id';
            $portalHttpUrl = $tenant ? (request()->isSecure() ? 'https://' : 'http://') . $fullPortalUrl : '#';
        @endphp

        <div x-data="{ 
            tab: 'teachers',
            copied: false,
            showModal: false,
            modalMode: 'create',
            addType: 'single',
            modalUser: { id: null, name: '', email: '', role: 'T', whatsapp_number: '', tenant_id: '{{ $tenant->id ?? '' }}' },
            showDetailModal: false,
            detailUser: {},
            copyUrl(url) {
                navigator.clipboard.writeText(url).then(() => {
                    this.copied = true;
                    setTimeout(() => { this.copied = false; }, 2500);
                }).catch(() => {
                    alert('Gagal menyalin URL');
                });
            },
            openCreateModal(defaultRole = 'T') {
                this.modalMode = 'create';
                this.addType = 'single';
                this.modalUser = { id: null, name: '', email: '', role: defaultRole, whatsapp_number: '', tenant_id: '{{ $tenant->id ?? '' }}' };
                this.showModal = true;
            },
            async openEditModal(userId) {
                try {
                    const res = await fetch('/dashboard/users/' + userId, { headers: { 'Accept': 'application/json' } });
                    const data = await res.json();
                    this.modalMode = 'edit';
                    this.modalUser = { 
                        id: data.id, 
                        name: data.name, 
                        email: data.email, 
                        role: data.role, 
                        whatsapp_number: data.whatsapp_number === '-' ? '' : data.whatsapp_number,
                        tenant_id: '{{ $tenant->id ?? '' }}'
                    };
                    this.showModal = true;
                } catch (e) { alert('Gagal memuat data user.'); }
            },
            async openDetailModal(userId) {
                try {
                    const res = await fetch('/dashboard/users/' + userId, { headers: { 'Accept': 'application/json' } });
                    this.detailUser = await res.json();
                    this.showDetailModal = true;
                } catch (e) { alert('Gagal memuat data user.'); }
            }
        }" class="space-y-6">

            <!-- Toast Salin URL -->
            <div x-show="copied" 
                 x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0 translate-y-2"
                 x-transition:enter-end="opacity-100 translate-y-0"
                 x-transition:leave="transition ease-in duration-200"
                 x-transition:leave-start="opacity-100 translate-y-0"
                 x-transition:leave-end="opacity-0 translate-y-2"
                 style="display: none;" 
                 class="fixed bottom-6 right-6 z-50 bg-gray-12 text-gray-1 px-4 py-3 rounded-2xl shadow-xl flex items-center gap-2.5 text-xs font-semibold border border-gray-11">
                <span class="w-5 h-5 rounded-full bg-green-9 text-white flex items-center justify-center">✓</span>
                <span>Tautan portal publik sekolah berhasil disalin ke clipboard!</span>
            </div>

            <!-- 1. HERO PROFIL RESMI SEKOLAH / INSTITUSI -->
            <section class="bg-white rounded-2xl border border-gray-6 shadow-xs overflow-hidden">
                <!-- Cover Banner Sekolah -->
                <div class="h-36 sm:h-48 w-full relative overflow-hidden bg-gray-12">
                    <img src="{{ $tenant ? $tenant->cover_photo_url : 'https://images.unsplash.com/photo-1497366216548-37526070297c?auto=format&fit=crop&q=80&w=2000' }}" 
                         alt="Cover {{ $tenant->name ?? 'Institusi' }}" 
                         class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/20 to-transparent"></div>

                    <!-- Badge Tingkat Layanan Paket -->
                    <div class="absolute top-4 right-4 z-10 flex items-center gap-2">
                        @if($tenant && $tenant->isEnterprise())
                            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-extrabold bg-indigo-900/90 text-indigo-100 border border-indigo-400/40 backdrop-blur-md shadow-md">
                                👑 PAKET ENTERPRISE (WHITE LABEL)
                            </span>
                        @elseif($tenant && $tenant->isPro())
                            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-extrabold bg-blue-900/90 text-blue-100 border border-blue-400/40 backdrop-blur-md shadow-md">
                                ⚡ PAKET PRO (CUSTOM DOMAIN)
                            </span>
                        @else
                            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-extrabold bg-gray-12/90 text-green-3 border border-green-5/40 backdrop-blur-md shadow-md">
                                🌱 PAKET STARTER
                            </span>
                        @endif
                    </div>
                </div>

                <!-- Bagian Informasi Identitas Sekolah -->
                <div class="p-6 sm:p-8 pt-0 relative">
                    <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 -mt-12 sm:-mt-14 mb-4">
                        <!-- Logo & Nama Sekolah -->
                        <div class="flex flex-col sm:flex-row sm:items-end gap-5">
                            <div class="relative shrink-0">
                                <img src="{{ $tenant ? $tenant->logo_url : $user->profile_photo_url }}" 
                                     alt="{{ $tenant->name ?? 'Institusi' }}" 
                                     class="w-24 h-24 sm:w-28 sm:h-28 rounded-2xl border-4 border-white shadow-lg bg-white object-cover">
                            </div>
                            <div class="pt-2">
                                <h1 class="font-display font-extrabold text-2xl sm:text-3xl text-gray-12 tracking-tight flex items-center gap-2">
                                    <span>{{ $tenant->name ?? 'Pusat Kendali Institusi' }}</span>
                                    <span class="text-blue-9 inline-flex" title="Institusi Terverifikasi ADZKIA">
                                        <x-radix-icon name="check-circled" class="w-5 h-5 sm:w-6 sm:h-6" />
                                    </span>
                                </h1>
                                <p class="font-sans text-sm text-gray-11 mt-1 max-w-2xl">
                                    {{ $tenant->tagline ?: 'Mewujudkan ekosistem asesmen digital yang mandiri, terukur, dan berstandar nasional.' }}
                                </p>
                            </div>
                        </div>

                        <!-- Tombol Aksi Cepat Admin -->
                        <div class="flex flex-wrap items-center gap-2.5 shrink-0 self-start md:self-end">
                            <button type="button" 
                                    @click="openCreateModal('T')" 
                                    class="px-4 py-2.5 rounded-xl bg-green-9 hover:bg-green-10 active:bg-green-11 text-white text-xs font-bold transition-all duration-200 shadow-xs flex items-center gap-2 active:scale-[0.98] cursor-pointer">
                                <x-radix-icon name="plus" class="w-4 h-4" />
                                <span>Tambah</span>
                            </button>
                            @if($tenant)
                                <a href="{{ route('tenants.edit', $tenant->id) }}" 
                                   class="px-4 py-2.5 rounded-xl bg-blue-9 hover:bg-blue-10 text-white text-xs font-bold transition-all duration-200 shadow-xs flex items-center gap-2 active:scale-[0.98]">
                                    <x-radix-icon name="pencil-1" class="w-4 h-4" />
                                    <span>Edit Tenant</span>
                                </a>
                                @if($tenant->canCreateAssessments())
                                    <a href="{{ route('assessments.wizard') }}" 
                                       class="px-4 py-2.5 rounded-xl bg-gray-12 hover:bg-black text-white text-xs font-bold transition-all duration-200 shadow-xs flex items-center gap-2 active:scale-[0.98]">
                                        <x-radix-icon name="plus" class="w-4 h-4" />
                                        <span>Buat Ujian Baru</span>
                                    </a>
                                @endif
                            @endif
                        </div>
                    </div>

                    <!-- Tautan Portal & Subdomain Box -->
                    <div class="mt-4 pt-4 border-t border-gray-5 flex flex-wrap items-center justify-between gap-3">
                        <div class="flex flex-wrap items-center gap-2.5">
                            <span class="font-sans text-xs font-semibold text-gray-11">Alamat Portal Publik:</span>
                            <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-xl bg-gray-2 border border-gray-6 text-xs text-gray-12 font-mono">
                                <x-radix-icon name="globe" class="w-3.5 h-3.5 text-blue-9" />
                                <span>{{ $fullPortalUrl }}</span>
                            </div>
                            <button type="button" 
                                    @click="copyUrl('{{ $portalHttpUrl }}')" 
                                    class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-xl bg-gray-3 hover:bg-gray-4 active:scale-95 text-xs font-semibold text-gray-12 transition-all duration-200 cursor-pointer"
                                    title="Salin tautan portal ke clipboard">
                                <x-radix-icon name="copy" class="w-3.5 h-3.5 text-gray-11" />
                                <span>Salin URL</span>
                            </button>
                            <a href="{{ $portalHttpUrl }}" target="_blank" 
                               class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-xl bg-blue-3 hover:bg-blue-4 text-blue-11 border border-blue-6/60 text-xs font-semibold transition-all duration-200 active:scale-95"
                               title="Buka portal publik di tab baru">
                                <x-radix-icon name="external-link" class="w-3.5 h-3.5" />
                                <span>Kunjungi Portal Publik ↗</span>
                            </a>
                            <a href="{{ route('tenants.branding.edit', $tenant->id) }}" 
                               class="inline-flex items-center gap-1.5 px-3.5 py-1.5 rounded-xl text-xs font-semibold text-white bg-gray-12 hover:bg-black transition-all duration-200 cursor-pointer shadow-xs active:scale-95"
                               title="Kelola Identitas Visual &amp; Branding Portal Sekolah">
                                <x-radix-icon name="image" class="w-3.5 h-3.5 text-gray-3" />
                                <span>Kelola Branding Sekolah</span>
                            </a>
                        </div>
                    </div>
                </div>
            </section>


            <!-- 2. STATS RINGKASAN EKOSISTEM SEKOLAH (4 KARTU METRIK) - Swipeable Snap Carousel on Mobile -->
            <section class="flex overflow-x-auto lg:grid grid-cols-2 lg:grid-cols-4 gap-3.5 pb-2 -mx-4 px-4 sm:mx-0 sm:px-0 hide-scrollbar snap-x snap-mandatory touch-pan-x lg:overflow-visible">
                <!-- Dewan Guru & Pengawas -->
                <article @click="tab = 'teachers'" class="min-w-[230px] xs:min-w-[260px] lg:min-w-0 snap-start shrink-0 lg:shrink flex-1 lg:flex-initial bg-white p-5 rounded-2xl border border-gray-6 shadow-xs hover:border-blue-7 hover:-translate-y-0.5 hover:shadow-md active:translate-y-0 active:scale-[0.99] transition-all duration-200 cursor-pointer group">
                    <div class="flex items-center justify-between mb-3">
                        <span class="font-sans text-xs font-semibold text-gray-11 uppercase tracking-wider group-hover:text-blue-11 transition-colors">Dewan Guru</span>
                        <div class="w-10 h-10 rounded-xl bg-blue-3 text-blue-11 flex items-center justify-center shadow-xs">
                            <x-radix-icon name="person" class="w-5 h-5" />
                        </div>
                    </div>
                    <div class="font-display font-black text-3xl text-gray-12">{{ $teachersCount ?? 0 }}</div>
                    <div class="font-sans text-xs text-blue-11 font-medium mt-1">Tenaga pendidik &amp; pengawas</div>
                </article>

                <!-- Siswa Terdaftar -->
                <article @click="tab = 'students'" class="min-w-[230px] xs:min-w-[260px] lg:min-w-0 snap-start shrink-0 lg:shrink flex-1 lg:flex-initial bg-white p-5 rounded-2xl border border-gray-6 shadow-xs hover:border-amber-7 hover:-translate-y-0.5 hover:shadow-md active:translate-y-0 active:scale-[0.99] transition-all duration-200 cursor-pointer group">
                    <div class="flex items-center justify-between mb-3">
                        <span class="font-sans text-xs font-semibold text-gray-11 uppercase tracking-wider group-hover:text-amber-11 transition-colors">Siswa Terdaftar</span>
                        <div class="w-10 h-10 rounded-xl bg-amber-3 text-amber-11 flex items-center justify-center shadow-xs">
                            <x-radix-icon name="avatar" class="w-5 h-5" />
                        </div>
                    </div>
                    <div class="font-display font-black text-3xl text-gray-12">{{ $studentsCount ?? 0 }}</div>
                    <div class="font-sans text-xs text-amber-11 font-medium mt-1">Peserta didik aktif</div>
                </article>

                <!-- Katalog Ujian Institusi -->
                <article @click="tab = 'assessments'" class="min-w-[230px] xs:min-w-[260px] lg:min-w-0 snap-start shrink-0 lg:shrink flex-1 lg:flex-initial bg-white p-5 rounded-2xl border border-gray-6 shadow-xs hover:border-green-7 hover:-translate-y-0.5 hover:shadow-md active:translate-y-0 active:scale-[0.99] transition-all duration-200 cursor-pointer group">
                    <div class="flex items-center justify-between mb-3">
                        <span class="font-sans text-xs font-semibold text-gray-11 uppercase tracking-wider group-hover:text-green-11 transition-colors">Katalog Ujian</span>
                        <div class="w-10 h-10 rounded-xl bg-green-3 text-green-11 flex items-center justify-center shadow-xs">
                            <x-radix-icon name="timer" class="w-5 h-5" />
                        </div>
                    </div>
                    <div class="font-display font-black text-3xl text-gray-12">{{ $assessmentsCount ?? 0 }}</div>
                    <div class="font-sans text-xs text-green-11 font-medium mt-1">Asesmen terkonfigurasi</div>
                </article>

                <!-- Paket Bank Soal -->
                <a href="{{ route('assessments.index') }}" class="min-w-[230px] xs:min-w-[260px] lg:min-w-0 snap-start shrink-0 lg:shrink flex-1 lg:flex-initial bg-white p-5 rounded-2xl border border-gray-6 shadow-xs hover:border-indigo-7 hover:-translate-y-0.5 hover:shadow-md active:translate-y-0 active:scale-[0.99] transition-all duration-200 group block">
                    <div class="flex items-center justify-between mb-3">
                        <span class="font-sans text-xs font-semibold text-gray-11 uppercase tracking-wider group-hover:text-indigo-11 transition-colors">Bank Soal</span>
                        <div class="w-10 h-10 rounded-xl bg-indigo-3 text-indigo-11 flex items-center justify-center shadow-xs">
                            <x-radix-icon name="file-text" class="w-5 h-5" />
                        </div>
                    </div>
                    <div class="font-display font-black text-3xl text-gray-12">{{ $questionBanksCount ?? 0 }}</div>
                    <div class="font-sans text-xs text-indigo-11 font-medium mt-1">Buka bank soal institusi →</div>
                </a>
            </section>

            <!-- 3. WORKSPACE TABEL TERPADU (GURU, SISWA, ASESMEN, ADMIN) -->
            <section class="space-y-4">
                <!-- Tab Selector Buttons -->
                <nav class="flex items-center gap-2 border-b border-gray-6 pb-2 overflow-x-auto hide-scrollbar -mx-4 px-4 sm:mx-0 sm:px-0 touch-pan-x">
                    <button type="button" 
                            @click="tab = 'teachers'"
                            :class="tab === 'teachers' ? 'bg-blue-3 text-blue-11 border-blue-7 font-bold shadow-xs' : 'text-gray-11 hover:bg-gray-2 hover:text-gray-12 font-medium border-transparent'"
                            class="px-4 py-2.5 rounded-xl text-xs sm:text-sm border transition-all duration-200 flex items-center gap-2 shrink-0 cursor-pointer active:scale-[0.98]">
                        <x-radix-icon name="person" class="w-4 h-4 text-blue-9" />
                        <span>Dewan Guru &amp; Pengawas ({{ $teachers->count() }})</span>
                    </button>

                    <button type="button" 
                            @click="tab = 'students'"
                            :class="tab === 'students' ? 'bg-amber-3 text-amber-11 border-amber-7 font-bold shadow-xs' : 'text-gray-11 hover:bg-gray-2 hover:text-gray-12 font-medium border-transparent'"
                            class="px-4 py-2.5 rounded-xl text-xs sm:text-sm border transition-all duration-200 flex items-center gap-2 shrink-0 cursor-pointer active:scale-[0.98]">
                        <x-radix-icon name="avatar" class="w-4 h-4 text-amber-9" />
                        <span>Siswa Terdaftar ({{ $students->count() }})</span>
                    </button>

                    <button type="button" 
                            @click="tab = 'assessments'"
                            :class="tab === 'assessments' ? 'bg-green-3 text-green-11 border-green-7 font-bold shadow-xs' : 'text-gray-11 hover:bg-gray-2 hover:text-gray-12 font-medium border-transparent'"
                            class="px-4 py-2.5 rounded-xl text-xs sm:text-sm border transition-all duration-200 flex items-center gap-2 shrink-0 cursor-pointer active:scale-[0.98]">
                        <x-radix-icon name="timer" class="w-4 h-4 text-green-9" />
                        <span>Asesmen &amp; Ujian Institusi ({{ $recentAssessments->count() }})</span>
                    </button>

                    <button type="button" 
                            @click="tab = 'admins'"
                            :class="tab === 'admins' ? 'bg-red-3 text-red-11 border-red-7 font-bold shadow-xs' : 'text-gray-11 hover:bg-gray-2 hover:text-gray-12 font-medium border-transparent'"
                            class="px-4 py-2.5 rounded-xl text-xs sm:text-sm border transition-all duration-200 flex items-center gap-2 shrink-0 cursor-pointer active:scale-[0.98]">
                        <x-radix-icon name="badge" class="w-4 h-4 text-red-9" />
                        <span>Admin Tenant ({{ $admins->count() }})</span>
                    </button>
                </nav>

                <!-- TAB 1: DEWAN GURU & PENGAWAS -->
                <div x-show="tab === 'teachers'" class="bg-white border border-gray-6 rounded-2xl shadow-xs overflow-hidden">
                    <div class="px-6 py-4 border-b border-gray-6 flex flex-col sm:flex-row sm:items-center justify-between gap-3 bg-gray-2/40">
                        <div>
                            <h3 class="font-display font-bold text-sm text-gray-12">Daftar Dewan Guru &amp; Pengawas Ujian</h3>
                            <p class="font-sans text-xs text-gray-11 mt-0.5">Semua guru terdaftar memiliki akses pengawasan real-time dan kendali buka kunci sesi siswa.</p>
                        </div>
                        <span class="text-xs font-semibold px-3 py-1 rounded-full bg-blue-3 text-blue-11 border border-blue-6/60 self-start sm:self-auto shadow-xs">
                            Total: {{ $teachers->count() }} Guru
                        </span>
                    </div>

                    <div class="overflow-x-auto touch-pan-x hide-scrollbar">
                        <!-- Mobile Swipe Hint for Table -->
                        <div class="sm:hidden px-4 py-2 bg-gray-2/60 border-b border-gray-5 flex items-center gap-1.5 text-[11px] text-gray-11 font-medium">
                            <x-radix-icon name="arrow-right" class="w-3.5 h-3.5 text-blue-9 animate-pulse shrink-0" />
                            <span>Geser tabel ke samping untuk melihat kolom lengkap</span>
                        </div>
                        <table class="w-full text-left border-collapse text-xs min-w-[680px] sm:min-w-full">
                            <thead>
                                <tr class="border-b border-gray-6 bg-gray-2/60 text-gray-11 uppercase tracking-wider font-semibold whitespace-nowrap">
                                    <th class="py-3.5 px-4 w-12 text-center">No</th>
                                    <th class="py-3.5 px-4">Guru / Tenaga Pendidik</th>
                                    <th class="py-3.5 px-4">Email</th>
                                    <th class="py-3.5 px-4">Kontak WhatsApp</th>
                                    <th class="py-3.5 px-4">Peran</th>
                                    <th class="py-3.5 px-4">Terdaftar</th>
                                    <th class="py-3.5 px-4 text-right">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-5">
                                @forelse($teachers as $index => $teacher)
                                    @php
                                        $rawWa = preg_replace('/[^0-9]/', '', $teacher->whatsapp_number ?? '');
                                        if (str_starts_with($rawWa, '0')) {
                                            $rawWa = '62' . substr($rawWa, 1);
                                        }
                                        $isWaVerified = $teacher->isWhatsappVerified();
                                    @endphp
                                    <tr class="hover:bg-gray-2/50 transition-colors">
                                        <td class="py-3.5 px-4 text-center font-mono text-gray-10 whitespace-nowrap">{{ $index + 1 }}</td>
                                        <td class="py-3.5 px-4 whitespace-nowrap">
                                            <div class="flex items-center gap-3">
                                                <img src="{{ $teacher->profile_photo_url }}" alt="{{ $teacher->name }}" class="w-8 h-8 rounded-full object-cover border border-gray-6 shrink-0 bg-white">
                                                <div>
                                                    <div class="font-bold text-gray-12">{{ $teacher->name }}</div>
                                                    @if($teacher->username)
                                                        <div class="text-[11px] text-gray-10 font-mono">&#64;{{ $teacher->username }}</div>
                                                    @endif
                                                </div>
                                            </div>
                                        </td>
                                        <td class="py-3.5 px-4 font-mono text-gray-11 whitespace-nowrap">{{ $teacher->email }}</td>
                                        <td class="py-3.5 px-4 whitespace-nowrap">
                                            @if($rawWa)
                                                <div class="flex items-center gap-1.5 flex-wrap">
                                                    <a href="https://wa.me/{{ $rawWa }}" target="_blank" 
                                                       class="inline-flex items-center gap-1 px-2.5 py-1 rounded-lg bg-green-3 hover:bg-green-4 text-green-11 border border-green-6/60 font-mono text-xs font-semibold transition-all duration-200 active:scale-95"
                                                       title="Kirim pesan WhatsApp langsung">
                                                        <span>💬 {{ $teacher->whatsapp_number }}</span>
                                                    </a>
                                                    @if($isWaVerified)
                                                        <span class="inline-flex items-center text-[10px] font-bold text-green-11 bg-green-3 border border-green-6/60 px-2 py-0.5 rounded-full" title="Nomor Terverifikasi">
                                                            ✓ Terverifikasi
                                                        </span>
                                                    @endif
                                                </div>
                                            @else
                                                <span class="text-gray-9 italic text-xs">Belum diisi</span>
                                            @endif
                                        </td>
                                        <td class="py-3.5 px-4 whitespace-nowrap">
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold text-blue-11 bg-blue-3 border border-blue-6/60">
                                                Guru &amp; Pengawas
                                            </span>
                                        </td>
                                        <td class="py-3.5 px-4 text-gray-11 whitespace-nowrap">
                                            {{ $teacher->created_at ? $teacher->created_at->format('d M Y') : '-' }}
                                        </td>
                                        <td class="py-3.5 px-4 text-right whitespace-nowrap">
                                            <div class="flex items-center justify-end gap-1.5">
                                                <button type="button" @click="openDetailModal({{ $teacher->id }})" 
                                                        class="px-2.5 py-1 rounded-lg text-xs font-semibold bg-gray-3 hover:bg-gray-4 text-gray-12 transition-colors cursor-pointer">
                                                    Detail
                                                </button>
                                                <button type="button" @click="openEditModal({{ $teacher->id }})" 
                                                        class="px-2.5 py-1 rounded-lg text-xs font-semibold bg-blue-3 hover:bg-blue-4 text-blue-11 transition-colors cursor-pointer">
                                                    Edit
                                                </button>
                                                <form method="POST" action="{{ route('dashboard.users.destroy', $teacher->id) }}" class="m-0 inline-block" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data anggota {{ addslashes($teacher->name) }}?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" 
                                                            class="px-2.5 py-1 rounded-lg text-xs font-semibold bg-red-3 hover:bg-red-4 text-red-11 transition-colors cursor-pointer">
                                                        Hapus
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="py-12 text-center text-gray-11 italic">
                                            Belum ada dewan guru yang terdaftar di institusi ini.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- TAB 2: SISWA TERDAFTAR -->
                <div x-show="tab === 'students'" style="display: none;" class="bg-white border border-gray-6 rounded-2xl shadow-xs overflow-hidden">
                    <div class="px-6 py-4 border-b border-gray-6 flex flex-col sm:flex-row sm:items-center justify-between gap-3 bg-gray-2/40">
                        <div>
                            <h3 class="font-display font-bold text-sm text-gray-12">Daftar Siswa &amp; Peserta Didik Terdaftar</h3>
                            <p class="font-sans text-xs text-gray-11 mt-0.5">Siswa yang terhubung dengan akun portal sekolah Anda untuk pengerjaan ujian.</p>
                        </div>
                        <span class="text-xs font-semibold px-3 py-1 rounded-full bg-amber-3 text-amber-11 border border-amber-6/60 self-start sm:self-auto shadow-xs">
                            Total: {{ $students->count() }} Siswa
                        </span>
                    </div>

                    <div class="overflow-x-auto touch-pan-x hide-scrollbar">
                        <!-- Mobile Swipe Hint -->
                        <div class="sm:hidden px-4 py-2 bg-gray-2/60 border-b border-gray-5 flex items-center gap-1.5 text-[11px] text-gray-11 font-medium">
                            <x-radix-icon name="arrow-right" class="w-3.5 h-3.5 text-amber-9 animate-pulse shrink-0" />
                            <span>Geser tabel ke samping untuk melihat kolom lengkap</span>
                        </div>
                        <table class="w-full text-left border-collapse text-xs min-w-[680px] sm:min-w-full">
                            <thead>
                                <tr class="border-b border-gray-6 bg-gray-2/60 text-gray-11 uppercase tracking-wider font-semibold whitespace-nowrap">
                                    <th class="py-3.5 px-4 w-12 text-center">No</th>
                                    <th class="py-3.5 px-4">Nama Siswa</th>
                                    <th class="py-3.5 px-4">Email</th>
                                    <th class="py-3.5 px-4">Kontak WhatsApp</th>
                                    <th class="py-3.5 px-4">Peran</th>
                                    <th class="py-3.5 px-4">Terdaftar</th>
                                    <th class="py-3.5 px-4 text-right">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-5">
                                @forelse($students as $index => $student)
                                    @php
                                        $rawWaStudent = preg_replace('/[^0-9]/', '', $student->whatsapp_number ?? '');
                                        if (str_starts_with($rawWaStudent, '0')) {
                                            $rawWaStudent = '62' . substr($rawWaStudent, 1);
                                        }
                                        $isStudentWaVerified = $student->isWhatsappVerified();
                                    @endphp
                                    <tr class="hover:bg-gray-2/50 transition-colors">
                                        <td class="py-3.5 px-4 text-center font-mono text-gray-10 whitespace-nowrap">{{ $index + 1 }}</td>
                                        <td class="py-3.5 px-4 whitespace-nowrap">
                                            <div class="flex items-center gap-3">
                                                <img src="{{ $student->profile_photo_url }}" alt="{{ $student->name }}" class="w-8 h-8 rounded-full object-cover border border-gray-6 shrink-0 bg-white">
                                                <div>
                                                    <div class="font-bold text-gray-12">{{ $student->name }}</div>
                                                    @if($student->username)
                                                        <div class="text-[11px] text-gray-10 font-mono">&#64;{{ $student->username }}</div>
                                                    @endif
                                                </div>
                                            </div>
                                        </td>
                                        <td class="py-3.5 px-4 font-mono text-gray-11 whitespace-nowrap">{{ $student->email }}</td>
                                        <td class="py-3.5 px-4 whitespace-nowrap">
                                            @if($rawWaStudent)
                                                <div class="flex items-center gap-1.5 flex-wrap">
                                                    <a href="https://wa.me/{{ $rawWaStudent }}" target="_blank" 
                                                       class="inline-flex items-center gap-1 px-2.5 py-1 rounded-lg bg-green-3 hover:bg-green-4 text-green-11 border border-green-6/60 font-mono text-xs font-semibold transition-all duration-200 active:scale-95"
                                                       title="Hubungi Siswa / Wali Murid via WhatsApp">
                                                        <span>💬 {{ $student->whatsapp_number }}</span>
                                                    </a>
                                                    @if($isStudentWaVerified)
                                                        <span class="inline-flex items-center text-[10px] font-bold text-green-11 bg-green-3 border border-green-6/60 px-2 py-0.5 rounded-full" title="Nomor Terverifikasi">
                                                            ✓ Terverifikasi
                                                        </span>
                                                    @endif
                                                </div>
                                            @else
                                                <span class="text-gray-9 italic text-xs">Belum diisi</span>
                                            @endif
                                        </td>
                                        <td class="py-3.5 px-4 whitespace-nowrap">
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold text-amber-11 bg-amber-3 border border-amber-6/60">
                                                Peserta Didik
                                            </span>
                                        </td>
                                        <td class="py-3.5 px-4 text-gray-11 whitespace-nowrap">
                                            {{ $student->created_at ? $student->created_at->format('d M Y') : '-' }}
                                        </td>
                                        <td class="py-3.5 px-4 text-right whitespace-nowrap">
                                            <div class="flex items-center justify-end gap-1.5">
                                                <button type="button" @click="openDetailModal({{ $student->id }})" 
                                                        class="px-2.5 py-1 rounded-lg text-xs font-semibold bg-gray-3 hover:bg-gray-4 text-gray-12 transition-colors cursor-pointer">
                                                    Detail
                                                </button>
                                                <button type="button" @click="openEditModal({{ $student->id }})" 
                                                        class="px-2.5 py-1 rounded-lg text-xs font-semibold bg-blue-3 hover:bg-blue-4 text-blue-11 transition-colors cursor-pointer">
                                                    Edit
                                                </button>
                                                <form method="POST" action="{{ route('dashboard.users.destroy', $student->id) }}" class="m-0 inline-block" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data siswa {{ addslashes($student->name) }}?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" 
                                                            class="px-2.5 py-1 rounded-lg text-xs font-semibold bg-red-3 hover:bg-red-4 text-red-11 transition-colors cursor-pointer">
                                                        Hapus
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="py-12 text-center text-gray-11 italic">
                                            Belum ada siswa yang terdaftar di institusi ini.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- TAB 3: ASESMEN & UJIAN INSTITUSI -->
                <div x-show="tab === 'assessments'" style="display: none;" class="bg-white border border-gray-6 rounded-2xl shadow-xs overflow-hidden">
                    <div class="px-6 py-4 border-b border-gray-6 flex flex-col sm:flex-row sm:items-center justify-between gap-3 bg-gray-2/40">
                        <div>
                            <h3 class="font-display font-bold text-sm text-gray-12">Katalog Asesmen &amp; Ujian Institusi</h3>
                            <p class="font-sans text-xs text-gray-11 mt-0.5">Daftar evaluasi belajar aktif dengan akses tombol pengawasan langsung.</p>
                        </div>
                        <a href="{{ route('assessments.index') }}" class="font-sans text-xs font-bold text-blue-11 hover:text-blue-12 self-start sm:self-auto flex items-center gap-1.5 shrink-0">
                            <span>Buka Halaman Bank Soal Lengkap</span>
                            <x-radix-icon name="arrow-right" class="w-3.5 h-3.5" />
                        </a>
                    </div>

                    <div class="overflow-x-auto touch-pan-x hide-scrollbar">
                        <!-- Mobile Swipe Hint -->
                        <div class="sm:hidden px-4 py-2 bg-gray-2/60 border-b border-gray-5 flex items-center gap-1.5 text-[11px] text-gray-11 font-medium">
                            <x-radix-icon name="arrow-right" class="w-3.5 h-3.5 text-green-9 animate-pulse shrink-0" />
                            <span>Geser tabel ke samping untuk melihat kolom lengkap</span>
                        </div>
                        <table class="w-full text-left border-collapse text-xs min-w-[700px] sm:min-w-full">
                            <thead>
                                <tr class="border-b border-gray-6 bg-gray-2/60 text-gray-11 uppercase tracking-wider font-semibold whitespace-nowrap">
                                    <th class="py-3.5 px-4 w-12 text-center">No</th>
                                    <th class="py-3.5 px-4">Judul Asesmen</th>
                                    <th class="py-3.5 px-4">Mata Pelajaran</th>
                                    <th class="py-3.5 px-4 text-center">Jenjang</th>
                                    <th class="py-3.5 px-4 text-center">Durasi</th>
                                    <th class="py-3.5 px-4">Status Kurasi</th>
                                    <th class="py-3.5 px-4 text-center">Awasi</th>
                                    <th class="py-3.5 px-4 text-right">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-5">
                                @forelse($recentAssessments as $idx => $exam)
                                    <tr class="hover:bg-gray-2/50 transition-colors">
                                        <td class="py-3.5 px-4 text-center font-mono text-gray-10 whitespace-nowrap">{{ $idx + 1 }}</td>
                                        <td class="py-3.5 px-4 font-bold text-gray-12 whitespace-nowrap">
                                            <a href="{{ route('assessments.show', $exam) }}" class="hover:text-blue-11 transition-colors">
                                                {{ $exam->title }}
                                            </a>
                                        </td>
                                        <td class="py-3.5 px-4 text-gray-11 whitespace-nowrap">{{ $exam->subject?->name ?? 'Umum' }}</td>
                                        <td class="py-3.5 px-4 text-center whitespace-nowrap">
                                            <span class="px-2.5 py-0.5 rounded-full text-xs font-semibold bg-gray-3 text-gray-11">
                                                {{ $exam->grade_level ?: 'Semua' }}
                                            </span>
                                        </td>
                                        <td class="py-3.5 px-4 text-center text-gray-11 font-mono whitespace-nowrap">
                                            {{ $exam->duration_minutes }} mnt
                                        </td>
                                        <td class="py-3.5 px-4 whitespace-nowrap">
                                            @if($exam->is_mandatory)
                                                <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full text-[10px] font-extrabold bg-amber-3 text-amber-11 border border-amber-6/60">
                                                    🔒 WAJIB NASIONAL (OWNER)
                                                </span>
                                            @else
                                                <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full text-[10px] font-semibold bg-gray-3 text-gray-11 border border-gray-6/60">
                                                    ⚪ PILIHAN TENANT
                                                </span>
                                            @endif
                                        </td>
                                        <td class="py-3.5 px-4 text-center whitespace-nowrap">
                                            <a href="{{ route('assessments.proctoring', $exam) }}" 
                                               class="inline-flex items-center justify-center px-3.5 py-1.5 rounded-xl text-xs font-semibold text-white bg-gray-12 hover:bg-black transition-all duration-200 cursor-pointer shadow-xs active:scale-95 gap-1.5"
                                               title="Masuk ke Ruang Pengawasan Ujian Real-Time">
                                                <x-radix-icon name="timer" class="w-3.5 h-3.5" />
                                                <span>Pengawasan</span>
                                            </a>
                                        </td>
                                        <td class="py-3.5 px-4 text-right whitespace-nowrap">
                                            <a href="{{ route('assessments.show', $exam) }}" 
                                               class="px-3 py-1.5 rounded-lg text-xs font-semibold bg-gray-2 hover:bg-gray-3 border border-gray-6 text-gray-12 transition-all duration-200 active:scale-95">
                                                Detail
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8" class="py-12 text-center text-gray-11 italic">
                                            Belum ada asesmen yang dikonfigurasi.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- TAB 4: ADMIN TENANT -->
                <div x-show="tab === 'admins'" style="display: none;" class="bg-white border border-gray-6 rounded-2xl shadow-xs overflow-hidden">
                    <div class="px-6 py-4 border-b border-gray-6 flex flex-col sm:flex-row sm:items-center justify-between gap-3 bg-gray-2/40">
                        <div>
                            <h3 class="font-display font-bold text-sm text-gray-12">Daftar Administrator Pengelola Institusi</h3>
                            <p class="font-sans text-xs text-gray-11 mt-0.5">Penanggung jawab teknis, branding, dan tata kelola akun lembaga sekolah.</p>
                        </div>
                        <span class="text-xs font-semibold px-3 py-1 rounded-full bg-red-3 text-red-11 border border-red-6/60 self-start sm:self-auto shadow-xs">
                            Total: {{ $admins->count() }} Admin
                        </span>
                    </div>

                    <div class="overflow-x-auto touch-pan-x hide-scrollbar">
                        <!-- Mobile Swipe Hint -->
                        <div class="sm:hidden px-4 py-2 bg-gray-2/60 border-b border-gray-5 flex items-center gap-1.5 text-[11px] text-gray-11 font-medium">
                            <x-radix-icon name="arrow-right" class="w-3.5 h-3.5 text-red-9 animate-pulse shrink-0" />
                            <span>Geser tabel ke samping untuk melihat kolom lengkap</span>
                        </div>
                        <table class="w-full text-left border-collapse text-xs min-w-[680px] sm:min-w-full">
                            <thead>
                                <tr class="border-b border-gray-6 bg-gray-2/60 text-gray-11 uppercase tracking-wider font-semibold whitespace-nowrap">
                                    <th class="py-3.5 px-4 w-12 text-center">No</th>
                                    <th class="py-3.5 px-4">Nama Administrator</th>
                                    <th class="py-3.5 px-4">Email</th>
                                    <th class="py-3.5 px-4">Kontak WhatsApp</th>
                                    <th class="py-3.5 px-4">Peran</th>
                                    <th class="py-3.5 px-4">Terdaftar</th>
                                    <th class="py-3.5 px-4 text-right">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-5">
                                @forelse($admins as $idxAdmin => $admin)
                                    @php
                                        $rawWaAdmin = preg_replace('/[^0-9]/', '', $admin->whatsapp_number ?? '');
                                        if (str_starts_with($rawWaAdmin, '0')) {
                                            $rawWaAdmin = '62' . substr($rawWaAdmin, 1);
                                        }
                                    @endphp
                                    <tr class="hover:bg-gray-2/50 transition-colors">
                                        <td class="py-3.5 px-4 text-center font-mono text-gray-10 whitespace-nowrap">{{ $idxAdmin + 1 }}</td>
                                        <td class="py-3.5 px-4 whitespace-nowrap">
                                            <div class="flex items-center gap-3">
                                                <img src="{{ $admin->profile_photo_url }}" alt="{{ $admin->name }}" class="w-8 h-8 rounded-full object-cover border border-gray-6 shrink-0 bg-white">
                                                <div>
                                                    <div class="font-bold text-gray-12">{{ $admin->name }}</div>
                                                    @if($admin->username)
                                                        <div class="text-[11px] text-gray-10 font-mono">&#64;{{ $admin->username }}</div>
                                                    @endif
                                                </div>
                                            </div>
                                        </td>
                                        <td class="py-3.5 px-4 font-mono text-gray-11 whitespace-nowrap">{{ $admin->email }}</td>
                                        <td class="py-3.5 px-4 whitespace-nowrap">
                                            @if($rawWaAdmin)
                                                <a href="https://wa.me/{{ $rawWaAdmin }}" target="_blank" 
                                                   class="inline-flex items-center gap-1 px-2.5 py-1 rounded-lg bg-green-3 hover:bg-green-4 text-green-11 border border-green-6/60 font-mono text-xs font-semibold transition-all duration-200 active:scale-95">
                                                    <span>💬 {{ $admin->whatsapp_number }}</span>
                                                </a>
                                            @else
                                                <span class="text-gray-9 italic text-xs">Belum diisi</span>
                                            @endif
                                        </td>
                                        <td class="py-3.5 px-4 whitespace-nowrap">
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold text-red-11 bg-red-3 border border-red-6/60">
                                                Administrator
                                            </span>
                                        </td>
                                        <td class="py-3.5 px-4 text-gray-11 whitespace-nowrap">
                                            {{ $admin->created_at ? $admin->created_at->format('d M Y') : '-' }}
                                        </td>
                                        <td class="py-3.5 px-4 text-right whitespace-nowrap">
                                            <div class="flex items-center justify-end gap-1.5">
                                                <button type="button" @click="openDetailModal({{ $admin->id }})" 
                                                        class="px-2.5 py-1 rounded-lg text-xs font-semibold bg-gray-3 hover:bg-gray-4 text-gray-12 transition-colors cursor-pointer">
                                                    Detail
                                                </button>
                                                <button type="button" @click="openEditModal({{ $admin->id }})" 
                                                        class="px-2.5 py-1 rounded-lg text-xs font-semibold bg-blue-3 hover:bg-blue-4 text-blue-11 transition-colors cursor-pointer">
                                                    Edit
                                                </button>
                                                <form method="POST" action="{{ route('dashboard.users.destroy', $admin->id) }}" class="m-0 inline-block" onsubmit="return confirm('Apakah Anda yakin ingin menghapus admin {{ addslashes($admin->name) }}?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" 
                                                            class="px-2.5 py-1 rounded-lg text-xs font-semibold bg-red-3 hover:bg-red-4 text-red-11 transition-colors cursor-pointer">
                                                        Hapus
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="py-12 text-center text-gray-11 italic">
                                            Belum ada administrator yang terdaftar di institusi ini.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>

            <!-- Modals CRUD untuk Guru, Siswa, Admin -->
            <x-dashboard-user-modals :tenants="$tenants ?? collect([$tenant])" :currentTenant="$tenant" />
        </div>
    @endif
</x-layouts.app>
