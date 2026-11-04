@php
    $defaultPackage = isset($packages) && $packages->count() > 0 ? $packages->first() : null;
    $initialPrice = $defaultPackage ? (float) $defaultPackage->price : (float) $assessment->price;
    $initialPackageId = $defaultPackage ? $defaultPackage->id : 'null';
    $initialAttempts = $defaultPackage ? (int) $defaultPackage->attempts : 1;
@endphp

<x-layouts.app>
    <x-slot:title>Checkout Pembelian Asesmen - {{ $assessment->title }}</x-slot:title>

    <div class="max-w-4xl mx-auto space-y-6 pb-16" x-data="{
        selectedMethod: 'QRIS',
        selectedPackageId: {{ $initialPackageId }},
        basePrice: {{ $initialPrice }},
        selectedAttempts: {{ $initialAttempts }},
        feeConfig: {
            QRIS: { flat: 0, percent: 0.70, min: 0 }
        },
        calculateFee(method, amount) {
            let conf = this.feeConfig[method] || { flat: 0, percent: 0.70, min: 0 };
            let percentFee = conf.percent > 0 ? (amount * conf.percent / 100) : 0;
            let total = conf.flat + percentFee;
            if (conf.min > 0 && total < conf.min) total = conf.min;
            return Math.round(total);
        },
        get finalAmount() {
            return Math.max(0, this.basePrice - this.discountAmount);
        },
        get currentAdminFee() {
            return this.calculateFee(this.selectedMethod, this.finalAmount);
        },
        get totalPay() {
            return this.finalAmount + this.currentAdminFee;
        },
        couponInput: '{{ old('coupon_code', '') }}',
        appliedCoupon: null,
        discountAmount: 0,
        couponMessage: '',
        couponError: '{{ $errors->first('coupon_code') }}',
        isApplying: false,
        async applyCoupon() {
            if (!this.couponInput.trim()) return;
            this.isApplying = true;
            this.couponError = '';
            this.couponMessage = '';
            try {
                const response = await fetch('{{ route('orders.apply-coupon', $assessment) }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify({
                        coupon_code: this.couponInput.trim(),
                        package_id: this.selectedPackageId
                    })
                });
                const data = await response.json();
                if (response.ok && data.success) {
                    this.appliedCoupon = data.coupon;
                    this.discountAmount = data.coupon.discount_amount;
                    this.couponMessage = data.message;
                    this.couponError = '';
                } else {
                    this.appliedCoupon = null;
                    this.discountAmount = 0;
                    this.couponError = data.message || 'Kupon tidak valid.';
                }
            } catch (err) {
                this.couponError = 'Gagal memvalidasi kupon. Silakan coba lagi.';
            } finally {
                this.isApplying = false;
            }
        },
        removeCoupon() {
            this.couponInput = '';
            this.appliedCoupon = null;
            this.discountAmount = 0;
            this.couponMessage = '';
            this.couponError = '';
        }
    }">
        <!-- Top Breadcrumb Navigation -->
        <div class="flex items-center gap-3">
            <a href="{{ route('assessments.show', $assessment) }}" class="p-2.5 rounded-xl border border-gray-6 bg-white hover:bg-gray-3 text-gray-12 transition-colors cursor-pointer" title="Kembali ke Asesmen">
                <x-radix-icon name="arrow-left" class="w-4 h-4" />
            </a>
            <div>
                <h1 class="font-display font-extrabold text-2xl text-gray-12 tracking-tight">Checkout Asesmen</h1>
                <p class="text-xs text-gray-11">Pilih paket kuota pengerjaan &amp; metode pembayaran untuk membuka akses ujian CBT.</p>
            </div>
        </div>

        @if(session('error'))
            <div class="p-4 rounded-2xl bg-red-50 border border-red-200 text-red-900 text-xs flex items-start gap-3 shadow-xs">
                <div class="w-8 h-8 rounded-xl bg-red-100 flex items-center justify-center shrink-0 text-red-700 font-bold">
                    <x-radix-icon name="exclamation-triangle" class="w-4 h-4" />
                </div>
                <div class="space-y-1">
                    <p class="font-bold text-sm text-red-950">Terjadi Kendala Pembayaran</p>
                    <p class="text-red-800">{{ session('error') }}</p>
                </div>
            </div>
        @endif

        @if(isset($access) && $access)
            <!-- Info Akumulasi Kuota -->
            <div class="p-4 rounded-2xl bg-amber-50 border border-amber-200 text-amber-900 text-xs flex items-start gap-3 shadow-xs">
                <div class="w-8 h-8 rounded-xl bg-amber-100 flex items-center justify-center shrink-0 text-amber-800">
                    <x-radix-icon name="info-circled" class="w-4 h-4" />
                </div>
                <div class="space-y-1">
                    <p class="font-bold text-sm text-amber-950">Informasi Perpanjangan &amp; Akumulasi Kuota</p>
                    <p class="text-amber-800">
                        Masa aktif sebelumnya berakhir pada <strong>{{ $access->expires_at?->format('d M Y') }}</strong>.
                        @if($access->availableAttempts() > 0)
                            Anda masih memiliki <strong class="text-amber-950">{{ $access->availableAttempts() }} sisa percobaan</strong> lama. Sisa tersebut akan <strong>otomatis diakumulasikan</strong> dengan kuota paket baru yang Anda beli, serta masa aktif diperpanjang 35 hari!
                        @else
                            Akses Anda telah habis. Pembelian paket baru akan menambahkan kuota percobaan dan memperpanjang masa aktif 35 hari.
                        @endif
                    </p>
                </div>
            </div>
        @endif

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-start">
            <!-- Left Column: Package & Payment Selection (7 cols) -->
            <div class="lg:col-span-7 space-y-5">
                <form id="checkout-form" method="POST" action="{{ route('orders.store', $assessment) }}" class="space-y-5">
                    @csrf
                    <input type="hidden" name="payment_method" :value="selectedMethod">
                    <input type="hidden" name="package_id" :value="selectedPackageId">
                    <input type="hidden" name="coupon_code" :value="appliedCoupon ? appliedCoupon.code : couponInput">

                    @if(isset($packages) && $packages->count() > 0)
                        <!-- Package Selection -->
                        <div class="bg-white p-5 rounded-2xl border border-gray-6 shadow-xs space-y-4">
                            <div class="flex items-center justify-between border-b border-gray-5 pb-3">
                                <div class="flex items-center gap-2">
                                    <span class="w-7 h-7 rounded-lg bg-blue-3 text-blue-11 font-bold flex items-center justify-center text-xs">1</span>
                                    <div>
                                        <h3 class="font-display font-bold text-sm text-gray-12">Pilih Paket Kuota Percobaan</h3>
                                        <p class="text-[11px] text-gray-11">Pilih jumlah percobaan pengerjaan asesmen yang Anda butuhkan.</p>
                                    </div>
                                </div>
                                <span class="text-[11px] font-bold text-blue-11 bg-blue-2 border border-blue-4 px-2.5 py-0.5 rounded-full">Masa Aktif 35 Hari</span>
                            </div>

                            <div class="grid grid-cols-1 sm:grid-cols-{{ min($packages->count(), 3) }} gap-3">
                                @foreach($packages as $pkg)
                                    <div @click="selectedPackageId = {{ $pkg->id }}; basePrice = {{ (float)$pkg->price }}; selectedAttempts = {{ (int)$pkg->attempts }}; if(appliedCoupon) applyCoupon();"
                                         :class="selectedPackageId === {{ $pkg->id }} ? 'border-blue-8 bg-blue-2/40 ring-2 ring-blue-7 shadow-xs' : 'border-gray-6 bg-white hover:border-gray-7'"
                                         class="p-4 rounded-xl border transition-all cursor-pointer flex flex-col justify-between relative group">
                                        <div class="space-y-1.5 mb-3">
                                            <div class="flex items-center justify-between">
                                                <span class="font-bold text-xs text-gray-12">{{ $pkg->name }}</span>
                                                <span class="text-[11px] font-extrabold px-2 py-0.5 rounded bg-blue-3 text-blue-11">{{ $pkg->attempts }}x Ujian</span>
                                            </div>
                                            <p class="text-[11px] text-gray-10">Masa aktif: 35 hari</p>
                                        </div>
                                        <div class="pt-2 border-t border-gray-4 flex items-center justify-between">
                                            <span class="font-display font-black text-sm text-blue-11">Rp {{ number_format($pkg->price, 0, ',', '.') }}</span>
                                            <div x-show="selectedPackageId === {{ $pkg->id }}" class="text-blue-9">
                                                <x-radix-icon name="check-circled" class="w-4 h-4" />
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    <!-- Metode Pembayaran Resmi: QRIS Nasional (iPaymu) -->
                    <div class="bg-white p-5 rounded-2xl border border-gray-6 shadow-xs space-y-4">
                        <div class="flex items-center justify-between border-b border-gray-5 pb-3">
                            <div class="flex items-center gap-2">
                                <span class="w-7 h-7 rounded-lg bg-green-3 text-green-11 font-bold flex items-center justify-center text-xs">{{ isset($packages) && $packages->count() > 0 ? '2' : '1' }}</span>
                                <div>
                                    <h3 class="font-display font-bold text-sm text-gray-12">Metode Pembayaran Resmi: QRIS</h3>
                                    <p class="text-[11px] text-gray-11">Pembayaran aman berstandar Bank Indonesia via gerbang iPaymu.</p>
                                </div>
                            </div>
                            <span class="text-[11px] font-bold text-green-11 bg-green-2 border border-green-4 px-2.5 py-0.5 rounded-full flex items-center gap-1">
                                <span class="w-1.5 h-1.5 rounded-full bg-green-500 animate-pulse"></span>
                                <span>Verifikasi Otomatis</span>
                            </span>
                        </div>

                        <!-- Card Pilihan QRIS Tunggal -->
                        <div class="p-5 rounded-xl border-2 border-green-8 bg-green-2/40 ring-2 ring-green-7/50 shadow-xs relative space-y-3">
                            <div class="flex items-start justify-between">
                                <div class="flex items-center gap-3">
                                    <div class="w-12 h-12 rounded-xl bg-white border border-green-4 shadow-2xs flex items-center justify-center text-green-11">
                                        <x-radix-icon name="view-grid" class="w-7 h-7 text-green-10" />
                                    </div>
                                    <div>
                                        <div class="flex items-center gap-2">
                                            <span class="font-display font-extrabold text-base text-gray-12">QRIS Nasional</span>
                                            <span class="text-[10px] font-bold px-2 py-0.5 rounded bg-green-3 text-green-11 border border-green-5">iPaymu</span>
                                        </div>
                                        <p class="text-xs text-gray-11 mt-0.5">Scan kode QR menggunakan seluruh e-wallet &amp; mobile banking Indonesia</p>
                                    </div>
                                </div>
                                <div class="text-green-11 bg-white p-1 rounded-full shadow-2xs border border-green-4">
                                    <x-radix-icon name="check-circled" class="w-5 h-5" />
                                </div>
                            </div>

                            <!-- Logo-logo didukung -->
                            <div class="pt-2 border-t border-green-6/30 flex flex-wrap items-center gap-1.5 text-[10px] font-semibold text-gray-11">
                                <span class="px-2 py-0.5 rounded bg-white border border-gray-4 text-gray-12">BCA</span>
                                <span class="px-2 py-0.5 rounded bg-white border border-gray-4 text-gray-12">Mandiri Livin</span>
                                <span class="px-2 py-0.5 rounded bg-white border border-gray-4 text-gray-12">BRImo</span>
                                <span class="px-2 py-0.5 rounded bg-white border border-gray-4 text-gray-12">BNI</span>
                                <span class="px-2 py-0.5 rounded bg-white border border-gray-4 text-gray-12">BSI</span>
                                <span class="px-2 py-0.5 rounded bg-white border border-gray-4 text-gray-12">GoPay</span>
                                <span class="px-2 py-0.5 rounded bg-white border border-gray-4 text-gray-12">OVO</span>
                                <span class="px-2 py-0.5 rounded bg-white border border-gray-4 text-gray-12">DANA</span>
                                <span class="px-2 py-0.5 rounded bg-white border border-gray-4 text-gray-12">ShopeePay</span>
                                <span class="px-2 py-0.5 rounded bg-white border border-gray-4 text-gray-12">LinkAja</span>
                            </div>

                            <!-- Kalkulasi Transparan Biaya Layanan iPaymu -->
                            <div class="pt-2 border-t border-green-6/30 flex items-center justify-between text-xs">
                                <div>
                                    <span class="font-bold text-gray-12">Biaya Transaksi iPaymu:</span>
                                    <span class="text-gray-11 ml-1">0.70% (MDR QRIS Resmi)</span>
                                </div>
                                <div class="font-mono font-black text-green-11 text-sm" x-text="'Rp ' + calculateFee('QRIS', finalAmount).toLocaleString('id-ID')">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Right Column: Order Summary (5 cols) -->
            <div class="lg:col-span-5 space-y-5">
                <div class="bg-white p-6 rounded-2xl border border-gray-6 shadow-sm space-y-5">
                    <h3 class="font-display font-extrabold text-base text-gray-12 border-b border-gray-5 pb-3">Ringkasan Pesanan</h3>

                    <!-- Assessment Card Info -->
                    <div class="p-4 rounded-xl bg-gray-2 border border-gray-5 space-y-2">
                        <span class="text-[11px] font-bold uppercase tracking-wider text-green-11 px-2 py-0.5 rounded bg-green-3">
                            {{ $assessment->type }}
                        </span>
                        <h4 class="font-display font-bold text-sm text-gray-12 leading-snug">{{ $assessment->title }}</h4>
                        <div class="flex items-center gap-3 text-xs text-gray-11 pt-1">
                            <span>📚 {{ $assessment->subject?->name ?? 'Umum' }}</span>
                            <span>⏱ {{ $assessment->duration_minutes }} menit</span>
                        </div>
                        @if($tenant)
                            <div class="text-[11px] text-gray-10 pt-1 border-t border-gray-4">
                                Penyelenggara: <strong>{{ $tenant->name }}</strong>
                            </div>
                        @endif
                    </div>

                    <!-- Promo / Coupon Code Section -->
                    <div class="p-4 rounded-xl bg-purple-1/40 border border-purple-6/40 space-y-2.5">
                        <div class="flex items-center justify-between">
                            <span class="text-xs font-bold text-gray-12 flex items-center gap-1.5">
                                <x-radix-icon name="badge" class="w-4 h-4 text-purple-10" />
                                <span>Punya Kode Kupon Diskon?</span>
                            </span>
                            @if($tenant && $tenant->isEnterprise())
                                <span class="text-[10px] font-bold px-1.5 py-0.5 rounded bg-purple-3 text-purple-11">
                                    {{ $tenant->name }}
                                </span>
                            @endif
                        </div>

                        <!-- Not Applied State: Input & Button -->
                        <div x-show="!appliedCoupon" class="space-y-2">
                            <div class="flex gap-2">
                                <input type="text"
                                       x-model="couponInput"
                                       @keydown.enter.prevent="applyCoupon"
                                       placeholder="MASUKKAN KODE PROMO"
                                       class="flex-1 font-mono uppercase text-xs font-bold px-3 py-2 rounded-lg border border-gray-6 bg-white focus:border-purple-8 focus:ring-1 focus:ring-purple-4 outline-none">
                                <button type="button"
                                        @click="applyCoupon"
                                        :disabled="isApplying || !couponInput.trim()"
                                        class="px-3.5 py-2 rounded-lg bg-purple-600 hover:bg-purple-700 disabled:opacity-50 text-white text-xs font-bold transition-all cursor-pointer flex items-center gap-1.5">
                                    <span x-show="!isApplying">Gunakan</span>
                                    <span x-show="isApplying" class="animate-spin">⏳</span>
                                </button>
                            </div>
                        </div>

                        <!-- Applied State: Badge with Code, Discount & Remove button -->
                        <div x-show="appliedCoupon" x-cloak class="p-2.5 rounded-lg bg-green-2 border border-green-6/50 flex items-center justify-between">
                            <div class="flex items-center gap-2">
                                <span class="w-6 h-6 rounded-md bg-green-3 text-green-11 flex items-center justify-center text-xs font-bold">✓</span>
                                <div>
                                    <div class="font-mono text-xs font-extrabold text-green-12" x-text="appliedCoupon?.code"></div>
                                    <div class="text-[11px] text-green-11 font-medium" x-text="'Hemat ' + (appliedCoupon?.formatted_discount || '') + ' (' + (appliedCoupon?.discount_amount_formatted || '') + ')'"></div>
                                </div>
                            </div>
                            <button type="button"
                                    @click="removeCoupon"
                                    class="text-xs text-red-11 hover:text-red-12 font-semibold px-2 py-1 rounded hover:bg-red-2 transition-colors cursor-pointer"
                                    title="Hapus Kupon">
                                Batal
                            </button>
                        </div>

                        <!-- Feedback Alerts -->
                        <div x-show="couponMessage" x-cloak class="text-[11px] text-green-11 font-medium flex items-center gap-1">
                            <x-radix-icon name="check" class="w-3.5 h-3.5 shrink-0" />
                            <span x-text="couponMessage"></span>
                        </div>
                        <div x-show="couponError" x-cloak class="text-[11px] text-red-11 font-medium flex items-center gap-1">
                            <x-radix-icon name="cross-circled" class="w-3.5 h-3.5 shrink-0" />
                            <span x-text="couponError"></span>
                        </div>
                    </div>

                    <!-- Financial Breakdown -->
                    <div class="space-y-2.5 text-xs text-gray-11 border-b border-gray-5 pb-4">
                        @if(isset($packages) && $packages->count() > 0)
                            <div class="flex justify-between items-center">
                                <span>Paket Dipilih</span>
                                <span class="font-semibold text-blue-11" x-text="selectedAttempts + 'x Ujian (35 Hari)'"></span>
                            </div>
                        @endif
                        <div class="flex justify-between items-center">
                            <span>Harga Asesmen</span>
                            <span class="font-semibold text-gray-12" x-text="'Rp ' + basePrice.toLocaleString('id-ID')">Rp {{ number_format($defaultPackage ? $defaultPackage->price : (float) $assessment->price, 0, ',', '.') }}</span>
                        </div>
                        <div x-show="discountAmount > 0" x-cloak class="flex justify-between items-center text-green-11 font-bold">
                            <span class="flex items-center gap-1">
                                <span>Diskon Kupon</span>
                                <span class="text-[10px] px-1.5 py-0.2 bg-green-3 text-green-12 rounded" x-text="appliedCoupon?.formatted_discount"></span>
                            </span>
                            <span x-text="'- Rp ' + discountAmount.toLocaleString('id-ID')"></span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span>Biaya Layanan Gateway</span>
                            <span class="font-semibold text-gray-12" x-text="'Rp ' + currentAdminFee.toLocaleString('id-ID')"></span>
                        </div>
                    </div>

                    <!-- Total Amount -->
                    <div class="flex justify-between items-center">
                        <span class="font-bold text-sm text-gray-12">Total Pembayaran</span>
                        <span class="font-display font-black text-xl text-green-9"
                              x-text="'Rp ' + totalPay.toLocaleString('id-ID')"></span>
                    </div>

                    <!-- Submit Button -->
                    <button type="button" onclick="document.getElementById('checkout-form').submit()"
                            class="w-full py-3.5 px-4 rounded-xl bg-green-9 hover:bg-green-10 active:bg-green-11 text-white text-sm font-bold flex items-center justify-center gap-2 transition-all shadow-md active:scale-[0.99] cursor-pointer">
                        <span>Lanjutkan ke Pembayaran</span>
                        <x-radix-icon name="arrow-right" class="w-4 h-4" />
                    </button>

                    <div class="flex items-center justify-center gap-2 text-[11px] text-gray-9 pt-1">
                        <x-radix-icon name="lock-closed" class="w-3.5 h-3.5 text-green-9" />
                        <span>Pembayaran Aman &amp; Terverifikasi Otomatis</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
