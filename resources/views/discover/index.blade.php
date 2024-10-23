<x-app-layout>

    <x-slot name="header">
        <h2 class=" ">
            {{ __('Discover') }}
        </h2>
    </x-slot>
    <div class="pt-6">
        <div class="">
            <div class="">
                @livewire('discover.home')

            </div>
        </div>
    </div>
</x-app-layout>
