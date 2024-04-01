@props(['name', 'rows', 'placeholder','class','value'])

<textarea  name="{{ $name }}" rows="{{ $rows }}" class="form-control {{ $class }}" placeholder="{{ $placeholder }}" {{ $attributes }}>{{$value}}</textarea>