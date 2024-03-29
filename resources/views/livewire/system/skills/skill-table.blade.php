<div class="mx-6">
    {{-- Stop trying to control. --}}
    <div>
        <div class="flex">
            <div class="flex-none w-auto mr-3 mb-4">

                <x-dropdown align="left" width="48" class="">
                    <x-slot name="trigger">
                            <button type="button" class="h-10 justify-items-center items-center inline-flex px-3 py-1 border text-sm font-medium rounded-md hover:bg-gray-100 transition ease-in-out duration-150">
                                <span class="mr-2">
                                    <x-iconoir-drawer />

                                </span>
                                Categories
                                <svg class="ms-2 -me-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.5l-7.5 7.5-7.5-7.5" />
                                </svg>
                            </button>

                    </x-slot>
                    <x-slot name="content">
                        <!-- Category dropdown  -->
                        @forelse ($categories as $category)
                        <x-dropdown-link href="#">
                            <h1 class="text-gray-900 dark:text-gray-200 text-sm">
                                {{ $category->category_title }}
                            </h1>
                        </x-dropdown-link>
                        @empty
                        <x-dropdown-link href="#">
                            No categories found
                        </x-dropdown-link>

                        @endforelse



                    </x-slot>
                </x-dropdown>
            </div>
            <div class="flex-initial w-full ...">
                <input type="text" wire:model.live.debounce.300ms="search" placeholder="Search skills directory..." class="mb-4 p-2 w-full border border-gray-300 rounded-md">

            </div>
           <div class="flex-initial w-auto ml-3 mb-4">

                <button class="flex flex-row p-2 w-28 bg-indigo-400 hover:bg-indigo-500 text-white transition ease-in-out duration-300 rounded-md">
                    <x-gmdi-add-o class="w-6 h-6" />
                    Add skill
                </button>

            </div>


          </div>


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
                    <td class="px-6 py-4 whitespace-nowrap truncate">{{ Str::limit($skill->skill_description, 50, $end='...') }}</td>
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
