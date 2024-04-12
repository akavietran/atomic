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

        @include('navbar')

        <div style="width: fit-content;
            margin: auto">
            @if (session('status'))
                <div class="alert alert-info">
                    {{ session('status') }}
                </div>
            @endif
            @if (Auth::user() && Auth::user()->hasRole('admin'))
                <a href="{{ route('create') }}" class="btn btn-primary">Create</a>
            @endif
            <x-organisms.index :headers="[
                'ID',
                'Name',
                'Code',
                'Description',
                Auth::user() && Auth::user()->hasRole('admin') ? 'Action' : '',
            ]" :data="$countries" :row="['id', 'name', 'code', 'description']" :pagination="$countries" />
        </div>
    </div>
    </div>
</body>

</html>
