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
                
                <h1>Edit</h1>
                @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                <form method="POST" action="{{ route('user.update', ['user' => $user->id]) }} }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="email">email:</label>
                        <input value="{{ old('code', $user->email) }}" type="email" name="email" id="email"
                            class="form-control" placeholder="Enter email">

                    </div>
                    
                    <div class="form-group">
                        <label for="Password">Password:</label>
                        <input value="{{ old('Password', $user->password) }}" type="text" name="password"
                            id="password" class="form-control" placeholder="Enter password">

                    </div>
                    <div class="form-group">
                        <label for="role_id">Role:</label>
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                choose
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                @foreach ($roles as $role)
                                    <label class="dropdown-item">
                                        <input type="checkbox" name="roles[]" value="{{ $role->id }}" {{ $user->roles->contains($role->id) ? 'checked' : '' }}>
                                        {{ $role->role }}
                                    </label>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    

                    <button type="submit" style="margin-top:20px" class="btn btn-primary">Submit</button>
                </form>
          
            </div>
        </div>
    </div>
</body>

</html>
