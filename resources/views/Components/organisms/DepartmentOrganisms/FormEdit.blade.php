@props([
    'title',
    'class' => null,
    'buttonClass'=>null,
    'classDiv' => null,
    'classInput' => null,
    'label' => [],
    'name' => [],
    'placeholder' => [],
    'type' => [],
    'department',
    'selected'=>[],
    'options'=> [],
])

<div class="container">
    <h2>{{ $title }}</h2>
    <form method="POST" action="{{ route('department.update', ['department' => $department->id]) }} }}">
        @csrf
        @method('PUT')

        <x-molecules.Inputfiend value="{{ old('code', $department->code) }}" classInput="{{ $classInput }}" label="{{ $label['code'] }}" type="{{ $type['text'] }}" name="{{ $name['code'] }}" placeholder="{{ $placeholder['code'] }}">
        </x-molecules.Inputfiend>
        
        <x-molecules.Inputfiend value="{{ old('name', $department->name) }}" classInput="{{ $classInput }}" label="{{ $label['name'] }}" type="{{ $type['text'] }}" name="{{ $name['name'] }}" placeholder="{{ $placeholder['name'] }}">
        </x-molecules.Inputfiend>

        <x-molecules.Inputfiend value="{{ old('parent_id', $department->parent_id) }}" classInput="{{ $classInput }}" label="{{ $label['parent_id'] }}" type="{{ $type['text'] }}" name="{{ $name['parent_id'] }}"
            placeholder="{{ $placeholder['parent_id'] }}">

        </x-molecules.Inputfiend>
        <x-molecules.Selectfield class="{{ $classInput }}"  title="company" value="company name"  name="{{ $name['company_id'] }}" :options="$options['company']" >
        </x-molecules.Selectfield>

        <x-atoms.button type="submit" class="{{ $buttonClass }}">Submit</x-atoms.button>
    </form>
</div>
