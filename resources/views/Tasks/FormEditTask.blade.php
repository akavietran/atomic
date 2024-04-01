<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</head>

<body class="antialiased">
    <div>
        <div class="" style="display: flex;justify-content: center">
            <div style="width:30%;">
                <h1>Update Task</h1>
                <form id="updateTaskForm" method="POST" action="{{ route('task.update', ['task' => $task->id]) }}"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="project">Project</label>
                        <select class="form-control" name="project_id" id="project">
                            @foreach ($projects as $project)
                                <option value="{{ $project->id }}" {{ $task->project_id == $project->id ? 'selected' : '' }}>{{ $project->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                      <label for="persons">Persons</label>
                      <select class="form-control" name="persons[]" id="persons">
                          @foreach ($persons as $person)
                              <option value="{{ $person->id }}" {{ $task->person_id == $person->id ? 'selected' : '' }}>
                                  {{ $person->full_name }}
                              </option>
                          @endforeach
                      </select>
                  </div>
                  
                    <div class="form-group">
                        <label for="start_time">Start Time</label>
                        <input class="form-control" type="date" name="start_time" id="start_time" value="{{ $task->start_time }}">
                    </div>
                    <div class="form-group">
                        <label for="end_time">End Time</label>
                        <input class="form-control" type="date" name="end_time" id="end_time" value="{{ $task->end_time }}">
                    </div>
                    <div class="form-group">
                        <label for="priority">Priority</label>
                        <select class="form-control" name="priority" id="priority">
                            <option value="1" {{ $task->priority == 1 ? 'selected' : '' }}>Cao</option>
                            <option value="2" {{ $task->priority == 2 ? 'selected' : '' }}>Trung Bình</option>
                            <option value="3" {{ $task->priority == 3 ? 'selected' : '' }}>Thấp</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input class="form-control" type="text" name="name" id="name" value="{{ $task->name }}">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <input class="form-control" type="text" name="description" id="description" value="{{ $task->description }}">
                    </div>

                    <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-control" name="status" id="status">
                            <option value="1" {{ $task->status == 1 ? 'selected' : '' }}>Mới tạo</option>
                            <option value="2" {{ $task->status == 2 ? 'selected' : '' }}>Đang làm</option>
                            <option value="3" {{ $task->status == 3 ? 'selected' : '' }}>Hoàn thành</option>
                            <option value="4" {{ $task->status == 4 ? 'selected' : '' }}>Tạm hoãn</option>
                        </select>
                    </div>

                    <button type="submit" id="submitBtn" class="btn btn-primary">Submit</button>
                </form>

            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#updateTaskForm').on('submit', function(event) {
                event.preventDefault();
                var formData = new FormData(this);
                $.ajax({
                    url: '{{ route('task.update', ['task' => $task->id]) }}',
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        if (response.success) {
                            window.location.href = '/task';
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
                return false;
            });
            $('#project').on('change', function() {
                            var project_id = $(this).val();
                            $.ajax({
                                url: '{{ route('tasks.persons') }}',
                                method: 'POST',
                                data: {
                                    _token: '{{ csrf_token() }}',
                                    project_id: project_id
                                },
                                success: function(response) {
                                    $('#persons').empty();
                                    $.each(response, function(index, person) {
                                        $('#persons').append('<option value="' + person.id + '">' +
                                            person.full_name + '</option>');
                                    });

                                    $('#persons-checkboxes').empty();
                                    $.each(response, function(index, person) {
                                        $('#persons-checkboxes').append(
                                            '<input type="checkbox" name="persons[]" value="' +
                                            person.id + '"> ' + person.full_name + '<br>');
                                    });
                                }
                            });
                        });
        });
    </script>
</body>

</html>
