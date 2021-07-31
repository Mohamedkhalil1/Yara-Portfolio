<?php

namespace App\Http\Livewire;

use App\Http\Livewire\Datatable\WithCachedRows;
use App\Http\Livewire\Datatable\WithPerPagePagination;
use App\Http\Livewire\Datatable\WithSorting;
use App\Models\Category;
use Livewire\Component;

class CategoryComponent extends Component
{
    use WithPerPagePagination, WithSorting, WithCachedRows, Notification;

    public string $pageTitle = 'Yoyo Campaigns Categories';
    public Category $category;
    protected $queryString = ['filters'];
    protected $listeners = ['refreshCategories', '$refresh'];
    public array $filters = [
        'title' => '',
    ];

    public function rules(): array
    {
        return [
            'category.title' => 'required|string|max:255',
        ];
    }

    public function edit($categoryId)
    {
        $this->useCachedRows();
        $this->category = Category::find($categoryId);
        if (!$this->category) {
            $this->errorNotification('Category is not found!');
        }
    }

    public function create()
    {
        $this->useCachedRows();
        $this->category = new Category();
    }

    public function delete($categoryId)
    {
        Category::whereKey($categoryId)->delete();
        $this->successNotification('Category Has been deleted successfully !');
    }

    public function updateOrCreate()
    {
        $this->validate();
        $this->category->save();
        $this->category = new Category();
        $this->successNotification('Category has been saved successfully!');
    }


    #use cashing in the same request
    public function getRowsQueryProperty()
    {
        $query = Category::query()
            ->search('title', $this->filters['search'] ?? null);
        return $this->applySorting($query);
    }

    public function getRowsProperty()
    {
        return $this->cache(function () {
            return $this->applyPaginatation($this->rowsQuery);
        });
    }

    public function render()
    {
        return view('livewire.category-component', [
            'models' => $this->rows,
        ])
            ->extends('layouts.app')
            ->section('content');
    }
}
