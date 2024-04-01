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
                <h1>Edit</h1>
                <form method="POST" action="{{ route('company.update', ['company' => $company->id]) }} }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">name:</label>
                        <input value="{{ old('name', $company->name) }}" type="text" name="name" id="name"
                            class="form-control" placeholder="Enter company">
                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>


                    

                    <div class="form-group">
                        <label for="Password">code:</label>
                        <input value="{{ old('code', $company->code) }}" type="text" name="code" id="code"
                            class="form-control" placeholder="Enter code">
                        @error('code')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                      <label for="Password">address:</label>
                      <input value="{{ old('address', $company->address) }}" type="text" name="address" id="address"
                          class="form-control" placeholder="Enter address">
                      @error('address')
                          <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                  </div>
                  {{-- <div class="form-group">
                    <label for="department_id">department_id:</label>
                    <input value="{{ old('department_id') }}" type="text" name="department_id"  class="form-control"
                        placeholder="Enter department_id" >
                </div> --}}
                {{-- <div class="form-group">
                    <label for="persons">department:</label>
                    <select class="form-control" name="persons[]" id="persons">
                        @foreach ($company->department as $department)
                            <option value="{{ $department->id }}" {{ $department->company_id == $company->id ? 'selected' : '' }}>
                                {{ $department->name }}
                            </option>
                        @endforeach
                    </select>
                </div> --}}
                {{-- <select class="form-control" name="persons[]" id="persons">
                    @foreach ($company->department as $department)
                        <option value="{{ $department->id }}" {{ $department->company_id == $company->id ? 'selected' : '' }}>
                            {{ $department->name }}
                        </option>
                    @endforeach
                </select> --}}
                
                @foreach ($company->department as $department)
                <input type="checkbox" name="department[]" value="{{ $department->id }}" id="{{ $department->id }}" {{ $company->department->contains($department->id) ? 'checked' : '' }}>
                <label for="{{ $department->id }}">{{ $department->name }}</label><br>
            @endforeach
                

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
