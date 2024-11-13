@props(['active' => false])

@php
    $classes = $active ? 'bg-sky-300 font-bold text-sky-950 ' : 'hover:bg-sky-500/10 font-semibold hover:text-sky-900 text-sky-900/75';
@endphp

<a
    {{ $attributes->class(['flex items-center align-center px-3 py-2 mx-3 my-1 text-xs rounded-lg text-gray-900 transition duration-150 ease-in-out'])->merge(['class' => $classes]) }}>

    {{-- @if (isset($icon))
        <span class="mr-2">
            {{ $icon }}
        </span>
    @endif --}}

    <span>{{ $slot }}</span>
</a>
