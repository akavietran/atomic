<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body class="antialiased">
    <div class="container">
        
        @include('navbar')
        <div class="table-country">

            <div >
                <a href="{{ route('role.create') }}" class="btn btn-primary">Create</a>
                <table>
                    <tr>
                        <th>id</th>
                        <th>role</th>
                        <th>description</th>
                        <th>action</th>
                    </tr>
                    @foreach ($roles as $role)
                        <tr>
                            <td>{{ $role->id }}</td>
                            <td>{{ $role->role }}</td>
                            <td>{{ $role->description }}</td>
                            
                            <td>
                             
                              <a href="{{ route('role.edit', ['role' => $role->id]) }}" class="btn btn-warning">Update</a>
                              <form action="{{ route('role.destroy', ['role' => $role->id]) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Destroy</button>
                            </form>
                            </td>
                        </tr>
                    @endforeach
                   

                </table>
            </div>
        </div>
    </div>
</body>

</html>
