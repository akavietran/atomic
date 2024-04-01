@props(['label', 'type', 'name', 'placeholder', 'class','classDiv'=> null,'classInput'=>null,'value'=>null])

<div class="{{$classDiv}}">
    <x-atoms.label :value="$label" />
    <x-atoms.input classInput="{{$classInput}}" :value="$value"  :type="$type" :name="$name" :placeholder="$placeholder" />
</div>
