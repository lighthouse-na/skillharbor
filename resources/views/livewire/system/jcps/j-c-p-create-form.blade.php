<x-form-section submit="createJCPInformation">
    <x-slot name="title">
        Create Job Competency Profile (JCP)
    </x-slot>

    <x-slot name="description">
        Fill out the form below to create a new Job Competency Profile.
    </x-slot>

    <x-slot name="form" class="w-full">
        <!-- Position Title -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="position_title" value="{{ __('Position Title') }}" />
            <x-input id="position_title" type="text" class="mt-1 block w-full" wire:model.defer="position_title"
                required autocomplete="position_title" />
            <x-input-error for="position_title" class="mt-2" />
        </div>



        <!-- Duty Station -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="duty_station" value="{{ __('Duty Station') }}" />
            <x-input id="duty_station" type="text" class="mt-1 block w-full" wire:model.defer="duty_station" required
                autocomplete="duty_station" />
            <x-input-error for="duty_station" class="mt-2" />
        </div>

        <!-- Employee Selection -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="user" value="{{ __('Employee') }}" />
            <select id="user" wire:model.defer="user_id"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5">
                <option selected>Choose an employee to assign the JCP to.</option>
                @forelse ($users as $user)
                    <option value="{{ $user->id }}">{{ $user->first_name }} {{ $user->last_name }}</option>
                @empty
                    <option value="">No Employees Found</option>
                @endforelse
            </select>
            <x-input-error for="user_id" class="mt-2" />
        </div>

        <!-- Job Grade -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="job_grade" value="{{ __('Job Grade') }}" />
            <select id="job_grade" wire:model.defer="job_grade"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5">
                <option selected>Choose the job grade.</option>
                @foreach (['a1', 'a2', 'a3', 'a4', 'b1', 'b2', 'b3', 'b4', 'bu', 'c1', 'c2', 'c3', 'c4', 'cu', 'd1', 'd2', 'd3', 'd4', 'du'] as $grade)
                    <option value="{{ $grade }}">{{ strtoupper($grade) }}</option>
                @endforeach
            </select>
            <x-input-error for="job_grade" class="mt-2" />
        </div>

        <!-- Job Purpose -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="job_purpose" value="{{ __('Job Purpose') }}" />
            <textarea id="job_purpose" wire:model.defer="job_purpose" rows="4"
                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-sky-500 focus:border-sky-500"
                placeholder="Write your job purpose here..."></textarea>
            <x-input-error for="job_purpose" class="mt-2" />
        </div>

        <!-- Active Checkbox -->
        <div class="col-span-6 sm:col-span-4">
            <label class="inline-flex items-center cursor-pointer">
                <input type="checkbox" name="is_active" id="is_active" class="sr-only peer">
                <div
                    class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-sky-300 dark:peer-focus:ring-sky-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-sky-600">
                </div>
                <span class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300">JCP Active</span>
            </label>
        </div>

        <!-- Qualifications Section -->
        <div class="col-span-6 sm:col-span-4">
            <label for="qualifications" value="{{ __('Qualifications') }}">Qualifications</label>
            <select id="qualifications" name="qualifications" data-placeholder="Select Qualifications" multiple
                data-multi-select>
                @foreach ($qualifications as $qualification)
                    <div class="flex items-center mb-2">
                        <option wire:model.defer="jcp_qualifications"
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500"
                            value="{{ $qualification->id }}">{{ $qualification->qualification_title }}</option>

                    </div>
                @endforeach

            </select>
        </div>


        <!-- Prerequisites Section -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="prerequisites" value="{{ __('Prerequisites') }}" />
            <select id="prerequisites" name="jcp_prerequisites[]" data-placeholder="Select Prerequisites" multiple data-multi-select>
                @forelse ($prerequisites as $prerequisite)
                    <option
                        wire:model.defer="jcp_prerequisites"
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500"
                        value="{{ $prerequisite->id }}">{{ $prerequisite->prerequisite_title }}
                    </option>
                @empty
                    <option disabled>No Prerequisites Loaded</option>
                @endforelse
            </select>
            <x-input-error for="jcp_prerequisites" class="mt-2" />
        </div>


        <!-- Skills Section -->
        <div class="col-span-full sm:col-span-full">
            <x-label for="jcp_skills" value="{{ __('Skills') }}" class="block text-lg font-medium text-gray-700 mb-4" />

            <div class="overflow-x-auto shadow-sm border border-gray-200 rounded-lg bg-white">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-sm font-semibold text-gray-600 uppercase tracking-wider">
                                Skill Title
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-sm font-semibold text-gray-600 uppercase tracking-wider">
                                Required Rating
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-sm font-semibold text-gray-600 uppercase tracking-wider">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach ($jcp_skills as $index => $skill)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <select
                                        wire:model.defer="jcp_skills.{{ $index }}.skill_id"
                                        class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                        <option selected>Choose a skill</option>
                                        @foreach ($skills as $availableSkill)
                                            <option value="{{ $availableSkill->id }}">{{ $availableSkill->skill_title }}</option>
                                        @endforeach
                                    </select>
                                    <x-input-error for="jcp_skills.{{ $index }}.skill_id" class="mt-1 text-sm text-red-500" />
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <select
                                        wire:model.defer="jcp_skills.{{ $index }}.required_rating"
                                        class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                        <option selected>Choose a required rating</option>
                                        <option value="1">Not Competent</option>
                                        <option value="2">Basic Skills</option>
                                        <option value="3">Competent</option>
                                        <option value="4">Developed Skills</option>
                                        <option value="5">Expert</option>
                                    </select>
                                    <x-input-error for="jcp_skills.{{ $index }}.required_rating" class="mt-1 text-sm text-red-500" />
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                    <button
                                        type="button"
                                        wire:click.prevent="removeSkill({{ $index }})"
                                        class="text-red-600 hover:text-red-800 font-medium focus:outline-none">
                                        Delete
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="mt-4">
                <x-button
                    type="button"
                    wire:click.stop="addSkill"
                    class="bg-blue-600 text-white font-medium px-4 py-2 rounded-md shadow hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    {{ __('Add Skill') }}
                </x-button>
            </div>
        </div>

    </x-slot>

    <x-slot name="actions">
        <x-button wire:click='createJCPInformation'>
            {{ __('Register JCP') }}
        </x-button>
    </x-slot>
</x-form-section>
