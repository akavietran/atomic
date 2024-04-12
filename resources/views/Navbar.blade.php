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
    <!-- resources/views/includes/navbar.blade.php -->

<nav class="navbar navbar-expand-lg navbar-light bg-light ">
    <div class="container @if(Auth::check()) w-75 @else w-50 @endif">
        <a class="navbar-brand" href="{{ url('/')  }}">crud lavarel</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/user')  }}">Users</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/company') }}">Companies</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/person') }}">Persons</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/role') }}">Roles</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/project') }}">Projects</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/task') }}">Task</a>
                </li>
               
            </ul>
        </div>
        @if(Auth::user())
        <div class="ml-auto d-flex align-items-center">
            <form action="{{ url('/logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-outline-danger">Sign out</button>
            </form>
        </div>
        @endif
    </div>
</nav>

</body>

</html>
