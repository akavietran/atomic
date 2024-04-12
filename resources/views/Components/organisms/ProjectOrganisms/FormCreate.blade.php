@props([
    'title',
    'class' => [],
    'buttonClass'=>null,
    'classDiv' => null,
    'classInput' => null,
    'label' => [],
    'name' => [],
    'id'=>[],
    'placeholder' => [],
    'type' => [],
    'options'=>[]
])

<div class="container">
    <h2>{{ $title }}</h2>
    <form :id="$id['projectForm']" method="POST" action="{{ route('project.store') }}"  enctype="multipart/form-data">
        @csrf

        <x-molecules.Inputfiend classInput="{{ $classInput }}" label="{{ $label['code'] }}" type="{{ $type['text'] }}"
            name="{{ $name['code'] }}" placeholder="{{ $placeholder['code'] }}">

        </x-molecules.Inputfiend>

        <x-molecules.Inputfiend classInput="{{ $classInput }}" label="{{ $label['name'] }}" type="{{ $type['text'] }}" name="{{ $name['name'] }}"
            placeholder="{{ $placeholder['name'] }}">

        </x-molecules.Inputfiend>
        
        <x-molecules.Inputfiend classInput="{{ $classInput }}" label="{{ $label['description'] }}" type="{{ $type['text'] }}" name="{{ $name['description'] }}"
            placeholder="{{ $placeholder['description'] }}">

        </x-molecules.Inputfiend>
        <x-molecules.Selectfield :class="$class"  :id="$id['company']"  title="company" value="company"  name="{{ $name['company_id'] }}"  :options="$options" >
        </x-molecules.Selectfield>
        <x-molecules.ApiPerson  :id="$id"  title="person" name="{{ $name['persons'] }}" >
        </x-molecules.ApiPerson>
        
        <x-atoms.button type="submit" class="{{ $buttonClass }}">Submit</x-atoms.button>
    </form>
</div>
