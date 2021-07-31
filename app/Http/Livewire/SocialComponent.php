<?php

namespace App\Http\Livewire;

use App\Http\Livewire\Datatable\WithCachedRows;
use App\Http\Livewire\Datatable\WithPerPagePagination;
use App\Http\Livewire\Datatable\WithSorting;
use App\Models\Social;
use Livewire\Component;

class SocialComponent extends Component
{
    use WithPerPagePagination, WithSorting, WithCachedRows, Notification;

    public string $pageTitle = 'Yoyo Social Media';
    public Social $social;
    protected $listeners = ['refreshSocials', '$refresh'];

    public function rules(): array
    {
        return [
            'social.icon' => 'required|string|max:255',
            'social.url'  => 'required|string|max:255',
        ];
    }

    public function edit($socialId)
    {
        $this->useCachedRows();
        $this->social = Social::find($socialId);
        if (!$this->social) {
            $this->errorNotification('Social Media is not found!');
        }
    }

    public function create()
    {
        $this->useCachedRows();
        $this->social = new Social();
    }

    public function delete($socialId)
    {
        Social::whereKey($socialId)->delete();
        $this->successNotification('Social Has been deleted successfully !');
    }

    public function updateOrCreate()
    {
        $this->validate();
        $this->social->save();
        $this->social = new Social();
        $this->successNotification('Social has been saved successfully!');
    }

    #use cashing in the same request
    public function getRowsQueryProperty()
    {
        return $this->applySorting(Social::query());
    }

    public function getRowsProperty()
    {
        return $this->cache(function () {
            return $this->applyPaginatation($this->rowsQuery);
        });
    }

    public function render()
    {
        return view('livewire.social-component', [
            'models' => $this->rows,
        ])
            ->extends('layouts.app')
            ->section('content');
    }
}
