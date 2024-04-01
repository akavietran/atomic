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
                <a href="{{ route('person.create') }}" class="btn btn-primary">Create</a>
                <table>
                    <tr>
                        <th>id</th>
                        <th>full_name</th>
                        <th>gender</th>
                        <th>birthdate</th>
                        <th>phone_number</th>
                        <th>address</th>
                        <th>company</th>
                    
                        <th>action</th>
                    </tr>
                    @foreach ($persons as $person)
                        <tr>
                            <td>{{ $person->id }}</td>
                            <td>{{ $person->full_name }}</td>
                            <td>{{ $person->gender }}</td>
                            <td>{{ $person->birthdate }}</td>
                            <td>{{ $person->phone_number }}</td>
                            <td>{{ $person->address }}</td>
                            <td>{{ $person->company->name}}</td>
                            <td>
                             
                              <a href="{{ route('person.edit', ['person' => $person->id]) }}" class="btn btn-warning">Update</a>
                              <form action="{{ route('person.destroy', ['person' => $person->id]) }}" method="POST" style="display: inline;">
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
