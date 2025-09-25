@extends('layouts.app')

@section('title', __('Privacy Policy'))
@section('description', __('Learn how Walton Family Dentistry collects, uses, and protects your personal information.'))

@section('content')

<x-section title="{{ __('Privacy Policy') }}">
    <div class="prose prose-neutral max-w-3xl">
        <p>{{ __('We respect your privacy and strive to protect your personal information. This policy outlines what we collect and how it is used.') }}</p>
        <h2>{{ __('Information we collect') }}</h2>
        <p>{{ __('We collect contact information you submit through our website or during appointments, along with basic visit history and billing details required to provide care.') }}</p>
        <h2>{{ __('How we use your information') }}</h2>
        <ul>
            <li>{{ __('To deliver and coordinate dental services') }}</li>
            <li>{{ __('To communicate appointment updates and treatment plans') }}</li>
            <li>{{ __('To process insurance claims and payments') }}</li>
        </ul>
        <h2>{{ __('Your rights') }}</h2>
        <p>{{ __('You may request a copy of your records, ask us to correct inaccuracies, or limit certain communications at any time.') }}</p>
        <h2>{{ __('Contact') }}</h2>
        <p>{{ __('Questions? Email us at :email or call :phone.', ['email' => $practice['email'], 'phone' => \App\Helpers\Phone::display($practice['phone'])]) }}</p>
    </div>
</x-section>
@endsection
