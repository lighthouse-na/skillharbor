<div class="h-screen">
  <div class="mx-12 mt-3 space-y-6">
      <div class="grid grid-cols-3 gap-6">
          @forelse ($assessments as $assessment)
          <div class="group block w-full mx-auto rounded-lg p-4 bg-white ring-1 ring-slate-900/5 space-y-3 hover:bg-fuchsia-100 transition hover:duration-700 ease-in-out">
              <a href="{{ route('reports.show', ['id' => Crypt::encrypt($assessment->id)]) }}">
                  <div class="flex items-center space-x-3">
                      <x-iconoir-doc-star class="h-6 w-6 text-fuchsia-500" />
                      <h3 class="text-slate-900 text-sm font-semibold">{{ $assessment->assessment_title }}</h3>
                  </div>
                  <p class="text-slate-500 text-sm">View submissions from the {{ $assessment->assessment_title }} assessment.</p>
              </a>

          </div>
          @empty
              <p class="text-slate-500 group-hover:text-white text-sm">No assessments were completed.</p>
          @endforelse
      </div>
  </div>
</div>
