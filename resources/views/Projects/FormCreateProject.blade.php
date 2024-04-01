<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body class="antialiased">
    <div>
        <div class="" style="display: flex;justify-content: center">
            <div style="width:30%;">
                <h1>Create</h1>
                <form id="projectForm" method="POST" action="{{ route('project.store') }}"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="code">Code</label>
                        <input class="form-control" type="text" name="code" id="code">
                    </div>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input class="form-control" type="text" name="name" id="name">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <input type="text" class="form-control" name="description" id="description">
                    </div>
                    <div class="form-group">
                        <label for="company">Company</label>
                        <select class="form-control" name="company_id" id="company">
                            @foreach ($companies as $company)
                                <option value="{{ $company->id }}">{{ $company->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-control" for="persons">Persons</label>
                        <select name="persons[]" id="persons" multiple style="display: none;">

                        </select>
                        <div id="persons-checkboxes"></div>
                    </div>

                    <button type="submit" id="submitBtn" class="btn btn-primary">Submit</button>
                </form>

                <script>
                    $(document).ready(function() {
                        $('#projectForm').on('submit', function(event) {
    event.preventDefault();
    var formData = new FormData(this);
    $.ajax({
        url: '/project',
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {
            if (response.success) {
        $('#ajaxResponse').html(response.data);
    }
            if (response.success) {
                window.location.href = '/project';
            }
        },
        error: function(xhr, status, error) {
            console.error(error);
        }
    });
    return false;
});

                        $('#company').on('change', function() {
                            var company_id = $(this).val();
                            $.ajax({
                                url: '{{ route('projects.persons') }}',
                                method: 'POST',
                                data: {
                                    _token: '{{ csrf_token() }}',
                                    company_id: company_id
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


            </div>
        </div>
    </div>
</body>

</html>