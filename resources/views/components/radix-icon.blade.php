@props(['name', 'class' => 'w-4 h-4 shrink-0'])

@php
    static $radixIcons = null;
    if ($radixIcons === null) {
        $iconPath = resource_path('icons/radix-icons.json');
        $radixIcons = file_exists($iconPath) ? json_decode(file_get_contents($iconPath), true) : [];
    }
    $iconSvg = $radixIcons[$name] ?? null;
@endphp

@if($iconSvg)
    <svg viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg" {{ $attributes->merge(['class' => $class]) }}>
        {!! $iconSvg !!}
    </svg>
@else
    <!-- Icon not found: {{ $name }} -->
@endif
