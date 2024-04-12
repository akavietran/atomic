@props(['class' => null, 'name', 'options' => [],'selected'=>null])



<select class="{{ $class }}" name="{{ $name }}" {{ $attributes }}>
    @foreach ($options as $option)
        <option value="{{ $option['id'] }}" {{ $selected == $option['id'] ? 'selected' : '' }}>{{ $option['name'] }}</option>
    @endforeach
</select>

