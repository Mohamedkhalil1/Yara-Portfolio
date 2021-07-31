<div>
    @section('title',$pageTitle)

        <x-base.grid>
            <x-base.grid-col>
                <x-base.card title="ARTISAN">
                    <x-form.form action="artisan" :isHorizontal="true">
                        <div class="col-md-4">
                            <x-form.label title="Laravel"/>
                        </div>
                        <x-form.form-group col="8">
                            <x-base.uselect required wire:model="laravelCommand">
                                <x-select.option value="asd">select laravel command</x-select.option>
                                @foreach(\App\Enums\Commands::keyValue() as $command)
                                    <x-select.option
                                        value="{{ \App\Enums\Commands::getCommand($command['id']) }}">{{ $command['name'] }}</x-select.option>
                                @endforeach
                            </x-base.uselect>
                        </x-form.form-group>
                        <div class="col-sm-12 d-flex justify-content-end">
                            <x-base.button type="submit" class="primary me-1 mb-1">
                                Submit
                            </x-base.button>
                        </div>
                    </x-form.form>
                </x-base.card>
            </x-base.grid-col>

            <x-base.grid-col>
                <x-base.card title="COMPOSER">
                    <x-form.form action="composer" :isHorizontal="true">
                        <div class="col-4">
                            <x-form.label title="Composer"/>
                        </div>
                        <x-form.form-group col="8">
                            <x-base.uselect required wire:model="composerCommand">
                                <x-select.option  value="asd">select composer command</x-select.option>
                                @foreach(\App\Enums\Composer::keyValue() as $composer)
                                    <x-select.option
                                        value="{{ \App\Enums\Composer::getCommand($composer['id']) }}">{{ $composer['name'] }}</x-select.option>
                                @endforeach
                            </x-base.uselect>
                        </x-form.form-group>
                        <div class="col-sm-12 d-flex justify-content-end">
                            <x-base.button type="submit" class="primary me-1 mb-1">
                                Submit
                            </x-base.button>
                        </div>
                    </x-form.form>
                </x-base.card>
            </x-base.grid-col>
        </x-base.grid>

</div>
