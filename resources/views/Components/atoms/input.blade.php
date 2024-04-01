

@props(['type', 'name', 'placeholder' => null,'classInput'=>null])

<input type="{{ $type }}" class="form-control {{$classInput}}"  name="{{ $name }}" placeholder="{{ $placeholder }}" {{ $attributes }}>
