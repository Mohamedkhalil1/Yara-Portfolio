<?php

namespace App\Http\Livewire;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Client;
use App\Models\Contact;
use App\Models\Information;
use App\Models\Profile;
use App\Models\Service;
use Livewire\Component;

class HomePage extends Component
{
    use Notification;

    public string $subEmail = '';
    public Contact $contact;
    public $profile;
    public $information;
    public $services;
    public $clients;
    public $brands;
    public $categories;
    public $socials;

    public function rules(): array
    {
        return [
            'contact.email' => ['required', 'email', 'max:255'],
        ];
    }

    public function mount()
    {
        $this->profile = Profile::first();
        $this->information = Information::first();
        $this->services = Service::all();
        $this->clients = Client::all();
        $this->brands = Brand::all();
        $this->categories = Category::with('campaigns')->get();
        $this->contact = new Contact();
    }

    public function updatedSubEmail()
    {
        $this->validate([
            'contact.email' => 'email',
        ]);
    }

    public function sub()
    {
        try {
            $this->validate();
            $this->contact->save();
            $this->contact->email = '';
            $this->successNotification('you are sub now, we will contact to you as soon as possible.');
        } catch (\Exception $exception) {
            $this->errorNotification('Email is not correct');
        }

    }

    public function render()
    {
        return view('livewire.home-page')
            ->extends('layouts.front')
            ->section('content');
    }
}
