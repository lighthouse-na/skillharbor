<x-app-layout>

    <x-slot name="header">
        <h2 class=" ">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="m-0">
        <div class="">
            <div class="overflow-hidden">
                @livewire('dashboard.dash-info')

            </div>
        </div>
    </div>
</x-app-layout>
