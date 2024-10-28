<x-app-layout>
    <div class="mt-6 max-w-lg mx-auto">
        <!-- Form for creating a new assessment -->
        <form action="{{ route('assessments.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label for="assessment_title" class="block text-sm font-medium text-gray-700">Assessment Name</label>
                <input type="text" name="assessment_title" id="assessment_title" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" placeholder="Enter Assessment Name">
            </div>

            <div class="mb-4">
                <label for="department_ids" class="block text-sm font-medium text-gray-700">Departments</label>
                <label class="inline-flex items-center">
                    <input type="checkbox" class="form-checkbox" id="select-all">
                    <span class="ml-2">Select All Departments</span>
                </label>
                <div class="mt-1 grid grid-cols-2 gap-4 ml-4 mt-2">
                    @foreach($divisions as $division)
                        <div class="border shadow-md p-4 rounded-3xl"><h1 class="font-bold text-sky-800 text-lg" >{{ $division->division_name }}</h1>

                        <div class="">
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

            <div class="mt-4 flex justify-center">
                <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-sky-600 hover:bg-sky-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-sky-500">
                    Create New Assessment
                </button>
            </div>
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
