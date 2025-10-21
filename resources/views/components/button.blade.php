@props([
    'type' => 'button',
    'variant' => 'primary',
    'class' => '',
    'size' => '',
])
@php
    $baseClass = 'font-semibold w-full p-2 rounded cursor-pointer text-white';

    $variantClass = match ($variant) {
        'primary' => 'bg-blue-500 hover:bg-blue-600',
        'danger' => 'bg-red-500 hover:bg-red-600',
        default => 'bg-blue-500 hover:bg-blue-600', // fallback ke primary
    };

    $sizeClass = match ($size) {
        'sm' => 'text-sm px-3 py-1',
        'lg' => 'text-lg px-6 py-3',
        default => '',
    };
@endphp

<button type="{{ $type }}" class="{{ $baseClass }} {{ $variantClass }} {{ $sizeClass }} {{ $class }}">
    {{ $slot }}
</button>
