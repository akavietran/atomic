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
                @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
                <a href="{{ route('project.create') }}" class="btn btn-primary">Create</a>
                <table>
                    <tr>
                        <th>id</th>
                        <th>code</th>
                        <th>name</th>
                        <th>description</th>
                        <th>company</th>
                        <th style="max-width:150px">person</th>
                        <th>action</th>
                    </tr>
                    @foreach ($projects as $project)
                        <tr>
                            <td>{{ $project->id }}</td>
                            <td>{{ $project->code }}</td>
                            <td>{{ $project->name }}</td>
                            <td>{{ $project->description }}</td>
                            <td>{{ $project->company->name }}</td>
                            <td style="max-width:150px">
                                @foreach ($project->persons as $person)
                                  {{ $person->full_name }}
                                @endforeach
                          </td>
                          
                            <td>
                             
                              <a href="{{ route('project.edit', ['project' => $project->id]) }}" class="btn btn-warning">Update</a>
                              <form action="{{ route('project.destroy',['project' => $project->id]) }}" method="POST" style="display: inline;">
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
