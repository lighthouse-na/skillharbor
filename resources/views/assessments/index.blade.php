<x-app-layout>
    <x-slot name="header">
        <h2 class="text-lg font-semibold text-gray-900">
            {{ __('Your Assessments') }}
        </h2>
    </x-slot>
    <div class="py-6 px-6">
        <div class="flex grid grid-cols-2 gap-6">
            @forelse ($assessments as $a)
                <div class="flex flex-col flex-1 items-stretch h-100">
                    <div class="flex flex-col items-stretch flex-1 mx-auto h-100  w-full">
                        <div class="relative flex-3 w-full h-100">

                            <div
                                class="flex flex-row justify-between items-center w-full h-auto bg-pink overflow-hidden bg-gradient-to-br from-white to-zinc-50 rounded-3xl dark:border-gray-700 dark:from-gray-950 dark:via-gray-900 dark:to-gray-800 max-h-[500px]  ">

                                <!-- Header Image Section -->


                                <!-- Left Section: Title, Date, Supervisor Info -->
                                <div class="flex relative flex-col p-6 w-full">
                                    <div class="flex items-center justify-center">


                                        <div class="flex-grow flex-col">

                                            <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-200">
                                                {{ $a->assessment_title }}</h2>

                                                <div class="mt-1">
                                                    <p class="text-sm text-zinc-500 dark:text-gray-400">Opened
                                                        {{ Carbon\Carbon::parse($a->created_at)->diffForHumans() }}</p>
                                                    <p class="text-sm text-red-500 dark:text-red-400">Closing:
                                                        {{ Carbon\Carbon::parse($a->closing_date)->diffForHumans() }}</p>
                                                </div>
                                            <div

                                                class="flex relative my-3 items-center space-x-2 border rounded-3xl p-2">
                                                @if (Auth::check() && Auth::user()->supervisor)
                                                    <img alt="Supervisor Photo" class="w-10 h-10 rounded-full shadow-sm"
                                                        src="{{ Auth::user()->supervisor->profile_photo_url }}" />
                                                    <span class="text-sky-400 text-xs">Supervisor: <span
                                                            class="text-sky-950">{{ Auth::user()->supervisor->first_name }}
                                                            {{ Auth::user()->supervisor->last_name }}</span></span>
                                                @else
                                                    <span class="text-sky-950">Supervisor information not
                                                        available</span>
                                                @endif
                                                <div class="absolute   right-2">
                                                    @php
                                                        // Assuming the closing date is stored in $a->closing_date
                                                        $isClosed = now()->greaterThan(
                                                            \Carbon\Carbon::parse($a->closing_date),
                                                        );
                                                    @endphp
                                                    @if ($a->pivot->user_status === 0 && $a->pivot->supervisor_status === 0)
                                                        @if ($isClosed)
                                                            <!-- Disabled Get Started Button -->
                                                            <span
                                                                class="inline-flex items-center gap-x-1 text-red-900 text-sm bg-red-200 rounded-3xl p-2 px-3 shadow-sm cursor-not-allowed opacity-50">
                                                                Get Started
                                                            </span>
                                                            {{-- <p class="text-sm text-zinc-600 dark:text-gray-300 mt-3">The assessment closed unfortunately!</p> --}}
                                                        @else
                                                            <!-- Enabled Get Started Button -->
                                                            <a class="inline-flex items-center gap-x-1 text-sky-900 text-sm bg-sky-200 rounded-xl p-2 px-3 shadow-sm hover:bg-sky-700 hover:text-sky-100 transition ease-in-out delay-75 duration-300"
                                                                href="{{ route('user.assessment.show', ['user' => Crypt::encrypt(Auth::user()->id), 'assessment' => Crypt::encrypt($a->id)]) }}">
                                                                Get Started
                                                            </a>
                                                        @endif
                                                    @elseif ($a->pivot->user_status === 1 && $a->pivot->supervisor_status === 0)
                                                        <a class="inline-flex items-center gap-x-1 text-orange-900 text-sm bg-orange-200 rounded-xl p-2 px-3 shadow-sm hover:bg-orange-700 hover:text-orange-100 transition ease-in-out delay-75 duration-300"
                                                            href="{{ route('user.assessment.submission', ['user' => Crypt::encrypt(Auth::user()->id), 'assessment' => Crypt::encrypt($a->id)]) }}">
                                                            View Submission
                                                        </a>
                                                        {{-- <p class="text-sm text-zinc-600 dark:text-gray-300 mt-3">Thank you for participating!</p> --}}
                                                    @elseif ($a->pivot->user_status === 1 && $a->pivot->supervisor_status === 1)
                                                        <a class="inline-flex items-center gap-x-1 text-green-900 text-sm bg-green-200 rounded-xl p-2 shadow-sm hover:bg-green-700 hover:text-green-100 transition ease-in-out delay-75 duration-300"
                                                            href="{{ route('user.assessment.results', ['user' => Crypt::encrypt(Auth::user()->id), 'assessment' => Crypt::encrypt($a->id)]) }}">
                                                            View Supervisor Results
                                                        </a>
                                                        {{-- <p class="text-sm text-zinc-600 dark:text-gray-300 mt-3">Thank you for participating!</p> --}}
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Add any additional controls or icons here, if needed -->

                                    </div>




                                    <!-- Supervisor Info -->


                                    <!-- Action Button -->

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            @empty
                <div
                    class="min-h-60 flex flex-col bg-white border shadow-sm rounded-xl dark:bg-slate-900 dark:border-gray-700 dark:shadow-slate-700/[.7]">
                    <div class="flex flex-auto flex-col justify-center items-center p-4 md:p-5">
                        <svg class="size-10 text-gray-500" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round"
                            stroke-linejoin="round">
                            <line x1="22" x2="2" y1="12" y2="12" />
                            <path
                                d="M5.45 5.11 2 12v6a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-6l-3.45-6.89A2 2 0 0 0 16.76 4H7.24a2 2 0 0 0-1.79 1.11z" />
                            <line x1="6" x2="6.01" y1="16" y2="16" />
                            <line x1="10" x2="10.01" y1="16" y2="16" />
                        </svg>
                        <p class="mt-5 text-sm text-gray-800 dark:text-gray-300">You are not currently enrolled in any
                            assessments.</p>
                    </div>
                </div>
            @endforelse
        </div>

    </div>
    <div
        class="my-4 m-3 p-3 border  border-dashed bg-gradient-to-br from-white to-zinc-50 rounded-3xl border-zinc-200 dark:border-gray-700 dark:from-gray-950 dark:via-gray-900 dark:to-gray-800 max-h-[500px]  ">
        {{ $assessments->links() }}
    </div>
</x-app-layout>
