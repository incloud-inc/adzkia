<x-layouts.app>
    <x-slot:title>Manajemen Kupon Diskon - {{ $tenant->name }}</x-slot:title>

    <div class="space-y-6 pb-16">
        <!-- Header & Action Toolbar -->
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
            <div>
                <div class="flex items-center gap-2">
                    <span class="text-xs font-bold uppercase tracking-wider px-3 py-1 rounded-full border"
                          style="background-color: #e7f5ff; border-color: #a5d8ff; color: #1864ab;">
                        Enterprise Privilege
                    </span>
                    <span class="text-xs font-semibold px-3 py-1 rounded-full border"
                          style="background-color: #ebfbee; border-color: #b2f2bb; color: #2b8a3e;">
                        Bagi Hasil Tenant: {{ $tenant->getRevenueShareTenantPct() }}%
                    </span>
                </div>
                <h1 class="font-display font-extrabold text-2xl sm:text-3xl text-slate-900 tracking-tight mt-1.5">
                    Kupon Diskon Murid
                </h1>
                <p class="text-xs sm:text-sm text-slate-600 mt-0.5">
                    Terbitkan kode promosi khusus murid institusi Anda. Seluruh nilai diskon diserap mandiri dari jatah bagi hasil institusi Anda.
                </p>
            </div>

            <div class="flex items-center gap-2.5">
                <a href="{{ route('tenant.coupons.create') }}"
                   class="inline-flex items-center gap-1.5 px-4 py-2.5 rounded-xl text-white text-xs font-bold transition-all shadow-xs cursor-pointer hover:shadow-md active:scale-[0.98]"
                   style="background-color: #1c7ed6;">
                    <x-radix-icon name="plus" class="w-4 h-4 text-white" />
                    <span>Terbitkan Kupon Baru</span>
                </a>
            </div>
        </div>

        @if(session('success'))
            <div class="p-4 rounded-xl border text-xs font-semibold flex items-center justify-between"
                 style="background-color: #ebfbee; border-color: #b2f2bb; color: #2b8a3e;">
                <span>{{ session('success') }}</span>
            </div>
        @endif

        @if(session('error'))
            <div class="p-4 rounded-xl border text-xs font-semibold flex items-center justify-between"
                 style="background-color: #fff5f5; border-color: #ffc9c9; color: #c92a2a;">
                <span>{{ session('error') }}</span>
            </div>
        @endif

        <!-- 4 Metric Cards (Open Color Green, Blue, Orange) -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
            <!-- 1. Total Kupon (Open Color Blue) -->
            <div class="p-5 rounded-2xl border shadow-xs flex flex-col justify-between"
                 style="background-color: #ffffff; border-color: #dee2e6;">
                <div class="flex items-center justify-between mb-2">
                    <span class="text-xs font-bold uppercase tracking-wider text-slate-500">Total Kupon</span>
                    <div class="w-8 h-8 rounded-lg flex items-center justify-center border"
                         style="background-color: #e7f5ff; border-color: #a5d8ff; color: #1971c2;">
                        <x-radix-icon name="badge" class="w-4 h-4" />
                    </div>
                </div>
                <div class="text-2xl font-black text-slate-900 font-display">
                    {{ number_format($totalCoupons) }}
                </div>
                <span class="text-[11px] text-slate-500 mt-1">Seluruh kupon yang dibuat</span>
            </div>

            <!-- 2. Kupon Aktif (Open Color Green) -->
            <div class="p-5 rounded-2xl border shadow-xs flex flex-col justify-between"
                 style="background-color: #ebfbee; border-color: #b2f2bb;">
                <div class="flex items-center justify-between mb-2">
                    <span class="text-xs font-bold uppercase tracking-wider" style="color: #2b8a3e;">Kupon Aktif</span>
                    <div class="w-8 h-8 rounded-lg flex items-center justify-center border"
                         style="background-color: #d3f9d8; border-color: #8ce99a; color: #2f9e44;">
                        <x-radix-icon name="check" class="w-4 h-4" />
                    </div>
                </div>
                <div class="text-2xl font-black font-display" style="color: #2b8a3e;">
                    {{ number_format($activeCoupons) }}
                </div>
                <span class="text-[11px] mt-1 font-medium" style="color: #2f9e44;">Siap diklaim oleh murid</span>
            </div>

            <!-- 3. Total Klaim Murid (Open Color Blue) -->
            <div class="p-5 rounded-2xl border shadow-xs flex flex-col justify-between"
                 style="background-color: #e7f5ff; border-color: #a5d8ff;">
                <div class="flex items-center justify-between mb-2">
                    <span class="text-xs font-bold uppercase tracking-wider" style="color: #1864ab;">Total Digunakan</span>
                    <div class="w-8 h-8 rounded-lg flex items-center justify-center border"
                         style="background-color: #d0ebff; border-color: #74c0fc; color: #1971c2;">
                        <x-radix-icon name="person" class="w-4 h-4" />
                    </div>
                </div>
                <div class="text-2xl font-black font-display" style="color: #1864ab;">
                    {{ number_format($totalUsedCount) }} <span class="text-xs font-bold" style="color: #1971c2;">kali</span>
                </div>
                <span class="text-[11px] mt-1 font-medium" style="color: #1971c2;">Frekuensi transaksi murid</span>
            </div>

            <!-- 4. Total Diskon Ditanggung Tenant (Open Color Orange) -->
            <div class="p-5 rounded-2xl border shadow-xs flex flex-col justify-between"
                 style="background-color: #fff4e6; border-color: #ffd8a8;">
                <div class="flex items-center justify-between mb-2">
                    <span class="text-xs font-bold uppercase tracking-wider" style="color: #d9480f;">Diskon Ditanggung</span>
                    <div class="w-8 h-8 rounded-lg flex items-center justify-center border"
                         style="background-color: #ffe8cc; border-color: #ffa94d; color: #e8590c;">
                        <x-radix-icon name="tokens" class="w-4 h-4" />
                    </div>
                </div>
                <div class="text-xl sm:text-2xl font-black font-display" style="color: #d9480f;">
                    Rp {{ number_format($totalDiscountAbsorbed, 0, ',', '.') }}
                </div>
                <span class="text-[11px] mt-1 font-medium" style="color: #e8590c;">Diserap dari jatah bagi hasil institusi</span>
            </div>
        </div>

        <!-- Protection Banner Info (Open Color Orange & Blue) -->
        <div class="p-4 rounded-2xl border flex items-start gap-3.5"
             style="background-color: #fff4e6; border-color: #ffd8a8;">
            <div class="p-1.5 rounded-lg shrink-0 mt-0.5 border"
                 style="background-color: #ffe8cc; border-color: #ffa94d; color: #d9480f;">
                <x-radix-icon name="info-circled" class="w-4 h-4" />
            </div>
            <div class="text-xs space-y-1" style="color: #d9480f;">
                <p class="font-bold text-sm">Ketentuan Finansial Kupon Mandiri Enterprise:</p>
                <p class="leading-relaxed" style="color: #e8590c;">
                    Besaran diskon persentase maksimal adalah <strong>75%</strong> dari harga asesmen. Seluruh potongan harga diserap penuh oleh institusi Anda dari jatah komisi 75%, sehingga porsi operasional platform ADZKIA (25%) tetap terjaga dan transaksi tidak pernah menghasilkan saldo minus.
                </p>
            </div>
        </div>

        <!-- Coupons Table -->
        <div class="bg-white rounded-2xl border shadow-xs overflow-hidden" style="border-color: #dee2e6;">
            <div class="p-5 border-b flex items-center justify-between" style="border-color: #e9ecef;">
                <h3 class="text-sm font-bold text-slate-900">Daftar Kode Kupon Diskon Aktif & Riwayat</h3>
                <span class="text-xs text-slate-500">{{ $coupons->total() }} kupon terdaftar</span>
            </div>

            @if($coupons->isEmpty())
                <div class="p-12 text-center space-y-3">
                    <div class="w-12 h-12 rounded-full mx-auto flex items-center justify-center border"
                         style="background-color: #e7f5ff; border-color: #a5d8ff; color: #1864ab;">
                        <x-radix-icon name="badge" class="w-6 h-6" />
                    </div>
                    <h4 class="text-sm font-bold text-slate-900">Belum ada kupon diskon</h4>
                    <p class="text-xs text-slate-500 max-w-sm mx-auto">
                        Mulai buat kode promo perdana Anda untuk memberikan potongan harga spesial bagi murid-murid Anda.
                    </p>
                    <a href="{{ route('tenant.coupons.create') }}"
                       class="inline-flex items-center gap-1.5 px-4 py-2 rounded-xl text-white text-xs font-bold transition-all shadow-xs"
                       style="background-color: #1c7ed6;">
                        <x-radix-icon name="plus" class="w-4 h-4" />
                        <span>Buat Kupon Sekarang</span>
                    </a>
                </div>
            @else
                <div class="overflow-x-auto">
                    <table class="w-full text-xs text-left">
                        <thead class="border-b uppercase font-semibold text-slate-600"
                               style="background-color: #f8f9fa; border-color: #e9ecef;">
                            <tr>
                                <th class="py-3 px-4">Kode & Nama Kupon</th>
                                <th class="py-3 px-4">Nilai Diskon</th>
                                <th class="py-3 px-4">Batas / Syarat</th>
                                <th class="py-3 px-4">Periode Masa Berlaku</th>
                                <th class="py-3 px-4">Penggunaan</th>
                                <th class="py-3 px-4 text-center">Status</th>
                                <th class="py-3 px-4 text-right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100 text-slate-800">
                            @foreach($coupons as $coupon)
                                <tr class="hover:bg-slate-50 transition-colors">
                                    <td class="py-3.5 px-4">
                                        <div class="flex items-center gap-2">
                                            <span class="font-mono font-bold text-xs uppercase px-2.5 py-1 rounded-md border select-all tracking-wider"
                                                  style="background-color: #e7f5ff; border-color: #a5d8ff; color: #1864ab;">
                                                {{ $coupon->code }}
                                            </span>
                                        </div>
                                        <div class="font-semibold text-slate-900 text-xs mt-1">{{ $coupon->name }}</div>
                                    </td>
                                    <td class="py-3.5 px-4">
                                        <div class="font-bold text-sm font-display" style="color: #2b8a3e;">
                                            {{ $coupon->formattedDiscount() }}
                                        </div>
                                        @if($coupon->discount_type === 'percentage' && $coupon->max_discount)
                                            <div class="text-[11px] text-slate-500">Maks Rp {{ number_format($coupon->max_discount, 0, ',', '.') }}</div>
                                        @else
                                            <div class="text-[11px] text-slate-500">{{ $coupon->discount_type === 'percentage' ? 'Persentase' : 'Nominal Tetap' }}</div>
                                        @endif
                                    </td>
                                    <td class="py-3.5 px-4">
                                        @if($coupon->min_order_amount)
                                            <div class="text-slate-700 font-medium">Min. Beli: Rp {{ number_format($coupon->min_order_amount, 0, ',', '.') }}</div>
                                        @else
                                            <div class="text-slate-400">Tanpa min. beli</div>
                                        @endif
                                        <div class="text-[11px] text-slate-500">Batas murid: {{ $coupon->usage_limit_per_user }}x / murid</div>
                                    </td>
                                    <td class="py-3.5 px-4">
                                        @if($coupon->valid_from && $coupon->valid_until)
                                            <div class="text-slate-700 font-medium">{{ $coupon->valid_from->format('d M Y') }} - {{ $coupon->valid_until->format('d M Y') }}</div>
                                        @elseif($coupon->valid_until)
                                            <div class="text-slate-700 font-medium">s/d {{ $coupon->valid_until->format('d M Y') }}</div>
                                        @else
                                            <div class="text-slate-500">Selalu berlaku</div>
                                        @endif

                                        @if($coupon->isExpired())
                                            <span class="inline-block mt-0.5 text-[10px] font-bold px-2 py-0.5 rounded"
                                                  style="background-color: #fff5f5; color: #c92a2a; border: 1px solid #ffc9c9;">Kadaluarsa</span>
                                        @endif
                                    </td>
                                    <td class="py-3.5 px-4">
                                        <div class="font-semibold text-slate-900">
                                            {{ $coupon->used_count }} <span class="text-slate-400 font-normal">/ {{ $coupon->usage_limit ? $coupon->usage_limit : '∞' }}</span>
                                        </div>
                                        @if($coupon->usage_limit)
                                            @php
                                                $pct = min(100, round(($coupon->used_count / $coupon->usage_limit) * 100));
                                            @endphp
                                            <div class="w-20 bg-slate-200 h-1.5 rounded-full overflow-hidden mt-1">
                                                <div class="h-full rounded-full" style="width: {{ $pct }}%; background-color: #1c7ed6;"></div>
                                            </div>
                                        @endif
                                    </td>
                                    <td class="py-3.5 px-4 text-center">
                                        <form action="{{ route('tenant.coupons.toggle', $coupon) }}" method="POST">
                                            @csrf
                                            <button type="submit" 
                                                    title="Klik untuk ubah status aktif/nonaktif"
                                                    class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-[11px] font-bold transition-all cursor-pointer border"
                                                    @if($coupon->is_active)
                                                        style="background-color: #ebfbee; border-color: #8ce99a; color: #2b8a3e;"
                                                    @else
                                                        style="background-color: #f8f9fa; border-color: #dee2e6; color: #868e96;"
                                                    @endif>
                                                <span class="w-1.5 h-1.5 rounded-full" style="background-color: {{ $coupon->is_active ? '#40c057' : '#adb5bd' }};"></span>
                                                <span>{{ $coupon->is_active ? 'Aktif' : 'Nonaktif' }}</span>
                                            </button>
                                        </form>
                                    </td>
                                    <td class="py-3.5 px-4 text-right">
                                        <div class="flex items-center justify-end gap-1.5">
                                            <a href="{{ route('tenant.coupons.edit', $coupon) }}"
                                               class="p-1.5 rounded-lg text-slate-500 hover:text-slate-900 hover:bg-slate-100 transition-colors"
                                               title="Edit Kupon">
                                                <x-radix-icon name="pencil-1" class="w-4 h-4" />
                                            </a>
                                            <form action="{{ route('tenant.coupons.destroy', $coupon) }}" method="POST"
                                                  onsubmit="return confirm('Apakah Anda yakin ingin menghapus kupon {{ $coupon->code }}?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                        class="p-1.5 rounded-lg text-red-600 hover:text-red-800 hover:bg-red-50 transition-colors cursor-pointer"
                                                        title="Hapus Kupon">
                                                    <x-radix-icon name="trash" class="w-4 h-4" />
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @if($coupons->hasPages())
                    <div class="p-4 border-t" style="border-color: #e9ecef;">
                        {{ $coupons->links() }}
                    </div>
                @endif
            @endif
        </div>
    </div>
</x-layouts.app>
