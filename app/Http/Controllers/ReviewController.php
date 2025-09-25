<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class ReviewController extends Controller
{
    public function index(): View
    {
        $reviews = Review::published()
            ->latest('published_at')
            ->paginate(9)
            ->withQueryString();

        $averageRating = Cache::remember('reviews:average', 600, fn () => round(Review::published()->avg('rating') ?? 0, 1));
        $reviewCount = Cache::remember('reviews:count', 600, fn () => Review::published()->count());

        return view('pages.reviews.index', compact('reviews', 'averageRating', 'reviewCount'));
    }
}
