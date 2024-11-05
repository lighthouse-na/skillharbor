    <x-form-section submit="save">
        <x-slot name="title">
            {{ __('Qualification Information') }}
        </x-slot>

        <x-slot name="description">
            {{ __('Update the systems qualification database.') }}
        </x-slot>

    <x-slot name="form">
        <div class="col-span-6 sm:col-span-12">
            <!-- Bind form submission to Livewire save method -->
                <!-- Form Fields Wrapper -->
                <div class="px-4 py-5 bg-white border dark:bg-gray-800 sm:p-6 sm:rounded-tl-md sm:rounded-tr-md">
                    <div class="grid grid-cols-6 gap-6">
                        <div class="col-span-6">
                            <label for="qualification_title" class="block text-sm font-medium text-gray-700">Qualification Title</label>
                            <input type="text" wire:model="qualification_title" id="qualification_title"
                                   class="mt-1 focus:ring-sky-500 focus:border-sky-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                   required>
                            @error('qualification_title') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>

            </x-slot>
        <x-slot name="actions">
            <x-action-message class="me-3" on="saved">
                {{ __('Saved.') }}
            </x-action-message>

            <x-button wire:loading.attr="enabled">
                {{ __('Save') }}
            </x-button>
        </x-slot>
    </x-form-section>
