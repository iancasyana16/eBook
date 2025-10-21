@props(
    [
        'for' => '',
        'class' => ''
    ]
)

<label for="{{ $for }}" class="font-semibold text-sm {{ $class }}">{{ $slot }}</label>