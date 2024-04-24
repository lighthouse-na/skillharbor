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
                <th class="px-6 py-3 uppercase ">Job Title</th>
                <th class="px-6 py-3 text-center uppercase ">Skill Points</th>
                <th class="px-6 py-3 text-center uppercase ">Actions</th>




                <!-- Add more table headers as needed -->
            </tr>
        </thead>
    </table>
</div>
</div>
</div>
