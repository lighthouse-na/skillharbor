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
                                <a href="{{ route('supervise.show', ['id' => Crypt::encrypt($assessment->id), 'assessment_id' => Crypt::encrypt($assessment->enrolled[0]['assessment_id'])]) }}"
                                    class="ml-1 text-sm font-medium text-white hover:text-sky-200 md:ml-2 ">Completed
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
                                    Employee Report
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

            <div class="flex bg-white border py-6 px-6 rounded-3xl grid mt-12">
                <div class="header flex items-center justify-between my-3 text-2xl text-slate-800 font-medium">
                    <h1><span><i class="fas fa-file-contract"></i></span> {{ $user->first_name }}s' Assessment
                    </h1>

                </div>
                <form action="{{route('supervise.store', ['user' =>$user->id, 'assessment' => $assessment->id, 'jcp'=>$jcp->id])}}" method="POST">
                    <!-- Add the form element with action and method -->
                    @csrf
                    <!-- Add the CSRF token for form submission -->

                    {{-- <input type="hidden" name="assessment_id" value="{{ $yearly_a->id }}"> --}}
                    {{-- <input type="hidden" name="q_score" value="{{ $qualificationPercentage }}"> --}}



                    <div class=" justify-items-start mt-6 overflow-y-auto scrollbar-hide scrollable-container">
                        @forelse ($jcp->skills->groupBy('category.category_title') as $category => $skills)
                        <div class="p-3">
                                <h2
                                    class="my-3 text-1xl bg-sky-500 rounded-2xl w-full p-3 text-center text-white font-medium">
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
                                            <label for="supervisor_rating_{{ $question->id }}"
                                                class="block mt-5 lg:mt-0 mb-2 text-sm font-medium border-b pb-3 text-sky-500">Choose
                                                a competency rating</label>
                                            <div class="flex items-center">
                                                @for ($rating = 1; $rating <= 5; $rating++)
                                                    <input type="radio"
                                                        id="supervisor_score_{{ $question->id }}_rating_{{ $rating }}"
                                                        name="supervisor_score[{{ $question->id }}]"
                                                        value="{{ $rating }}"
                                                        class="mr-6 ml-12 focus:ring-sky-500 text-sky-500"
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
                                        class="inline-block px-6 py-2.5 bg-sky-900 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-sky-500 hover:shadow-lg focus:bg-sky-900 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-sky-900 active:shadow-lg transition duration-150 ease-in-out">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>




            </div>
            </form>




        </div>





    </div>
</x-app-layout>
