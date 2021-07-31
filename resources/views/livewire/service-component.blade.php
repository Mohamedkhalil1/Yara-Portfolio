<div>
    @push('head')
        <style>
            .loading-bar {
                position: fixed;
                height: 2px;
                left: 0;
                top: 0;
                width: 100%;
                z-index: 10000;
            }
        </style>
    @endpush
    @section('title',$pageTitle)
    <x-base.card title="{{ $pageTitle }}">
        {{--PROGRESS BAR--}}
        <x-base.grid>
            <x-base.grid-col col="12">
                <div wire:loading.flex class="progress progress-primary loading-bar">
                    <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar"
                         style="width: 100%"
                         aria-valuenow="100"
                         aria-valuemin="0"
                         aria-valuemax="100">
                    </div>
                </div>
            </x-base.grid-col>
        </x-base.grid>

        {{--RIGHT ACTIONS--}}
        <x-base.grid class="mb-3">
            {{--SEARCH--}}
            <x-base.grid-col col="3">
                <x-form.input lazy="true" type="text" class="round" name="filters.search"
                              placeholder="Search services..."/>
            </x-base.grid-col>
            {{--ADVANCED SEARCH--}}
            <x-base.grid-col col="3" style="margin-top: 7px">
                <span wire:click="toggleAdvancedSearch()" style="cursor: pointer">

               </span>
            </x-base.grid-col>

            {{--LEFT ACTIONS--}}
            <x-base.grid-col style="padding-left:3px" col="6">
                {{--NEW--}}
                <x-base.button wire:click="create" style="float: right" data-bs-toggle="modal"
                               data-bs-target="#service">
                    <x-icons.add/>
                    New
                </x-base.button>

            </x-base.grid-col>
        </x-base.grid>
        {{--Table--}}
        <x-base.table class="border">
            <x-slot name="head">

                <x-table.heading>
                    Image
                </x-table.heading>

                <x-table.heading style="cursor: pointer" :sortable="true" wire:click="sortBy('title')" id="title"
                                 :direction="$sortDirection">
                    Title
                </x-table.heading>

                <x-table.heading style="cursor: pointer" :sortable="true" wire:click="sortBy('desc')" id="desc"
                                 :direction="$sortDirection">
                    Description
                </x-table.heading>

                <x-table.heading :sortable="false">
                    Actions
                </x-table.heading>
            </x-slot>

            <x-slot name="body">
                @forelse($models as $model)
                    <x-table.row wire:key="{{ $model->id }}">
                        <x-table.cell>
                            @if(isset($model->image) && $model->image)
                                <a target="_blank" href="{{ getFile($model->image)  }}">
                                    <x-base.avatar imageUrl="{{ getFile($model->image) }}"/>
                                </a>
                            @endif
                        </x-table.cell>
                        <x-table.cell>
                            {{ $model->title }}
                        </x-table.cell>

                        <x-table.cell>
                            {{ $model->desc }}
                        </x-table.cell>

                        <x-table.cell>
                              <span wire:click="edit({{$model->id}})" style="cursor: pointer"
                                    data-bs-toggle="modal" data-bs-target="#service">
                                  <x-icons.edit/>
                              </span>

                            <a href="javascript:" title="delete" style="cursor: pointer" class="text-muted"
                               onclick="confirm('are you sure ?') || event.stopImmediatePropagation()"
                               wire:click="delete({{$model->id}})">
                                <x-icons.delete class="text-muted"/>
                            </a>
                        </x-table.cell>
                    </x-table.row>
                @empty
                    <x-table.row>
                        <x-table.cell colspan="6">
                            <div class="text-center text-muted text-uppercase">
                                No services found...
                            </div>
                        </x-table.cell>
                    </x-table.row>
                @endforelse
            </x-slot>
        </x-base.table>
        <div>
            <nav aria-label="Page navigation example">
                <ul class="pagination pagination-primary">
                    {{ $models->links() }}
                </ul>
            </nav>
        </div>
    </x-base.card>
    {{--MODAL--}}
    <x-base.modal id="service" size="lg" formAction="updateOrCreate">
        <x-slot name="title">
            Service
        </x-slot>
        <x-slot name="content">
            <x-base.grid>
                <div class="col-md-4">
                    <x-form.label :required="false" title="Title"/>
                </div>
                <x-form.form-group col="8">
                    <x-form.input type="text" lazy class="round" name="service.title"/>
                </x-form.form-group>

                <div class="col-md-4">
                    <x-form.label title="Description"/>
                </div>
                <x-form.form-group col="8">
                    <x-form.textarea wire:model="service.desc" title="Description ..."/>
                </x-form.form-group>

                <div class="col-md-4">
                    <x-form.label :required="false" title="Image"/>
                </div>
                <x-form.form-group col="8">
                    @if($service->image)
                        <x-base.avatar imageUrl="{{ getFile($service->image) }}"/>
                    @endif
                    <input type="file" wire:model="tempImage"/>
                    <span class="text-danger" style="display: inline-block">
                        @error("tempImage") {{ $message }} @enderror
                    </span>
                </x-form.form-group>

            </x-base.grid>
        </x-slot>
        <x-slot name="footer">
            <x-base.button type="submit" @click="document.getElementById('form-id').submit()">Save</x-base.button>
        </x-slot>

    </x-base.modal>

</div>


