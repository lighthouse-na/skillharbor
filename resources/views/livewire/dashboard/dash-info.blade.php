<!-- User Profile Section -->
<div class="">
    <div class="p-4 rounded-lg dark:border-gray-700">

        <div class="grid grid-cols-3 gap-4 mx-3 mb-4">
            <div class="flex flex-col w-full text-gray-900">
                <!-- Profile Header Image -->
                <div class="w-full text-gray-900">
                    <!-- Profile Header Image -->
                    <div class="h-32 overflow-hidden rounded-t-lg">
                        <img class="object-cover w-full h-full" src="{{ asset('assets/images/bg.png') }}" alt="Mountain">
                    </div>
                    <!-- User Profile Card -->
                    <div class="bg-white rounded-b-lg border p-4 -mt-16">
                        <!-- User Competency Rating -->
                        <div class="flex justify-center mb-4">
                            <div class="bg-purple-700 text-white rounded-full p-4 border-4 border-white">
                                <h1 class="text-3xl font-bold">{{ $user->competency_rating }}</h1>
                            </div>
                        </div>
                        <!-- User Information -->
                        <div class="text-center">
                            <h2 class="text-2xl font-semibold">{{ $user->first_name }} {{ $user->last_name }}</h2>
                            <p class="text-gray-500">{{ $user->email }}</p>
                        </div>
                    </div>
                </div>
                <div class="flex flex-grow border rounded-lg h-24 mt-3">
                        {{-- Container for my status --}}
                </div>
            </div>
            <div class="flex flex-col border rounded-lg dark:bg-gray-800">
                <div class="flex flex-row justify-between items-center px-6 py-3">
                    <h3 class="leading-none text-gray-900 dark:text-white">My Qualifications</h3>
                    <button wire:click="addQualification" wire:loading.attr="disabled" class="ml-auto hover:bg-gray-200 rounded-lg focus:outline-none focus:shadow-outline-fuchsia">
                        <x-iconoir-plus-circle class="text-gray-900 hover:bg-gray-100 rounded-lg" />
                    </button>
                </div>
                <ul class="flex-grow divide-y divide-gray-200 overflow-auto">
                    @forelse ($qualifications as $qualification)
                        <li class="p-3 sm:py-4 dark:hover:bg-gray-700">
                            <div class="flex items-center justify-between">
                                <p class="text-sm text-gray-900 dark:text-white truncate">
                                    {{ $qualification->qualification_title }}
                                </p>
                                <button class="text-red-500 text-xs hover:text-red-700 focus:outline-none focus:shadow-outline-red" wire:click="deleteQualification({{ $qualification->id }})">
                                    <x-iconoir-xmark-circle />
                                </button>
                            </div>
                        </li>
                    @empty
                    <div class="text-base items-center flex justify-center text-red-200">
                        <div class="self-center">
                        <h1 class="">You have not qualifications added
                        </h1>
                    </div>
                        </div>
                    @endforelse
                </ul>
            </div>

            <div class="border  w-auto rounded-lg dark:bg-gray-800 overflow-auto">
                <div class="flex flex-row justify-between items-center px-6 pt-3">
                    <div class="title">
                        <h3 class="leading-none text-gray-900 dark:text-white">Top Skills</h3>
                    </div>
                </div>
                <div class="flow-root">
                    <div class="overflow-y-auto sm:rounded-lg">
                        <table class="w-full text-sm mt-3 text-gray-500 dark:text-gray-400">
                            <thead class="text-xs font-light text-gray-900/50 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
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


            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6 ml-4 md:ml-6">
                <div class="bg-white dark:bg-gray-800 rounded-lg border overflow-hidden">
                    <div class="flex flex-col h-full">
                        <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">My Skill Gap</h3>
                        </div>
                        <div class="flex-grow p-6">
                            <canvas id="myChart" class="w-full h-full"></canvas>
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
                            responsive: true,
                            maintainAspectRatio: true,
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
</div>
