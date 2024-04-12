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
    'roles'
])

<div class="container">
    <h2>{{ $title }}</h2>
    <form method="POST" action="{{ route('user.store') }}">
        @csrf

        <x-molecules.Inputfiend classInput="{{ $classInput }}" label="{{ $label['email'] }}" type="{{ $type['email'] }}"
            name="{{ $name['email'] }}" placeholder="{{ $placeholder['email'] }}">

        </x-molecules.Inputfiend>

        <x-molecules.Inputfiend classInput="{{ $classInput }}" label="{{ $label['password'] }}" type="{{ $type['password'] }}" name="{{ $name['password'] }}"
            placeholder="{{ $placeholder['password'] }}">

        </x-molecules.Inputfiend>

        <x-molecules.Checkboxfield labelValue="role" name="roles" :options="$roles" classDiv="{{$classDiv}}" classInput="{{$classInput}}" />
        <x-atoms.button type="submit" class="{{ $buttonClass }}">Submit</x-atoms.button>
    </form>
</div>
