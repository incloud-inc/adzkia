<div x-data="mathCheatsheetDrawer()"
     @open-math-cheatsheet.window="openDrawer($event.detail)"
     x-show="isOpen"
     x-cloak
     class="fixed inset-0 z-50 overflow-hidden"
     aria-labelledby="slide-over-title" role="dialog" aria-modal="true">
    
    <!-- Backdrop Blur -->
    <div x-show="isOpen"
         x-transition:enter="ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         class="fixed inset-0 bg-slate-950/60 backdrop-blur-xs transition-opacity"
         @click="closeDrawer()"></div>

    <div class="fixed inset-y-0 right-0 max-w-full flex pl-10">
        <!-- Slide-over Panel -->
        <div x-show="isOpen"
             x-transition:enter="transform transition ease-in-out duration-300"
             x-transition:enter-start="translate-x-full"
             x-transition:enter-end="translate-x-0"
             x-transition:leave="transform transition ease-in-out duration-200"
             x-transition:leave-start="translate-x-0"
             x-transition:leave-end="translate-x-full"
             class="w-screen max-w-lg bg-white shadow-2xl flex flex-col border-l border-slate-200">
            
            <!-- Header -->
            <div class="bg-gradient-to-r from-slate-900 via-slate-800 to-indigo-950 px-6 py-4.5 text-white flex items-center justify-between shrink-0 shadow-md">
                <div class="flex items-center gap-3">
                    <div class="w-9 h-9 rounded-xl bg-emerald-500/20 border border-emerald-400/30 flex items-center justify-center text-emerald-400 font-serif font-bold text-lg shadow-inner">
                        ∑
                    </div>
                    <div>
                        <h3 class="font-display font-bold text-base text-white tracking-tight" id="slide-over-title">
                            Kamus Rumus KaTeX
                        </h3>
                        <p class="text-[11px] text-slate-300">
                            Pintasan Markdown LaTeX Cepat untuk Soal & Pembahasan
                        </p>
                    </div>
                </div>
                <button type="button" @click="closeDrawer()" class="rounded-lg p-1.5 text-slate-400 hover:text-white hover:bg-slate-700/60 transition-colors cursor-pointer">
                    <x-radix-icon name="cross-2" class="w-5 h-5" />
                </button>
            </div>

            <!-- Petunjuk Isolasi Delimiter KaTeX Markdown -->
            <div class="px-5 py-3 bg-slate-50 border-b border-slate-200/80 text-xs text-slate-700 space-y-1.5 shrink-0">
                <div class="flex items-center justify-between">
                    <span class="font-bold text-slate-800 flex items-center gap-1.5">
                        <x-radix-icon name="info-circled" class="w-3.5 h-3.5 text-emerald-600" />
                        Aturan Penulisan Rumus (Strict Delimiter):
                    </span>
                    <span class="text-[10px] px-2 py-0.5 rounded-full bg-emerald-100 text-emerald-800 font-bold border border-emerald-300">
                        KaTeX Ready
                    </span>
                </div>
                <div class="grid grid-cols-2 gap-2 text-[11px]">
                    <div class="p-2 rounded-lg bg-white border border-slate-200 shadow-2xs">
                        <span class="font-bold text-emerald-700 block">Rumus Sebaris (Inline):</span>
                        <code class="text-slate-800 font-mono text-[10.5px]">$x^2 + y^2 = r^2$</code>
                    </div>
                    <div class="p-2 rounded-lg bg-white border border-slate-200 shadow-2xs">
                        <span class="font-bold text-indigo-700 block">Rumus Blok Tengah (Display):</span>
                        <code class="text-slate-800 font-mono text-[10.5px]">$$\frac{a}{b}$$</code>
                    </div>
                </div>
            </div>

            <!-- Search & Filter Bar -->
            <div class="p-4 border-b border-slate-200 space-y-3 bg-white shrink-0">
                <!-- Search Input -->
                <div class="relative">
                    <span class="absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 pointer-events-none">
                        <x-radix-icon name="magnifying-glass" class="w-4 h-4" />
                    </span>
                    <input type="text" 
                           x-model="searchQuery" 
                           placeholder="Cari rumus (misal: pecahan, akar, sigma, sin, matriks)..."
                           class="w-full rounded-xl border border-slate-300 bg-slate-50/50 pl-9 pr-8 py-2 text-xs text-slate-900 placeholder:text-slate-400 focus:bg-white focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 outline-none transition-colors">
                    <button type="button" 
                            x-show="searchQuery" 
                            @click="searchQuery = ''" 
                            class="absolute right-2.5 top-1/2 -translate-y-1/2 text-slate-400 hover:text-slate-600">
                        <x-radix-icon name="cross-2" class="w-3.5 h-3.5" />
                    </button>
                </div>

                <!-- Category Tabs (Horizontal Scroll) -->
                <div class="flex items-center gap-1.5 overflow-x-auto pb-1 scrollbar-none text-xs">
                    <template x-for="cat in categories" :key="cat.id">
                        <button type="button"
                                @click="activeCategory = cat.id"
                                :class="activeCategory === cat.id ? 'bg-emerald-600 text-white font-bold shadow-xs' : 'bg-slate-100 hover:bg-slate-200 text-slate-700 font-medium'"
                                class="px-3 py-1.5 rounded-lg whitespace-nowrap transition-colors cursor-pointer text-[11px] shrink-0"
                                x-text="cat.name">
                        </button>
                    </template>
                </div>
            </div>

            <!-- Formula Grid List -->
            <div class="flex-1 overflow-y-auto p-4 space-y-3 bg-slate-50/60" id="math-cheatsheet-items">
                <template x-if="filteredFormulas.length === 0">
                    <div class="text-center py-12 px-4 space-y-2">
                        <div class="w-12 h-12 rounded-full bg-slate-200 text-slate-500 flex items-center justify-center mx-auto text-xl">
                            🔍
                        </div>
                        <p class="text-xs font-bold text-slate-700">Rumus tidak ditemukan</p>
                        <p class="text-[11px] text-slate-500">Coba gunakan kata kunci lain seperti <em>akar</em>, <em>pangkat</em>, <em>matriks</em>, atau simbol LaTeX.</p>
                    </div>
                </template>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-2.5">
                    <template x-for="item in filteredFormulas" :key="item.id">
                        <div class="rounded-xl border border-slate-200 bg-white p-3 shadow-2xs hover:border-emerald-300 hover:shadow-xs transition-all flex flex-col justify-between group">
                            <div>
                                <div class="flex items-center justify-between mb-1.5">
                                    <span class="text-[10px] font-bold uppercase tracking-wider text-slate-500" x-text="item.category_label"></span>
                                    <span class="text-[10px] font-semibold text-slate-400" x-text="item.name"></span>
                                </div>
                                <!-- Visual KaTeX Render -->
                                <div class="my-2 py-2 px-3 bg-slate-50 rounded-lg flex items-center justify-center min-h-[46px] border border-slate-100 overflow-x-auto text-slate-900 group-hover:bg-emerald-50/40 transition-colors"
                                     x-html="renderKatexPreview(item.code, item.is_display)">
                                </div>
                                <!-- Raw LaTeX Code -->
                                <div class="bg-slate-100/80 rounded px-2 py-1 font-mono text-[10.5px] text-slate-700 select-all truncate border border-slate-200/60"
                                     :title="item.code"
                                     x-text="item.is_display ? '$$' + item.code + '$$' : '$' + item.code + '$'">
                                </div>
                            </div>

                            <!-- Action Buttons -->
                            <div class="flex items-center gap-1.5 mt-3 pt-2 border-t border-slate-100">
                                <button type="button"
                                        @click="copyFormula(item)"
                                        class="flex-1 inline-flex items-center justify-center gap-1 py-1 px-2 rounded-lg bg-slate-100 hover:bg-slate-200 text-slate-700 font-semibold text-[11px] transition-colors cursor-pointer">
                                    <span x-text="copiedId === item.id ? '✓ Tersalin!' : 'Salin'"></span>
                                </button>
                                <button type="button"
                                        @click="insertFormula(item)"
                                        class="flex-1 inline-flex items-center justify-center gap-1 py-1 px-2 rounded-lg bg-emerald-600 hover:bg-emerald-700 text-white font-semibold text-[11px] shadow-2xs transition-colors cursor-pointer">
                                    <span x-text="insertedId === item.id ? '✓ Tersisip!' : '+ Sisipkan'"></span>
                                </button>
                            </div>
                        </div>
                    </template>
                </div>
            </div>

            <!-- Footer -->
            <div class="px-5 py-3 bg-white border-t border-slate-200 text-slate-500 text-[11px] flex items-center justify-between shrink-0">
                <span>Klik <strong>+ Sisipkan</strong> untuk memasukkan rumus ke kursor teks aktif.</span>
                <button type="button" @click="closeDrawer()" class="font-bold text-slate-700 hover:text-slate-900 cursor-pointer">
                    Tutup
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    function mathCheatsheetDrawer() {
        return {
            isOpen: false,
            searchQuery: '',
            activeCategory: 'all',
            activeTarget: null,
            copiedId: null,
            insertedId: null,

            categories: [
                { id: 'all', name: 'Semua' },
                { id: 'dasar', name: 'Dasar (Pecahan & Akar)' },
                { id: 'simbol', name: 'Simbol & Relasi' },
                { id: 'aljabar', name: 'Aljabar & Kalkulus' },
                { id: 'trigonometri', name: 'Trigonometri & Log' },
                { id: 'matriks', name: 'Matriks & Kasus' },
                { id: 'yunani', name: 'Huruf Yunani' },
                { id: 'sains', name: 'Fisika & Kimia' }
            ],

            formulas: [
                // 1. Dasar
                { id: 'frac', category: 'dasar', category_label: 'Dasar', name: 'Pecahan', code: '\\frac{a}{b}', keywords: 'pecahan pembilang penyebut frac fraction' },
                { id: 'dfrac', category: 'dasar', category_label: 'Dasar', name: 'Pecahan Besar', code: '\\dfrac{pembilang}{penyebut}', is_display: true, keywords: 'pecahan dfrac display' },
                { id: 'sqrt', category: 'dasar', category_label: 'Dasar', name: 'Akar Kuadrat', code: '\\sqrt{x}', keywords: 'akar kuadrat square root' },
                { id: 'nroot', category: 'dasar', category_label: 'Dasar', name: 'Akar Derajat-n', code: '\\sqrt[n]{x}', keywords: 'akar derajat pangkat nth root' },
                { id: 'pow', category: 'dasar', category_label: 'Dasar', name: 'Pangkat / Eksponen', code: 'x^{2}', keywords: 'pangkat kuadrat eksponen power square' },
                { id: 'sub', category: 'dasar', category_label: 'Dasar', name: 'Indeks Bawah', code: 'x_{1}', keywords: 'indeks bawah subscript variabel' },
                { id: 'pow_sub', category: 'dasar', category_label: 'Dasar', name: 'Pangkat & Indeks', code: 'x_{i}^{2}', keywords: 'pangkat indeks kombinasi' },
                { id: 'abs', category: 'dasar', category_label: 'Dasar', name: 'Nilai Mutlak', code: '|x - 3|', keywords: 'mutlak absolute modulus garis lurus' },
                { id: 'bracket', category: 'dasar', category_label: 'Dasar', name: 'Kurung Dinamis', code: '\\left( \\frac{a}{b} \\right)', keywords: 'kurung pecahan besar left right' },
                { id: 'abc', category: 'dasar', category_label: 'Dasar', name: 'Rumus Kuadrat / ABC', code: 'x = \\frac{-b \\pm \\sqrt{b^2 - 4ac}}{2a}', is_display: true, keywords: 'rumus abc diskriminan kuadrat persamaan' },

                // 2. Simbol & Relasi
                { id: 'times', category: 'simbol', category_label: 'Simbol', name: 'Perkalian Silang', code: 'a \\times b', keywords: 'kali silang times perkalian' },
                { id: 'cdot', category: 'simbol', category_label: 'Simbol', name: 'Perkalian Titik', code: 'a \\cdot b', keywords: 'kali titik dot cdot perkalian' },
                { id: 'div', category: 'simbol', category_label: 'Simbol', name: 'Pembagian', code: 'a \\div b', keywords: 'bagi titik dua pembagian div' },
                { id: 'pm', category: 'simbol', category_label: 'Simbol', name: 'Plus Minus', code: '\\pm', keywords: 'kurang lebih plus minus pm plus-minus' },
                { id: 'infty', category: 'simbol', category_label: 'Simbol', name: 'Tak Hingga', code: '\\infty', keywords: 'tak hingga infinity tak terbatas' },
                { id: 'deg', category: 'simbol', category_label: 'Simbol', name: 'Derajat Sudut', code: '90^{\\circ}', keywords: 'derajat degree sudut selsius' },
                { id: 'approx', category: 'simbol', category_label: 'Simbol', name: 'Mendekati / Taksiran', code: '\\approx', keywords: 'kira-kira taksiran hampir sama approx' },
                { id: 'neq', category: 'simbol', category_label: 'Simbol', name: 'Tidak Sama Dengan', code: '\\neq', keywords: 'tidak sama bukan different' },
                { id: 'le', category: 'simbol', category_label: 'Simbol', name: 'Kurang Dari / Sama', code: '\\le', keywords: 'lebih kecil sama dengan kurang dari' },
                { id: 'ge', category: 'simbol', category_label: 'Simbol', name: 'Lebih Dari / Sama', code: '\\ge', keywords: 'lebih besar sama dengan' },
                { id: 'in', category: 'simbol', category_label: 'Simbol', name: 'Anggota Himpunan', code: 'x \\in A', keywords: 'anggota elemen himpunan in' },
                { id: 'notin', category: 'simbol', category_label: 'Simbol', name: 'Bukan Anggota', code: 'x \\notin A', keywords: 'bukan anggota not in' },

                // 3. Aljabar & Kalkulus
                { id: 'sum', category: 'aljabar', category_label: 'Aljabar', name: 'Sigma / Penjumlahan', code: '\\sum_{i=1}^{n} x_i', is_display: true, keywords: 'sigma penjumlahan deret total sum' },
                { id: 'prod', category: 'aljabar', category_label: 'Aljabar', name: 'Perkalian Berulang', code: '\\prod_{i=1}^{n} a_i', is_display: true, keywords: 'product pi perkalian berulang deret' },
                { id: 'int', category: 'aljabar', category_label: 'Kalkulus', name: 'Integral Tak Tentu', code: '\\int f(x)\\,dx', keywords: 'integral tak tentu antiderivatif' },
                { id: 'int_def', category: 'aljabar', category_label: 'Kalkulus', name: 'Integral Tentu', code: '\\int_{a}^{b} f(x)\\,dx', is_display: true, keywords: 'integral tentu batas atas bawah luas daerah' },
                { id: 'lim', category: 'aljabar', category_label: 'Kalkulus', name: 'Limit Fungsi', code: '\\lim_{x \\to 0} \\frac{\\sin x}{x} = 1', is_display: true, keywords: 'limit fungsi mendekati nol x to' },
                { id: 'diff', category: 'aljabar', category_label: 'Kalkulus', name: 'Turunan / Diferensial', code: '\\frac{dy}{dx}', keywords: 'turunan diferensial dy dx gradient' },
                { id: 'vec', category: 'aljabar', category_label: 'Aljabar', name: 'Vektor Panah', code: '\\vec{v}', keywords: 'vektor arah panah vector' },

                // 4. Trigonometri & Logaritma
                { id: 'sin', category: 'trigonometri', category_label: 'Trigonometri', name: 'Sinus', code: '\\sin \\theta', keywords: 'sin sinus trigonometri sudut' },
                { id: 'cos', category: 'trigonometri', category_label: 'Trigonometri', name: 'Cosinus', code: '\\cos \\theta', keywords: 'cos cosinus trigonometri' },
                { id: 'tan', category: 'trigonometri', category_label: 'Trigonometri', name: 'Tangen', code: '\\tan \\theta', keywords: 'tan tangen trigonometri' },
                { id: 'angle', category: 'trigonometri', category_label: 'Trigonometri', name: 'Simbol Sudut', code: '\\angle ABC = 60^{\\circ}', keywords: 'sudut segitiga angle' },
                { id: 'log', category: 'trigonometri', category_label: 'Logaritma', name: 'Logaritma Basis-a', code: '\\log_{a}(b)', keywords: 'log logaritma basis basis-10' },
                { id: 'ln', category: 'trigonometri', category_label: 'Logaritma', name: 'Logaritma Natural (ln)', code: '\\ln(x)', keywords: 'ln logaritma natural euler' },

                // 5. Matriks & Kasus
                { id: 'mat2', category: 'matriks', category_label: 'Matriks', name: 'Matriks 2x2', code: '\\begin{pmatrix} a & b \\\\ c & d \\end{pmatrix}', is_display: true, keywords: 'matriks matrix pmatrix 2x2' },
                { id: 'mat3', category: 'matriks', category_label: 'Matriks', name: 'Matriks 3x3', code: '\\begin{pmatrix} a & b & c \\\\ d & e & f \\\\ g & h & i \\end{pmatrix}', is_display: true, keywords: 'matriks matrix 3x3 ordo' },
                { id: 'det', category: 'matriks', category_label: 'Matriks', name: 'Determinan 2x2', code: '\\begin{vmatrix} a & b \\\\ c & d \\end{vmatrix}', is_display: true, keywords: 'determinan matriks vmatrix garis lurus' },
                { id: 'cases', category: 'matriks', category_label: 'Fungsi', name: 'Fungsi Bercabang (Cases)', code: 'f(x) = \\begin{cases} x^2, & \\text{jika } x \\ge 0 \\\\ -x, & \\text{jika } x < 0 \\end{cases}', is_display: true, keywords: 'fungsi bercabang kasus kurung kurawal piecewise' },

                // 6. Huruf Yunani
                { id: 'alpha', category: 'yunani', category_label: 'Yunani', name: 'Alpha (α)', code: '\\alpha', keywords: 'alfa alpha yunani sudut' },
                { id: 'beta', category: 'yunani', category_label: 'Yunani', name: 'Beta (β)', code: '\\beta', keywords: 'beta yunani sudut' },
                { id: 'gamma', category: 'yunani', category_label: 'Yunani', name: 'Gamma (γ, Γ)', code: '\\gamma, \\Gamma', keywords: 'gamma yunani' },
                { id: 'delta', category: 'yunani', category_label: 'Yunani', name: 'Delta (δ, Δ)', code: '\\Delta x', keywords: 'delta selisih perubahan yunani' },
                { id: 'theta', category: 'yunani', category_label: 'Yunani', name: 'Theta (θ)', code: '\\theta', keywords: 'teta theta sudut trigonometri' },
                { id: 'lambda', category: 'yunani', category_label: 'Yunani', name: 'Lambda (λ)', code: '\\lambda', keywords: 'lambda panjang gelombang fisika' },
                { id: 'mu', category: 'yunani', category_label: 'Yunani', name: 'Mu / Mikro (μ)', code: '\\mu', keywords: 'mu mikro gesekan koefisien' },
                { id: 'pi_sym', category: 'yunani', category_label: 'Yunani', name: 'Pi (π)', code: '\\pi \\approx 3{,}14', keywords: 'pi lingkaran konstanta 22/7' },
                { id: 'sigma_sym', category: 'yunani', category_label: 'Yunani', name: 'Sigma (σ, Σ)', code: '\\sigma', keywords: 'sigma standar deviasi' },
                { id: 'omega', category: 'yunani', category_label: 'Yunani', name: 'Omega (ω, Ω)', code: '\\Omega', keywords: 'omega hambatan ohm fisika' },

                // 7. Sains (Fisika & Kimia)
                { id: 'chem_rxn', category: 'sains', category_label: 'Kimia', name: 'Persamaan Reaksi', code: '2\\text{H}_2 + \\text{O}_2 \\rightarrow 2\\text{H}_2\\text{O}', is_display: true, keywords: 'kimia reaksi pembakaran panah senyawa' },
                { id: 'chem_eq', category: 'sains', category_label: 'Kimia', name: 'Kesetimbangan Kimia', code: '\\text{N}_2 + 3\\text{H}_2 \\rightleftharpoons 2\\text{NH}_3', is_display: true, keywords: 'kesetimbangan bolak balik panah ganda' },
                { id: 'phys_emc', category: 'sains', category_label: 'Fisika', name: 'Relativitas Einstein', code: 'E = m \\cdot c^2', keywords: 'einstein energi massa fisika modern' },
                { id: 'phys_gas', category: 'sains', category_label: 'Fisika', name: 'Gas Ideal', code: 'P \\cdot V = n \\cdot R \\cdot T', keywords: 'gas ideal termodinamika tekanan volume' },
                { id: 'phys_ek', category: 'sains', category_label: 'Fisika', name: 'Energi Kinetik', code: 'E_k = \\frac{1}{2} m v^2', keywords: 'energi kinetik kecepatan massa mekanika' }
            ],

            openDrawer(detail) {
                this.activeTarget = detail || null;
                this.isOpen = true;
            },

            closeDrawer() {
                this.isOpen = false;
            },

            get filteredFormulas() {
                const query = this.searchQuery.toLowerCase().trim();
                const cat = this.activeCategory;

                return this.formulas.filter(f => {
                    const matchesCategory = (cat === 'all' || f.category === cat);
                    if (!matchesCategory) return false;

                    if (!query) return true;

                    return f.name.toLowerCase().includes(query) ||
                           f.code.toLowerCase().includes(query) ||
                           (f.keywords && f.keywords.toLowerCase().includes(query));
                });
            },

            renderKatexPreview(code, isDisplay = false) {
                if (window.katex && typeof window.katex.renderToString === 'function') {
                    try {
                        return window.katex.renderToString(code, {
                            displayMode: !!isDisplay,
                            throwOnError: false
                        });
                    } catch (e) {
                        return '<span class="text-rose-500 font-mono text-xs">Error LaTeX</span>';
                    }
                }
                return '<span class="font-mono text-xs font-semibold">' + code + '</span>';
            },

            copyFormula(item) {
                const wrapped = item.is_display ? '$$\n' + item.code + '\n$$' : '$' + item.code + '$';
                if (navigator.clipboard && navigator.clipboard.writeText) {
                    navigator.clipboard.writeText(wrapped);
                } else {
                    const ta = document.createElement('textarea');
                    ta.value = wrapped;
                    document.body.appendChild(ta);
                    ta.select();
                    document.execCommand('copy');
                    document.body.removeChild(ta);
                }

                this.copiedId = item.id;
                setTimeout(() => {
                    if (this.copiedId === item.id) this.copiedId = null;
                }, 2000);
            },

            insertFormula(item) {
                const wrapped = item.is_display ? '\n$$\n' + item.code + '\n$$\n' : '$' + item.code + '$';
                let targetTextarea = this.activeTarget ? this.activeTarget.textarea : null;

                // Fallback: search for currently focused textarea or active modal textarea
                if (!targetTextarea) {
                    const activeEl = document.activeElement;
                    if (activeEl && activeEl.tagName === 'TEXTAREA') {
                        targetTextarea = activeEl;
                    } else {
                        // Cari textarea yang terlihat
                        const visibleTextareas = Array.from(document.querySelectorAll('textarea')).filter(t => t.offsetParent !== null);
                        if (visibleTextareas.length > 0) {
                            targetTextarea = visibleTextareas[visibleTextareas.length - 1];
                        }
                    }
                }

                if (targetTextarea) {
                    const start = targetTextarea.selectionStart !== undefined ? targetTextarea.selectionStart : targetTextarea.value.length;
                    const end = targetTextarea.selectionEnd !== undefined ? targetTextarea.selectionEnd : targetTextarea.value.length;
                    const text = targetTextarea.value || '';

                    targetTextarea.value = text.substring(0, start) + wrapped + text.substring(end);
                    targetTextarea.dispatchEvent(new Event('input', { bubbles: true }));

                    // Trigger Alpine x-model if binding exists
                    if (this.activeTarget && this.activeTarget.obj && this.activeTarget.field) {
                        try {
                            this.activeTarget.obj[this.activeTarget.field] = targetTextarea.value;
                        } catch (e) {}
                    }

                    targetTextarea.focus();
                    const newPos = start + wrapped.length;
                    targetTextarea.setSelectionRange(newPos, newPos);
                } else {
                    // Jika tidak ada textarea terbuka, salin langsung ke clipboard
                    this.copyFormula(item);
                }

                this.insertedId = item.id;
                setTimeout(() => {
                    if (this.insertedId === item.id) this.insertedId = null;
                }, 2000);
            }
        };
    }
</script>
