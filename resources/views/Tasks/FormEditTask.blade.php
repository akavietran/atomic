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
                <x-organisms.TaskOrganisms.FormEdit title="Edit" class="container"
                :label="[
                    'start_time' => 'start_time',
                    'end_time' => 'end_time',
                    'priority' => 'priority',
                    'name' => 'name',
                    'description' => 'description',
                    'status' => 'status',
                ]"
                :options="[
                    'status'=> [
                        ['id' => 1, 'name' => 'Hoàn thành'],
                        ['id' => 2, 'name' => 'Đang xử lý'],
                        ['id' => 3, 'name' => 'Chưa bắt đầu'],
                        ['id' => 4, 'name' => 'Tạm hoãn'],
                    ],
                    'priority' => [
                        ['id' => 1, 'name' => 'Cao'],
                        ['id' => 2, 'name' => 'Trung bình'],
                        ['id' => 3, 'name' => 'Thấp'],
                    ]
                ]"
                :selected="[
                    'status' => $task->status,
                    'priority' => $task->priority
                ]"
                :name="[
                    'start_time' => 'start_time',
                    'end_time' => 'end_time',
                    'priority' => 'priority',
                    'name' => 'name',
                    'description' => 'description',
                    'status' => 'status',
                ]"
                :placeholder="[
                    'start_time' => 'start_time',
                    'end_time' => 'end_time',
                    'priority' => 'priority',
                    'name' => 'name',
                    'description' => 'description',
                    'status' => 'status',
                ]"
                :task="$task"
                :id="['taskForm' => 'taskForm']"
                :type="['text' => 'text', 'date' => 'date']"
                classInput="form-control" buttonClass="btn btn-primary"
                :class="['class' => 'form-control']"
            >
                <div class="form-group">
                    <label for="project">Project</label>
                    <select class="form-control" name="project_id" id="project">
                        @foreach ($projects as $project)
                            <option value="{{ $project->id }}" {{ old('project_id') == $project->id ? 'selected' : '' }}>{{ $project->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="persons">Persons</label>
                    <select name="persons[]" id="persons" multiple style="display: none;"></select>
                    <div id="persons-checkboxes"></div>
                </div>
            </x-organisms.TaskOrganisms.FormEdit>
            

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
