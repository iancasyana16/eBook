@props(
    [
        'type' => '',
        'class' => '',
        'value' => '',
        'name' => '',
        'id' => '',
        'placeholder' => '',
    ]
)

<input type="{{ $type }}" name="{{ $name }}" id="{{ $id }}" class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 {{ $class }}" value="{{ old($name, $value) }}" placeholder="{{ $placeholder }}">
