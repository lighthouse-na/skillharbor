<div>
    <div class="relative h-48 w-full rounded-3xl my-3">
        <!-- Image with tint overlay -->


        <!-- Overlay tint -->
        <div class="absolute inset-0 bg-sky-100 bg-[radial-gradient(white_1px,transparent_1px)] [background-size:16px_16px] p-6 mt-4 rounded-3xl shadow-md space-y-6 w-full border-2 border-sky-400 rounded-3xl"></div>

        <!-- Centered text -->
        <p class="text-3xl absolute inset-0 flex items-center justify-center text-center text-sky-700 font-medium px-4">
            Here are the available assessments. Click on each to view and export the reports.
        </p>
    </div>

    <div class="h-screen flex flex-wrap items-stretch">

        <div class="flex flex-col  flex-1 pb-5 m-auto h-full  max-h-svh w-full">
            <div class="flex-3 w-full  max-h-svh">
                <div
                    class="flex justify-between items-center w-full max-h-svh  bg-gradient-to-br from-white to-zinc-50 border border-dashed rounded-3xl border-zinc-200 dark:border-gray-700 dark:from-gray-950 dark:via-gray-900 dark:to-gray-800 max-h-auto shadow-md p-10 overflow-y-auto">
                    <div class="flex flex-col flex-1">


                        <div class="overflow-y-scrollable h- max-h-svh">
                            @forelse ($assessments as $assessment)
                                <div class="m-2">
                                    <div
                                        class="flex justify-between items-center rounded-3xl py-4 px-4 m-2 bg-gradient-to-br from-white to-sky-50 border border-dashed border-zinc-200 cursor-pointer hover:shadow-lg hover:shadow-sky-200/50 hover:border-sky-400 transition ease-in-out delay-75 duration-300">
                                        <a href="{{ route('reports.show', ['id' => Crypt::encrypt($assessment->id)]) }}"
                                            class="flex-1">
                                            <div class="flex flex-row items-center">

                                                <!-- Icon Section -->
                                                <div
                                                    class="rounded-full h-8 w-8 bg-sky-200 mx-3 flex items-center justify-center">
                                                    <h1 class="text-sky-800"><x-iconoir-stats-up-square /></h1>
                                                </div>

                                                <!-- Assessment Details Section -->
                                                <div class="flex-1">
                                                    <h3 class="text-gray-900 text-lg">
                                                        {{ $assessment->assessment_title }}</h3>
                                                    <p class="text-gray-400 text-sm">View reports from the
                                                        {{ $assessment->assessment_title }} assessment.</p>

                                                    <!-- Progress Bar Section -->
                                                    <div class="mt-4"> <!-- Adds top margin for spacing -->
                                                        @php
                                                            $assessmentProgress =
                                                                $assessment->totalEnrolled > 0
                                                                    ? ($assessment->completedCount /
                                                                            $assessment->totalEnrolled) *
                                                                        100
                                                                    : 0;

                                                            $progressColor = '';
                                                            if ($assessmentProgress < 40) {
                                                                $progressColor = 'bg-red-500'; // Red for low progress
                                                            } elseif ($assessmentProgress < 70) {
                                                                $progressColor = 'bg-yellow-400'; // Yellow for medium progress
                                                            } else {
                                                                $progressColor = 'bg-green-500'; // Green for high progress
                                                            }
                                                        @endphp
                                                        <!-- Progress label -->
                                                        <span class="block text-sm font-medium text-gray-500 mb-1">
                                                            Assessment Progress
                                                            {{ number_format((float) $assessmentProgress, 2, '.', '') }}%
                                                            Complete
                                                        </span>

                                                        <!-- Progress bar container -->
                                                        <div
                                                            class="w-full bg-gray-200 rounded-full h-2.5 dark:bg-gray-700">
                                                            <!-- Dynamic progress bar -->
                                                            <div class="{{ $progressColor }} h-2.5 rounded-full"
                                                                style="width: {{ $assessmentProgress }}%"></div>

                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </a>
                                    </div>
                                </div>
                            @empty
                                <div class="text-center">
                                    <p class="text-slate-500 text-lg">No reports available.</p>
                                </div>
                            @endforelse

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
