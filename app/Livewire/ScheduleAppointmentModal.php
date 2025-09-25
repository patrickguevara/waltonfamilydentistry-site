<?php

namespace App\Livewire;

use Livewire\Component;

class ScheduleAppointmentModal extends Component
{
    public bool $open = false;

    protected $listeners = ['openScheduleModal' => 'open'];

    public function open(): void
    {
        $this->open = true;
        $this->dispatch('modal-opened');
    }

    public function close(): void
    {
        $this->open = false;
        $this->dispatch('modal-closed');
    }

    public function updatedOpen($value): void
    {
        if ($value) {
            $this->dispatch('modal-opened');
        }
    }

    public function render()
    {
        return view('livewire.schedule-appointment-modal', [
            'schedulingUrl' => config('practice.scheduling_url'),
        ]);
    }
}
