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
            {{--LEFT ACTIONS--}}
            <x-base.grid-col style="padding-left:3px" col="12">
                {{--NEW--}}
                <x-base.button wire:click="create" style="float: right" data-bs-toggle="modal"
                               data-bs-target="#brand">
                    <x-icons.add/>
                    New
                </x-base.button>
            </x-base.grid-col>
        </x-base.grid>
        <x-base.grid>

            @foreach($models as $model)
                <x-base.grid-col>
                    <x-base.card>
                        <x-card.content>
                            <x-base.button wire:click="delete('{{$model->id}}')" style="float:right"
                                           class="danger me-1 mb-1">
                                <x-icons.cut/>
                            </x-base.button>
                            <x-form.form-group col="12">
                                <img class="card-img-top img-fluid center" src="{{ getFile($model->image) }}"/>
                            </x-form.form-group>
                        </x-card.content>
                    </x-base.card>
                </x-base.grid-col>
            @endforeach
        </x-base.grid>
    </x-base.card>
    {{--MODAL--}}
    <x-base.modal id="brand" size="lg" formAction="updateOrCreate">
        <x-slot name="title">
            Service
        </x-slot>
        <x-slot name="content">
            <x-base.grid>
                <div class="col-md-4">
                    <x-form.label :required="false" title="Image"/>
                </div>
                <x-form.form-group col="8">
                    @if($brand->image)
                        <x-base.avatar imageUrl="{{ getFile($brand->image) }}"/>
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


