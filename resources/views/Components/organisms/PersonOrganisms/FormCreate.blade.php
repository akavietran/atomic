@props([
    'title',
    'class' => null,
    'buttonClass'=>null,
    'classDiv' => null,
    'classInput' => null,
    'classSelect'=>null,
    'label' => [],
    'name' => [],
    'placeholder' => [],
    'type' => [],
    'roles',
    'options'=> []
])

<div class="container">
    <h2>{{ $title }}</h2>
    <form method="POST" action="{{ route('person.store') }}">
        @csrf

        <x-molecules.Inputfiend classInput="{{ $classInput }}" label="{{ $label['full_name'] }}" type="{{ $type['text'] }}"
            name="{{ $name['full_name'] }}" placeholder="{{ $placeholder['full_name'] }}">

        </x-molecules.Inputfiend>

        <x-molecules.Inputfiend classInput="{{ $classInput }}" label="{{ $label['address'] }}" type="{{ $type['text'] }}" name="{{ $name['address'] }}"
            placeholder="{{ $placeholder['address'] }}">

        </x-molecules.Inputfiend>

        <x-molecules.Inputfiend classInput="{{ $classInput }}" label="{{ $label['gender'] }}" type="{{ $type['text'] }}" name="{{ $name['gender'] }}"
        placeholder="{{ $placeholder['gender'] }}">
        </x-molecules.Inputfiend>

        <x-molecules.Inputfiend classInput="{{ $classInput }}" label="{{ $label['birthdate'] }}" type="{{ $type['date'] }}" name="{{ $name['birthdate'] }}"
        placeholder="{{ $placeholder['birthdate'] }}">
        </x-molecules.Inputfiend> 

        <x-molecules.Inputfiend classInput="{{ $classInput }}" label="{{ $label['phone'] }}" type="{{ $type['text'] }}"
            name="{{ $name['phone'] }}" placeholder="{{ $placeholder['phone'] }}">

        </x-molecules.Inputfiend>

        <x-molecules.Inputfiend classInput="{{ $classInput }}" label="{{ $label['user_id'] }}" type="{{ $type['text'] }}" name="{{ $name['user_id'] }}"
        placeholder="{{ $placeholder['user_id'] }}">
        </x-molecules.Inputfiend>
      
    <x-molecules.Selectfield classInput="{{ $classInput }}" classSelect="{{$classSelect}}" title="company" value="company name"  name="{{ $name['company_id'] }}" :options="$options" >
</x-molecules.Selectfield>


        
        <x-atoms.button type="submit" class="{{ $buttonClass }}">Submit</x-atoms.button>
    </form>
</div>
