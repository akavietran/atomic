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
                <table>
                    <tr>
                        <th>Company</th>
                        <th>Project</th>
                        <th>Persons</th>
                        <th>TaskName</th>
                        <th>Status</th>
                        <th>Priority</th>
                        <th>Action</th>
                    </tr>
                    @foreach ($tasks as $task)
                        <tr>
                            <td>
                                {{ $task->person->company->name }}
                            </td>
                            <td>{{ $task->project->name }}</td>
                            <td>
                                {{ $task->person->full_name }}
                               
                            </td>
                            <td>
                                {{ $task->name }}
                               
                            </td>
                            <td>
                                @if($task->status == 1)
                                    Mới tạo
                                @elseif($task->status == 2)
                                    Đang làm
                                @elseif($task->status == 3)
                                    Hoàn thành
                                @else
                                    Tạm hoãn
                                @endif
                            </td>
                           
                            <td>
                                @if($task->priority == 1)
                                    Cao
                                @elseif($task->priority == 2)
                                    Trung Bình
                                @else
                                    Thấp
                                @endif
                            </td>
                           
                            <td>
                                <a href="{{ route('task.edit', ['task' => $task->id]) }}" class="btn btn-warning">Update</a>
                                <form action="{{ route('task.destroy',['task' => $task->id]) }}" method="POST" style="display: inline;">
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
