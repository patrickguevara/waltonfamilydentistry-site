@extends('layouts.app')

@section('title', 'Walton Family Dentistry')
@section('description', 'Walton Family Dentistry delivers modern preventive, cosmetic, and emergency dental care for Austin families with a calm, judgement-free experience.')
@section('share_image', 'https://images.unsplash.com/photo-1527613426441-4da17471b66d?auto=format&fit=crop&w=1792&q=80')

@push('structured-data')
    <script type="application/ld+json">
        {!! json_encode([
            '@context' => 'https://schema.org',
            '@type' => 'WebPage',
            'name' => 'Walton Family Dentistry',
            'about' => 'Family dentist in Austin, TX providing preventive, cosmetic, and emergency dental care.',
        ], JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE) !!}
    </script>
@endpush

@section('content')

<section class="relative bg-black text-white">
    <div class="absolute inset-0">
        <x-image src="https://images.unsplash.com/photo-1527613426441-4da17471b66d?auto=format&fit=crop&w=1792&q=80" alt="Dental team assisting patient" loading="eager" sizes="100vw" class="h-full w-full object-cover opacity-70" />
    </div>
    <div class="relative mx-auto max-w-7xl px-6 py-28 lg:px-12">
        <div class="max-w-2xl space-y-6">
            <p class="text-sm font-semibold uppercase tracking-[0.3em] text-white/70">{{ __('Smile forward') }}</p>
            <h1 class="text-4xl font-semibold tracking-tight sm:text-5xl">
                {{ __('Dental care that feels as good as it looks.') }}
            </h1>
            <p class="text-lg text-white/80">
                {{ __('From routine wellness visits to advanced cosmetic dentistry, we combine leading technology with a calming touch to keep Austin smiling.') }}
            </p>
            <div class="flex flex-col gap-3 sm:flex-row sm:items-center">
                <x-cta.primary class="sm:flex-1 sm:text-center" />
                <x-cta.secondary class="sm:flex-1 sm:text-center" />
            </div>
        </div>
    </div>
</section>

<x-section :intro="__('Explore our most-requested treatments tailored for comfort and lasting results.')" title="{{ __('Featured Services') }}">
    <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-3">
        @foreach($services as $service)
            <x-card.service :service="$service" />
        @endforeach
    </div>
    <div class="mt-8 text-center">
        <a href="{{ route('services.index') }}" class="inline-flex items-center gap-2 text-sm font-medium uppercase tracking-[0.2em] text-black hover:underline">
            {{ __('View all services') }}
            <span aria-hidden="true">→</span>
        </a>
    </div>
</x-section>

<x-section title="{{ __('Meet the Doctors') }}" :intro="__('A collaborative, patient-first team focused on dentistry that fits your life.')">
    <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-2">
        @foreach($doctors as $doctor)
            <x-card.doctor :doctor="$doctor" />
        @endforeach
    </div>
    <div class="mt-8 text-center">
        <a href="{{ route('doctors.index') }}" class="inline-flex items-center gap-2 text-sm font-medium uppercase tracking-[0.2em] text-black hover:underline">
            {{ __('Meet the team') }}
            <span aria-hidden="true">→</span>
        </a>
    </div>
</x-section>

<x-section title="{{ __('What patients are saying') }}" :intro="__('Hundreds of Austin families trust us with their smiles. Here are a few of their stories.')">
    @livewire('reviews-carousel')
    <div class="mt-6 text-center">
        <a href="{{ route('reviews.index') }}" class="inline-flex items-center gap-2 text-sm font-medium uppercase tracking-[0.2em] text-black hover:underline">
            {{ __('Read all reviews') }}
            <span aria-hidden="true">→</span>
        </a>
    </div>
</x-section>

