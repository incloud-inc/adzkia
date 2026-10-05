<header class="bg-white border-b border-gray-6 px-6 py-3 h-20 flex items-center justify-between shrink-0 relative z-40 shadow-[0_1px_3px_rgba(0,0,0,0.02)]">
    @php
        $routeName = request()->route()?->getName() ?? '';
        $pageTitle = match(true) {
            $routeName === 'dashboard'                       => 'Dashboard',
            str_starts_with($routeName, 'tenants.')         => 'Manajemen Tenant',
            str_starts_with($routeName, 'assessments.wizard')  => 'Wizard Buat Ujian',
            str_starts_with($routeName, 'assessments.analytics') => 'Analitik Asesmen',
            str_starts_with($routeName, 'assessments.')     => 'Asesmen & Ujian',
            str_starts_with($routeName, 'question-banks.')  => 'Bank Soal Global',
            str_starts_with($routeName, 'question-generator') => 'Studio AI',
            str_starts_with($routeName, 'grade-levels.')    => 'Tingkat Kelas / Jenjang',
            str_starts_with($routeName, 'subjects.')        => 'Mata Pelajaran',
            str_starts_with($routeName, 'profile.')         => 'Profil Akun',
            str_starts_with($routeName, 'wallet.')          => 'Dompet & Saldo',
            str_starts_with($routeName, 'reports.')         => 'Laporan Penjualan',
            str_starts_with($routeName, 'exam.')            => 'Ujian',
            str_starts_with($routeName, 'dashboard.users.') => 'Detail Pengguna',
            str_starts_with($routeName, 'exam-history.')    => 'Riwayat Ujian',
            default                                          => config('app.name', 'ADZKIA'),
        };
    @endphp
    <!-- Left side -->
    <div class="flex items-center gap-4">
        <button 
            @click="sidebarOpen = !sidebarOpen" 
            class="w-11 h-11 rounded-xl border border-gray-7 hover:bg-gray-3 text-gray-11 hover:text-gray-12 flex items-center justify-center transition-colors cursor-pointer"
        >
            <x-radix-icon name="hamburger-menu" class="w-6 h-6" />
        </button>
        <h1 class="font-display font-bold text-xl text-gray-12 hidden sm:block tracking-tight">
            {{ $pageTitle }}
        </h1>
    </div>

    <!-- Right side (Profile & Tenant Switcher) -->
    <div class="flex items-center gap-3 relative" x-data="{ userMenuOpen: false }">
        <button @click="userMenuOpen = !userMenuOpen" @click.away="userMenuOpen = false" class="flex items-center gap-3.5 text-left focus:outline-none group cursor-pointer">
            <div class="text-right hidden sm:block group-hover:opacity-80 transition-opacity">
                <p class="font-bold text-base text-gray-12 leading-tight">{{ auth()->user()->name ?? 'User' }}</p>
                <p class="text-sm text-gray-11 font-semibold mt-0.5">
                    @if(auth()->check() && auth()->user()->isSuperUser() && !auth()->user()->current_tenant_id)
                        ADZKIA Pusat (Owner)
                    @elseif(app()->has('currentTenant'))
                        {{ app('currentTenant')->name }}
                    @elseif(auth()->check() && auth()->user()->currentTenant)
                        {{ auth()->user()->currentTenant->name }}
                    @else
                        ADZKIA
                    @endif
                </p>
            </div>
            @if(auth()->check())
                <img src="{{ auth()->user()->profile_photo_url }}" 
                     alt="{{ auth()->user()->name ?? 'User' }}" 
                     class="w-11 h-11 rounded-full object-cover border border-gray-6 shadow-xs shrink-0"
                     onerror="this.style.display='none'; if(this.nextElementSibling) this.nextElementSibling.style.display='flex';" />
                <div class="w-11 h-11 rounded-full bg-green-9 text-white font-extrabold text-base items-center justify-center shadow-xs shrink-0 hidden">
                    {{ substr(auth()->user()->name ?? 'U', 0, 1) }}
                </div>
            @else
                <div class="w-11 h-11 rounded-full bg-green-9 text-white font-extrabold text-base flex items-center justify-center shadow-xs shrink-0">
                    U
                </div>
            @endif
            <span class="inline-flex transition-transform duration-200 text-gray-9" :class="{'rotate-180': userMenuOpen}">
                <x-radix-icon name="caret-down" class="w-5 h-5" />
            </span>
        </button>

        <!-- Radix Dropdown Menu -->
        <div x-show="userMenuOpen" 
             x-transition:enter="transition ease-out duration-150"
             x-transition:enter-start="transform opacity-0 scale-95 -translate-y-1"
             x-transition:enter-end="transform opacity-100 scale-100 translate-y-0"
             x-transition:leave="transition ease-in duration-100"
             x-transition:leave-start="transform opacity-100 scale-100 translate-y-0"
             x-transition:leave-end="transform opacity-0 scale-95 -translate-y-1"
             class="absolute right-0 top-full mt-2 w-72 bg-white rounded-2xl shadow-[0_12px_40px_rgba(0,0,0,0.15),0_2px_8px_rgba(0,0,0,0.06)] border border-gray-6 overflow-hidden z-50 p-2"
             style="display: none;">
            
            <div class="px-3 py-2 border-b border-gray-5 mb-1.5">
                <p class="text-xs font-bold text-gray-9 uppercase tracking-wider mb-2">Ganti Ruang Kerja</p>
                
                @if(auth()->check() && auth()->user()->isSuperUser())
                    <form method="POST" action="{{ route('tenant.switch', 'global') }}" class="m-0 mb-2">
                        @csrf
                        <button type="submit" class="w-full text-left px-3 py-2 rounded-xl text-xs font-semibold flex items-center justify-between cursor-pointer {{ !auth()->user()->current_tenant_id ? 'bg-amber-3 text-amber-11 border border-amber-6/50' : 'text-gray-12 hover:bg-gray-3 transition-colors border border-transparent' }}">
                            <span class="truncate flex items-center gap-2">
                                <x-radix-icon name="globe" class="w-4 h-4 text-amber-9 shrink-0" />
                                <span>Semua Tenant (Global)</span>
                            </span>
                            @if(!auth()->user()->current_tenant_id)
                                <x-radix-icon name="check" class="w-4 h-4 shrink-0 text-amber-11" />
                            @endif
                        </button>
                    </form>
                @endif

                @if(auth()->check() && auth()->user()->tenants->count() > 0)
                    <div class="space-y-1.5 max-h-56 overflow-y-auto custom-scrollbar">
                        @foreach(auth()->user()->tenants as $tenant)
                            <form method="POST" action="{{ route('tenant.switch', $tenant->id) }}" class="m-0">
                                @csrf
                                <button type="submit" class="w-full text-left px-3 py-2.5 rounded-xl text-sm font-semibold flex items-center justify-between cursor-pointer {{ auth()->user()->current_tenant_id === $tenant->id ? 'bg-green-3 text-green-11' : 'text-gray-12 hover:bg-gray-3 transition-colors' }}">
                                    <span class="truncate pr-2">{{ $tenant->name }}</span>
                                    @if(auth()->user()->current_tenant_id === $tenant->id)
                                        <x-radix-icon name="check" class="w-4.5 h-4.5 shrink-0 text-green-11" />
                                    @endif
                                </button>
                            </form>
                        @endforeach
                    </div>
                @else
                    <p class="text-xs text-gray-9 italic px-2 py-1">Tidak ada afiliasi</p>
                @endif
            </div>

            <div class="pt-1">
                <a href="{{ route('profile.edit') }}" class="w-full text-left px-3 py-2.5 rounded-xl text-sm font-bold text-gray-11 hover:bg-gray-3 hover:text-gray-12 transition-colors flex items-center gap-2.5 cursor-pointer mb-1">
                    <x-radix-icon name="person" class="w-4.5 h-4.5" />
                    <span>Profil Saya</span>
                </a>
                <form method="POST" action="{{ route('logout') }}" class="m-0">
                    @csrf
                    <button type="submit" class="w-full text-left px-3 py-2.5 rounded-xl text-sm font-bold text-red-11 hover:bg-red-3 transition-colors flex items-center gap-2.5 cursor-pointer">
                        <x-radix-icon name="exit" class="w-4.5 h-4.5 text-red-11" />
                        <span>Keluar</span>
                    </button>
                </form>
            </div>
        </div>
    </div>
</header>
