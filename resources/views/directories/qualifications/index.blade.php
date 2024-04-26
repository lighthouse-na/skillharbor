
<x-app-layout>
    <x-slot name="header">
        <h2 class="">


            {{ __('Qualifications Directory') }}

        </h2>
    </x-slot>
    <div class="py-6 px-6">
        <div class="">
            @livewire('system.qualifications.qualifications-table')
        </div>
    </div>
</x-app-layout>
