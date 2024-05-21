<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Skill') }}
        </h2>
    </x-slot>

    <div class="mt-6 max-w-lg mx-auto">
        <form action="{{ route('directories.skills.update', ['id' => Crypt::encrypt($skill->id)]) }}" method="POST">
            @method('PUT')
            @csrf

            <div class="mb-4 w-70">
                <label for="skill_title" class="block text-sm font-medium text-gray-700">Skill Name</label>
                <input type="text" name="skill_title" id="skill_title" value="{{ $skill->skill_title }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md text-lg">
            </div>

            <div class="mb-4 w-70">
                <label for="skill_description" class="block text-sm font-medium text-gray-700">Skill Description</label>
                <textarea name="skill_description" id="skill_description" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-500 rounded-md text-lg h-40">{{ $skill->skill_description }}</textarea>
            </div>
            <div class="mb-4 w-70">
                <label for="category" class="block text-sm font-medium text-gray-700">Category</label>
                <select name="category" id="category" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md text-lg">
                    @forelse ($categories as $category)
                        <option value="{{ $category->id }}" {{ $skill->category_id === $category->id ? 'selected' : '' }}>
                            {{ $category->category_title }}
                        </option>
                    @empty
                        <option value="" disabled>No categories found</option>
                    @endforelse
                </select>
            </div>

            <div class="mt-4 flex justify-center">
                <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 text-lg">
                    Update Skill
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
