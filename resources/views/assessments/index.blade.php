<x-app-layout>
    <x-slot name="header">
        <h2 class="">
            {{ __('Your Assessments') }}
        </h2>
    </x-slot>
    <div class="py-6 px-6">

        {{-- <div class="relative max-w h-48 rounded-3xl overflow-hidden shadow-lg">

            <div class="absolute inset-0 bg-sky-950 bg-[radial-gradient(ellipse_80%_80%_at_50%_-20%,rgba(120,119,198,0.3),rgba(255,255,255,0))]"></div>
            <div class="absolute bottom-0 left-0 p-4 text-white">
                <h2 class="text-2xl font-bold">My Assessments</h2>
                <p class="text-sm">Track your progress with ease</p>
            </div>
        </div> --}}

        <div class="">


        <div class="flex-col rounded-3xl  mb-4 p-4 sm:p-6 h-full dark:bg-gray-800 ">
            @forelse ($assessments as $a)
            <div class="group block w-full mx-auto rounded-3xl shadow-sm border h-auto p-6 bg-white mb-4 bg-sky-200">
                <div class="flex items-center mb-4">
                    <span class="bg-pink-200 text-pink-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded">
                     Assessment
                    </span>
                    <span class="text-gray-400 text-sm">
                        Closing {{ Carbon\Carbon::parse($a->closing_date)->diffForHumans() }}!
                    </span>
                   </div>


                <div class="p-4 md:p-5">

                  <h3 class="text-sky-900 text-2xl font-bold mb-2">

                    {{$a->assessment_title}}
                  </h3>
                  <div class="bg-orange-400 w-12 h-1 rounded-xl mt-6 ">

                  </div>
                  @if ($a->pivot->user_status === 0 && $a->pivot->supervisor_status === 0)
                  <a class="mt-3 inline-flex items-center gap-x-1 text-sky-900 text-sm hover:bg-sky-200 rounded-xl p-2 hover:text-sky-800" href="{{route('user.assessment.show', ['user' => Crypt::Encrypt(Auth::user()->id), 'assessment' => Crypt::Encrypt($a->id)])}}">
                    Get Started
                    <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>
                  </a>
                    @elseif ($a->pivot->user_status === 1 && $a->pivot->supervisor_status === 0)
                    <a class="mt-3 inline-flex items-center gap-x-1 text-sky-900 text-sm hover:bg-sky-200 rounded-xl p-2 hover:text-sky-800" href="{{route('user.assessment.submission',['user' => Crypt::Encrypt(Auth::user()->id), 'assessment' => Crypt::Encrypt($a->id)])}}">
                        View Submission
                        <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>
                      </a>

                    @elseif ($a->pivot->user_status === 1 && $a->pivot->supervisor_status === 1)
                    <a class="mt-3 inline-flex items-center gap-x-1 text-sky-900 text-sm hover:bg-sky-200 rounded-xl p-2 hover:text-sky-800" href="{{route('user.assessment.results',['user' => Crypt::Encrypt(Auth::user()->id), 'assessment' => Crypt::Encrypt($a->id)])}}">
                        View Supervisor Results
                        <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>
                    </a>
                  @endif

                  <div class="flex items-center mt-3">
                    <img alt="" class="w-10 h-10 rounded-full mr-2 shadow-sm" height="40" src="{{ Auth::user()->supervisor->profile_photo_url }}" width="40"/>
                    <span class="text-sky-950">
                     Supervisor:
                     <span class="text-sky-950">
                      {{Auth::user()->supervisor->first_name}} {{Auth::user()->supervisor->last_name}}
                     </span>
                    </span>
                   </div>





                </div>
            </div>


            @empty
            <div class="min-h-60 flex flex-col bg-white border shadow-sm rounded-xl dark:bg-slate-900 dark:border-gray-700 dark:shadow-slate-700/[.7]">
                <div class="flex flex-auto flex-col justify-center items-center p-4 md:p-5">
                  <svg class="size-10 text-gray-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="22" x2="2" y1="12" y2="12"/>
                    <path d="M5.45 5.11 2 12v6a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-6l-3.45-6.89A2 2 0 0 0 16.76 4H7.24a2 2 0 0 0-1.79 1.11z"/>
                    <line x1="6" x2="6.01" y1="16" y2="16"/>
                    <line x1="10" x2="10.01" y1="16" y2="16"/>
                  </svg>
                  <p class="mt-5 text-sm text-gray-800 dark:text-gray-300">
                    You are not currently enrolled to any assessments.
                  </p>
                </div>
            </div>

            @endforelse






        </div>

    </div>


</x-app-layout>
