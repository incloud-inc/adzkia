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
        adminFees: { QRIS: 1000, VA_BCA: 3000, VA_MANDIRI: 3000, VA_BRI: 3000, VA_BNI: 3000, SHOPEEPAY: 1500 }
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
                                    <div @click="selectedPackageId = {{ $pkg->id }}; basePrice = {{ (float)$pkg->price }}; selectedAttempts = {{ (int)$pkg->attempts }}"
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

                    <!-- QRIS & E-Wallet Section -->
                    <div class="bg-white p-5 rounded-2xl border border-gray-6 shadow-xs space-y-4">
                        <div class="flex items-center gap-2 border-b border-gray-5 pb-3">
                            <span class="w-7 h-7 rounded-lg bg-green-3 text-green-11 font-bold flex items-center justify-center text-xs">{{ isset($packages) && $packages->count() > 0 ? '2' : '1' }}</span>
                            <div>
                                <h3 class="font-display font-bold text-sm text-gray-12">QRIS &amp; E-Wallet (Instan)</h3>
                                <p class="text-[11px] text-gray-11">Bayar langsung lewat GoPay, OVO, Dana, ShopeePay, atau Mobile Banking.</p>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                            <!-- QRIS -->
                            <div @click="selectedMethod = 'QRIS'"
                                 :class="selectedMethod === 'QRIS' ? 'border-green-8 bg-green-2/40 ring-2 ring-green-7' : 'border-gray-6 bg-white hover:border-gray-7'"
                                 class="p-4 rounded-xl border transition-all cursor-pointer flex flex-col justify-between">
                                <div class="flex items-center justify-between mb-2">
                                    <span class="font-bold text-sm text-gray-12">QRIS Nasional</span>
                                    <span class="text-xs font-semibold px-2 py-0.5 rounded bg-green-3 text-green-11">Instan</span>
                                </div>
                                <p class="text-[11px] text-gray-11">Scan via seluruh aplikasi e-wallet &amp; m-banking</p>
                                <span class="text-[11px] font-semibold text-gray-10 mt-2 block">Biaya: Rp 1.000</span>
                            </div>

                            <!-- ShopeePay Direct -->
                            <div @click="selectedMethod = 'SHOPEEPAY'"
                                 :class="selectedMethod === 'SHOPEEPAY' ? 'border-green-8 bg-green-2/40 ring-2 ring-green-7' : 'border-gray-6 bg-white hover:border-gray-7'"
                                 class="p-4 rounded-xl border transition-all cursor-pointer flex flex-col justify-between">
                                <div class="flex items-center justify-between mb-2">
                                    <span class="font-bold text-sm text-gray-12">ShopeePay Direct</span>
                                    <span class="text-xs font-semibold px-2 py-0.5 rounded bg-orange-100 text-orange-700">App</span>
                                </div>
                                <p class="text-[11px] text-gray-11">Buka langsung aplikasi Shopee untuk bayar</p>
                                <span class="text-[11px] font-semibold text-gray-10 mt-2 block">Biaya: Rp 1.500</span>
                            </div>
                        </div>
                    </div>

                    <!-- Virtual Account Section -->
                    <div class="bg-white p-5 rounded-2xl border border-gray-6 shadow-xs space-y-4">
                        <div class="flex items-center gap-2 border-b border-gray-5 pb-3">
                            <span class="w-7 h-7 rounded-lg bg-blue-3 text-blue-11 font-bold flex items-center justify-center text-xs">{{ isset($packages) && $packages->count() > 0 ? '3' : '2' }}</span>
                            <div>
                                <h3 class="font-display font-bold text-sm text-gray-12">Virtual Account (Transfer Otomatis)</h3>
                                <p class="text-[11px] text-gray-11">Nomor rekening unik otomatis verifikasi 24/7 tanpa perlu kirim bukti transfer.</p>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                            <!-- BCA -->
                            <div @click="selectedMethod = 'VA_BCA'"
                                 :class="selectedMethod === 'VA_BCA' ? 'border-green-8 bg-green-2/40 ring-2 ring-green-7' : 'border-gray-6 bg-white hover:border-gray-7'"
                                 class="p-3.5 rounded-xl border transition-all cursor-pointer flex items-center justify-between">
                                <div>
                                    <span class="font-bold text-xs text-gray-12 block">BCA Virtual Account</span>
                                    <span class="text-[11px] text-gray-10 font-semibold">Biaya: Rp 3.000</span>
                                </div>
                                <span x-show="selectedMethod === 'VA_BCA'" class="text-green-9"><x-radix-icon name="check-circled" class="w-5 h-5"/></span>
                            </div>

                            <!-- Mandiri -->
                            <div @click="selectedMethod = 'VA_MANDIRI'"
                                 :class="selectedMethod === 'VA_MANDIRI' ? 'border-green-8 bg-green-2/40 ring-2 ring-green-7' : 'border-gray-6 bg-white hover:border-gray-7'"
                                 class="p-3.5 rounded-xl border transition-all cursor-pointer flex items-center justify-between">
                                <div>
                                    <span class="font-bold text-xs text-gray-12 block">Mandiri Virtual Account</span>
                                    <span class="text-[11px] text-gray-10 font-semibold">Biaya: Rp 3.000</span>
                                </div>
                                <span x-show="selectedMethod === 'VA_MANDIRI'" class="text-green-9"><x-radix-icon name="check-circled" class="w-5 h-5"/></span>
                            </div>

                            <!-- BRI -->
                            <div @click="selectedMethod = 'VA_BRI'"
                                 :class="selectedMethod === 'VA_BRI' ? 'border-green-8 bg-green-2/40 ring-2 ring-green-7' : 'border-gray-6 bg-white hover:border-gray-7'"
                                 class="p-3.5 rounded-xl border transition-all cursor-pointer flex items-center justify-between">
                                <div>
                                    <span class="font-bold text-xs text-gray-12 block">BRI Virtual Account (BRIVA)</span>
                                    <span class="text-[11px] text-gray-10 font-semibold">Biaya: Rp 3.000</span>
                                </div>
                                <span x-show="selectedMethod === 'VA_BRI'" class="text-green-9"><x-radix-icon name="check-circled" class="w-5 h-5"/></span>
                            </div>

                            <!-- BNI -->
                            <div @click="selectedMethod = 'VA_BNI'"
                                 :class="selectedMethod === 'VA_BNI' ? 'border-green-8 bg-green-2/40 ring-2 ring-green-7' : 'border-gray-6 bg-white hover:border-gray-7'"
                                 class="p-3.5 rounded-xl border transition-all cursor-pointer flex items-center justify-between">
                                <div>
                                    <span class="font-bold text-xs text-gray-12 block">BNI Virtual Account</span>
                                    <span class="text-[11px] text-gray-10 font-semibold">Biaya: Rp 3.000</span>
                                </div>
                                <span x-show="selectedMethod === 'VA_BNI'" class="text-green-9"><x-radix-icon name="check-circled" class="w-5 h-5"/></span>
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
                        <div class="flex justify-between items-center">
                            <span>Biaya Layanan Gateway</span>
                            <span class="font-semibold text-gray-12" x-text="'Rp ' + (adminFees[selectedMethod] || 0).toLocaleString('id-ID')"></span>
                        </div>
                    </div>

                    <!-- Total Amount -->
                    <div class="flex justify-between items-center">
                        <span class="font-bold text-sm text-gray-12">Total Pembayaran</span>
                        <span class="font-display font-black text-xl text-green-9"
                              x-text="'Rp ' + (basePrice + (adminFees[selectedMethod] || 0)).toLocaleString('id-ID')"></span>
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