<x-section title="{{ __('Insurance and Coverage') }}" :intro="__('We work with leading PPO plans and can confirm your coverage before you arrive.')">
    <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
        @foreach($insurances as $insurance)
            <div class="flex items-center justify-center rounded-3xl border border-black/10 bg-white px-6 py-6">
                <img
                    src="{{ $insurance->logo_url }}"
                    alt="{{ $insurance->name }} logo"
                    class="h-12 w-full max-w-[10rem] object-contain"
                    loading="lazy"
                >
            </div>
        @endforeach
    </div>
    <p class="mt-6 text-center text-sm text-black/60">
        {{ __('Don’t see your carrier? Give us a call and we’ll verify your benefits in minutes.') }}
    </p>
</x-section>

<x-section title="{{ __('Ready when you are') }}" :intro="__('Tell us about your smile goals and our concierge team will take care of the rest.')">
    <div class="grid gap-6 lg:grid-cols-2">
        <div class="space-y-4 rounded-3xl border border-black/10 bg-white p-8">
            <p class="text-lg text-black/80">{{ __('Need a second opinion? Dealing with a dental emergency? Looking for a cosmetic refresh? We’re here for it all.') }}</p>
            <div class="flex flex-col gap-3 sm:flex-row">
                <x-cta.primary class="sm:flex-1 sm:text-center" />
                <x-cta.secondary class="sm:flex-1 sm:text-center" />
            </div>
        </div>
        <div class="flex items-center justify-center rounded-3xl border border-black/10 bg-black p-8 text-white">
            <div class="space-y-2 text-center">
                <p class="text-sm uppercase tracking-[0.3em] text-white/70">{{ __('Text or Call') }}</p>
                <x-phone-link class="text-3xl font-semibold" />
                <p class="text-sm text-white/70">{{ __('Same-day emergency appointments available.') }}</p>
            </div>
        </div>
    </div>
</x-section>

<x-section title="{{ __('Find Us') }}" :intro="__('Located just off Springdale with convenient parking and same-level access.')">
    <div class="grid gap-8 lg:grid-cols-2">
        <div class="overflow-hidden rounded-3xl border border-black/10">
            @if(config('practice.maps_embed'))
                <iframe
                    src="{{ config('practice.maps_embed') }}"
                    width="100%"
                    height="360"
                    style="border:0"
                    allowfullscreen
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"
                    title="{{ __('Map to Walton Family Dentistry') }}"
                ></iframe>
            @else
                <x-image src="{{ asset('images/map.png') }}" alt="Map placeholder" loading="lazy" sizes="(min-width: 1024px) 50vw, 100vw" />
            @endif
        </div>
        <div
            class="space-y-4 rounded-3xl border border-black/10 bg-white p-8"
            x-data="{
                copied: false,
                address: '{{ $practice['address']['street'].' '.$practice['address']['city'].' '.$practice['address']['state'].' '.$practice['address']['zip'] }}',
                copy() {
                    if (!navigator.clipboard) return;
                    navigator.clipboard.writeText(this.address).then(() => {
                        this.copied = true;
                        setTimeout(() => this.copied = false, 2000);
                    });
                }
            }"
        >
            <h3 class="text-2xl font-semibold">{{ $practice['name'] }}</h3>
            <address class="space-y-1 not-italic text-base text-black/80">
                <div>{{ $practice['address']['street'] }}</div>
                <div>{{ $practice['address']['city'] }}, {{ $practice['address']['state'] }} {{ $practice['address']['zip'] }}</div>
            </address>
            <x-phone-link class="inline-flex items-center text-lg font-medium" />
            <a href="mailto:{{ $practice['email'] }}" class="block text-sm underline">{{ $practice['email'] }}</a>
            <button
                type="button"
                class="mt-4 inline-flex items-center gap-3 rounded-2xl border border-black px-4 py-2 text-sm font-semibold uppercase tracking-[0.2em]"
                @click.prevent="copy()"
            >
                {{ __('Copy address') }}
                <span x-show="copied" x-transition class="text-xs font-normal text-black/60">{{ __('Copied') }}</span>
            </button>
        </div>
    </div>
</x-section>
@endsection
