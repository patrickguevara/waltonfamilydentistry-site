@props(['title' => null, 'eyebrow' => null, 'intro' => null])

<section {{ $attributes->class('py-16 sm:py-20') }}>
    <div class="mx-auto max-w-7xl px-6 lg:px-12">
        @if($title || $intro || $eyebrow)
            <header class="mb-10 max-w-3xl space-y-3">
                @if($eyebrow)
                    <p class="text-sm uppercase tracking-[0.2em] text-black/60">{{ $eyebrow }}</p>
                @endif
                @if($title)
                    <h2 class="text-3xl font-semibold tracking-tight text-black sm:text-4xl">{{ $title }}</h2>
                @endif
                @if($intro)
                    <p class="text-lg text-black/70">{{ $intro }}</p>
                @endif
            </header>
        @endif
        {{ $slot }}
    </div>
</section>
