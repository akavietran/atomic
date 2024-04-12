@props([
    'title',
    'class' => null,
    'buttonClass'=>null,
    'classDiv' => null,
    'classInput' => null,
    'classSelect'=>null,
    'label' => [],
    'name' => [],
    'placeholder' => [],
    'type' => [],
    'roles',
    'options'=> [],
    'person',
    'selected'=>[]
])

<div class="container">
    <h2>{{ $title }}</h2>
    <form method="POST"  action="{{ route('person.update', ['person' => $person->id]) }} }}">
      @csrf
      @method('PUT')

        <x-molecules.Inputfiend value="{{ old('full_name', $person->full_name) }}" classInput="{{ $classInput }}" label="{{ $label['full_name'] }}" type="{{ $type['text'] }}"
            name="{{ $name['full_name'] }}" placeholder="{{ $placeholder['full_name'] }}">

        </x-molecules.Inputfiend>

        <x-molecules.Inputfiend value="{{ old('address', $person->address) }}" classInput="{{ $classInput }}" label="{{ $label['address'] }}" type="{{ $type['text'] }}" name="{{ $name['address'] }}"
            placeholder="{{ $placeholder['address'] }}">

        </x-molecules.Inputfiend>

        <x-molecules.Inputfiend value="{{ old('gender', $person->gender) }}" classInput="{{ $classInput }}" label="{{ $label['gender'] }}" type="{{ $type['text'] }}" name="{{ $name['gender'] }}"
        placeholder="{{ $placeholder['gender'] }}">
        </x-molecules.Inputfiend>

        <x-molecules.Inputfiend value="{{ old('birthdate', $person->birthdate) }}"  classInput="{{ $classInput }}" label="{{ $label['birthdate'] }}" type="{{ $type['date'] }}" name="{{ $name['birthdate'] }}"
        placeholder="{{ $placeholder['birthdate'] }}">
        </x-molecules.Inputfiend> 

        <x-molecules.Inputfiend value="{{ old('phone', $person->phone_number) }}"   classInput="{{ $classInput }}" label="{{ $label['phone'] }}" type="{{ $type['text'] }}"
            name="{{ $name['phone'] }}" placeholder="{{ $placeholder['phone'] }}">

        </x-molecules.Inputfiend>

        <x-molecules.Inputfiend value="{{ old('user_id', $person->user_id) }}"   classInput="{{ $classInput }}" label="{{ $label['user_id'] }}" type="{{ $type['text'] }}" name="{{ $name['user_id'] }}"
        placeholder="{{ $placeholder['user_id'] }}">
        </x-molecules.Inputfiend>
      
    <x-molecules.Selectfield classInput="{{ $classInput }}" :selected="$selected['person']" title="company" value="company name"  name="{{ $name['company_id'] }}" :options="$options" >
</x-molecules.Selectfield>


        
        <x-atoms.button type="submit" class="{{ $buttonClass }}">Submit</x-atoms.button>
    </form>
</div>
