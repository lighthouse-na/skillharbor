<div class="p-4">
    <div class="p-4 rounded-lg dark:border-gray-700">
       <div class="grid grid-cols-3 gap-4 mb-4">
          <div class="flex items-center justify-center border h-32 rounded bg-gray-50 dark:bg-gray-800">
             <p class="text-2xl text-gray-400 dark:text-gray-500">
                <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                   <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
                </svg>
             </p>
          </div>
          <div class="border h-auto rounded-lg dark:bg-gray-800">
            <div class="flex flex-row justify-between items-center px-6 pt-3">
              <div class="title">
                <h3 class="leading-none text-gray-900 dark:text-white">My Qualifications</h3>
              </div>
              <div class="ml-auto">
                <div>
                <a href="#" wire:click="addQualification" wire:loading.attr="disabled" class="hover:bg-gray-200">
                    <x-iconoir-plus-circle class="text-gray-900 hover:bg-gray-100 rounded-lg" />
                </a>
                </div>
              </div>
            </div>
            <div class="flex flow-root mt-3">
              <ul role="list" class="divide-y divide-gray-200 overflow-auto">
                @forelse ($user->qualifications->take(5) as $q)
                            <li class="p-3 sm:py-4  dark:hover:bg-gray-700">
                                  <div class="flex items-center space-x-4">

                                      <div class="flex-1 min-w-0">
                                          <p class="text-sm text-gray-500 dark:text-white truncate">
                                              {{$q->qualification_title}}
                                          </p>


                                      </div>

                                      <!-- Delete Button -->
                                      <div>
                                          <button class="text-red-500 text-xs hover:text-red-700" wire:click="deleteQualification({{$q->id}})"><x-iconoir-trash-solid />
                                          </button>
                                      </div>

                                  </div>
                              </li>


                         @empty
                         <div class="container flex-auto justify-center text-center">
                            <p class="text-gray-400 text-base m-4">
                                You have no qualifications.
                            </p>
                        </div>


                         @endforelse
              </ul>
            </div>
          </div>
          <div class="border h-auto w-auto rounded-lg dark:bg-gray-800">
            <div class="flex flex-row justify-between items-center px-6 pt-3">
                <div class="title">
                  <h3 class="leading-none text-gray-900 dark:text-white">Top Skills</h3>
                </div>

              </div>
            <div class="flow-root">


<div class="relative overflow-y-auto sm:rounded-lg">
    <table class="w-full text-sm mt-3 text-gray-500 dark:text-gray-400">
        <thead class="text-xs font-light text-gray-900/50  uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3 text-left">
                    Skill Title
                </th>
                <th scope="col" class="px-6 py-3 text-center">
                    User Rating
                </th>
                <th scope="col" class="px-6 py-3 text-center">
                    Supervisor Rating
                </th>

            </tr>
        </thead>
        <tbody>
            @forelse ($skills as $skill)
            <tr class="border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <td scope="row" class="px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white text-left">
                    {{ Str::limit($skill->skill_title, 30) }}
                </td>
                <td class="px-6 py-4 text-center">
                    <div class="text-xs text-center inline-block py-1 px-2 my-auto leading-none text-center whitespace-nowrap align-baseline font-bold bg-fuchsia-300 text-fuchsia-900 rounded-lg">
                    {{$skill->pivot->user_rating}}.00
                    </div>
                </td>
                <td class="px-6 py-4 text-center">
                    <div class="text-xs inline-block py-1 px-2 my-auto leading-none text-center whitespace-nowrap align-baseline font-bold bg-fuchsia-300 text-fuchsia-900 rounded-lg">
                    {{$skill->pivot->supervisor_rating}}.00
                    </div>
                </td>

            </tr>
            @empty
            <tr>
                <td>No assessments completed</td>
            </tr>

            @endforelse


        </tbody>
    </table>
</div>

            </div>
          </div>
       </div>
       <div class="flex items-center justify-center border  h-48 mb-4 rounded bg-gray-50 dark:bg-gray-800">
          <p class="text-2xl text-gray-400 dark:text-gray-500">
             <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
             </svg>
          </p>
       </div>
       <div class="grid grid-cols-2 gap-4 mb-4">
          <div class="flex items-center justify-center rounded bg-gray-50 border h-28 dark:bg-gray-800">
             <p class="text-2xl text-gray-400 dark:text-gray-500">
                <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                   <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
                </svg>
             </p>
          </div>
          <div class="flex items-center justify-center rounded bg-gray-50 border  h-28 dark:bg-gray-800">
             <p class="text-2xl text-gray-400 dark:text-gray-500">
                <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                   <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
                </svg>
             </p>
          </div>

       </div>
    </div>
</div>
