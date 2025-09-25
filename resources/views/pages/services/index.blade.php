@extends('layouts.app')

@section('title', __('Dental Services in Austin, TX'))
@section('description', __('From preventive cleanings to dental implants, explore the complete menu of services offered at Walton Family Dentistry.'))

@section('content')

<x-section title="{{ __('Complete Dental Services') }}" :intro="__('Every visit is custom to your needs. Explore what we offer and schedule when you’re ready.')">
    <div class="grid gap-8 lg:grid-cols-[300px_1fr]">
        <aside aria-label="Service shortcuts" class="space-y-3">
            <h2 class="text-sm font-semibold uppercase tracking-[0.3em] text-black/60">{{ __('Quick links') }}</h2>
            <ul class="space-y-2 text-sm uppercase tracking-[0.2em] text-black/70">
                @foreach($services as $service)
                    <li>
                        <a href="#{{ $service->slug }}" class="hover:text-black">{{ $service->title }}</a>
                    </li>
                @endforeach
            </ul>
        </aside>
        <div class="space-y-16">
            @foreach($services as $service)
                <article id="{{ $service->slug }}" class="scroll-mt-32 rounded-3xl border border-black/10 bg-white p-8">
                    <div class="grid gap-8 lg:grid-cols-2">
                        <div class="space-y-4">
                            <h2 class="text-3xl font-semibold">{{ $service->title }}</h2>
                            <p class="text-base text-black/70">{{ $service->excerpt }}</p>
                            <div class="prose prose-neutral max-w-none">
                                {!! \Illuminate\Support\Str::markdown($service->body_markdown) !!}
                            </div>
                            <div class="flex flex-wrap gap-3">
                                <x-cta.primary />
                                <x-cta.secondary />
                                <a href="{{ route('services.show', $service->slug) }}" class="inline-flex items-center gap-2 text-sm font-medium uppercase tracking-[0.2em] text-black hover:underline">
                                    {{ __('View details') }}
                                    <span aria-hidden="true">→</span>
                                </a>
                            </div>
                        </div>
                        <div class="space-y-4">
                            <div class="overflow-hidden rounded-3xl border border-black/10">
                                <x-image :src="$service->hero_image_url" :alt="$service->title" sizes="(min-width:1024px) 50vw, 100vw" />
                            </div>
                            @if($service->faqs->isNotEmpty())
                                <div class="space-y-3">
                                    <h3 class="text-sm font-semibold uppercase tracking-[0.3em] text-black/60">{{ __('FAQs') }}</h3>
                                    <dl class="space-y-3">
                                        @foreach($service->faqs as $faq)
                                            <div class="rounded-2xl border border-black/10 bg-white p-4">
                                                <dt class="text-sm font-semibold uppercase tracking-[0.2em] text-black">{{ $faq->question }}</dt>
                                                <dd class="mt-2 text-base text-black/70">{{ $faq->answer }}</dd>
                                            </div>
                                        @endforeach
                                    </dl>
                                </div>
                            @endif
                        </div>
                    </div>
                </article>
            @endforeach
        </div>
    </div>
</x-section>
@endsection
