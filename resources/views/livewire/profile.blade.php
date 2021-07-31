<div>
    @section('title',$pageTitle)
    <x-base.card title="{{ $pageTitle }}">
        <x-form.form action="save" :isHorizontal="true">
            <div class="col-md-4">
                <x-form.label title="Name"/>
            </div>
            <x-form.form-group col="8" hasIcon>
                <x-form.input lazy="true" name="profile.name" type="text" placeholder="Yoyo name .."
                              rightIcon="bi bi-person"/>
            </x-form.form-group>

            <div class="col-md-4">
                <x-form.label title="Title"/>
            </div>
            <x-form.form-group col="8">
                <x-form.input lazy="true" name="profile.title" type="text" placeholder="Yoyo title..."/>
            </x-form.form-group>

            <div class="col-md-4">
                <x-form.label title="Experience"/>
            </div>
            <x-form.form-group col="8">
                <x-form.input lazy="true" name="profile.experience" type="number" placeholder="Yoyo experience..."
                              inputGroupText="Years"
                />
            </x-form.form-group>

            <div class="col-md-4">
                <x-form.label title="Phone"/>
            </div>
            <x-form.form-group col="8">
                <x-form.input lazy="true" name="profile.phone" type="text" placeholder="Yoyo phone..."/>
            </x-form.form-group>

            <div class="col-md-4">
                <x-form.label :required="false" title="CV"/>
            </div>
            <x-form.form-group col="8">
                @if($profile->cv)
                    <a href="{{ getFile($profile->cv) }}" class="btn btn-primary mb-3" target="_blank">
                        <x-icons.download/>
                    </a>
                    <br>
                @endif
                <input type="file" wire:model="tempCV"/>
                <span class="text-danger" style="display: inline-block">
                    @error("tempCV") {{ $message }} @enderror
                </span>
            </x-form.form-group>

            <div class="col-md-4">
                <x-form.label :required="false" title="Logo"/>
            </div>
            <x-form.form-group col="8">
                @if($profile->logo)
                    @if($profile->logo)
                        <a href="{{ getFile($profile->logo) }}" target="_blank">
                            <x-base.avatar imageUrl="{{ getFile($profile->logo) }}"/>
                        </a>
                        <br>
                    @endif
                @endif
                <input type="file" wire:model="tempLogo"/>
                <span class="text-danger" style="display: inline-block">
                    @error("tempLogo") {{ $message }} @enderror
                </span>
            </x-form.form-group>

            <div class="col-md-4">
                <x-form.label :required="false" title="Image"/>
            </div>

            <x-form.form-group col="8">
                @if($profile->image)

                    <x-base.avatar imageUrl="{{ getFile($profile->image) }}"/>
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

