@extends('layouts.app')

@section('title', __('Walton Family Dentistry Doctors'))
@section('description', __('Meet the Walton Family Dentistry doctors, a collaborative team focused on preventive care, cosmetic artistry, and patient comfort.'))

@section('content')

<x-section title="{{ __('A team built around you') }}" :intro="__('Our dentists work together to plan your care with the perfect blend of precision and compassion.')">
    <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-2">
        @foreach($doctors as $doctor)
            <x-card.doctor :doctor="$doctor" />
        @endforeach
    </div>
</x-section>
@endsection
