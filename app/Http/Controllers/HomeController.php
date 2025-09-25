<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Insurance;
use App\Models\Review;
use App\Models\Service;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function __invoke(): View
    {
        $services = Cache::remember('home:services', 3600, fn () => Service::ordered()->take(6)->get());
        $doctors = Cache::remember('home:doctors', 3600, fn () => Doctor::ordered()->take(3)->get());
        $reviews = Cache::remember('home:reviews', 600, fn () => Review::published()->latest('published_at')->take(6)->get());
        $averageRating = Cache::remember('reviews:average', 600, fn () => round(Review::published()->avg('rating') ?? 0, 1));
        $reviewCount = Cache::remember('reviews:count', 600, fn () => Review::published()->count());
        $insurances = Cache::remember('home:insurances', 3600, fn () => Insurance::orderBy('name')->take(8)->get());

        return view('pages.home', compact(
            'services',
            'doctors',
            'reviews',
            'averageRating',
            'reviewCount',
            'insurances'
        ));
    }
}
