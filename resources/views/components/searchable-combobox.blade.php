@props([
    'name',
    'value' => 'all',
    'label' => null,
    'selectedTitle' => null,
    'allLabel' => 'Semua',
    'placeholder' => 'Ketik untuk mencari...',
    'endpoint',
    'extraParams' => [],
    'class' => '',
])

@php
    $initialValue = (string) ($value ?: 'all');
    $initialTitle = $selectedTitle ?: ($initialValue !== 'all' ? '' : $allLabel);
@endphp

<div
    x-data="{
        name: @js($name),
        value: @js($initialValue),
        selectedTitle: @js($initialTitle),
        allLabel: @js($allLabel),
        placeholder: @js($placeholder),
        endpoint: @js($endpoint),
        extraParams: @js($extraParams),
        isOpen: false,
        isLoading: false,
        hasLoaded: false,
        searchQuery: '',
        items: [],
        highlightIndex: -1,

        init() {
            if (!this.selectedTitle && this.value === 'all') {
                this.selectedTitle = this.allLabel;
            }
        },

        toggle() {
            if (this.isOpen) {
                this.close();
            } else {
                this.open();
            }
        },

        open() {
            this.isOpen = true;
            this.highlightIndex = -1;
            if (!this.hasLoaded) {
                this.fetchResults('');
            }
            this.$nextTick(() => {
                if (this.$refs.searchInput) {
                    this.$refs.searchInput.focus();
                }
            });
        },

        close() {
            this.isOpen = false;
            this.highlightIndex = -1;
        },

        async fetchResults(q) {
            this.isLoading = true;
            try {
                let url = new URL(this.endpoint, window.location.origin);
                url.searchParams.set('q', q || '');
                for (const [k, v] of Object.entries(this.extraParams)) {
                    if (v !== undefined && v !== null && v !== '' && v !== 'all') {
                        url.searchParams.set(k, v);
                    }
                }
                const res = await fetch(url.toString(), {
                    headers: {
                        'Accept': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                });
                if (res.ok) {
                    this.items = await res.json();
                    this.hasLoaded = true;
                }
            } catch (err) {
                console.error('Combobox fetch error:', err);
            } finally {
                this.isLoading = false;
            }
        },

        select(item) {
            if (!item || item.id === 'all') {
                this.value = 'all';
                this.selectedTitle = this.allLabel;
            } else {
                this.value = String(item.id);
                this.selectedTitle = item.title;
            }
            this.close();
        },

        clear(event) {
            if (event) event.stopPropagation();
            this.select(null);
        },

        handleKeydown(e) {
            if (!this.isOpen) {
                if (e.key === 'ArrowDown' || e.key === 'Enter') {
                    e.preventDefault();
                    this.open();
                }
                return;
            }

            if (e.key === 'Escape') {
                e.preventDefault();
                this.close();
            } else if (e.key === 'ArrowDown') {
                e.preventDefault();
                if (this.highlightIndex < this.items.length) {
                    this.highlightIndex++;
                }
            } else if (e.key === 'ArrowUp') {
                e.preventDefault();
                if (this.highlightIndex > -1) {
                    this.highlightIndex--;
                }
            } else if (e.key === 'Enter') {
                e.preventDefault();
                if (this.highlightIndex === -1) {
                    this.select(null);
                } else if (this.items[this.highlightIndex]) {
                    this.select(this.items[this.highlightIndex]);
                }
            }
        }
    }"
    class="relative w-full {{ $class }}"
    @click.outside="close()"
    @keydown="handleKeydown($event)"
