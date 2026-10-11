<x-layouts.app>
    <x-slot:title>Galeri Media Cloudflare R2 - ADZKIA</x-slot:title>

    <div class="space-y-5" x-data="{
        search: '{{ request('search', '') }}',
        activeType: '{{ request('type', 'all') }}',
        previewModal: false,
        previewUrl: '',
        previewName: '',
        previewExtension: '',
        previewSize: '',
        previewDate: '',
        previewIsImage: true,
        previewIsVideo: false,
        previewIsAudio: false,
        copiedPath: null,

        copyToClipboard(text, path, type = 'markdown') {
            navigator.clipboard.writeText(text).then(() => {
                this.copiedPath = path + '-' + type;
                setTimeout(() => {
                    this.copiedPath = null;
                }, 2000);
            });
        },

        openPreview(item) {
            this.previewUrl = item.url;
            this.previewName = item.filename;
            this.previewExtension = item.extension;
            this.previewSize = item.size_formatted;
            this.previewDate = item.last_modified_formatted;
            this.previewIsImage = item.is_image;
            this.previewIsVideo = item.is_video;
            this.previewIsAudio = item.is_audio;
            this.previewModal = true;
        }
    }">
        <!-- Top Operational Header -->
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 pb-3 border-b border-slate-200/70">
            <div>
                <div class="flex items-center gap-2">
                    <span class="inline-flex items-center justify-center w-7 h-7 rounded-lg bg-slate-900 text-white shadow-xs">
                        <x-radix-icon name="image" class="w-4 h-4" />
                    </span>
                    <h1 class="text-xl font-bold tracking-tight text-slate-900 font-sans">
                        Galeri Media Cloudflare R2
                    </h1>
                    <span class="font-mono text-[10px] font-semibold uppercase px-2 py-0.5 rounded border border-slate-200 text-slate-600 bg-slate-50">
                        asesmen/
                    </span>
                </div>
                <p class="text-xs text-slate-500 mt-1">
                    Arsip aset visual, audio, dan ilustrasi digital berkinerja tinggi untuk butir soal asesmen.
                </p>
            </div>
            <div class="flex items-center gap-2 self-start sm:self-auto">
                <a href="{{ route('assessments.index') }}" class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-white text-slate-700 border border-slate-200/80 rounded-lg text-xs font-semibold hover:bg-slate-50 hover:border-slate-300 transition-colors shadow-2xs">
                    <x-radix-icon name="arrow-left" class="w-3.5 h-3.5 text-slate-500" />
                    <span>Kembali ke Bank Soal</span>
                </a>
            </div>
        </div>

        <!-- Telemetry Stats Bar -->
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-3">
            <div class="bg-white rounded-xl p-3 border border-slate-200/70 shadow-2xs flex items-center justify-between transition-colors hover:border-slate-300">
                <div class="space-y-0.5">
                    <div class="font-mono text-[10px] font-medium uppercase tracking-wider text-slate-400">// TOTAL_ASSETS</div>
                    <div class="text-base font-bold text-slate-900 font-sans tracking-tight">
                        {{ $totalCount }} <span class="text-xs font-normal text-slate-500">Berkas</span>
                    </div>
                </div>
                <div class="w-8 h-8 rounded-lg bg-slate-100 border border-slate-200/60 flex items-center justify-center text-slate-600">
                    <x-radix-icon name="file" class="w-4 h-4" />
                </div>
            </div>

            <div class="bg-white rounded-xl p-3 border border-slate-200/70 shadow-2xs flex items-center justify-between transition-colors hover:border-slate-300">
                <div class="space-y-0.5">
                    <div class="font-mono text-[10px] font-medium uppercase tracking-wider text-emerald-600/90">// IMAGES</div>
                    <div class="text-base font-bold text-slate-900 font-sans tracking-tight">
                        {{ $imageCount }} <span class="text-xs font-normal text-slate-500">Gambar</span>
                    </div>
                </div>
                <div class="w-8 h-8 rounded-lg bg-emerald-50 border border-emerald-200/60 flex items-center justify-center text-emerald-600">
                    <x-radix-icon name="image" class="w-4 h-4" />
                </div>
            </div>

            <div class="bg-white rounded-xl p-3 border border-slate-200/70 shadow-2xs flex items-center justify-between transition-colors hover:border-slate-300">
                <div class="space-y-0.5">
                    <div class="font-mono text-[10px] font-medium uppercase tracking-wider text-purple-600/90">// AUDIO_VIDEO</div>
                    <div class="text-base font-bold text-slate-900 font-sans tracking-tight">
                        {{ $audioCount + $videoCount }} <span class="text-xs font-normal text-slate-500">Media</span>
                    </div>
                </div>
                <div class="w-8 h-8 rounded-lg bg-purple-50 border border-purple-200/60 flex items-center justify-center text-purple-600">
                    <x-radix-icon name="video" class="w-4 h-4" />
                </div>
            </div>

            <div class="bg-white rounded-xl p-3 border border-slate-200/70 shadow-2xs flex items-center justify-between transition-colors hover:border-slate-300">
                <div class="space-y-0.5">
                    <div class="font-mono text-[10px] font-medium uppercase tracking-wider text-amber-600/90">// R2_STORAGE</div>
                    <div class="text-base font-bold text-slate-900 font-sans tracking-tight">
                        {{ $totalSizeFormatted }}
                    </div>
                </div>
                <div class="w-8 h-8 rounded-lg bg-amber-50 border border-amber-200/60 flex items-center justify-center text-amber-600">
                    <x-radix-icon name="archive" class="w-4 h-4" />
                </div>
            </div>
        </div>

        <!-- Sleek Tactile Upload Strip -->
        <div x-data="{
            isDropping: false,
            uploading: false,
            uploadFile(file) {
                if (!file) return;
                this.uploading = true;
                const formData = new FormData();
                formData.append('media', file);
                formData.append('_token', '{{ csrf_token() }}');

                fetch('{{ route('media.gallery.upload') }}', {
                    method: 'POST',
                    headers: {
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: formData
                })
                .then(r => r.json())
                .then(data => {
                    this.uploading = false;
                    if (data.success) {
                        window.location.reload();
                    } else {
                        alert(data.message || 'Gagal mengunggah berkas.');
                    }
                })
                .catch(() => {
                    this.uploading = false;
                    alert('Terjadi kesalahan jaringan.');
                });
            }
        }" class="bg-white rounded-xl border border-dashed p-3 sm:p-4 transition-all duration-200 relative shadow-2xs"
           :class="isDropping ? 'border-slate-900 bg-slate-50 ring-2 ring-slate-900/10' : 'border-slate-300/80 hover:border-slate-700 bg-slate-50/40'"
           @dragover.prevent="isDropping = true"
           @dragleave.prevent="isDropping = false"
           @drop.prevent="isDropping = false; uploadFile($event.dataTransfer.files[0])">

            <input type="file" id="media-upload-input" class="hidden" accept="image/*,audio/*,video/*"
                   @change="uploadFile($event.target.files[0])">

            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3">
                <div class="flex items-center gap-3">
                    <div class="w-9 h-9 rounded-lg bg-white border border-slate-200 text-slate-700 flex items-center justify-center shrink-0 shadow-2xs">
                        <x-radix-icon name="upload" class="w-4 h-4" />
                    </div>
                    <div>
                        <div class="text-xs font-bold text-slate-900 flex items-center gap-2">
                            <span>Unggah Media ke Bucket R2</span>
                            <span class="font-mono text-[9px] uppercase tracking-wide text-slate-400 font-semibold">[DROPZONE]</span>
                        </div>
                        <p class="text-[11px] text-slate-500">
                            Tarik berkas gambar (JPG, PNG, WebP), audio, atau video ke sini atau klik tombol di sebelah kanan.
                        </p>
                    </div>
                </div>

                <div class="flex items-center gap-2 shrink-0">
                    <div x-show="uploading" class="inline-flex items-center gap-1.5 text-xs font-semibold text-slate-800 animate-pulse">
                        <svg class="animate-spin h-3.5 w-3.5 text-slate-900" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8H4z"></path></svg>
                        <span>Mengunggah...</span>
                    </div>
                    <label for="media-upload-input" class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-slate-900 hover:bg-slate-800 text-white text-xs font-semibold transition-colors cursor-pointer shadow-xs active:scale-[0.98]">
                        <x-radix-icon name="plus" class="w-3.5 h-3.5" />
                        <span>Pilih Berkas</span>
                    </label>
                </div>
            </div>
        </div>

        <!-- Precision Filter & Search Toolbar -->
        <div class="bg-white rounded-xl border border-slate-200/70 p-3 shadow-2xs flex flex-col md:flex-row items-stretch md:items-center justify-between gap-3">
            <!-- Search Form -->
            <form method="GET" action="{{ route('media.gallery.index') }}" class="relative flex-1 max-w-md">
                <x-radix-icon name="magnifying-glass" class="w-3.5 h-3.5 text-slate-400 absolute left-3 top-1/2 -translate-y-1/2" />
                <input type="text" name="search" value="{{ request('search') }}"
                       placeholder="Cari berkas di Cloudflare R2..."
                       class="w-full pl-8 pr-3 py-1.5 bg-slate-50/70 border border-slate-200/80 rounded-lg text-xs text-slate-900 focus:outline-none focus:border-slate-800 focus:bg-white transition-all font-sans">
                @if(request('type'))
                    <input type="hidden" name="type" value="{{ request('type') }}">
                @endif
            </form>

            <!-- Media Type Filter Chips -->
            <div class="flex items-center gap-1.5 overflow-x-auto pb-0.5">
                <a href="{{ route('media.gallery.index', array_merge(request()->except('type'), ['type' => 'all'])) }}"
                   class="inline-flex items-center gap-1 px-2.5 py-1 rounded-lg text-xs font-semibold transition-colors whitespace-nowrap {{ request('type', 'all') === 'all' ? 'bg-slate-900 text-white shadow-2xs' : 'bg-slate-100/80 text-slate-600 hover:bg-slate-200/80 border border-slate-200/60' }}">
                    <span>Semua</span>
                    <span class="font-mono text-[10px] {{ request('type', 'all') === 'all' ? 'text-slate-300' : 'text-slate-500' }}">[{{ $totalCount }}]</span>
                </a>
                <a href="{{ route('media.gallery.index', array_merge(request()->except('type'), ['type' => 'image'])) }}"
                   class="inline-flex items-center gap-1 px-2.5 py-1 rounded-lg text-xs font-semibold transition-colors whitespace-nowrap {{ request('type') === 'image' ? 'bg-slate-900 text-white shadow-2xs' : 'bg-slate-100/80 text-slate-600 hover:bg-slate-200/80 border border-slate-200/60' }}">
                    <span>Gambar</span>
                    <span class="font-mono text-[10px] {{ request('type') === 'image' ? 'text-slate-300' : 'text-slate-500' }}">[{{ $imageCount }}]</span>
                </a>
                <a href="{{ route('media.gallery.index', array_merge(request()->except('type'), ['type' => 'audio'])) }}"
                   class="inline-flex items-center gap-1 px-2.5 py-1 rounded-lg text-xs font-semibold transition-colors whitespace-nowrap {{ request('type') === 'audio' ? 'bg-slate-900 text-white shadow-2xs' : 'bg-slate-100/80 text-slate-600 hover:bg-slate-200/80 border border-slate-200/60' }}">
                    <span>Audio</span>
                    <span class="font-mono text-[10px] {{ request('type') === 'audio' ? 'text-slate-300' : 'text-slate-500' }}">[{{ $audioCount }}]</span>
                </a>
                <a href="{{ route('media.gallery.index', array_merge(request()->except('type'), ['type' => 'video'])) }}"
                   class="inline-flex items-center gap-1 px-2.5 py-1 rounded-lg text-xs font-semibold transition-colors whitespace-nowrap {{ request('type') === 'video' ? 'bg-slate-900 text-white shadow-2xs' : 'bg-slate-100/80 text-slate-600 hover:bg-slate-200/80 border border-slate-200/60' }}">
                    <span>Video</span>
                    <span class="font-mono text-[10px] {{ request('type') === 'video' ? 'text-slate-300' : 'text-slate-500' }}">[{{ $videoCount }}]</span>
                </a>
            </div>
        </div>

        <!-- 5-Column High-Density Compact Grid -->
        @if($files->isEmpty())
            <div class="bg-white rounded-xl border border-slate-200/70 p-12 text-center shadow-2xs">
                <div class="w-12 h-12 mx-auto rounded-xl bg-slate-100 text-slate-400 flex items-center justify-center mb-3 border border-slate-200/60">
                    <x-radix-icon name="image" class="w-6 h-6" />
                </div>
                <h3 class="text-sm font-bold text-slate-900 font-sans">Belum ada media ditemukan</h3>
                <p class="text-xs text-slate-500 max-w-sm mx-auto mt-1">
                    Tidak ada berkas yang cocok dengan filter pencarian atau belum ada berkas diunggah ke folder asesmen R2.
                </p>
            </div>
        @else
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-5 2xl:grid-cols-6 gap-3">
                @foreach($files as $item)
                    <div class="bg-white rounded-xl border border-slate-200/80 overflow-hidden shadow-2xs hover:shadow-md hover:border-slate-800 transition-all duration-200 flex flex-col group">
                        <!-- Compact Thumbnail Viewport with Hairline Scrim -->
                        <div class="relative h-28 bg-slate-50 flex items-center justify-center overflow-hidden border-b border-slate-100">
                            @if($item['is_image'])
                                <img src="{{ $item['url'] }}" alt="{{ $item['filename'] }}" loading="lazy"
                                     class="w-full h-full object-contain p-2 group-hover:scale-105 transition-transform duration-300">
                            @elseif($item['is_video'])
                                <div class="flex flex-col items-center gap-1 text-purple-600">
                                    <x-radix-icon name="video" class="w-8 h-8" />
                                    <span class="font-mono text-[9px] font-bold uppercase tracking-wider bg-purple-100/80 px-1.5 py-0.5 rounded">Video</span>
                                </div>
                            @elseif($item['is_audio'])
                                <div class="flex flex-col items-center gap-1 text-amber-600">
                                    <x-radix-icon name="speaker-loud" class="w-8 h-8" />
                                    <span class="font-mono text-[9px] font-bold uppercase tracking-wider bg-amber-100/80 px-1.5 py-0.5 rounded">Audio</span>
                                </div>
                            @else
                                <x-radix-icon name="file" class="w-8 h-8 text-slate-400" />
                            @endif

                            <!-- Monospaced Extension Badge -->
                            <span class="absolute top-1.5 right-1.5 font-mono text-[9px] font-bold uppercase tracking-wider px-1.5 py-0.5 rounded bg-slate-900/80 text-white backdrop-blur-xs shadow-2xs">
                                {{ $item['extension'] }}
                            </span>

                            <!-- Quick Hover Preview Scrim -->
                            <div class="absolute inset-0 bg-slate-950/40 opacity-0 group-hover:opacity-100 transition-opacity duration-200 flex items-center justify-center gap-2">
                                <button type="button"
                                        @click="openPreview({{ json_encode($item) }})"
                                        class="w-7 h-7 rounded-lg bg-white/95 hover:bg-white text-slate-900 flex items-center justify-center shadow-xs cursor-pointer hover:scale-105 transition-transform"
                                        title="Pratinjau Resolusi Penuh">
                                    <x-radix-icon name="eye-open" class="w-3.5 h-3.5" />
                                </button>
                                <button type="button"
                                        @click="copyToClipboard({{ json_encode($item['markdown']) }}, '{{ $item['path'] }}', 'markdown')"
                                        class="w-7 h-7 rounded-lg bg-white/95 hover:bg-white text-slate-900 flex items-center justify-center shadow-xs cursor-pointer hover:scale-105 transition-transform"
                                        title="Salin Markdown Cepat">
                                    <x-radix-icon name="clipboard-copy" class="w-3.5 h-3.5" />
                                </button>
                            </div>
                        </div>

                        <!-- Card Metadata & Action Area -->
                        <div class="p-2.5 flex-1 flex flex-col justify-between space-y-2">
                            <div>
                                <h4 class="text-[11px] font-bold text-slate-900 truncate leading-tight font-sans" title="{{ $item['filename'] }}">
                                    {{ $item['filename'] }}
                                </h4>
                                <div class="flex items-center justify-between font-mono text-[10px] text-slate-500 mt-1">
                                    <span>{{ $item['size_formatted'] }}</span>
                                    <span>{{ $item['last_modified_formatted'] }}</span>
                                </div>
                            </div>

                            <!-- 1-Row Action Buttons: Salin Markdown, Salin URL, Hapus -->
                            <div class="flex items-center gap-1 pt-2 border-t border-slate-100">
                                <!-- Salin Markdown -->
                                <button type="button"
                                        @click="copyToClipboard({{ json_encode($item['markdown']) }}, '{{ $item['path'] }}', 'markdown')"
                                        class="flex-1 min-w-0 inline-flex items-center justify-center gap-1 px-1.5 py-1.5 rounded-lg text-[10px] font-bold transition-all duration-150 border cursor-pointer active:scale-[0.98]"
                                        :class="copiedPath === '{{ $item['path'] }}-markdown'
                                            ? 'bg-emerald-600 text-white border-emerald-600 shadow-2xs'
                                            : 'bg-slate-900 hover:bg-slate-800 text-white border-slate-900 shadow-2xs'"
                                        title="Salin Tag Markdown Soal">
                                    <template x-if="copiedPath === '{{ $item['path'] }}-markdown'">
                                        <span class="inline-flex items-center gap-0.5 truncate">
                                            <x-radix-icon name="check" class="w-3 h-3 shrink-0" />
                                            <span class="truncate">Tersalin</span>
                                        </span>
                                    </template>
                                    <template x-if="copiedPath !== '{{ $item['path'] }}-markdown'">
                                        <span class="inline-flex items-center gap-0.5 truncate">
                                            <x-radix-icon name="clipboard-copy" class="w-3 h-3 shrink-0" />
                                            <span class="truncate">Markdown</span>
                                        </span>
                                    </template>
                                </button>

                                <!-- Salin URL -->
                                <button type="button"
                                        @click="copyToClipboard({{ json_encode($item['url']) }}, '{{ $item['path'] }}', 'url')"
                                        class="flex-1 min-w-0 inline-flex items-center justify-center gap-1 px-1.5 py-1.5 bg-slate-50 hover:bg-slate-100 text-slate-700 hover:text-slate-900 border border-slate-200/80 rounded-lg text-[10px] font-bold transition-colors cursor-pointer active:scale-[0.98]"
                                        :class="copiedPath === '{{ $item['path'] }}-url' ? 'bg-emerald-50 text-emerald-800 border-emerald-300' : ''"
                                        title="Salin Alamat URL Berkas">
                                    <x-radix-icon name="link-2" class="w-3 h-3 shrink-0 text-slate-400" />
                                    <span class="truncate" x-text="copiedPath === '{{ $item['path'] }}-url' ? 'Tersalin' : 'URL'"></span>
                                </button>

                                <!-- Hapus Berkas -->
                                <form method="POST" action="{{ route('media.gallery.delete') }}"
                                      class="shrink-0"
                                      onsubmit="return confirm('Hapus media ini dari Cloudflare R2? Berkas yang telah ditautkan ke soal akan hilang.');">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" name="path" value="{{ $item['path'] }}">
                                    <button type="submit" title="Hapus Berkas dari R2"
                                            class="p-1.5 text-slate-400 hover:text-rose-600 hover:bg-rose-50 rounded-lg transition-colors cursor-pointer border border-transparent hover:border-rose-200 flex items-center justify-center">
                                        <x-radix-icon name="trash" class="w-3.5 h-3.5" />
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

        <!-- Machined Precision Zoom Modal -->
        <div x-show="previewModal" x-cloak
             class="fixed inset-0 z-50 overflow-y-auto bg-slate-950/80 backdrop-blur-sm flex items-center justify-center p-3 sm:p-4"
             @keydown.escape.window="previewModal = false">
            <div class="bg-white rounded-2xl max-w-2xl w-full p-5 shadow-2xl relative space-y-4 border border-slate-200" @click.away="previewModal = false">
                <!-- Modal Header -->
                <div class="flex items-center justify-between border-b border-slate-100 pb-3">
                    <div class="min-w-0 pr-3">
                        <h3 class="text-xs font-bold text-slate-900 truncate font-mono" x-text="previewName"></h3>
                        <div class="flex items-center gap-2 font-mono text-[10px] text-slate-400 mt-0.5">
                            <span x-text="previewSize"></span>
                            <span>•</span>
                            <span x-text="previewDate"></span>
                        </div>
                    </div>
                    <button type="button" @click="previewModal = false" class="p-1 rounded-lg text-slate-400 hover:text-slate-800 hover:bg-slate-100 transition-colors cursor-pointer">
                        <x-radix-icon name="cross-2" class="w-4 h-4" />
                    </button>
                </div>

                <!-- Preview Viewport -->
                <div class="flex items-center justify-center max-h-[60vh] overflow-hidden bg-slate-50 rounded-xl p-2 border border-slate-100">
                    <template x-if="previewIsImage">
                        <img :src="previewUrl" :alt="previewName" class="max-h-[55vh] max-w-full object-contain rounded-lg">
                    </template>
                    <template x-if="previewIsVideo">
                        <video :src="previewUrl" controls class="max-h-[55vh] max-w-full rounded-lg"></video>
                    </template>
                    <template x-if="previewIsAudio">
                        <div class="p-6 text-center space-y-3 w-full">
                            <x-radix-icon name="speaker-loud" class="w-12 h-12 mx-auto text-amber-500" />
                            <audio :src="previewUrl" controls class="w-full"></audio>
                        </div>
                    </template>
                </div>

                <!-- Modal Footer -->
                <div class="flex items-center justify-between pt-1">
                    <a :href="previewUrl" target="_blank" class="inline-flex items-center gap-1.5 text-xs font-semibold text-slate-600 hover:text-slate-900 transition-colors">
                        <x-radix-icon name="external-link" class="w-3.5 h-3.5" />
                        <span>Buka URL Asli</span>
                    </a>
                    <button type="button" @click="copyToClipboard('![' + previewName + '](' + previewUrl + ')', previewName, 'markdown')"
                            class="inline-flex items-center gap-1.5 px-3.5 py-1.5 bg-slate-900 text-white rounded-lg text-xs font-semibold hover:bg-slate-800 transition-colors shadow-xs cursor-pointer active:scale-[0.98]">
                        <x-radix-icon name="clipboard-copy" class="w-3.5 h-3.5" />
                        <span>Salin Markdown Soal</span>
                    </button>
                </div>
            </div>
        </div>

    </div>
</x-layouts.app>
