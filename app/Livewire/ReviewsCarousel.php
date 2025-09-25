<?php

namespace App\Livewire;

use App\Models\Review;
use Illuminate\Support\Collection;
use Livewire\Component;

class ReviewsCarousel extends Component
{
    public Collection $reviews;

    public float $averageRating;

    public int $reviewCount;

    public function mount(): void
    {
        $this->reviews = Review::published()
            ->latest('published_at')
            ->take(12)
            ->get();

        $this->reviewCount = Review::published()->count();
        $this->averageRating = round(Review::published()->avg('rating') ?? 0, 1);
    }

    public function render()
    {
        return view('livewire.reviews-carousel');
    }
}
