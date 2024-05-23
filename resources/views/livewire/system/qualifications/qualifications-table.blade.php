<div class="mx-6">
    {{-- Stop trying to control. --}}

    <div>
        <div class="flex">

            <div class="flex-initial w-full">
                <input type="text" wire:model.live.debounce.300ms="search" placeholder="Search qualifications directory..." class="mb-4 p-2 w-full border border-gray-300 rounded-md">

            </div>
            <div class="flex-initial w-auto ml-3 mb-4">


                    <button class="flex flex-row p-2 bg-indigo-400 hover:bg-indigo-500 text-white transition ease-in-out duration-300 rounded-md">
                        <x-gmdi-add-o class="w-6 h-6" />
                        Qualification
                    </button>

            </div>

          </div>


<div class="rounded-lg border ">
    <table class="table-auto min-w-full divide-y divide-gray-200 overflow-y-auto">
        <thead class="bg-gray-50 text-left text-xs text-purple-950/50">
            <tr>
                <th class="px-6 py-3  uppercase ">qualification Title</th>
                <th class="px-6 py-3 text-center uppercase ">Actions</th>


                <!-- Add more table headers as needed -->
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @foreach ($qualifications as $qualification)
                <tr class="cursor-pointer hover:bg-gray-50" onclick="window.location.href = '#'">
                    <td class="px-6 py-4 whitespace-nowrap">
                            {{ $qualification->qualification_title }}
                    </td>
                    {{-- <td class="px-6 py-4 whitespace-nowrap">{{ $skill->skill_description }}</td> --}}
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
                                    <x-dropdown-link href="{{ route('qualifications.edit', ['qualification' => Crypt::encrypt($qualification->id)]) }}">
                                        Edit
                                    </x-dropdown-link>
                                    <x-dropdown-link href="#" wire:click.prevent="deleteQualification({{ $qualification->id }})" class="text-red-500" onclick="return confirm('Are you sure you want to delete this qualification?')">
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
            {{ $qualifications->links() }}
        </div>
    </div>
</div>
</div>
