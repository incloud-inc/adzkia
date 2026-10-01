<x-layouts.app>
    <x-slot:title>Dompet Saldo & Bagi Hasil - {{ $tenant->name }}</x-slot:title>

    <div class="space-y-6 pb-16" x-data="{ showPayoutModal: false }">
        <!-- Header & Action Toolbar -->
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
            <div>
                <div class="flex items-center gap-2">
                    <span class="text-xs font-bold uppercase tracking-wider px-2 py-0.5 rounded-md bg-green-3 text-green-11 border border-green-6/50">
                        Dompet Tenant
                    </span>
                    <span class="text-xs font-semibold px-2 py-0.5 rounded-md bg-blue-3 text-blue-11 border border-blue-6/50">
                        Level: {{ $tenant->level_label }} (Bagi Hasil {{ $tenant->getRevenueShareTenantPct() }}%)
                    </span>
                </div>
                <h1 class="font-display font-extrabold text-2xl sm:text-3xl text-gray-12 tracking-tight mt-1">
                    Dompet Saldo {{ $tenant->name }}
                </h1>
                <p class="text-xs text-gray-11 mt-0.5">Pantau akumulasi komisi dari penjualan asesmen dan ajukan pencairan dana secara transparan.</p>
            </div>

            <div class="flex items-center gap-2.5">
                @if(auth()->user()->isSuperUser())
                    <a href="{{ route('wallet.admin.payouts') }}"
                       class="inline-flex items-center gap-1.5 px-4 py-2.5 rounded-xl border border-amber-6/50 bg-amber-3 text-amber-11 text-xs font-semibold transition-all shadow-xs cursor-pointer">
                        <x-radix-icon name="lock-closed" class="w-4 h-4" />
                        <span>Verifikasi Payout Nasional (Owner)</span>
                    </a>
                @endif
                <button type="button" @click="showPayoutModal = true"
                        class="inline-flex items-center gap-1.5 px-4 py-2.5 rounded-xl bg-green-9 hover:bg-green-10 active:bg-green-11 text-white text-xs font-semibold transition-all shadow-xs cursor-pointer">
                    <x-radix-icon name="arrow-up" class="w-4 h-4" />
                    <span>Tarik Saldo (Payout)</span>
                </button>
            </div>
        </div>

        @if(session('success'))
            <div class="p-4 rounded-xl bg-green-3 border border-green-6/50 text-green-11 text-xs font-semibold flex items-center justify-between">
                <span>{{ session('success') }}</span>
            </div>
        @endif

        @if(session('error'))
            <div class="p-4 rounded-xl bg-red-3 border border-red-6/50 text-red-11 text-xs font-semibold flex items-center justify-between">
                <span>{{ session('error') }}</span>
            </div>
        @endif

        <!-- 4 Wallet Balance Metric Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
            <!-- 1. Saldo Tersedia (Available Balance) -->
            <div class="bg-white p-5 rounded-2xl border-2 border-green-7 bg-green-2/20 shadow-xs flex flex-col justify-between">
                <div class="flex items-center justify-between mb-3">
                    <span class="text-xs font-bold text-green-11 uppercase tracking-wider">Saldo Tersedia</span>
                    <div class="w-9 h-9 rounded-xl bg-green-3 text-green-11 flex items-center justify-center">
                        <x-radix-icon name="tokens" class="w-4 h-4" />
                    </div>
                </div>
                <div>
                    <h3 class="font-display font-black text-2xl text-green-11 tracking-tight">Rp {{ number_format($wallet->balance, 0, ',', '.') }}</h3>
                    <p class="text-[11px] text-green-9 mt-1">Dapat ditarik ke rekening kapan saja</p>
                </div>
            </div>

            <!-- 2. Saldo Tertahan (Pending Payouts) -->
            <div class="bg-white p-5 rounded-2xl border border-amber-6/60 bg-amber-2/20 shadow-xs flex flex-col justify-between">
                <div class="flex items-center justify-between mb-3">
                    <span class="text-xs font-bold text-amber-11 uppercase tracking-wider">Saldo Tertahan</span>
                    <div class="w-9 h-9 rounded-xl bg-amber-3 text-amber-11 flex items-center justify-center">
                        <x-radix-icon name="timer" class="w-4 h-4" />
                    </div>
                </div>
                <div>
                    <h3 class="font-display font-black text-2xl text-amber-11 tracking-tight">Rp {{ number_format($wallet->held_balance, 0, ',', '.') }}</h3>
                    <p class="text-[11px] text-amber-9 mt-1">Sedang dalam proses pencairan/verifikasi</p>
                </div>
            </div>

            <!-- 3. Total Pendapatan Bersih (Lifetime Earned) -->
            <div class="bg-white p-5 rounded-2xl border border-gray-6 shadow-xs flex flex-col justify-between">
                <div class="flex items-center justify-between mb-3">
                    <span class="text-xs font-bold text-gray-11 uppercase tracking-wider">Total Pendapatan</span>
                    <div class="w-9 h-9 rounded-xl bg-gray-3 text-gray-12 flex items-center justify-center">
                        <x-radix-icon name="pie-chart" class="w-4 h-4" />
                    </div>
                </div>
                <div>
                    <h3 class="font-display font-black text-2xl text-gray-12 tracking-tight">Rp {{ number_format($wallet->total_earned, 0, ',', '.') }}</h3>
                    <p class="text-[11px] text-gray-10 mt-1">Akumulasi komisi sejak pertama aktif</p>
                </div>
            </div>

            <!-- 4. Total Dana Ditarik (Lifetime Withdrawn) -->
            <div class="bg-white p-5 rounded-2xl border border-gray-6 shadow-xs flex flex-col justify-between">
                <div class="flex items-center justify-between mb-3">
                    <span class="text-xs font-bold text-gray-11 uppercase tracking-wider">Total Dicairkan</span>
                    <div class="w-9 h-9 rounded-xl bg-gray-3 text-gray-12 flex items-center justify-center">
                        <x-radix-icon name="arrow-top-right" class="w-4 h-4" />
                    </div>
                </div>
                <div>
                    <h3 class="font-display font-black text-2xl text-gray-12 tracking-tight">Rp {{ number_format($wallet->total_withdrawn, 0, ',', '.') }}</h3>
                    <p class="text-[11px] text-gray-10 mt-1">Telah berhasil ditransfer ke rekening</p>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-start">
            <!-- Left: Transaction History (8 cols) -->
            <div class="lg:col-span-8 bg-white rounded-2xl border border-gray-6 shadow-xs overflow-hidden">
                <div class="p-4 border-b border-gray-5 flex items-center justify-between">
                    <h3 class="font-display font-bold text-sm text-gray-12">Mutasi Saldo Dompet</h3>
                    <span class="text-xs text-gray-11">Total {{ $transactions->total() }} entri</span>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left text-xs border-collapse">
                        <thead class="bg-gray-2/60 text-gray-11 uppercase tracking-wider font-semibold border-b border-gray-5">
                            <tr>
                                <th class="py-3 px-4">Waktu</th>
                                <th class="py-3 px-4">Keterangan</th>
                                <th class="py-3 px-4 text-center">Tipe</th>
                                <th class="py-3 px-4 text-right">Nominal</th>
                                <th class="py-3 px-4 text-right">Saldo Akhir</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-5">
                            @forelse($transactions as $trx)
                                <tr class="hover:bg-gray-2/40 transition-colors">
                                    <td class="py-3 px-4 text-gray-9 text-[11px]">
                                        {{ $trx->created_at->format('d M Y H:i') }}
                                    </td>
                                    <td class="py-3 px-4 text-gray-12 max-w-xs truncate">
                                        {{ $trx->description }}
                                    </td>
                                    <td class="py-3 px-4 text-center">
                                        @if($trx->type === 'credit')
                                            <span class="px-2 py-0.5 rounded-full text-[10px] font-bold bg-green-3 text-green-11 border border-green-6/50">
                                                + KREDIT
                                            </span>
                                        @else
                                            <span class="px-2 py-0.5 rounded-full text-[10px] font-bold bg-red-3 text-red-11 border border-red-6/50">
                                                - DEBIT
                                            </span>
                                        @endif
                                    </td>
                                    <td class="py-3 px-4 text-right font-mono font-bold {{ $trx->type === 'credit' ? 'text-green-9' : 'text-red-9' }}">
                                        {{ $trx->type === 'credit' ? '+' : '-' }} Rp {{ number_format($trx->amount, 0, ',', '.') }}
                                    </td>
                                    <td class="py-3 px-4 text-right font-mono font-semibold text-gray-12">
                                        Rp {{ number_format($trx->balance_after, 0, ',', '.') }}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center py-8 text-gray-10">
                                        Belum ada mutasi transaksi dompet.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                @if($transactions->hasPages())
                    <div class="p-4 border-t border-gray-5">
                        {{ $transactions->links() }}
                    </div>
                @endif
            </div>

            <!-- Right: Payout Requests List (4 cols) -->
            <div class="lg:col-span-4 bg-white rounded-2xl border border-gray-6 shadow-xs p-5 space-y-4">
                <div class="flex items-center justify-between border-b border-gray-5 pb-3">
                    <h3 class="font-display font-bold text-sm text-gray-12">Pengajuan Penarikan</h3>
                    <span class="text-xs text-gray-10">10 Terakhir</span>
                </div>

                <div class="space-y-3">
                    @forelse($payoutRequests as $payout)
                        <div class="p-3.5 rounded-xl border border-gray-5 bg-gray-2/30 space-y-2">
                            <div class="flex items-center justify-between">
                                <span class="font-mono font-bold text-xs text-gray-12">Rp {{ number_format($payout->amount, 0, ',', '.') }}</span>
                                @if($payout->status === 'approved')
                                    <span class="px-2 py-0.5 rounded text-[10px] font-bold bg-green-3 text-green-11">Disetujui</span>
                                @elseif($payout->status === 'pending')
                                    <span class="px-2 py-0.5 rounded text-[10px] font-bold bg-amber-3 text-amber-11">Menunggu</span>
                                @else
                                    <span class="px-2 py-0.5 rounded text-[10px] font-bold bg-red-3 text-red-11">Ditolak</span>
                                @endif
                            </div>
                            <div class="text-[11px] text-gray-11">
                                <div>{{ $payout->bank_name }} • {{ $payout->bank_account_number }}</div>
                                <div class="text-gray-9">a.n. {{ $payout->bank_account_name }}</div>
                            </div>
                            <div class="text-[10px] text-gray-9 border-t border-gray-4 pt-1 flex justify-between">
                                <span>{{ $payout->created_at->format('d M Y') }}</span>
                                @if($payout->proof_path)
                                    <a href="{{ asset('storage/'.$payout->proof_path) }}" target="_blank" class="text-blue-11 hover:underline font-semibold">Bukti Transfer</a>
                                @endif
                            </div>
                        </div>
                    @empty
                        <p class="text-xs text-gray-10 text-center py-4">Belum ada riwayat penarikan dana.</p>
                    @endforelse
                </div>
            </div>
        </div>

        <!-- Payout Modal Form -->
        <div x-show="showPayoutModal" x-transition.opacity
             class="fixed inset-0 z-50 bg-black/50 flex items-center justify-center p-4 backdrop-blur-xs"
             style="display: none;">
            <div @click.away="showPayoutModal = false" class="bg-white rounded-2xl max-w-md w-full p-6 shadow-xl border border-gray-6 space-y-4">
                <div class="flex items-center justify-between border-b border-gray-5 pb-3">
                    <h3 class="font-display font-bold text-base text-gray-12">Ajukan Penarikan Dana</h3>
                    <button type="button" @click="showPayoutModal = false" class="text-gray-9 hover:text-gray-12 cursor-pointer">
                        <x-radix-icon name="cross-2" class="w-5 h-5" />
                    </button>
                </div>

                <form method="POST" action="{{ route('wallet.payout.request') }}" class="space-y-4">
                    @csrf
                    <div>
                        <label class="block text-xs font-semibold text-gray-11 mb-1">Nominal Penarikan (Rp)</label>
                        <input type="number" name="amount" min="50000" max="{{ (int) $wallet->balance }}" step="10000"
                               placeholder="Min. Rp 50.000" required
                               class="w-full text-sm rounded-xl border border-gray-7 px-3.5 py-2 font-mono outline-none focus:border-green-8">
                        <p class="text-[11px] text-gray-10 mt-1">Saldo tersedia Anda: <strong>Rp {{ number_format($wallet->balance, 0, ',', '.') }}</strong></p>
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-gray-11 mb-1">Nama Bank Tujuan</label>
                        <input type="text" name="bank_name" placeholder="Contoh: BCA / Mandiri / BRI / BNI" required
                               class="w-full text-xs rounded-xl border border-gray-7 px-3.5 py-2 outline-none focus:border-green-8">
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-gray-11 mb-1">Nomor Rekening</label>
                        <input type="text" name="bank_account_number" placeholder="Contoh: 1234567890" required
                               class="w-full text-xs rounded-xl border border-gray-7 px-3.5 py-2 font-mono outline-none focus:border-green-8">
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-gray-11 mb-1">Nama Pemilik Rekening</label>
                        <input type="text" name="bank_account_name" placeholder="Nama sesuai buku tabungan" required
                               class="w-full text-xs rounded-xl border border-gray-7 px-3.5 py-2 outline-none focus:border-green-8">
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-gray-11 mb-1">Catatan Tambahan (Opsional)</label>
                        <input type="text" name="notes" placeholder="Catatan untuk tim keuangan"
                               class="w-full text-xs rounded-xl border border-gray-7 px-3.5 py-2 outline-none focus:border-green-8">
                    </div>

                    <div class="flex items-center justify-end gap-2 pt-2 border-t border-gray-5">
                        <button type="button" @click="showPayoutModal = false"
                                class="px-4 py-2 rounded-xl border border-gray-6 bg-white hover:bg-gray-3 text-xs font-semibold text-gray-12 transition-colors cursor-pointer">
                            Batal
                        </button>
                        <button type="submit"
                                class="px-5 py-2 rounded-xl bg-green-9 hover:bg-green-10 active:bg-green-11 text-white text-xs font-bold transition-all shadow-xs cursor-pointer">
                            Kirim Pengajuan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layouts.app>
