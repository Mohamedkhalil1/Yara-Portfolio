<?php

namespace App\Http\Livewire;

use App\Http\Livewire\Datatable\WithCachedRows;
use App\Models\Profile as ProfileModel;
use Livewire\Component;
use Livewire\WithFileUploads;

class Profile extends Component
{
    use WithFileUploads, WithCachedRows, Notification;

    public string $pageTitle = 'YOYO PROFILE';
    public ProfileModel $profile;
    public $tempImage;
    public $tempCV;
    public $tempLogo;

    protected $listeners = ['refreshProfile' => '$refresh'];

    public function rules()
    {
        return [
            'profile.name'       => 'required|string|max:255',
            'profile.title'      => 'required|string|max:255',
            'profile.phone'      => 'required|string|max:255',
            'profile.image'      => 'nullable|string|max:255',
            'profile.cv'         => 'nullable|string|max:255',
            'profile.experience' => 'required|numeric|max:66666',
            'tempImage'          => 'nullable|image|max:1024',
            'tempCV'             => 'nullable|mimes:pdf,word',
            'tempLogo'           => 'nullable|image|max:1024',
        ];
    }

    public function mount()
    {
        $this->profile = ProfileModel::first() ?? new ProfileModel();
    }

    public function save()
    {
        $this->validate();
        $this->tempImage && $this->profile->image = $this->tempImage->store('/', 'files');
        $this->tempCV && $this->profile->cv = $this->tempCV->store('/', 'files');
        $this->tempLogo && $this->profile->logo = $this->tempLogo->store('/', 'files');
        $this->profile->save();
        $this->successNotification('profile saved successfully !');
    }

    public function render()
    {
        return view('livewire.profile')
            ->extends('layouts.app')
            ->section('content');;
    }
}
