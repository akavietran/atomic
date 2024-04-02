@props([
    'title',
    'class' => null,
    'buttonClass',
    'classDiv' => null,
    'classInput' => null,
    'label' => [],
    'name' => [],
    'placeholder' => [],
    'type' => [],
    'value',
])

<div class="container">
    <h2>{{ $title }}</h2>
    <form method="POST" action="{{ route('atomic.update', ['atomic' => $value->id]) }}">
        @csrf
        @method('PUT')

        <x-molecules.Inputfiend value='{{ $value->name }}' label="{{ $label['name'] }}" type="{{ $type['name'] }}"
            name="{{ $name['name'] }}" placeholder="{{ $placeholder['name'] }}">

        </x-molecules.Inputfiend>
        <x-molecules.Inputfiend value='{{ $value->phone }}' label="{{ $label['phone'] }}" type="{{ $type['phone'] }}"
            name="{{ $name['phone'] }}" placeholder="{{ $placeholder['phone'] }}">

        </x-molecules.Inputfiend>
        <x-molecules.Inputfiend value='{{ $value->date }}' label="{{ $label['date'] }}" type="{{ $type['date'] }}"
            name="{{ $name['date'] }}" placeholder="{{ $placeholder['date'] }}">
        </x-molecules.Inputfiend>
      
        <x-molecules.Checkboxfield title="gender" name="gender" classDiv="div-flex" :options="[['id' => '1', 'value' => 'nam'], ['id' => '2', 'value' => 'Nữ'], ['id' => '3', 'value' => 'Khác']]" />
        <x-molecules.Selectfield title="role" name="role" :options="[
            '1' => 'Dev',
            '2' => 'Leader',
            '3' => 'Admin',
        ]">
            @foreach (['1' => 'Dev', '2' => 'Leader', '3' => 'Admin'] as $optionValue => $optionLabel)
                <option value="{{ $optionValue }}" @if ($value->role == $optionValue) selected @endif>
                    {{ $optionLabel }}</option>
            @endforeach

        </x-molecules.Selectfield>
        <x-molecules.Textareafield rows=4 class="" :value="$value->description" label="{{ $label['description'] }}"
            name="{{ $name['description'] }}" placeholder="{{ $placeholder['description'] }}" />
        <x-atoms.button type="submit" class="btn btn-primary {{ $buttonClass }}">Submit</x-atoms.button>
    </form>
</div>
