@props(['name', 'type' => 'checkbox', 'classInput', 'options','classInput'=>null, 'classDiv' => null])


<div class="{{ $classDiv }}">
    @foreach ($options as $option)
        <label for="{{ $option['id'] }}">
            {{ $option['value'] }}
        </label>
        <x-atoms.input classInput={{$classInput}}  type="{{ $type }}" id="{{ $option['id'] }}" name="{{ $name }}"
        value="{{ $option['value'] }}"> 
       
    </x-atoms.input>
        
    @endforeach
</div>
