<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    <link rel="canonical" href="{{ url()->current() }}">

    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">

    <meta name="twitter:card" content="summary_large_image">

    @stack('meta')

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://unpkg.com/alpinejs@3.13.3/dist/cdn.min.js" defer></script>
    @livewireStyles
</head>
<body class="bg-white font-sans text-black antialiased">
    <a href="#main" class="sr-only focus:not-sr-only focus:absolute focus:left-4 focus:top-4 focus:z-50 focus:rounded-2xl focus:bg-white focus:px-4 focus:py-2 focus:text-black">
        {{ __('Skip to content') }}
    </a>

    @php
        $navigation = [
            ['label' => __('Home'), 'route' => route('home')],
            ['label' => __('Services'), 'route' => route('services.index')],
            ['label' => __('Doctors'), 'route' => route('doctors.index')],
            ['label' => __('Contact'), 'route' => route('contact')],
        ];
    @endphp

    <div class="min-h-screen">
        <header class="sticky top-0 z-40 border-b border-black/10 bg-white/90 backdrop-blur" x-data="{ open: false }">
            <div class="mx-auto flex max-w-7xl items-center justify-between gap-6 px-6 py-4 lg:px-12">
                <div class="flex items-center gap-8">
                    <a href="{{ route('home') }}" class="block" aria-label="{{ $practice['name'] }}">
                        <img
                            src="{{ asset('images/waltonfamilydentistrylogo.avif') }}"
                            alt="{{ $practice['name'] }} logo"
                            class="h-32 w-auto"
                        >
                        <span class="sr-only">{{ $practice['name'] }}</span>
                    </a>
                    <nav class="hidden items-center gap-6 text-sm font-medium uppercase tracking-[0.2em] text-black/70 lg:flex" aria-label="Primary">
                        @foreach($navigation as $item)
                            <a
                                href="{{ $item['route'] }}"
                                @class([
                                    'hover:text-black focus:outline-none focus-visible:ring-2 focus-visible:ring-black focus-visible:ring-offset-2 focus-visible:ring-offset-white',
                                    'text-black' => url()->current() === $item['route'],
                                ])
                            >
                                {{ $item['label'] }}
                            </a>
                        @endforeach
                    </nav>
                </div>

                <div class="hidden items-center gap-3 sm:flex">
                    <x-cta.primary />
                    <x-cta.secondary />
                </div>

                <button
                    type="button"
                    class="sm:hidden rounded-full border border-black px-4 py-2 text-sm font-semibold uppercase tracking-[0.2em]"
                    @click="open = !open"
                    :aria-expanded="open"
                    aria-controls="mobile-nav"
                >
                    <span x-text="open ? '{{ __('Close') }}' : '{{ __('Menu') }}'"></span>
                </button>
            </div>

            <nav
                id="mobile-nav"
                x-show="open"
                x-transition
                class="sm:hidden border-t border-black/10 bg-white px-6 py-4 text-sm font-medium uppercase tracking-[0.2em]"
                aria-label="Mobile"
            >
                <ul class="space-y-2">
                    @foreach($navigation as $item)
                        <li>
                            <a href="{{ $item['route'] }}" class="block rounded-2xl px-4 py-3 hover:bg-black hover:text-white">
                                {{ $item['label'] }}
                            </a>
                        </li>
                    @endforeach
                </ul>
                <div class="mt-4 space-y-2">
                    <x-cta.primary class="w-full text-center" />
                    <x-cta.secondary class="w-full text-center" />
                </div>
            </nav>
        </header>

        <main id="main" class="bg-white">
            @yield('content')
        </main>

        <footer class="border-t border-black/10 bg-black text-white">
            <div class="mx-auto max-w-7xl px-6 py-12 lg:px-12">
                <div class="grid gap-10 md:grid-cols-4">
                    <div class="space-y-4">
                        <h2 class="text-xl font-semibold uppercase tracking-[0.2em]">{{ $practice['name'] }}</h2>
                        <x-phone-link class="block text-lg font-medium" />
                        <a href="mailto:{{ $practice['email'] }}" class="block text-sm underline hover:no-underline">{{ $practice['email'] }}</a>
                    </div>
                    <div>
                        <h3 class="text-sm font-semibold uppercase tracking-[0.2em] text-white/70">{{ __('Visit Us') }}</h3>
                        <p class="mt-3 text-sm text-white/80">
                            {{ $practice['address']['street'] }}<br>
                            {{ $practice['address']['city'] }}, {{ $practice['address']['state'] }} {{ $practice['address']['zip'] }}
                        </p>
                        <a href="{{ config('practice.maps_embed') ?: 'https://maps.google.com/?q='.urlencode($practice['address']['street'].' '.$practice['address']['city']) }}" target="_blank" rel="noopener" class="mt-2 inline-block text-sm underline">
                            {{ __('Get Directions') }}
                        </a>
                    </div>
                    <div>
                        <h3 class="text-sm font-semibold uppercase tracking-[0.2em] text-white/70">{{ __('Hours') }}</h3>
                        <ul class="mt-3 space-y-1 text-sm text-white/80">
                            <li>{{ __('Mon – Thu: 7:30a – 5:00p') }}</li>
                            <li>{{ __('Fri: 7:30a – 1:00p') }}</li>
                            <li>{{ __('Sat – Sun: By appointment') }}</li>
                        </ul>
                    </div>
                    <div class="space-y-4">
                        <h3 class="text-sm font-semibold uppercase tracking-[0.2em] text-white/70">{{ __('Follow') }}</h3>
                        <ul class="space-y-2 text-sm text-white/80">
                            @foreach(array_filter($practice['social']) as $network => $url)
                                <li>
                                    <a href="{{ $url }}" target="_blank" rel="noopener" class="underline hover:no-underline">
                                        {{ ucfirst($network) }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                        <div>
                            <h4 class="text-sm font-semibold uppercase tracking-[0.2em] text-white/70">{{ __('Insurance') }}</h4>
                            <p class="mt-2 text-sm text-white/80">{{ __('We work with most major PPO plans. Call us and we’ll verify your benefits.') }}</p>
                        </div>
                    </div>
                </div>

                <div class="mt-12 flex flex-col gap-4 border-t border-white/10 pt-6 text-sm text-white/60 md:flex-row md:items-center md:justify-between">
                    <div>&copy; {{ now()->year }} {{ $practice['name'] }}. {{ __('All rights reserved.') }} Site created by PJR&L.</div>
                    <div class="flex gap-4">
                        <a href="{{ route('privacy') }}" class="hover:text-white">{{ __('Privacy Policy') }}</a>
                        <a href="{{ route('terms') }}" class="hover:text-white">{{ __('Terms of Use') }}</a>
                    </div>
                </div>
            </div>
        </footer>

        <div class="fixed inset-x-0 bottom-0 z-40 border-t border-black/10 bg-white/95 backdrop-blur sm:hidden">
            <div class="mx-auto flex max-w-7xl gap-3 px-6 py-4">
                <x-cta.primary class="flex-1" />
                <x-cta.secondary class="flex-1" />
            </div>
        </div>
    </div>

    @livewire('schedule-appointment-modal')

    @php
        $structured = [
            '@context' => 'https://schema.org',
            '@type' => 'Dentist',
            'name' => $practice['name'],
            'url' => url('/'),
            'telephone' => \App\Helpers\Phone::e164($practice['phone']),
            'email' => $practice['email'],
            'address' => [
                '@type' => 'PostalAddress',
                'streetAddress' => $practice['address']['street'],
                'addressLocality' => $practice['address']['city'],
                'addressRegion' => $practice['address']['state'],
                'postalCode' => $practice['address']['zip'],
                'addressCountry' => 'US',
            ],
            'sameAs' => array_values(array_filter($practice['social'] ?? [])),
        ];
    @endphp

    <script type="application/ld+json">{!! json_encode($structured, JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE) !!}</script>

    @stack('structured-data')

    @stack('scripts')

    @livewireScripts
</body>
</html>
