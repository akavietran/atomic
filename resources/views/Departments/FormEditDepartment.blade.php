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
                <form method="POST" action="{{ route('department.update', ['department' => $department->id]) }} }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="code">code:</label>
                        <input value="{{ old('code', $department->code) }}" type="text" name="code" id="code"
                            class="form-control" placeholder="Enter code">

                    </div>
                    
                    <div class="form-group">
                        <label for="name">name:</label>
                        <input value="{{ old('name', $department->name) }}" type="text" name="name"
                            id="name" class="form-control" placeholder="Enter name">

                    </div>
                    <div class="form-group">
                        <label for="company_id">Company:</label>
                        <select name="company_id" id="company_id" class="form-control">
                            <option value="">Select a company</option>
                            @foreach($companies as $company)
                                <option value="{{ $company->id }}" {{ $department->company_id == $company->id ? 'selected' : '' }}>
                                    {{ $company->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    
                  <div class="form-group">
                    <label for="name">parent_id:</label>
                    <input value="{{ old('parent_id', $department->parent_id) }}" type="text" name="parent_id"
                        id="parent_id" class="form-control" placeholder="Enter parent_id">

                </div>
                    

                    <button type="submit" style="margin-top:20px" class="btn btn-primary">Submit</button>
                </form>
          
            </div>
        </div>
    </div>
</body>

</html>
