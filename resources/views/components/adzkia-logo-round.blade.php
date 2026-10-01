@props([
    'size' => 'w-9 h-9 sm:w-10 sm:h-10',
])

<div {{ $attributes->merge(['class' => "{$size} rounded-full bg-white ring-2 ring-white/80 shadow-xs flex items-center justify-center overflow-hidden shrink-0 select-none"]) }} title="ADZKIA CBT">
    <img src="{{ asset('images/icon-adzkia.png') }}" alt="ADZKIA" class="w-full h-full object-contain">
</div>
