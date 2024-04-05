<x-app-layout>
    <x-slot name="header">
        <h2 class="">
            {{ __('Create JCP') }}
        </h2>
    </x-slot>
    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <div class="">
            @livewire('system.jcps.j-c-p-create-form')
        </div>
    </div>
</x-app-layout>
