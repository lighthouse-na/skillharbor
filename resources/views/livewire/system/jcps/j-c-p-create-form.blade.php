<x-form-section submit="createJCPInformation">
    <x-slot name="title">
        {{ $pages[$currentPage]['title'] }}
    </x-slot>

    <x-slot name="description">
        {{$pages[$currentPage]['description']}}
    </x-slot>

    <x-slot name="form">
        @if ($currentPage === 1)



        <!-- Name -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="position_title" value="{{ __('Position Title') }}" />
            <x-input id="position_title" type="text"  class="mt-1 block w-full" wire:model="position_title" required autocomplete="position_title" />
            <x-input-error for="position_title" class="mt-2" />


        </div>
        <div class="col-span-6 sm:col-span-4">
            <x-label for="duty_station" value="{{ __('Duty Station') }}" />
            <x-input id="duty_station"  type="text" class="mt-1 block w-full" wire:model="duty_station" required autocomplete="duty_station" />
            <x-input-error for="duty_station" class="mt-2" />


        </div>
        <div class="col-span-6 sm:col-span-4">
            <x-label for="user" value="{{ __('Employee') }}" />
            <select id="user" wire:model="user_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-fuchsia-500 focus:border-fuchsia-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-fuchsia-500 dark:focus:border-fuchsia-500">
              <option selected>Choose an employee to assign the JCP to.</option>
              @forelse ($users as $user)
              <option value="{{$user->id}}">{{$user->first_name}} {{$user->last_name}}</option>

              @empty
              <option value="">No Employees Found</option>


              @endforelse

            </select>
        </div>
        <div class="col-span-6 sm:col-span-4">
            <x-label for="job_grade" value="{{ __('Job Grade') }}" />
            <select id="job_grade" wire:model="job_grade" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-fuchsia-500 focus:border-fuchsia-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-fuchsia-500 dark:focus:border-fuchsia-500">
              <option selected>Choose the job grade.</option>
              <option value="a1">A1</option>
              <option value="a2">A2</option>
              <option value="a3">A3</option>
              <option value="a4">A4</option>
              <option value="b1">B1</option>
              <option value="b2">B2</option>
              <option value="b3">B3</option>
              <option value="b4">B4</option>
              <option value="bu">BU</option>
              <option value="c1">C1</option>
              <option value="c2">C2</option>
              <option value="c3">C3</option>
              <option value="c4">C4</option>
              <option value="cu">CU</option>
              <option value="d1">D1</option>
              <option value="d2">D2</option>
              <option value="d3">D3</option>
              <option value="d4">D4</option>
              <option value="du">DU</option>
            </select>
        </div>

        <!-- Job Purpose -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="job_prupose" value="{{ __('Job Purpose') }}" />
            <textarea id="job_purpose" wire:model="job_purpose"  rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-fuchsia-500 focus:border-fuchsia-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-fuchsia-500 dark:focus:border-fuchsia-500" placeholder="Write your thoughts here..."></textarea>
        </div>

        <div class="col-span-6 sm:col-span-4">
            <label class="inline-flex items-center cursor-pointer">
                <input type="checkbox" wire:model="is_active" value="" class="sr-only peer">
                <div class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-fuchsia-300 dark:peer-focus:ring-fuchsia-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-fuchsia-600"></div>
                <span class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300">JCP Active</span>
              </label>


        </div>
        {{-- Prerequisite Information --}}
        @elseif ($currentPage === 2 )
        <div class="col-span-full sm:col-span-4">
                <x-label for="qualifications" value="{{ __('Qualifications') }}" />

                <select id="jcp_qualifications.qualification_id" wire:model="jcp_qualifications.qualification_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                  <option selected>Choose Qualifications</option>
                @forelse ($qualifications as $qualification)
                    <option value="{{ $qualification->id }}">{{ $qualification->qualification_title }}</option>
                @empty
                    <option value="">No Qualifications Found</option>
                @endforelse


                </select>

        </div>
        <div class="col-span-6 sm:col-span-4">
            <x-label for="jcp_prerequisites" value="{{ __('Prerequisites') }}" />
            @forelse ($prerequisites as $prerequisite)
            <div class="flex items-center ps-4 border border-gray-200 rounded dark:border-gray-700 mb-2">
                <input id="jcp_prerequisites" type="radio" value="{{$prerequisite->id}}" wire:model="jcp_prerequisites" name="jcp_prerequisites" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                <label for="bordered-radio-1" class="w-full py-4 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{$prerequisite->prerequisite_title}}</label>
            </div>
            @empty
            <div class="flex items-center ps-4 border border-gray-200 rounded dark:border-gray-700 mb-2">
                <input checked id="bordered-radio-1" type="radio" value="" name="bordered-radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                <label for="bordered-radio-1" class="w-full py-4 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">No Prerequisites Loaded</label>
            </div>

            @endforelse


        </div>
        {{-- Skills Information --}}
        @elseif ($currentPage === 3 )
        <div>
        <table>

            <thead>
                <th>Skill Title</th>
                <th>Required Rating</th>
            </thead>
            <tbody>
            @foreach ($jcp_skills as $index => $jcp_skills)
            <tr>
                <td class="px-6 py-4 whitespace-nowrap">
                    <select name="skills" wire:model="jcp_skills.{{$index}}.skill_id" class="rounded-lg">
                        @foreach ($skills as $skill)
                            <option value={{$skill->id}}>
                                {{$skill->skill_title}}
                            </option>
                        @endforeach
                    </select>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <select id="countries" name="jcp_skills.{{$index}}.required_rating" wire:model="jcp_skills.{{$index}}.required_rating" class="rounded-lg">
                      <option selected>Choose a required rating</option>
                      <option value="1">Not Competent</option>
                      <option value="2">Basic Skills</option>
                      <option value="3">Competent</option>
                      <option value="4">Developed Skills</option>
                      <option value="5">Expert</option>
                    </select>
                </td>
                <td class="px-3">
                    <a href='#' class="text-red-500" wire:click.prevent="removeSkill({{$index}})">Delete</a>
                </td>
            </tr>


            @endforeach

            </tbody>
        </table>
        <div class="mt-6">
            <div class="">
                <x-button class="" wire:click.prevent="addSkill">Add Skill</x-button>
            </div>
        </div>
        </div>



        @endif

    </x-slot>

    <x-slot name="actions">
        @if ($currentPage === 1)

        @else
        <x-secondary-button wire:click.prevent='previousPage' class="mr-2">
            {{ __('Previous') }}
        </x-button>
        @endif

        @if($currentPage === count($pages))
        <x-button wire:click='save'>
            {{ __('Register JCP') }}
        </x-button>
        @else
        <x-secondary-button wire:click.prevent='nextPage'>
            {{ __('Next') }}
        </x-button>

        @endif
    </x-slot>
</x-form-section>
