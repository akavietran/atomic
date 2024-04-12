@props(['headers', 'data', 'mainRoute' => null, 'row'])


<x-atoms.table>
    <x-atoms.thead>
        <tr>
            @foreach ($headers as $header)
                <x-atoms.th>{{ $header }}</x-atoms.th>
            @endforeach
        </tr>
    </x-atoms.thead>
    @foreach ($data as $item)
        <tr>
            @foreach ($row as $cell)
                    <x-atoms.td>{{ $item[$cell] }}</x-atoms.td>
            @endforeach
            <td>
                @if(Auth::user() && Auth::user()->hasRole('admin'))    
                @if ($mainRoute)
                    <x-atoms.a href="{{ route($mainRoute . '.edit', [$mainRoute => $item['id']]) }}" label="Update"
                        class="btn btn-warning">Update</x-atoms.a>
                    <form action="{{ route($mainRoute . '.destroy', [$mainRoute => $item['id']]) }}" method="POST"
                        style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Destroy</button>
                    </form>
                @else
                    <x-atoms.a href="{{ route('edit', ['id' => $item['id']]) }}" label="Update"
                        class="btn btn-warning">Update</x-atoms.a>
                    <form action="{{ route('destroy', ['id' => $item['id']]) }}" method="POST"
                        style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Destroy</button>
                    </form>
                @endif
                @endif
            </td>
        </tr>
    @endforeach
</x-atoms.table>
