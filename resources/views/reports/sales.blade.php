<x-layouts.app>
    <x-slot:title>Laporan Penjualan Asesmen & Distribusi Bagi Hasil - ADZKIA</x-slot:title>

    <div class="space-y-6 pb-16">
        <!-- Header & Action Toolbar -->
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
            <div>
                <div class="flex items-center gap-2">
                    <span class="text-xs font-bold uppercase tracking-wider px-2 py-0.5 rounded-md bg-green-3 text-green-11 border border-green-6/50">
                        Keuangan &amp; Monetisasi
                    </span>
                    <span class="text-xs font-semibold text-gray-11">B2B2C Platform</span>
                </div>
                <h1 class="font-display font-extrabold text-2xl sm:text-3xl text-gray-12 tracking-tight mt-1">
                    Laporan Penjualan &amp; Bagi Hasil
                </h1>
                <p class="text-xs text-gray-11 mt-0.5">Rekapitulasi transaksi pembelian asesmen oleh siswa serta realisasi pembagian komisi platform dan institusi tenant.</p>
            </div>

            <div class="flex items-center gap-2.5">
                <a href="{{ route('reports.sales.export', request()->query()) }}"
                   class="inline-flex items-center gap-1.5 px-4 py-2.5 rounded-xl border border-gray-6 bg-white hover:bg-gray-3 text-gray-12 text-xs font-semibold transition-all shadow-xs cursor-pointer">
                    <x-radix-icon name="download" class="w-4 h-4" />
                    <span>Ekspor ke CSV</span>
                </a>
                <a href="{{ route('wallet.index') }}"
                   class="inline-flex items-center gap-1.5 px-4 py-2.5 rounded-xl bg-green-9 hover:bg-green-10 active:bg-green-11 text-white text-xs font-semibold transition-all shadow-xs cursor-pointer">
                    <x-radix-icon name="backpack" class="w-4 h-4" />
                    <span>Dompet Saldo Tenant</span>
                </a>
            </div>
        </div>

        <!-- 4 Summary Metric Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
            <!-- 1. Total Penjualan Bruto -->
            <div class="bg-white p-5 rounded-2xl border border-gray-6 shadow-xs flex flex-col justify-between">
                <div class="flex items-center justify-between mb-3">
                    <span class="text-xs font-bold text-gray-11 uppercase tracking-wider">Total Omzet Bruto</span>
                    <div class="w-9 h-9 rounded-xl bg-gray-3 text-gray-12 flex items-center justify-center">
                        <x-radix-icon name="tokens" class="w-4 h-4" />
                    </div>
                </div>
                <div>
                    <h3 class="font-display font-black text-2xl text-gray-12 tracking-tight">Rp {{ number_format($totalGrossRevenue, 0, ',', '.') }}</h3>
                    <p class="text-[11px] text-gray-10 mt-1">Dari {{ number_format($totalSettledCount) }} transaksi berhasil</p>
                </div>
            </div>

            <!-- 2. Total Pendapatan ADZKIA (Platform) -->
            <div class="bg-white p-5 rounded-2xl border border-blue-6/60 bg-blue-2/20 shadow-xs flex flex-col justify-between">
                <div class="flex items-center justify-between mb-3">
                    <span class="text-xs font-bold text-blue-11 uppercase tracking-wider">Total Pendapatan ADZKIA</span>
                    <div class="w-9 h-9 rounded-xl bg-blue-3 text-blue-11 flex items-center justify-center">
                        <x-radix-icon name="pie-chart" class="w-4 h-4" />
                    </div>
                </div>
                <div>
                    <h3 class="font-display font-black text-2xl text-blue-11 tracking-tight">Rp {{ number_format($totalPlatformRevenue, 0, ',', '.') }}</h3>
                    <p class="text-[11px] text-blue-9 mt-1">Porsi bagi hasil platform pusat</p>
                </div>
            </div>

            <!-- 3. Total Pendapatan Tenant -->
            <div class="bg-white p-5 rounded-2xl border border-green-6/60 bg-green-2/20 shadow-xs flex flex-col justify-between">
                <div class="flex items-center justify-between mb-3">
                    <span class="text-xs font-bold text-green-11 uppercase tracking-wider">Total Pendapatan Tenant</span>
                    <div class="w-9 h-9 rounded-xl bg-green-3 text-green-11 flex items-center justify-center">
                        <x-radix-icon name="backpack" class="w-4 h-4" />
                    </div>
                </div>
                <div>
                    <h3 class="font-display font-black text-2xl text-green-11 tracking-tight">Rp {{ number_format($totalTenantRevenue, 0, ',', '.') }}</h3>
                    <p class="text-[11px] text-green-9 mt-1">Disalurkan otomatis ke dompet tenant</p>
                </div>
            </div>

            <!-- 4. Total Transaksi Settled -->
            <div class="bg-white p-5 rounded-2xl border border-gray-6 shadow-xs flex flex-col justify-between">
                <div class="flex items-center justify-between mb-3">
                    <span class="text-xs font-bold text-gray-11 uppercase tracking-wider">Transaksi Lunas</span>
                    <div class="w-9 h-9 rounded-xl bg-amber-3 text-amber-11 flex items-center justify-center">
                        <x-radix-icon name="check-circled" class="w-4 h-4" />
                    </div>
                </div>
                <div>
                    <h3 class="font-display font-black text-2xl text-gray-12 tracking-tight">{{ number_format($totalSettledCount) }} <span class="text-xs font-semibold text-gray-10">/ {{ number_format($totalOrdersCount) }} Order</span></h3>
                    <p class="text-[11px] text-gray-10 mt-1">Tingkat konversi penyelesaian transaksi</p>
                </div>
            </div>
        </div>

        <!-- Filter Form -->
        <div class="bg-white p-5 rounded-2xl border border-gray-6 shadow-xs">
            <form method="GET" action="{{ route('reports.sales') }}" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-3.5 items-end">
                <!-- Date Start -->
                <div>
                    <label class="block text-xs font-semibold text-gray-11 mb-1">Mulai Tanggal</label>
                    <input type="date" name="start_date" value="{{ request('start_date') }}"
                           class="w-full text-xs rounded-xl border border-gray-7 px-3 py-2 outline-none focus:border-green-8">
                </div>

                <!-- Date End -->
                <div>
                    <label class="block text-xs font-semibold text-gray-11 mb-1">Sampai Tanggal</label>
                    <input type="date" name="end_date" value="{{ request('end_date') }}"
                           class="w-full text-xs rounded-xl border border-gray-7 px-3 py-2 outline-none focus:border-green-8">
                </div>

                <!-- Status Filter -->
                <div>
                    <label class="block text-xs font-semibold text-gray-11 mb-1">Status Pembayaran</label>
                    <select name="status" class="w-full text-xs rounded-xl border border-gray-7 px-3 py-2 outline-none focus:border-green-8 bg-white">
                        <option value="all" {{ request('status') === 'all' ? 'selected' : '' }}>Semua Status</option>
                        <option value="settled" {{ request('status', 'settled') === 'settled' ? 'selected' : '' }}>Lunas (Settled)</option>
                        <option value="pending" {{ request('status') === 'pending' ? 'selected' : '' }}>Menunggu Bayar (Pending)</option>
                        <option value="expired" {{ request('status') === 'expired' ? 'selected' : '' }}>Kedaluwarsa (Expired)</option>
                    </select>
                </div>

                <!-- Tenant Filter (Khusus Super User) -->
                @if($isSuperUser)
                    <div>
                        <label class="block text-xs font-semibold text-gray-11 mb-1">Tenant / Institusi</label>
                        <select name="tenant_id" class="w-full text-xs rounded-xl border border-gray-7 px-3 py-2 outline-none focus:border-green-8 bg-white">
                            <option value="all">Semua Tenant</option>
                            @foreach($tenants as $t)
                                <option value="{{ $t->id }}" {{ request('tenant_id') == $t->id ? 'selected' : '' }}>
                                    {{ $t->name }} ({{ $t->level_label }})
                                </option>
                            @endforeach
                        </select>
                    </div>
                @else
                    <div></div>
                @endif

                <!-- Buttons -->
                <div class="flex items-center gap-2">
                    <button type="submit" class="flex-1 py-2 px-3 rounded-xl bg-gray-12 hover:bg-black text-white text-xs font-semibold transition-colors cursor-pointer text-center">
                        Filter
                    </button>
                    <a href="{{ route('reports.sales') }}" class="py-2 px-3 rounded-xl border border-gray-6 bg-white hover:bg-gray-3 text-gray-12 text-xs font-semibold transition-colors cursor-pointer">
                        Reset
                    </a>
                </div>
            </form>
        </div>

        <!-- Orders Table -->
        <div class="bg-white rounded-2xl border border-gray-6 shadow-xs overflow-hidden">
            <div class="p-4 border-b border-gray-5 flex items-center justify-between">
                <h3 class="font-display font-bold text-sm text-gray-12">Rincian Transaksi &amp; Pembagian Bagi Hasil</h3>
                <span class="text-xs text-gray-11">Total {{ $orders->total() }} entri data</span>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left text-xs border-collapse">
                    <thead class="bg-gray-2/60 text-gray-11 uppercase tracking-wider font-semibold border-b border-gray-5">
                        <tr>
                            <th class="py-3 px-4">No. Order &amp; Waktu</th>
                            <th class="py-3 px-4">Siswa</th>
                            <th class="py-3 px-4">Asesmen</th>
                            <th class="py-3 px-4">Tenant Terkait</th>
                            <th class="py-3 px-4 text-right">Harga Jual</th>
                            <th class="py-3 px-4 text-right bg-blue-50/50">Porsi ADZKIA</th>
                            <th class="py-3 px-4 text-right bg-green-50/50">Porsi Tenant</th>
                            <th class="py-3 px-4 text-center">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-5">
                        @forelse($orders as $order)
                            <tr class="hover:bg-gray-2/40 transition-colors">
                                <td class="py-3 px-4">
                                    <span class="font-mono font-bold text-gray-12 block">{{ $order->order_number }}</span>
                                    <span class="text-[11px] text-gray-9">{{ $order->created_at->format('d M Y H:i') }}</span>
                                </td>
                                <td class="py-3 px-4">
                                    <span class="font-semibold text-gray-12 block">{{ $order->user?->name ?? '—' }}</span>
                                    <span class="text-[11px] text-gray-10">{{ $order->user?->email }}</span>
                                </td>
                                <td class="py-3 px-4">
                                    <span class="font-semibold text-gray-12 block">{{ $order->assessment?->title ?? '—' }}</span>
                                    <span class="text-[11px] text-gray-10">{{ $order->payment_method ?? 'Gateway' }}</span>
                                </td>
                                <td class="py-3 px-4">
                                    <span class="font-semibold text-gray-12 block">{{ $order->tenant?->name ?? 'Platform Global' }}</span>
                                    <span class="text-[10px] font-bold uppercase tracking-wider px-1.5 py-0.5 rounded bg-gray-3 text-gray-11">
                                        {{ $order->tenant_tier_snapshot }}
                                    </span>
                                </td>
                                <td class="py-3 px-4 text-right font-mono font-bold text-gray-12">
                                    Rp {{ number_format($order->price_amount, 0, ',', '.') }}
                                </td>
                                <td class="py-3 px-4 text-right font-mono bg-blue-50/30 text-blue-900">
                                    <strong class="block">Rp {{ number_format($order->platform_revenue_amount, 0, ',', '.') }}</strong>
                                    <span class="text-[10px] text-blue-700">({{ $order->revenue_share_platform_pct }}%)</span>
                                </td>
                                <td class="py-3 px-4 text-right font-mono bg-green-50/30 text-green-900">
                                    <strong class="block">Rp {{ number_format($order->tenant_revenue_amount, 0, ',', '.') }}</strong>
                                    <span class="text-[10px] text-green-700">({{ $order->revenue_share_tenant_pct }}%)</span>
                                </td>
                                <td class="py-3 px-4 text-center">
                                    @if($order->status === 'settled')
                                        <span class="px-2 py-0.5 rounded-full text-[11px] font-bold bg-green-3 text-green-11 border border-green-6/50">
                                            Lunas
                                        </span>
                                    @elseif($order->status === 'pending')
                                        <span class="px-2 py-0.5 rounded-full text-[11px] font-bold bg-amber-3 text-amber-11 border border-amber-6/50">
                                            Pending
                                        </span>
                                    @else
                                        <span class="px-2 py-0.5 rounded-full text-[11px] font-bold bg-gray-3 text-gray-11 border border-gray-6">
                                            {{ ucfirst($order->status) }}
                                        </span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center py-10 text-gray-10">
                                    Belum ada data transaksi yang sesuai filter yang dipilih.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            @if($orders->hasPages())
                <div class="p-4 border-t border-gray-5">
                    {{ $orders->links() }}
                </div>
            @endif
        </div>
    </div>
</x-layouts.app>
