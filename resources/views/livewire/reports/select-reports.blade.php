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
                    <!-- Each Card -->
                    <div class="relative flex flex-col justify-between items-center p-6 bg-gradient-to-br from-white to-zinc-100 rounded-3xl border hover:bg-gray-100 transition ease-in-out duration-300">
                        <a href="{{ route('reports.show', ['id' => Crypt::encrypt($assessment->id)]) }}" class="w-full h-full flex flex-col items-start">
                            <div class="flex items-center w-full mb-3">
                                <!-- Icon Section -->
                                <div class="rounded-full h-10 w-10 bg-sky-200 flex items-center justify-center mr-4">
                                    <h1 class="text-sky-800"><x-iconoir-stats-up-square /></h1>
                                </div>
                                <!-- Assessment Title -->
                                <h3 class="text-gray-900 text-lg font-semibold">{{ $assessment->assessment_title }}</h3>
                            </div>
                            <!-- Assessment Description -->
                            <p class="text-gray-400 text-sm mb-4">View reports from the {{ $assessment->assessment_title }} assessment.</p>

                            <!-- Progress Bar Section -->
                            <div class="mt-2 w-full">
                                @php
                                    $assessmentProgress = $assessment->totalEnrolled > 0 ? ($assessment->completedCount / $assessment->totalEnrolled) * 100 : 0;
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
                @empty
                    <!-- Empty State Card -->
                    <div class="col-span-full text-center p-6 bg-white border border-dashed border-gray-300 rounded-3xl shadow-sm">
                        <p class="text-slate-500 text-lg">No reports available.</p>
                    </div>
                @endforelse
            </div>
        </div>

</div>
