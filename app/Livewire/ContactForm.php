<?php

namespace App\Livewire;

use App\Helpers\Phone;
use App\Mail\ContactMessageSubmitted;
use App\Models\ContactMessage;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\RateLimiter;
use Livewire\Attributes\Validate;
use Livewire\Component;

class ContactForm extends Component
{
    #[Validate('required|string|min:2|max:120')]
    public string $name = '';

    #[Validate('required|email|max:190')]
    public string $email = '';

    #[Validate('nullable|string|max:25')]
    public string $phone = '';

    #[Validate('required|string|min:10|max:2000')]
    public string $message = '';

    /**
     * Honeypot field. Non-empty submissions are silently ignored.
     */
    public string $details = '';

    protected int $startedAt = 0;

    public bool $submitted = false;

    public ?string $feedback = null;

    public function mount(): void
    {
        $this->startedAt = now()->getTimestamp();
    }

    public function updated(string $property): void
    {
        $this->validateOnly($property);
    }

    public function submit(Request $request)
    {
        $this->feedback = null;

        if ($this->details !== '') {
            $this->resetExcept(['submitted']);
            $this->submitted = true;
            $this->feedback = __('Thanks! We’ll be in touch soon.');

            return;
        }

        if (! $this->startedAt) {
            $this->startedAt = now()->getTimestamp();
        }

        $elapsed = Carbon::now()->diffInSeconds(Carbon::createFromTimestamp($this->startedAt));
        if ($elapsed < 3) {
            $this->addError('form', __('Please take a moment before submitting.'));

            return;
        }

        $this->validate();

        $ip = $request->ip() ?? '127.0.0.1';
        $key = 'contact-form:'.md5($ip);

        if (RateLimiter::tooManyAttempts($key, 5)) {
            $seconds = RateLimiter::availableIn($key);
            $this->addError('form', __('Too many messages. Please try again in :seconds seconds.', ['seconds' => $seconds]));

            return;
        }

        RateLimiter::hit($key, 60);

        $message = ContactMessage::create([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone ? Phone::e164($this->phone) : null,
            'message' => $this->message,
            'submitted_ip' => $ip,
        ]);

        Mail::to(config('practice.email'))
            ->send(new ContactMessageSubmitted($message));

        $this->submitted = true;
        $this->feedback = __('Thanks! We’ll be in touch soon.');
        $this->reset(['name', 'email', 'phone', 'message', 'details']);
        $this->startedAt = now()->getTimestamp();
    }

    public function render()
    {
        return view('livewire.contact-form');
    }
}
