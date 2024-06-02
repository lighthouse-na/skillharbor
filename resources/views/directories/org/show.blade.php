
<x-app-layout>
    <x-slot name="header">
        <h2 class="">
            {{ __('Organisation Directory') }}
        </h2>
    </x-slot>
    <div class="py-6 px-6">
        <div class="">
            @livewire('system.org.org-table')

        </div>
        <div>

        </div>
    </div>
</x-app-layout>
