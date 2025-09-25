@extends('layouts.app')

@section('title', __('Patient Reviews'))
@section('description', __('See why patients rate Walton Family Dentistry 5-stars for comfort, technology, and personalized care.'))

@push('structured-data')
    <script type="application/ld+json">
        {!! json_encode([
            '@context' => 'https://schema.org',
            '@type' => 'Dentist',
            'name' => config('practice.name'),
            'aggregateRating' => [
                '@type' => 'AggregateRating',
                'ratingValue' => $averageRating,
                'reviewCount' => $reviewCount,
            ],
            'review' => $reviews->map(fn ($review) => [
                '@type' => 'Review',
                'author' => $review->author_name,
                'reviewBody' => $review->body,
                'reviewRating' => [
                    '@type' => 'Rating',
                    'ratingValue' => $review->rating,
                ],
                'datePublished' => optional($review->published_at)->toDateString(),
                'name' => 'Review from '.$review->author_name,
            ])->toArray(),
        ], JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE) !!}
    </script>
@endpush

@section('content')

<x-section title="{{ __('Patients love our calm, modern vibe') }}" :intro="__('Real feedback from Austin neighbors about what it’s like to visit Walton Family Dentistry.')">
    <div class="rounded-3xl border border-black/10 bg-white p-8">
        <div class="flex flex-col gap-6 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <p class="text-sm uppercase tracking-[0.3em] text-black/60">{{ __('Average rating') }}</p>
                <p class="mt-2 text-4xl font-semibold">{{ number_format($averageRating, 1) }} / 5</p>
                <p class="text-sm text-black/60">{{ __('Across :count verified reviews', ['count' => $reviewCount]) }}</p>
            </div>
            <x-cta.primary class="sm:w-auto" />
        </div>
    </div>

    <div class="mt-10 grid gap-6 lg:grid-cols-2">
        @foreach($reviews as $review)
            <div class="rounded-3xl border border-black/10 bg-white p-8">
                <x-review :review="$review" />
            </div>
        @endforeach
    </div>

    <div class="mt-8">
        {{ $reviews->links() }}
    </div>
</x-section>
@endsection
