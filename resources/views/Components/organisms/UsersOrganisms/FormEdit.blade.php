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
    'roles',
    'user'
])

<div class="container">
    <h2>{{ $title }}</h2>
    <form method="POST" action="{{ route('user.update', ['user' => $user->id]) }} }}">
        @csrf
        @method('PUT')

        <x-molecules.Inputfiend value="{{ old('email', $user->email) }}" classInput="{{ $classInput }}" label="{{ $label['email'] }}" type="{{ $type['email'] }}" name="{{ $name['email'] }}" placeholder="{{ $placeholder['email'] }}">
        </x-molecules.Inputfiend>
        
        

        <x-molecules.Inputfiend  value="{{ old('password', $user->password) }}" classInput="{{ $classInput }}" label="{{ $label['password'] }}" type="{{ $type['password'] }}" name="{{ $name['password'] }}"
            placeholder="{{ $placeholder['password'] }}">

        </x-molecules.Inputfiend>
      
        <x-molecules.Checkboxfield labelValue="role"  name="roles" :options="$roles" classDiv="{{$classDiv}}" classInput="{{$classInput}}" />
        <x-atoms.button type="submit" class="{{ $buttonClass }}">Submit</x-atoms.button>
    </form>
</div>
