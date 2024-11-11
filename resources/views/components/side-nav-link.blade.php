@props(['active', 'icon'])

@php
    $classes = $active ?? false ? ' bg-sky-800 text-white ' : 'hover:bg-sky-500/10 font-semibold hover:text-sky-900 text-sky-900/75';
@endphp

<a
    {{ $attributes->class(['flex items-center align-center px-3 py-2 mx-3 my-1 text-sm  text-gray-900 rounded-3xl  transition duration-150 ease-in-out'])->merge(['class' => $classes]) }}>

    <span class="">{{ $slot }}</span>
</a>
