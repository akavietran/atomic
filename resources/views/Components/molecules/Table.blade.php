@props(['headers', 'rows', 'buttonClass' => null, 'href', 'datas'])
<div>
    <x-atoms.a class="btn btn-primary" href="{{ route('atomic.create') }}">Create</x-atoms.a>
</div>
<x-atoms.table>
    <x-atoms.thead>
        <tr>
            @foreach ($headers as $header)
                <x-atoms.th>{{ $header }}</x-atoms.th>
            @endforeach

        </tr>
    </x-atoms.thead>
    <tbody>
        @foreach ($rows as $rowIndex => $row)
            <tr>
                @foreach ($row as $cell)
                    <x-atoms.td>{{ $cell }}</x-atoms.td>
                @endforeach
                <x-atoms.td>
                    @php
                        $data = $datas[$rowIndex];
                    @endphp
                    <x-atoms.a href="{{ route('atomic.edit', ['atomic' => $data->id]) }}"
                        class="btn btn-warning {{ $buttonClass }}">Update</x-atoms.a>
                    <x-atoms.button class="btn btn-danger"
                        onclick="showModal('{{ $data->id }}', '{{ $data->name }}')">Destroy</x-atoms.button>
                    {{-- <form action="{{ route('atomic.destroy', ['atomic' => $data->id   ]) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <x-atoms.button type="submit" class="btn btn-danger">Destroy</x-atoms.button>
                    </form> --}}
                </x-atoms.td>
            </tr>
        @endforeach
    </tbody>
</x-atoms.table>
