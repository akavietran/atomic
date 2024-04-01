@props(['title', 'name', 'options' => [], 'classDiv' => null])

<div class="form-group {{ $classDiv }}">
    <x-atoms.label :value="$title"></x-atoms.label>
    <x-atoms.select  :name="$name" :options="$options" {{ $attributes }} />
</div>