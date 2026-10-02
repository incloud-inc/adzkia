<x-layouts.app>
    <x-slot:title>Instruksi Pembayaran - Order #{{ $order->order_number }}</x-slot:title>

    <div class="max-w-2xl mx-auto space-y-6 pb-16"
         x-data="{
             status: '{{ $order->status }}',
             isSettled: {{ $order->isSettled() ? 'true' : 'false' }},
             pollInterval: null,
             copied: false,
             init() {
                 if (!this.isSettled && this.status === 'pending') {
                     this.pollInterval = setInterval(() => {
                         fetch('{{ route('orders.status', $order) }}')
                             .then(res => res.json())
                             .then(data => {
                                 this.status = data.status;
                                 if (data.is_settled) {
                                     this.isSettled = true;
                                     clearInterval(this.pollInterval);
                                 }
                             })
                             .catch(err => console.error('Status poll error:', err));
                     }, 3000);
                 }
             },
             copyToClipboard(text) {
                 navigator.clipboard.writeText(text);
                 this.copied = true;
                 setTimeout(() => this.copied = false, 2500);
             }
         }">

        <!-- Top Navigation -->
        <div class="flex items-center justify-between">
            <a href="{{ route('assessments.show', $order->assessment_id) }}" class="inline-flex items-center gap-2 text-xs font-semibold text-gray-11 hover:text-gray-12 transition-colors">
                <x-radix-icon name="arrow-left" class="w-4 h-4" />
                <span>Kembali ke Detail Asesmen</span>
            </a>
            <span class="text-xs font-mono font-bold text-gray-9">#{{ $order->order_number }}</span>
        </div>

        <!-- Success Celebration Card (When Settled) -->
        <div x-show="isSettled" x-transition.opacity class="bg-white p-8 rounded-2xl border-2 border-green-8 shadow-md text-center space-y-4">
            <div class="w-16 h-16 rounded-full bg-green-3 text-green-11 flex items-center justify-center mx-auto">
                <x-radix-icon name="check" class="w-8 h-8" />
            </div>
            <div>
                <span class="text-xs font-bold uppercase tracking-wider px-3 py-1 rounded-full bg-green-3 text-green-11 border border-green-6/60">
                    Pembayaran Berhasil
                </span>
                <h2 class="font-display font-black text-2xl text-gray-12 tracking-tight mt-2">Akses Ujian Telah Aktif!</h2>
                <p class="text-xs text-gray-11 mt-1">Pembayaran sebesar <strong>Rp {{ number_format($order->total_amount, 0, ',', '.') }}</strong> telah kami terima. Anda sekarang dapat memulai pengerjaan ujian CBT.</p>
            </div>

            <div class="pt-2">
                <a href="{{ route('exam.gate.show', $order->assessment ?? $order->assessment_id) }}"
                   class="inline-flex items-center gap-2 px-8 py-3.5 rounded-xl bg-green-9 hover:bg-green-10 active:bg-green-11 text-white text-sm font-bold shadow-md hover:shadow-lg transition-all active:scale-[0.99] cursor-pointer">
                    <x-radix-icon name="play" class="w-4 h-4" />
                    <span>Mulai Kerjakan Ujian Sekarang</span>
                </a>
            </div>
        </div>

        <!-- Pending Payment Instructions (When Waiting for Payment) -->
        <div x-show="!isSettled" class="bg-white rounded-2xl border border-gray-6 shadow-sm overflow-hidden space-y-0">
            <!-- Header Summary -->
            <div class="p-6 bg-gradient-to-r from-gray-900 to-gray-800 text-white flex items-center justify-between">
                <div>
                    <span class="text-xs font-semibold text-gray-300 uppercase tracking-wider">Menunggu Pembayaran</span>
                    <h2 class="font-display font-black text-2xl tracking-tight mt-0.5">Rp {{ number_format($order->total_amount, 0, ',', '.') }}</h2>
                    <p class="text-xs text-gray-300 mt-1">{{ $order->assessment?->title }}</p>
                </div>
                <div class="text-right">
                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold bg-amber-400/20 text-amber-300 border border-amber-400/40">
                        <span class="w-2 h-2 rounded-full bg-amber-400 animate-pulse"></span>
                        <span>Pending</span>
                    </span>
                </div>
            </div>

            <!-- Payment Instructions Body -->
            <div class="p-6 space-y-6">
                <!-- Virtual Account Display -->
                @if($order->va_number)
                    <div class="p-5 rounded-2xl bg-blue-50 border border-blue-200 text-center space-y-3">
                        <span class="text-xs font-bold text-blue-900 uppercase tracking-wider block">Nomor Virtual Account {{ $order->payment_method }}</span>
                        <div class="flex items-center justify-center gap-3">
                            <span class="font-mono font-black text-2xl text-blue-950 tracking-wider select-all" x-ref="vaText">{{ $order->va_number }}</span>
                            <button type="button" @click="copyToClipboard('{{ $order->va_number }}')"
                                    class="p-2 rounded-lg bg-white border border-blue-300 hover:bg-blue-100 text-blue-800 text-xs font-bold transition-colors cursor-pointer flex items-center gap-1 shadow-xs">
                                <x-radix-icon name="copy" class="w-3.5 h-3.5" />
                                <span x-text="copied ? 'Tersalin!' : 'Salin'"></span>
                            </button>
                        </div>
                        <p class="text-xs text-blue-700">Transfer tepat sesuai nominal melalui ATM, Mobile Banking, atau Internet Banking.</p>
                    </div>
                @endif

                <!-- QRIS Display -->
                @if($order->qr_code_url || $order->payment_method === 'QRIS')
                    <div class="p-5 rounded-2xl bg-gray-50 border border-gray-200 text-center space-y-3">
                        <span class="text-xs font-bold text-gray-900 uppercase tracking-wider block">Scan QRIS Nasional</span>
                        
                        <!-- QR Code Illustration / Image -->
                        <div class="w-48 h-48 mx-auto bg-white p-2 rounded-xl border border-gray-300 shadow-sm flex items-center justify-center">
                            @if(filter_var($order->qr_code_url, FILTER_VALIDATE_URL))
                                <img src="{{ $order->qr_code_url }}" alt="QRIS Code" class="w-full h-full object-contain">
                            @else
                                <div class="text-center p-3 space-y-2">
                                    <x-radix-icon name="view-grid" class="w-16 h-16 text-gray-800 mx-auto" />
                                    <span class="text-[10px] font-mono text-gray-600 block break-all">QRIS ADZKIA CBT</span>
                                </div>
                            @endif
                        </div>

                        <p class="text-xs text-gray-600 max-w-sm mx-auto">
                            Buka aplikasi BCA, Mandiri Livin, GoPay, OVO, Dana, atau ShopeePay, pilih menu <strong>Scan QR</strong>, lalu scan kode di atas.
                        </p>
                    </div>
                @endif

                <!-- Live Auto-Verification Note -->
                <div class="p-4 rounded-xl bg-gray-100 border border-gray-200 flex items-center justify-between text-xs text-gray-600">
                    <div class="flex items-center gap-2">
                        <span class="w-2.5 h-2.5 rounded-full bg-green-500 animate-ping"></span>
                        <span>Sistem otomatis mendeteksi pembayaran secara real-time. Jangan tutup halaman ini.</span>
                    </div>
                </div>

                <!-- Sandbox / Local Simulation Button -->
                <div class="pt-4 border-t border-gray-200 text-center space-y-2">
                    <span class="text-[11px] font-bold text-gray-500 uppercase tracking-wider block">Mode Pengujian / Simulasi</span>
                    <form method="POST" action="{{ route('orders.simulate-pay', $order) }}">
                        @csrf
                        <button type="submit" class="px-5 py-2.5 rounded-xl bg-amber-500 hover:bg-amber-600 active:bg-amber-700 text-white text-xs font-bold transition-all shadow-xs cursor-pointer inline-flex items-center gap-1.5">
                            <x-radix-icon name="lightning-bolt" class="w-4 h-4" />
                            <span>Simulasikan Pembayaran Berhasil (Instant Settle)</span>
                        </button>
                    </form>
                    <p class="text-[11px] text-gray-500">Klik tombol di atas untuk menguji konfirmasi webhook pembayaran dan pembagian bagi hasil secara instan.</p>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
