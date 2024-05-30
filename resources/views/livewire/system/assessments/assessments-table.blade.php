<div>
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}
    <div class="flex-initial w-full">
        <input type="text" wire:model.live.debounce.300ms="search" placeholder="Search Assessments directory..." class="mb-4 p-2 w-full border border-gray-300 rounded-md">
    </div>
    <div class="rounded-lg border">
        <table class="table-auto min-w-full divide-y divide-gray-200 overflow-y-auto">
            <thead class="bg-gray-50 text-left text-xs text-purple-950/50">
                <tr>
                    <th class="px-6 py-3 uppercase">Assessment Name</th>
                    <th class="px-6 py-3 uppercase">Date Created</th>
                    <th class="px-6 py-3 text-center uppercase text-justify">Date Modified</th>
                    <th class="px-6 py-3 text-center uppercase">Actions</th>
                </tr>
            </thead>
            <tbody>

            @forelse ($assessments as $assessment)
                <tr class="cursor-pointer hover:bg-gray-50" onclick="window.location.href = '#'">
                    <td class="px-6 py-4 whitespace-nowrap">{{ $assessment->assessment_title }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $assessment->created_at }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $assessment->updated_at }}</td>
                    <td class="w-9 text-center">
                            <x-dropdown align="center" width="48">
                                <x-slot name="trigger">
                                    <button type="button" class="inline-flex px-3 py-1 border text-sm font-medium rounded-md text-gray-900 dark:text-gray-400 bg-white dark:bg-gray-800 hover:bg-gray-50 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none focus:bg-gray-50 dark:focus:bg-gray-700 active:bg-gray-50 dark:active:bg-gray-700 transition ease-in-out duration-150">
                                        ...
                                    </button>
                                </x-slot>
                                <x-slot name="content">
                                    <!-- Directory Management -->
                                    <x-dropdown-link href="{{ route('assessments.edit', ['assessment' =>Crypt::encrypt($assessment->id)]) }}">
                                        Edit
                                    </x-dropdown-link>
                                        <x-dropdown-link href="#" wire:click.prevent="deleteAssessment({{ $assessment->id }})" class="text-red-500" onclick="return confirm('Are you sure you want to delete this assessment?')">
                                            Delete
                                        </x-dropdown-link>
                                    </x-slot>
                            </x-dropdown>
                    </td>
                </tr>
            @empty
                <!-- No assessments found -->
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-red-500 text-center" colspan="4">No assessments found</td>
                </tr>

            @endforelse
            </tbody>
        </table>
    </div>
</div>
