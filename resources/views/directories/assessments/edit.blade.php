<x-app-layout>
    <div class="mt-6 w-full mx-auto md:grid md:grid-cols-3 md:gap-6">
        <x-section-title>
            <x-slot name="title">Edit Assessment</x-slot>
            <x-slot name="description">Update the details of the assessment below.</x-slot>
        </x-section-title>

        <div class="mt-5 md:mt-0 md:col-span-2">
            <form action="{{ route('assessments.update', Crypt::encrypt($assessment->id)) }}" method="POST">
                @csrf
                @method('PATCH')

                <!-- Form Fields Wrapper -->
                <div class="px-4 py-5 bg-white border dark:bg-gray-800 sm:p-6 sm:rounded-tl-md sm:rounded-tr-md">
                    <div class="grid grid-cols-6 gap-6">
                        <div class="col-span-6">
                            <label for="assessment_title" class="block text-sm font-medium text-gray-700">Assessment Name</label>
                            <input type="text" name="assessment_title" id="assessment_title"
                                   value="{{ $assessment->assessment_title }}"
                                   class="mt-1 focus:ring-sky-500 focus:border-sky-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                   required>
                        </div>

                        <div class="col-span-6">
                            <label for="closing_date" class="block text-sm font-medium text-gray-700">Assessment Closing Date</label>
                            <input type="datetime-local" value="{{ $assessment->closing_date }}" name="closing_date" id="closing_date" min="{{ Carbon\Carbon::today() }}"
                                   class="mt-1 focus:ring-sky-500 focus:border-sky-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                   required>
                        </div>

                        <div class="col-span-6 border p-4 rounded-md shadow-sm">
                            <label for="department_ids" class="block text-sm font-medium text-gray-700 mb-4">Departments Enrolled in Audit</label>
                            <label class="inline-flex items-center">
                                <input type="checkbox" class="form-checkbox" id="select-all">
                                <span class="ml-2 text-sky-800">Select All Departments</span>
                            </label>
                            <div class="mt-1 grid grid-cols-3 gap-4 ml-4 mt-2">
                                @foreach ($divisions as $division)
                                    <div class="p-4">
                                        <h1 class="text-sky-800 text-lg border-b">{{ $division->division_name }}</h1>
                                        <div>
                                            @foreach ($division->departments as $department)
                                                <div class="mb-2">
                                                    <label class="inline-flex items-center">
                                                        <input type="checkbox" name="department_ids[]"
                                                               value="{{ $department->id }}"
                                                               class="form-checkbox department-checkbox active:bg-sky-500"
                                                               {{ in_array($department->id, $enrolledDepartmentIds) ? 'checked' : '' }}>
                                                        <span class="ml-2">{{ $department->department_name }}</span>
                                                    </label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Actions Section -->
                <div class="flex items-center justify-end px-4 py-3 bg-gray-50 dark:bg-gray-800 text-end sm:px-6 border sm:rounded-bl-md sm:rounded-br-lg">
                    <button type="submit"
                            class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-sky-600 hover:bg-sky-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-sky-500">
                        Update Assessment
                    </button>
                </div>
            </form>
        </div>
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
