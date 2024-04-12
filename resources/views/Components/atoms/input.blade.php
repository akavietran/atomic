

@props(['type', 'name', 'placeholder' => null,'classInput'=>null])

<input type="{{ $type }}" class="{{ $classInput }}"  name="{{ $name }}" placeholder="{{ $placeholder }}" {{ $attributes }}>
