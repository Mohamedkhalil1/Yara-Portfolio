<div>
    @section('title',$pageTitle)
    <x-base.card title="{{ $pageTitle }}">
        {{--PROGRESS BAR--}}
        <x-general.progress-bar/>
        {{--RIGHT ACTIONS--}}
        <x-base.grid class="mb-3">
            {{--SEARCH--}}
            <x-base.grid-col col="3">
                <x-form.input lazy="true" type="text" class="round" name="filters.search"
                              placeholder="search campaigns..."/>
            </x-base.grid-col>
            {{--LEFT ACTIONS--}}
            <x-base.grid-col style="padding-left:3px" col="9">
                {{--NEW--}}
                <x-base.button wire:click="create" style="float: right" data-bs-toggle="modal"
                               data-bs-target="#model">
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

                <x-table.heading style="cursor: pointer" :sortable="true" wire:click="sortBy('idea')" id="desc"
                                 :direction="$sortDirection">
                    Idea
                </x-table.heading>

                <x-table.heading style="cursor: pointer" :sortable="true" wire:click="sortBy('concept')" id="desc"
                                 :direction="$sortDirection">
                    Concept
                </x-table.heading>

                <x-table.heading>
                    Category
                </x-table.heading>


                <x-table.heading>
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
                            {{ $model->idea }}
                        </x-table.cell>

                        <x-table.cell>
                            {{ $model->concept }}
                        </x-table.cell>
                        <x-table.cell>
                            {{ $model->category->title }}
                        </x-table.cell>

                        <x-table.cell>
                              <span wire:click="edit({{$model->id}})" style="cursor: pointer"
                                    data-bs-toggle="modal" data-bs-target="#model">
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
    <x-base.modal id="model" size="lg" formAction="updateOrCreate">
        <x-slot name="title">
            Service
        </x-slot>
        <x-slot name="content">
            <x-base.grid>

                <div class="col-4">
                    <x-form.label title="Category"/>
                </div>
                <x-form.form-group col="8">
                    <x-base.uselect wire:model="campaign.category_id">
                        <x-select.option value="0">Select Category</x-select.option>
                        @foreach($categories as $category)
                            <x-select.option value="{{ $category->id }}">{{ $category->title }}</x-select.option>
                        @endforeach
                    </x-base.uselect>
                </x-form.form-group>

                <div class="col-md-4">
                    <x-form.label title="Title"/>
                </div>
                <x-form.form-group col="8">
                    <x-form.input type="text" lazy class="round" name="campaign.title"/>
                </x-form.form-group>

                <div class="col-md-4">
                    <x-form.label title="Idea"/>
                </div>
                <x-form.form-group col="8">
                    <x-form.input type="text" lazy class="round" name="campaign.idea"/>
                </x-form.form-group>

                <div class="col-md-4">
                    <x-form.label title="Concept"/>
                </div>
                <x-form.form-group col="8">
                    <x-form.input type="text" lazy class="round" name="campaign.concept"/>
                </x-form.form-group>

                <div class="col-md-4">
                    <x-form.label title="Design Image"/>
                </div>
                <x-form.form-group col="8">
                    @if($campaign->image)
                        <x-base.avatar imageUrl="{{ getFile($campaign->image) }}"/>
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


