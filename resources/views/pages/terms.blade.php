@extends('layouts.app')

@section('title', __('Terms of Use'))
@section('description', __('Understand the terms that govern your use of the Walton Family Dentistry website.'))

@section('content')

<x-section title="{{ __('Terms of Use') }}">
    <div class="prose prose-neutral max-w-3xl">
        <p>{{ __('By accessing this website, you agree to these terms. Walton Family Dentistry reserves the right to update these terms at any time.') }}</p>
        <h2>{{ __('Use of content') }}</h2>
        <p>{{ __('Content on this site is provided for educational purposes and is not a substitute for personalized dental advice. Please contact us for recommendations tailored to you.') }}</p>
        <h2>{{ __('Appointments & services') }}</h2>
        <p>{{ __('Scheduling through our online portal or by phone constitutes a request for services subject to availability. We may reschedule or decline appointments for any reason.') }}</p>
        <h2>{{ __('Limitations of liability') }}</h2>
        <p>{{ __('Walton Family Dentistry is not liable for damages arising from the use or inability to use this website.') }}</p>
        <h2>{{ __('Contact us') }}</h2>
        <p>{{ __('If you have questions about these terms, reach out to us at :email or :phone.', ['email' => $practice['email'], 'phone' => \App\Helpers\Phone::display($practice['phone'])]) }}</p>
    </div>
</x-section>
@endsection
