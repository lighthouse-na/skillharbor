<x-app-layout>
    <x-slot name="header">
        <h2 class="">
            {{ __('Supervise') }}
        </h2>
    </x-slot>
    <div class="py-6">
        @livewire('supervise.select-assessment')

    </div>
</x-app-layout>
