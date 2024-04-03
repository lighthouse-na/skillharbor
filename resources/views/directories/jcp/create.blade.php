<x-app-layout>
    <x-slot name="header">
        <h2 class="">
            {{ __('Create JCP') }}
        </h2>
    </x-slot>
    <div class="py-6 px-6">
        <div class="">
            @livewire('system.jcps.j-c-p-create-form')
        </div>
    </div>
</x-app-layout>
