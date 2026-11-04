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
                <p class="text-xs text-gray-11 mt-1">
                    Pembayaran sebesar <strong>Rp {{ number_format($order->total_amount, 0, ',', '.') }}</strong>
                    @if($order->coupon_code_snapshot)
                        <span class="text-green-11 font-semibold">(Diskon Kupon {{ $order->coupon_code_snapshot }} hemat Rp {{ number_format($order->discount_amount, 0, ',', '.') }})</span>
                    @endif
                    telah kami terima. Anda sekarang dapat memulai pengerjaan ujian CBT.
                </p>
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
                    <div class="flex items-center gap-2 mt-1">
                        <p class="text-xs text-gray-300">{{ $order->assessment?->title }}</p>
                        @if($order->coupon_code_snapshot)
                            <span class="text-[10px] font-mono font-bold px-2 py-0.5 rounded bg-purple-400/20 text-purple-200 border border-purple-400/30">
                                Kupon: {{ $order->coupon_code_snapshot }} (-Rp {{ number_format($order->discount_amount, 0, ',', '.') }})
                            </span>
                        @endif
                    </div>
                </div>
                <div class="text-right">
                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold bg-amber-400/20 text-amber-300 border border-amber-400/40">
                        <span class="w-2 h-2 rounded-full bg-amber-400 animate-pulse"></span>
                        <span>Pending</span>
                    </span>
                </div>
            </div>

            <!-- Payment Instructions Body -->
            @php
                $gatewayName = match($order->payment_gateway) {
                    'ipaymu' => 'iPaymu',
                    'tripay' => 'TriPay',
                    default => 'Payment Gateway'
                };
                $instructions = data_get($order->gateway_payload, 'data.instructions') ?: data_get($order->gateway_payload, 'instructions', []);
            @endphp
            <div class="p-6 space-y-6">
                <!-- Payment URL / Hosted Checkout -->
                @if($order->payment_url)
                    <div class="p-5 rounded-2xl bg-cyan-50 border border-cyan-200 text-center space-y-3">
                        <span class="text-xs font-bold text-cyan-900 uppercase tracking-wider block">Portal Pembayaran Digital ({{ $gatewayName }})</span>
                        <p class="text-xs text-cyan-800">
                            Selesaikan pembayaran menggunakan GoPay, ShopeePay, DANA, OVO, Virtual Account, QRIS, atau Kartu Kredit.
                        </p>
                        <div>
                            <a href="{{ $order->payment_url }}" target="_blank" rel="noopener noreferrer"
                               class="inline-flex items-center gap-2 px-6 py-3 rounded-xl bg-cyan-600 hover:bg-cyan-700 active:bg-cyan-800 text-white font-bold text-xs shadow-sm hover:shadow transition-all cursor-pointer">
                                <span>Buka Halaman Pembayaran {{ $gatewayName }}</span>
                                <x-radix-icon name="external-link" class="w-4 h-4" />
                            </a>
                        </div>
                    </div>
                @endif

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

                <!-- Payment Instructions Accordion -->
                @if(!empty($instructions))
                    <div class="space-y-3" x-data="{ activeAccordion: 0 }">
                        <h4 class="font-display font-bold text-xs uppercase tracking-wider text-gray-12">Panduan Cara Pembayaran</h4>
                        <div class="space-y-2">
                            @foreach($instructions as $idx => $inst)
                                <div class="rounded-xl border border-gray-6 bg-gray-1 overflow-hidden">
                                    <button type="button" @click="activeAccordion = (activeAccordion === {{ $idx }} ? null : {{ $idx }})"
                                            class="w-full px-4 py-3 flex items-center justify-between text-left text-xs font-bold text-gray-12 hover:bg-gray-2 cursor-pointer transition-colors">
                                        <span>{{ $inst['title'] ?? 'Panduan '.($idx + 1) }}</span>
                                        <x-radix-icon name="chevron-down" class="w-4 h-4 text-gray-9 transition-transform" ::class="activeAccordion === {{ $idx }} ? 'rotate-180' : ''" />
                                    </button>
                                    <div x-show="activeAccordion === {{ $idx }}" x-collapse class="px-4 pb-3 pt-1 text-xs text-gray-11 space-y-1.5 border-t border-gray-4">
                                        <ol class="list-decimal list-inside space-y-1">
                                            @foreach(($inst['steps'] ?? []) as $step)
                                                <li class="text-xs leading-relaxed">{!! strip_tags($step, '<b><strong><i><em><code>') !!}</li>
                                            @endforeach
                                        </ol>
                                    </div>
                                </div>
                            @endforeach
                        </div>
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
                @php
                    $isIpaymuSandbox = filter_var(config('payment.gateways.ipaymu.sandbox'), FILTER_VALIDATE_BOOLEAN);
                @endphp
                @if($isIpaymuSandbox || app()->environment('local', 'testing') || auth()->user()?->isSuperUser())
                    <div class="p-5 rounded-2xl bg-amber-50 border-2 border-amber-300 text-amber-950 space-y-3 shadow-xs">
                        <div class="flex items-center justify-between">
                            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold bg-amber-200/80 text-amber-900 border border-amber-300">
                                <span class="w-2 h-2 rounded-full bg-amber-600 animate-pulse"></span>
                                <span>Lingkungan Pengujian Sandbox iPaymu Aktif</span>
                            </span>
                            <span class="text-[10px] font-mono font-bold text-amber-800">sandbox.ipaymu.com</span>
                        </div>
                        <p class="text-xs text-amber-900 leading-relaxed">
                            Sistem sedang dalam <strong>Masa Peninjauan / Review Tim iPaymu</strong>. Untuk menyelesaikan alur pembelian asesmen dan membuka akses ujian secara langsung, klik tombol di bawah:
                        </p>
                        <form method="POST" action="{{ route('orders.simulate-pay', $order) }}">
                            @csrf
                            <button type="submit" class="w-full py-3 px-4 rounded-xl bg-amber-500 hover:bg-amber-600 active:bg-amber-700 text-white text-xs font-bold transition-all shadow-sm hover:shadow flex items-center justify-center gap-2 cursor-pointer">
                                <x-radix-icon name="check-circled" class="w-4 h-4" />
                                <span>Selesaikan Pembayaran Sandbox (Aktifkan Akses Ujian Sekarang)</span>
                            </button>
                        </form>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-layouts.app>
