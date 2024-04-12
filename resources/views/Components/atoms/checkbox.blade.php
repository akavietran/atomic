@props(['name', 'value', 'isChecked'])

<input type="checkbox" name="{{ $name }}" value="{{ $value }}" {{ $isChecked ? 'checked' : '' }}>
