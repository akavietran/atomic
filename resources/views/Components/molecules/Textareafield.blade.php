@props(['label', 'id', 'name','rows','class', 'placeholder', 'value' => null,'classDiv'=>null])

<div class="{{$classDiv}}" >
    <x-atoms.label :value="$label" />
    <x-atoms.textarea :name="$name" :rows="$rows" class="{{$class}}" :placeholder="$placeholder" :value="$value" />
</div>