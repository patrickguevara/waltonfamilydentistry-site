@extends('layouts.app')

@section('title', $service->title)
@section('description', $service->excerpt)
@section('share_image', $service->hero_image_url)

@push('structured-data')
    <script type="application/ld+json">
        {!! json_encode([
            '@context' => 'https://schema.org',
            '@type' => 'Service',
            'name' => $service->title,
            'description' => $service->excerpt,
            'provider' => [
                '@type' => 'Dentist',
                'name' => config('practice.name'),
                'telephone' => \App\Helpers\Phone::e164(config('practice.phone')),
            ],
            'areaServed' => 'Austin, TX',
        ], JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE) !!}
    </script>
@endpush

@section('content')

<section class="relative">
    <div class="absolute inset-0">
        <x-image :src="$service->hero_image_url" :alt="$service->title" loading="eager" sizes="100vw" class="h-full w-full object-cover opacity-70" />
    </div>
    <div class="relative mx-auto max-w-5xl px-6 py-28 text-white lg:px-12">
        <p class="text-sm uppercase tracking-[0.3em] text-white/70">{{ __('Dental Service') }}</p>
        <h1 class="mt-4 text-4xl font-semibold tracking-tight sm:text-5xl">{{ $service->title }}</h1>
        <p class="mt-4 max-w-2xl text-lg text-white/80">{{ $service->excerpt }}</p>
        <div class="mt-6 flex flex-col gap-3 sm:flex-row">
            <x-cta.primary class="sm:flex-1 sm:text-center" />
            <x-cta.secondary class="sm:flex-1 sm:text-center" />
        </div>
    </div>
</section>

<x-section>
    <div class="mx-auto max-w-5xl space-y-12">
        <div class="prose prose-neutral max-w-none">
            {!! \Illuminate\Support\Str::markdown($service->body_markdown) !!}
        </div>

        @if($service->faqs->isNotEmpty())
            <section>
                <h2 class="text-2xl font-semibold">{{ __('Frequently asked questions') }}</h2>
                <dl class="mt-6 space-y-4">
                    @foreach($service->faqs as $faq)
                        <div class="rounded-3xl border border-black/10 bg-white p-6">
                            <dt class="text-sm font-semibold uppercase tracking-[0.2em] text-black">{{ $faq->question }}</dt>
                            <dd class="mt-3 text-base text-black/70">{{ $faq->answer }}</dd>
                        </div>
                    @endforeach
                </dl>
            </section>
        @endif

        <section class="grid gap-6 rounded-3xl border border-black/10 bg-white p-8 sm:grid-cols-2">
            <div class="space-y-3">
                <h2 class="text-xl font-semibold">{{ __('Schedule your visit') }}</h2>
                <p class="text-base text-black/70">{{ __('Reserve time online or call our concierge team to find a spot that fits your schedule.') }}</p>
            </div>
            <div class="flex flex-col gap-3 sm:flex-row sm:items-center">
                <x-cta.primary class="sm:flex-1 sm:text-center" />
                <x-cta.secondary class="sm:flex-1 sm:text-center" />
            </div>
        </section>
    </div>
</x-section>
@endsection
