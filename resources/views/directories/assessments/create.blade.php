@php
use Illuminate\Support\Facades\Crypt;
@endphp
<x-app-layout>
    <div class="mt-6 max-w-lg mx-auto">
        <!-- Form for creating a new assessment -->
        <form action="{{ route('assessments.store') }}" method="POST">
            @csrf
            
            <div class="mb-4">
                <label for="assessment_title" class="block text-sm font-medium text-gray-700">Assessment Name</label>
                <input type="text" name="assessment_title" id="assessment_title" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" placeholder="Enter Assessment Name">
            </div>

            <!-- Add more fields as necessary -->

            <div class="mt-4 flex justify-center">
                <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                    Create New Assessment
                </button>
            </div>
        </form>
    </div>
</x-app-layout>


<x-app-layout>
    <div class="mt-6 max-w-lg mx-auto">
        <!-- Create Button -->
        <div class="mt-4 flex justify-center">
            <a href="{{ route('directories.assessments.create') }}" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                Create New Assessment
            </a>
        </div>
    </div>
</x-app-layout>
