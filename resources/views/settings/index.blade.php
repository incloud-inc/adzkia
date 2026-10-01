<x-layouts.app>
    <x-slot:title>Pengaturan Sistem &amp; Payment Gateway - ADZKIA</x-slot:title>

    <div class="space-y-6 pb-20 max-w-6xl mx-auto" x-data="{ 
        activeTab: 'gateway',
        activeDriver: '{{ $currentDriver }}',
        showTripayKey: false,
        showTripaySecret: false,
        showDuitkuKey: false,
        copiedUrl: null,
        copyToClipboard(text, id) {
            navigator.clipboard.writeText(text);
            this.copiedUrl = id;
            setTimeout(() => { this.copiedUrl = null }, 2000);
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
                    Pengaturan Sistem &amp; Gerbang Pembayaran
                </h1>
                <p class="text-xs text-gray-11 mt-0.5">Konfigurasi kanal payment gateway (Tripay / Duitku), parameter webhook, serta persentase bagi hasil B2B2C multi-tenant.</p>
            </div>

            <div class="flex items-center gap-2">
                <a href="{{ route('reports.sales') }}"
                   class="inline-flex items-center gap-1.5 px-3.5 py-2 rounded-xl border border-gray-6 bg-white hover:bg-gray-3 text-gray-12 text-xs font-semibold transition-all shadow-xs cursor-pointer">
                    <x-radix-icon name="pie-chart" class="w-4 h-4 text-gray-11" />
                    <span>Laporan Penjualan</span>
                </a>
                <a href="{{ route('wallet.index') }}"
                   class="inline-flex items-center gap-1.5 px-3.5 py-2 rounded-xl border border-gray-6 bg-white hover:bg-gray-3 text-gray-12 text-xs font-semibold transition-all shadow-xs cursor-pointer">
                    <x-radix-icon name="card-stack" class="w-4 h-4 text-green-11" />
                    <span>Dompet Saldo</span>
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
        <div class="border-b border-gray-6 flex items-center gap-8">
            <button type="button" 
                    @click="activeTab = 'gateway'" 
                    class="pb-3 text-sm font-bold border-b-2 transition-colors cursor-pointer flex items-center gap-2"
                    :class="activeTab === 'gateway' ? 'border-blue-9 text-blue-11' : 'border-transparent text-gray-11 hover:text-gray-12'">
                <x-radix-icon name="card-stack" class="w-4 h-4" />
                <span>Payment Gateway (Tripay &amp; Duitku)</span>
            </button>
            <button type="button" 
                    @click="activeTab = 'tiers'" 
                    class="pb-3 text-sm font-bold border-b-2 transition-colors cursor-pointer flex items-center gap-2"
                    :class="activeTab === 'tiers' ? 'border-blue-9 text-blue-11' : 'border-transparent text-gray-11 hover:text-gray-12'">
                <x-radix-icon name="pie-chart" class="w-4 h-4" />
                <span>Skema Bagi Hasil B2B2C</span>
            </button>
            <button type="button" 
                    @click="activeTab = 'system'" 
                    class="pb-3 text-sm font-bold border-b-2 transition-colors cursor-pointer flex items-center gap-2"
                    :class="activeTab === 'system' ? 'border-blue-9 text-blue-11' : 'border-transparent text-gray-11 hover:text-gray-12'">
                <x-radix-icon name="server" class="w-4 h-4" />
                <span>Status Sistem &amp; Database</span>
            </button>
        </div>

        <form method="POST" action="{{ route('settings.update') }}" class="space-y-6">
            @csrf

            <!-- ============================================== -->
            <!--            TAB 1: PAYMENT GATEWAY              -->
            <!-- ============================================== -->
            <div x-show="activeTab === 'gateway'" class="space-y-6">
                <!-- Driver Selection Cards -->
                <div class="bg-white p-6 rounded-2xl border border-gray-6 shadow-xs">
                    <h3 class="font-display font-bold text-base text-gray-12 mb-1">Pilih Driver Gateway Aktif</h3>
                    <p class="text-xs text-gray-11 mb-4">Sistem akan mengarahkan semua transaksi checkout siswa ke gateway yang dipilih secara langsung.</p>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
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

                        <!-- 3. Sandbox Simulation -->
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
            <!--            TAB 2: BAGI HASIL B2B2C             -->
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

            <!-- ============================================== -->
            <!--            TAB 3: STATUS SISTEM                -->
            <!-- ============================================== -->
            <div x-show="activeTab === 'system'" class="space-y-6">
                <div class="bg-white p-6 rounded-2xl border border-gray-6 shadow-xs space-y-4">
                    <h3 class="font-display font-bold text-base text-gray-12">Status Mesin &amp; Lingkungan Produksi</h3>
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                        <div class="p-4 rounded-xl border border-gray-5 bg-white">
                            <span class="text-[11px] font-bold uppercase text-gray-10 tracking-wider">Database Terhubung</span>
                            <div class="flex items-center gap-2 mt-1">
                                <span class="w-2.5 h-2.5 rounded-full bg-green-9 animate-pulse"></span>
                                <h4 class="font-bold text-sm text-gray-12">PostgreSQL (127.0.0.1:5432)</h4>
                            </div>
                            <p class="text-xs text-gray-11 mt-1">Database: <code class="font-mono text-gray-12">adzkia</code></p>
                        </div>

                        <div class="p-4 rounded-xl border border-gray-5 bg-white">
                            <span class="text-[11px] font-bold uppercase text-gray-10 tracking-wider">Storage &amp; Aset</span>
                            <div class="flex items-center gap-2 mt-1">
                                <span class="w-2.5 h-2.5 rounded-full bg-blue-9"></span>
                                <h4 class="font-bold text-sm text-gray-12">Cloudflare R2 Object Storage</h4>
                            </div>
                            <p class="text-xs text-gray-11 mt-1">Bucket: <code class="font-mono text-gray-12">adzkia</code></p>
                        </div>

                        <div class="p-4 rounded-xl border border-gray-5 bg-white">
                            <span class="text-[11px] font-bold uppercase text-gray-10 tracking-wider">AI Explanation Engine</span>
                            <div class="flex items-center gap-2 mt-1">
                                <span class="w-2.5 h-2.5 rounded-full bg-purple-9"></span>
                                <h4 class="font-bold text-sm text-gray-12">DeepSeek Reasoner (API)</h4>
                            </div>
                            <p class="text-xs text-gray-11 mt-1">Auto-pembahasan &amp; cara cepat asesmen</p>
                        </div>
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
