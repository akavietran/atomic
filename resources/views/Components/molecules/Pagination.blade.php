@props(['currentPage', 'lastPage', 'ulClass', 'liClass', 'aClass'])
<nav>
    <ul class="{{ $ulClass }}">
      <x-atoms.li class="{{ $liClass }}">
        <x-atoms.a class="{{ $aClass }}" href="{{ $currentPage > 1 ? route('atomic.index', ['page' => $currentPage - 1]) : route('atomic.index') }}">Previous</x-atoms.a>
    </x-atoms.li>
        @for ($i = 1; $i <= $lastPage; $i++)
            <x-atoms.li class="{{ $liClass }} {{ $i == $currentPage ? 'active' : '' }}">
                <x-atoms.a class="{{ $aClass }}" href="{{ route('atomic.index', ['page' => $i]) }}">{{ $i }}</x-atoms.a>
            </x-atoms.li>
        @endfor
        <x-atoms.li class="{{ $liClass }}">
            <x-atoms.a class="{{ $aClass }}" href="{{ $currentPage < $lastPage ? route('atomic.index', ['page' => $currentPage + 1]) : '#' }}">Next</x-atoms.a>
        </x-atoms.li>
    </ul>
</nav>