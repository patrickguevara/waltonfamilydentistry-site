@extends('layouts.app')

@section('title', $doctor->name)
@section('description', __('Meet :name: :credentials at Walton Family Dentistry in Austin.', ['name' => $doctor->name, 'credentials' => $doctor->credentials]))
@section('share_image', $doctor->headshot_url)

@push('structured-data')
    <script type="application/ld+json">
        {!! json_encode([
            '@context' => 'https://schema.org',
            '@type' => 'Person',
            'name' => $doctor->name,
            'jobTitle' => 'Dentist',
            'description' => strip_tags($doctor->bio_markdown),
            'medicalSpecialty' => $doctor->specialties,
            'image' => $doctor->headshot_url,
            'worksFor' => [
                '@type' => 'Organization',
                'name' => config('practice.name'),
            ],
            'url' => url()->current(),
        ], JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE) !!}
    </script>
@endpush

@section('content')

<x-section class="pt-24">
    <div class="mx-auto max-w-5xl">
        <div class="grid gap-10 lg:grid-cols-[320px_1fr]">
            <div class="space-y-6">
                <div class="overflow-hidden rounded-3xl border border-black/10">
                    <x-image :src="$doctor->headshot_url" :alt="$doctor->name" sizes="320px" />
                </div>
                <div class="rounded-3xl border border-black/10 bg-white p-6">
                    <p class="text-sm font-semibold uppercase tracking-[0.2em] text-black/60">{{ __('Specialties') }}</p>
                    <ul class="mt-3 space-y-2 text-sm text-black/80">
                        @foreach($doctor->specialties ?? [] as $specialty)
                            <li>{{ $specialty }}</li>
                        @endforeach
                    </ul>
                </div>
                @if($doctor->social)
                    <div class="rounded-3xl border border-black/10 bg-white p-6">
                        <p class="text-sm font-semibold uppercase tracking-[0.2em] text-black/60">{{ __('Connect') }}</p>
                        <ul class="mt-3 space-y-2 text-sm text-black/80">
                            @foreach($doctor->social as $network => $url)
                                <li>
                                    <a href="{{ $url }}" target="_blank" rel="noopener" class="underline hover:no-underline">
                                        {{ ucfirst($network) }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
            <div class="space-y-6">
                <p class="text-sm uppercase tracking-[0.3em] text-black/50">{{ __('Meet the doctor') }}</p>
                <h1 class="text-4xl font-semibold tracking-tight">{{ $doctor->name }}</h1>
                @if($doctor->credentials)
                    <p class="text-base font-medium text-black/70">{{ $doctor->credentials }}</p>
                @endif
                <div class="prose prose-neutral max-w-none">
                    {!! \Illuminate\Support\Str::markdown($doctor->bio_markdown) !!}
                </div>
                <div class="flex flex-col gap-3 sm:flex-row">
                    <x-cta.primary class="sm:flex-1 sm:text-center" />
                    <x-cta.secondary class="sm:flex-1 sm:text-center" />
                </div>
            </div>
        </div>
    </div>
</x-section>
@endsection
