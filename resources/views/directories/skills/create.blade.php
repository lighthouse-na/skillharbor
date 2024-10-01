<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add a Skill') }}
        </h2>
    </x-slot>

    <div class="mt-6 max-w-lg mx-auto">
        <!-- Success message -->
        @if (session('success'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('directories.skills.store') }}" method="POST">
            @csrf

            <!-- Skill Title -->
            <div class="mb-4 w-70">
                <label for="skill_title" class="block text-sm font-medium text-gray-700">Skill Title</label>
                <input type="text" name="skill_title" id="skill_title" value="{{ old('skill_title') }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md text-lg" required>
                @error('skill_title')
                    <p class="text-red-600 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <!-- Skill Description -->
            <div class="mb-4 w-70">
                <label for="skill_description" class="block text-sm font-medium text-gray-700">Skill Description</label>
                <textarea name="skill_description" id="skill_description" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md text-lg h-40" required>{{ old('skill_description') }}</textarea>
                @error('skill_description')
                    <p class="text-red-600 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <!-- Skill Category -->
            <div class="mb-4 w-70">
                <label for="skill_category_id" class="block text-sm font-medium text-gray-700">Category</label>
                <select name="skill_category_id" id="skill_category_id" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md text-lg" required>
                    <option value="" disabled selected>Select a category</option>
                    @forelse ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->category_title }}</option>
                    @empty
                        <option value="" disabled>No categories found</option>
                    @endforelse
                </select>
                @error('skill_category_id')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Submit Button -->
            <div class="mt-4 flex justify-center">
                <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 text-lg">
                    Add Skill
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
