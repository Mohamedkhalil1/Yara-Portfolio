<?php

namespace App\Http\Livewire;

trait Notification
{
    public function successNotification($message)
    {
        $this->dispatchBrowserEvent('notify', ['message' => $message, 'color' => '#4fbe87']);
    }

    public function errorNotification($message)
    {
        $this->dispatchBrowserEvent('notify', ['message' => $message, 'color' => '#B90E0A']);
    }
}
