@props([ 'name', 'options' => []])

<select  name="{{ $name }}" class="form-control" {{ $attributes }}>
    @foreach($options as $optionValue => $optionLabel)
        <option value="{{ $optionValue }}">{{ $optionLabel }}</option>
    @endforeach
</select>