>
    @if($label)
        <label class="block text-xs font-semibold text-gray-11 mb-1">
            {{ $label }}
        </label>
    @endif

    <!-- Hidden input submitted with the form -->
    <input type="hidden" :name="name" :value="value">

    <!-- Trigger Button -->
    <div
        @click="toggle()"
        class="w-full text-xs rounded-xl border border-gray-7 bg-white px-3 py-2 flex items-center justify-between gap-1.5 cursor-pointer hover:border-gray-8 transition-colors select-none focus:outline-none focus:ring-1 focus:ring-green-8 focus:border-green-8"
        :class="isOpen ? 'border-green-8 ring-1 ring-green-8' : ''"
        tabindex="0"
    >
        <div class="flex items-center gap-1.5 min-w-0 flex-1">
            <span
                class="truncate text-xs font-medium"
                :class="value !== 'all' && value !== '' ? 'text-gray-12 font-semibold' : 'text-gray-10'"
                x-text="selectedTitle || allLabel"
            ></span>
        </div>

        <div class="flex items-center gap-1 shrink-0 text-gray-8">
            <!-- Clear Button if an item is selected -->
            <button
                type="button"
                x-show="value !== 'all' && value !== ''"
                x-cloak
                @click="clear($event)"
                class="p-0.5 rounded-full hover:bg-gray-3 hover:text-gray-12 transition-colors cursor-pointer"
                title="Hapus pilihan"
            >
                <svg viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5">
                    <path d="M11.7816 4.03157C12.0062 3.80702 12.0062 3.44295 11.7816 3.2184C11.5571 2.99385 11.193 2.99385 10.9685 3.2184L7.50005 6.68682L4.03164 3.2184C3.80708 2.99385 3.44301 2.99385 3.21846 3.2184C2.99391 3.44295 2.99391 3.80702 3.21846 4.03157L6.68688 7.49999L3.21846 10.9684C2.99391 11.193 2.99391 11.557 3.21846 11.7816C3.44301 12.0061 3.80708 12.0061 4.03164 11.7816L7.50005 8.31316L10.9685 11.7816C11.193 12.0061 11.5571 12.0061 11.7816 11.7816C12.0062 11.557 12.0062 11.193 11.7816 10.9684L8.31322 7.49999L11.7816 4.03157Z" fill="currentColor" fill-rule="evenodd" clip-rule="evenodd"></path>
                </svg>
            </button>

            <!-- Dropdown Chevron -->
            <svg viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5 transition-transform duration-150" :class="isOpen ? 'rotate-180' : ''">
                <path d="M4.18179 6.18181C4.35753 6.00608 4.64245 6.00608 4.81819 6.18181L7.49999 8.86362L10.1818 6.18181C10.3575 6.00608 10.6425 6.00608 10.8182 6.18181C10.9939 6.35755 10.9939 6.64247 10.8182 6.81821L7.81819 9.81821C7.73379 9.9026 7.61934 9.95001 7.49999 9.95001C7.38064 9.95001 7.26618 9.9026 7.18179 9.81821L4.18179 6.81821C4.00605 6.64247 4.00605 6.35755 4.18179 6.18181Z" fill="currentColor" fill-rule="evenodd" clip-rule="evenodd"></path>
            </svg>
        </div>
    </div>

    <!-- Dropdown Floating Panel -->
    <div
        x-show="isOpen"
        x-cloak
        x-transition:enter="transition ease-out duration-100"
        x-transition:enter-start="opacity-0 translate-y-1 scale-98"
        x-transition:enter-end="opacity-100 translate-y-0 scale-100"
        x-transition:leave="transition ease-in duration-75"
        x-transition:leave-start="opacity-100 translate-y-0 scale-100"
        x-transition:leave-end="opacity-0 translate-y-1 scale-98"
        class="absolute left-0 right-0 top-full mt-1.5 bg-white border border-gray-6 rounded-2xl shadow-xl z-50 overflow-hidden min-w-[280px]"
    >
        <!-- Search Input Bar with Debounce -->
        <div class="p-2 border-b border-gray-4 bg-gray-1/70">
            <div class="relative">
                <input
                    x-ref="searchInput"
                    type="text"
                    x-model="searchQuery"
                    @input.debounce.250ms="fetchResults($event.target.value)"
                    :placeholder="placeholder"
                    class="w-full text-xs rounded-lg border border-gray-6 bg-white pl-8 pr-7 py-1.5 outline-none focus:border-green-8 text-gray-12"
                >
                <svg viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5 text-gray-8 absolute left-2.5 top-1/2 -translate-y-1/2 pointer-events-none">
                    <path d="M10.0001 6.50005C10.0001 8.43305 8.43305 10.0001 6.50005 10.0001C4.56705 10.0001 3.00005 8.43305 3.00005 6.50005C3.00005 4.56705 4.56705 3.00005 6.50005 3.00005C8.43305 3.00005 10.0001 4.56705 10.0001 6.50005ZM9.49755 10.2046C8.68365 10.7061 7.72625 11.0001 6.50005 11.0001C4.01477 11.0001 2.00005 8.98533 2.00005 6.50005C2.00005 4.01477 4.01477 2.00005 6.50005 2.00005C8.98533 2.00005 11.0001 4.01477 11.0001 6.50005C11.0001 7.72625 10.7061 8.68365 10.2046 9.49755L12.8536 12.1465C13.0489 12.3418 13.0489 12.6583 12.8536 12.8536C12.6583 13.0489 12.3418 13.0489 12.1465 12.8536L9.49755 10.2046Z" fill="currentColor" fill-rule="evenodd" clip-rule="evenodd"></path>
                </svg>

                <!-- Spinner when loading -->
                <div x-show="isLoading" class="absolute right-2.5 top-1/2 -translate-y-1/2">
                    <svg class="animate-spin h-3.5 w-3.5 text-green-9" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Options Container -->
        <div class="max-h-60 overflow-y-auto divide-y divide-gray-3 hide-scrollbar py-1">
            <!-- Option 0: 'Semua' (Reset) -->
            <button
                type="button"
                @click="select(null)"
                class="w-full text-left px-3 py-2 flex items-center justify-between text-xs transition-colors cursor-pointer"
                :class="value === 'all' || value === '' ? 'bg-green-2 text-green-12 font-semibold' : (highlightIndex === -1 ? 'bg-gray-3' : 'hover:bg-gray-3 text-gray-11')"
            >
                <span x-text="allLabel"></span>
                <span x-show="value === 'all' || value === ''" class="text-green-10">✓</span>
            </button>

            <!-- Fetched Items -->
            <template x-for="(item, index) in items" :key="item.id">
                <button
                    type="button"
                    @click="select(item)"
                    class="w-full text-left px-3 py-2 flex items-start justify-between gap-2 text-xs transition-colors cursor-pointer"
                    :class="String(value) === String(item.id) ? 'bg-green-2 text-green-12 font-semibold' : (highlightIndex === index ? 'bg-gray-3' : 'hover:bg-gray-3 text-gray-12')"
                >
                    <div class="min-w-0 flex-1">
                        <div class="truncate font-medium" :class="String(value) === String(item.id) ? 'font-bold' : ''" x-text="item.title"></div>
                        <div x-show="item.subtitle" class="text-[11px] text-gray-10 truncate mt-0.5" x-text="item.subtitle"></div>
                    </div>
                    <div class="flex items-center gap-1.5 shrink-0 pt-0.5">
                        <template x-if="item.badge">
                            <span class="px-1.5 py-0.5 rounded text-[10px] font-bold uppercase tracking-wider"
                                  :class="item.is_inactive ? 'bg-rose-3 text-rose-11' : 'bg-gray-4 text-gray-11'"
                                  x-text="item.badge"></span>
                        </template>
                        <span x-show="String(value) === String(item.id)" class="text-green-10 font-bold">✓</span>
                    </div>
                </button>
            </template>

            <!-- Empty Search State -->
            <div x-show="!isLoading && items.length === 0 && searchQuery !== ''" class="p-4 text-center text-xs text-gray-10">
                <span>Tidak ada data ditemukan untuk "<span class="font-semibold text-gray-12" x-text="searchQuery"></span>"</span>
            </div>

            <!-- Initial Loading Placeholder if items not yet loaded -->
            <div x-show="isLoading && items.length === 0" class="p-4 text-center text-xs text-gray-10">
                <span>Memuat data...</span>
            </div>
        </div>
    </div>
</div>
