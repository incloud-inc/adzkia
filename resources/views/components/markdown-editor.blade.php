@props(['model', 'size' => 'big', 'placeholder' => 'Ketik di sini...', 'minHeight' => '60px'])

@php
    // Memisahkan target object dan property name (misal: "item.prompt" -> obj="item", field="prompt")
    $parts = explode('.', $model);
    $field = array_pop($parts);
    $obj = implode('.', $parts);
    if (empty($obj)) {
        // Fallback jika tidak ada object (misal model="description")
        $obj = '$data';
    }
@endphp

<div class="border border-slate-300 rounded-lg bg-white overflow-hidden focus-within:border-slate-400 focus-within:ring-1 focus-within:ring-slate-400 shadow-sm transition-all flex flex-col editor-container">
    @if($size === 'big')
        <!-- Formatting Toolbar BIG (Utama) -->
        <div class="flex flex-wrap items-center gap-1 bg-slate-50/80 px-3 py-2 border-b border-slate-200">
            <button type="button" @mousedown.prevent="" @click="applyTextFormat($event.currentTarget.closest('.editor-container').querySelector('textarea'), {{ $obj }}, '{{ $field }}', '# ', '\n', true)" class="px-2 py-1 rounded hover:bg-slate-200 text-sm font-medium text-slate-700 transition-colors" title="Judul Utama (H1)">H1</button>
            <button type="button" @mousedown.prevent="" @click="applyTextFormat($event.currentTarget.closest('.editor-container').querySelector('textarea'), {{ $obj }}, '{{ $field }}', '## ', '\n', true)" class="px-2 py-1 rounded hover:bg-slate-200 text-sm font-medium text-slate-700 transition-colors" title="Sub Judul (H2)">H2</button>
            <button type="button" @mousedown.prevent="" @click="insertTableFormat($event.currentTarget.closest('.editor-container').querySelector('textarea'), {{ $obj }}, '{{ $field }}')" class="px-2 py-1 rounded hover:bg-slate-200 text-sm font-medium text-slate-700 transition-colors flex items-center gap-1" title="Sisipkan Tabel">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M3 14h18m-9-10v16M4 4h16a1 1 0 011 1v14a1 1 0 01-1 1H4a1 1 0 01-1-1V5a1 1 0 011-1z"/></svg>
            </button>
            <div class="w-px h-5 bg-slate-300 mx-1"></div>
            <button type="button" @mousedown.prevent="" @click="applyTextFormat($event.currentTarget.closest('.editor-container').querySelector('textarea'), {{ $obj }}, '{{ $field }}', '**', '**')" class="px-2 py-1 rounded hover:bg-slate-200 text-sm font-bold text-slate-700 transition-colors" title="Tebal (Bold)">B</button>
            <button type="button" @mousedown.prevent="" @click="applyTextFormat($event.currentTarget.closest('.editor-container').querySelector('textarea'), {{ $obj }}, '{{ $field }}', '*', '*')" class="px-2 py-1 rounded hover:bg-slate-200 text-sm italic font-serif text-slate-700 transition-colors" title="Miring (Italic)">I</button>
            <button type="button" @mousedown.prevent="" @click="applyTextFormat($event.currentTarget.closest('.editor-container').querySelector('textarea'), {{ $obj }}, '{{ $field }}', '<u>', '</u>')" class="px-2 py-1 rounded hover:bg-slate-200 text-sm underline text-slate-700 transition-colors" title="Garis Bawah (Underline)">U</button>
            <div class="w-px h-5 bg-slate-300 mx-1"></div>
            <button type="button" @mousedown.prevent="" @click="applyTextFormat($event.currentTarget.closest('.editor-container').querySelector('textarea'), {{ $obj }}, '{{ $field }}', '$$', '$$')" class="px-2 py-1 rounded hover:bg-slate-200 text-sm font-mono font-bold text-slate-700 transition-colors" title="Rumus Matematika / LaTeX ($$...$$)">Σ</button>
            <button type="button" @mousedown.prevent="" @click="triggerMediaUpload($event.currentTarget.closest('.editor-container').querySelector('textarea'), {{ $obj }}, '{{ $field }}')" class="px-2 py-1 rounded hover:bg-slate-200 text-sm flex items-center justify-center text-slate-700 transition-colors" title="Upload Media (Gambar, Audio, Video)">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
            </button>
        </div>
    @else
        <!-- Formatting Toolbar SMALL (Opsi/Item) -->
        <div class="flex flex-wrap items-center gap-1 bg-slate-50/80 px-2 py-1.5 border-b border-slate-200">
            <button type="button" @mousedown.prevent="" @click="applyTextFormat($event.currentTarget.closest('.editor-container').querySelector('textarea'), {{ $obj }}, '{{ $field }}', '**', '**')" class="px-1.5 py-0.5 rounded hover:bg-slate-200 text-xs font-bold text-slate-700 transition-colors" title="Tebal">B</button>
            <button type="button" @mousedown.prevent="" @click="applyTextFormat($event.currentTarget.closest('.editor-container').querySelector('textarea'), {{ $obj }}, '{{ $field }}', '*', '*')" class="px-1.5 py-0.5 rounded hover:bg-slate-200 text-xs italic font-serif text-slate-700 transition-colors" title="Miring">I</button>
            <button type="button" @mousedown.prevent="" @click="applyTextFormat($event.currentTarget.closest('.editor-container').querySelector('textarea'), {{ $obj }}, '{{ $field }}', '<u>', '</u>')" class="px-1.5 py-0.5 rounded hover:bg-slate-200 text-xs underline text-slate-700 transition-colors" title="Garis Bawah">U</button>
            <div class="w-px h-3 bg-slate-300 mx-0.5"></div>
            <button type="button" @mousedown.prevent="" @click="applyTextFormat($event.currentTarget.closest('.editor-container').querySelector('textarea'), {{ $obj }}, '{{ $field }}', '$$', '$$')" class="px-1.5 py-0.5 rounded hover:bg-slate-200 text-xs font-mono font-bold text-slate-700 transition-colors" title="Rumus LaTeX">Σ</button>
        </div>
    @endif

    <textarea 
        x-init="$el.style.height = 'auto'; $el.style.height = $el.scrollHeight + 'px'" 
        @input="$el.style.height = 'auto'; $el.style.height = $el.scrollHeight + 'px'" 
        x-model="{{ $model }}" 
        @select="typeof recordSelection === 'function' ? recordSelection($event.target) : null"
        rows="2" 
        placeholder="{{ $placeholder }}"
        style="min-height: {{ $minHeight }};"
        class="w-full px-3 py-2.5 {{ $size === 'big' ? 'text-sm' : 'text-xs' }} text-slate-700 outline-none resize-none overflow-hidden bg-white border-0 focus:ring-0 m-0"></textarea>
</div>
