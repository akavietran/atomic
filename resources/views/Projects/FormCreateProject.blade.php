<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script>
            $(document).ready(function() {

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
</head>

<body class="antialiased">
    <div>
        <div class="" style="display: flex;justify-content: center">
            <div style="width:30%;">
                <x-organisms.ProjectOrganisms.FormCreate title="Create" class="container" :label="[
                    'code' => 'code',
                    'name' => 'name',
                    'description' => 'description',
                    'company_id' => 'company_id',
                    'persons' => 'persons',
                ]"
                    :name="[
                        'code' => 'code',
                        'name' => 'name',
                        'description' => 'description',
                        'company_id' => 'company_id',
                        'persons' => 'persons',
                    ]" :placeholder="[
                        'code' => 'code',
                        'name' => 'name',
                        'description' => 'description',
                        'company_id' => 'company_id',
                    ]" :id="[
                        'projectForm'=>'projectForm',
                        'company' => 'company',
                        'persons' => 'persons',
                        'persons-checkboxes' => 'persons-checkboxes',
                    ]" :type="[
                        'text' => 'text',
                    ]"
                    class="[
                        'class'=>'form-control'
                    ]"
                     :options="$companies"
                    class="form-control"
                    buttonClass="btn btn-primary margin-button" classInput="form-control" />

            </div>
        </div>
    </div>
</body>

</html>
