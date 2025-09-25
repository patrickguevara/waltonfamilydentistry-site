@extends('layouts.app')

@section('title', __('Contact Walton Family Dentistry'))
@section('description', __('Reach the Walton Family Dentistry team to schedule, ask a question, or plan your first visit.'))

@section('content')

<x-section title="{{ __('Let’s talk teeth') }}" :intro="__('Send us a note and our concierge team will follow up quickly during business hours.')">
    <div class="grid gap-10 lg:grid-cols-2">
        <div class="space-y-6">
            <div class="rounded-3xl border border-black/10 bg-white p-8">
                <h2 class="text-xl font-semibold">{{ __('Visit or call') }}</h2>
                <address class="mt-4 not-italic space-y-1 text-base text-black/80">
                    <div>{{ $practice['address']['street'] }}</div>
                    <div>{{ $practice['address']['city'] }}, {{ $practice['address']['state'] }} {{ $practice['address']['zip'] }}</div>
                </address>
                <div class="mt-4 space-y-2">
                    <x-phone-link class="block text-lg font-medium" />
                    <a href="mailto:{{ $practice['email'] }}" class="block text-sm underline">{{ $practice['email'] }}</a>
                </div>
                <div class="mt-4 text-sm text-black/60">
                    <p>{{ __('Mon – Thu: 7:30a – 5:00p') }}</p>
                    <p>{{ __('Fri: 7:30a – 1:00p') }}</p>
                </div>
            </div>
            <div class="rounded-3xl border border-black/10 bg-white p-8">
                <h2 class="text-xl font-semibold">{{ __('Emergency?') }}</h2>
                <p class="mt-3 text-base text-black/70">{{ __('Call us right away. We keep time reserved daily for urgent visits and can guide you through next steps.') }}</p>
                <x-phone-link class="mt-4 inline-flex items-center text-lg font-semibold" />
            </div>
        </div>
        <div class="rounded-3xl border border-black/10 bg-white p-8">
            @livewire('contact-form')
        </div>
    </div>
</x-section>
@endsection
