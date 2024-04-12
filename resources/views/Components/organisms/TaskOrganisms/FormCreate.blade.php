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
    <form method="POST" action="{{ route('task.store') }}"  enctype="multipart/form-data" id="$id['taskForm']" >
        @csrf
        {{$slot}}
        <x-molecules.Inputfiend classInput="{{ $classInput }}" label="{{ $label['start_time'] }}" type="{{ $type['date'] }}"
            name="{{ $name['start_time'] }}" placeholder="{{ $placeholder['start_time'] }}">

        </x-molecules.Inputfiend>

        <x-molecules.Inputfiend classInput="{{ $classInput }}" label="{{ $label['end_time'] }}" type="{{ $type['date'] }}" name="{{ $name['end_time'] }}"
            placeholder="{{ $placeholder['end_time'] }}">

        </x-molecules.Inputfiend>
        <x-molecules.Selectfield :class="$class['class']"  title="priority" value="priority"  name="{{ $name['priority'] }}"  :options="$options['priority']" >
        </x-molecules.Selectfield>
        <x-molecules.Inputfiend classInput="{{ $classInput }}" label="{{ $label['name'] }}" type="{{ $type['text'] }}" name="{{ $name['name'] }}"
        placeholder="{{ $placeholder['name'] }}">

        </x-molecules.Inputfiend>
        <x-molecules.Inputfiend classInput="{{ $classInput }}" label="{{ $label['description'] }}" type="{{ $type['text'] }}" name="{{ $name['description'] }}"
            placeholder="{{ $placeholder['description'] }}">

        </x-molecules.Inputfiend>
        <x-molecules.Selectfield :class="$class['class']"   title="status" value="status"  name="{{ $name['status'] }}"  :options="$options['status']" >
        </x-molecules.Selectfield>
        <x-atoms.button type="submit" class="{{ $buttonClass }}">Submit</x-atoms.button>
    </form>
</div>
