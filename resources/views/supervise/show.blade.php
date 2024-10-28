<x-app-layout>
    <x-slot name="header">
        <h2 class="">
            {{ __('Supervise') }}
        </h2>
    </x-slot>
    <div class="py-6 px-6">
        <livewire:supervise.completed-assessments-table :assessment_id="$assessment->id" />
    </div>
</x-app-layout>
