<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <url>
        <loc>{{ url('/') }}</loc>
        <priority>1.0</priority>
    </url>
    <url>
        <loc>{{ route('services.index') }}</loc>
    </url>
    @foreach($services as $service)
        <url>
            <loc>{{ route('services.show', $service->slug) }}</loc>
            <lastmod>{{ optional($service->updated_at)->toAtomString() }}</lastmod>
        </url>
    @endforeach
    <url>
        <loc>{{ route('doctors.index') }}</loc>
    </url>
    @foreach($doctors as $doctor)
        <url>
            <loc>{{ route('doctors.show', $doctor->slug) }}</loc>
            <lastmod>{{ optional($doctor->updated_at)->toAtomString() }}</lastmod>
        </url>
    @endforeach
    <url>
        <loc>{{ route('reviews.index') }}</loc>
    </url>
    <url>
        <loc>{{ route('contact') }}</loc>
    </url>
    <url>
        <loc>{{ route('privacy') }}</loc>
    </url>
    <url>
        <loc>{{ route('terms') }}</loc>
    </url>
</urlset>
