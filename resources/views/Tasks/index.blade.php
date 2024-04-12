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
            <div>
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if(Auth::user() && Auth::user()->hasRole('admin'))            
                <div>
                    <form method="GET" action="{{ route('task.search') }}">
                       <div style="display: flex;align-items:center">
                        <div class="form-group">
                            <label for="search">Search by name:</label>
                            <input  type="text" name="search" id="search" class="form-control" placeholder="Enter name">
                        </div>
                        <button type="submit" class="btn btn-primary" style="    margin-left: 15px;
                        margin-top: 16px;">Search</button>
                       </div>
                    </form>
                </div>
                <div style="display: flex;justify-content: space-between">
                    <a href="{{ route('task.create') }}" class="btn btn-primary">Create</a>
                    <a href="{{ route('tasks.export') }}" class="btn btn-success">Excel</a>
                </div>
                @endif
                
                <x-organisms.index 
                :headers="['Company','Project', 'Persons','TaskName','Status','Priority', Auth::user() && Auth::user()->hasRole('admin') ? 'Action' : '']" 
                :data="$tasks"
                :mainRoute="'task'"
                :row="['company', 'project', 'person','name','status','priority']"
                :pagination="$pagination"
            />
            
              
            </div>
        </div>
        
    </div>
</body>

</html>
