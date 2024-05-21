@php
use Illuminate\Support\Facades\Crypt;
@endphp
<x-app-layout>
<div class="mt-6 max-w-lg mx-auto">
    <form action="{{ route('assessments.update', Crypt::decryptString($encryptedId)) }}" method="POST">
        
        @method('PUT')
        @csrf

        <div class="mb-4">
            <label for="assessment_title" class="block text-sm font-medium text-gray-700">Assessment Name</label>
            <input type="text" name="assessment_title" id="assessment_title" value="{{ $assessment->assessment_title }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
        </div>

        <!-- Add more fields as needed -->

        <div class="mt-4 flex justify-center">
            <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Update Assessment
            </button>
        </div>
    </form>
</div>
</x-app-layout>
