<aside 
    class="bg-white border-r border-gray-6 shadow-[0_1px_3px_rgba(0,0,0,0.02)] flex flex-col transition-all duration-300 ease-in-out shrink-0 h-full z-20 absolute lg:relative"
    :class="sidebarOpen ? 'w-72 translate-x-0' : '-translate-x-full lg:translate-x-0 lg:w-[84px]'"
>
    @php
        $currentTenant = app()->has('currentTenant') ? app('currentTenant') : (auth()->user()?->currentTenant ?? auth()->user()?->tenants()->first());
    @endphp
    <!-- Brand / Logo: Logo & Icon ADZKIA permanen, tidak berubah walaupun level ENTERPRISE -->
    <div class="h-20 flex items-center justify-center border-b border-gray-6 shrink-0 relative overflow-hidden transition-all duration-300 px-3">
        <!-- Logo Brand Lengkap (Saat Sidebar Terbuka) -->
        <a href="{{ route('dashboard') }}" 
           x-show="sidebarOpen"
           x-cloak
           class="w-full flex items-center justify-center px-2 py-1.5 select-none transition-all duration-300"
           title="Aplikasi Ujian ADZKIA">
            <img src="{{ asset('APLIKASI UJIAN.png') }}" 
                 alt="Aplikasi Ujian ADZKIA" 
                 class="h-11 w-auto max-w-[200px] object-contain drop-shadow-xs transition-transform duration-200 hover:scale-105">
        </a>

        <!-- Icon Brand (Saat Sidebar Di-minimize) -->
        <a href="{{ route('dashboard') }}" 
           x-show="!sidebarOpen"
           x-cloak
           class="w-full flex items-center justify-center select-none py-1.5 transition-all duration-300"
           title="Aplikasi Ujian ADZKIA">
            <img src="{{ asset('adzkia black app.png') }}" 
                 alt="Aplikasi Ujian ADZKIA" 
                 class="w-12 h-12 max-w-[48px] max-h-[48px] object-contain drop-shadow-xs transition-transform duration-200 hover:scale-110">
        </a>
    </div>

    <!-- Navigation -->
    <nav class="flex-1 overflow-y-auto hide-scrollbar py-5 px-3.5 space-y-2">
        @if(auth()->check() && auth()->user()->isSuperUser())
            <!-- ============================================== -->
            <!--            SUPER USER (OWNER) MENU             -->
            <!-- ============================================== -->
            <a href="{{ route('dashboard') }}" 
               class="flex items-center gap-4 px-4 py-3 rounded-xl {{ request()->routeIs('dashboard') ? 'bg-green-3 text-green-11 font-bold' : 'text-gray-11 hover:bg-gray-3 hover:text-gray-12 font-medium' }} text-base transition-colors group relative overflow-hidden"
               :class="sidebarOpen ? 'justify-start' : 'justify-start lg:justify-center'">
                <x-radix-icon name="dashboard" class="w-6 h-6 shrink-0" />
                <span class="truncate transition-opacity duration-300 text-base" :class="sidebarOpen ? 'opacity-100' : 'opacity-0 lg:hidden'">Dashboard</span>
            </a>

            <a href="{{ route('tenants.index') }}" 
               class="flex items-center gap-4 px-4 py-3 rounded-xl {{ request()->routeIs('tenants.*') ? 'bg-green-3 text-green-11 font-bold' : 'text-gray-11 hover:bg-gray-3 hover:text-gray-12 font-medium' }} text-base transition-colors group relative overflow-hidden"
               :class="sidebarOpen ? 'justify-start' : 'justify-start lg:justify-center'">
                <x-radix-icon name="backpack" class="w-6 h-6 shrink-0" />
                <span class="truncate transition-opacity duration-300 text-base" :class="sidebarOpen ? 'opacity-100' : 'opacity-0 lg:hidden'">Manajemen Tenant</span>
            </a>

            <a href="{{ route('question-generator.index') }}" 
               class="flex items-center gap-4 px-4 py-3 rounded-xl {{ request()->routeIs('question-generator.*') ? 'bg-green-3 text-green-11 font-bold' : 'text-gray-11 hover:bg-gray-3 hover:text-gray-12 font-medium' }} text-base transition-colors group relative overflow-hidden"
               :class="sidebarOpen ? 'justify-start' : 'justify-start lg:justify-center'"
               title="Studio Pembuat Soal AI">
                <x-radix-icon name="magic-wand" class="w-6 h-6 shrink-0 {{ request()->routeIs('question-generator.*') ? 'text-green-11' : 'text-emerald-600' }}" />
                <span class="truncate transition-opacity duration-300 text-base font-medium flex items-center justify-between w-full" :class="sidebarOpen ? 'opacity-100' : 'opacity-0 lg:hidden'">
                    <span>Studio AI</span>
                    <span class="inline-flex items-center px-1.5 py-0.5 text-[10px] font-extrabold uppercase tracking-wider text-emerald-800 bg-emerald-100 border border-emerald-300 rounded-md">
                        AI
                    </span>
                </span>
            </a>

            <a href="{{ route('assessments.index') }}" 
               class="flex items-center gap-4 px-4 py-3 rounded-xl {{ request()->routeIs('assessments.*') ? 'bg-green-3 text-green-11 font-bold' : 'text-gray-11 hover:bg-gray-3 hover:text-gray-12 font-medium' }} text-base transition-colors group relative overflow-hidden"
               :class="sidebarOpen ? 'justify-start' : 'justify-start lg:justify-center'">
                <div class="relative shrink-0">
                    <x-radix-icon name="file-text" class="w-6 h-6" />
                    @if(isset($pendingGradingCount) && $pendingGradingCount > 0)
                        <span class="absolute -top-1 -right-1 w-2.5 h-2.5 bg-rose-600 rounded-full border border-white" :class="sidebarOpen ? 'hidden' : 'block'"></span>
                    @endif
                </div>
                <span class="truncate transition-opacity duration-300 text-base font-medium flex items-center gap-1.5" :class="sidebarOpen ? 'opacity-100' : 'opacity-0 lg:hidden'">
                    <span>Bank Soal Global</span>
                    @if(isset($pendingGradingCount) && $pendingGradingCount > 0)
                        <span class="inline-flex items-center justify-center px-1.5 py-0.5 text-xs font-bold leading-none text-white bg-rose-600 rounded-full shadow-2xs font-mono">
                            {{ $pendingGradingCount }}
                        </span>
                    @endif
                </span>
            </a>

            <a href="{{ route('grade-levels.index') }}" 
               class="flex items-center gap-4 px-4 py-3 rounded-xl {{ request()->routeIs('grade-levels.*') ? 'bg-green-3 text-green-11 font-bold' : 'text-gray-11 hover:bg-gray-3 hover:text-gray-12 font-medium' }} text-base transition-colors group relative overflow-hidden"
               :class="sidebarOpen ? 'justify-start' : 'justify-start lg:justify-center'">
                <x-radix-icon name="layers" class="w-6 h-6 shrink-0" />
                <span class="truncate transition-opacity duration-300 text-base font-medium" :class="sidebarOpen ? 'opacity-100' : 'opacity-0 lg:hidden'">Tingkat Kelas/Jenjang</span>
            </a>

            <a href="{{ route('subjects.index') }}" 
               class="flex items-center gap-4 px-4 py-3 rounded-xl {{ request()->routeIs('subjects.*') ? 'bg-green-3 text-green-11 font-bold' : 'text-gray-11 hover:bg-gray-3 hover:text-gray-12 font-medium' }} text-base transition-colors group relative overflow-hidden"
               :class="sidebarOpen ? 'justify-start' : 'justify-start lg:justify-center'">
                <x-radix-icon name="bookmark" class="w-6 h-6 shrink-0" />
                <span class="truncate transition-opacity duration-300 text-base font-medium" :class="sidebarOpen ? 'opacity-100' : 'opacity-0 lg:hidden'">Mata Pelajaran</span>
            </a>

            <a href="{{ route('dichotomy-presets.index') }}" 
               class="flex items-center gap-4 px-4 py-3 rounded-xl {{ request()->routeIs('dichotomy-presets.*') ? 'bg-green-3 text-green-11 font-bold' : 'text-gray-11 hover:bg-gray-3 hover:text-gray-12 font-medium' }} text-base transition-colors group relative overflow-hidden"
               :class="sidebarOpen ? 'justify-start' : 'justify-start lg:justify-center'">
                <x-radix-icon name="table" class="w-6 h-6 shrink-0" />
                <span class="truncate transition-opacity duration-300 text-base font-medium" :class="sidebarOpen ? 'opacity-100' : 'opacity-0 lg:hidden'">Preset Tabel Dikotomi</span>
            </a>

            <a href="{{ route('reports.sales') }}" 
               class="flex items-center gap-4 px-4 py-3 rounded-xl {{ request()->routeIs('reports.sales*') ? 'bg-green-3 text-green-11 font-bold' : 'text-gray-11 hover:bg-gray-3 hover:text-gray-12 font-medium' }} text-base transition-colors group relative overflow-hidden"
               :class="sidebarOpen ? 'justify-start' : 'justify-start lg:justify-center'">
                <x-radix-icon name="pie-chart" class="w-6 h-6 shrink-0" />
                <span class="truncate transition-opacity duration-300 text-base font-medium" :class="sidebarOpen ? 'opacity-100' : 'opacity-0 lg:hidden'">Laporan Penjualan</span>
            </a>

            <a href="{{ route('wallet.index') }}" 
               class="flex items-center gap-4 px-4 py-3 rounded-xl {{ request()->routeIs('wallet.*') ? 'bg-green-3 text-green-11 font-bold' : 'text-gray-11 hover:bg-gray-3 hover:text-gray-12 font-medium' }} text-base transition-colors group relative overflow-hidden"
               :class="sidebarOpen ? 'justify-start' : 'justify-start lg:justify-center'">
                <x-radix-icon name="card-stack" class="w-6 h-6 shrink-0" />
                <span class="truncate transition-opacity duration-300 text-base font-medium" :class="sidebarOpen ? 'opacity-100' : 'opacity-0 lg:hidden'">Dompet Saldo</span>
            </a>

            <a href="{{ route('settings.index') }}" 
               class="flex items-center gap-4 px-4 py-3 rounded-xl {{ request()->routeIs('settings.*') ? 'bg-green-3 text-green-11 font-bold' : 'text-gray-11 hover:bg-gray-3 hover:text-gray-12 font-medium' }} text-base transition-colors group relative overflow-hidden"
               :class="sidebarOpen ? 'justify-start' : 'justify-start lg:justify-center'">
                <x-radix-icon name="gear" class="w-6 h-6 shrink-0" />
                <span class="truncate transition-opacity duration-300 text-base font-medium" :class="sidebarOpen ? 'opacity-100' : 'opacity-0 lg:hidden'">Pengaturan Sistem</span>
            </a>

        @elseif(auth()->check() && auth()->user()->isAdmin())
            <!-- ============================================== -->
            <!--               ADMIN TENANT MENU                -->
            <!-- ============================================== -->
            <a href="{{ route('dashboard') }}" 
               class="flex items-center gap-4 px-4 py-3 rounded-xl {{ request()->routeIs('dashboard') ? 'bg-green-3 text-green-11 font-bold' : 'text-gray-11 hover:bg-gray-3 hover:text-gray-12 font-medium' }} text-base transition-colors group relative overflow-hidden"
               :class="sidebarOpen ? 'justify-start' : 'justify-start lg:justify-center'">
                <x-radix-icon name="dashboard" class="w-6 h-6 shrink-0" />
                <span class="truncate transition-opacity duration-300 text-base" :class="sidebarOpen ? 'opacity-100' : 'opacity-0 lg:hidden'">Dashboard</span>
            </a>

            @if($currentTenant && $currentTenant->canAccessStudioAi())
            <a href="{{ route('question-generator.index') }}" 
               class="flex items-center gap-4 px-4 py-3 rounded-xl {{ request()->routeIs('question-generator.*') ? 'bg-green-3 text-green-11 font-bold' : 'text-gray-11 hover:bg-gray-3 hover:text-gray-12 font-medium' }} text-base transition-colors group relative overflow-hidden"
               :class="sidebarOpen ? 'justify-start' : 'justify-start lg:justify-center'"
               title="Studio Pembuat Soal AI">
                <x-radix-icon name="magic-wand" class="w-6 h-6 shrink-0 {{ request()->routeIs('question-generator.*') ? 'text-green-11' : 'text-emerald-600' }}" />
                <span class="truncate transition-opacity duration-300 text-base font-medium flex items-center justify-between w-full" :class="sidebarOpen ? 'opacity-100' : 'opacity-0 lg:hidden'">
                    <span>Studio AI</span>
                    <span class="inline-flex items-center px-1.5 py-0.5 text-[10px] font-extrabold uppercase tracking-wider text-emerald-800 bg-emerald-100 border border-emerald-300 rounded-md">
                        AI
                    </span>
                </span>
            </a>
            @endif

            <a href="{{ route('assessments.index') }}" 
               class="flex items-center gap-4 px-4 py-3 rounded-xl {{ request()->routeIs('assessments.*') ? 'bg-green-3 text-green-11 font-bold' : 'text-gray-11 hover:bg-gray-3 hover:text-gray-12 font-medium' }} text-base transition-colors group relative overflow-hidden"
               :class="sidebarOpen ? 'justify-start' : 'justify-start lg:justify-center'">
                <div class="relative shrink-0">
                    <x-radix-icon name="file-text" class="w-6 h-6" />
                    @if(isset($pendingGradingCount) && $pendingGradingCount > 0)
                        <span class="absolute -top-1 -right-1 w-2.5 h-2.5 bg-rose-600 rounded-full border border-white" :class="sidebarOpen ? 'hidden' : 'block'"></span>
                    @endif
                </div>
                <span class="truncate transition-opacity duration-300 text-base font-medium flex items-center gap-1.5" :class="sidebarOpen ? 'opacity-100' : 'opacity-0 lg:hidden'">
                    <span>Bank Soal</span>
                    @if(isset($pendingGradingCount) && $pendingGradingCount > 0)
                        <span class="inline-flex items-center justify-center px-1.5 py-0.5 text-xs font-bold leading-none text-white bg-rose-600 rounded-full shadow-2xs font-mono">
                            {{ $pendingGradingCount }}
                        </span>
                    @endif
                </span>
            </a>

            <a href="{{ route('reports.sales') }}" 
               class="flex items-center gap-4 px-4 py-3 rounded-xl {{ request()->routeIs('reports.sales*') ? 'bg-green-3 text-green-11 font-bold' : 'text-gray-11 hover:bg-gray-3 hover:text-gray-12 font-medium' }} text-base transition-colors group relative overflow-hidden"
               :class="sidebarOpen ? 'justify-start' : 'justify-start lg:justify-center'">
                <x-radix-icon name="pie-chart" class="w-6 h-6 shrink-0" />
                <span class="truncate transition-opacity duration-300 text-base font-medium" :class="sidebarOpen ? 'opacity-100' : 'opacity-0 lg:hidden'">Laporan Penjualan</span>
            </a>

            <a href="{{ route('wallet.index') }}" 
               class="flex items-center gap-4 px-4 py-3 rounded-xl {{ request()->routeIs('wallet.*') ? 'bg-green-3 text-green-11 font-bold' : 'text-gray-11 hover:bg-gray-3 hover:text-gray-12 font-medium' }} text-base transition-colors group relative overflow-hidden"
               :class="sidebarOpen ? 'justify-start' : 'justify-start lg:justify-center'">
                <x-radix-icon name="card-stack" class="w-6 h-6 shrink-0" />
                <span class="truncate transition-opacity duration-300 text-base font-medium" :class="sidebarOpen ? 'opacity-100' : 'opacity-0 lg:hidden'">Dompet Saldo</span>
            </a>

            @if(auth()->user()->currentTenant)
                <a href="{{ route('tenants.branding.edit', auth()->user()->currentTenant) }}" 
                    class="flex items-center gap-4 px-4 py-3 rounded-xl {{ request()->routeIs('tenants.branding.*') ? 'bg-green-3 text-green-11 font-bold' : 'text-gray-11 hover:bg-gray-3 hover:text-gray-12 font-medium' }} text-base transition-colors group relative overflow-hidden"
                    :class="sidebarOpen ? 'justify-start' : 'justify-start lg:justify-center'">
                    <x-radix-icon name="gear" class="w-6 h-6 shrink-0" />
                    <span class="truncate transition-opacity duration-300 text-base font-medium" :class="sidebarOpen ? 'opacity-100' : 'opacity-0 lg:hidden'">Pengaturan Tenant</span>
                </a>
            @endif

        @elseif(auth()->check() && auth()->user()->isTeacher())
            <!-- ============================================== -->
            <!--               TEACHER / GURU MENU              -->
            <!-- ============================================== -->
            <a href="{{ route('dashboard') }}" 
               class="flex items-center gap-4 px-4 py-3 rounded-xl {{ request()->routeIs('dashboard') ? 'bg-green-3 text-green-11 font-bold' : 'text-gray-11 hover:bg-gray-3 hover:text-gray-12 font-medium' }} text-base transition-colors group relative overflow-hidden"
               :class="sidebarOpen ? 'justify-start' : 'justify-start lg:justify-center'">
                <x-radix-icon name="dashboard" class="w-6 h-6 shrink-0" />
                <span class="truncate transition-opacity duration-300 text-base" :class="sidebarOpen ? 'opacity-100' : 'opacity-0 lg:hidden'">Dashboard Guru</span>
            </a>

            @if($currentTenant && $currentTenant->canAccessStudioAi())
            <a href="{{ route('question-generator.index') }}" 
               class="flex items-center gap-4 px-4 py-3 rounded-xl {{ request()->routeIs('question-generator.*') ? 'bg-green-3 text-green-11 font-bold' : 'text-gray-11 hover:bg-gray-3 hover:text-gray-12 font-medium' }} text-base transition-colors group relative overflow-hidden"
               :class="sidebarOpen ? 'justify-start' : 'justify-start lg:justify-center'"
               title="Studio Pembuat Soal AI">
                <x-radix-icon name="magic-wand" class="w-6 h-6 shrink-0 {{ request()->routeIs('question-generator.*') ? 'text-green-11' : 'text-emerald-600' }}" />
                <span class="truncate transition-opacity duration-300 text-base font-medium flex items-center justify-between w-full" :class="sidebarOpen ? 'opacity-100' : 'opacity-0 lg:hidden'">
                    <span>Studio AI</span>
                    <span class="inline-flex items-center px-1.5 py-0.5 text-[10px] font-extrabold uppercase tracking-wider text-emerald-800 bg-emerald-100 border border-emerald-300 rounded-md">
                        AI
                    </span>
                </span>
            </a>
            @endif

            <a href="{{ route('assessments.index') }}" 
               class="flex items-center gap-4 px-4 py-3 rounded-xl {{ request()->routeIs('assessments.*') ? 'bg-green-3 text-green-11 font-bold' : 'text-gray-11 hover:bg-gray-3 hover:text-gray-12 font-medium' }} text-base transition-colors group relative overflow-hidden"
               :class="sidebarOpen ? 'justify-start' : 'justify-start lg:justify-center'">
                <div class="relative shrink-0">
                    <x-radix-icon name="file-text" class="w-6 h-6" />
                    @if(isset($pendingGradingCount) && $pendingGradingCount > 0)
                        <span class="absolute -top-1 -right-1 w-2.5 h-2.5 bg-rose-600 rounded-full border border-white" :class="sidebarOpen ? 'hidden' : 'block'"></span>
                    @endif
                </div>
                <span class="truncate transition-opacity duration-300 text-base font-medium flex items-center gap-1.5" :class="sidebarOpen ? 'opacity-100' : 'opacity-0 lg:hidden'">
                    <span>Bank Soal</span>
                    @if(isset($pendingGradingCount) && $pendingGradingCount > 0)
                        <span class="inline-flex items-center justify-center px-1.5 py-0.5 text-xs font-bold leading-none text-white bg-rose-600 rounded-full shadow-2xs font-mono">
                            {{ $pendingGradingCount }}
                        </span>
                    @endif
                </span>
            </a>

            <a href="{{ route('assessments.index') }}" 
               class="flex items-center gap-4 px-4 py-3 rounded-xl {{ request()->routeIs('assessments.grading*') || request()->routeIs('assessments.analytics*') ? 'bg-green-3 text-green-11 font-bold' : 'text-gray-11 hover:bg-gray-3 hover:text-gray-12 font-medium' }} text-base transition-colors group relative overflow-hidden"
               :class="sidebarOpen ? 'justify-start' : 'justify-start lg:justify-center'">
                <x-radix-icon name="bar-chart" class="w-6 h-6 shrink-0" />
                <span class="truncate transition-opacity duration-300 text-base font-medium" :class="sidebarOpen ? 'opacity-100' : 'opacity-0 lg:hidden'">Rekap Nilai Siswa</span>
            </a>

        @else
            <!-- ============================================== -->
            <!--             STUDENT / SISWA (USER) MENU        -->
            <!-- ============================================== -->
            <a href="{{ route('dashboard') }}" 
               class="flex items-center gap-4 px-4 py-3 rounded-xl {{ request()->routeIs('dashboard') ? 'bg-green-3 text-green-11 font-bold' : 'text-gray-11 hover:bg-gray-3 hover:text-gray-12 font-medium' }} text-base transition-colors group relative overflow-hidden"
               :class="sidebarOpen ? 'justify-start' : 'justify-start lg:justify-center'">
                <x-radix-icon name="dashboard" class="w-6 h-6 shrink-0" />
                <span class="truncate transition-opacity duration-300 text-base" :class="sidebarOpen ? 'opacity-100' : 'opacity-0 lg:hidden'">Dashboard Siswa</span>
            </a>

            <a href="{{ route('assessments.index') }}" 
               class="flex items-center gap-4 px-4 py-3 rounded-xl {{ (request()->routeIs('assessments.*') || request()->routeIs('exam.gate.*') || request()->routeIs('exam.workspace')) ? 'bg-green-3 text-green-11 font-bold' : 'text-gray-11 hover:bg-gray-3 hover:text-gray-12 font-medium' }} text-base transition-colors group relative overflow-hidden"
               :class="sidebarOpen ? 'justify-start' : 'justify-start lg:justify-center'">
                <x-radix-icon name="pencil1" class="w-6 h-6 shrink-0" />
                <span class="truncate transition-opacity duration-300 text-base font-medium" :class="sidebarOpen ? 'opacity-100' : 'opacity-0 lg:hidden'">Ujian Aktif / CBT</span>
            </a>

            <a href="{{ route('exam.history') }}" 
               class="flex items-center gap-4 px-4 py-3 rounded-xl {{ (request()->routeIs('exam.history') || request()->routeIs('exam.result') || request()->routeIs('exam.analysis')) ? 'bg-green-3 text-green-11 font-bold' : 'text-gray-11 hover:bg-gray-3 hover:text-gray-12 font-medium' }} text-base transition-colors group relative overflow-hidden"
               :class="sidebarOpen ? 'justify-start' : 'justify-start lg:justify-center'">
                <x-radix-icon name="file-text" class="w-6 h-6 shrink-0" />
                <span class="truncate transition-opacity duration-300 text-base font-medium" :class="sidebarOpen ? 'opacity-100' : 'opacity-0 lg:hidden'">Riwayat Ujian</span>
            </a>
        @endif
    </nav>
</aside>
<!-- Backdrop for mobile -->
<div x-show="sidebarOpen" style="display: none;" x-transition.opacity class="fixed inset-0 bg-gray-12/40 z-10 lg:hidden" @click="sidebarOpen = false"></div>
