<?php

namespace App\Http\Livewire;

use App\Http\Livewire\Datatable\WithCachedRows;
use App\Http\Livewire\Datatable\WithPerPagePagination;
use App\Http\Livewire\Datatable\WithSorting;
use App\Models\Client;
use Livewire\Component;
use Livewire\WithFileUploads;

class ClientComponent extends Component
{
    use WithFileUploads, Notification, WithCachedRows, WithPerPagePagination, WithSorting;

    public string $pageTitle = 'Yoyo Clients';
    public $client;
    public $tempImage;
    protected $queryString = ['filters'];
    public array $filters = [
        'search' => '',
    ];
    protected $listeners = ['refreshClients' => '$refresh'];

    public function rules(): array
    {
        return [
            'client.title' => 'required|string|max:255',
            'client.desc'  => 'required|string|max:64000',
            'client.image' => 'nullable|string|max:255',
        ];
    }

    public function mount()
    {
        $this->client = new Client();
    }

    public function updatedFilters()
    {
        $this->resetPage();
    }


    public function edit($clientId)
    {
        $this->useCachedRows();
        $this->client = Client::find($clientId);
    }

    public function create()
    {
        $this->useCachedRows();
        $this->client = new Client();
    }

    public function delete($clientId)
    {
        Client::whereKey($clientId)->delete();
        $this->successNotification('Client Has been deleted successfully!');
    }

    public function updateOrCreate()
    {
        $this->validate();
        $this->tempImage && $this->client->image = $this->tempImage->store('/', 'files');
        $this->client->save();
        $this->successNotification('client has been saved successfully!');
    }


    public function resetFilters()
    {
        $this->reset('filters');
    }

    public function getRowsQueryProperty()
    {
        $query = Client::query()
            ->search('title', $this->filters['search'] ?? null);
        $query = $this->applySorting($query);
        return $query;
    }

    public function getRowsProperty()
    {
        return $this->cache(function () {
            return $this->applyPaginatation($this->rowsQuery);
        });
    }

    function render()
    {
        return view('livewire.client-component', [
            'models' => $this->rows,
        ])
            ->extends('layouts.app')
            ->section('content');;
    }
}
