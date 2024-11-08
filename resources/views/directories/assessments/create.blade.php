<x-app-layout>
    <div class="mt-6 w-full mx-auto">
        <x-validation-errors class="mb-4" />

        @session('status')
        <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
            {{ $value }}
        </div>
    @endsession

        <form action="{{ route('assessments.store') }}" method="POST">
            @csrf

            <x-form-section submit="assessments.store">

                <x-slot name="title">Create New Assessment</x-slot>
                <x-slot name="description">Fill in the details below to create a new assessment.</x-slot>

                <x-slot name="form">
                    <div class="mb-4 col-span-6 ">
                        <label for="assessment_title" class="block text-sm font-medium text-gray-700">Assessment Name</label>
                        <input type="text" name="assessment_title" id="assessment_title" class="mt-1 focus:ring-sky-500 focus:border-sky-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" placeholder="Enter Assessment Name" required>


                    </div>
                    <div class="mb-4 col-span-6">
                        <label for="closing_date" class="block text-sm font-medium text-gray-700">Assessment Closing Date</label>
                        <input type="datetime-local" name="closing_date" id="closing_date" min="{{Carbon\Carbon::today()}}" class="mt-1 focus:ring-sky-500 focus:border-sky-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>

                    <div class="mb-4 col-span-12 border p-4 rounded-md shadow-sm">
                        <label for="department_ids" class="block text-sm font-medium text-gray-700 mb-4">Departments to Enroll in Audit</label>
                        <label class="inline-flex items-center">
                            <input type="checkbox" class="form-checkbox" id="select-all">
                            <span class="ml-2 text-sky-800">Select All Departments</span>
                        </label>
                        <div class="mt-1 grid grid-cols-3 gap-4 ml-4 mt-2">
                            @foreach($divisions as $division)
                                <div class="p-4">
                                    <h1 class="text-sky-800 text-lg border-b">{{ $division->division_name }}</h1>
                                    <div>
                                        @foreach($division->departments as $department)
                                            <label class="inline-flex items-center">
                                                <input type="checkbox" name="department_ids[]" value="{{ $department->id }}" class="form-checkbox department-checkbox active:bg-sky-500" data-division-id="{{ $division->id }}">
                                                <span class="ml-2">{{ $department->department_name }}</span>
                                            </label>
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </x-slot>

                <x-slot name="actions">
                    <div class="mt-4 flex justify-center">
                        <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-sky-600 hover:bg-sky-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-sky-500">
                            Create New Assessment
                        </button>
                    </div>
                </x-slot>
            </x-form-section>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const selectAllCheckbox = document.getElementById('select-all');
            const departmentCheckboxes = document.querySelectorAll('.department-checkbox');

            selectAllCheckbox.addEventListener('change', function () {
                departmentCheckboxes.forEach(function (departmentCheckbox) {
                    departmentCheckbox.checked = selectAllCheckbox.checked;
                });
            });

            departmentCheckboxes.forEach(function (departmentCheckbox) {
                departmentCheckbox.addEventListener('change', function () {
                    if (!this.checked) {
                        selectAllCheckbox.checked = false;
                    } else {
                        const allChecked = Array.from(departmentCheckboxes).every(checkbox => checkbox.checked);
                        if (allChecked) {
                            selectAllCheckbox.checked = true;
                        }
                    }
                });
            });
        });
    </script>
</x-app-layout>
