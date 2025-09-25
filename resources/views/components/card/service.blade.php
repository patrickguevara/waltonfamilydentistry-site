@props(['service'])

<article class="flex h-full flex-col rounded-3xl border border-black/10 bg-white transition hover:-translate-y-1 hover:shadow-lg focus-within:-translate-y-1 focus-within:shadow-lg">
    <div class="relative aspect-[16/9] overflow-hidden rounded-t-3xl">
        <x-image :src="$service->hero_image_url" :alt="$service->title" loading="lazy" sizes="(min-width: 1024px) 33vw, 100vw" />
    </div>
    <div class="flex flex-1 flex-col gap-3 px-6 py-6">
        <h3 class="text-xl font-semibold text-black">
            <a href="{{ route('services.show', $service->slug) }}" class="focus:outline-none focus-visible:ring-2 focus-visible:ring-black">
                {{ $service->title }}
            </a>
        </h3>
        <p class="text-base text-black/70">{{ $service->excerpt }}</p>
        <div class="mt-auto">
            <a
                href="{{ route('services.show', $service->slug) }}"
                class="inline-flex items-center gap-2 text-sm font-medium uppercase tracking-[0.2em] text-black hover:underline"
            >
                {{ __('Explore Service') }}
                <span aria-hidden="true">→</span>
            </a>
        </div>
    </div>
</article>
