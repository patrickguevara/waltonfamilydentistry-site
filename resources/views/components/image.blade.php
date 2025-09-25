@props([
    'src',
    'alt',
    'class' => '',
    'loading' => 'lazy',
    'sizes' => '100vw',
])

@php
    $widths = [640, 1024, 1440, 1792];
    $separator = str_contains($src, '?') ? '&' : '?';
    $srcset = collect($widths)
        ->map(fn ($width) => $src.$separator.'w='.$width.' '.$width.'w')
        ->join(', ');
@endphp

<img
    src="{{ $src }}"
    srcset="{{ $srcset }}"
    sizes="{{ $sizes }}"
    alt="{{ $alt }}"
    loading="{{ $loading }}"
    decoding="async"
    class="{{ trim('h-full w-full object-cover '.$class) }}"
/>
