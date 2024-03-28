<div class="mx-6">
    {{-- Stop trying to control. --}}

    <div>
        <div class="flex">

            <div class="flex-initial w-full">
                <input type="text" wire:model.live.debounce.300ms="search" placeholder="Search company directory..." class="mb-4 p-2 w-full border border-gray-300 rounded-md">

            </div>
            <div class="flex-initial w-auto ml-3 mb-4">

                <button class="flex flex-row p-2 px-2 bg-indigo-400 hover:bg-indigo-500 text-white transition ease-in-out duration-300 rounded-md">
                    <x-gmdi-add-o class="w-6 h-6" />
                    Employee
                </button>

            </div>

          </div>


<div class="rounded-lg border ">
    <table class="table-auto min-w-full divide-y divide-gray-200 overflow-hidden">
        <thead class="bg-gray-50 text-left text-xs text-purple-950/50">
            <tr>
                <th class="px-6 py-3  uppercase ">Salary Ref:</th>
                <th class="px-6 py-3 uppercase ">Name</th>
                <th class="px-6 py-3  uppercase ">Email</th>
                <th class="px-6 py-3 uppercase ">Job Title</th>
                <th class="px-6 py-3 text-center uppercase ">Skill Points</th>
                <th class="px-6 py-3 text-center uppercase ">Actions</th>




                <!-- Add more table headers as needed -->
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">

            @foreach ($users as $user)
                <tr class="cursor-pointer hover:bg-gray-50" onclick="window.location.href = '#'">
                    <td class="px-6 py-4 whitespace-nowrap">
                            {{ $user->salary_ref_number }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $user->first_name }} {{$user->last_name}}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $user->email }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        @forelse($user->jcp as $jcp)
                            {{ $jcp->position_title }}
                        @empty
                            <h1 class="text-red-500 flex flex-row "><x-iconoir-warning-triangle class="mr-3"/> No active JCP...</h1>
                        @endforelse
                    </td>
                    <td class="px-6 py-4 text-center whitespace-nowrap">{{ $user->competency_rating }}</td>
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
            {{ $users->links() }}
        </div>
    </div>
</div>
</div>
