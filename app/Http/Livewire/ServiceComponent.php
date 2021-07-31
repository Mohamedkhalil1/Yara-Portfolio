<?php

namespace App\Http\Livewire;

use App\Http\Livewire\Datatable\WithCachedRows;
use App\Http\Livewire\Datatable\WithPerPagePagination;
use App\Http\Livewire\Datatable\WithSorting;
use App\Models\Service;
use Livewire\Component;
use Livewire\WithFileUploads;

class ServiceComponent extends Component
{
    use WithFileUploads, Notification, WithCachedRows, WithPerPagePagination, WithSorting;

    public string $pageTitle = 'Yoyo Services';
    public $service;
    public $tempImage;
    protected $queryString = ['filters'];
    public array $filters = [
        'search' => '',
    ];
    protected $listeners = ['refreshServices' => '$refresh'];

    public function rules(): array
    {
        return [
            'service.title' => 'required|string|max:255',
            'service.desc'  => 'required|string|max:64000',
            'service.image' => 'nullable|string|max:255',
        ];
    }

    public function mount()
    {
        $this->service = new Service();
    }

    public function updatedFilters()
    {
        $this->resetPage();
    }


    public function edit($serviceId)
    {
        $this->useCachedRows();
        $this->service = Service::find($serviceId);
    }

    public function create()
    {
        $this->useCachedRows();
        $this->service = new Service();
    }

    public function delete($serviceId)
    {
        Service::whereKey($serviceId)->delete();
        $this->service = new Service();
        $this->successNotification('Service Has been deleted successfully !');
    }

    public function updateOrCreate()
    {
        $this->validate();
        $this->tempImage && $this->service->image = $this->tempImage->store('/', 'files');
        $this->service->save();
        $this->successNotification('service has been saved successfully!');
    }


    public function resetFilters()
    {
        $this->reset('filters');
    }

    public function getRowsQueryProperty()
    {
        $query = Service::query()
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
        return view('livewire.service-component', [
            'models' => $this->rows,
        ])
            ->extends('layouts.app')
            ->section('content');;
    }
}
