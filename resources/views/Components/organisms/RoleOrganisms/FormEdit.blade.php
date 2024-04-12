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
    'role',
])

<div class="container">
    <h2>{{ $title }}</h2>
    <form method="POST" action="{{ route('role.update', ['role' => $role->id]) }} }}">
        @csrf
        @method('PUT')

        <x-molecules.Inputfiend value="{{ old('role', $role->role) }}" classInput="{{ $classInput }}" label="{{ $label['role'] }}" type="{{ $type['text'] }}" name="{{ $name['role'] }}" placeholder="{{ $placeholder['role'] }}">
        </x-molecules.Inputfiend>
        
        

        <x-molecules.Inputfiend  value="{{ old('description', $role->description) }}" classInput="{{ $classInput }}" label="{{ $label['description'] }}" type="{{ $type['text'] }}" name="{{ $name['description'] }}"
            placeholder="{{ $placeholder['description'] }}">

        </x-molecules.Inputfiend>
        <x-atoms.button type="submit" class="{{ $buttonClass }}">Submit</x-atoms.button>
    </form>
</div>
