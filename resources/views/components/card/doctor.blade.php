@props(['doctor'])

<article class="flex h-full flex-col rounded-3xl border border-black/10 bg-white">
    <div class="relative aspect-[4/5] overflow-hidden rounded-t-3xl">
        <x-image :src="$doctor->headshot_url" :alt="$doctor->name" loading="lazy" sizes="(min-width: 1024px) 25vw, 50vw" />
    </div>
    <div class="flex flex-1 flex-col gap-3 px-6 py-6">
        <h3 class="text-2xl font-semibold text-black">
            <a href="{{ route('doctors.show', $doctor->slug) }}" class="focus:outline-none focus-visible:ring-2 focus-visible:ring-black">
                {{ $doctor->name }}
            </a>
        </h3>
        @if($doctor->credentials)
            <p class="text-sm text-black/60">{{ $doctor->credentials }}</p>
        @endif
        <ul class="flex flex-wrap gap-2 text-sm text-black/70">
            @foreach($doctor->specialties ?? [] as $specialty)
                <li class="rounded-full border border-black/10 px-3 py-1">{{ $specialty }}</li>
            @endforeach
        </ul>
        <p class="text-base text-black/70">{{ \Illuminate\Support\Str::words(strip_tags($doctor->bio_markdown), 32) }}</p>
        <div class="mt-auto flex gap-2">
            <x-cta.primary class="flex-1 text-center" />
            <a
                href="{{ route('doctors.show', $doctor->slug) }}"
                class="flex-1 rounded-2xl border border-black px-6 py-3 text-center text-sm font-semibold hover:bg-black hover:text-white focus:outline-none focus:ring-2 focus:ring-black"
            >
                {{ __('Meet Dr.') }} {{ \Illuminate\Support\Str::of($doctor->name)->afterLast(' ') }}
            </a>
        </div>
    </div>
</article>
