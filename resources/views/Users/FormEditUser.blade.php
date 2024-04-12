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
        <div  style="display: flex;justify-content: center">
            <div style="width:30%;">
                
                @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
              
                    <x-organisms.UsersOrganisms.FormEdit
                    title="Edit"
                    class="container"
                    :label="[
                        'email' => 'Email',
                        'password' => 'Password',
                    ]"
                    :name="[
                        'email' => 'email',
                        'password' => 'password',
                    ]"
                    :placeholder="[
                        'email' => 'Enter email',
                        'password' => 'Enter password',
                    ]"
                    :type="[
                        'email' => 'email',
                        'password' => 'password',
                    ]"
                    :roles="$roles"
                    :user="$user"
                    buttonClass="btn btn-primary"
                    classInput="form-control"
                />
            </div>
        </div>
    </div>
</body>

</html>
