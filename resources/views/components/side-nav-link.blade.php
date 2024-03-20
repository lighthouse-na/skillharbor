@props(['active', 'icon'])

@php
    $classes = $active ?? false ? 'bg-gray-500/50 text-white ' : 'hover:bg-gray-500/50 hover:text-white text-violet-200/75';
@endphp

<a
    {{ $attributes->class(['flex items-center px-2 py-1 m-1 text-sm text-gray-900 rounded-lg rounded-md transition duration-150 ease-in-out'])->merge(['class' => $classes]) }}>
    @if ($icon)
    {{ svg($icon) }}
    @endif
    <span class="ml-3">{{ $slot }}</span>
</a>
