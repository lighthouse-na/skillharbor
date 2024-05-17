<x-app-layout>

    <x-slot name="header">
        <h2 class=" ">
            {{ __('Reports') }}
        </h2>
    </x-slot>
    <div class="">
        <div class="ml-4">
            <div class="bg-white dark:bg-gray-800 overflow-hidden">
                @livewire('reports.select-reports')
            </div>
        </div>
    </div>
</x-app-layout>
