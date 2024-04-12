<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body class="antialiased">
    <div>
        <div class="" style="display: flex;justify-content: center">
            <div style="width:30%;">
                <x-organisms.CountryOrganisms.FormEdit
                title="Edit"
                class="container"
                :label="[
                    'code' => 'code',
                    'name' => 'name',
                    'description' => 'description',
                ]"
                :name="[
                     'code' => 'code',
                    'name' => 'name',
                    'description' => 'description',
                ]"
                :placeholder="[
                     'code' => 'code',
                    'name' => 'name',
                    'description' => 'description',
                ]"
                :type="[
                    'text' => 'text',
                ]"
                :country="$country"
                buttonClass="btn btn-primary"
                classInput="form-control"
            />
            </div>
        </div>
    </div>
</body>

</html>
