<div class="">
    <div class="h-auto flex flex-col bg-white border border-dashed border-zinc-400 rounded-3xl py-4 my-6 px-6 mx-4">

        <!-- Text and Image Section -->
        <div class="flex-col w-full">

                <div class="flex items-start justify-start  image w-full bg-white h-auto bg-clip-content bg-cover bg-center rounded-3xl bg-no-repeat">

                    <p class="m-6 text-sm text-zinc-500 dark:text-gray-400">Here are the available assessments. Click on each to view submissions and details.</p>

            </div>

        </div>


        <!-- Assessments List Section -->
        <div class="flex flex-col items-center justify-center p-6 my-6 h-full max-h-screen w-full">
            <!-- Grid for Bento Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-2 w-full max-h-[90vh] overflow-y-auto">
                        @forelse ($assessments as $assessment)
                        <div class="m-2">
                        <div class="flex justify-between items-center rounded-3xl py-4 px-2 m-2  bg-gradient-to-br from-white to-zinc-50 border rounded-3xl border-zinc-200 cursor-pointer hover:shadow-lg hover:shadow-sky-200/50 hover:border-sky-400 transition ease-in-out delay-75 duration-300">
                            <a href="{{ route('supervise.list', ['id' => Crypt::encrypt($assessment->id)]) }}" class="flex-1">
                                <div class="flex flex-row items-center">
                                    <div class="rounded-full h-8 w-8 bg-sky-200 mx-3 flex items-center justify-center">
                                        <h1 class="text-sky-800">{{ $assessment->countSubmittedForReview() }}</h1>
                                    </div>
                                <div class="border-l pl-2"><h3 class="text-gray-900 text-lg">{{ $assessment->assessment_title }}</h3>
                                    <p class="text-gray-400 text-sm">View submissions from the {{ $assessment->assessment_title }} assessment.</p></div></div>
                                    <div class="mt-2 w-full">
                                        @php
                                            $assessmentProgress = Auth::user()->subordinateCount() > 0 ? ($assessment->countSubmittedForReview() / Auth::user()->subordinateCount()) * 100 : 0;
                                            $progressColor = $assessmentProgress < 40 ? 'bg-red-500' : ($assessmentProgress < 70 ? 'bg-yellow-400' : 'bg-green-500');
                                        @endphp
                                        <span class="block text-xs font-medium text-gray-500 mb-1">
                                            Assessment Progress {{ number_format((float) $assessmentProgress, 2, '.', '') }}% Complete
                                        </span>
                                        <div class="w-full bg-gray-200 rounded-full h-2.5 dark:bg-gray-700">
                                            <div class="{{ $progressColor }} h-2.5 rounded-full" style="width: {{ $assessmentProgress }}%"></div>
                                        </div>
                                    </div>


                            </a>
                        </div>
                        </div>
                        @empty
                        <div class="text-center">
                            <p class="text-slate-500 text-lg">No assessments were completed.</p>
                        </div>
                        @endforelse
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>
