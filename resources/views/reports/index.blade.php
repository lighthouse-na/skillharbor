<x-app-layout>

    <x-slot name="header">
        <h2 class=" ">
            {{ __('Reports') }}
        </h2>
    </x-slot>
    <div class="">
            <div class="py-6 px-6">
                @livewire('reports.select-reports')
            </div>

    </div>
</x-app-layout>
