@props(['active', 'icon'])

@php
    $classes = $active ?? false ? 'bg-gray-500/50 text-white font-semibold' : 'hover:bg-gray-500/50 text-white';
@endphp

<a
    {{ $attributes->class(['block py-2 px-4 font-xs rounded-lg flex flex-row items-center h-6 my-2'])->merge(['class' => $classes]) }}>
    @if ($icon)
        <i class="mr-2 fas fa-{{ $icon }}"></i>
    @endif
    {{ $slot }}
</a>
