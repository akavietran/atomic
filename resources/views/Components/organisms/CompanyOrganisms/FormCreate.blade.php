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
])

<div class="container">
    <h2>{{ $title }}</h2>
    <form method="POST" action="{{ route('company.store') }}">
        @csrf

        <x-molecules.Inputfiend classInput="{{ $classInput }}" label="{{ $label['code'] }}" type="{{ $type['text'] }}"
            name="{{ $name['code'] }}" placeholder="{{ $placeholder['code'] }}">

        </x-molecules.Inputfiend>
        <x-molecules.Inputfiend classInput="{{ $classInput }}" label="{{ $label['name'] }}" type="{{ $type['text'] }}"
            name="{{ $name['name'] }}" placeholder="{{ $placeholder['name'] }}">

        </x-molecules.Inputfiend>

        <x-molecules.Inputfiend classInput="{{ $classInput }}" label="{{ $label['address'] }}" type="{{ $type['text'] }}" name="{{ $name['address'] }}"
            placeholder="{{ $placeholder['address'] }}">

        </x-molecules.Inputfiend>
        <x-atoms.button type="submit" class="{{ $buttonClass }}">Submit</x-atoms.button>
    </form>
</div>
