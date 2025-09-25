<?php

use App\Livewire\ContactForm;
use App\Mail\ContactMessageSubmitted;
use App\Models\ContactMessage;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\RateLimiter;
use Livewire\Livewire;

uses(\Illuminate\Foundation\Testing\RefreshDatabase::class);

beforeEach(function () {
    RateLimiter::clear('contact-form:'.md5('127.0.0.1'));
    Carbon::setTestNow();
});

test('contact form validates required fields', function () {
    Carbon::setTestNow(now()->addSeconds(5));

    Livewire::test(ContactForm::class)
        ->call('submit')
        ->assertHasErrors([
            'name' => 'required',
            'email' => 'required',
            'message' => 'required',
        ]);
});

test('contact form blocks fast submissions', function () {
    Livewire::test(ContactForm::class)
        ->set('name', 'Test User')
        ->set('email', 'test@example.com')
        ->set('message', 'Quick message.')
        ->call('submit')
        ->assertHasErrors(['form']);
});

test('contact form stores message and sends email', function () {
    Mail::fake();

    $component = Livewire::test(ContactForm::class)
        ->set('name', 'Test User')
        ->set('email', 'test@example.com')
        ->set('phone', '5129538362')
        ->set('message', 'I would like to schedule soon.');

    Carbon::setTestNow(now()->addSeconds(5));

    $component->call('submit')->assertHasNoErrors();

    Carbon::setTestNow();

    $this->assertDatabaseHas('contact_messages', [
        'email' => 'test@example.com',
    ]);

    Mail::assertSent(ContactMessageSubmitted::class, function ($mail) {
        return $mail->messageModel instanceof ContactMessage
            && $mail->messageModel->email === 'test@example.com';
    });
});

test('contact form throttles repeated submissions', function () {
    Carbon::setTestNow(now()->addSeconds(5));

    for ($i = 0; $i < 5; $i++) {
        Livewire::test(ContactForm::class)
            ->set('name', 'Test User')
            ->set('email', 'test@example.com')
            ->set('message', 'Message '.($i + 1))
            ->call('submit');

        Carbon::setTestNow(now()->addSeconds(5));
    }

    Livewire::test(ContactForm::class)
        ->set('name', 'Flood User')
        ->set('email', 'flood@example.com')
        ->set('message', 'Too many messages.')
        ->call('submit')
        ->assertHasErrors(['form']);
});
