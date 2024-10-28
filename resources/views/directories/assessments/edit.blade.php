<x-app-layout>
    <div class="mt-6 w-full mx-auto">
        <x-form-section submit="{{ route('assessments.update', Crypt::encrypt($assessment->id)) }}">
            <x-slot name="title">Edit Assessment</x-slot>
            <x-slot name="description">Update the details of the assessment below.</x-slot>

            <x-slot name="form">
                <div class="mb-4 col-span-6 ">
                    <label for="assessment_title" class="block text-sm font-medium text-gray-700">Assessment Name</label>
                    <input type="text" name="assessment_title" id="assessment_title"
                        value="{{ $assessment->assessment_title }}"
                        class="mt-1 focus:ring-sky-500 focus:border-sky-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                        required>
                </div>
                <div class="mb-4 col-span-12">
                    <label for="department_ids" class="block text-sm font-medium text-gray-700">Departments</label>
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
                                                    data-division-id="{{ $division->id }}"
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

                <!-- Add more fields as needed -->
            </x-slot>

            <x-slot name="actions">
                <div class="mt-4 flex justify-center">
                    <button type="submit"
                        class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-sky-600 hover:bg-sky-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-sky-500">
                        Update Assessment
                    </button>
                </div>
            </x-slot>
        </x-form-section>
    </div>
</x-app-layout>
