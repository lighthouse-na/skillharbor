<div>
    <div class="p-4">
        <div class="p-4 rounded-lg dark:border-gray-700">
            <div class="grid grid-cols-3 gap-4 mb-4">
                <div class="flex items-center justify-center rounded-lg  border h-auto dark:bg-gray-800">
                    <!-- https://gist.github.com/goodreds/5b8a4a2bf11ff67557d38c5e727ea86c -->

                    <div class="w-full text-gray-900">
                        <div class="h-32 overflow-hidden rounded-t-lg">
                            <img class="object-contain w-full" src='{{ asset('assets/images/bg.png') }}' alt='Mountain'>
                        </div>
                        <div
                            class="flex flex-col items-center justify-around mx-auto w-32 h-32 relative -mt-16 border-4 border-white bg-fuchsia-950 rounded-full overflow-hidden">
                            <h1 class="text-white text-3xl font-bold">{{ $user->competency_rating }}</h1>
                        </div>
                        <div class="text-center mt-2">
                            <h2 class="font-semibold">{{ $user->first_name }} {{ $user->last_name }}</h2>
                            <p class="text-gray-500">{{ $user->email }}</p>
                        </div>
                        <ul class="py-4 mt-2 text-gray-700 flex items-center justify-around">
                            <li class="flex flex-col items-center justify-around">
                                <svg class="w-4 fill-current text-blue-900" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20">
                                    <path
                                        d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" />
                                </svg>
                                <div>{{ $user->qualifications->count() }}</div>
                            </li>
                            <li class="flex flex-col items-center justify-between">
                                <svg class="w-4 fill-current text-blue-900" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20">
                                    <path
                                        d="M7 8a4 4 0 1 1 0-8 4 4 0 0 1 0 8zm0 1c2.15 0 4.2.4 6.1 1.09L12 16h-1.25L10 20H4l-.75-4H2L.9 10.09A17.93 17.93 0 0 1 7 9zm8.31.17c1.32.18 2.59.48 3.8.92L18 16h-1.25L16 20h-3.96l.37-2h1.25l1.65-8.83zM13 0a4 4 0 1 1-1.33 7.76 5.96 5.96 0 0 0 0-7.52C12.1.1 12.53 0 13 0z" />
                                </svg>
                                <div>{{ $user->assessments->count() }}</div>
                            </li>
                            <li class="flex flex-col items-center justify-around">
                                <svg class="w-4 fill-current text-blue-900" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20">
                                    <path
                                        d="M9 12H1v6a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-6h-8v2H9v-2zm0-1H0V5c0-1.1.9-2 2-2h4V2a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v1h4a2 2 0 0 1 2 2v6h-9V9H9v2zm3-8V2H8v1h4z" />
                                </svg>
                                <div>{{ $user->jcp->count() }}</div>
                            </li>
                        </ul>
                        <div class="p-4 border-t mx-8 mt-2">
                            <button
                                class="w-1/2 block mx-auto rounded-full bg-fuchsia-900 hover:bg-fuchsia-950 font-semibold text-white px-6 py-2  transition ease-in-out duration-150">Profile</button>
                        </div>
                    </div>
                </div>
                <div class="border h-auto rounded-lg dark:bg-gray-800">
                    <div class="flex flex-row justify-between items-center px-6 pt-3">
                        <div class="title">
                            <h3 class="leading-none text-gray-900 dark:text-white">My Qualifications</h3>
                        </div>
                        <div class="ml-auto">
                            <div>
                                <a href="#" wire:click="addQualification" wire:loading.attr="disabled"
                                    class="hover:bg-gray-200">
                                    <x-iconoir-plus-circle class="text-gray-900 hover:bg-gray-100 rounded-lg" />
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="flex flow-root mt-3">
                        <ul role="list" class="divide-y divide-gray-200 overflow-auto">
                            @forelse ($qualifications->take(5) as $q)
                                <li class="p-3 sm:py-4  dark:hover:bg-gray-700">
                                    <div class="flex items-center space-x-4">

                                        <div class="flex-1 min-w-0">
                                            <p class="text-sm text-gray-900 dark:text-white truncate">
                                                {{ $q->qualification_title }}
                                            </p>


                                        </div>

                                        <!-- Delete Button -->
                                        <div>
                                            <button class="text-red-500 text-xs hover:text-red-700"
                                                wire:click="deleteQualification({{ $q->id }})"><x-iconoir-trash />
                                            </button>
                                        </div>

                                    </div>
                                </li>


                            @empty
                                <div class="container flex-auto justify-center text-center">
                                    <p class="text-gray-400 text-base m-4">
                                        You have no qualifications loaded.
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


                        <div class="overflow-y-auto sm:rounded-lg">
                            <table class="w-full text-sm mt-3 text-gray-500 dark:text-gray-400">
                                <thead
                                    class="text-xs font-light text-gray-900/50  uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
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
                                        <tr
                                            class="border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                            <td scope="row"
                                                class="px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white text-left">
                                                {{ Str::limit($skill->skill_title, 30) }}
                                            </td>
                                            <td class="px-6 py-4 text-center">
                                                <div
                                                    class="text-xs text-center inline-block py-1 px-2 my-auto leading-none text-center whitespace-nowrap align-baseline font-bold bg-fuchsia-300 text-fuchsia-900 rounded-lg">
                                                    {{ $skill->pivot->user_rating }}.00
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 text-center">
                                                <div
                                                    class="text-xs inline-block py-1 px-2 my-auto leading-none text-center whitespace-nowrap align-baseline font-bold bg-fuchsia-300 text-fuchsia-900 rounded-lg">
                                                    {{ $skill->pivot->supervisor_rating }}.00
                                                </div>
                                            </td>

                                        </tr>
                                    @empty
                                        <div class="container flex-auto justify-center text-center">
                                            <p class="text-gray-400 text-base m-4">
                                                You have not completed any assessment.
                                            </p>
                                        </div>
                                    @endforelse


                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>



            </div>
             {{-- Certifications Section
        <div class="container bg-fuchsia-950 rounded-lg my-3 p-3 mx-auto">
            <div class="header flex flex-row items-center justify-between text-2xl text-white font-medium mb-3">
                <div>
                    <x-iconoir-doc-star />
                </div>
                <div>
                    <h1> Prerequisites/Certifications</h1>
                </div>
                <div>
                <a href="#"
                    class="text-white font-light text-sm ml-9 hover:text-orange-300 underline">View All</a>
                </div>
            </div>

            <div class="flex space-x-4 overflow-x-auto scrollbar-hide scrollable-container">
                @foreach (range(1,3) as $certificate)
                    <div class="bg-white rounded-lg p-4 shadow cursor-pointer">
                        <div class="flex items-center justify-between mb-2">
                            <h3 class="text-lg font-semibold">Certification {{ $certificate }}</h3>
                            @if ($certificate % 2 == 0)
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-500" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7" />
                                </svg>
                            @else
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-500" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            @endif
                        </div>
                        <p class="text-gray-600">Description of Certification {{ $certificate }}</p>
                    </div>
                @endforeach
            </div>
        </div> --}}

            <div class="grid grid-cols-2 gap-4 mb-4">


                <div class="items-center justify-center rounded-lg border h-auto dark:bg-gray-800">
                    <div class="flex flex-col grow rounded-lg dark:bg-gray-800">
                        <div class="title mb-3 px-6 pt-3 ">
                            <h3 class="leading-none text-gray-900 dark:text-white ml-3 mt-0">My Skill Gap</h3>
                        </div>
                        <div class="mx-auto w-full px-6">
                            <canvas id="myChart"></canvas>
                        </div>
                    </div>
                </div>





            </div>
        </div>
        <div>
            <x-dialog-modal wire:model.live="confirmingAddQualification">
                <x-slot name="title">
                    {{ __('New Qualification') }}
                </x-slot>

                <x-slot name="content">
                    <div class="mt-4" x-data="{}"
                        x-on:confirming-add-qualification.window="setTimeout(() => $refs.qualification_title.focus(), 250)">
                        <select class="appearance-none rounded-lg shadow w-full" type="text"
                            class="mt-1 block w-3/4" placeholder="{{ __('Qualification Title') }}"
                            x-ref="qualification_title" wire:model="qualification_title"
                            wire:keydown.enter="addQualificationToUser">
                            @foreach ($dbQual as $q)
                                <option value="{{ $q->id }}">{{ $q->qualification_title }}</option>
                            @endforeach
                        </select>
                        {{-- <x-input-error for="role_title" class="mt-2" /> --}}
                    </div>
                </x-slot>

                <x-slot name="footer">
                    <x-secondary-button wire:click="$toggle('confirmingAddQualification')"
                        wire:loading.attr="disabled">
                        {{ __('Cancel') }}
                    </x-secondary-button>

                    <x-danger-button class="ms-3" wire:click="addQualificationToUser" wire:loading.attr="disabled">
                        {{ __('Submit') }}
                    </x-danger-button>
                </x-slot>
            </x-dialog-modal>

        </div>

        @assets
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        @endassets
        @script
            <script>
                const ctx = document.getElementById('skillGapChart');

                const jcpRating = $wire.jcpRating;
                const myRating = $wire.myRating;
                const supervisorRating = $wire.supervisorRating;

                const labels = jcpRating.map(item => item.category);
                const values = jcpRating.map(item => item.value);
                const values2 = myRating.map(item => item.value);
                const values3 = supervisorRating.map(item => item.value);

                console.log(labels, values);
                new Chart(ctx, {
                    type: 'radar',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'JCP Requirement',
                            data: values,
                            borderWidth: 3,
                            fill: true,
                            backgroundColor: 'rgba(255, 99, 132, 0.2)',
                            borderColor: 'rgb(255, 99, 132)',
                            pointBackgroundColor: 'rgb(255, 99, 132)',
                            pointBorderColor: '#fff',
                            pointHoverBackgroundColor: '#fff',
                            pointHoverBorderColor: 'rgb(255, 99, 132)'
                        },
                        {
                            label: 'My Skill Level',
                            data: values2,
                            fill: true,
                            backgroundColor: 'rgba(160, 32, 240, 0.2)',
                            borderColor: 'rgb(160, 32, 240)',
                            pointBackgroundColor: 'rgb(160, 32, 240)',
                            pointBorderColor: '#fff',
                            pointHoverBackgroundColor: '#fff',
                            pointHoverBorderColor: 'rgb(160, 32, 240)'
                        },
                        {
                            label: 'Supervispr Rating',
                            data: values3,
                            fill: true,
                            backgroundColor: 'rgba(260, 32, 240, 0.2)',
                            borderColor: 'rgb(260, 32, 240)',
                            pointBackgroundColor: 'rgb(260, 32, 240)',
                            pointBorderColor: '#fff',
                            pointHoverBackgroundColor: '#fff',
                            pointHoverBorderColor: 'rgb(260, 32, 240)'
                        },

                    ]
                    },
                    options: {
                        scales: {
                            r: {
                                beginAtZero: true
                            }
                        }
                    }
                });
                const cty = document.getElementById('myChart');

                new Chart(cty, {
                    type: 'bar',
                    data: {
                        labels: labels,
                        datasets: [{
                            type: 'line',
                            label: 'My Level',
                            data: values2,
                            backgroundColor: [
                                'rgba(160, 32, 240, 0.2)',
                                ],
                                borderColor: [
                                'rgb(160, 32, 240)',
                                ],
                                borderWidth: 1
                        },{
                            type: 'line',
                            label: 'Supervisor Rating',
                            data: values3,
                            backgroundColor: [
                                'rgba(260, 32, 240, 0.2)',
                                ],
                                borderColor: [
                                'rgb(260, 32, 240)',
                                ],
                                borderWidth: 1
                        }, {
                            type: 'bar',
                            label: 'JCP Requirement',
                            data: values,
                            fill: false,
                            backgroundColor: [
                            'rgba(255,99,132,0.2)',
                            ],

                            borderColor: 'rgb(255, 99, 132)',
                            borderWidth: 1

                        }],


                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            </script>
        @endscript

    </div>
</div>
