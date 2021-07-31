<div>
    @section('title',$pageTitle)
    <x-base.card title="{{ $pageTitle }}">
        {{--PROGRESS BAR--}}
        <x-general.progress-bar/>
        {{--RIGHT ACTIONS--}}
        <x-base.grid class="mb-3">
            <x-base.grid-col style="padding-left:3px" col="12">
                {{--NEW--}}
                <x-base.button wire:click="create" style="float: right" data-bs-toggle="modal"
                               data-bs-target="#model">
                    <x-icons.add/>
                    New
                </x-base.button>
                {{--BulkACTIONS--}}
            </x-base.grid-col>
        </x-base.grid>

        {{--Table--}}
        <x-base.table class="border">
            <x-slot name="head">
                <x-table.heading style="cursor: pointer" :sortable="true" wire:click="sortBy('icon')" id="icon"
                                 :direction="$sortDirection">
                    Title
                </x-table.heading>

                <x-table.heading>
                    Actions
                </x-table.heading>
            </x-slot>
            <x-slot name="body">
                @forelse($models as $model)
                    <x-table.row wire:key="{{ $model->id }}">
                        <x-table.cell>
                            <a href="{{ $model->url }}" target="_blank">
                                {{ \App\Enums\SocialMedia::name($model->icon) }}
                            </a>
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
                                no social media found...
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
            Category
        </x-slot>
        <x-slot name="content">
            <x-base.grid>
                <div class="col-4">
                    <x-form.label title="Category"/>
                </div>
                <x-form.form-group col="8">
                    <x-base.uselect wire:model="social.icon">
                        <x-select.option value="0">Select Socail Media</x-select.option>
                        @foreach(\App\Enums\SocialMedia::keyValue() as $socialMedia)
                            <x-select.option value="{{ $socialMedia['id'] }}">{{ $socialMedia['name'] }}</x-select.option>
                        @endforeach
                    </x-base.uselect>
                </x-form.form-group>

                <div class="col-md-4">
                    <x-form.label title="Url"/>
                </div>
                <x-form.form-group col="8">
                    <x-form.input type="text" lazy class="round"
                                  name="social.url">
                    </x-form.input>
                </x-form.form-group>
            </x-base.grid>
        </x-slot>
        <x-slot name="footer">
            <x-base.button type="submit" @click="document.getElementById('form-id').submit()">Save</x-base.button>
        </x-slot>

    </x-base.modal>

</div>


