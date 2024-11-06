<div class="">
    <div class="h-auto flex flex-col bg-gradient-to-br from-white to-sky-200 border border-dashed border-sky-400 rounded-3xl py-4 my-6 px-4 mx-4">

        <!-- Text and Image Section -->
        <div class="flex-col w-full">

            <div class="text">

                <p class="m-6 text-sm text-zinc-500 dark:text-gray-400">Here are the available assessments. Click on each to view submissions and details.</p>

            </div>

            <div class="video m-6">

                <video class="object-cover w-full h-72 rounded-lg " autoplay muted loop>

                    <source src="https://cdn.dribbble.com/userupload/11085154/file/original-5d9a19f121d5c7348e4f85bab7f7facd.mp4" type="video/mp4">

                    Your browser does not support the video tag.

                </video>

            </div>

        </div>


        <!-- Assessments List Section -->
        <div class="flex flex-col flex-1 pb-5 m-auto h-full mx-6 max-h-svh w-full">
            <div class="flex-3 w-auto h-auto max-h-svh">
                <div class="flex justify-between items-center w-full max-h-svh overflow-y-auto">
                    <div class="flex flex-col flex-1">
                        <div class="overflow-y-scrollable max-h-svh">
                            @forelse ($assessments as $assessment)
                                <div class="m-2">
                                    <div class="flex justify-between items-center rounded-3xl py-4 my-12 px-4 m-2 bg-gradient-to-br from-white to-sky-50 border border-dashed border-zinc-200 cursor-pointer hover:shadow-lg hover:shadow-sky-200/50 hover:border-sky-400 transition ease-in-out delay-75 duration-300">
                                        <a href="{{ route('reports.show', ['id' => Crypt::encrypt($assessment->id)]) }}" class="flex-1">
                                            <div class="flex flex-row items-center">
                                                <!-- Icon Section -->
                                                <div class="rounded-full h-8 w-8 bg-sky-200 mx-3 flex items-center justify-center">
                                                    <h1 class="text-sky-800"><x-iconoir-stats-up-square /></h1>
                                                </div>
                                                <!-- Assessment Details Section -->
                                                <div class="flex-1">
                                                    <h3 class="text-gray-900 text-lg">{{ $assessment->assessment_title }}</h3>
                                                    <p class="text-gray-400 text-sm">View reports from the {{ $assessment->assessment_title }} assessment.</p>
                                                    <!-- Progress Bar Section -->
                                                    <div class="mt-4"> <!-- Adds top margin for spacing -->
                                                        @php
                                                            $assessmentProgress = $assessment->totalEnrolled > 0 ? ($assessment->completedCount / $assessment->totalEnrolled) * 100 : 0;
                                                            $progressColor = '';
                                                            if ($assessmentProgress < 40) {
                                                                $progressColor = 'bg-red-500'; // Red for low progress
                                                            } elseif ($assessmentProgress < 70) {
                                                                $progressColor = 'bg-yellow-400'; // Yellow for medium progress
                                                            } else {
                                                                $progressColor = 'bg-green-500'; // Green for high progress
                                                            }
                                                        @endphp
                                                        <span class="block text-sm font-medium text-gray-500 mb-1">
                                                            Assessment Progress {{ number_format((float) $assessmentProgress, 2, '.', '') }}% Complete
                                                        </span>
                                                        <div class="w-full bg-gray-200 rounded-full h-2.5 dark:bg-gray-700">
                                                            <div class="{{ $progressColor }} h-2.5 rounded-full" style="width: {{ $assessmentProgress }}%"></div>
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
