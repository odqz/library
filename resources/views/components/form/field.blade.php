@props(['name', 'label', 'type'])

<label for="{{ $name }}">{{ $label }}:</label>
<input name="{{ $name }}" type="{{ $type }}" id="{{ $name }}" class="text-[#4d4d4d] outline-none px-1 border" {{ $attributes }}>