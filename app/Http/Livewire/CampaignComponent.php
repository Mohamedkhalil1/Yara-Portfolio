<?php

namespace App\Http\Livewire;

use App\Http\Livewire\Datatable\WithCachedRows;
use App\Http\Livewire\Datatable\WithPerPagePagination;
use App\Http\Livewire\Datatable\WithSorting;
use App\Models\Campaign;
use App\Models\Category;
use App\Models\Service;
use Livewire\Component;
use Livewire\WithFileUploads;

class CampaignComponent extends Component
{

    use WithFileUploads, Notification, WithCachedRows, WithPerPagePagination, WithSorting;

    public string $pageTitle = 'Yoyo Campaigns';
    public Campaign $campaign;
    public $tempImage;
    public $categories;
    protected $queryString = ['filters'];
    public array $filters = [
        'search' => '',
    ];
    protected $listeners = ['refreshCampaigns' => '$refresh'];

    public function rules(): array
    {
        return [
            'campaign.title'       => ['required', 'string', 'max:255'],
            'campaign.idea'        => ['required', 'string', 'max:255'],
            'campaign.concept'     => ['required', 'string', 'max:255'],
            'campaign.image'       => ['nullable', 'string', 'max:255'],
            'campaign.category_id' => ['required', 'exists:categories,id'],
            'tempImage'            => ['nullable', 'image', 'max:1024'],
        ];
    }

    public function mount()
    {
        $this->campaign = new Campaign();
    }


    public function edit($campaignId)
    {
        $this->useCachedRows();
        $this->campaign = Campaign::find($campaignId);
    }

    public function create()
    {
        $this->useCachedRows();
        $this->campaign = new Campaign();
    }

    public function delete($campaignId)
    {
        Campaign::whereKey($campaignId)->delete();
        $this->successNotification('Campaign Has been deleted successfully !');
    }

    public function updateOrCreate()
    {
        $this->validate();
        $this->tempImage && $this->campaign->image = $this->tempImage->store('/', 'files');
        $this->campaign->save();
        $this->successNotification('Campaign has been saved successfully!');
    }

    public function getRowsQueryProperty()
    {
        $query = Campaign::query()
            ->with('category')
            ->search('title', $this->filters['search'] ?? null);
        return $this->applySorting($query);
    }

    public function getRowsProperty()
    {
        return $this->cache(function () {
            return $this->applyPaginatation($this->rowsQuery);
        });
    }

    function render()
    {
        if (!$this->categories) {
            $this->categories = Category::all();
        }
        return view('livewire.campaign-component', [
            'models' => $this->rows,
        ])
            ->extends('layouts.app')
            ->section('content');
    }
}
