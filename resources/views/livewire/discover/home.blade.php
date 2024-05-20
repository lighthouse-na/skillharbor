<div class="h-screen">
    <div class="grid grid-cols-5 mx-12 gap-3 mt-3">

    @forelse ($assessments as $assessment)

    <a href="#" class="group block max-w-xs mx-auto rounded-lg p-6 bg-white ring-1 ring-slate-900/5 space-y-3 hover:bg-gradient-to-b from-fuchsia-900 to-fuchsia-600  transition hover:duration-700 ease-in-out">

        <div class="flex items-center space-x-3">
         <x-iconoir-doc-star class="h-6 w-6 text-fuchsia-500 group-hover:text-white" />

          <h3 class="text-slate-900 group-hover:text-white text-sm font-semibold">{{$assessment->assessment_title}}</h3>
        </div>
        <p class="text-slate-500 group-hover:text-white text-sm">View insights from the {{$assessment->assessment_title}} assessment.</p>
      </a>


    @empty

    <p class="text-slate-500 group-hover:text-white text-sm">No assessments were completed.</p>


    @endforelse
</div>

</div>
