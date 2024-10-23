<div class="h-screen">
  <div class="mx-12 mt-3 space-y-6">
      <div class="grid grid-cols-3 gap-6">
          @forelse ($assessments as $assessment)
          <div class="group block w-full mx-auto rounded-xl h-48 p-6 bg-white [background:radial-gradient(125%_125%_at_50%_10%,#fff_40%,#7dd3fc_100%)] shadow-md cursor-pointer">
          <div class="p-4 md:p-5">
              <a href="#">
                  <div class="flex items-center space-x-3">
                    <p class="text-sky-900 text-sm"> </p>
                  </div>
                  <div class="my-3">
                    <h3 class="text-sky-950 text-2xl ">{{ $assessment->assessment_title }}</h3>

                  </div>
                  <div class="bg-orange-400 w-12 h-1 rounded-xl my-3 ">

                  </div>
                  <div><p class="text-sky-950 text-sm">View insights from the {{ $assessment->assessment_title }} assessment.</p></div>

              </a>

          </div>
</div>
          @empty
              <p class="text-slate-500 group-hover:text-white text-sm">No assessments were completed.</p>
          @endforelse
      </div>
  </div>
</div>
