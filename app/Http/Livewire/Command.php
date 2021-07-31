<?php

namespace App\Http\Livewire;

use Exception;
use Illuminate\Support\Facades\Artisan;
use Livewire\Component;

class Command extends Component
{
    use Notification;

    public string $pageTitle = 'Khalil Commands';

    public string $laravelCommand = '';
    public string $composerCommand = '';

    public function artisan()
    {

        try {
            $this->validate(['laravelCommand' => ['required']]);
            Artisan::call($this->laravelCommand);
            $this->successNotification('Laravel has been done');
        } catch (Exception $exception) {
            $this->errorNotification($exception->getMessage());
        }
    }

    public function composer()
    {
        try {
            $this->validate(['composerCommand' => ['required']]);
            system($this->composerCommand);
            $this->successNotification('Composer has been done');
        } catch (Exception $exception) {
            $this->errorNotification($exception->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.command')
            ->extends('layouts.app')
            ->section('content');
    }
}
