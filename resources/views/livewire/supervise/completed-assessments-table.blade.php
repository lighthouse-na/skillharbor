<div class="mx-6">
    {{-- Stop trying to control. --}}

    <div>
        <div class="flex">

            <div class="flex-initial w-full">
                <input type="text" wire:model.live.debounce.300ms="search" placeholder="Search completed assessments..." class="mb-4 p-2 w-full border border-gray-300 rounded-md">

            </div>


          </div>


<div class="rounded-lg border ">
    <table class="table-auto min-w-full divide-y divide-gray-200 overflow-y-auto">
        <thead class="bg-gray-50 text-left text-xs text-purple-950/50">
            <tr>
                <th class="px-6 py-3  uppercase ">Salary Ref:</th>
                <th class="px-6 py-3 uppercase ">Name</th>
                <th class="px-6 py-3  uppercase ">Email</th>
                <th class="px-6 py-3 uppercase ">User Status</th>
                <th class="px-6 py-3 uppercase ">Supervisor Status</th>
                <th class="px-6 py-3 text-center uppercase ">Actions</th>




                <!-- Add more table headers as needed -->
            </tr>
        </thead>
        <tbody>
            @forelse ($completedAssessments as $assessment)
            <tr class="text-xs text-purple-950/50">
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-900">{{$assessment->salary_ref_number}}</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-900">{{$assessment->first_name}} {{$assessment->last_name}}</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-900">{{$assessment->email}}</div>
                </td>

                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-900">
                        @if($assessment->enrolled[0]['user_status'] == 1)
                            Assessment complete
                        @else
                            Incomplete
                        @endif
                    </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-900">
                        @if($assessment->enrolled[0]['supervisor_status'] == 1)
                        Assessment complete
                    @else
                        Incomplete
                    @endif</div>
                </td>
                </td>
                </td>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                    <a href="{{route('supervise.index')}}" class="text-indigo-600 hover:text-indigo-900">View</a>
                </td>
            </tr>

            @empty
            <tr class="text-xs text-purple-950/50">
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-900">No completed assessments found</div>
                </td>
            </tr>

            @endforelse

        </tbody>
    </table>
</div>
</div>
</div>
