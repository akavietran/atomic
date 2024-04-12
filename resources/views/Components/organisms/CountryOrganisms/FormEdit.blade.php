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
    'country',
])

<div class="container">
    <h2>{{ $title }}</h2>
    <form method="POST" action="{{ route('update', ['id' => $country->id]) }} }}">
        @csrf
        @method('PUT')

        <x-molecules.Inputfiend value="{{ old('code', $country->code) }}" classInput="{{ $classInput }}" label="{{ $label['code'] }}" type="{{ $type['text'] }}" name="{{ $name['code'] }}" placeholder="{{ $placeholder['code'] }}">
        </x-molecules.Inputfiend>
        
        <x-molecules.Inputfiend value="{{ old('name', $country->name) }}" classInput="{{ $classInput }}" label="{{ $label['name'] }}" type="{{ $type['text'] }}" name="{{ $name['name'] }}" placeholder="{{ $placeholder['name'] }}">
        </x-molecules.Inputfiend>

        <x-molecules.Inputfiend  value="{{ old('description', $country->description) }}" classInput="{{ $classInput }}" label="{{ $label['description'] }}" type="{{ $type['text'] }}" name="{{ $name['description'] }}"
            placeholder="{{ $placeholder['description'] }}">

        </x-molecules.Inputfiend>
        <x-atoms.button type="submit" class="{{ $buttonClass }}">Submit</x-atoms.button>
    </form>
</div>
