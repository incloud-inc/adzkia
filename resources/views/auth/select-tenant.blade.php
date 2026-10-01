<x-layouts.guest>
    <!-- HEADER -->
    <header class="bg-green-9 text-white px-6 py-4 flex justify-between items-center z-10 shrink-0">
        <div>
            <h1 class="font-display font-extrabold text-2xl tracking-tight leading-none mb-1">ADZKIA</h1>
            <p class="font-display text-xs text-green-3 font-semibold tracking-widest uppercase">Pilih Ruang Kerja</p>
        </div>
    </header>

    <!-- AREA RUANG KERJA -->
    <section class="flex-1 overflow-y-auto p-6 md:p-8 space-y-4">
        
        <!-- Radix Callout -->
        <div class="bg-green-2 border border-green-6 text-green-11 rounded-xl p-3.5 flex items-start gap-3 text-xs leading-relaxed">
            <x-radix-icon name="info-circled" class="w-4 h-4 text-green-10 shrink-0 mt-0.5" />
            <div>
                <p class="font-semibold text-green-12">Pilih Ruang Kerja Anda</p>
                <p class="text-green-11 mt-0.5">Akun Anda terdaftar di beberapa institusi. Silakan pilih salah satu untuk melanjutkan sesi.</p>
            </div>
        </div>

        <form id="tenant-form" method="POST" action="" class="space-y-3 pb-6">
            @csrf
            
            @foreach($tenants as $tenant)
                <label class="flex items-start gap-3.5 p-4 rounded-xl border border-gray-6 bg-white hover:border-gray-8 hover:bg-gray-2/50 has-[:checked]:border-green-8 has-[:checked]:bg-green-2/30 has-[:checked]:ring-1 has-[:checked]:ring-green-8 cursor-pointer transition-all group relative shadow-[0_1px_3px_rgba(0,0,0,0.03)]"
                       onclick="document.getElementById('tenant-form').action = '{{ route('tenant.switch', $tenant->id) }}';">
                    <input type="radio" name="tenant_id" value="{{ $tenant->id }}" required class="mt-0.5 w-4 h-4 text-green-9 shrink-0 focus:ring-green-8 accent-green-9 cursor-pointer">
                    
                    <div class="flex-1">
                        <div class="flex items-center justify-between">
                            <span class="text-gray-12 text-sm font-semibold group-hover:text-gray-12 leading-snug tracking-tight">
                                {{ $tenant->name }}
                            </span>
                            <x-radix-icon name="chevron-right" class="w-4 h-4 text-gray-8 group-hover:text-gray-11 transition-colors" />
                        </div>
                        
                        <div class="mt-2 flex items-center gap-1.5">
                            @if($tenant->pivot->role === 'S')
                                <span class="text-[11px] font-medium text-amber-11 bg-amber-3 border border-amber-6/50 px-2 py-0.5 rounded-md inline-flex items-center gap-1">
                                    <x-radix-icon name="star-filled" class="w-3 h-3 text-amber-9" />
                                    Super User
                                </span>
                            @elseif($tenant->pivot->role === 'A')
                                <span class="text-[11px] font-medium text-red-11 bg-red-3 border border-red-6/50 px-2 py-0.5 rounded-md inline-flex items-center gap-1">
                                    <x-radix-icon name="badge" class="w-3 h-3" />
                                    Admin
                                </span>
                            @elseif($tenant->pivot->role === 'T')
                                <span class="text-[11px] font-medium text-blue-11 bg-blue-3 border border-blue-6/50 px-2 py-0.5 rounded-md inline-flex items-center gap-1">
                                    <x-radix-icon name="person" class="w-3 h-3" />
                                    Guru
                                </span>
                            @elseif($tenant->pivot->role === 'U')
                                <span class="text-[11px] font-medium text-green-11 bg-green-3 border border-green-6/50 px-2 py-0.5 rounded-md inline-flex items-center gap-1">
                                    <x-radix-icon name="avatar" class="w-3 h-3" />
                                    Siswa
                                </span>
                            @else
                                <span class="text-[11px] font-medium text-gray-11 bg-gray-3 border border-gray-6 px-2 py-0.5 rounded-md inline-flex items-center gap-1">
                                    User
                                </span>
                            @endif
                        </div>
                    </div>
                </label>
            @endforeach
        </form>
    </section>

    <!-- FOOTER -->
    <footer class="shrink-0 bg-white border-t border-gray-6 flex flex-col z-10 shadow-[0_-4px_12px_rgba(0,0,0,0.03)]">
        <div class="w-full flex items-center justify-between px-6 py-3 bg-gray-2/70">
            <form method="POST" action="{{ route('logout') }}" class="m-0">
                @csrf
                <button type="submit" class="shrink-0 h-9 px-4 rounded-lg text-xs font-medium border border-gray-7 bg-white text-gray-11 hover:text-gray-12 hover:bg-gray-3 transition-all flex items-center gap-1.5 cursor-pointer shadow-[0_1px_2px_rgba(0,0,0,0.02)] active:scale-[0.98]">
                    <x-radix-icon name="exit" class="w-3.5 h-3.5" />
                    <span>KELUAR</span>
                </button>
            </form>

            <button onclick="document.getElementById('tenant-form').submit()" class="shrink-0 h-9 px-5 rounded-lg text-xs font-semibold bg-green-9 hover:bg-green-10 active:bg-green-11 text-white flex items-center justify-center gap-1.5 transition-all shadow-[0_1px_2px_rgba(0,0,0,0.06)] active:scale-[0.98] cursor-pointer">
                <span>LANJUTKAN</span>
                <x-radix-icon name="arrow-right" class="w-3.5 h-3.5" />
            </button>
        </div>
    </footer>
</x-layouts.guest>
