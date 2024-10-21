<x-app-layout>
    <x-slot name="header">
        <h2 class="">
            {{ __('Your Assessments') }}
        </h2>
    </x-slot>
    <div class="py-6 px-6">
        <div class="">


        <div class="grid grid-cols-3 gap-4 rounded-lg mb-4 p-4 sm:p-6 h-full dark:bg-gray-800">
            @forelse ($assessments as $a)
            <div class="group block w-full mx-auto rounded-xl h-48 p-6 bg-gradient-to-br from-sky-950 to-sky-500 ring-1 ring-slate-900/5 space-y-3  transition hover:duration-700 ease-in-out shadow-md"">
                <div class="p-4 md:p-5">
                  <h3 class="text-white text-2xl">


                    {{$a->assessment_title}}
                  </h3>
                  <div class="bg-orange-400 w-12 h-1 rounded-xl mt-3 ">

                  </div>
                  @if ($a->pivot->user_status === 0 && $a->pivot->supervisor_status === 0)
                  <a class="mt-3 inline-flex items-center gap-x-1 ttext-white text-sm" href="{{route('user.assessment.show', ['user' => Crypt::Encrypt(Auth::user()->id), 'assessment' => Crypt::Encrypt($a->id)])}}">
                    Get Started
                    <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>
                  </a>
                    @elseif ($a->pivot->user_status === 1 && $a->pivot->supervisor_status === 0)
                    <a class="mt-3 inline-flex items-center gap-x-1 text-white text-sm" href="{{route('user.assessment.submission',['user' => Crypt::Encrypt(Auth::user()->id), 'assessment' => Crypt::Encrypt($a->id)])}}">
                        View Submission
                        <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>
                      </a>

                    @elseif ($a->pivot->user_status === 1 && $a->pivot->supervisor_status === 1)
                    <a class="mt-3 inline-flex items-center gap-x-1 text-white text-sm" href="{{route('user.assessment.results',['user' => Crypt::Encrypt(Auth::user()->id), 'assessment' => Crypt::Encrypt($a->id)])}}">
                        View Supervisor Results
                        <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>
                    </a>
                  @endif



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
