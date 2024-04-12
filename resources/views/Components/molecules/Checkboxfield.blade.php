@props([
    'name',
    'options' => [],
    'classDiv' => null,
    'classInput' => null,
    'labelValue'=> null,
])


    <div class="dropdown">
      
        <div class="{{ $classDiv }}">
            @foreach ($options as $option)
            <x-atoms.label value="{{ isset($option->$labelValue) ? $option->$labelValue : 'dont have value' }}"></x-atoms.label>

            <x-atoms.input type="checkbox" 
                name="{{ $name }}[]" 
                value="{{ $option['id'] }}" 
                classInput="{{ $classInput }}">
            </x-atoms.input>

            @endforeach
        </div>
    </div>
   
