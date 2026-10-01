<x-layouts.app>
    <div class="space-y-6" x-data="{
        toastMessage: '',
        showToast: false,
        toastType: 'success',
        triggerToast(msg, type = 'success') {
            this.toastMessage = msg;
            this.toastType = type;
            this.showToast = true;
            setTimeout(() => { this.showToast = false; }, 4000);
        },
        async updateTenantPlan(tenantId, newPlan, tenantName) {
            try {
                const response = await fetch(`/tenants/${tenantId}/plan`, {
                    method: 'PATCH',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify({ plan: newPlan })
                });
                const data = await response.json();
                if (data.success) {
                    this.triggerToast(`${tenantName} dialihkan ke level ${data.level_label} (Bagi hasil: ${data.revenue_share})`, 'success');
                } else {
                    this.triggerToast(data.message || 'Gagal mengubah level tenant', 'error');
                }
            } catch (err) {
                console.error(err);
                this.triggerToast('Terjadi kesalahan jaringan saat mengubah level', 'error');
            }
        }
    }">
        <!-- Floating Toast Notification -->
        <div x-show="showToast" 
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0 transform -translate-y-3"
             x-transition:enter-end="opacity-100 transform translate-y-0"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100 transform translate-y-0"
             x-transition:leave-end="opacity-0 transform -translate-y-3"
             class="fixed top-6 right-6 z-50 flex items-center gap-3 px-4 py-3 rounded-xl shadow-xl text-sm font-semibold text-white"
             :class="toastType === 'success' ? 'bg-emerald-600' : 'bg-red-600'"
             style="display: none;">
            <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path></svg>
            <span x-text="toastMessage"></span>
        </div>

        <!-- Header & Action Button -->
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
            <div>
                <h1 class="font-display font-bold text-2xl text-gray-12 tracking-tight">Manajemen Institusi / Tenant</h1>
                <p class="text-sm text-gray-11 mt-1">Kelola data sekolah, tingkatan branding/white-label, serta skema bagi hasil ekosistem ADZKIA.</p>
            </div>

            @can('create', App\Models\Tenant::class)
                <a href="{{ route('tenants.create') }}" 
                   class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl bg-green-9 hover:bg-green-10 active:bg-green-11 text-white text-sm font-semibold transition-all shadow-[0_1px_2px_rgba(0,0,0,0.06)] active:scale-[0.98] cursor-pointer">
                    <x-radix-icon name="plus" class="w-4 h-4" />
                    <span>Tambah Institusi</span>
                </a>
            @endcan
        </div>

        @if(session('success'))
            <div class="bg-green-2 border border-green-6 text-green-11 rounded-xl p-4 flex items-center justify-between text-sm">
                <div class="flex items-center gap-3">
                    <x-radix-icon name="check-circled" class="w-5 h-5 text-green-10 shrink-0" />
                    <span class="font-medium text-green-12">{{ session('success') }}</span>
                </div>
            </div>
        @endif

        <!-- Filter & Search Bar -->
        <div class="bg-white p-3 rounded-xl border border-gray-6 shadow-[0_1px_3px_rgba(0,0,0,0.03)]">
            <form method="GET" action="{{ route('tenants.index') }}" class="flex flex-col sm:flex-row gap-2 sm:items-center">
                <div class="relative flex-1 min-w-[160px]">
                    <span class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-9 pointer-events-none">
                        <x-radix-icon name="magnifying-glass" class="w-3.5 h-3.5" />
                    </span>
                    <input type="text" name="search" value="{{ request('search') }}" 
                           placeholder="Cari nama institusi atau subdomain..." 
                           class="w-full rounded-lg border border-gray-7 bg-white pl-8 pr-3 py-1.5 text-xs text-gray-12 placeholder:text-gray-8 transition-colors focus:border-green-8 focus:ring-1 focus:ring-green-8 outline-none">
                </div>

                <div class="w-full sm:w-36 shrink-0">
                    <select name="plan" onchange="this.form.submit()" 
                            class="w-full rounded-lg border border-gray-7 bg-white px-2 py-1.5 text-xs text-gray-12 transition-colors focus:border-green-8 focus:ring-1 focus:ring-green-8 outline-none cursor-pointer">
                        <option value="">Semua Paket</option>
                        <option value="gratis" {{ request('plan') === 'gratis' ? 'selected' : '' }}>Starter</option>
                        <option value="premium" {{ request('plan') === 'premium' ? 'selected' : '' }}>Pro</option>
                        <option value="whitelabel" {{ request('plan') === 'whitelabel' ? 'selected' : '' }}>Enterprise</option>
                    </select>
                </div>

                <button type="submit" class="px-3 py-1.5 rounded-lg bg-gray-3 hover:bg-gray-4 text-gray-12 text-xs font-semibold transition-colors cursor-pointer shrink-0">
                    Filter
                </button>

                @if(request()->hasAny(['search', 'plan']))
                    <a href="{{ route('tenants.index') }}" class="px-2.5 py-1.5 rounded-lg bg-gray-2 hover:bg-gray-3 text-gray-11 hover:text-gray-12 text-xs font-semibold flex items-center justify-center transition-colors shrink-0">
                        Reset
                    </a>
                @endif
            </form>
        </div>

        <!-- Table Card -->
        <div class="bg-white border border-gray-6 rounded-xl shadow-[0_1px_3px_rgba(0,0,0,0.03)] overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse text-xs">
                    <thead>
                        <tr class="border-b border-gray-6 bg-gray-2/50 text-gray-11 uppercase tracking-wider font-semibold">
                            <th class="py-3.5 px-5">Nama Institusi</th>
                            <th class="py-3.5 px-4">Subdomain / Domain</th>
                            <th class="py-3.5 px-4 text-center">Guru</th>
                            <th class="py-3.5 px-4 text-center">Murid</th>
                            <th class="py-3.5 px-4">Paket / Level (Bagi Hasil)</th>
                            <th class="py-3.5 px-5 text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-5">
                        @forelse($tenants as $tenant)
                            <tr class="hover:bg-gray-2/40 transition-colors">
                                <td class="py-3.5 px-5 font-semibold text-gray-12">
                                    <a href="{{ route('tenants.show', $tenant) }}" class="hover:text-green-11 transition-colors text-sm">
                                        {{ $tenant->name }}
                                    </a>
                                </td>
                                <td class="py-3.5 px-4 text-gray-11 font-mono">
                                    @if($tenant->domain)
                                        <span class="text-emerald-700 font-bold">{{ $tenant->domain }}</span>
                                    @else
                                        <span>{{ $tenant->subdomain }}.{{ config('app.url_base_domain', 'localhost') }}</span>
                                    @endif
                                </td>
                                <td class="py-3.5 px-4 text-center">
                                    <span class="inline-flex items-center px-2 py-0.5 rounded-md font-semibold text-blue-11 bg-blue-3 border border-blue-6/50">
                                        {{ $tenant->teachers_count }} guru
                                    </span>
                                </td>
                                <td class="py-3.5 px-4 text-center">
                                    <span class="inline-flex items-center px-2 py-0.5 rounded-md font-semibold text-amber-11 bg-amber-3 border border-amber-6/50">
                                        {{ $tenant->students_count }} murid
                                    </span>
                                </td>
                                <!-- Kolom Inline Dropdown Level Tenant & Skema Bagi Hasil -->
                                <td class="py-2.5 px-4">
                                    @can('update', $tenant)
                                        <div class="inline-block w-48">
                                            <select @change="updateTenantPlan({{ $tenant->id }}, $event.target.value, '{{ addslashes($tenant->name) }}')"
                                                    class="w-full text-xs font-bold py-1.5 px-2.5 rounded-lg border transition-all cursor-pointer outline-none shadow-sm {{ $tenant->isEnterprise() ? 'bg-purple-50 border-purple-300 text-purple-900 focus:ring-1 focus:ring-purple-400' : ($tenant->isPro() ? 'bg-emerald-50 border-emerald-300 text-emerald-900 focus:ring-1 focus:ring-emerald-400' : 'bg-gray-50 border-gray-300 text-gray-800 focus:ring-1 focus:ring-gray-400') }}">
                                                <option value="gratis" {{ ($tenant->plan ?? 'gratis') === 'gratis' ? 'selected' : '' }}>
                                                    🥉 STARTER (75:25)
                                                </option>
                                                <option value="premium" {{ ($tenant->plan ?? '') === 'premium' ? 'selected' : '' }}>
                                                    🥈 PRO (50:50)
                                                </option>
                                                <option value="whitelabel" {{ ($tenant->plan ?? '') === 'whitelabel' ? 'selected' : '' }}>
                                                    🥇 ENTERPRISE (25:75)
                                                </option>
                                            </select>
                                        </div>
                                    @else
                                        <span class="inline-flex items-center px-2.5 py-1 rounded-md font-bold uppercase text-[10px] {{ $tenant->isEnterprise() ? 'bg-purple-100 text-purple-800 border border-purple-300' : ($tenant->isPro() ? 'bg-emerald-100 text-emerald-800 border border-emerald-300' : 'bg-gray-100 text-gray-700 border border-gray-300') }}">
                                            {{ $tenant->level_label }} ({{ $tenant->revenue_share_ratio }})
                                        </span>
                                    @endcan
                                </td>
                                <td class="py-3.5 px-5 text-right">
                                    <div class="flex items-center justify-end gap-1.5">
                                        @can('update', $tenant)
                                            <a href="{{ route('tenants.branding.edit', $tenant) }}" 
                                               class="px-2.5 py-1 rounded-lg text-xs font-semibold bg-sky-3 hover:bg-sky-4 text-sky-11 transition-colors cursor-pointer">
                                                Branding
                                            </a>
                                        @endcan

                                        <a href="{{ route('tenants.show', $tenant) }}" 
                                           class="px-2.5 py-1 rounded-lg text-xs font-semibold bg-gray-3 hover:bg-gray-4 text-gray-12 transition-colors cursor-pointer">
                                            Detail
                                        </a>

                                        @can('update', $tenant)
                                            <a href="{{ route('tenants.edit', $tenant) }}" 
                                               class="px-2.5 py-1 rounded-lg text-xs font-semibold bg-blue-3 hover:bg-blue-4 text-blue-11 transition-colors cursor-pointer">
                                                Edit
                                            </a>
                                        @endcan

                                        @can('delete', $tenant)
                                            <form method="POST" action="{{ route('tenants.destroy', $tenant) }}" class="m-0 inline-block" onsubmit="return confirm('Apakah Anda yakin ingin menghapus tenant {{ $tenant->name }}?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" 
                                                        class="px-2.5 py-1 rounded-lg text-xs font-semibold bg-red-3 hover:bg-red-4 text-red-11 transition-colors cursor-pointer">
                                                    Hapus
                                                </button>
                                            </form>
                                        @endcan
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="py-8 px-5 text-center text-gray-10">
                                    <div class="flex flex-col items-center justify-center gap-2">
                                        <x-radix-icon name="backpack" class="w-8 h-8 text-gray-8" />
                                        <p class="font-medium text-sm">Tidak ada data institusi yang ditemukan.</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if($tenants->hasPages())
                <div class="p-4 border-t border-gray-6 bg-gray-2/20">
                    {{ $tenants->links() }}
                </div>
            @endif
        </div>
    </div>
</x-layouts.app>
