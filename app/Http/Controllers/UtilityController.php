<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Service;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cache;

class UtilityController extends Controller
{
    public function sitemap(): Response
    {
        $services = Cache::remember('sitemap:services', 3600, fn () => Service::ordered()->get(['slug', 'updated_at']));
        $doctors = Cache::remember('sitemap:doctors', 3600, fn () => Doctor::ordered()->get(['slug', 'updated_at']));

        $content = view('pages.sitemap', compact('services', 'doctors'))->render();

        return response($content, 200, ['Content-Type' => 'application/xml']);
    }

    public function robots(): Response
    {
        $content = view('pages.robots')->render();

        return response($content, 200, ['Content-Type' => 'text/plain']);
    }

    public function health(): JsonResponse
    {
        return response()->json(['status' => 'ok']);
    }
}
