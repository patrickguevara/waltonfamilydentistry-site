@props([
    'href' => null,
    'label' => __('Call Now'),
])

@if($href)
    <a
        href="{{ $href }}"
        {{ $attributes->class('inline-flex items-center justify-center rounded-2xl border border-black px-6 py-3 text-base font-semibold text-black transition hover:bg-black hover:text-white focus:outline-none focus:ring-2 focus:ring-black') }}
        data-cta="call"
    >
        {{ $slot->isEmpty() ? $label : $slot }}
    </a>
@else
    <x-phone-link
        {{ $attributes->class('inline-flex items-center justify-center rounded-2xl border border-black px-6 py-3 text-base font-semibold text-black transition hover:bg-black hover:text-white focus:outline-none focus:ring-2 focus:ring-black') }}
    >
        {{ $slot->isEmpty() ? $label : $slot }}
    </x-phone-link>
@endif
