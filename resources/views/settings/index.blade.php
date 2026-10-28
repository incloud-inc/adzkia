<x-layouts.app>
    <x-slot:title>Pengaturan Sistem, Storage R2 & Payment Gateway</x-slot:title>

    <div class="space-y-6 pb-20 max-w-6xl mx-auto" x-data="{ 
        activeTab: window.location.hash ? window.location.hash.substring(1) : 'gateway',
        activeDriver: '{{ $currentDriver }}',
        activeDisk: '{{ $r2Config['upload_disk'] ?? 'r2' }}',
        showTripayKey: false,
        showTripaySecret: false,
        showDuitkuKey: false,
        showMidtransServerKey: false,
        showMidtransClientKey: false,
        showR2Key: false,
        showR2Secret: false,
        copiedUrl: null,
        testing: { r2: false, database: false, redis: false, ai: false },
        testResults: { r2: null, database: null, redis: null, ai: null },
        copyToClipboard(text, id) {
            navigator.clipboard.writeText(text);
            this.copiedUrl = id;
            setTimeout(() => { this.copiedUrl = null }, 2000);
        },
        async runTest(target) {
            this.testing[target] = true;
            this.testResults[target] = null;
            try {
                const form = document.getElementById('settings-form');
                const formData = new FormData(form);
                const res = await fetch('{{ url('settings/test-connection') }}/' + target, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json'
                    },
                    body: formData
                });
                const data = await res.json();
                this.testResults[target] = data;
            } catch(e) {
                this.testResults[target] = { success: false, message: 'Gagal menghubungi server untuk pengujian: ' + e.message };
            } finally {
                this.testing[target] = false;
            }
        }
    }">
        <!-- Header & Breadcrumbs -->
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
            <div>
                <div class="flex items-center gap-2">
                    <span class="text-xs font-bold uppercase tracking-wider px-2 py-0.5 rounded-md bg-blue-3 text-blue-11 border border-blue-6/50">
                        Sistem &amp; Integrasi
                    </span>
                    <span class="text-xs font-semibold text-gray-11">Super Administrator / Owner</span>
                </div>
                <h1 class="font-display font-extrabold text-2xl sm:text-3xl text-gray-12 tracking-tight mt-1">
                    Pengaturan Sistem, Storage &amp; Gerbang Pembayaran
                </h1>
                <p class="text-xs text-gray-11 mt-0.5">Konfigurasi Cloudflare R2 Object Storage, kanal payment gateway (Tripay / Duitku / Midtrans), parameter webhook, dan kesehatan server.</p>
            </div>

            <div class="flex items-center gap-2">
                <a href="{{ route('reports.sales') }}"
                   class="inline-flex items-center gap-1.5 px-3.5 py-2 rounded-xl border border-gray-6 bg-white hover:bg-gray-3 text-gray-12 text-xs font-semibold transition-all shadow-xs cursor-pointer">
                    <x-radix-icon name="pie-chart" class="w-4 h-4 text-gray-11" />
                    <span>Laporan Penjualan</span>
                </a>
                <a href="{{ route('media.gallery.index') }}"
                   class="inline-flex items-center gap-1.5 px-3.5 py-2 rounded-xl border border-gray-6 bg-white hover:bg-gray-3 text-gray-12 text-xs font-semibold transition-all shadow-xs cursor-pointer">
                    <x-radix-icon name="image" class="w-4 h-4 text-blue-11" />
                    <span>Galeri Media</span>
                </a>
            </div>
        </div>

        @if(session('success'))
            <div class="p-4 rounded-xl bg-green-2 border border-green-6/60 text-green-11 text-xs font-semibold flex items-center justify-between shadow-xs">
                <div class="flex items-center gap-2.5">
                    <x-radix-icon name="check-circled" class="w-5 h-5 text-green-9 shrink-0" />
                    <span>{{ session('success') }}</span>
                </div>
            </div>
        @endif

        @if($errors->any())
            <div class="p-4 rounded-xl bg-red-2 border border-red-6/60 text-red-11 text-xs font-semibold space-y-1 shadow-xs">
                <div class="flex items-center gap-2 font-bold text-sm">
                    <x-radix-icon name="exclamation-triangle" class="w-5 h-5 text-red-9 shrink-0" />
                    <span>Terjadi kesalahan pada formulir pengaturan:</span>
                </div>
                <ul class="list-disc list-inside pl-5">
                    @foreach($errors->all() as $err)
                        <li>{{ $err }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Navigation Tabs -->
        <div class="border-b border-gray-6 flex items-center gap-4 sm:gap-6 overflow-x-auto hide-scrollbar">
            <button type="button" 
                    @click="activeTab = 'gateway'; window.location.hash = 'gateway'" 
                    class="pb-3 text-sm font-bold border-b-2 transition-colors cursor-pointer flex items-center gap-2 shrink-0"
                    :class="activeTab === 'gateway' ? 'border-blue-9 text-blue-11' : 'border-transparent text-gray-11 hover:text-gray-12'">
                <x-radix-icon name="card-stack" class="w-4 h-4" />
                <span>Payment Gateway</span>
            </button>
            <button type="button" 
                    @click="activeTab = 'storage'; window.location.hash = 'storage'" 
                    class="pb-3 text-sm font-bold border-b-2 transition-colors cursor-pointer flex items-center gap-2 shrink-0"
                    :class="activeTab === 'storage' ? 'border-blue-9 text-blue-11' : 'border-transparent text-gray-11 hover:text-gray-12'">
                <x-radix-icon name="cloud" class="w-4 h-4" />
                <span>Cloudflare R2 &amp; Media</span>
                @if($r2Status['connected'])
                    <span class="w-2 h-2 rounded-full bg-green-9"></span>
                @else
                    <span class="w-2 h-2 rounded-full bg-amber-9"></span>
                @endif
            </button>
            <button type="button" 
                    @click="activeTab = 'system'; window.location.hash = 'system'" 
                    class="pb-3 text-sm font-bold border-b-2 transition-colors cursor-pointer flex items-center gap-2 shrink-0"
                    :class="activeTab === 'system' ? 'border-blue-9 text-blue-11' : 'border-transparent text-gray-11 hover:text-gray-12'">
                <x-radix-icon name="server" class="w-4 h-4" />
                <span>Status Sistem &amp; Koneksi</span>
            </button>
            <button type="button" 
                    @click="activeTab = 'tiers'; window.location.hash = 'tiers'" 
                    class="pb-3 text-sm font-bold border-b-2 transition-colors cursor-pointer flex items-center gap-2 shrink-0"
                    :class="activeTab === 'tiers' ? 'border-blue-9 text-blue-11' : 'border-transparent text-gray-11 hover:text-gray-12'">
                <x-radix-icon name="pie-chart" class="w-4 h-4" />
                <span>Bagi Hasil B2B2C</span>
            </button>
        </div>

        <form id="settings-form" method="POST" action="{{ route('settings.update') }}" class="space-y-6">
            @csrf

            <!-- ============================================== -->
            <!--            TAB 1: PAYMENT GATEWAY              -->
            <!-- ============================================== -->
            <div x-show="activeTab === 'gateway'" class="space-y-6">
                <!-- Driver Selection Cards -->
                <div class="bg-white p-6 rounded-2xl border border-gray-6 shadow-xs">
                    <h3 class="font-display font-bold text-base text-gray-12 mb-1">Pilih Driver Gateway Aktif</h3>
                    <p class="text-xs text-gray-11 mb-4">Sistem akan mengarahkan semua transaksi checkout siswa ke gateway yang dipilih secara langsung.</p>

                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                        <!-- 1. Tripay -->
                        <label class="relative p-5 rounded-2xl border-2 transition-all cursor-pointer flex flex-col justify-between"
                               :class="activeDriver === 'tripay' ? 'border-blue-9 bg-blue-2/30 shadow-xs' : 'border-gray-5 hover:border-gray-7 bg-white'">
                            <input type="radio" name="payment_driver" value="tripay" x-model="activeDriver" class="sr-only">
                            <div>
                                <div class="flex items-center justify-between mb-2">
                                    <span class="text-xs font-black uppercase tracking-wider text-blue-11 bg-blue-3 px-2 py-0.5 rounded-md">Tripay</span>
                                    <div class="w-5 h-5 rounded-full border-2 flex items-center justify-center"
                                         :class="activeDriver === 'tripay' ? 'border-blue-9 bg-blue-9 text-white' : 'border-gray-6'">
                                        <div class="w-2 h-2 bg-white rounded-full" x-show="activeDriver === 'tripay'"></div>
                                    </div>
                                </div>
                                <h4 class="font-bold text-sm text-gray-12">Tripay Payment Gateway</h4>
                                <p class="text-xs text-gray-11 mt-1">Mendukung Closed Payment QRIS, VA Bank (BCA, Mandiri, BRI, BNI), ShopeePay, dan Webhook HMAC-SHA256.</p>
                            </div>
                            <span class="inline-flex mt-4 text-[11px] font-semibold text-blue-11">Rekomendasi Produksi &bull; Biaya Rendah</span>
                        </label>

                        <!-- 2. Duitku -->
                        <label class="relative p-5 rounded-2xl border-2 transition-all cursor-pointer flex flex-col justify-between"
                                :class="activeDriver === 'duitku' ? 'border-blue-9 bg-blue-2/30 shadow-xs' : 'border-gray-5 hover:border-gray-7 bg-white'">
                            <input type="radio" name="payment_driver" value="duitku" x-model="activeDriver" class="sr-only">
                            <div>
                                <div class="flex items-center justify-between mb-2">
                                    <span class="text-xs font-black uppercase tracking-wider text-green-11 bg-green-3 px-2 py-0.5 rounded-md">Duitku</span>
                                    <div class="w-5 h-5 rounded-full border-2 flex items-center justify-center"
                                         :class="activeDriver === 'duitku' ? 'border-blue-9 bg-blue-9 text-white' : 'border-gray-6'">
                                        <div class="w-2 h-2 bg-white rounded-full" x-show="activeDriver === 'duitku'"></div>
                                    </div>
                                </div>
                                <h4 class="font-bold text-sm text-gray-12">Duitku Web API v2</h4>
                                <p class="text-xs text-gray-11 mt-1">Dukungan inquiry v2 merchant, signature MD5, dan settlement otomatis ke portal tenant.</p>
                            </div>
                            <span class="inline-flex mt-4 text-[11px] font-semibold text-green-11">Dukungan Stabil &bull; Direct VA</span>
                        </label>

                        <!-- 3. Midtrans -->
                        <label class="relative p-5 rounded-2xl border-2 transition-all cursor-pointer flex flex-col justify-between"
                               :class="activeDriver === 'midtrans' ? 'border-blue-9 bg-blue-2/30 shadow-xs' : 'border-gray-5 hover:border-gray-7 bg-white'">
                            <input type="radio" name="payment_driver" value="midtrans" x-model="activeDriver" class="sr-only">
                            <div>
                                <div class="flex items-center justify-between mb-2">
                                    <span class="text-xs font-black uppercase tracking-wider text-cyan-11 bg-cyan-3 px-2 py-0.5 rounded-md">Midtrans</span>
                                    <div class="w-5 h-5 rounded-full border-2 flex items-center justify-center"
                                         :class="activeDriver === 'midtrans' ? 'border-blue-9 bg-blue-9 text-white' : 'border-gray-6'">
                                        <div class="w-2 h-2 bg-white rounded-full" x-show="activeDriver === 'midtrans'"></div>
                                    </div>
                                </div>
                                <h4 class="font-bold text-sm text-gray-12">Midtrans Snap API</h4>
                                <p class="text-xs text-gray-11 mt-1">Dukungan GoPay, ShopeePay, QRIS, Virtual Account, Kartu Kredit, dan Popup Snap Seamless.</p>
                            </div>
                            <span class="inline-flex mt-4 text-[11px] font-semibold text-cyan-11">Enterprise Ready &bull; Snap UI</span>
                        </label>

                        <!-- 4. Sandbox Simulation -->
                        <label class="relative p-5 rounded-2xl border-2 transition-all cursor-pointer flex flex-col justify-between"
                               :class="activeDriver === 'sandbox' ? 'border-blue-9 bg-blue-2/30 shadow-xs' : 'border-gray-5 hover:border-gray-7 bg-white'">
                            <input type="radio" name="payment_driver" value="sandbox" x-model="activeDriver" class="sr-only">
                            <div>
                                <div class="flex items-center justify-between mb-2">
                                    <span class="text-xs font-black uppercase tracking-wider text-amber-11 bg-amber-3 px-2 py-0.5 rounded-md">Sandbox Demo</span>
                                    <div class="w-5 h-5 rounded-full border-2 flex items-center justify-center"
                                         :class="activeDriver === 'sandbox' ? 'border-blue-9 bg-blue-9 text-white' : 'border-gray-6'">
                                        <div class="w-2 h-2 bg-white rounded-full" x-show="activeDriver === 'sandbox'"></div>
                                    </div>
                                </div>
                                <h4 class="font-bold text-sm text-gray-12">Simulasi Interaktif</h4>
                                <p class="text-xs text-gray-11 mt-1">Mengizinkan pengujian alur pembelian tanpa menghubungkan ke server payment gateway eksternal.</p>
                            </div>
                            <span class="inline-flex mt-4 text-[11px] font-semibold text-amber-11">Ideal untuk Demo &bull; 1-Click Pay</span>
                        </label>
                    </div>
                </div>

                <!-- Tripay Credentials Form -->
                <div class="bg-white p-6 rounded-2xl border border-gray-6 shadow-xs space-y-5" x-show="activeDriver === 'tripay' || activeDriver === 'sandbox'">
                    <div class="flex items-center justify-between border-b border-gray-5 pb-3">
                        <div class="flex items-center gap-2.5">
                            <div class="w-8 h-8 rounded-xl bg-blue-3 text-blue-11 flex items-center justify-center font-black text-sm">T</div>
                            <div>
                                <h3 class="font-display font-bold text-base text-gray-12">Kredensial Akun Tripay</h3>
                                <p class="text-xs text-gray-11">Dapatkan kredensial ini di Dashboard Tripay &gt; Pengaturan &gt; Integrasi.</p>
                            </div>
                        </div>
                        <label class="flex items-center gap-2 cursor-pointer text-xs font-semibold text-gray-12">
                            <input type="checkbox" name="tripay_sandbox" value="1" {{ ($tripayConfig['sandbox'] ?? true) ? 'checked' : '' }} class="rounded border-gray-6 text-blue-9 focus:ring-blue-9">
                            <span>Aktifkan Mode Sandbox (Pengujian)</span>
                        </label>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                        <div>
                            <label class="block text-xs font-bold text-gray-12 mb-1">Merchant Code</label>
                            <input type="text" name="tripay_merchant_code" value="{{ old('tripay_merchant_code', $tripayConfig['merchant_code'] ?? '') }}"
                                   placeholder="Contoh: T12345"
                                   class="w-full px-3.5 py-2.5 rounded-xl border border-gray-6 text-sm text-gray-12 focus:ring-2 focus:ring-blue-9/20 focus:border-blue-9">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-gray-12 mb-1">API Key</label>
                            <div class="relative">
                                <input :type="showTripayKey ? 'text' : 'password'" name="tripay_api_key" value="{{ old('tripay_api_key', $tripayConfig['api_key'] ?? '') }}"
                                       placeholder="DEV-xxxx atau prod API Key"
                                       class="w-full px-3.5 py-2.5 pr-10 rounded-xl border border-gray-6 text-sm text-gray-12 focus:ring-2 focus:ring-blue-9/20 focus:border-blue-9">
                                <button type="button" @click="showTripayKey = !showTripayKey" class="absolute right-3 top-2.5 text-gray-9 hover:text-gray-12">
                                    <x-radix-icon name="eye-open" class="w-4 h-4" x-show="!showTripayKey" />
                                    <x-radix-icon name="eye-none" class="w-4 h-4" x-show="showTripayKey" />
                                </button>
                            </div>
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-gray-12 mb-1">Private Key (HMAC Secret)</label>
                            <div class="relative">
                                <input :type="showTripaySecret ? 'text' : 'password'" name="tripay_private_key" value="{{ old('tripay_private_key', $tripayConfig['private_key'] ?? '') }}"
                                       placeholder="Kunci privat HMAC SHA-256"
                                       class="w-full px-3.5 py-2.5 pr-10 rounded-xl border border-gray-6 text-sm text-gray-12 focus:ring-2 focus:ring-blue-9/20 focus:border-blue-9">
                                <button type="button" @click="showTripaySecret = !showTripaySecret" class="absolute right-3 top-2.5 text-gray-9 hover:text-gray-12">
                                    <x-radix-icon name="eye-open" class="w-4 h-4" x-show="!showTripaySecret" />
                                    <x-radix-icon name="eye-none" class="w-4 h-4" x-show="showTripaySecret" />
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Webhook instructions -->
                    <div class="p-4 rounded-xl bg-blue-2/40 border border-blue-5 text-xs text-blue-12 space-y-2">
                        <div class="flex items-center justify-between">
                            <span class="font-bold flex items-center gap-1.5">
                                <x-radix-icon name="link-2" class="w-4 h-4 text-blue-9" />
                                <span>URL Webhook / Callback Tripay (Salin ke Dashboard Tripay):</span>
                            </span>
                            <button type="button" @click="copyToClipboard('{{ $webhookUrls['tripay'] }}', 'tripay')" class="px-2.5 py-1 rounded-lg bg-blue-9 text-white font-bold text-[11px] hover:bg-blue-10 transition-colors cursor-pointer">
                                <span x-show="copiedUrl !== 'tripay'">Salin URL</span>
                                <span x-show="copiedUrl === 'tripay'">Tersalin!</span>
                            </button>
                        </div>
                        <code class="block px-3 py-1.5 rounded-lg bg-white border border-blue-4 text-blue-11 font-mono select-all">
                            {{ $webhookUrls['tripay'] }}
                        </code>
                        <p class="text-[11px] text-gray-11">Pilih Event: <span class="font-bold text-gray-12">Payment Status</span>. Header signature HMAC-SHA256 akan otomatis diverifikasi.</p>
                    </div>
                </div>

                <!-- Duitku Credentials Form -->
                <div class="bg-white p-6 rounded-2xl border border-gray-6 shadow-xs space-y-5" x-show="activeDriver === 'duitku' || activeDriver === 'sandbox'">
                    <div class="flex items-center justify-between border-b border-gray-5 pb-3">
                        <div class="flex items-center gap-2.5">
                            <div class="w-8 h-8 rounded-xl bg-green-3 text-green-11 flex items-center justify-center font-black text-sm">D</div>
                            <div>
                                <h3 class="font-display font-bold text-base text-gray-12">Kredensial Akun Duitku</h3>
                                <p class="text-xs text-gray-11">Dapatkan Merchant Code dan API Key dari dashboard Duitku.</p>
                            </div>
                        </div>
                        <label class="flex items-center gap-2 cursor-pointer text-xs font-semibold text-gray-12">
                            <input type="checkbox" name="duitku_sandbox" value="1" {{ ($duitkuConfig['sandbox'] ?? true) ? 'checked' : '' }} class="rounded border-gray-6 text-green-9 focus:ring-green-9">
                            <span>Aktifkan Mode Sandbox</span>
                        </label>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-bold text-gray-12 mb-1">Merchant Code</label>
                            <input type="text" name="duitku_merchant_code" value="{{ old('duitku_merchant_code', $duitkuConfig['merchant_code'] ?? '') }}"
                                   placeholder="Contoh: D12345"
                                   class="w-full px-3.5 py-2.5 rounded-xl border border-gray-6 text-sm text-gray-12 focus:ring-2 focus:ring-green-9/20 focus:border-green-9">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-gray-12 mb-1">API Key</label>
                            <div class="relative">
                                <input :type="showDuitkuKey ? 'text' : 'password'" name="duitku_api_key" value="{{ old('duitku_api_key', $duitkuConfig['api_key'] ?? '') }}"
                                       placeholder="Duitku Project API Key"
                                       class="w-full px-3.5 py-2.5 pr-10 rounded-xl border border-gray-6 text-sm text-gray-12 focus:ring-2 focus:ring-green-9/20 focus:border-green-9">
                                <button type="button" @click="showDuitkuKey = !showDuitkuKey" class="absolute right-3 top-2.5 text-gray-9 hover:text-gray-12">
                                    <x-radix-icon name="eye-open" class="w-4 h-4" x-show="!showDuitkuKey" />
                                    <x-radix-icon name="eye-none" class="w-4 h-4" x-show="showDuitkuKey" />
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Webhook instructions -->
                    <div class="p-4 rounded-xl bg-green-2/40 border border-green-5 text-xs text-green-12 space-y-2">
                        <div class="flex items-center justify-between">
                            <span class="font-bold flex items-center gap-1.5">
                                <x-radix-icon name="link-2" class="w-4 h-4 text-green-9" />
                                <span>URL Callback Duitku:</span>
                            </span>
                            <button type="button" @click="copyToClipboard('{{ $webhookUrls['duitku'] }}', 'duitku')" class="px-2.5 py-1 rounded-lg bg-green-9 text-white font-bold text-[11px] hover:bg-green-10 transition-colors cursor-pointer">
                                <span x-show="copiedUrl !== 'duitku'">Salin URL</span>
                                <span x-show="copiedUrl === 'duitku'">Tersalin!</span>
                            </button>
                        </div>
                        <code class="block px-3 py-1.5 rounded-lg bg-white border border-green-4 text-green-11 font-mono select-all">
                            {{ $webhookUrls['duitku'] }}
                        </code>
                    </div>
                </div>

                <!-- Midtrans Credentials Form -->
                <div class="bg-white p-6 rounded-2xl border border-gray-6 shadow-xs space-y-5" x-show="activeDriver === 'midtrans' || activeDriver === 'sandbox'">
                    <div class="flex items-center justify-between border-b border-gray-5 pb-3">
                        <div class="flex items-center gap-2.5">
                            <div class="w-8 h-8 rounded-xl bg-cyan-3 text-cyan-11 flex items-center justify-center font-black text-sm">M</div>
                            <div>
                                <h3 class="font-display font-bold text-base text-gray-12">Kredensial Akun Midtrans</h3>
                                <p class="text-xs text-gray-11">Dapatkan Server Key, Client Key, dan Merchant ID dari dashboard Midtrans MAP.</p>
                            </div>
                        </div>
                        <label class="flex items-center gap-2 cursor-pointer text-xs font-semibold text-gray-12">
                            <input type="checkbox" name="midtrans_sandbox" value="1" {{ ($midtransConfig['sandbox'] ?? true) ? 'checked' : '' }} class="rounded border-gray-6 text-cyan-9 focus:ring-cyan-9">
                            <span>Aktifkan Mode Sandbox</span>
                        </label>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                        <div>
                            <label class="block text-xs font-bold text-gray-12 mb-1">Merchant ID</label>
                            <input type="text" name="midtrans_merchant_id" value="{{ old('midtrans_merchant_id', $midtransConfig['merchant_id'] ?? '') }}"
                                   placeholder="Contoh: G123456789"
                                   class="w-full px-3.5 py-2.5 rounded-xl border border-gray-6 text-sm text-gray-12 focus:ring-2 focus:ring-cyan-9/20 focus:border-cyan-9">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-gray-12 mb-1">Server Key</label>
                            <div class="relative">
                                <input :type="showMidtransServerKey ? 'text' : 'password'" name="midtrans_server_key" value="{{ old('midtrans_server_key', $midtransConfig['server_key'] ?? '') }}"
                                       placeholder="Midtrans Server Key (SB-Mid-server-...)"
                                       class="w-full px-3.5 py-2.5 pr-10 rounded-xl border border-gray-6 text-sm text-gray-12 focus:ring-2 focus:ring-cyan-9/20 focus:border-cyan-9">
                                <button type="button" @click="showMidtransServerKey = !showMidtransServerKey" class="absolute right-3 top-2.5 text-gray-9 hover:text-gray-12">
                                    <x-radix-icon name="eye-open" class="w-4 h-4" x-show="!showMidtransServerKey" />
                                    <x-radix-icon name="eye-none" class="w-4 h-4" x-show="showMidtransServerKey" />
                                </button>
                            </div>
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-gray-12 mb-1">Client Key</label>
                            <div class="relative">
                                <input :type="showMidtransClientKey ? 'text' : 'password'" name="midtrans_client_key" value="{{ old('midtrans_client_key', $midtransConfig['client_key'] ?? '') }}"
                                       placeholder="Midtrans Client Key (SB-Mid-client-...)"
                                       class="w-full px-3.5 py-2.5 pr-10 rounded-xl border border-gray-6 text-sm text-gray-12 focus:ring-2 focus:ring-cyan-9/20 focus:border-cyan-9">
                                <button type="button" @click="showMidtransClientKey = !showMidtransClientKey" class="absolute right-3 top-2.5 text-gray-9 hover:text-gray-12">
                                    <x-radix-icon name="eye-open" class="w-4 h-4" x-show="!showMidtransClientKey" />
                                    <x-radix-icon name="eye-none" class="w-4 h-4" x-show="showMidtransClientKey" />
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Webhook instructions -->
                    <div class="p-4 rounded-xl bg-cyan-2/40 border border-cyan-5 text-xs text-cyan-12 space-y-2">
                        <div class="flex items-center justify-between">
                            <span class="font-bold flex items-center gap-1.5">
                                <x-radix-icon name="link-2" class="w-4 h-4 text-cyan-9" />
                                <span>URL Notification / Callback Midtrans:</span>
                            </span>
                            <button type="button" @click="copyToClipboard('{{ $webhookUrls['midtrans'] }}', 'midtrans')" class="px-2.5 py-1 rounded-lg bg-cyan-9 text-white font-bold text-[11px] hover:bg-cyan-10 transition-colors cursor-pointer">
                                <span x-show="copiedUrl !== 'midtrans'">Salin URL</span>
                                <span x-show="copiedUrl === 'midtrans'">Tersalin!</span>
                            </button>
                        </div>
                        <code class="block px-3 py-1.5 rounded-lg bg-white border border-cyan-4 text-cyan-11 font-mono select-all">
                            {{ $webhookUrls['midtrans'] }}
                        </code>
                        <p class="text-[11px] text-gray-11">Masukkan URL di atas ke menu <strong>Settings &rarr; Configuration &rarr; Payment Notification URL</strong> di Portal Midtrans Merchant MAP. Signature SHA-512 akan diverifikasi otomatis.</p>
                    </div>
                </div>

                <!-- Payment Methods Matrix -->
                <div class="bg-white p-6 rounded-2xl border border-gray-6 shadow-xs">
                    <h3 class="font-display font-bold text-base text-gray-12 mb-1">Daftar Kanal Pembayaran Tersedia</h3>
                    <p class="text-xs text-gray-11 mb-4">Metode pembayaran yang dapat dipilih oleh peserta saat melakukan checkout asesmen berbayar.</p>

                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3">
                        @foreach($methods as $code => $m)
                            <div class="p-4 rounded-xl border border-gray-5 bg-gray-2/30 flex items-center justify-between">
                                <div class="flex items-center gap-3">
                                    <div class="w-8 h-8 rounded-lg bg-white border border-gray-5 flex items-center justify-center font-bold text-xs text-gray-12">
                                        {{ substr($code, 0, 3) }}
                                    </div>
                                    <div>
                                        <p class="font-bold text-xs text-gray-12">{{ $m['label'] }}</p>
                                        <p class="text-[11px] text-gray-10 mt-0.5">Biaya Admin: Rp {{ number_format($m['fee'], 0, ',', '.') }}</p>
                                    </div>
                                </div>
                                <span class="px-2 py-0.5 rounded text-[10px] font-bold bg-green-3 text-green-11 border border-green-6/50">Aktif</span>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- ============================================== -->
            <!--            TAB 2: CLOUDFLARE R2 & STORAGE      -->
            <!-- ============================================== -->
            <div x-show="activeTab === 'storage'" class="space-y-6">
                <!-- Status & Test Connection Bar -->
                <div class="p-5 rounded-2xl border transition-all {{ $r2Status['connected'] ? 'bg-green-2/40 border-green-6/70 text-green-12' : ($r2Status['configured'] ? 'bg-amber-2/40 border-amber-6/70 text-amber-12' : 'bg-red-2/40 border-red-6/70 text-red-12') }} shadow-xs">
                    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                        <div class="flex items-start gap-3">
                            <div class="w-10 h-10 rounded-xl {{ $r2Status['connected'] ? 'bg-green-9 text-white' : 'bg-amber-9 text-white' }} flex items-center justify-center shrink-0 shadow-xs">
                                <x-radix-icon name="cloud" class="w-5 h-5" />
                            </div>
                            <div>
                                <div class="flex items-center gap-2">
                                    <h4 class="font-display font-bold text-base text-gray-12">
                                        Status Koneksi Cloudflare R2: 
                                        @if($r2Status['connected'])
                                            <span class="text-green-11">Terhubung &amp; Siap Pakai</span>
                                        @elseif($r2Status['configured'])
                                            <span class="text-amber-11">Kredensial Ada, Tapi Gagal Terhubung</span>
                                        @else
                                            <span class="text-red-11">Kredensial Belum Dikonfigurasi</span>
                                        @endif
                                    </h4>
                                    <span class="w-2.5 h-2.5 rounded-full {{ $r2Status['connected'] ? 'bg-green-9 animate-pulse' : 'bg-amber-9' }}"></span>
                                </div>
                                <p class="text-xs text-gray-11 mt-0.5">
                                    Bucket: <code class="font-mono font-bold text-gray-12">{{ $r2Status['bucket'] }}</code> &bull; Driver Aktif: <code class="font-mono font-bold text-gray-12">{{ strtoupper($r2Status['active_upload_disk']) }}</code>
                                    @if($r2Status['connected'])
                                        &bull; Latensi: <span class="font-mono text-green-11 font-bold">{{ $r2Status['ping_ms'] }} ms</span> &bull; Terdeteksi: <span class="font-mono text-gray-12 font-bold">{{ $r2Status['file_count'] }} berkas</span>
                                    @endif
                                </p>
                            </div>
                        </div>

                        <div class="flex items-center gap-2">
                            <button type="button" 
                                    @click="runTest('r2')" 
                                    :disabled="testing.r2"
                                    class="px-4 py-2 rounded-xl bg-white border border-gray-6 hover:bg-gray-3 text-gray-12 text-xs font-bold transition-all shadow-xs cursor-pointer flex items-center gap-1.5 disabled:opacity-60">
                                <span :class="testing.r2 ? 'animate-spin' : ''" class="inline-flex">
                                    <x-radix-icon name="reload" class="w-4 h-4" />
                                </span>
                                <span x-text="testing.r2 ? 'Menguji Koneksi...' : 'Uji Koneksi R2 Sekarang'"></span>
                            </button>
                        </div>
                    </div>

                    <!-- Live AJAX Test Result Feedback -->
                    <div x-show="testResults.r2 !== null" x-cloak class="mt-4 pt-3 border-t border-gray-5/60">
                        <template x-if="testResults.r2?.success">
                            <div class="p-3 rounded-xl bg-green-3 border border-green-6 text-green-12 text-xs font-semibold flex items-center gap-2">
                                <x-radix-icon name="check-circled" class="w-4 h-4 text-green-9 shrink-0" />
                                <span x-text="testResults.r2?.message"></span>
                                <span class="ml-auto font-mono text-[11px]" x-text="'Ping: ' + testResults.r2?.ping_ms + ' ms'"></span>
                            </div>
                        </template>
                        <template x-if="testResults.r2 && !testResults.r2?.success">
                            <div class="p-3 rounded-xl bg-red-3 border border-red-6 text-red-12 text-xs font-semibold flex items-start gap-2">
                                <x-radix-icon name="cross-circled" class="w-4 h-4 text-red-9 shrink-0 mt-0.5" />
                                <div>
                                    <p class="font-bold">Pengujian Gagal:</p>
                                    <p class="font-mono text-[11px] mt-0.5" x-text="testResults.r2?.message"></p>
                                </div>
                            </div>
                        </template>
                    </div>

                    @if(! $r2Status['connected'] && $r2Status['error'])
                        <div class="mt-3 p-3 rounded-xl bg-amber-100/70 border border-amber-300 text-amber-900 text-[11px] font-mono break-all">
                            <strong>Detail Kendala Terakhir:</strong> {{ $r2Status['error'] }}
                        </div>
                    @endif
                </div>

                <!-- Driver Penyimpanan Radio -->
                <div class="bg-white p-6 rounded-2xl border border-gray-6 shadow-xs space-y-4">
                    <div>
                        <h3 class="font-display font-bold text-base text-gray-12">Driver Penyimpanan Unggahan (UPLOAD_DISK)</h3>
                        <p class="text-xs text-gray-11">Pilih disk penyimpanan untuk butir soal, ilustrasi digital, dan aset visual multi-tenant.</p>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <label class="relative p-4 rounded-xl border-2 transition-all cursor-pointer flex flex-col justify-between"
                               :class="activeDisk === 'r2' ? 'border-blue-9 bg-blue-2/30 shadow-xs' : 'border-gray-5 hover:border-gray-7 bg-white'">
                            <input type="radio" name="upload_disk" value="r2" x-model="activeDisk" class="sr-only">
                            <div>
                                <div class="flex items-center justify-between mb-1.5">
                                    <span class="text-xs font-black uppercase tracking-wider text-blue-11 bg-blue-3 px-2 py-0.5 rounded-md">Cloudflare R2 (S3 API)</span>
                                    <div class="w-5 h-5 rounded-full border-2 flex items-center justify-center"
                                         :class="activeDisk === 'r2' ? 'border-blue-9 bg-blue-9 text-white' : 'border-gray-6'">
                                        <div class="w-2 h-2 bg-white rounded-full" x-show="activeDisk === 'r2'"></div>
                                    </div>
                                </div>
                                <h4 class="font-bold text-sm text-gray-12">Cloudflare R2 Object Storage</h4>
                                <p class="text-xs text-gray-11 mt-1">Penyimpanan cloud terdistribusi dengan 0 biaya egress, tahan scaling jutaan siswa, dan kompatibel S3.</p>
                            </div>
                            <span class="inline-flex mt-3 text-[11px] font-semibold text-blue-11">&star; Rekomendasi Produksi VPS &amp; Coolify</span>
                        </label>

                        <label class="relative p-4 rounded-xl border-2 transition-all cursor-pointer flex flex-col justify-between"
                               :class="activeDisk === 'public' ? 'border-blue-9 bg-blue-2/30 shadow-xs' : 'border-gray-5 hover:border-gray-7 bg-white'">
                            <input type="radio" name="upload_disk" value="public" x-model="activeDisk" class="sr-only">
                            <div>
                                <div class="flex items-center justify-between mb-1.5">
                                    <span class="text-xs font-black uppercase tracking-wider text-gray-11 bg-gray-3 px-2 py-0.5 rounded-md">Local Storage</span>
                                    <div class="w-5 h-5 rounded-full border-2 flex items-center justify-center"
                                         :class="activeDisk === 'public' ? 'border-blue-9 bg-blue-9 text-white' : 'border-gray-6'">
                                        <div class="w-2 h-2 bg-white rounded-full" x-show="activeDisk === 'public'"></div>
                                    </div>
                                </div>
                                <h4 class="font-bold text-sm text-gray-12">Penyimpanan Disk Lokal Server</h4>
                                <p class="text-xs text-gray-11 mt-1">Berkas disimpan langsung di folder storage/app/public server lokal. Berguna saat offline atau pengujian.</p>
                            </div>
                            <span class="inline-flex mt-3 text-[11px] font-semibold text-gray-10">Fallback Lokal</span>
                        </label>
                    </div>
                </div>

                <!-- Formulir Parameter Cloudflare R2 -->
                <div class="bg-white p-6 rounded-2xl border border-gray-6 shadow-xs space-y-5">
                    <div class="flex items-center justify-between border-b border-gray-5 pb-3">
                        <div class="flex items-center gap-2.5">
                            <div class="w-8 h-8 rounded-xl bg-orange-3 text-orange-11 flex items-center justify-center font-black text-sm">R2</div>
                            <div>
                                <h3 class="font-display font-bold text-base text-gray-12">Kredensial &amp; Konfigurasi Cloudflare R2</h3>
                                <p class="text-xs text-gray-11">Dapatkan kredensial ini di Cloudflare Dashboard &gt; R2 Object Storage &gt; Manage R2 API Tokens.</p>
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-bold text-gray-12 mb-1">Nama Bucket R2 (CLOUDFLARE_R2_BUCKET)</label>
                            <input type="text" name="r2_bucket" value="{{ old('r2_bucket', $r2Config['bucket'] ?? 'adzkia') }}"
                                   placeholder="Contoh: adzkia"
                                   class="w-full px-3.5 py-2.5 rounded-xl border border-gray-6 text-sm text-gray-12 focus:ring-2 focus:ring-blue-9/20 focus:border-blue-9">
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-gray-12 mb-1">Endpoint S3 R2 (CLOUDFLARE_R2_ENDPOINT)</label>
                            <input type="text" name="r2_endpoint" value="{{ old('r2_endpoint', $r2Config['endpoint'] ?? '') }}"
                                   placeholder="https://<account_id>.r2.cloudflarestorage.com"
                                   class="w-full px-3.5 py-2.5 rounded-xl border border-gray-6 text-sm text-gray-12 focus:ring-2 focus:ring-blue-9/20 focus:border-blue-9">
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-gray-12 mb-1">Access Key ID (CLOUDFLARE_R2_ACCESS_KEY_ID)</label>
                            <div class="relative">
                                <input :type="showR2Key ? 'text' : 'password'" name="r2_access_key_id" value="{{ old('r2_access_key_id', $r2Config['key'] ?? '') }}"
                                       placeholder="Access Key R2 32 karakter"
                                       class="w-full px-3.5 py-2.5 pr-10 rounded-xl border border-gray-6 text-sm text-gray-12 focus:ring-2 focus:ring-blue-9/20 focus:border-blue-9">
                                <button type="button" @click="showR2Key = !showR2Key" class="absolute right-3 top-2.5 text-gray-9 hover:text-gray-12">
                                    <x-radix-icon name="eye-open" class="w-4 h-4" x-show="!showR2Key" />
                                    <x-radix-icon name="eye-none" class="w-4 h-4" x-show="showR2Key" />
                                </button>
                            </div>
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-gray-12 mb-1">Secret Access Key (CLOUDFLARE_R2_SECRET_ACCESS_KEY)</label>
                            <div class="relative">
                                <input :type="showR2Secret ? 'text' : 'password'" name="r2_secret_access_key" value="{{ old('r2_secret_access_key', $r2Config['secret'] ?? '') }}"
                                       placeholder="Secret Access Key R2 64 karakter"
                                       class="w-full px-3.5 py-2.5 pr-10 rounded-xl border border-gray-6 text-sm text-gray-12 focus:ring-2 focus:ring-blue-9/20 focus:border-blue-9">
                                <button type="button" @click="showR2Secret = !showR2Secret" class="absolute right-3 top-2.5 text-gray-9 hover:text-gray-12">
                                    <x-radix-icon name="eye-open" class="w-4 h-4" x-show="!showR2Secret" />
                                    <x-radix-icon name="eye-none" class="w-4 h-4" x-show="showR2Secret" />
                                </button>
                            </div>
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-gray-12 mb-1">Public URL / Domain Proxy (CLOUDFLARE_R2_URL)</label>
                            <input type="text" name="r2_url" value="{{ old('r2_url', $r2Config['url'] ?? '') }}"
                                   placeholder="Contoh: {{ url('/media/r2') }}"
                                   class="w-full px-3.5 py-2.5 rounded-xl border border-gray-6 text-sm text-gray-12 focus:ring-2 focus:ring-blue-9/20 focus:border-blue-9">
                            <p class="text-[11px] text-gray-10 mt-1">Disarankan menggunakan proxy domain internal <code class="font-mono text-gray-12">{{ url('/media/r2') }}</code> untuk menghindari sensor DNS di ISP Indonesia.</p>
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-gray-12 mb-1">Wilayah / Region (CLOUDFLARE_R2_REGION)</label>
                            <input type="text" name="r2_region" value="{{ old('r2_region', $r2Config['region'] ?? 'auto') }}"
                                   placeholder="auto"
                                   class="w-full px-3.5 py-2.5 rounded-xl border border-gray-6 text-sm text-gray-12 focus:ring-2 focus:ring-blue-9/20 focus:border-blue-9">
                        </div>
                    </div>

                    <!-- Petunjuk pembuatan token Cloudflare R2 -->
                    <div class="p-4 rounded-xl bg-gray-2 border border-gray-5 text-xs text-gray-12 space-y-2">
                        <div class="font-bold flex items-center gap-1.5 text-gray-12">
                            <x-radix-icon name="info-circled" class="w-4 h-4 text-blue-9" />
                            <span>Cara Mendapatkan Kredensial Cloudflare R2:</span>
                        </div>
                        <ol class="list-decimal list-inside space-y-1 text-gray-11 pl-1">
                            <li>Buka <strong>Cloudflare Dashboard &rarr; R2 Object Storage</strong>.</li>
                            <li>Buat bucket baru bernama <code class="font-mono text-gray-12 font-bold">{{ $r2Config['bucket'] ?: 'adzkia' }}</code> (atau pilih bucket yang ada).</li>
                            <li>Klik menu <strong>Manage R2 API Tokens</strong> di sisi kanan &rarr; <strong>Create API Token</strong>.</li>
                            <li>Pilih Permissions: <strong>Object Read &amp; Write</strong> dan terapkan pada bucket Anda.</li>
                            <li>Salin <strong>Access Key ID</strong> dan <strong>Secret Access Key</strong> lalu tempelkan ke formulir di atas.</li>
                            <li>Salin URL endpoint (akhiran <code class="font-mono text-gray-12">.r2.cloudflarestorage.com</code>).</li>
                        </ol>
                    </div>
                </div>
            </div>

            <!-- ============================================== -->
            <!--            TAB 3: STATUS SISTEM & KONEKSI      -->
            <!-- ============================================== -->
            <div x-show="activeTab === 'system'" class="space-y-6">
                <div class="bg-white p-6 rounded-2xl border border-gray-6 shadow-xs space-y-5">
                    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 pb-3 border-b border-gray-5">
                        <div>
                            <h3 class="font-display font-bold text-base text-gray-12">Pemeriksaan Kesehatan Koneksi &amp; Layanan Sistem</h3>
                            <p class="text-xs text-gray-11">Diagnostik real-time koneksi server database, Redis cache, Cloudflare R2, dan mesin AI.</p>
                        </div>
                        <div class="flex items-center gap-2">
                            <button type="button" @click="runTest('database'); runTest('redis'); runTest('r2');"
                                    class="px-3.5 py-1.5 rounded-xl bg-blue-9 hover:bg-blue-10 text-white font-bold text-xs transition-colors flex items-center gap-1.5 shadow-xs cursor-pointer">
                                <x-radix-icon name="reload" class="w-3.5 h-3.5" />
                                <span>Uji Semua Koneksi</span>
                            </button>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <!-- 1. Database Connection Card -->
                        <div class="p-5 rounded-2xl border transition-all {{ $dbStatus['connected'] ? 'border-gray-5 bg-white' : 'border-red-5 bg-red-2/30' }} flex flex-col justify-between">
                            <div>
                                <div class="flex items-center justify-between mb-2">
                                    <span class="text-[11px] font-bold uppercase text-gray-10 tracking-wider">Koneksi Database</span>
                                    <span class="px-2 py-0.5 rounded text-[10px] font-bold uppercase {{ $dbStatus['connected'] ? 'bg-green-3 text-green-11 border border-green-6/50' : 'bg-red-3 text-red-11 border border-red-6/50' }}">
                                        {{ $dbStatus['connected'] ? 'Terhubung' : 'Terputus' }}
                                    </span>
                                </div>
                                <div class="flex items-center gap-2 mt-1">
                                    <span class="w-2.5 h-2.5 rounded-full {{ $dbStatus['connected'] ? 'bg-green-9 animate-pulse' : 'bg-red-9' }}"></span>
                                    <h4 class="font-bold text-sm text-gray-12">
                                        {{ strtoupper($dbStatus['driver']) }} ({{ $dbStatus['host'] }}:{{ $dbStatus['port'] }})
                                    </h4>
                                </div>
                                <div class="mt-2 space-y-0.5 text-xs text-gray-11">
                                    <p>Database: <code class="font-mono text-gray-12 font-semibold">{{ $dbStatus['database'] }}</code></p>
                                    @if($dbStatus['connected'])
                                        <p>Latensi Ping: <span class="font-mono text-green-11 font-bold">{{ $dbStatus['ping_ms'] }} ms</span></p>
                                        <p>Versi Server: <span class="font-mono text-gray-12">{{ $dbStatus['version'] ?? 'N/A' }}</span></p>
                                    @else
                                        <p class="text-red-11 font-mono text-[11px] mt-1 break-all bg-red-100/60 p-2 rounded">
                                            {{ $dbStatus['error'] }}
                                        </p>
                                    @endif
                                </div>

                                <div x-show="testResults.database !== null" x-cloak class="mt-3">
                                    <p class="text-[11px] font-bold p-2 rounded"
                                       :class="testResults.database?.success ? 'bg-green-2 text-green-11 border border-green-5' : 'bg-red-2 text-red-11 border border-red-5'"
                                       x-text="testResults.database?.message"></p>
                                </div>
                            </div>

                            <div class="mt-4 pt-3 border-t border-gray-4 flex items-center justify-between">
                                <span class="text-[11px] text-gray-10">Driver: {{ $dbStatus['connection'] }}</span>
                                <button type="button" @click="runTest('database')" :disabled="testing.database"
                                        class="px-2.5 py-1 rounded-lg bg-gray-3 hover:bg-gray-4 text-gray-12 text-xs font-semibold transition-colors cursor-pointer disabled:opacity-50">
                                    <span x-text="testing.database ? 'Menguji...' : 'Uji Koneksi DB'"></span>
                                </button>
                            </div>
                        </div>

                        <!-- 2. Redis Cache & Queue Card -->
                        <div class="p-5 rounded-2xl border transition-all {{ $redisStatus['connected'] ? 'border-gray-5 bg-white' : 'border-amber-5 bg-amber-2/30' }} flex flex-col justify-between">
                            <div>
                                <div class="flex items-center justify-between mb-2">
                                    <span class="text-[11px] font-bold uppercase text-gray-10 tracking-wider">Redis Cache &amp; Queue</span>
                                    <span class="px-2 py-0.5 rounded text-[10px] font-bold uppercase {{ $redisStatus['connected'] ? 'bg-green-3 text-green-11 border border-green-6/50' : 'bg-amber-3 text-amber-11 border border-amber-6/50' }}">
                                        {{ $redisStatus['connected'] ? 'Terhubung' : 'Tidak Terhubung' }}
                                    </span>
                                </div>
                                <div class="flex items-center gap-2 mt-1">
                                    <span class="w-2.5 h-2.5 rounded-full {{ $redisStatus['connected'] ? 'bg-green-9 animate-pulse' : 'bg-amber-9' }}"></span>
                                    <h4 class="font-bold text-sm text-gray-12">
                                        Redis ({{ $redisStatus['host'] }}:{{ $redisStatus['port'] }})
                                    </h4>
                                </div>
                                <div class="mt-2 space-y-0.5 text-xs text-gray-11">
                                    <p>Client: <span class="font-mono text-gray-12 uppercase">{{ $redisStatus['client'] }}</span> &bull; Respon Ping: <span class="font-mono font-semibold {{ $redisStatus['connected'] ? 'text-green-11' : 'text-amber-11' }}">{{ $redisStatus['ping'] ?? 'N/A' }}</span></p>
                                    <p>Cache Driver: <code class="font-mono text-gray-12">{{ $redisStatus['cache_driver'] }}</code> &bull; Queue Driver: <code class="font-mono text-gray-12">{{ $redisStatus['queue_driver'] }}</code></p>
                                    @if(! $redisStatus['connected'] && $redisStatus['error'])
                                        <p class="text-amber-11 font-mono text-[11px] mt-1 break-all bg-amber-100/60 p-2 rounded">
                                            {{ $redisStatus['error'] }}
                                        </p>
                                    @endif
                                </div>

                                <div x-show="testResults.redis !== null" x-cloak class="mt-3">
                                    <p class="text-[11px] font-bold p-2 rounded"
                                       :class="testResults.redis?.success ? 'bg-green-2 text-green-11 border border-green-5' : 'bg-amber-2 text-amber-11 border border-amber-5'"
                                       x-text="testResults.redis?.message"></p>
                                </div>
                            </div>

                            <div class="mt-4 pt-3 border-t border-gray-4 flex items-center justify-between">
                                <span class="text-[11px] text-gray-10">{{ $redisStatus['configured'] ? 'Terkonfigurasi' : 'Host Default' }}</span>
                                <button type="button" @click="runTest('redis')" :disabled="testing.redis"
                                        class="px-2.5 py-1 rounded-lg bg-gray-3 hover:bg-gray-4 text-gray-12 text-xs font-semibold transition-colors cursor-pointer disabled:opacity-50">
                                    <span x-text="testing.redis ? 'Menguji...' : 'Uji Koneksi Redis'"></span>
                                </button>
                            </div>
                        </div>

                        <!-- 3. Cloudflare R2 Card -->
                        <div class="p-5 rounded-2xl border transition-all {{ $r2Status['connected'] ? 'border-gray-5 bg-white' : 'border-amber-5 bg-amber-2/30' }} flex flex-col justify-between">
                            <div>
                                <div class="flex items-center justify-between mb-2">
                                    <span class="text-[11px] font-bold uppercase text-gray-10 tracking-wider">Cloudflare R2 Object Storage</span>
                                    <span class="px-2 py-0.5 rounded text-[10px] font-bold uppercase {{ $r2Status['connected'] ? 'bg-green-3 text-green-11 border border-green-6/50' : ($r2Status['configured'] ? 'bg-amber-3 text-amber-11 border border-amber-6/50' : 'bg-red-3 text-red-11 border border-red-6/50') }}">
                                        {{ $r2Status['connected'] ? 'Terhubung' : ($r2Status['configured'] ? 'Gagal Terhubung' : 'Belum Dikonfigurasi') }}
                                    </span>
                                </div>
                                <div class="flex items-center gap-2 mt-1">
                                    <span class="w-2.5 h-2.5 rounded-full {{ $r2Status['connected'] ? 'bg-green-9 animate-pulse' : 'bg-amber-9' }}"></span>
                                    <h4 class="font-bold text-sm text-gray-12">
                                        Bucket: <code class="font-mono text-blue-11">{{ $r2Status['bucket'] }}</code>
                                    </h4>
                                </div>
                                <div class="mt-2 space-y-0.5 text-xs text-gray-11">
                                    <p>Upload Disk Aktif: <code class="font-mono text-gray-12 font-bold">{{ strtoupper($r2Status['active_upload_disk']) }}</code></p>
                                    <p>Access Key ID: <span class="font-mono text-gray-12">{{ $r2Status['key_preview'] ?? 'Kosong' }}</span></p>
                                    @if($r2Status['connected'])
                                        <p>Latensi R2: <span class="font-mono text-green-11 font-bold">{{ $r2Status['ping_ms'] }} ms</span> &bull; File: <span class="font-mono text-gray-12 font-bold">{{ $r2Status['file_count'] }} item</span></p>
                                    @elseif($r2Status['error'])
                                        <p class="text-amber-11 font-mono text-[11px] mt-1 break-all bg-amber-100/60 p-2 rounded">
                                            {{ $r2Status['error'] }}
                                        </p>
                                    @endif
                                </div>

                                <div x-show="testResults.r2 !== null" x-cloak class="mt-3">
                                    <p class="text-[11px] font-bold p-2 rounded"
                                       :class="testResults.r2?.success ? 'bg-green-2 text-green-11 border border-green-5' : 'bg-red-2 text-red-11 border border-red-5'"
                                       x-text="testResults.r2?.message"></p>
                                </div>
                            </div>

                            <div class="mt-4 pt-3 border-t border-gray-4 flex items-center justify-between">
                                <a href="javascript:void(0)" @click="activeTab = 'storage'; window.location.hash = 'storage'" class="text-[11px] text-blue-11 hover:underline font-semibold">
                                    Kelola Kredensial R2 &rarr;
                                </a>
                                <button type="button" @click="runTest('r2')" :disabled="testing.r2"
                                        class="px-2.5 py-1 rounded-lg bg-gray-3 hover:bg-gray-4 text-gray-12 text-xs font-semibold transition-colors cursor-pointer disabled:opacity-50">
                                    <span x-text="testing.r2 ? 'Menguji...' : 'Uji Koneksi R2'"></span>
                                </button>
                            </div>
                        </div>

                        <!-- 4. AI Explanation Engines Card -->
                        <div class="p-5 rounded-2xl border border-gray-5 bg-white flex flex-col justify-between">
                            <div>
                                <div class="flex items-center justify-between mb-2">
                                    <span class="text-[11px] font-bold uppercase text-gray-10 tracking-wider">AI Explanation Engine</span>
                                    <span class="px-2 py-0.5 rounded text-[10px] font-bold uppercase {{ $aiStatus['deepseek']['configured'] ? 'bg-purple-3 text-purple-11 border border-purple-6/50' : 'bg-gray-3 text-gray-11' }}">
                                        {{ $aiStatus['deepseek']['configured'] ? 'DeepSeek Aktif' : 'Belum Ada Key' }}
                                    </span>
                                </div>
                                <div class="flex items-center gap-2 mt-1">
                                    <span class="w-2.5 h-2.5 rounded-full {{ $aiStatus['deepseek']['configured'] ? 'bg-purple-9' : 'bg-gray-9' }}"></span>
                                    <h4 class="font-bold text-sm text-gray-12">
                                        {{ $aiStatus['deepseek']['model'] }}
                                    </h4>
                                </div>
                                <div class="mt-2 space-y-1 text-xs text-gray-11">
                                    <p>DeepSeek Key: <span class="font-mono text-gray-12">{{ $aiStatus['deepseek']['key_preview'] ?? 'Belum terpasang' }}</span></p>
                                    <p>Google Gemini Key: <span class="font-mono text-gray-12">{{ $aiStatus['gemini']['key_preview'] ?? 'Belum terpasang' }}</span></p>
                                    <p class="text-[11px] text-gray-10">Digunakan untuk auto-pembahasan soal dan penalaran cerdas.</p>
                                </div>

                                <div x-show="testResults.ai !== null" x-cloak class="mt-3">
                                    <p class="text-[11px] font-bold p-2 rounded"
                                       :class="testResults.ai?.success ? 'bg-purple-2 text-purple-11 border border-purple-5' : 'bg-red-2 text-red-11 border border-red-5'"
                                       x-text="testResults.ai?.message"></p>
                                </div>
                            </div>

                            <div class="mt-4 pt-3 border-t border-gray-4 flex items-center justify-between">
                                <span class="text-[11px] text-gray-10">api.deepseek.com</span>
                                <button type="button" @click="runTest('ai-deepseek')" :disabled="testing['ai-deepseek']"
                                        class="px-2.5 py-1 rounded-lg bg-gray-3 hover:bg-gray-4 text-gray-12 text-xs font-semibold transition-colors cursor-pointer disabled:opacity-50">
                                    <span x-text="testing['ai-deepseek'] ? 'Menguji...' : 'Uji API DeepSeek'"></span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ============================================== -->
            <!--            TAB 4: BAGI HASIL B2B2C             -->
            <!-- ============================================== -->
            <div x-show="activeTab === 'tiers'" class="space-y-6">
                <div class="bg-white p-6 rounded-2xl border border-gray-6 shadow-xs">
                    <div class="flex items-center justify-between mb-4">
                        <div>
                            <h3 class="font-display font-bold text-base text-gray-12">Tiering &amp; Formula Pembagian Hasil B2B2C</h3>
                            <p class="text-xs text-gray-11">Persentase dihitung secara otomatis dan di-snapshot pada saat siswa melakukan transaksi checkout asesmen.</p>
                        </div>
                        <span class="text-xs font-bold text-gray-11 px-3 py-1 rounded-lg bg-gray-3">Kalkulator Otomatis</span>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
                        @foreach($tiers as $key => $tier)
                            <div class="p-5 rounded-2xl border border-gray-6 bg-gray-2/20 flex flex-col justify-between space-y-4">
                                <div>
                                    <div class="flex items-center justify-between mb-2">
                                        <h4 class="font-display font-black text-sm text-gray-12">{{ $tier['name'] }}</h4>
                                        <span class="text-[10px] font-bold uppercase tracking-wider px-2 py-0.5 rounded bg-blue-3 text-blue-11">
                                            Tier {{ strtoupper($key) }}
                                        </span>
                                    </div>
                                    <p class="text-xs text-gray-11">{{ $tier['description'] }}</p>
                                </div>

                                <!-- Progress visualization -->
                                <div class="space-y-2 pt-2 border-t border-gray-5">
                                    <div class="flex items-center justify-between text-xs font-bold">
                                        <span class="text-blue-11">ADZKIA: {{ $tier['platform_pct'] }}%</span>
                                        <span class="text-green-11">Tenant: {{ $tier['tenant_pct'] }}%</span>
                                    </div>
                                    <div class="w-full h-3 rounded-full bg-gray-4 overflow-hidden flex">
                                        <div class="bg-blue-9 h-full" style="width: {{ $tier['platform_pct'] }}%"></div>
                                        <div class="bg-green-9 h-full" style="width: {{ $tier['tenant_pct'] }}%"></div>
                                    </div>
                                    <p class="text-[10px] text-gray-9 text-center italic">Contoh Asesmen Rp 100.000 &rarr; ADZKIA: Rp {{ number_format(100000 * $tier['platform_pct'] / 100, 0, ',', '.') }} | Tenant: Rp {{ number_format(100000 * $tier['tenant_pct'] / 100, 0, ',', '.') }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Save Form Action Bar -->
            <div class="flex items-center justify-end gap-3 pt-4 border-t border-gray-6">
                <a href="{{ route('dashboard') }}" class="px-5 py-2.5 rounded-xl border border-gray-6 text-xs font-semibold text-gray-12 hover:bg-gray-3 transition-colors cursor-pointer">
                    Batal
                </a>
                <button type="submit" class="px-6 py-2.5 rounded-xl bg-blue-9 hover:bg-blue-10 text-white text-xs font-bold transition-all shadow-xs cursor-pointer flex items-center gap-2">
                    <x-radix-icon name="check" class="w-4 h-4" />
                    <span>Simpan Perubahan Pengaturan</span>
                </button>
            </div>
        </form>
    </div>
</x-layouts.app>