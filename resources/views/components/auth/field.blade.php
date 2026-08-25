@props(['name', 'label' => $name, 'type' => 'text'])

<div class="flex gap-2">
  <label for="{{ $name }}">{{ $label }}:</label>
  <input id="{{ $name }}" name="{{ $name }}" type="{{ $type }}" {{ $attributes }} class="text-[#4d4d4d] outline-none px-1 border">
</div>