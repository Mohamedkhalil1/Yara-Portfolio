<div>
    @section('title',$pageTitle)
    <x-base.card title="{{ $pageTitle }}">
        <x-form.form action="save" :isHorizontal="true">

            <div class="col-md-4">
                <x-form.label title="Title"/>
            </div>
            <x-form.form-group col="8">
                <x-form.input lazy="true" name="info.title" type="text" placeholder="title..."/>
            </x-form.form-group>

            <div class="col-md-4">
                <x-form.label title="About Yoyo"/>
            </div>
            <x-form.form-group col="8">
                <x-form.textarea wire:model="info.about_you" title="about yoyo ..."/>
            </x-form.form-group>

            <div class="col-md-4">
                <x-form.label :required="false" title="Image"/>
            </div>
            <x-form.form-group col="8">
                @if($info->image)
                    <x-base.avatar imageUrl="{{ getFile($info->image) }}"/>
                @endif
                <x-form.upload-photo name="tempImage"/>
            </x-form.form-group>


            <div class="col-sm-12 d-flex justify-content-end">
                <x-base.button type="submit" class="primary me-1 mb-1">
                    Submit
                </x-base.button>
            </div>
        </x-form.form>
    </x-base.card>
</div>

