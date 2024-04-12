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
    'options'=>[],
    'project'=>null,
    'div'=>null
])

<div class="container">
    <h2>{{ $title }}</h2>
    <form action="{{ route('project.update', ['project' => $project->id]) }}" enctype="multipart/form-data" id="{{$id['projectForm']}}">
      @csrf
      @method('PUT')

        <x-molecules.Inputfiend value="{{ old('code', $project->code) }}" classInput="{{ $classInput }}" label="{{ $label['code'] }}" type="{{ $type['text'] }}"
            name="{{ $name['code'] }}" placeholder="{{ $placeholder['code'] }}">

        </x-molecules.Inputfiend>

        <x-molecules.Inputfiend value="{{ old('name', $project->name) }}" classInput="{{ $classInput }}" label="{{ $label['name'] }}" type="{{ $type['text'] }}" name="{{ $name['name'] }}"
            placeholder="{{ $placeholder['name'] }}">

        </x-molecules.Inputfiend>
        
        <x-molecules.Inputfiend  value="{{ old('description', $project->description) }}" classInput="{{ $classInput }}" label="{{ $label['description'] }}" type="{{ $type['text'] }}" name="{{ $name['description'] }}"
            placeholder="{{ $placeholder['description'] }}">

        </x-molecules.Inputfiend>
        
        {{ $slot }}
        <x-atoms.button type="submit" class="{{ $buttonClass }}">Submit</x-atoms.button>
    </form>
</div>
