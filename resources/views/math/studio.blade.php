<x-layouts.app :sidebar-open="false">
    <x-slot:title>Kamus Rumus KaTeX & Math Studio - ADZKIA</x-slot:title>

    <style>
        /* Formula Card Math Canvas - ANTI-GEPENG CSS */
        .formula-card-katex {
            min-height: 98px;
            padding: 1.25rem 1rem;
            display: block;
            text-align: center;
            overflow-x: auto;
            overflow-y: visible !important;
            background: radial-gradient(ellipse at center, #ffffff 0%, #f8fafc 100%);
            border-radius: 0.875rem;
            border: 1px solid #e2e8f0;
            box-shadow: inset 0 1px 2px 0 rgba(0, 0, 0, 0.02);
            transition: all 0.2s ease-in-out;
        }
        .formula-card-katex .katex-display {
            margin: 0 auto !important;
            padding: 0.25rem 0 !important;
            text-align: center;
            overflow-x: visible;
            overflow-y: visible !important;
            display: inline-block !important;
            max-width: 100%;
        }
        .formula-card-katex .katex {
            font-size: 1.28rem !important;
            text-rendering: geometricPrecision;
        }

        /* Rendered Output Canvas in Student Exam View */
        #rendered-output-canvas .katex-display {
            margin: 1.25rem 0 !important;
            padding: 0.85rem 1.25rem !important;
            overflow-x: auto;
            overflow-y: visible !important;
            background: #f8fafc;
            border-radius: 0.875rem;
            border: 1px solid #e2e8f0;
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.03);
        }
        #rendered-output-canvas .katex {
            font-size: 1.22rem;
            text-rendering: geometricPrecision;
        }
        #rendered-output-canvas p {
            line-height: 1.8;
            margin-bottom: 0.85rem;
        }
        #rendered-output-canvas h3 {
            font-family: 'Outfit', sans-serif;
            font-weight: 800;
            color: #0f172a;
            margin-top: 0.75rem;
            margin-bottom: 0.65rem;
        }

        /* Smooth Custom Scrollbar */
        .formula-card-katex::-webkit-scrollbar,
        #rendered-output-canvas::-webkit-scrollbar {
            height: 5px;
            width: 5px;
        }
        .formula-card-katex::-webkit-scrollbar-thumb,
        #rendered-output-canvas::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 4px;
        }
        .formula-card-katex::-webkit-scrollbar-thumb:hover,
        #rendered-output-canvas::-webkit-scrollbar-thumb:hover {
            background: #94a3b8;
        }
    </style>

    <div class="space-y-3" x-data="mathStudioPage()" x-init="initStudio()">
        <!-- Header & Action Bar -->
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 pb-2 border-b border-slate-200/80">
            <div>
                <div class="flex items-center gap-2 text-xs font-semibold text-slate-500 mb-0.5">
                    <a href="{{ route('dashboard') }}" class="hover:text-emerald-700 transition-colors">Dashboard</a>
                    <span>/</span>
                    <span class="text-slate-800 font-bold">Kamus Rumus & Studio</span>
                </div>
                <div class="flex items-center gap-2.5">
                    <div class="w-8 h-8 rounded-xl bg-gradient-to-br from-emerald-600 to-teal-700 flex items-center justify-center text-white font-serif font-black text-lg shadow-xs">
                        ∑
                    </div>
                    <h1 class="text-xl sm:text-2xl font-black text-slate-900 tracking-tight font-display">
                        Kamus Rumus KaTeX & Markdown Studio
                    </h1>
                    <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full text-[10.5px] font-extrabold uppercase tracking-wider bg-emerald-50 text-emerald-800 border border-emerald-300">
                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-600"></span>
                        Enterprise
                    </span>
                </div>
                <p class="text-xs text-slate-500 mt-0.5">
                    Pusat referensi formula matematika, sains, dan editor simulasi penulisan soal dengan pratinjau rendering KaTeX real-time.
                </p>
            </div>

            <!-- Quick Action: Copy All & Reset -->
            <div class="flex items-center gap-2 self-start sm:self-auto shrink-0">
                <button type="button" 
                        @click="copyAllEditorContent()"
                        class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white font-bold text-xs shadow-xs transition-all cursor-pointer active:scale-95"
                        title="Salin seluruh teks Markdown dari editor ke clipboard">
                    <x-radix-icon name="clipboard-copy" class="w-3.5 h-3.5 text-emerald-100" />
                    <span x-text="copiedAll ? 'Tersalin!' : 'Salin Markdown Preview'"></span>
                </button>
            </div>
        </div>

        <!-- Mobile & Tablet Segmented View Switcher (< 1024px) -->
        <div class="flex lg:hidden bg-slate-200/80 p-1 rounded-xl shadow-2xs gap-1">
            <button type="button" @click="mobileTab = 'library'" 
                    :class="mobileTab === 'library' ? 'bg-white text-emerald-800 font-bold shadow-xs' : 'text-slate-600 font-semibold'"
                    class="flex-1 py-2 text-xs rounded-lg transition-all flex items-center justify-center gap-1.5 cursor-pointer">
                <span class="font-serif font-bold text-sm">∑</span>
                <span>Pustaka Formula (<span x-text="filteredFormulas.length"></span>)</span>
            </button>
            <button type="button" @click="mobileTab = 'playground'" 
                    :class="mobileTab === 'playground' ? 'bg-white text-emerald-800 font-bold shadow-xs' : 'text-slate-600 font-semibold'"
                    class="flex-1 py-2 text-xs rounded-lg transition-all flex items-center justify-center gap-1.5 cursor-pointer">
                <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                <span>Editor & Live Preview</span>
            </button>
        </div>

        <!-- 2-Sided Main Studio Layout -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-5 items-stretch">
            
            <!-- ========================================================================= -->
            <!-- SISI KIRI: KAMUS RUMUS & SIMBOL (PALETTE) - 5 COLS                        -->
            <!-- ========================================================================= -->
            <div class="lg:col-span-5 bg-white rounded-2xl border border-slate-200/90 shadow-2xs flex flex-col h-[calc(100vh-210px)] min-h-[580px] overflow-hidden"
                 :class="mobileTab === 'library' ? 'flex' : 'hidden lg:flex'">
                
                <!-- Header Panel Kiri -->
                <div class="p-3.5 border-b border-slate-200 bg-slate-50/70 space-y-3 shrink-0">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-2">
                            <span class="text-xs font-bold text-slate-800 uppercase tracking-wider flex items-center gap-1.5">
                                <span class="text-emerald-700 font-serif font-black text-sm">∑</span>
                                <span>Pustaka Formula</span>
                            </span>
                            <span class="text-[11px] font-mono font-bold text-slate-500 bg-white px-2 py-0.5 rounded-full border border-slate-200"
                                  x-text="filteredFormulas.length + ' rumus'"></span>
                        </div>

                        <!-- Column View Switcher: 1 Kolom (Lega) vs 2 Kolom (Grid) -->
                        <div class="flex items-center gap-1 bg-white p-0.5 rounded-lg border border-slate-200 text-xs">
                            <button type="button" @click="cardColumns = 1" 
                                    :class="cardColumns === 1 ? 'bg-slate-900 text-white font-bold shadow-2xs' : 'text-slate-600 hover:text-slate-900'"
                                    class="px-2 py-0.5 rounded text-[10.5px] transition-all flex items-center gap-1 cursor-pointer"
                                    title="Tampilan 1 Kolom Luas & Lega (Bebas Gepeng)">
                                <span>▤ 1 Kolom (Lega)</span>
                            </button>
                            <button type="button" @click="cardColumns = 2" 
                                    :class="cardColumns === 2 ? 'bg-slate-900 text-white font-bold shadow-2xs' : 'text-slate-600 hover:text-slate-900'"
                                    class="px-2 py-0.5 rounded text-[10.5px] transition-all flex items-center gap-1 cursor-pointer"
                                    title="Tampilan 2 Kolom Grid">
                                <span>⊞ 2 Kolom</span>
                            </button>
                        </div>
                    </div>

                    <!-- Search Input -->
                    <div class="relative">
                        <span class="absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 pointer-events-none">
                            <x-radix-icon name="magnifying-glass" class="w-4 h-4" />
                        </span>
                        <input type="text" 
                               x-model="searchQuery" 
                               placeholder="Cari rumus (misal: pecahan, akar, integral, sigma, matriks, limit, reaksi)..."
                               class="w-full rounded-xl border border-slate-300 bg-white pl-9 pr-8 py-2 text-xs text-slate-900 placeholder:text-slate-400 focus:border-emerald-600 focus:ring-2 focus:ring-emerald-500/20 outline-none transition-all shadow-2xs font-sans">
                        <button type="button" 
                                x-show="searchQuery" 
                                @click="searchQuery = ''" 
                                class="absolute right-2.5 top-1/2 -translate-y-1/2 text-slate-400 hover:text-slate-700 cursor-pointer">
                            <x-radix-icon name="cross-2" class="w-3.5 h-3.5" />
                        </button>
                    </div>

                    <!-- Category Pills (Tampil Semua, Wrap ke Baris 2 & 3, Tanpa Scroll Horizontal) -->
                    <div class="flex flex-wrap items-center gap-1.5 pt-0.5 text-xs">
                        <template x-for="cat in categories" :key="cat.id">
                            <button type="button"
                                    @click="activeCategory = cat.id"
                                    :class="activeCategory === cat.id 
                                        ? 'bg-slate-900 text-white font-bold shadow-xs' 
                                        : 'bg-white hover:bg-slate-100 text-slate-700 font-semibold border border-slate-200/80'"
                                    class="px-2.5 py-1 rounded-lg whitespace-nowrap transition-all cursor-pointer text-[11px]"
                                    x-text="cat.name">
                            </button>
                        </template>
                    </div>
                </div>

                <!-- Daftar Kartu Rumus (Scrollable, ANTI-GEPENG) -->
                <div class="flex-1 overflow-y-auto p-3.5 bg-slate-50/50" id="formula-list-container">
                    
                    <template x-if="filteredFormulas.length === 0">
                        <div class="text-center py-20 px-4 space-y-2">
                            <div class="w-10 h-10 rounded-xl bg-slate-200 text-slate-500 flex items-center justify-center mx-auto text-lg shadow-inner">
                                🔍
                            </div>
                            <p class="text-xs font-bold text-slate-800">Rumus Tidak Ditemukan</p>
                            <p class="text-[11px] text-slate-500 max-w-xs mx-auto">
                                Coba kata kunci lain atau pilih kategori "Semua Formula" di atas.
                            </p>
                        </div>
                    </template>

                    <div :class="cardColumns === 1 ? 'grid grid-cols-1 gap-3.5' : 'grid grid-cols-1 sm:grid-cols-2 gap-3'">
                        <template x-for="item in filteredFormulas" :key="item.id">
                            <div class="rounded-xl border border-slate-200/90 bg-white p-3.5 shadow-2xs hover:border-emerald-500/60 hover:shadow-xs transition-all duration-150 flex flex-col justify-between group">
                                <div>
                                    <!-- Header: Badge & Name -->
                                    <div class="flex items-center justify-between gap-1.5 mb-2">
                                        <span class="text-[9.5px] font-mono font-bold uppercase tracking-wider px-2 py-0.5 rounded-md bg-slate-100 text-slate-700 border border-slate-200"
                                              x-text="item.category_label"></span>
                                        <span class="text-xs font-bold text-slate-900 truncate" x-text="item.name"></span>
                                    </div>

                                    <!-- Rendered KaTeX Visual (Lega, Hanya Tampilkan Yang Besar) -->
                                    <div class="my-2 formula-card-katex group-hover:border-emerald-300 text-slate-900"
                                         x-html="renderKatexDirect(item.code)">
                                    </div>
                                </div>

                                <!-- Action Buttons -->
                                <div class="flex items-center gap-1.5 mt-2.5 pt-2 border-t border-slate-100">
                                    <button type="button"
                                            @click="copyFormulaCode(item)"
                                            class="flex-1 inline-flex items-center justify-center gap-1 py-1.5 px-2 rounded-lg bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold text-[11px] transition-colors cursor-pointer active:scale-95"
                                            title="Salin kode LaTeX ke clipboard">
                                        <x-radix-icon name="clipboard-copy" class="w-3.5 h-3.5 text-slate-500 shrink-0" />
                                        <span class="truncate" x-text="copiedId === item.id ? 'Tersalin!' : 'Salin'"></span>
                                    </button>
                                    <button type="button"
                                            @click="insertIntoEditor(item)"
                                            class="flex-1 inline-flex items-center justify-center gap-1 py-1.5 px-2 rounded-lg bg-emerald-600 hover:bg-emerald-700 text-white font-bold text-[11px] shadow-2xs transition-all cursor-pointer active:scale-95"
                                            title="Uji rumus ini langsung ke editor preview di sebelah kanan">
                                        <span class="truncate">Preview</span>
                                    </button>
                                </div>
                            </div>
                        </template>
                    </div>
                </div>

                <!-- Footer Kiri -->
                <div class="px-4 py-2 bg-slate-50 border-t border-slate-200 text-slate-500 text-[11px] flex items-center justify-between shrink-0">
                    <span>💡 Klik <strong>Preview</strong> untuk menguji formula secara instan.</span>
                </div>
            </div>

            <!-- ========================================================================= -->
            <!-- SISI KANAN: EDITOR & LIVE KATEX PREVIEW PLAYGROUND - 7 COLS               -->
            <!-- ========================================================================= -->
            <div class="lg:col-span-7 bg-white rounded-2xl border border-slate-200/90 shadow-2xs flex flex-col h-[calc(100vh-210px)] min-h-[580px] overflow-hidden"
                 :class="mobileTab === 'playground' ? 'flex' : 'hidden lg:flex'">
                
                <!-- Header Panel Kanan: Toolbar & Playground Modes -->
                <div class="p-3.5 border-b border-slate-200 bg-slate-50/70 space-y-2.5 shrink-0">
                    <div class="flex items-center justify-between flex-wrap gap-2">
                        <div class="flex items-center gap-2">
                            <span class="text-xs font-bold text-slate-800 uppercase tracking-wider flex items-center gap-1.5">
                                <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                                <span>Editor & Live Preview</span>
                            </span>
                        </div>

                        <!-- Playground View Modes (Split H vs Split V vs Preview vs Editor) -->
                        <div class="flex items-center gap-1 bg-white p-0.5 rounded-lg border border-slate-200 text-xs">
                            <button type="button" @click="playgroundLayout = 'split-h'" 
                                    :class="playgroundLayout === 'split-h' ? 'bg-slate-900 text-white font-bold shadow-2xs' : 'text-slate-600 hover:text-slate-900'"
                                    class="px-2 py-1 rounded text-[10.5px] transition-all flex items-center gap-1 cursor-pointer"
                                    title="Split Kiri-Kanan (Berdampingan Full Height - Anti Gepeng)">
                                <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="18" height="18" rx="2"/><line x1="12" y1="3" x2="12" y2="21"/></svg>
                                <span class="hidden sm:inline">Split H (Lega)</span>
                            </button>
                            <button type="button" @click="playgroundLayout = 'split-v'" 
                                    :class="playgroundLayout === 'split-v' ? 'bg-slate-900 text-white font-bold shadow-2xs' : 'text-slate-600 hover:text-slate-900'"
                                    class="px-2 py-1 rounded text-[10.5px] transition-all flex items-center gap-1 cursor-pointer"
                                    title="Split Atas-Bawah">
                                <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="18" height="18" rx="2"/><line x1="3" y1="12" x2="21" y2="12"/></svg>
                                <span class="hidden sm:inline">Split V</span>
                            </button>
                            <button type="button" @click="playgroundLayout = 'preview'" 
                                    :class="playgroundLayout === 'preview' ? 'bg-slate-900 text-white font-bold shadow-2xs' : 'text-slate-600 hover:text-slate-900'"
                                    class="px-2 py-1 rounded text-[10.5px] transition-all flex items-center gap-1 cursor-pointer"
                                    title="Fokus Pratinjau Tampilan Siswa (100% Layar)">
                                <x-radix-icon name="eye-open" class="w-3.5 h-3.5" />
                                <span class="hidden sm:inline">Preview</span>
                            </button>
                            <button type="button" @click="playgroundLayout = 'editor'" 
                                    :class="playgroundLayout === 'editor' ? 'bg-slate-900 text-white font-bold shadow-2xs' : 'text-slate-600 hover:text-slate-900'"
                                    class="px-2 py-1 rounded text-[10.5px] transition-all flex items-center gap-1 cursor-pointer"
                                    title="Fokus Penulisan Editor Markdown (100% Layar)">
                                <x-radix-icon name="pencil-1" class="w-3.5 h-3.5" />
                                <span class="hidden sm:inline">Editor</span>
                            </button>
                        </div>
                    </div>

                    <!-- Sub-mode Selector Khusus Mobile & Tablet (< 640px) -->
                    <div class="flex sm:hidden items-center bg-slate-200/90 p-1 rounded-lg text-xs gap-1">
                        <button type="button" @click="playgroundLayout = 'editor'"
                                :class="playgroundLayout === 'editor' ? 'bg-white text-emerald-800 font-bold shadow-xs' : 'text-slate-600'"
                                class="flex-1 py-1.5 text-[11px] rounded transition-all text-center">
                            Tulis Soal
                        </button>
                        <button type="button" @click="playgroundLayout = 'preview'"
                                :class="playgroundLayout === 'preview' ? 'bg-white text-emerald-800 font-bold shadow-xs' : 'text-slate-600'"
                                class="flex-1 py-1.5 text-[11px] rounded transition-all text-center">
                            Hasil Siswa
                        </button>
                        <button type="button" @click="playgroundLayout = 'split-v'"
                                :class="playgroundLayout === 'split-v' ? 'bg-white text-emerald-800 font-bold shadow-xs' : 'text-slate-600'"
                                class="flex-1 py-1.5 text-[11px] rounded transition-all text-center">
                            Split
                        </button>
                    </div>

                    <!-- Template Presets & Fast Formatting Toolbar -->
                    <div class="flex flex-wrap items-center justify-between gap-1.5 pt-1">
                        <!-- Presets -->
                        <div class="flex items-center gap-1 text-xs">
                            <span class="text-[11px] text-slate-400 font-semibold mr-1 hidden sm:inline">Contoh:</span>
                            <button type="button" @click="loadPreset('matematika')" class="px-2 py-0.5 rounded text-[10.5px] font-bold bg-white hover:bg-slate-200 text-slate-700 border border-slate-200 transition-colors cursor-pointer">Matematika</button>
                            <button type="button" @click="loadPreset('fisika')" class="px-2 py-0.5 rounded text-[10.5px] font-bold bg-white hover:bg-slate-200 text-slate-700 border border-slate-200 transition-colors cursor-pointer">Fisika</button>
                            <button type="button" @click="loadPreset('kimia')" class="px-2 py-0.5 rounded text-[10.5px] font-bold bg-white hover:bg-slate-200 text-slate-700 border border-slate-200 transition-colors cursor-pointer">Kimia</button>
                            <button type="button" @click="loadPreset('matriks')" class="px-2 py-0.5 rounded text-[10.5px] font-bold bg-white hover:bg-slate-200 text-slate-700 border border-slate-200 transition-colors cursor-pointer">Matriks</button>
                        </div>

                        <!-- Fast Formatting Toolbar (Gambar 1st, Tabel 2nd, Rumus) -->
                        <div class="flex flex-wrap items-center gap-1 bg-white p-1 rounded-xl border border-slate-200 text-xs">
                            <button type="button" @click="insertMediaPlaceholder()" class="px-1.5 py-0.5 rounded hover:bg-slate-100 text-xs font-bold text-slate-700 transition-colors flex items-center gap-1 cursor-pointer" title="Sisipkan Gambar">
                                <x-radix-icon name="image" class="w-3.5 h-3.5 text-slate-600" />
                                <span class="hidden md:inline">Gambar</span>
                            </button>
                            <button type="button" @click="insertTableTemplate()" class="px-1.5 py-0.5 rounded hover:bg-slate-100 text-xs font-bold text-slate-700 transition-colors flex items-center gap-1 cursor-pointer" title="Sisipkan Tabel">
                                <x-radix-icon name="table" class="w-3.5 h-3.5 text-slate-600" />
                                <span class="hidden md:inline">Tabel</span>
                            </button>
                            <div class="w-px h-3.5 bg-slate-200 mx-0.5"></div>
                            <button type="button" @click="wrapSelection('$', '$')" class="px-2 py-0.5 rounded hover:bg-emerald-50 text-xs font-mono font-bold text-emerald-800 transition-colors cursor-pointer" title="Rumus Sebaris ($...$)">$x$</button>
                            <button type="button" @click="wrapSelection('$$\n', '\n$$')" class="px-2 py-0.5 rounded hover:bg-emerald-50 text-xs font-mono font-bold text-emerald-800 transition-colors cursor-pointer" title="Rumus Blok Tengah ($$...$$)">$$</button>
                            <div class="w-px h-3.5 bg-slate-200 mx-0.5"></div>
                            <button type="button" @click="wrapSelection('**', '**')" class="px-1.5 py-0.5 rounded hover:bg-slate-100 text-xs font-bold text-slate-700 transition-colors cursor-pointer" title="Tebal (Bold)">B</button>
                            <button type="button" @click="wrapSelection('*', '*')" class="px-1.5 py-0.5 rounded hover:bg-slate-100 text-xs italic font-serif text-slate-700 transition-colors cursor-pointer" title="Miring (Italic)">I</button>
                            <button type="button" @click="wrapSelection('$$\\frac{', '}{b}$$')" class="px-1.5 py-0.5 rounded hover:bg-slate-100 text-xs font-serif font-bold text-slate-700 transition-colors cursor-pointer" title="Pecahan">a/b</button>
                            <button type="button" @click="wrapSelection('$\\sqrt{', '}$')" class="px-1.5 py-0.5 rounded hover:bg-slate-100 text-xs font-serif font-bold text-slate-700 transition-colors cursor-pointer" title="Akar">√x</button>
                            <button type="button" @click="wrapSelection('^{', '}')" class="px-1.5 py-0.5 rounded hover:bg-slate-100 text-xs font-serif font-bold text-slate-700 transition-colors cursor-pointer" title="Pangkat">x²</button>
                            <button type="button" @click="wrapSelection('_{', '}')" class="px-1.5 py-0.5 rounded hover:bg-slate-100 text-xs font-serif font-bold text-slate-700 transition-colors cursor-pointer" title="Indeks Bawah">x₁</button>
                            <div class="w-px h-3.5 bg-slate-200 mx-0.5"></div>
                            <button type="button" @click="clearEditor()" class="px-1.5 py-0.5 rounded hover:bg-rose-50 text-[10.5px] font-bold text-rose-600 transition-colors cursor-pointer" title="Bersihkan Teks Editor">
                                Reset
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Split Content Container (Responsive to Playground Layout) -->
                <div class="flex-1 min-h-0 bg-slate-50/30 overflow-hidden"
                     :class="{
                         'flex flex-col': playgroundLayout === 'split-v',
                         'flex flex-col md:flex-row': playgroundLayout === 'split-h',
                         'flex flex-col': playgroundLayout === 'preview' || playgroundLayout === 'editor'
                     }">
                    
                    <!-- Area Teks Editor Markdown -->
                    <div class="relative bg-white flex flex-col transition-all duration-150 min-h-0"
                         :class="{
                             'h-1/2 border-b border-slate-200': playgroundLayout === 'split-v',
                             'w-full md:w-1/2 h-full border-b md:border-b-0 md:border-r border-slate-200': playgroundLayout === 'split-h',
                             'h-full': playgroundLayout === 'editor',
                             'hidden': playgroundLayout === 'preview'
                         }">
                        <div class="px-3 py-1.5 bg-slate-100/70 border-b border-slate-200/80 flex items-center justify-between text-[10.5px] font-bold text-slate-500 shrink-0">
                            <span>Teks Soal / Input Markdown:</span>
                            <span class="font-mono text-[10px]" x-text="editorText.length + ' karakter'"></span>
                        </div>
                        <textarea x-ref="studioTextarea"
                                  x-model="editorText"
                                  @input="handleEditorInput()"
                                  placeholder="Ketik teks soal, narasi wacana, atau sisipkan rumus KaTeX ($...$ atau $$...$$) di sini..."
                                  class="w-full flex-1 p-3.5 text-xs font-mono text-slate-800 bg-white outline-none resize-none overflow-y-auto leading-relaxed border-0 focus:ring-0"></textarea>
                    </div>

                    <!-- Area Hasil Render KaTeX & Markdown (Tampilan Siswa) -->
                    <div class="flex-1 flex flex-col min-h-0 bg-slate-100/30 transition-all duration-150"
                         :class="{
                             'h-1/2': playgroundLayout === 'split-v',
                             'w-full md:w-1/2 h-full': playgroundLayout === 'split-h',
                             'h-full': playgroundLayout === 'preview',
                             'hidden': playgroundLayout === 'editor'
                         }">
                        <div class="px-3 py-1.5 bg-slate-100/90 border-b border-slate-200 flex items-center justify-between text-[11px] font-bold text-slate-700 shrink-0">
                            <div class="flex items-center gap-1.5">
                                <span class="w-2 h-2 rounded-full bg-emerald-600"></span>
                                <span>Hasil Tampilan Siswa (KaTeX Rendered):</span>
                            </div>
                            <span class="text-[10px] font-sans font-normal text-slate-500 hidden sm:inline">Tampilan akurat seperti pada lembar ujian siswa</span>
                        </div>

                        <!-- Render Canvas -->
                        <div class="flex-1 overflow-y-auto p-4 sm:p-5 bg-white" id="rendered-output-canvas">
                            <template x-if="!editorText || editorText.trim() === ''">
                                <div class="h-full flex flex-col items-center justify-center text-center p-6 text-slate-400">
                                    <span class="text-3xl mb-2 opacity-50">📝</span>
                                    <p class="text-xs font-bold text-slate-600">Kanvas Preview Masih Kosong</p>
                                    <p class="text-[11px] text-slate-400 max-w-xs mt-1">
                                        Pilih rumus dari pustaka di sisi kiri, klik <strong>Uji di Preview →</strong>, atau ketik langsung di area editor.
                                    </p>
                                </div>
                            </template>

                            <div x-show="editorText && editorText.trim() !== ''"
                                 x-ref="renderedCanvas"
                                 class="prose prose-sm max-w-none text-slate-800 text-xs sm:text-sm leading-relaxed space-y-2 font-sans select-text">
                                <!-- HTML inject directly rendered by marked and KaTeX -->
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Footer Kanan -->
                <div class="px-4 py-2 bg-slate-50 border-t border-slate-200 text-slate-500 text-[11px] flex items-center justify-between shrink-0">
                    <span class="flex items-center gap-1.5">
                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                        <span>KaTeX 0.16 + CommonMark Live Engine</span>
                    </span>
                    <button type="button" 
                            @click="copyAllEditorContent()"
                            class="text-emerald-700 hover:text-emerald-900 font-bold transition-colors cursor-pointer">
                        <span x-text="copiedAll ? '✓ Berhasil Disalin!' : 'Salin Semua Teks'"></span>
                    </button>
                </div>
            </div>

        </div>
    </div>

    <script>
        function mathStudioPage() {
            return {
                mobileTab: 'library',
                playgroundLayout: 'preview',
                cardColumns: 2,
                searchQuery: '',
                activeCategory: 'dasar',
                copiedId: null,
                copiedAll: false,
                editorText: '',
                renderTimeout: null,

                categories: [
                    { id: 'all', name: 'Semua Formula' },
                    { id: 'dasar', name: 'Dasar (Pecahan & Akar)' },
                    { id: 'simbol', name: 'Simbol & Relasi' },
                    { id: 'aljabar', name: 'Aljabar & Kalkulus' },
                    { id: 'trigonometri', name: 'Trigonometri & Log' },
                    { id: 'matriks', name: 'Matriks & Vektor' },
                    { id: 'yunani', name: 'Huruf Yunani' },
                    { id: 'sains', name: 'Fisika & Kimia' }
                ],

                formulas: [
                    // 1. Dasar
                    { id: 'frac', category: 'dasar', category_label: 'Dasar', name: 'Pecahan Biasa', code: '\\frac{a}{b}', keywords: 'pecahan pembilang penyebut frac fraction per bagi' },
                    { id: 'dfrac', category: 'dasar', category_label: 'Dasar', name: 'Pecahan Besar (Display)', code: '\\dfrac{pembilang}{penyebut}', is_display: true, keywords: 'pecahan dfrac display besar' },
                    { id: 'sqrt', category: 'dasar', category_label: 'Dasar', name: 'Akar Kuadrat', code: '\\sqrt{x}', keywords: 'akar kuadrat square root sqrt' },
                    { id: 'nroot', category: 'dasar', category_label: 'Dasar', name: 'Akar Derajat-n', code: '\\sqrt[n]{x}', keywords: 'akar derajat pangkat nth root' },
                    { id: 'pow', category: 'dasar', category_label: 'Dasar', name: 'Pangkat / Eksponen', code: 'x^{2}', keywords: 'pangkat kuadrat eksponen power square superscript' },
                    { id: 'sub', category: 'dasar', category_label: 'Dasar', name: 'Indeks Bawah', code: 'x_{1}', keywords: 'indeks bawah subscript variabel urutan' },
                    { id: 'pow_sub', category: 'dasar', category_label: 'Dasar', name: 'Pangkat & Indeks', code: 'x_{i}^{2}', keywords: 'pangkat indeks kombinasi variabel' },
                    { id: 'abs', category: 'dasar', category_label: 'Dasar', name: 'Nilai Mutlak', code: '|x - 3|', keywords: 'mutlak absolute modulus garis lurus' },
                    { id: 'bracket', category: 'dasar', category_label: 'Dasar', name: 'Kurung Dinamis', code: '\\left( \\frac{a}{b} \\right)', keywords: 'kurung pecahan besar left right kurung dinamis' },
                    { id: 'sbracket', category: 'dasar', category_label: 'Dasar', name: 'Kurung Siku Dinamis', code: '\\left[ \\frac{x}{y} \\right]', keywords: 'kurung siku bracket left right' },
                    { id: 'abc', category: 'dasar', category_label: 'Dasar', name: 'Rumus Kuadrat / ABC', code: 'x = \\frac{-b \\pm \\sqrt{b^2 - 4ac}}{2a}', is_display: true, keywords: 'rumus abc diskriminan kuadrat persamaan kuadratik' },

                    // 2. Simbol & Relasi
                    { id: 'times', category: 'simbol', category_label: 'Simbol', name: 'Perkalian Silang', code: 'a \\times b', keywords: 'kali silang times perkalian perbanyakan' },
                    { id: 'cdot', category: 'simbol', category_label: 'Simbol', name: 'Perkalian Titik', code: 'a \\cdot b', keywords: 'kali titik dot cdot perkalian dot product' },
                    { id: 'div', category: 'simbol', category_label: 'Simbol', name: 'Pembagian', code: 'a \\div b', keywords: 'bagi titik dua pembagian div' },
                    { id: 'pm', category: 'simbol', category_label: 'Simbol', name: 'Plus Minus', code: '\\pm', keywords: 'kurang lebih plus minus pm plus-minus toleransi' },
                    { id: 'mp', category: 'simbol', category_label: 'Simbol', name: 'Minus Plus', code: '\\mp', keywords: 'minus plus minus-plus' },
                    { id: 'infty', category: 'simbol', category_label: 'Simbol', name: 'Tak Hingga', code: '\\infty', keywords: 'tak hingga infinity tak terbatas' },
                    { id: 'deg', category: 'simbol', category_label: 'Simbol', name: 'Derajat Sudut', code: '90^{\\circ}', keywords: 'derajat degree sudut selsius circ' },
                    { id: 'approx', category: 'simbol', category_label: 'Simbol', name: 'Mendekati / Taksiran', code: '\\approx', keywords: 'kira-kira taksiran hampir sama approx kongruen' },
                    { id: 'neq', category: 'simbol', category_label: 'Simbol', name: 'Tidak Sama Dengan', code: '\\neq', keywords: 'tidak sama bukan different neq' },
                    { id: 'le', category: 'simbol', category_label: 'Simbol', name: 'Kurang Dari / Sama', code: '\\le', keywords: 'lebih kecil sama dengan kurang dari le' },
                    { id: 'ge', category: 'simbol', category_label: 'Simbol', name: 'Lebih Dari / Sama', code: '\\ge', keywords: 'lebih besar sama dengan ge' },
                    { id: 'in', category: 'simbol', category_label: 'Simbol', name: 'Anggota Himpunan', code: 'x \\in A', keywords: 'anggota elemen himpunan in' },
                    { id: 'notin', category: 'simbol', category_label: 'Simbol', name: 'Bukan Anggota', code: 'x \\notin A', keywords: 'bukan anggota not in himpunan' },
                    { id: 'subset', category: 'simbol', category_label: 'Simbol', name: 'Himpunan Bagian', code: 'A \\subset B', keywords: 'himpunan bagian subset subseteq' },

                    // 3. Aljabar & Kalkulus
                    { id: 'sum', category: 'aljabar', category_label: 'Aljabar', name: 'Sigma / Penjumlahan', code: '\\sum_{i=1}^{n} x_i', is_display: true, keywords: 'sigma penjumlahan deret total sum sigma notation' },
                    { id: 'prod', category: 'aljabar', category_label: 'Aljabar', name: 'Perkalian Berulang', code: '\\prod_{i=1}^{n} a_i', is_display: true, keywords: 'product pi perkalian berulang deret prod' },
                    { id: 'int', category: 'aljabar', category_label: 'Kalkulus', name: 'Integral Tak Tentu', code: '\\int f(x)\\,dx', keywords: 'integral tak tentu antiderivatif kalkulus' },
                    { id: 'int_def', category: 'aljabar', category_label: 'Kalkulus', name: 'Integral Tentu', code: '\\int_{a}^{b} f(x)\\,dx', is_display: true, keywords: 'integral tentu batas atas bawah luas daerah kalkulus' },
                    { id: 'lim', category: 'aljabar', category_label: 'Kalkulus', name: 'Limit Fungsi', code: '\\lim_{x \\to 0} \\frac{\\sin x}{x} = 1', is_display: true, keywords: 'limit fungsi mendekati nol x to kekontinuan' },
                    { id: 'diff', category: 'aljabar', category_label: 'Kalkulus', name: 'Turunan / Diferensial', code: '\\frac{dy}{dx}', keywords: 'turunan diferensial dy dx gradient gradien derivative' },
                    { id: 'diff2', category: 'aljabar', category_label: 'Kalkulus', name: 'Turunan Kedua', code: '\\frac{d^2y}{dx^2}', keywords: 'turunan kedua diferensial tingkat tinggi' },

                    // 4. Trigonometri & Logaritma
                    { id: 'sin', category: 'trigonometri', category_label: 'Trigonometri', name: 'Sinus', code: '\\sin \\theta', keywords: 'sin sinus trigonometri sudut' },
                    { id: 'cos', category: 'trigonometri', category_label: 'Trigonometri', name: 'Cosinus', code: '\\cos \\theta', keywords: 'cos cosinus trigonometri sudut' },
                    { id: 'tan', category: 'trigonometri', category_label: 'Trigonometri', name: 'Tangen', code: '\\tan \\theta', keywords: 'tan tangen trigonometri kemiringan' },
                    { id: 'angle', category: 'trigonometri', category_label: 'Trigonometri', name: 'Simbol Sudut', code: '\\angle ABC = 60^{\\circ}', keywords: 'sudut segitiga angle geometri' },
                    { id: 'log', category: 'trigonometri', category_label: 'Logaritma', name: 'Logaritma Basis-a', code: '\\log_{a}(b)', keywords: 'log logaritma basis basis-10 eksponensial' },
                    { id: 'ln', category: 'trigonometri', category_label: 'Logaritma', name: 'Logaritma Natural (ln)', code: '\\ln(x)', keywords: 'ln logaritma natural euler basis e' },

                    // 5. Matriks & Vektor
                    { id: 'mat2', category: 'matriks', category_label: 'Matriks', name: 'Matriks 2x2', code: '\\begin{pmatrix} a & b \\\\ c & d \\end{pmatrix}', is_display: true, keywords: 'matriks matrix pmatrix 2x2 aljabar linear' },
                    { id: 'mat3', category: 'matriks', category_label: 'Matriks', name: 'Matriks 3x3', code: '\\begin{pmatrix} a & b & c \\\\ d & e & f \\\\ g & h & i \\end{pmatrix}', is_display: true, keywords: 'matriks matrix 3x3 ordo determinan transformasi' },
                    { id: 'det', category: 'matriks', category_label: 'Matriks', name: 'Determinan 2x2', code: '\\begin{vmatrix} a & b \\\\ c & d \\end{vmatrix}', is_display: true, keywords: 'determinan matriks vmatrix garis lurus determinant' },
                    { id: 'vec', category: 'matriks', category_label: 'Vektor', name: 'Vektor Panah', code: '\\vec{v} = \\begin{pmatrix} x \\\\ y \\end{pmatrix}', is_display: true, keywords: 'vektor arah panah vector komponen' },
                    { id: 'cases', category: 'matriks', category_label: 'Fungsi', name: 'Fungsi Bercabang (Cases)', code: 'f(x) = \\begin{cases} x^2, & \\text{jika } x \\ge 0 \\\\ -x, & \\text{jika } x < 0 \\end{cases}', is_display: true, keywords: 'fungsi bercabang kasus kurung kurawal piecewise piecewise function' },

                    // 6. Huruf Yunani
                    { id: 'alpha', category: 'yunani', category_label: 'Yunani', name: 'Alpha (α)', code: '\\alpha', keywords: 'alfa alpha yunani sudut koefisien' },
                    { id: 'beta', category: 'yunani', category_label: 'Yunani', name: 'Beta (β)', code: '\\beta', keywords: 'beta yunani sudut partikel' },
                    { id: 'gamma', category: 'yunani', category_label: 'Yunani', name: 'Gamma (γ, Γ)', code: '\\gamma, \\Gamma', keywords: 'gamma yunani radiasi' },
                    { id: 'delta', category: 'yunani', category_label: 'Yunani', name: 'Delta (δ, Δ)', code: '\\Delta x', keywords: 'delta selisih perubahan yunani diskriminan' },
                    { id: 'theta', category: 'yunani', category_label: 'Yunani', name: 'Theta (θ)', code: '\\theta', keywords: 'teta theta sudut trigonometri fase' },
                    { id: 'lambda', category: 'yunani', category_label: 'Yunani', name: 'Lambda (λ)', code: '\\lambda', keywords: 'lambda panjang gelombang fisika nilai eigen' },
                    { id: 'mu', category: 'yunani', category_label: 'Yunani', name: 'Mu / Mikro (μ)', code: '\\mu', keywords: 'mu mikro gesekan koefisien mikron rata-rata' },
                    { id: 'pi_sym', category: 'yunani', category_label: 'Yunani', name: 'Pi (π)', code: '\\pi \\approx 3{,}14', keywords: 'pi lingkaran konstanta 22/7 radian' },
                    { id: 'sigma_sym', category: 'yunani', category_label: 'Yunani', name: 'Sigma (σ, Σ)', code: '\\sigma', keywords: 'sigma standar deviasi tegangan' },
                    { id: 'omega', category: 'yunani', category_label: 'Yunani', name: 'Omega (ω, Ω)', code: '\\Omega, \\omega', keywords: 'omega hambatan ohm fisika frekuensi sudut' },

                    // 7. Sains (Fisika & Kimia)
                    { id: 'chem_rxn', category: 'sains', category_label: 'Kimia', name: 'Persamaan Reaksi', code: '2\\text{H}_2 + \\text{O}_2 \\rightarrow 2\\text{H}_2\\text{O}', is_display: true, keywords: 'kimia reaksi pembakaran panah senyawa stoikiometri' },
                    { id: 'chem_eq', category: 'sains', category_label: 'Kimia', name: 'Kesetimbangan Kimia', code: '\\text{N}_2 + 3\\text{H}_2 \\rightleftharpoons 2\\text{NH}_3', is_display: true, keywords: 'kesetimbangan bolak balik panah ganda habers-bosch' },
                    { id: 'phys_emc', category: 'sains', category_label: 'Fisika', name: 'Relativitas Einstein', code: 'E = m \\cdot c^2', keywords: 'einstein energi massa fisika modern' },
                    { id: 'phys_gas', category: 'sains', category_label: 'Fisika', name: 'Gas Ideal', code: 'P \\cdot V = n \\cdot R \\cdot T', keywords: 'gas ideal termodinamika tekanan volume' },
                    { id: 'phys_ek', category: 'sains', category_label: 'Fisika', name: 'Energi Kinetik', code: 'E_k = \\frac{1}{2} m v^2', keywords: 'energi kinetik kecepatan massa mekanika' },
                    { id: 'phys_ep', category: 'sains', category_label: 'Fisika', name: 'Energi Potensial', code: 'E_p = m \\cdot g \\cdot h', keywords: 'energi potensial gravitasi ketinggian' }
                ],

                initStudio() {
                    this.sidebarOpen = false;
                    this.loadPreset('matematika');
                    this.$nextTick(() => {
                        this.renderOutput();
                    });
                },

                get filteredFormulas() {
                    const q = this.searchQuery.toLowerCase().trim();
                    const cat = this.activeCategory;

                    return this.formulas.filter(f => {
                        const matchesCategory = (cat === 'all' || f.category === cat);
                        if (!matchesCategory) return false;

                        if (!q) return true;

                        return f.name.toLowerCase().includes(q) ||
                               f.code.toLowerCase().includes(q) ||
                               (f.keywords && f.keywords.toLowerCase().includes(q));
                    });
                },

                renderKatexDirect(code) {
                    if (window.katex && typeof window.katex.renderToString === 'function') {
                        try {
                            let formula = code;
                            if (!formula.startsWith('\\begin') && !formula.startsWith('\\displaystyle')) {
                                formula = '\\displaystyle ' + formula;
                            }
                            return window.katex.renderToString(formula, {
                                displayMode: true,
                                throwOnError: false
                            });
                        } catch (e) {
                            return '<span class="text-rose-500 font-mono text-xs">Error LaTeX</span>';
                        }
                    }
                    return '<span class="font-mono text-sm font-semibold">' + code + '</span>';
                },

                copyFormulaCode(item) {
                    const wrapped = item.is_display ? '$$\n' + item.code + '\n$$' : '$' + item.code + '$';
                    navigator.clipboard.writeText(wrapped).then(() => {
                        this.copiedId = item.id;
                        setTimeout(() => {
                            if (this.copiedId === item.id) this.copiedId = null;
                        }, 2000);
                    });
                },

                insertIntoEditor(item) {
                    const wrapped = item.is_display ? '\n\n$$\n' + item.code + '\n$$\n\n' : ' $' + item.code + '$ ';
                    const ta = this.$refs.studioTextarea;
                    
                    if (ta) {
                        const start = ta.selectionStart !== undefined ? ta.selectionStart : ta.value.length;
                        const end = ta.selectionEnd !== undefined ? ta.selectionEnd : ta.value.length;
                        const val = this.editorText || '';

                        this.editorText = val.substring(0, start) + wrapped + val.substring(end);
                        
                        this.$nextTick(() => {
                            ta.focus();
                            const newPos = start + wrapped.length;
                            ta.setSelectionRange(newPos, newPos);
                            this.renderOutput();
                        });
                    } else {
                        this.editorText += wrapped;
                        this.renderOutput();
                    }

                    // On mobile & tablet, automatically switch to playground tab and show student preview
                    if (window.innerWidth < 1024) {
                        this.mobileTab = 'playground';
                        this.playgroundLayout = 'preview';
                    }
                },

                wrapSelection(before, after) {
                    const ta = this.$refs.studioTextarea;
                    if (!ta) return;

                    const start = ta.selectionStart;
                    const end = ta.selectionEnd;
                    const val = this.editorText || '';
                    const selected = val.substring(start, end);

                    const replacement = before + (selected || '...') + after;
                    this.editorText = val.substring(0, start) + replacement + val.substring(end);

                    this.$nextTick(() => {
                        ta.focus();
                        const cursorStart = start + before.length;
                        const cursorEnd = cursorStart + (selected ? selected.length : 3);
                        ta.setSelectionRange(cursorStart, cursorEnd);
                        this.renderOutput();
                    });
                },

                insertMediaPlaceholder() {
                    this.wrapSelection('![Keterangan Gambar](', ')');
                },

                insertTableTemplate() {
                    const tableMd = "\n\n| Kolom 1 | Kolom 2 | Kolom 3 |\n| :--- | :---: | ---: |\n| Data A | Data B | Data C |\n| Data D | Data E | Data F |\n\n";
                    const ta = this.$refs.studioTextarea;
                    if (ta) {
                        const start = ta.selectionStart !== undefined ? ta.selectionStart : ta.value.length;
                        const val = this.editorText || '';
                        this.editorText = val.substring(0, start) + tableMd + val.substring(start);
                        this.$nextTick(() => {
                            ta.focus();
                            this.renderOutput();
                        });
                    } else {
                        this.editorText += tableMd;
                        this.renderOutput();
                    }
                },

                handleEditorInput() {
                    clearTimeout(this.renderTimeout);
                    this.renderTimeout = setTimeout(() => {
                        this.renderOutput();
                    }, 60);
                },

                renderOutput() {
                    const canvas = this.$refs.renderedCanvas;
                    if (!canvas) return;

                    if (!this.editorText || this.editorText.trim() === '') {
                        canvas.innerHTML = '';
                        return;
                    }

                    // 1. Convert Markdown to HTML using marked.js
                    let rawHtml = '';
                    if (window.marked && typeof window.marked.parse === 'function') {
                        rawHtml = window.marked.parse(this.editorText);
                    } else {
                        rawHtml = this.editorText.replace(/\n/g, '<br>');
                    }

                    canvas.innerHTML = rawHtml;

                    // 2. Trigger KaTeX rendering on the canvas element
                    this.$nextTick(() => {
                        if (window.triggerKaTeX) {
                            window.triggerKaTeX(canvas);
                        } else if (window.renderMathInElement) {
                            window.renderMathInElement(canvas, {
                                delimiters: [
                                    {left: '$$', right: '$$', display: true},
                                    {left: '$', right: '$', display: false},
                                    {left: '\\(', right: '\\)', display: false},
                                    {left: '\\[', right: '\\]', display: true}
                                ],
                                throwOnError: false
                            });
                        }
                    });
                },

                loadPreset(type) {
                    switch (type) {
                        case 'matematika':
                            this.editorText = `### Soal 1: Persamaan Kuadrat & Aljabar

Diberikan sebuah fungsi kuadrat $f(x) = ax^2 + bx + c$ dengan diskriminan $D = b^2 - 4ac$.

Jika akar-akar persamaan tersebut adalah $x_1$ dan $x_2$, carilah nilai dari:

$$x = \\frac{-b \\pm \\sqrt{b^2 - 4ac}}{2a}$$

**Pertanyaan:**
Tentukan nilai $x$ ketika $a = 1$, $b = -5$, dan $c = 6$!`;
                            break;

                        case 'fisika':
                            this.editorText = `### Soal Fisika: Dinamika & Energi Kinetik

Sebuah benda dengan massa $m = 2\\text{ kg}$ bergerak dengan kecepatan konstan $v = 10\\text{ m/s}$.

Energi kinetik benda tersebut dirumuskan sebagai:

$$E_k = \\frac{1}{2} m v^2$$

Besarnya percepatan gravitasi bumi adalah $g = 9{,}8\\text{ m/s}^2$. Hitunglah energi potensial gravitasi pada ketinggian $h = 5\\text{ meter}$:

$$E_p = m \\cdot g \\cdot h$$`;
                            break;

                        case 'kimia':
                            this.editorText = `### Soal Kimia: Stoikiometri & Kesetimbangan

Reaksi pembakaran gas hidrogen dengan oksigen menghasilkan uap air:

$$2\\text{H}_2\\text{(g)} + \\text{O}_2\\text{(g)} \\longrightarrow 2\\text{H}_2\\text{O}\\text{(g)}$$

Pada proses Haber-Bosch untuk sintesis amonia, reaksinya bersifat bolak-balik:

$$\\text{N}_2\\text{(g)} + 3\\text{H}_2\\text{(g)} \\rightleftharpoons 2\\text{NH}_3\\text{(g)}, \\quad \\Delta H = -92{,}4\\text{ kJ}$$`;
                            break;

                        case 'matriks':
                            this.editorText = `### Soal Aljabar Linear: Matriks & Determinan

Diketahui matriks persegi $A$ berordo $2 \\times 2$:

$$A = \\begin{pmatrix} 4 & 2 \\\\ 1 & 3 \\end{pmatrix}$$

Nilai determinan matriks $A$ dapat dihitung dengan rumus:

$$\\det(A) = \\begin{vmatrix} 4 & 2 \\\\ 1 & 3 \\end{vmatrix} = (4 \\times 3) - (2 \\times 1) = 10$$`;
                            break;
                    }

                    this.$nextTick(() => {
                        this.renderOutput();
                    });
                },

                copyAllEditorContent() {
                    if (!this.editorText) return;
                    navigator.clipboard.writeText(this.editorText).then(() => {
                        this.copiedAll = true;
                        setTimeout(() => {
                            this.copiedAll = false;
                        }, 2500);
                    });
                },

                clearEditor() {
                    if (confirm('Bersihkan isi editor?')) {
                        this.editorText = '';
                        this.renderOutput();
                        if (this.$refs.studioTextarea) {
                            this.$refs.studioTextarea.focus();
                        }
                    }
                }
            };
        }
    </script>
</x-layouts.app>
