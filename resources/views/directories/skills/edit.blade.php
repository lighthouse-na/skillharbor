<x-app-layout>
    <x-slot name="header">
        <h2 class="">
            {{ __('Edit Skill') }}
        </h2>
    </x-slot>

    <div class="py-6 px-6">
        <div class="">
            <!-- Form to edit the skill -->
            <form action="{{ route('skills.update', $skill->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="skill_title" class="block text-sm font-medium text-gray-700">Title</label>
                    <input type="text" name="skill_title" id="skill_title" value="{{ $skill->skill_title }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>
                <div class="mb-4">
                    <label for="skill_description" class="block text-sm font-medium text-gray-700">Description</label>
                    <textarea name="skill_description" id="skill_description" rows="3" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">{{ $skill->skill_description }}</textarea>
                </div>
                <div class="flex justify-end">
                    <button type="submit" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 active:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:ring focus:ring-indigo-200 disabled:opacity-25 transition">Update</button>

                </div>
            </form>
        </div>
    </div>
</x-app-layout>
