@props(['review'])

<figure itemscope itemtype="https://schema.org/Review" class="space-y-4">
    <meta itemprop="name" content="{{ __('Patient review by :name', ['name' => $review->author_name]) }}">
    <div class="flex items-center gap-2">
        <div class="flex" aria-hidden="true">
            @for($i = 1; $i <= 5; $i++)
                <span class="text-xl {{ $i <= $review->rating ? 'text-black' : 'text-black/20' }}">★</span>
            @endfor
        </div>
        <span class="sr-only">{{ __('Rated :rating out of 5', ['rating' => $review->rating]) }}</span>
        <span class="text-sm uppercase tracking-[0.2em] text-black/60">{{ $review->source_label }}</span>
    </div>

    <blockquote class="text-lg text-black/80" itemprop="reviewBody">
        “{{ $review->body }}”
    </blockquote>

    <figcaption class="text-sm font-medium text-black" itemprop="author" itemscope itemtype="https://schema.org/Person">
        <span itemprop="name">{{ $review->author_name }}</span>
        @if($review->published_at)
            <meta itemprop="datePublished" content="{{ $review->published_at->toDateString() }}">
        @endif
        <meta itemprop="reviewRating" content="{{ $review->rating }}">
    </figcaption>
</figure>
