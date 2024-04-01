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
                <h1>Create</h1>
            <form method="POST" action="{{ route('department.store') }}">
                @csrf
                @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

                <div class="form-group">
                    <label for="code">Code:</label>
                    <input value="{{ old('code') }}" type="text" name="code"  class="form-control"
                        placeholder="Enter code" >
                    
                </div>


              

                <div class="form-group">
                    <label for="name">Name:</label>
                    <input value="{{ old('name') }}" type="text" name="name"  class="form-control"
                        placeholder="Enter name" >
                    
                </div>
                <div class="form-group">
                  <label for="parent_id">parent_id:</label>
                  <input value="{{ old('parent_id') }}" type="text" name="parent_id" 
                      class="form-control" placeholder="Enter parent_id">

              </div>
              <div class="form-group">
                <label for="company_id">Company:</label>
                <select name="company_id" id="company_id" class="form-control">
                    <option value="">Select a company</option>
                    @foreach($companies as $company)
                        <option value="{{ $company->id }}" {{ old('company_id') == $company->id ? 'selected' : '' }}>
                            {{ $company->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
        </div>
    </div>
</body>

</html>
