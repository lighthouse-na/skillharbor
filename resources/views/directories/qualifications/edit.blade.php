<x-app-layout>
<div class="mt-6 max-w-lg mx-auto">
    <form action="{{ route('directories.qualifications.update', $qualification->id) }}" method="POST">
        @method('PUT')
        @csrf

        <div class="mb-4">
            <label for="qualification_title" class="block text-sm font-medium text-gray-700">Qualification Title</label>
            <input type="text" name="qualification_title" id="qualification_title" value="{{ $qualification->qualification_title }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
        </div>

        <!-- Add more fields as needed -->

        <div class="mt-4 flex justify-center">
            <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Update Qualification
            </button>
        </div>
    </form>
</div>
</x-app-layout>
