<div class="h-screen">
  <div class="mx-12 mt-3 space-y-6">
      <div class="grid grid-cols-3 gap-6">
          @forelse ($assessments as $assessment)
          <div class="group block w-full mx-auto rounded-xl h-48 p-6 bg-gradient-to-br from-sky-950 to-sky-500 ring-1 ring-slate-900/5 space-y-3  transition hover:duration-700 ease-in-out shadow-md">
              <a href="{{ route('reports.show', ['id' => Crypt::encrypt($assessment->id)]) }}">
                  <div class="flex items-center space-x-3">
                    <p class="text-white text-sm">{{$assessment->id}}</p>
                  </div>
                  <div class="my-3">
                    <h3 class="text-white text-2xl ">{{ $assessment->assessment_title }}</h3>

                  </div>
                  <div class="bg-orange-400 w-12 h-1 rounded-xl my-3 ">

                  </div>
                  <div><p class="text-white text-sm">View submissions from the {{ $assessment->assessment_title }} assessment.</p></div>

              </a>

          </div>
          @empty
              <p class="text-slate-500 group-hover:text-white text-sm">No assessments were completed.</p>
          @endforelse
      </div>
  </div>
</div>
