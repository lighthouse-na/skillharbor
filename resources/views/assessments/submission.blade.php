<x-app-layout>
    <div class="flex-1 justify-start pb-24 pt-6 mb-6 font-inter">
        <div class="container mx-auto p-6">
            <div class="bg-sky-950 p-6 rounded-3xl shadow-md">
                <nav class="flex border-b border-white " aria-label="Breadcrumb ">
                    <ol class="inline-flex items-center space-x-1 md:space-x-3 mb-3">
                        <li class="inline-flex items-center">
                            <a href="/"
                                class="inline-flex items-center text-sm font-medium text-white hover:text-sky-200 ">
                                <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z">
                                    </path>
                                </svg>
                                Home
                            </a>
                        </li>
                        <li>
                            <div class="flex items-center">
                                <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <a href="{{ route('user.assessment', ['user' => Crypt::encrypt($user->id)]) }}"
                                    class="ml-1 text-sm font-medium text-white hover:text-sky-200 md:ml-2 ">My
                                    Assessments</a>
                            </div>
                        </li>

                    </ol>
                </nav>


                <div class="flex mx-auto ">


                    <div class="mt-3 mx-4 flex">

                        <div class="w-full px-4 sm:w-1/2 lg:w-6/12 text-white mb-10">
                            <div class="grow-1 shrink-0 basis-auto w-10/12 md:pl-6 mt-6">
                                <h4 class="text-2xl font-bold text-sky-500 mb-4">
                                    Job Competency Profile Details
                                </h4>

                                <div class="space-y-3">
                                    <p class="text-white text-lg">
                                        <strong class="text-sky-500">Employee Name:
                                        </strong>{{ $user->first_name . ' ' . $user->last_name }}
                                    </p>
                                    <p class="text-white text-lg">
                                        <strong class="text-sky-500">Job Title: </strong>{{ $jcp->position_title }}
                                    </p>
                                    <p class="text-white text-lg">
                                        <strong class="text-sky-500">Job Purpose: </strong>{{ $jcp->job_purpose }}
                                    </p>
                                    <p class="text-white text-lg">
                                        <strong class="text-sky-500">Job Grade: </strong>{{ $jcp->job_grade }}
                                    </p>
                                </div>


                            </div>
                        </div>

                        <div class="w-full px-4 sm:w-1/2 lg:w-6/12 text-white mb-10">
                            <div class="grow-1 shrink-0 basis-auto w-10/12 md:pl-6 mt-6">
                                <h4 class="text-dark mb-2 text-2xl font-bold text-sky-500">Required Qualifications
                                </h4>

                                <div class="flex">

                                    <div class="h-auto">



                                        @foreach ($qualificationsData as $qualificationData)
                                            <div class="flex border-b my-3 mx-auto items-center p-2">
                                                <h3>{{ $qualificationData['name'] }}</h3>
                                                @if ($qualificationData['attained'])
                                                    <x-iconoir-check class="text-green-500 ml-3" />
                                                    <!-- Green tick icon for attained -->
                                                @else
                                                    <x-iconoir-xmark class="text-red-500 ml-3" />
                                                    <!-- Red X icon for not attained -->
                                                @endif
                                            </div>
                                        @endforeach


                                    </div>



                                </div>
                            </div>

                        </div>
                        <div class="w-full px-4 sm:w-1/2 lg:w-6/12 text-white mb-10">
                            <div class="grow-0 shrink-0 basis-auto w-10/12 md:pl-6 mt-6">
                                <h4 class="text-2xl font-bold text-sky-500 mb-6">
                                    Downloads
                                </h4>
                                <a class="inline-flex items-center text-sm font-semibold rounded-xl p-3  text-sky-400 hover:bg-sky-800 hover:text-white disabled:opacity-50 disabled:pointer-events-none "
                                    href="{{ route('supervisor.result', ['user_id' => Crypt::Encrypt($user->id), 'assessment_id' => Crypt::Encrypt($assessment->id)]) }}">
                                    My Report
                                    <svg class="size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path d="m9 18 6-6-6-6" />
                                    </svg>
                                </a>
                            </div>

                        </div>

                    </div>
                </div>


            </div>

            {{--  --}}

            <div class="flex bg-white border py-6 px-4 rounded-3xl grid mt-12">
                <div class="header flex items-center justify-between my-3 text-2xl text-slate-800 font-medium">
                    <h1><span><i class="fas fa-file-contract"></i></span> {{ $user->first_name }}s' Assessment
                    </h1>

                </div>
                <div class="mt-6">
                    <!-- Header Section -->
                    <div
                        class="bg-sky-800 text-white font-semibold py-4 px-6 rounded-t-lg shadow-lg flex items-center justify-between">
                        <h2 class="text-xl flex-1 text-center">Skill Audit Overview</h2>
                        <h2 class="text-l flex-1 text-center">JCP Requirement</h2>
                        <h2 class="text-l flex-1 text-center">User Rating</h2>
                    </div>

                    <!-- Skills List -->
                    <ul class="divide-y divide-gray-200 bg-white border rounded-b-lg">
                        @forelse ($jcp->skills->groupBy('category.category_title') as $category => $skills)
                            <!-- Category Header -->
                            <li class="bg-sky-500 text-white py-4 px-6">
                                <h3 class="text-lg font-semibold">{{ $category }}</h3>
                            </li>

                            <!-- Skills in the Category -->
                            @foreach ($skills as $index => $question)
                                <li
                                    class="py-5 px-6 {{ $index % 2 === 0 ? 'bg-gray-50' : 'bg-white' }} flex justify-between items-center border-b border-gray-200">
                                    <!-- Skill Title -->
                                    <div class="flex-1">
                                        <h4 class="text-lg font-semibold text-gray-800">{{ $question->skill_title }}
                                        </h4>
                                    </div>

                                    <!-- Required Level -->
                                    <div class="flex-1 text-center">
                                        <span class="block text-sm font-medium text-gray-600">
                                            @if ($jcp->skills->find($question->id)->pivot->required_level === 1)
                                                <span
                                                    class="block text-sm font-medium bg-red-500 text-white p-2  border border-sky-900">
                                                    1
                                                </span>
                                            @elseif ($jcp->skills->find($question->id)->pivot->required_level === 2)
                                                <span
                                                    class="block text-sm font-medium bg-orange-400 text-white p-2  border border-sky-900">
                                                    2
                                                </span>
                                            @elseif ($jcp->skills->find($question->id)->pivot->required_level === 3)
                                                <span
                                                    class="block text-sm font-medium bg-yellow-300 text-black p-2  border border-sky-900">
                                                    3
                                                </span>
                                            @elseif ($jcp->skills->find($question->id)->pivot->required_level === 4)
                                                <span
                                                    class="block text-sm font-medium bg-green-300 text-black p-2  border border-sky-900">
                                                    4
                                                </span>
                                            @elseif ($jcp->skills->find($question->id)->pivot->required_level === 5)
                                                <span
                                                    class="block text-sm font-medium bg-green-500 text-white p-2  border border-sky-900">
                                                    5
                                                </span>
                                            @endif
                                        </span>
                                    </div>

                                    <!-- User Rating with Heatmap -->
                                    <div class="flex-1 text-center">
                                        @if ($jcp->skills->find($question->id)->pivot->user_rating === 1)
                                            <span
                                                class="block text-sm font-medium bg-red-500 text-white p-2  border border-sky-900">
                                                1
                                            </span>
                                        @elseif ($jcp->skills->find($question->id)->pivot->user_rating === 2)
                                            <span
                                                class="block text-sm font-medium bg-orange-400 text-white p-2  border border-sky-900">
                                                2
                                            </span>
                                        @elseif ($jcp->skills->find($question->id)->pivot->user_rating === 3)
                                            <span
                                                class="block text-sm font-medium bg-yellow-300 text-black p-2  border border-sky-900">
                                                3
                                            </span>
                                        @elseif ($jcp->skills->find($question->id)->pivot->user_rating === 4)
                                            <span
                                                class="block text-sm font-medium bg-green-300 text-black p-2  border border-sky-900">
                                                4
                                            </span>
                                        @elseif ($jcp->skills->find($question->id)->pivot->user_rating === 5)
                                            <span
                                                class="block text-sm font-medium bg-green-500 text-white p-2  border border-sky-900">
                                                5
                                            </span>
                                        @endif
                                    </div>


                                </li>
                            @endforeach
                        @empty
                            <!-- No Skills in the Audit -->
                            <li class="py-5 px-6 text-center text-gray-500">
                                No skills were added to this assessment.
                            </li>
                        @endforelse
                    </ul>
                </div>







            </div>





        </div>
</x-app-layout>
