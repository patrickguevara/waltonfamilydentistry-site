@props(['class' => ''])

@php
    $text = $label ?? $displayNumber;
    $aria = __('Call :number', ['number' => $displayNumber]);
@endphp

<a
    href="tel:{{ $telNumber }}"
    class="{{ $class }}"
    aria-label="{{ $aria }}"
    data-cta="call"
>
    {{ $text }}
</a>
