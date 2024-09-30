<div>
    <x-form-section submit="save">
        <x-slot name="title">
            {{ __('Qualification Information') }}
        </x-slot>

        <x-slot name="description">
            {{ __('Update your systems qualification database.') }}
        </x-slot>

        <x-slot name="form">
            <!-- Profile Photo -->

            <!-- Name -->
            <div class="col-span-6 sm:col-span-4">
                <x-label for="qualification_title" value="{{ __('Qualification Title') }}" />
                <x-input id="qualification_title" type="text" class="mt-1 block w-full" wire:model="state.qualification_title" required autocomplete="qualification_title" />
                <x-input-error for="qualification_title" class="mt-2" />
            </div>

        </x-slot>

        <x-slot name="actions">
            <x-action-message class="me-3" on="saved">
                {{ __('Saved.') }}
            </x-action-message>

            <x-button wire:loading.attr="disabled">
                {{ __('Save') }}
            </x-button>
        </x-slot>
    </x-form-section>

 </div>
