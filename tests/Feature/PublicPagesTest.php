<?php

use App\Models\Doctor;
use App\Models\Service;
use Database\Seeders\DatabaseSeeder;

uses(\Illuminate\Foundation\Testing\RefreshDatabase::class);

beforeEach(function () {
    $this->seed(DatabaseSeeder::class);
});

test('home page renders', function () {
    $this->get(route('home'))->assertOk();
});

test('services index and detail render', function () {
    $service = Service::firstOrFail();

    $this->get(route('services.index'))->assertOk();
    $this->get(route('services.show', $service))->assertOk();
});

test('doctors index and detail render', function () {
    $doctor = Doctor::firstOrFail();

    $this->get(route('doctors.index'))->assertOk();
    $this->get(route('doctors.show', $doctor))->assertOk();
});

test('reviews page renders with aggregate data', function () {
    $response = $this->get(route('reviews.index'));

    $response->assertOk();
    $response->assertSee('aggregateRating', false);

    $this->get(route('reviews.index', ['page' => 2]))->assertOk();
});

test('contact page renders', function () {
    $this->get(route('contact'))->assertOk();
});

test('sitemap and health endpoints respond', function () {
    $this->get(route('sitemap'))->assertOk()->assertHeader('Content-Type', 'application/xml');
    $this->get(route('health'))->assertOk()->assertJson(['status' => 'ok']);
});
