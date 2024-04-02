@props(['checkedValues','title'=>'gender','name', 'type' => 'checkbox', 'classInput', 'options','classInput'=>null, 'classDiv' => null])

<x-atoms.label :value="$title">
</x-atoms.label>
<div class="{{ $classDiv }}">
  
    @foreach ($options as $option)
    <x-atoms.label :value="$option['value']">
    </x-atoms.label>
        <x-atoms.input classInput={{$classInput}}  type="{{ $type }}" id="{{ $option['id'] }}" name="{{ $name }}"
        value="{{ $option['value'] }}">  
    </x-atoms.input>
        
    @endforeach
</div>