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
                <form method="POST" action="{{ route('person.update', ['person' => $person->id]) }} }}">
                    @csrf
                    @method('PUT')

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
                        <label for="role">full_name:</label>
                        <input value="{{ old('full_name', $person->full_name) }}" type="text" name="full_name"
                            id="full_name" class="form-control" placeholder="Enter role">

                    </div>




                    <div class="form-group">
                        <label for="Password">gender:</label>
                        <input value="{{ old('gender', $person->gender) }}" type="text" name="gender" id="gender"
                            class="form-control" placeholder="Enter gender">

                    </div>
                    <div class="form-group">
                        <label for="birthdate">birthdate:</label>
                        <input value="{{ old('birthdate', $person->birthdate) }}" type="date" name="birthdate"
                            id="birthdate" class="form-control" placeholder="Enter birthdate">

                    </div>
                    <div class="form-group">
                        <label for="phone_number">phone_number:</label>
                        <input value="{{ old('phone_number', $person->phone_number) }}" type="text"
                            name="phone_number" id="phone_number" class="form-control" placeholder="Enter phone_number">

                    </div>
                    <div class="form-group">
                        <label for="address">address:</label>
                        <input value="{{ old('address', $person->address) }}" type="text" name="address"
                            id="address" class="form-control" placeholder="Enter address">

                    </div>
                    <div class="form-group">
                        <label for="user_id">user_id:</label>
                        <input value="{{ old('user_id',$person->user_id)}}" type="text" name="user_id"
                            id="user_id" class="form-control" placeholder="Enter user_id">

                    </div>
                    <div class="form-group">
                        <label for="company_id">Company Name:</label>
                        <select name="company_id" class="form-control">
                            @foreach ($companies as $company)
                                <option value="{{ $company->id }}" 
                                    {{ old('company_id') == $company->id ? 'selected' : '' }}>{{ $company->name }}
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
