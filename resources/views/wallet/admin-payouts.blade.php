<x-layouts.app>
    <x-slot:title>Persetujuan Penarikan Dana Tenant - ADZKIA Pusat</x-slot:title>

    <div class="space-y-6 pb-16">
        <!-- Header -->
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
            <div>
                <div class="flex items-center gap-2">
                    <span class="text-xs font-bold uppercase tracking-wider px-2 py-0.5 rounded-md bg-amber-3 text-amber-11 border border-amber-6/50">
                        Owner / Super User
                    </span>
                    <span class="text-xs font-semibold text-gray-11">Pusat Pembayaran Komisi</span>
                </div>
                <h1 class="font-display font-extrabold text-2xl sm:text-3xl text-gray-12 tracking-tight mt-1">
                    Verifikasi Penarikan Dana Tenant
                </h1>
                <p class="text-xs text-gray-11 mt-0.5">Kelola dan setujui permohonan pencairan saldo bagi hasil dari seluruh institusi tenant terdaftar.</p>
            </div>

            <div class="flex items-center gap-2.5">
                <a href="{{ route('reports.sales') }}"
                   class="inline-flex items-center gap-1.5 px-4 py-2.5 rounded-xl border border-gray-6 bg-white hover:bg-gray-3 text-gray-12 text-xs font-semibold transition-all shadow-xs cursor-pointer">
                    <x-radix-icon name="pie-chart" class="w-4 h-4" />
                    <span>Laporan Penjualan</span>
                </a>
            </div>
        </div>

        @if(session('success'))
            <div class="p-4 rounded-xl bg-green-3 border border-green-6/50 text-green-11 text-xs font-semibold">
                {{ session('success') }}
            </div>
        @endif

        @if(session('info'))
            <div class="p-4 rounded-xl bg-blue-3 border border-blue-6/50 text-blue-11 text-xs font-semibold">
                {{ session('info') }}
            </div>
        @endif

        <!-- Payout Requests Table -->
        <div class="bg-white rounded-2xl border border-gray-6 shadow-xs overflow-hidden">
            <div class="p-4 border-b border-gray-5 flex items-center justify-between">
                <h3 class="font-display font-bold text-sm text-gray-12">Daftar Pengajuan Penarikan Saldo</h3>
                <span class="text-xs text-gray-11">Total {{ $payouts->total() }} permohonan</span>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left text-xs border-collapse">
                    <thead class="bg-gray-2/60 text-gray-11 uppercase tracking-wider font-semibold border-b border-gray-5">
                        <tr>
                            <th class="py-3 px-4">ID &amp; Tanggal</th>
                            <th class="py-3 px-4">Tenant / Institusi</th>
                            <th class="py-3 px-4">Rekening Tujuan</th>
                            <th class="py-3 px-4 text-right">Nominal</th>
                            <th class="py-3 px-4 text-center">Status</th>
                            <th class="py-3 px-4 text-center">Aksi / Verifikasi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-5">
                        @forelse($payouts as $payout)
                            <tr class="hover:bg-gray-2/40 transition-colors">
                                <td class="py-3 px-4">
                                    <span class="font-mono font-bold text-gray-12 block">#{{ $payout->id }}</span>
                                    <span class="text-[11px] text-gray-9">{{ $payout->created_at->format('d M Y H:i') }}</span>
                                </td>
                                <td class="py-3 px-4">
                                    <span class="font-semibold text-gray-12 block">{{ $payout->tenant?->name }}</span>
                                    <span class="text-[11px] text-gray-10">Pemohon: {{ $payout->requester?->name }}</span>
                                </td>
                                <td class="py-3 px-4">
                                    <span class="font-bold text-gray-12 block">{{ $payout->bank_name }} - {{ $payout->bank_account_number }}</span>
                                    <span class="text-[11px] text-gray-10">a.n. {{ $payout->bank_account_name }}</span>
                                </td>
                                <td class="py-3 px-4 text-right font-mono font-bold text-sm text-gray-12">
                                    Rp {{ number_format($payout->amount, 0, ',', '.') }}
                                </td>
                                <td class="py-3 px-4 text-center">
                                    @if($payout->status === 'approved')
                                        <span class="px-2.5 py-0.5 rounded-full text-[11px] font-bold bg-green-3 text-green-11 border border-green-6/50">
                                            Disetujui
                                        </span>
                                    @elseif($payout->status === 'pending')
                                        <span class="px-2.5 py-0.5 rounded-full text-[11px] font-bold bg-amber-3 text-amber-11 border border-amber-6/50">
                                            Menunggu
                                        </span>
                                    @else
                                        <span class="px-2.5 py-0.5 rounded-full text-[11px] font-bold bg-red-3 text-red-11 border border-red-6/50">
                                            Ditolak
                                        </span>
                                    @endif
                                </td>
                                <td class="py-3 px-4 text-center">
                                    @if($payout->status === 'pending')
                                        <div class="flex items-center justify-center gap-2" x-data="{ showApproveModal: false, showRejectModal: false }">
                                            <!-- Approve Button & Modal -->
                                            <button type="button" @click="showApproveModal = true"
                                                    class="px-3 py-1.5 rounded-lg bg-green-9 hover:bg-green-10 text-white text-xs font-bold transition-all shadow-xs cursor-pointer">
                                                Setujui
                                            </button>

                                            <!-- Reject Button & Modal -->
                                            <button type="button" @click="showRejectModal = true"
                                                    class="px-3 py-1.5 rounded-lg bg-red-600 hover:bg-red-700 text-white text-xs font-bold transition-all shadow-xs cursor-pointer">
                                                Tolak
                                            </button>

                                            <!-- Approve Modal -->
                                            <div x-show="showApproveModal" x-transition.opacity
                                                 class="fixed inset-0 z-50 bg-black/50 flex items-center justify-center p-4 backdrop-blur-xs text-left"
                                                 style="display: none;">
                                                <div @click.away="showApproveModal = false" class="bg-white rounded-2xl max-w-sm w-full p-5 space-y-4 shadow-xl">
                                                    <h4 class="font-bold text-sm text-gray-12">Setujui Penarikan #{{ $payout->id }}</h4>
                                                    <p class="text-xs text-gray-11">Transfer sebesar <strong>Rp {{ number_format($payout->amount, 0, ',', '.') }}</strong> ke {{ $payout->bank_name }} ({{ $payout->bank_account_number }} a.n {{ $payout->bank_account_name }}).</p>
                                                    <form method="POST" action="{{ route('wallet.admin.approve', $payout) }}" enctype="multipart/form-data" class="space-y-3">
                                                        @csrf
                                                        <div>
                                                            <label class="block text-xs font-semibold text-gray-11 mb-1">Unggah Bukti Transfer (Opsional)</label>
                                                            <input type="file" name="proof_file" accept="image/*,application/pdf" class="w-full text-xs text-gray-11">
                                                        </div>
                                                        <div class="flex justify-end gap-2 pt-2">
                                                            <button type="button" @click="showApproveModal = false" class="px-3 py-1.5 rounded-lg border text-xs">Batal</button>
                                                            <button type="submit" class="px-4 py-1.5 rounded-lg bg-green-9 text-white text-xs font-bold">Konfirmasi Lunas</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>

                                            <!-- Reject Modal -->
                                            <div x-show="showRejectModal" x-transition.opacity
                                                 class="fixed inset-0 z-50 bg-black/50 flex items-center justify-center p-4 backdrop-blur-xs text-left"
                                                 style="display: none;">
                                                <div @click.away="showRejectModal = false" class="bg-white rounded-2xl max-w-sm w-full p-5 space-y-4 shadow-xl">
                                                    <h4 class="font-bold text-sm text-gray-12">Tolak Penarikan #{{ $payout->id }}</h4>
                                                    <p class="text-xs text-gray-11">Dana akan dikembalikan seutuhnya ke saldo tersedia tenant.</p>
                                                    <form method="POST" action="{{ route('wallet.admin.reject', $payout) }}" class="space-y-3">
                                                        @csrf
                                                        <div>
                                                            <label class="block text-xs font-semibold text-gray-11 mb-1">Alasan Penolakan</label>
                                                            <input type="text" name="rejection_reason" placeholder="Contoh: No. rekening tidak valid" required class="w-full text-xs rounded-xl border border-gray-7 px-3 py-1.5 outline-none focus:border-red-6">
                                                        </div>
                                                        <div class="flex justify-end gap-2 pt-2">
                                                            <button type="button" @click="showRejectModal = false" class="px-3 py-1.5 rounded-lg border text-xs">Batal</button>
                                                            <button type="submit" class="px-4 py-1.5 rounded-lg bg-red-600 text-white text-xs font-bold">Tolak Permohonan</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <div class="text-[11px] text-gray-9">
                                            @if($payout->proof_path)
                                                <a href="{{ asset('storage/'.$payout->proof_path) }}" target="_blank" class="text-blue-11 hover:underline font-semibold">Bukti Transfer</a>
                                            @elseif($payout->rejection_reason)
                                                <span class="text-red-9 font-medium">{{ $payout->rejection_reason }}</span>
                                            @else
                                                Selesai
                                            @endif
                                        </div>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-8 text-gray-10">
                                    Belum ada data permohonan penarikan dana.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if($payouts->hasPages())
                <div class="p-4 border-t border-gray-5">
                    {{ $payouts->links() }}
                </div>
            @endif
        </div>
    </div>
</x-layouts.app>
