<div class="mx-6">
    {{-- Stop trying to control. --}}

    <div>
        <div class="flex">

            <div class="flex-initial w-full">
                <input type="text" wire:model.live.debounce.300ms="search" placeholder="Search company directory..." class="mb-4 p-2 px-4 w-full border border-gray-300 rounded-md rounded-l-3xl">

            </div>
            <div class="flex-initial w-auto ml-3 mb-4">

                <button class="flex flex-row p-2 px-2 bg-sky-200 hover:bg-sky-300 text-sky-800 transition ease-in-out duration-300 rounded-md rounded-r-3xl" onclick="window.location.href = '{{ route('directories.org.create') }}'">
                    <x-gmdi-add-o class="w-6 h-6" />
                    Employee
                </button>

            </div>

          </div>


<div class="rounded-3xl bg-white border ">
    <table class="table-auto min-w-full divide-y divide-gray-200 overflow-y-auto">
        <thead class="text-left text-xs text-sky-950">
            <tr>
                <th class="px-6 py-3">Salary Ref:</th>
                <th class="px-6 py-3">Name</th>
                <th class="px-6 py-3">Email</th>
                <th class="px-6 py-3text-center ">Job Title</th>
                <th class="px-6 py-3 text-center">Skill Points</th>
                <th class="px-6 py-3 text-center">Actions</th>




                <!-- Add more table headers as needed -->
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200 text-xs">

            @forelse ($users as $user)
                <tr class="cursor-pointer hover:bg-gray-50" onclick="window.location.href = '#'">
                    <td class="px-6 py-4 whitespace-nowrap">
                            {{ $user->salary_ref_number }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap"><div class="flex items-center gap-3">
                        <div class="avatar">
                          <div class="mask mask-squircle h-8 w-8">
                            <img class="rounded-xl object-cover" src="{{ $user->profile_photo_url }}" alt="{{ Auth::user()->first_name }}" />
                          </div>
                        </div>
                        <div>
                          <div class="font-md">{{ $user->first_name }} {{$user->last_name}}</div>
                          <div class="text-xs opacity-50">{{$user->department->department_name}}</div>
                        </div>
                      </div></td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $user->email }}</td>
                    <td class="px-2 py-4 whitespace-nowrap text-xs text-center w-auto">
                        @forelse($user->jcp as $jcp)
                            <h1 class="bg-sky-200 rounded-xl p-1 text-sky-900">{{ $jcp->position_title }}</h1>
                        @empty
                            <h1 class="bg-red-200 rounded-xl p-1 text-red-900 "> No active JCP...</h1>
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
                                    <x-dropdown-link href="{{ route('directories.org.edit', $user->id) }}">
                                        Edit
                                    </x-dropdown-link>


                                    <x-dropdown-link class="text-red-500 hover:bg-red-200/50">
                                        <form action="{{ route('users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this employee?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit">Delete</button>
                                        </form>
                                    </x-dropdown-link>


                                </x-slot>
                            </x-dropdown>

                        </div>
                        </td>


                    <!-- Add more table cells as needed -->
                </tr>
            @empty
            <div class="text-base items-center flex justify-center text-red-700 bg-red-200 rounded-3xl  p-4 m-6">
                <div class="self-center  max-w-md ">
                    <h1 class=""><x-iconoir-warning-circle class="mr-2" />
                    </h1>
                </div>
                <div class="self-center w-48">
                    <h1 class="">No Employees Found!</h1>
                </div>
            </div>
            @endforelse
        </tbody>
    </table>

</div>

        <div class="mt-4 m-3">
            {{ $users->links() }}
        </div>
    </div>
</div>
</div>
