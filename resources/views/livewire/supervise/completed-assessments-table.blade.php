<div class="mx-6">
    <div>
        <div class="flex">
            <div class="flex-initial w-full">
                <input type="text" wire:model.debounce.300ms="search" placeholder="Search completed assessments..." class="mb-4 py-2 px-6 w-full border border-gray-300 rounded-3xl shadow-md">
            </div>
        </div>

        <div class="rounded-3xl border bg-white shadow-md">
            <table class="table-auto min-w-full divide-y divide-gray-200 overflow-y-auto">
                <thead class="text-left text-xs text-sky-800">
                    <tr>
                        <th class="px-6 py-3 uppercase">Salary Ref:</th>
                        <th class="px-6 py-3 uppercase">Name</th>
                        <th class="px-6 py-3 uppercase">Email</th>
                        <th class="px-6 py-3 uppercase">User  Status</th>
                        <th class="px-6 py-3 uppercase">Supervisor Status</th>
                        <th class="px-6 py-3 text-center uppercase">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($completedAssessments as $assessment)
                        <tr class="text-xs text-sky-950/50">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{ $assessment->salary_ref_number }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{ $assessment->first_name }} {{ $assessment->last_name }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{ $assessment->email }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">
                                    @if($assessment->enrolled->isNotEmpty() && $assessment->enrolled[0]->pivot->user_status == 1)
                                        <span class="text-green-500">Assessment complete</span>
                                    @else
                                        <span class="text-red-500">Incomplete</span>
                                    @endif
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">
                                    @if($assessment->enrolled->isNotEmpty() && $assessment->enrolled[0]->pivot->supervisor_status == 1)
                                        <span class="text-green-500">Assessment complete</span>
                                    @else
                                        <span class="text-red-500">Incomplete</span>
                                    @endif
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                                <a href="{{ route('supervise.show', ['id' => Crypt::encrypt($assessment->id), 'assessment_id' => Crypt::encrypt($assessment->enrolled[0]->pivot->assessment_id)]) }}" class="text-indigo-800 hover:text-indigo-900">Assess</a>
                            </td>
                        </tr>
                    @empty
                        <tr class="text-xs text-sky-950/50">
                            <td colspan="6" class="px-6 py-4 whitespace-nowrap text-center">
                                <div class="text-sm text-gray-900">No completed assessments found</div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <div class="mt-4 m-3">
                {{ $completedAssessments->links() }}
            </div>
        </div>
    </div>
</div>
