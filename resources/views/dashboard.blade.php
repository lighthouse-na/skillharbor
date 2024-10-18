<x-app-layout>

    <x-slot name="header">
        <h2 class=" ">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="pt-6 mt-0">
        <div class="">
            <div class="bg-gray-100 overflow-hidden">
                @livewire('dashboard.dash-info')

            </div>
        </div>
    </div>
</x-app-layout>
