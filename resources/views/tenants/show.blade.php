<x-layouts.app>
    <div class="space-y-6">
        <!-- Header -->
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
            <div>
                <div class="flex items-center gap-2.5">
                    <h1 class="font-display font-bold text-2xl text-gray-12 tracking-tight">{{ $tenant->name }}</h1>
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold bg-green-3 text-green-11 border border-green-6/50 uppercase">
                        {{ $tenant->plan ?? 'Gratis' }}
                    </span>
                </div>
                <p class="text-sm text-gray-11 font-mono mt-1">https://{{ $tenant->subdomain }}.{{ config('app.url_base_domain', 'localhost') }}</p>
            </div>

            <div class="flex flex-wrap items-center gap-2">
                <a href="{{ route('tenants.index') }}" 
                   class="px-3.5 py-2 rounded-xl border border-gray-7 bg-white hover:bg-gray-3 text-xs font-semibold text-gray-12 transition-colors cursor-pointer">
                    Kembali
                </a>

                @can('update', $tenant)
                    <a href="{{ route('tenants.branding.edit', $tenant) }}" 
                       class="px-3.5 py-2 rounded-xl bg-sky-3 hover:bg-sky-4 text-sky-11 text-xs font-semibold transition-colors cursor-pointer flex items-center gap-1.5">
                        <x-radix-icon name="image" class="w-3.5 h-3.5" />
                        <span>Branding Portal</span>
                    </a>
                    <a href="{{ route('tenants.edit', $tenant) }}" 
                       class="px-3.5 py-2 rounded-xl bg-blue-3 hover:bg-blue-4 text-blue-11 text-xs font-semibold transition-colors cursor-pointer">
                        Edit Profil
                    </a>
                @endcan

                <form method="POST" action="{{ route('tenant.switch', $tenant->id) }}" class="m-0">
                    @csrf
                    <button type="submit" 
                            class="px-4 py-2 rounded-xl bg-green-9 hover:bg-green-10 active:bg-green-11 text-white text-xs font-bold transition-all shadow-xs cursor-pointer flex items-center gap-1.5">
                        <x-radix-icon name="enter" class="w-3.5 h-3.5" />
                        <span>Masuk Ruang Kerja</span>
                    </button>
                </form>
            </div>
        </div>

        <!-- Stat Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
            <!-- Total Admin -->
            <div class="bg-white p-5 rounded-2xl border border-gray-6 shadow-[0_1px_3px_rgba(0,0,0,0.03)] flex items-center justify-between">
                <div>
                    <span class="text-xs font-medium text-gray-11 uppercase tracking-wider">Admin Terdaftar</span>
                    <p class="font-display font-bold text-2xl text-gray-12 mt-1">{{ $admins->count() }}</p>
                </div>
                <div class="w-10 h-10 rounded-xl bg-red-3 text-red-11 flex items-center justify-center">
                    <x-radix-icon name="badge" class="w-5 h-5" />
                </div>
            </div>

            <!-- Total Guru -->
            <div class="bg-white p-5 rounded-2xl border border-gray-6 shadow-[0_1px_3px_rgba(0,0,0,0.03)] flex items-center justify-between">
                <div>
                    <span class="text-xs font-medium text-gray-11 uppercase tracking-wider">Guru / Pengajar</span>
                    <p class="font-display font-bold text-2xl text-gray-12 mt-1">{{ $teachers->count() }}</p>
                </div>
                <div class="w-10 h-10 rounded-xl bg-blue-3 text-blue-11 flex items-center justify-center">
                    <x-radix-icon name="person" class="w-5 h-5" />
                </div>
            </div>

            <!-- Total Murid -->
            <div class="bg-white p-5 rounded-2xl border border-gray-6 shadow-[0_1px_3px_rgba(0,0,0,0.03)] flex items-center justify-between">
                <div>
                    <span class="text-xs font-medium text-gray-11 uppercase tracking-wider">Siswa Terdaftar</span>
                    <p class="font-display font-bold text-2xl text-gray-12 mt-1">{{ $students->count() }}</p>
                </div>
                <div class="w-10 h-10 rounded-xl bg-amber-3 text-amber-11 flex items-center justify-center">
                    <x-radix-icon name="avatar" class="w-5 h-5" />
                </div>
            </div>
        </div>

        <!-- Member Lists -->
        <div x-data="{ tab: 'teachers' }" class="space-y-4">
            <div class="flex items-center gap-2 border-b border-gray-6 pb-2 overflow-x-auto">
                <button @click="tab = 'teachers'"
                        :class="tab === 'teachers' ? 'bg-green-3 text-green-11 border-green-7 font-bold' : 'text-gray-11 hover:bg-gray-3 font-medium border-transparent'"
                        class="px-4 py-2 rounded-xl text-sm border transition-colors flex items-center gap-2 shrink-0 cursor-pointer">
                    <x-radix-icon name="person" class="w-4 h-4" />
                    <span>Daftar Guru ({{ $teachers->count() }})</span>
                </button>

                <button @click="tab = 'students'"
                        :class="tab === 'students' ? 'bg-amber-3 text-amber-11 border-amber-7 font-bold' : 'text-gray-11 hover:bg-gray-3 font-medium border-transparent'"
                        class="px-4 py-2 rounded-xl text-sm border transition-colors flex items-center gap-2 shrink-0 cursor-pointer">
                    <x-radix-icon name="avatar" class="w-4 h-4" />
                    <span>Daftar Siswa ({{ $students->count() }})</span>
                </button>

                <button @click="tab = 'admins'"
                        :class="tab === 'admins' ? 'bg-red-3 text-red-11 border-red-7 font-bold' : 'text-gray-11 hover:bg-gray-3 font-medium border-transparent'"
                        class="px-4 py-2 rounded-xl text-sm border transition-colors flex items-center gap-2 shrink-0 cursor-pointer">
                    <x-radix-icon name="badge" class="w-4 h-4" />
                    <span>Admin Tenant ({{ $admins->count() }})</span>
                </button>
            </div>

            <!-- Tab: Teachers -->
            <div x-show="tab === 'teachers'" class="bg-white border border-gray-6 rounded-2xl shadow-[0_1px_3px_rgba(0,0,0,0.03)] overflow-hidden">
                <table class="w-full text-left border-collapse text-xs">
                    <thead>
                        <tr class="border-b border-gray-6 bg-gray-2/50 text-gray-11 uppercase tracking-wider font-semibold">
                            <th class="py-3.5 px-4">Nama Guru</th>
                            <th class="py-3.5 px-4">Email</th>
                            <th class="py-3.5 px-4">Peran</th>
                            <th class="py-3.5 px-4 text-right">Profil Publik</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-5">
                        @forelse($teachers as $teacher)
                            <tr class="hover:bg-gray-2/40 transition-colors">
                                <td class="py-3.5 px-4 font-semibold text-gray-12 flex items-center gap-2.5">
                                    <img src="{{ $teacher->profile_photo_url }}" alt="{{ $teacher->name }}" class="w-7 h-7 rounded-full object-cover border border-gray-5">
                                    <span>{{ $teacher->name }}</span>
                                </td>
                                <td class="py-3.5 px-4 text-gray-11 font-mono">{{ $teacher->email }}</td>
                                <td class="py-3.5 px-4">
                                    <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-md text-[11px] font-semibold text-blue-11 bg-blue-3 border border-blue-6/50">
                                        Guru
                                    </span>
                                </td>
                                <td class="py-3.5 px-4 text-right">
                                    @if($teacher->username)
                                        <a href="{{ route('global.student.profile', $teacher->username) }}" target="_blank" class="px-2.5 py-1 rounded-lg text-xs font-semibold bg-blue-3 hover:bg-blue-4 text-blue-11 transition-colors">
                                            Lihat Profil ↗
                                        </a>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="py-8 text-center text-gray-11 italic">Belum ada guru yang terdaftar di institusi ini.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Tab: Students -->
            <div x-show="tab === 'students'" style="display: none;" class="bg-white border border-gray-6 rounded-2xl shadow-[0_1px_3px_rgba(0,0,0,0.03)] overflow-hidden">
                <table class="w-full text-left border-collapse text-xs">
                    <thead>
                        <tr class="border-b border-gray-6 bg-gray-2/50 text-gray-11 uppercase tracking-wider font-semibold">
                            <th class="py-3.5 px-4">Nama Siswa</th>
                            <th class="py-3.5 px-4">Email</th>
                            <th class="py-3.5 px-4">Peran</th>
                            <th class="py-3.5 px-4 text-right">Profil Publik</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-5">
                        @forelse($students as $student)
                            <tr class="hover:bg-gray-2/40 transition-colors">
                                <td class="py-3.5 px-4 font-semibold text-gray-12 flex items-center gap-2.5">
                                    <img src="{{ $student->profile_photo_url }}" alt="{{ $student->name }}" class="w-7 h-7 rounded-full object-cover border border-gray-5">
                                    <span>{{ $student->name }}</span>
                                </td>
                                <td class="py-3.5 px-4 text-gray-11 font-mono">{{ $student->email }}</td>
                                <td class="py-3.5 px-4">
                                    <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-md text-[11px] font-semibold text-amber-11 bg-amber-3 border border-amber-6/50">
                                        Siswa
                                    </span>
                                </td>
                                <td class="py-3.5 px-4 text-right">
                                    @if($student->username)
                                        <a href="{{ route('global.student.profile', $student->username) }}" target="_blank" class="px-2.5 py-1 rounded-lg text-xs font-semibold bg-amber-3 hover:bg-amber-4 text-amber-11 transition-colors">
                                            Lihat Profil ↗
                                        </a>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="py-8 text-center text-gray-11 italic">Belum ada siswa yang terdaftar di institusi ini.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Tab: Admins -->
            <div x-show="tab === 'admins'" style="display: none;" class="bg-white border border-gray-6 rounded-2xl shadow-[0_1px_3px_rgba(0,0,0,0.03)] overflow-hidden">
                <table class="w-full text-left border-collapse text-xs">
                    <thead>
                        <tr class="border-b border-gray-6 bg-gray-2/50 text-gray-11 uppercase tracking-wider font-semibold">
                            <th class="py-3.5 px-4">Nama Admin</th>
                            <th class="py-3.5 px-4">Email</th>
                            <th class="py-3.5 px-4">Peran</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-5">
                        @forelse($admins as $admin)
                            <tr class="hover:bg-gray-2/40 transition-colors">
                                <td class="py-3.5 px-4 font-semibold text-gray-12 flex items-center gap-2.5">
                                    <img src="{{ $admin->profile_photo_url }}" alt="{{ $admin->name }}" class="w-7 h-7 rounded-full object-cover border border-gray-5">
                                    <span>{{ $admin->name }}</span>
                                </td>
                                <td class="py-3.5 px-4 text-gray-11 font-mono">{{ $admin->email }}</td>
                                <td class="py-3.5 px-4">
                                    <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-md text-[11px] font-semibold text-red-11 bg-red-3 border border-red-6/50">
                                        Admin
                                    </span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="py-8 text-center text-gray-11 italic">Belum ada admin yang terdaftar di institusi ini.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-layouts.app>
