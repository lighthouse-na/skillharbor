<div class="mx-6">
    {{-- Stop trying to control. --}}
    <div>
        <input type="text" wire:model.live.debounce.300ms="search" placeholder="Search skills directory..." class="mb-4 m-3 p-2 border border-gray-300 rounded-md">
<div class="rounded-lg border ">
    <table class="table-auto min-w-full divide-y divide-gray-200 overflow-hidden">
        <thead class="bg-gray-50 text-left text-xs text-purple-950/50">
            <tr>
                <th class="px-6 py-3  uppercase ">Skill Title</th>
                <th class="px-6 py-3  uppercase ">Description</th>
                <th class="px-6 py-3 text-center uppercase ">Actions</th>



                <!-- Add more table headers as needed -->
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @foreach ($skills as $skill)
                <tr class="cursor-pointer hover:bg-gray-50" onclick="window.location.href = '#'">
                    <td class="px-6 py-4 whitespace-nowrap">
                            {{ $skill->skill_title }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $skill->skill_description }}</td>
                    <td class="w-9 text-center">
                        <div class="ms-3 mx-auto">
                            <x-dropdown align="center" width="48">
                                <x-slot name="trigger">
                                        <button type="button" class=" inline-flex px-3 py-1 border text-sm font-medium rounded-md text-gray-900 dark:text-gray-400 bg-white dark:bg-gray-800 hover:bg-gray-50 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none focus:bg-gray-50 dark:focus:bg-gray-700 active:bg-gray-50 dark:active:bg-gray-700 transition ease-in-out duration-150">
                                            ...
                                        </button>

                                </x-slot>
                                <x-slot name="content">
                                    <!-- Directory Management -->
                                    <x-dropdown-link href="#">
                                        Edit
                                    </x-dropdown-link>


                                    <x-dropdown-link class="text-red-900 hover:bg-red-200/50">
                                            Delete
                                    </x-dropdown-link>





                                    {{-- <div class="border-t border-gray-200 dark:border-gray-800"></div> --}}

                                </x-slot>
                            </x-dropdown>

                        </div>
                        </td>


                    <!-- Add more table cells as needed -->
                </tr>
            @endforeach
        </tbody>
    </table>

</div>

        <div class="mt-4 m-3">
            {{ $skills->links() }}
        </div>
    </div>
</div>
