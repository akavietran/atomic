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
               
                
                 <div>kết quả</div>
                <table>
                    <tr>
                        <th>Company</th>
                        <th>Project</th>
                        <th>Persons</th>
                        <th>Task</th>
                        <th>Status</th>
                        <th>Priority</th>
          
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
                           
                            
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
        
    </div>
</body>

</html>
