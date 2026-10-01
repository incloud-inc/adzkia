<x-layouts.app>
    <div class="space-y-6" x-data="{
        toastMsg: '',
        showToast: false,
        toastType: 'success',
        pins: @json($sessions->filter(fn($s) => filled(data_get($s->meta, 'unlock_pin')))->mapWithKeys(fn($s) => [$s->id => (string) data_get($s->meta, 'unlock_pin')])),
        triggerToast(msg, type = 'success') {
            this.toastMsg = msg;
            this.toastType = type;
            this.showToast = true;
            setTimeout(() => { this.showToast = false; }, 5000);
        },
        async generatePin(sessionId, studentName) {
            try {
                const response = await fetch(`/proctoring/sessions/${sessionId}/generate-pin`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json'
                    }
                });
                const data = await response.json();
                if (response.ok && data.success && data.pin) {
                    this.pins[sessionId] = data.pin;
                    this.triggerToast(`PIN untuk ${studentName}: ${data.pin} (Berikan ke siswa)`, 'success');
                } else {
                    this.triggerToast(data.message || 'Gagal men-generate PIN', 'error');
                }
            } catch (err) {
                console.error(err);
                this.triggerToast('Terjadi kesalahan jaringan', 'error');
            }
        },
        async cutTime(sessionId, studentName) {
            const minutes = prompt(`[TIME] Masukkan jumlah MENIT waktu ujian yang ingin dipotong untuk ${studentName}:`, '5');
            if (!minutes || isNaN(minutes) || Number(minutes) <= 0) return;
            try {
                const response = await fetch(`/proctoring/sessions/${sessionId}/cut-time`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify({ minutes: parseInt(minutes, 10) })
                });
                const data = await response.json();
                if (response.ok && data.success) {
                    this.triggerToast(data.message, 'success');
                    setTimeout(() => window.location.reload(), 1200);
                } else {
                    this.triggerToast(data.message || 'Gagal memotong waktu', 'error');
                }
            } catch (err) {
                console.error(err);
                this.triggerToast('Terjadi kesalahan jaringan', 'error');
            }
        },
        async cutPoint(sessionId, studentName) {
            const points = prompt(`[POINT] Masukkan jumlah POIN nilai yang ingin dipotong untuk ${studentName}:`, '5');
            if (!points || isNaN(points) || Number(points) <= 0) return;
            try {
                const response = await fetch(`/proctoring/sessions/${sessionId}/cut-point`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify({ points: parseFloat(points) })
                });
                const data = await response.json();
                if (response.ok && data.success) {
                    this.triggerToast(data.message, 'success');
                    setTimeout(() => window.location.reload(), 1200);
                } else {
                    this.triggerToast(data.message || 'Gagal memotong poin nilai', 'error');
                }
            } catch (err) {
                console.error(err);
                this.triggerToast('Terjadi kesalahan jaringan', 'error');
            }
        },
        async resetQuestions(sessionId, studentName) {
            const ok = confirm(`[RESET] PERINGATAN: Apakah Anda yakin ingin MENGOSONGKAN SELURUH JAWABAN ${studentName} dan melempar kembali ke nomor 1?\n\nWaktu ujian tetap berlanjut.`);
            if (!ok) return;
            try {
                const response = await fetch(`/proctoring/sessions/${sessionId}/reset-questions`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json'
                    }
                });
                const data = await response.json();
                if (response.ok && data.success) {
                    this.triggerToast(data.message, 'success');
                    setTimeout(() => window.location.reload(), 1200);
                } else {
                    this.triggerToast(data.message || 'Gagal mereset soal', 'error');
                }
            } catch (err) {
                console.error(err);
                this.triggerToast('Terjadi kesalahan jaringan', 'error');
            }
        },
        async cancelSession(sessionId, studentName) {
            const ok = confirm(`[CANCEL] PERINGATAN: Hentikan sesi ujian ${studentName} sekarang dan lempar kembali ke GERBANG UJIAN?`);
            if (!ok) return;
            try {
                const response = await fetch(`/proctoring/sessions/${sessionId}/cancel`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json'
                    }
                });
                const data = await response.json();
                if (response.ok && data.success) {
                    this.triggerToast(data.message, 'success');
                    setTimeout(() => window.location.reload(), 1200);
                } else {
                    this.triggerToast(data.message || 'Gagal menghentikan sesi', 'error');
                }
            } catch (err) {
                console.error(err);
                this.triggerToast('Terjadi kesalahan jaringan', 'error');
            }
        },
        async verifySession(sessionId, studentName) {
            try {
                const response = await fetch(`/proctoring/sessions/${sessionId}/verify`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json'
                    }
                });
                const data = await response.json();
                if (response.ok && data.success) {
                    this.triggerToast(data.message, 'success');
                    setTimeout(() => window.location.reload(), 1200);
                } else {
                    this.triggerToast(data.message || 'Gagal memverifikasi sesi', 'error');
                }
            } catch (err) {
                console.error(err);
                this.triggerToast('Terjadi kesalahan jaringan', 'error');
            }
        },
        async unlockSession(sessionId, studentName) {
            try {
                const response = await fetch(`/proctoring/sessions/${sessionId}/unlock`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json'
                    }
                });
                const data = await response.json();
                if (response.ok && data.success) {
                    this.triggerToast(data.message, 'success');
                    setTimeout(() => window.location.reload(), 1200);
                } else {
                    this.triggerToast(data.message || 'Gagal membuka sesi ujian', 'error');
                }
            } catch (err) {
                console.error(err);
                this.triggerToast('Terjadi kesalahan jaringan', 'error');
            }
        },
        autoRefresh: true,
        init() {
            setInterval(() => {
                if (this.autoRefresh && !this.showToast) {
                    window.location.reload();
                }
            }, 15000);
        },
        async lockSession(sessionId, studentName) {
            const reason = prompt(`Masukkan alasan mengunci sesi ${studentName}:`, 'Koneksi terputus / pergantian perangkat');
            if (!reason) return;
            try {
                const response = await fetch(`/proctoring/sessions/${sessionId}/lock`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify({ reason: reason })
                });
                const data = await response.json();
                if (response.ok && data.success) {
                    this.triggerToast(data.message, 'success');
                    setTimeout(() => window.location.reload(), 1200);
                } else {
                    this.triggerToast(data.message || 'Gagal mengunci sesi ujian', 'error');
                }
            } catch (err) {
                console.error(err);
                this.triggerToast('Terjadi kesalahan jaringan', 'error');
            }
        }
    }">
        <!-- Floating Toast -->
        <div x-show="showToast" 
             x-transition
             class="fixed top-6 right-6 z-50 flex items-center gap-3 px-4 py-3 rounded-xl shadow-xl text-sm font-semibold text-white"
             :class="toastType === 'success' ? 'bg-emerald-600' : 'bg-red-600'"
             style="display: none;">
            <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path></svg>
            <span x-text="toastMsg"></span>
        </div>

        <!-- Breadcrumb & Header -->
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
            <div>
                <div class="flex items-center gap-2 text-xs font-semibold text-gray-10 mb-1">
                    <a href="{{ route('assessments.index') }}" class="hover:text-gray-12">Asesmen</a>
                    <span>/</span>
                    <a href="{{ route('assessments.show', $assessment) }}" class="hover:text-gray-12">{{ $assessment->title }}</a>
                    <span>/</span>
                    <span class="text-emerald-700">Pengawasan Ujian</span>
                </div>
                <h1 class="font-display font-extrabold text-2xl text-gray-12 tracking-tight flex items-center gap-3">
                    <span>Ruang Pengawasan Ujian (Proctoring)</span>
                    @if(auth()->user()->isSuperUser())
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold bg-purple-100 text-purple-800 border border-purple-200">
                            Super User (Semua Institusi)
                        </span>
                    @elseif($currentTenant)
                        <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-xs font-bold bg-blue-100 text-blue-800 border border-blue-200">
                            <span class="w-1.5 h-1.5 rounded-full bg-blue-600"></span>
                            <span>{{ $currentTenant->name }}</span>
                        </span>
                    @endif
                </h1>
                <p class="text-sm text-gray-11 mt-1">
                    Pantau siswa @if($currentTenant && !auth()->user()->isSuperUser()) <strong>{{ $currentTenant->name }}</strong> @endif secara real-time. Jika siswa terputus jaringan atau ganti perangkat, izinkan siswa melanjutkan ujian di sini.
                </p>
            </div>

            <div class="flex flex-wrap items-center gap-2">
                <form action="{{ route('assessments.proctoring.simulate_lock', $assessment) }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" 
                            class="px-3.5 py-2 rounded-xl border border-amber-300 bg-amber-50 hover:bg-amber-100 text-amber-900 text-xs font-semibold transition-all flex items-center gap-1.5 cursor-pointer shadow-xs active:scale-95"
                            title="Simulasikan salah satu siswa terkunci (koneksi putus/ganti device) agar Anda bisa mencoba tombol 'Izinkan untuk Lanjutkan'">
                        <svg class="w-4 h-4 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                        <span>Simulasikan Siswa Terkunci</span>
                    </button>
                </form>
                <button type="button" onclick="window.location.reload()" class="px-3.5 py-2 rounded-xl border border-gray-6 bg-white hover:bg-gray-3 text-xs font-semibold text-gray-12 transition-colors flex items-center gap-2 cursor-pointer">
                    <svg class="w-4 h-4 text-gray-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path></svg>
                    <span>Refresh Sesi</span>
                </button>
                <a href="{{ route('assessments.show', $assessment) }}" class="px-3.5 py-2 rounded-xl border border-gray-6 bg-white hover:bg-gray-3 text-xs font-semibold text-gray-12 transition-colors">
                    Detail Ujian
                </a>
            </div>
        </div>

        <!-- Stat Cards -->
        <div class="grid grid-cols-2 sm:grid-cols-5 gap-3.5">
            <div class="bg-white p-3.5 rounded-xl border border-gray-6 shadow-sm">
                <div class="text-xs font-bold text-gray-10 uppercase tracking-wider font-display">Total Peserta</div>
                <div class="text-2xl font-extrabold text-gray-12 mt-1">{{ $sessions->count() }}</div>
                <div class="text-[11px] text-gray-9 mt-0.5">Siswa terdaftar ujian</div>
            </div>

            <div class="bg-emerald-50 p-3.5 rounded-xl border border-emerald-200 shadow-sm">
                <div class="text-xs font-bold text-emerald-800 uppercase tracking-wider flex items-center gap-1.5 font-display">
                    <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                    <span>Sedang Ujian</span>
                </div>
                <div class="text-2xl font-extrabold text-emerald-900 mt-1">{{ $inProgressCount }}</div>
                <div class="text-[11px] text-emerald-700 mt-0.5">Koneksi aktif normal</div>
            </div>

            <div class="bg-rose-50 p-3.5 rounded-xl border border-rose-200 shadow-sm">
                <div class="text-xs font-bold text-rose-800 uppercase tracking-wider flex items-center gap-1.5 font-display">
                    <span class="w-2 h-2 rounded-full bg-rose-600 animate-ping"></span>
                    <span>Pelanggaran</span>
                </div>
                <div class="text-2xl font-extrabold text-rose-900 mt-1">{{ $violationStudentsCount }}</div>
                <div class="text-[11px] text-rose-700 mt-0.5">Keluar halaman / tab</div>
            </div>

            <div class="bg-amber-50 p-3.5 rounded-xl border border-amber-200 shadow-sm">
                <div class="text-xs font-bold text-amber-800 uppercase tracking-wider flex items-center gap-1.5 font-display">
                    <span class="w-2 h-2 rounded-full bg-amber-600"></span>
                    <span>Terkunci</span>
                </div>
                <div class="text-2xl font-extrabold text-amber-900 mt-1">{{ $lockedCount }}</div>
                <div class="text-[11px] text-amber-700 mt-0.5">Butuh izin pengawas</div>
            </div>

            <div class="bg-blue-50 p-3.5 rounded-xl border border-blue-200 shadow-sm">
                <div class="text-xs font-bold text-blue-800 uppercase tracking-wider font-display">Selesai</div>
                <div class="text-2xl font-extrabold text-blue-900 mt-1">{{ $completedCount }}</div>
                <div class="text-[11px] text-blue-700 mt-0.5">Jawaban terkirim</div>
            </div>
        </div>

        @if($violationStudentsCount > 0)
            <!-- Alert Banner jika ada siswa keluar halaman atau beralih tab -->
            <div class="p-4 rounded-xl bg-rose-50 border-2 border-rose-300 flex items-start gap-3 text-rose-950 text-sm shadow-xs">
                <div class="w-8 h-8 rounded-full bg-rose-200 flex items-center justify-center shrink-0 text-rose-700">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                </div>
                <div class="flex-1">
                    <div class="font-bold text-rose-900 font-display text-base">PERINGATAN PENGAWASAN: Ada {{ $violationStudentsCount }} siswa meninggalkan halaman ujian / beralih jendela!</div>
                    <div class="text-xs text-rose-800 mt-0.5 leading-relaxed">
                        Sistem mendeteksi siswa yang keluar dari halaman pengerjaan soal, menutup tab, atau beralih aplikasi. Anda dapat mengunci sesi siswa yang bersangkutan atau memberikan teguran langsung di ruang ujian.
                    </div>
                </div>
            </div>
        @endif

        @if($lockedCount > 0)
            <!-- Alert Banner jika ada siswa terkunci -->
            <div class="p-4 rounded-xl bg-amber-50 border border-amber-300 flex items-start gap-3 text-amber-900 text-sm">
                <svg class="w-5 h-5 text-amber-600 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                <div class="flex-1">
                    <div class="font-bold">Ada {{ $lockedCount }} siswa yang sesinya terkunci karena terputus koneksi atau berganti perangkat!</div>
                    <div class="text-xs text-amber-800 mt-0.5">Siswa tersebut tidak dapat melanjutkan ujian sebelum Anda menekan tombol <strong class="underline font-bold">"Izinkan untuk Lanjutkan"</strong> berwarna biru di bawah.</div>
                </div>
            </div>
        @endif

        <!-- Sesi Siswa Table -->
        <div class="bg-white border border-gray-6 rounded-xl shadow-sm overflow-hidden">
            <div class="p-4 border-b border-gray-6 bg-gray-2/40 flex items-center justify-between">
                <h3 class="font-display font-bold text-sm text-gray-12 flex items-center gap-2">
                    <span>Daftar Sesi Ujian Siswa</span>
                    <span class="text-xs font-normal text-gray-10">({{ $assessment->title }})</span>
                </h3>
                <span class="text-xs text-gray-10">Durasi Ujian: {{ $assessment->duration_minutes }} menit</span>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse text-xs">
                    <thead>
                        <tr class="border-b border-gray-6 bg-gray-2/20 text-gray-11 uppercase tracking-wider font-semibold font-display">
                            <th class="py-3 px-5">Nama Siswa</th>
                            <th class="py-3 px-4">Status Sesi</th>
                            <th class="py-3 px-4">Log Integritas &amp; Peringatan</th>
                            <th class="py-3 px-4">Alamat IP</th>
                            <th class="py-3 px-4">Waktu Mulai</th>
                            <th class="py-3 px-4">Pengawas Terakhir</th>
                            <th class="py-3 px-5 text-right">Aksi Pengawas</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-5">
                        @forelse($sessions as $session)
                            @php
                                $vCount = (int) data_get($session->meta, 'violation_count', 0);
                                $lastVType = data_get($session->meta, 'last_violation_type');
                                $lastVAt = data_get($session->meta, 'last_violation_at');
                                $isVerified = (bool) data_get($session->meta, 'is_verified_by_proctor', false);
                                $hasViolation = $vCount > 0 || $session->events->isNotEmpty();
                                $timePen = (int) data_get($session->meta, 'time_penalty_minutes', 0);
                                $scorePen = (float) data_get($session->meta, 'score_penalty', 0);
                            @endphp
                            <tr class="hover:bg-gray-2/40 transition-colors {{ $session->isLocked() ? 'bg-red-50/40' : ($hasViolation && !$isVerified ? 'bg-amber-50/20' : '') }}">
                                <td class="py-3.5 px-5 font-semibold text-gray-12">
                                    <div class="flex items-center gap-2.5">
                                        <img src="{{ $session->user->profile_photo_url }}" alt="{{ $session->user->name }}" class="w-7 h-7 rounded-full object-cover border border-gray-6">
                                        <div>
                                            <div class="font-bold text-gray-12 text-sm">{{ $session->user->name }}</div>
                                            <div class="text-[11px] text-gray-10 font-mono">{{ $session->user->email }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-3.5 px-4">
                                    @if($session->status === 'cancelled')
                                        <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full font-bold text-gray-800 bg-gray-200 border border-gray-300 text-[11px]">
                                            <span>DIHENTIKAN</span>
                                        </span>
                                    @elseif($session->isLocked())
                                        <div class="space-y-1">
                                            <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full font-bold text-red-800 bg-red-100 border border-red-300 text-[11px]">
                                                <span class="w-2 h-2 rounded-full bg-red-600 animate-ping"></span>
                                                <span>TERKUNCI</span>
                                            </span>
                                            <div class="text-[10.5px] text-red-700 italic">{{ $session->lock_reason }}</div>
                                        </div>
                                    @elseif($session->isInProgress())
                                        <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full font-bold text-emerald-800 bg-emerald-100 border border-emerald-300 text-[11px]">
                                            <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                                            <span>Mengerjakan</span>
                                        </span>
                                    @else
                                        <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full font-bold text-blue-800 bg-blue-100 border border-blue-300 text-[11px]">
                                            <span>Selesai</span>
                                        </span>
                                    @endif
                                </td>
                                <td class="py-3.5 px-4">
                                    @if($isVerified)
                                        <div class="space-y-0.5">
                                            <span class="inline-flex items-center gap-1 text-emerald-700 font-bold text-[11px]">
                                                <svg class="w-3.5 h-3.5 text-emerald-600" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                                                <span>Disahkan Pengawas</span>
                                            </span>
                                            @if($scorePen > 0)
                                                <div class="text-[10px] text-purple-700 font-semibold">Penalti: -{{ $scorePen }} Poin</div>
                                            @endif
                                        </div>
                                    @elseif($hasViolation)
                                        <div class="space-y-1">
                                            <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded text-[11px] font-bold text-rose-800 bg-rose-100 border border-rose-300 shadow-2xs">
                                                <svg class="w-3.5 h-3.5 text-rose-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg>
                                                <span>{{ $vCount > 0 ? $vCount.'x' : $session->events->count().'x' }} Pelanggaran</span>
                                            </span>
                                            <div class="text-[10px] text-rose-700 font-medium">
                                                @if($lastVType === 'page_exit')
                                                    ⚠️ Keluar Halaman Ujian
                                                @elseif(in_array($lastVType, ['tab_hidden', 'window_blur']))
                                                    ⚠️ Pindah Tab / Jendela
                                                @elseif($lastVType === 'fullscreen_exit')
                                                    ⚠️ Keluar Layar Penuh
                                                @elseif($session->events->isNotEmpty())
                                                    ⚠️ {{ ucwords(str_replace('_', ' ', $session->events->first()->event_type)) }}
                                                @else
                                                    ⚠️ Meninggalkan Layar
                                                @endif
                                                @if($lastVAt)
                                                    <span class="text-gray-9">({{ \Carbon\Carbon::parse($lastVAt)->diffForHumans() }})</span>
                                                @endif
                                            </div>
                                            @if($timePen > 0 || $scorePen > 0)
                                                <div class="flex items-center gap-1.5 text-[9.5px] font-semibold pt-0.5">
                                                    @if($timePen > 0)
                                                        <span class="px-1.5 py-0.5 rounded bg-amber-100 text-amber-900 border border-amber-200">⏱️ -{{ $timePen }}m</span>
                                                    @endif
                                                    @if($scorePen > 0)
                                                        <span class="px-1.5 py-0.5 rounded bg-purple-100 text-purple-900 border border-purple-200">🎯 -{{ $scorePen }} poin</span>
                                                    @endif
                                                </div>
                                            @endif
                                        </div>
                                    @else
                                        <span class="inline-flex items-center gap-1 text-emerald-700 font-semibold text-[11px]">
                                            <svg class="w-3.5 h-3.5 text-emerald-600" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                                            <span>Tertib</span>
                                        </span>
                                    @endif
                                </td>
                                <td class="py-3.5 px-4 font-mono text-gray-11">
                                    <div>{{ $session->ip_address ?: '127.0.0.1' }}</div>
                                    <div class="text-[10px] text-gray-9">Web Browser</div>
                                </td>
                                <td class="py-3.5 px-4 text-gray-11">
                                    {{ $session->started_at ? $session->started_at->format('H:i') : '-' }}
                                    @if($session->started_at)
                                        <span class="text-[10.5px] text-gray-9">({{ $session->started_at->diffForHumans() }})</span>
                                    @endif
                                </td>
                                <td class="py-3.5 px-4 text-gray-11">
                                    @if($session->unlocked_by && $session->proctor)
                                        <div class="text-xs font-semibold text-emerald-800">Ditindak oleh {{ $session->proctor->name }}</div>
                                        <div class="text-[10px] text-gray-9">{{ $session->unlocked_at?->diffForHumans() }}</div>
                                    @else
                                        <span class="text-gray-9">-</span>
                                    @endif
                                </td>
                                <td class="py-3.5 px-5 text-right">
                                    @if($session->isLocked() || $session->isInProgress())
                                        <!-- Tombol-tombol Tindakan Pengawas (PIN, TIME, POINT, RESET, CANCEL) -->
                                        <div class="flex items-center justify-end gap-1.5 flex-wrap">
                                            @if($session->isLocked())
                                                <!-- Buka Kunci Langsung -->
                                                <button type="button" 
                                                        @click="unlockSession({{ $session->id }}, '{{ addslashes($session->user->name) }}')"
                                                        style="background-color: #1c7ed6;"
                                                        class="px-2.5 py-1 rounded-lg hover:opacity-90 text-white font-bold text-xs shadow-2xs transition-all cursor-pointer flex items-center gap-1 active:scale-95"
                                                        title="Buka kunci layar siswa langsung tanpa PIN">
                                                    <span>🔓 Izinkan untuk Lanjutkan</span>
                                                </button>
                                            @endif

                                            <!-- 1. PIN -->
                                            <template x-if="pins[{{ $session->id }}]">
                                                <button type="button" 
                                                        @click="navigator.clipboard?.writeText(pins[{{ $session->id }}]); triggerToast('PIN ' + pins[{{ $session->id }}] + ' disalin!')" 
                                                        class="px-2 py-1 rounded-lg bg-blue-100 hover:bg-blue-200 text-blue-900 border border-blue-300 font-mono font-bold text-xs shadow-2xs transition-all cursor-pointer flex items-center gap-1"
                                                        title="Klik untuk menyalin PIN unlock siswa">
                                                    <span>🔑 PIN:</span>
                                                    <span class="text-xs font-black tracking-wider" x-text="pins[{{ $session->id }}]"></span>
                                                </button>
                                            </template>
                                            <template x-if="!pins[{{ $session->id }}]">
                                                <button type="button" 
                                                        @click="generatePin({{ $session->id }}, '{{ addslashes($session->user->name) }}')"
                                                        class="px-2 py-1 rounded-lg bg-blue-50 hover:bg-blue-100 text-blue-700 border border-blue-200 font-bold text-xs shadow-2xs transition-all cursor-pointer flex items-center gap-1"
                                                        title="1. PIN: Generate kode PIN buka kunci">
                                                    <span>🔑 PIN</span>
                                                </button>
                                            </template>

                                            <!-- 2. TIME -->
                                            <button type="button" 
                                                    @click="cutTime({{ $session->id }}, '{{ addslashes($session->user->name) }}')"
                                                    class="px-2 py-1 rounded-lg bg-amber-50 hover:bg-amber-100 text-amber-800 border border-amber-300 font-bold text-xs shadow-2xs transition-all cursor-pointer flex items-center gap-1"
                                                    title="2. TIME: Potong waktu ujian (menit) & buka kunci">
                                                <span>⏱️ TIME</span>
                                            </button>

                                            <!-- 3. POINT -->
                                            <button type="button" 
                                                    @click="cutPoint({{ $session->id }}, '{{ addslashes($session->user->name) }}')"
                                                    class="px-2 py-1 rounded-lg bg-purple-50 hover:bg-purple-100 text-purple-800 border border-purple-300 font-bold text-xs shadow-2xs transition-all cursor-pointer flex items-center gap-1"
                                                    title="3. POINT: Potong nilai ujian & buka kunci">
                                                <span>🎯 POINT</span>
                                            </button>

                                            <!-- 4. RESET -->
                                            <button type="button" 
                                                    @click="resetQuestions({{ $session->id }}, '{{ addslashes($session->user->name) }}')"
                                                    class="px-2 py-1 rounded-lg bg-orange-50 hover:bg-orange-100 text-orange-800 border border-orange-300 font-bold text-xs shadow-2xs transition-all cursor-pointer flex items-center gap-1"
                                                    title="4. RESET: Kosongkan semua jawaban siswa & lempar ke No. 1 (waktu tetap berjalan)">
                                                <span>🔄 RESET</span>
                                            </button>

                                            <!-- 5. CANCEL -->
                                            <button type="button" 
                                                    @click="cancelSession({{ $session->id }}, '{{ addslashes($session->user->name) }}')"
                                                    class="px-2 py-1 rounded-lg bg-red-50 hover:bg-red-100 text-red-700 border border-red-300 font-bold text-xs shadow-2xs transition-all cursor-pointer flex items-center gap-1"
                                                    title="5. CANCEL: Hentikan sesi ujian & lempar kembali ke Gerbang Ujian">
                                                <span>⛔ CANCEL</span>
                                            </button>
                                        </div>
                                    @elseif($session->isCompleted())
                                        @if($isVerified)
                                            <span class="inline-flex items-center gap-1 text-emerald-700 font-bold text-xs">
                                                <svg class="w-3.5 h-3.5 text-emerald-600" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                                                <span>Selesai (Sah)</span>
                                            </span>
                                        @elseif($hasViolation)
                                            <div class="flex items-center justify-end gap-1 flex-wrap">
                                                <button type="button" 
                                                        @click="verifySession({{ $session->id }}, '{{ addslashes($session->user->name) }}')"
                                                        class="px-2 py-1 rounded-lg bg-emerald-50 hover:bg-emerald-100 text-emerald-800 border border-emerald-300 font-bold text-xs shadow-2xs transition-all cursor-pointer flex items-center gap-1"
                                                        title="Sahkan sesi ujian & bersihkan peringatan">
                                                    <span>✓ Sahkan</span>
                                                </button>
                                                <button type="button" 
                                                        @click="cutPoint({{ $session->id }}, '{{ addslashes($session->user->name) }}')"
                                                        class="px-2 py-1 rounded-lg bg-purple-50 hover:bg-purple-100 text-purple-800 border border-purple-300 font-bold text-xs shadow-2xs transition-all cursor-pointer flex items-center gap-1"
                                                        title="Beri sanksi potongan nilai">
                                                    <span>🎯 Potong Nilai</span>
                                                </button>
                                                <button type="button" 
                                                        @click="resetQuestions({{ $session->id }}, '{{ addslashes($session->user->name) }}')"
                                                        class="px-2 py-1 rounded-lg bg-orange-50 hover:bg-orange-100 text-orange-800 border border-orange-300 font-bold text-xs shadow-2xs transition-all cursor-pointer flex items-center gap-1"
                                                        title="Reset seluruh jawaban untuk ujian ulang">
                                                    <span>🔄 Ujian Ulang</span>
                                                </button>
                                            </div>
                                        @else
                                            <span class="text-gray-8 text-[11px]">Selesai</span>
                                        @endif
                                    @elseif($session->status === 'cancelled')
                                        <span class="text-red-700 font-semibold text-[11px]">Dibatalkan</span>
                                    @else
                                        <span class="text-gray-8 text-[11px]">-</span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="py-8 px-5 text-center text-gray-10">
                                    Belum ada sesi pengerjaan ujian untuk asesmen ini.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-layouts.app>
