@props([
    'title',
    'class' => [],
    'buttonClass'=>null,
    'label' => [],
    'name' => [],
    'id'=>[],
    'placeholder' => [],
    'type' => [],
    'options'=>[],
    'selected' => [],
    'classInput'=>null,
    'task'=>null
])

<div class="container">
    <h2>{{ $title }}</h2>
    <form id="updateTaskForm" method="POST" action="{{ route('task.update', ['task' => $task->id]) }}"
      enctype="multipart/form-data">
      @csrf
      @method('PUT')
        {{$slot}}

        <x-molecules.Inputfiend  value="{{ old('start_time', $task->start_time) }}" classInput="{{ $classInput }}" label="{{ $label['start_time'] }}" type="{{ $type['date'] }}"
            name="{{ $name['start_time'] }}" placeholder="{{ $placeholder['start_time'] }}">

        </x-molecules.Inputfiend>

        <x-molecules.Inputfiend value="{{ old('end_time', $task->end_time) }}" classInput="{{ $classInput }}" label="{{ $label['end_time'] }}" type="{{ $type['date'] }}" name="{{ $name['end_time'] }}"
            placeholder="{{ $placeholder['end_time'] }}">

        </x-molecules.Inputfiend>
        <x-molecules.Selectfield :class="$class['class']"  title="priority" value="priority" :selected="$selected['priority']" name="{{ $name['priority'] }}"  :options="$options['priority']" >
        </x-molecules.Selectfield>
        <x-molecules.Inputfiend value="{{ old('name', $task->name) }}" classInput="{{ $classInput }}" label="{{ $label['name'] }}" type="{{ $type['text'] }}" name="{{ $name['name'] }}"
        placeholder="{{ $placeholder['name'] }}">

        </x-molecules.Inputfiend>
        <x-molecules.Inputfiend value="{{ old('description', $task->description) }}" classInput="{{ $classInput }}" label="{{ $label['description'] }}" type="{{ $type['text'] }}" name="{{ $name['description'] }}"
            placeholder="{{ $placeholder['description'] }}">

        </x-molecules.Inputfiend>
        <x-molecules.Selectfield :class="$class['class']"   title="status" value="status"  name="{{ $name['status'] }}" :selected="$selected['status']"  :options="$options['status']" >
        </x-molecules.Selectfield>
        <x-atoms.button type="submit" class="{{ $buttonClass }}">Submit</x-atoms.button>
    </form>
</div>
