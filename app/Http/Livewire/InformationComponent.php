<?php

namespace App\Http\Livewire;

use App\Models\Information;
use Livewire\Component;
use Livewire\WithFileUploads;

class InformationComponent extends Component
{
    use WithFileUploads, Notification;

    public $info;
    public $tempImage;
    public $pageTitle = 'Yoyo Information';

    protected $listeners = ['refreshInformation' => '$refresh'];

    public function rules()
    {
        return [
            'info.title'     => ['required', 'string', 'max:255'],
            'info.about_you' => ['required', 'string', 'max:255'],
            'info.image'     => ['nullable', 'string', 'max:255'],
            'tempImage'      => ['nullable'],
        ];
    }

    public function mount()
    {
        $this->info = Information::first() ?? new Information();
    }

    public function save()
    {
        $this->validate();
        $this->tempImage && $this->info->image = $this->tempImage->store('/', 'files');
        $this->info->save();
        $this->successNotification('Information has been saved successfully !');

    }

    public function render()
    {
        return view('livewire.information-component')
            ->extends('layouts.app')
            ->section('content');;
    }
}
