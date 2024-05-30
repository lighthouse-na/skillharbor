@props(['active', 'icon'])

@php
    $classes = $active ?? false ? ' bg-fuchsia-500/20 text-white ' : 'hover:bg-fuchsia-500/10 hover:text-white text-violet-200/75';
@endphp

<a
    {{ $attributes->class(['flex items-center align-center px-2 py-1 m-1 text-sm text-gray-900 rounded-lg rounded-md transition duration-150 ease-in-out'])->merge(['class' => $classes]) }}>
    @if ($icon)
    {{ svg($icon) }}
    @endif
    <span class="ml-4">{{ $slot }}</span>
</a>
