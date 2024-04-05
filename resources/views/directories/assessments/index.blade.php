
<x-app-layout>
    <x-slot name="header">
        <h2 class="">
            {{ __('Assesments Directory') }}
        </h2>
    </x-slot>
    <div class="py-6 px-6">
        <div class="">
            @livewire('system.assessments.assessments-table')
        </div>
    </div>
</x-app-layout>
