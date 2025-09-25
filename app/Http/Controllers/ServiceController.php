<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\View\View;

class ServiceController extends Controller
{
    public function index(): View
    {
        $services = Service::with(['faqs' => fn ($query) => $query->ordered()])
            ->ordered()
            ->get();

        return view('pages.services.index', compact('services'));
    }

    public function show(Service $service): View
    {
        $service->load(['faqs' => fn ($query) => $query->ordered()]);

        return view('pages.services.show', compact('service'));
    }
}
