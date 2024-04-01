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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body class="antialiased">
    <div class="container">
        <div class="table-country">
            

            <div>
                <a href="{{ route('department.create') }}" class="btn btn-primary">Create</a>
                <table>
                    <tr>
                        <th>☐</th>
                        <th>code</th>
                        <th>name</th>
                        <th>action</th>
                    </tr>
                    @foreach ($departments as $department)
                        @if ($department->parent)
                            <tr>
                                <th style="width: 50px; padding-left: 20px;">☐</th>
                                <td>{{ $department->code }}</td>
                                <td>{{ $department->name }}</td>
                                <td>
                                    <a href="{{ route('department.edit', ['department' => $department->id]) }}"
                                        class="btn btn-warning">Update</a>
                                    <form action="{{ route('department.destroy', ['department' => $department->id]) }}"
                                        method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Destroy</button>
                                    </form>
                                </td>
                            </tr>
                        @else
                            <tr>
                                <th style="width: 50px;">☐</th>
                                <td>{{ $department->code }}</td>
                                <td>{{ $department->name }}</td>
                                <td>
                                    <a href="{{ route('department.edit', ['department' => $department->id]) }}"
                                        class="btn btn-warning">Update</a>
                                    <form action="{{ route('department.destroy', ['department' => $department->id]) }}"
                                        method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Destroy</button>
                                    </form>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</body>

</html>
