<?php

namespace App\View\Components;

use App\Helpers\Phone;
use Illuminate\View\Component;
use Illuminate\View\View;

class PhoneLink extends Component
{
    public function __construct(
        public ?string $number = null,
        public ?string $label = null,
    ) {}

    public function render(): View
    {
        $tel = Phone::e164($this->number ?? config('practice.phone'));
        $display = Phone::display($this->number ?? config('practice.phone'));

        return view('components.phone-link', [
            'telNumber' => $tel,
            'displayNumber' => $display,
            'label' => $this->label,
        ]);
    }
}
