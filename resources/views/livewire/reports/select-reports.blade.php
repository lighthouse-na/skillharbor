<div class="h-screen flex flex-wrap items-stretch">
    <div class="flex flex-col items-stretch flex-1 pb-5 mx-auto h-full min-h-[500px] w-full">
        <div class="flex-3 w-full h-full">
            <div class="flex justify-between items-center w-full h-full bg-gradient-to-br from-white to-zinc-50 border border-dashed rounded-3xl border-zinc-200 dark:border-gray-700 dark:from-gray-950 dark:via-gray-900 dark:to-gray-800 max-h-auto shadow-md p-10">
                <div class="flex flex-col flex-1">
                    <p class="mb-5 text-sm text-zinc-500 dark:text-gray-400">Here are the available assessments. Click on each to view and export the reports.</p>

                    <div class="overflow-y-auto h-full">
                        @forelse ($assessments as $assessment)
                        <div class="m-2">
                            <div class="flex justify-between items-center rounded-3xl py-4 px-4 m-2 bg-gradient-to-br from-white to-sky-50 border border-dashed border-zinc-200 cursor-pointer hover:shadow-lg hover:shadow-sky-200/50 hover:border-sky-400 transition ease-in-out delay-75 duration-300">
                                <a href="{{ route('reports.show', ['id' => Crypt::encrypt($assessment->id)]) }}" class="flex-1 flex items-center">
                                    <div class=" flex-grow">
                                        <h3 class="text-gray-900 text-lg">{{ $assessment->assessment_title }}</h3>
                                        <p class="text-gray-400 text-sm">View reports from the {{ $assessment->assessment_title }} assessment.</p>
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
                <img src="https://cdn.dribbble.com/userupload/16856827/file/original-c98b5461f50dc6825620dafbcff6af83.jpg?resize=752x" alt="Dashboard" class="object-cover w-1.5/3 h-full rounded-lg ml-6" />
            </div>
        </div>
    </div>
</div>
