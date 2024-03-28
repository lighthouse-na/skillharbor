<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="container text-black mx-auto px-6 py-3 rounded-3xl">
                <div class="container w-full">
                    <div class="flex-inline">
                        <div class="overview pb-3 border-b">
                            <h3 class="flex justify-start text-grey-300 text-lg font-inter">Overview</h3>

                            <h3 class="flex justify-start text-indigo-500 font-bold font-inter">
                                {{ $assessment->assessment_title }}</h3>
                        </div>
                    </div>


                </div>
                <div class="mt-3 mx-4 flex flex-wrap">
                    <div class="w-full px-4 sm:w-2/3 lg:w-3/12">

                        <div class="mb-10 w-full">


                            <div class="radial-progress text-indigo-500 mt-6"
                                style="--value:{{ $user->competency_rating }}; --size:12rem; --thickness: 2rem;">
                                {{ $user->competency_rating }}</div>


                        </div>
                    </div>


                    @if ($jcp->isNotEmpty())
                    <div class="w-full px-4 sm:w-1/2 lg:w-6/12 text-grey-500">
                        <div class="grow-0 shrink-0 basis-auto w-10/12 pl-4 md:pl-6 mt-6">
                            <h4 class="text-dark mb-2 text-lg text-indigo-500 font-semibold">Job Competency Profile
                                Details
                            </h4>
                            <p>
                                <strong class="text-indigo-500">Employee Name:
                                </strong>{{ $user->first_name . ' ' . $user->last_name }}
                            </p>
                            <p>
                                <strong class="text-indigo-500">Job title: </strong>{{ $jcp[0]->position_title }}
                            </p>
                            <p>
                                <strong class="text-indigo-500">Job Grade: </strong>{{ $jcp[0]->job_grade }}
                            </p>

                            <p>
                                <strong class="text-indigo-500">Job Purpose: </strong>{{ $jcp[0]->job_purpose }}
                            </p>


                        </div>
                    </div>
                </div>
            </div>


            </div>
            <div class="flex bg-white shadow-lg py-6 px-6 rounded-3xl grid mt-12 max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="header flex items-center justify-between my-3 text-2xl text-slate-800 font-medium">
                    <h1><span><i class="fas fa-file-contract"></i></span> {{ $user->first_name }} {{$user->last_name}}
                    </h1>

                </div>
                <form action="{{route('user-assessment.storeEmployee', ['user' =>$user->id, 'assessment' => $assessment->id, 'jcp'=>$jcp[0]->id])}}" method="POST">
                    <!-- Add the form element with action and method -->
                    @csrf
                    <!-- Add the CSRF token for form submission -->

                    {{-- <input type="hidden" name="assessment_id" value="{{ $assessment->id }}"> --}}
                    {{-- <input type="hidden" name="q_score" value="{{ $qualificationPercentage }}"> --}}



                    <div class=" justify-items-start mt-6 overflow-y-auto scrollbar-hide scrollable-container" >
                        @forelse ($jcp[0]->skills->groupBy('category.category_title') as $category => $skills)
                            <div class="p-3">
                                <h2
                                    class="my-3 text-1xl bg-indigo-500 rounded-2xl w-full p-3 text-center text-white font-medium">
                                    {{ $category }}</h2>
                                <!-- Display the category name -->

                                @foreach ($skills as $index => $question)
                                    <!-- Rest of your code for displaying the skill -->
                                    <div
                                        class="focus:outline-none rounded-lg h-fit py-5 my-6 items-center grid grid-cols-1 lg:grid-cols-4
                                    {{ $index % 2 === 0 ? 'bg-gray-100' : 'bg-white' }}">
                                        <div class="flex items-center pl-5">
                                            <p class="text-base font-medium leading-none text-gray-700 mr-2">
                                                {{ $question->skill_title }}
                                            </p>
                                        </div>

                                        <div class="container mb-2 px-5">
                                            <label for="questions_{{ $question->id }}"
                                                class="block mt-5 lg:mt-0 mb-2 text-sm font-medium border-b pb-3 text-indigo-500">Choose
                                                a competency rating</label>
                                            <div class="flex items-center">
                                                @for ($rating = 1; $rating <= 5; $rating++)
                                                    <input type="radio"
                                                        id="questions_{{ $question->id }}_rating_{{ $rating }}"
                                                        name="questions[{{ $question->id }}]"
                                                        value="{{ $rating }}"
                                                        class="mr-6 ml-12 focus:ring-indigo-500 text-indigo-500"
                                                        {{ $rating === 1 ? 'checked' : '' }}>
                                                    <label
                                                        for="questions_{{ $question->id }}_rating_{{ $rating }}">
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
                                        class="inline-block px-6 py-2.5 bg-red-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-indigo-500 hover:shadow-lg focus:bg-sky-900 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-sky-900 active:shadow-lg transition duration-150 ease-in-out">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>




        </div>

    </div>

                    @else
                    <div class="container flex-auto justify-center text-center">
                        <p class="text-red-700 text-base mb-4">Your Job Competency Profile is not complete. Please talk to your supervisor.</p>
                    </div>

                    @endif



</x-app-layout>
