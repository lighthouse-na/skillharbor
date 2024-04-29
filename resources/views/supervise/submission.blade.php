<x-app-layout>
    <div class="flex-1 justify-start pb-24 pt-6 mb-6 font-inter">
        <div class="container mx-auto p-6">
            <nav class="flex" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3 mb-3">
                    <li class="inline-flex items-center">
                        <a href="/"
                            class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-sky-900 ">
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
                            <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <a href="{{ route('supervise.index') }}"
                                class="ml-1 text-sm font-medium text-gray-700 hover:text-sky-900 md:ml-2 ">My
                                Assessments</a>
                        </div>
                    </li>

                </ol>
            </nav>
            <div class="container text-white pastel-navy-gradient mx-auto px-6 py-3 rounded-3xl">
                <div class="container w-full">
                    <div class="flex-inline">
                        <div class="overview pb-3 border-b">
                            <h3 class="flex justify-start text-grey-300 text-lg font-inter">Overview</h3>

                            {{-- <h3 class="flex justify-start text-orange-500 font-bold font-inter">
                                {{ $jcp }}</h3> --}}
                        </div>
                    </div>


                </div>
                <div class="mt-3 mx-4 flex flex-wrap">
                    <div class="w-full px-4 sm:w-2/3 lg:w-3/12">

                        <div class="mb-10 w-full">


                            <div class="radial-progress text-orange-500 mt-6"
                                style="--value:{{ $user->competency_rating }}; --size:12rem; --thickness: 2rem;">
                                {{ $user->competency_rating }}</div>


                        </div>
                    </div>
                    <div class="w-full px-4 sm:w-1/2 lg:w-6/12 text-grey-500">
                        <div class="grow-0 shrink-0 basis-auto w-10/12 pl-4 md:pl-6 mt-6">
                            <h4 class="text-dark mb-2 text-lg text-orange-500 font-semibold">Job Competency Profile
                                Details
                            </h4>
                            <p>
                                <strong class="text-orange-500">Employee Name:
                                </strong>{{ $user->first_name . ' ' . $user->last_name }}
                            </p>
                            <p>
                                <strong class="text-orange-500">Job title: </strong>{{ $jcp->job_title }}
                            </p>
                            <p>
                                <strong class="text-orange-500">Job Purpose: </strong>{{ $jcp->job_purpose }}
                            </p>
                            <p>
                                <strong class="text-orange-500">Job Grade: </strong>{{ $jcp->grade }}
                            </p>


                        </div>
                    </div>

                    <div class="w-full px-4 sm:w-1/2 lg:w-3/12">
                        <div class="mb-10 w-full">
                            <h4 class="text-dark mb-2 text-lg text-orange-500 font-semibold">Required Qualifications
                            </h4>

                            <div class="flex justify-center">

                                <div class="h-48 overflow-y-auto scrollbar-hide scrollable-container">



                                    @foreach ($qualificationsData as $qualificationData)
                                        <div class="flex border-b my-3 items-center p-2">
                                            <h3>{{ $qualificationData['name'] }}</h3>
                                            @if ($qualificationData['attained'])
                                                <i class="fas fa-check text-green-500 ml-3"></i>
                                                <!-- Green tick icon for attained -->
                                            @else
                                                <i class="fas fa-times text-red-500 ml-3"></i>
                                                <!-- Red X icon for not attained -->
                                            @endif
                                        </div>
                                    @endforeach


                                </div>



                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <span class="absolute left-0 bottom-0 z-[-1]">
                        <svg width="217" height="229" viewBox="0 0 217 229" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M-64 140.5C-64 62.904 -1.096 1.90666e-05 76.5 1.22829e-05C154.096 5.49924e-06 217 62.904 217 140.5C217 218.096 154.096 281 76.5 281C-1.09598 281 -64 218.096 -64 140.5Z"
                                fill="url(#paint0_linear_1179_5)" />
                            <defs>
                                <linearGradient id="paint0_linear_1179_5" x1="76.5" y1="281" x2="76.5"
                                    y2="1.22829e-05" gradientUnits="userSpaceOnUse">
                                    <stop stop-color="#3056D3" stop-opacity="0.08" />
                                    <stop offset="1" stop-color="#C4C4C4" stop-opacity="0" />
                                </linearGradient>
                            </defs>
                        </svg>
                    </span>
                    <span class="absolute top-10 right-10 z-[-1]">
                        <svg width="75" height="75" viewBox="0 0 75 75" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M37.5 -1.63918e-06C58.2107 -2.54447e-06 75 16.7893 75 37.5C75 58.2107 58.2107 75 37.5 75C16.7893 75 -7.33885e-07 58.2107 -1.63918e-06 37.5C-2.54447e-06 16.7893 16.7893 -7.33885e-07 37.5 -1.63918e-06Z"
                                fill="url(#paint0_linear_1179_4)" />
                            <defs>
                                <linearGradient id="paint0_linear_1179_4" x1="-1.63917e-06" y1="37.5"
                                    x2="75" y2="37.5" gradientUnits="userSpaceOnUse">
                                    <stop stop-color="#13C296" stop-opacity="0.31" />
                                    <stop offset="1" stop-color="#C4C4C4" stop-opacity="0" />
                                </linearGradient>
                            </defs>
                        </svg>
                    </span>
                </div>


            </div>

            {{--  --}}
            <div>
                <span class="absolute left-0 bottom-0 z-[-1]">
                    <svg width="217" height="229" viewBox="0 0 217 229" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M-64 140.5C-64 62.904 -1.096 1.90666e-05 76.5 1.22829e-05C154.096 5.49924e-06 217 62.904 217 140.5C217 218.096 154.096 281 76.5 281C-1.09598 281 -64 218.096 -64 140.5Z"
                            fill="url(#paint0_linear_1179_5)" />
                        <defs>
                            <linearGradient id="paint0_linear_1179_5" x1="76.5" y1="281" x2="76.5"
                                y2="1.22829e-05" gradientUnits="userSpaceOnUse">
                                <stop stop-color="#3056D3" stop-opacity="0.08" />
                                <stop offset="1" stop-color="#C4C4C4" stop-opacity="0" />
                            </linearGradient>
                        </defs>
                    </svg>
                </span>
                <span class="absolute top-10 right-10 z-[-1]">
                    <svg width="75" height="75" viewBox="0 0 75 75" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M37.5 -1.63918e-06C58.2107 -2.54447e-06 75 16.7893 75 37.5C75 58.2107 58.2107 75 37.5 75C16.7893 75 -7.33885e-07 58.2107 -1.63918e-06 37.5C-2.54447e-06 16.7893 16.7893 -7.33885e-07 37.5 -1.63918e-06Z"
                            fill="url(#paint0_linear_1179_4)" />
                        <defs>
                            <linearGradient id="paint0_linear_1179_4" x1="-1.63917e-06" y1="37.5"
                                x2="75" y2="37.5" gradientUnits="userSpaceOnUse">
                                <stop stop-color="#13C296" stop-opacity="0.31" />
                                <stop offset="1" stop-color="#C4C4C4" stop-opacity="0" />
                            </linearGradient>
                        </defs>
                    </svg>
                </span>
            </div>
            <div class="flex bg-white border py-6 px-6 rounded-3xl grid mt-12">
                <div class="header flex items-center justify-between my-3 text-2xl text-slate-800 font-medium">
                    <h1><span><i class="fas fa-file-contract"></i></span> {{ $user->first_name }}s' Assessment
                    </h1>

                </div>
                <form action="#" method="POST">
                    <!-- Add the form element with action and method -->
                    @csrf
                    <!-- Add the CSRF token for form submission -->

                    {{-- <input type="hidden" name="assessment_id" value="{{ $yearly_a->id }}"> --}}
                    {{-- <input type="hidden" name="q_score" value="{{ $qualificationPercentage }}"> --}}



                    <div class=" justify-items-start mt-6 overflow-y-auto scrollbar-hide scrollable-container">
                        @forelse ($jcp->skills->groupBy('category.category_title') as $category => $skills)
                        <div class="p-3">
                                <h2
                                    class="my-3 text-1xl bg-orange-500 rounded-2xl w-full p-3 text-center text-white font-medium">
                                    {{ $category }}</h2>
                                <!-- Display the category name -->

                                @foreach ($skills as $index => $question)
                                    <!-- Rest of your code for displaying the skill -->
                                    <div
                                        class="focus:outline-none h-fit py-5 my-6 items-center grid grid-cols-1 lg:grid-cols-4
                                    {{ $index % 2 === 0 ? 'bg-gray-100' : 'bg-white' }}">
                                        <div class="flex items-center pl-5">
                                            <p class="text-base font-medium leading-none text-gray-700 mr-2">
                                                {{ $question->skill_title }}
                                            </p>
                                        </div>

                                        <div class="container mb-2 px-5">
                                            <label for="supervisor_score_{{ $question->id }}"
                                                class="block mt-5 lg:mt-0 mb-2 text-sm font-medium border-b pb-3 text-orange-500">Choose
                                                a competency rating</label>
                                            <div class="flex items-center">
                                                @for ($rating = 1; $rating <= 5; $rating++)
                                                    <input type="radio"
                                                        id="supervisor_score_{{ $question->id }}_rating_{{ $rating }}"
                                                        name="supervisor_score[{{ $question->id }}]"
                                                        value="{{ $rating }}"
                                                        class="mr-6 ml-12 focus:ring-orange-500 text-orange-500"
                                                        {{ $rating === $jcp->skills->find($question->id)->pivot->user_rating ? 'checked' : '' }}>
                                                    <label
                                                        for="supervisor_score_{{ $question->id }}_rating_{{ $rating }}">
                                                        @if ($rating === 1)
                                                            Not Competent
                                                        @elseif ($rating === 2)
                                                            Basic Skills
                                                        @elseif ($rating === 3)
                                                            Competent
                                                        @elseif ($rating === 4)
                                                            Developed Skills
                                                        @elseif ($rating === 5)
                                                            Expert
                                                        @endif
                                                    </label>
                                                @endfor
                                            </div>
                                        </div>


                                        <!-- Hidden input for qualification attainment -->
                                        {{-- @foreach ($qualificationsData as $qualificationData)
                                        <input type="hidden" name="qualifications[{{ $question->id }}][{{ $qualificationData['name'] }}]"
                                            value="{{ $qualificationData['attained'] ? 10 : 0 }}">
                                    @endforeach --}}
                                    </div>
                                @endforeach
                            </div>
                        @empty
                            <div class="container flex-auto justify-center text-center">
                                <p class="text-gray-700 text-base mb-4">No questions were added to this assessment.</p>
                            </div>
                        @endforelse

                        <div class="mt-2">
                            <div class="control-group col-12 text-right">
                                <div class="flex space-x-2 justify-end px-2">
                                    <button type="submit"
                                        class="inline-block px-6 py-2.5 bg-sky-900 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-orange-500 hover:shadow-lg focus:bg-sky-900 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-sky-900 active:shadow-lg transition duration-150 ease-in-out">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>




            </div>
            </form>




        </div>





    </div>
</x-app-layout>
