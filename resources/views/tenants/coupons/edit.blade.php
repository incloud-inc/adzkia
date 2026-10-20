<x-layouts.app>
    <x-slot:title>Edit Kupon Diskon {{ $coupon->code }} - {{ $tenant->name }}</x-slot:title>

    <div class="max-w-4xl mx-auto space-y-6 pb-16 pt-2"
         x-data="{
             code: '{{ old('code', $coupon->code) }}',
             name: '{{ old('name', $coupon->name) }}',
             discountType: '{{ old('discount_type', $coupon->discount_type) }}',
             discountAmount: '{{ old('discount_amount', $coupon->discount_amount) }}',
             maxDiscount: '{{ old('max_discount', $coupon->max_discount) }}',
             minOrder: '{{ old('min_order_amount', $coupon->min_order_amount) }}',
             get formattedPreview() {
                 if (this.discountType === 'percentage') {
                     return (this.discountAmount || 0) + '%';
                 }
                 let num = parseInt(this.discountAmount || 0);
                 return 'Rp ' + (isNaN(num) ? '0' : num.toLocaleString('id-ID'));
             }
         }">

        <!-- Navigation & Breadcrumb -->
        <div class="flex items-center justify-between">
            <div class="flex items-center gap-2 text-xs">
                <a href="{{ route('tenant.coupons.index') }}" class="text-slate-600 hover:text-slate-900 transition-colors">
                    Kupon Diskon
                </a>
                <span class="text-slate-400">/</span>
                <span class="text-slate-900 font-semibold">Edit Kupon: {{ $coupon->code }}</span>
            </div>
            <a href="{{ route('tenant.coupons.index') }}"
               class="text-xs font-semibold text-slate-600 hover:text-slate-900 transition-colors flex items-center gap-1">
                <x-radix-icon name="arrow-left" class="w-3.5 h-3.5" />
                <span>Kembali</span>
            </a>
        </div>

        <!-- Header -->
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3">
            <div>
                <div class="flex items-center gap-2 mb-1.5">
                    <span class="text-xs font-bold uppercase tracking-wider px-3 py-1 rounded-full border"
                          style="background-color: #e7f5ff; border-color: #a5d8ff; color: #1864ab;">
                        Enterprise Privilege
                    </span>
                    <span class="text-xs font-semibold px-3 py-1 rounded-full border"
                          style="background-color: #ebfbee; border-color: #b2f2bb; color: #2b8a3e;">
                        Bagi Hasil: 75% Tenant
                    </span>
                </div>
                <h1 class="font-display font-extrabold text-2xl sm:text-3xl text-slate-900 tracking-tight">
                    Edit Kupon: {{ $coupon->code }}
                </h1>
                <p class="text-xs sm:text-sm text-slate-600 mt-1">
                    Perbarui rincian, masa berlaku, kuota, atau besaran diskon kupon ini.
                </p>
            </div>
        </div>

        @if ($errors->any())
            <div class="p-4 rounded-2xl border text-xs space-y-1"
                 style="background-color: #fff5f5; border-color: #ffc9c9; color: #c92a2a;">
                <div class="font-bold">Terdapat beberapa kesalahan:</div>
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Form Area (2 cols) -->
            <form action="{{ route('tenant.coupons.update', $coupon) }}" method="POST" class="lg:col-span-2 space-y-6">
                @csrf
                @method('PUT')

                <!-- Basic Information Card -->
                <div class="bg-white rounded-2xl border border-slate-200 p-6 shadow-xs space-y-4">
                    <h2 class="text-sm font-bold text-slate-900 border-b border-slate-100 pb-3">Informasi Utama Voucher</h2>

                    <!-- Kode Kupon -->
                    <div>
                        <label for="code" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1">
                            Kode Kupon Promo <span class="text-red-500">*</span>
                        </label>
                        <input type="text"
                               id="code"
                               name="code"
                               x-model="code"
                               @input="code = code.toUpperCase().replace(/[^A-Z0-9_-]/g, '')"
                               placeholder="CONTOH: ADZKIA2026, SMART50"
                               maxlength="30"
                               required
                               class="w-full font-mono text-sm uppercase font-bold tracking-wider rounded-xl border border-slate-200 px-3.5 py-2.5 focus:border-[#228be6] focus:ring-2 focus:ring-[#d0ebff] outline-none transition-all"
                               value="{{ old('code', $coupon->code) }}">
                        <p class="text-[11px] text-slate-500 mt-1">Gunakan huruf kapital, angka, dan strip (tanpa spasi).</p>
                    </div>

                    <!-- Nama Promo -->
                    <div>
                        <label for="name" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1">
                            Nama / Keterangan Promo <span class="text-red-500">*</span>
                        </label>
                        <input type="text"
                               id="name"
                               name="name"
                               x-model="name"
                               placeholder="e.g. Promo Ujian Tengah Semester Murid Binaan"
                               maxlength="150"
                               required
                               class="w-full text-xs font-medium rounded-xl border border-slate-200 px-3.5 py-2.5 focus:border-[#228be6] focus:ring-2 focus:ring-[#d0ebff] outline-none transition-all"
                               value="{{ old('name', $coupon->name) }}">
                    </div>
                </div>

                <!-- Nilai & Ketentuan Diskon Card -->
                <div class="bg-white rounded-2xl border border-slate-200 p-6 shadow-xs space-y-4">
                    <h2 class="text-sm font-bold text-slate-900 border-b border-slate-100 pb-3">Besaran Potongan & Kebijakan</h2>

                    <!-- Tipe Diskon (Toggle Radio) -->
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">
                            Tipe Diskon <span class="text-red-500">*</span>
                        </label>
                        <div class="grid grid-cols-2 gap-3">
                            <label class="flex items-center gap-2 p-3 rounded-xl border cursor-pointer transition-all"
                                   :class="discountType === 'percentage' ? 'border-[#228be6] bg-[#e7f5ff] text-[#1864ab] font-bold shadow-xs' : 'border-slate-200 text-slate-600 hover:bg-slate-50'">
                                <input type="radio" name="discount_type" value="percentage" x-model="discountType" class="text-[#1c7ed6] focus:ring-[#228be6]">
                                <span class="text-xs">Persentase (%)</span>
                            </label>
                            <label class="flex items-center gap-2 p-3 rounded-xl border cursor-pointer transition-all"
                                   :class="discountType === 'fixed' ? 'border-[#228be6] bg-[#e7f5ff] text-[#1864ab] font-bold shadow-xs' : 'border-slate-200 text-slate-600 hover:bg-slate-50'">
                                <input type="radio" name="discount_type" value="fixed" x-model="discountType" class="text-[#1c7ed6] focus:ring-[#228be6]">
                                <span class="text-xs">Nominal Tetap (Rp)</span>
                            </label>
                        </div>
                    </div>

                    <!-- Besaran Diskon -->
                    <div>
                        <label for="discount_amount" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1">
                            <span x-text="discountType === 'percentage' ? 'Besaran Diskon (%)' : 'Besaran Diskon (Rp)'"></span>
                            <span class="text-red-500">*</span>
                        </label>
                        <input type="number"
                               id="discount_amount"
                               name="discount_amount"
                               x-model="discountAmount"
                               step="any"
                               min="1"
                               :max="discountType === 'percentage' ? 75 : 10000000"
                               required
                               class="w-full text-xs font-bold rounded-xl border border-slate-200 px-3.5 py-2.5 focus:border-[#228be6] focus:ring-2 focus:ring-[#d0ebff] outline-none transition-all"
                               value="{{ old('discount_amount', $coupon->discount_amount) }}">
                        <template x-if="discountType === 'percentage'">
                            <p class="text-[11px] mt-1.5 font-medium" style="color: #d9480f;">
                                * Maksimal diskon persentase adalah <strong>75%</strong> (sesuai porsi bagi hasil institusi Anda).
                            </p>
                        </template>
                    </div>

                    <!-- Batas Maks Diskon (Khusus persentase) -->
                    <div x-show="discountType === 'percentage'" x-transition>
                        <label for="max_discount" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1">
                            Batas Maksimal Potongan (Rp) <span class="text-slate-400 font-normal">(Opsional)</span>
                        </label>
                        <input type="number"
                               id="max_discount"
                               name="max_discount"
                               x-model="maxDiscount"
                               placeholder="e.g. 50000 (biarkan kosong jika tanpa batasan)"
                               min="0"
                               class="w-full text-xs font-medium rounded-xl border border-slate-200 px-3.5 py-2.5 focus:border-[#228be6] focus:ring-2 focus:ring-[#d0ebff] outline-none transition-all"
                               value="{{ old('max_discount', $coupon->max_discount) }}">
                    </div>

                    <!-- Minimal Pembelian -->
                    <div>
                        <label for="min_order_amount" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1">
                            Minimal Total Pembelian (Rp) <span class="text-slate-400 font-normal">(Opsional)</span>
                        </label>
                        <input type="number"
                               id="min_order_amount"
                               name="min_order_amount"
                               x-model="minOrder"
                               placeholder="e.g. 50000 (biarkan kosong jika tanpa batasan)"
                               min="0"
                               class="w-full text-xs font-medium rounded-xl border border-slate-200 px-3.5 py-2.5 focus:border-[#228be6] focus:ring-2 focus:ring-[#d0ebff] outline-none transition-all"
                               value="{{ old('min_order_amount', $coupon->min_order_amount) }}">
                    </div>
                </div>

                <!-- Batasan Penggunaan & Kuota Card -->
                <div class="bg-white rounded-2xl border border-slate-200 p-6 shadow-xs space-y-4">
                    <h2 class="text-sm font-bold text-slate-900 border-b border-slate-100 pb-3">Batasan Kuota & Masa Berlaku</h2>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <!-- Kuota Keseluruhan -->
                        <div>
                            <label for="usage_limit" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1">
                                Kuota Total Penggunaan <span class="text-slate-400 font-normal">(Opsional)</span>
                            </label>
                            <input type="number"
                                   id="usage_limit"
                                   name="usage_limit"
                                   placeholder="e.g. 100 (kosongkan jika tanpa batas)"
                                   min="1"
                                   class="w-full text-xs font-medium rounded-xl border border-slate-200 px-3.5 py-2.5 focus:border-[#228be6] focus:ring-2 focus:ring-[#d0ebff] outline-none transition-all"
                                   value="{{ old('usage_limit', $coupon->usage_limit) }}">
                            <p class="text-[11px] text-slate-500 mt-1">Telah digunakan: <strong>{{ $coupon->used_count }}x</strong></p>
                        </div>

                        <!-- Batas per Siswa -->
                        <div>
                            <label for="usage_limit_per_user" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1">
                                Batas Penggunaan per Siswa <span class="text-red-500">*</span>
                            </label>
                            <input type="number"
                                   id="usage_limit_per_user"
                                   name="usage_limit_per_user"
                                   required
                                   min="1"
                                   max="100"
                                   class="w-full text-xs font-medium rounded-xl border border-slate-200 px-3.5 py-2.5 focus:border-[#228be6] focus:ring-2 focus:ring-[#d0ebff] outline-none transition-all"
                                   value="{{ old('usage_limit_per_user', $coupon->usage_limit_per_user) }}">
                        </div>
                    </div>

                    <!-- Tanggal Berlaku -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label for="valid_from" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1">
                                Mulai Berlaku Pada <span class="text-slate-400 font-normal">(Opsional)</span>
                            </label>
                            <input type="datetime-local"
                                   id="valid_from"
                                   name="valid_from"
                                   class="w-full text-xs font-medium rounded-xl border border-slate-200 px-3.5 py-2.5 focus:border-[#228be6] focus:ring-2 focus:ring-[#d0ebff] outline-none transition-all"
                                   value="{{ old('valid_from', $coupon->valid_from?->format('Y-m-d\TH:i')) }}">
                        </div>
                        <div>
                            <label for="valid_until" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1">
                                Berakhir Pada <span class="text-slate-400 font-normal">(Opsional)</span>
                            </label>
                            <input type="datetime-local"
                                   id="valid_until"
                                   name="valid_until"
                                   class="w-full text-xs font-medium rounded-xl border border-slate-200 px-3.5 py-2.5 focus:border-[#228be6] focus:ring-2 focus:ring-[#d0ebff] outline-none transition-all"
                                   value="{{ old('valid_until', $coupon->valid_until?->format('Y-m-d\TH:i')) }}">
                        </div>
                    </div>

                    <!-- Status Aktif Toggle -->
                    <div class="pt-2">
                        <label class="flex items-center gap-2.5 cursor-pointer select-none">
                            <input type="checkbox"
                                   name="is_active"
                                   value="1"
                                   {{ old('is_active', $coupon->is_active ? '1' : '0') == '1' ? 'checked' : '' }}
                                   class="rounded text-[#1c7ed6] focus:ring-[#228be6] w-4 h-4">
                            <span class="text-xs font-semibold text-slate-800">Kupon aktif dan dapat diklaim oleh murid</span>
                        </label>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="flex items-center justify-end gap-3 pt-2">
                    <a href="{{ route('tenant.coupons.index') }}"
                       class="px-5 py-2.5 rounded-xl border border-slate-200 text-slate-600 hover:text-slate-800 text-xs font-semibold transition-all">
                        Batal
                    </a>
                    <button type="submit"
                            class="px-6 py-2.5 rounded-xl text-white text-xs font-bold transition-all shadow-xs cursor-pointer flex items-center gap-2 hover:shadow-md active:scale-[0.98]"
                            style="background-color: #1c7ed6;">
                        <x-radix-icon name="check" class="w-4 h-4 text-white" />
                        <span>Simpan Perubahan</span>
                    </button>
                </div>
            </form>

            <!-- Preview Column (1 col) -->
            <div class="space-y-6">
                <!-- Live Coupon Voucher Card Preview (Open Color Blue Gradient) -->
                <div class="rounded-3xl p-6 text-white shadow-xl border space-y-4"
                     style="background: linear-gradient(135deg, #1864ab 0%, #1971c2 50%, #1c7ed6 100%); border-color: #1971c2;">
                    <div class="flex items-center justify-between text-xs" style="color: #d0ebff;">
                        <span class="font-bold uppercase tracking-wider">Voucher Promo</span>
                        <span class="px-2.5 py-0.5 rounded-full text-[10px] font-mono font-bold border"
                              style="background-color: rgba(255, 255, 255, 0.15); border-color: rgba(255, 255, 255, 0.3); color: #ffffff;">
                            ENTERPRISE
                        </span>
                    </div>

                    <div class="pt-3 pb-2 text-center border-y border-dashed border-white/20 my-3">
                        <div class="text-[11px] font-medium" style="color: #d0ebff;">KODE VOUCHER</div>
                        <div class="font-mono font-extrabold text-2xl tracking-widest my-1 select-all"
                             style="color: #ffe066;"
                             x-text="code ? code : '{{ $coupon->code }}'">
                        </div>
                        <div class="text-xs font-semibold text-slate-100 truncate"
                             x-text="name ? name : '{{ $coupon->name }}'">
                        </div>
                    </div>

                    <div class="flex items-center justify-between text-xs pt-1">
                        <span style="color: #d0ebff;">Potongan Harga:</span>
                        <span class="font-black text-base px-2.5 py-0.5 rounded-lg border font-mono"
                              style="background-color: #ebfbee; border-color: #b2f2bb; color: #2b8a3e;"
                              x-text="formattedPreview">
                        </span>
                    </div>

                    <div class="text-[10px] leading-relaxed pt-2" style="color: #d0ebff;">
                        Berlaku eksklusif di portal <strong>{{ $tenant->name }}</strong>.
                    </div>
                </div>

                <!-- Financial Commitment Note (Open Color Orange Warning Theme) -->
                <div class="rounded-2xl border p-5 shadow-xs space-y-2"
                     style="background-color: #fff4e6; border-color: #ffd8a8;">
                    <div class="flex items-center gap-2 text-xs font-bold" style="color: #d9480f;">
                        <x-radix-icon name="shield" class="w-4 h-4" style="color: #e8590c;" />
                        <span>Catatan Finansial</span>
                    </div>
                    <p class="text-xs text-slate-700 leading-relaxed">
                        Nilai potongan diskon akan mengurangi langsung jatah bagi hasil institusi Anda (75%). Porsi operasional platform ADZKIA (25%) tetap terlindungi.
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
