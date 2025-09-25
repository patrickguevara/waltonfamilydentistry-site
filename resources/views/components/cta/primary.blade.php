@props([
    'href' => config('practice.scheduling_url'),
    'target' => '_blank',
    'rel' => 'noopener',
    'label' => __('Schedule Online'),
    'useModal' => true,
])

<a
    href="{{ $href }}"
    @if($target) target="{{ $target }}" @endif
    @if($rel) rel="{{ $rel }}" @endif
    {{ $attributes->class('inline-flex items-center justify-center rounded-2xl bg-black px-6 py-3 text-base font-semibold text-white transition hover:bg-black/90 focus:outline-none focus:ring-2 focus:ring-black') }}
    data-cta="schedule"
    @if($useModal) data-schedule-trigger="true" @endif
>
    {{ $slot->isEmpty() ? $label : $slot }}
</a>
