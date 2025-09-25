<?php

namespace App\Mail;

use App\Models\ContactMessage;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMessageSubmitted extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public ContactMessage $messageModel)
    {
        $this->subject('New website inquiry from '.$this->messageModel->name);
    }

    public function build(): self
    {
        return $this->view('mail.contact-message')
            ->with([
                'messageModel' => $this->messageModel,
            ]);
    }
}
