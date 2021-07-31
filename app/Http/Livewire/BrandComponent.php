<?php

namespace App\Http\Livewire;

use App\Http\Livewire\Datatable\WithCachedRows;
use App\Http\Livewire\Datatable\WithPerPagePagination;
use App\Models\Brand;
use Livewire\Component;
use Livewire\WithFileUploads;

class BrandComponent extends Component
{
    use WithFileUploads, Notification, WithCachedRows, WithPerPagePagination;

    public string $pageTitle = 'Yoyo Brands';
    public $brand;
    public $tempImage;

    protected $listeners = ['refreshBrands' => '$refresh'];

    public function rules(): array
    {
        return [
            'brand.image' => 'nullable|string|max:255',
            'tempImage'   => 'required|image',
        ];
    }

    public function mount()
    {
        $this->brand = new Brand();
    }

    public function edit($brandId)
    {
        $this->useCachedRows();
        $this->brand = Brand::find($brandId);
    }

    public function create()
    {
        $this->useCachedRows();
        $this->brand = new Brand();
    }

    public function delete($brandId)
    {
        Brand::whereKey($brandId)->delete();
        $this->successNotification('Brand Has been deleted successfully!');
    }

    public function updateOrCreate()
    {
        $this->validate();
        $this->tempImage && $this->brand->image = $this->tempImage->store('/', 'files');
        $this->brand->save();
        $this->brand = new Brand();
        $this->successNotification('Brand has been saved successfully!');
    }

    public function getRowsProperty()
    {
        return $this->cache(function () {
            return $this->applyPaginatation(Brand::query());
        });
    }

    function render()
    {
        return view('livewire.brand-component', [
            'models' => $this->rows,
        ])
            ->extends('layouts.app')
            ->section('content');
    }
}
