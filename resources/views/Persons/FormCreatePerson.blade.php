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
                {{-- <form method="POST" action="{{ route('person.store') }}">
                    @csrf --}}

                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    {{-- <div class="form-group">
                        <label for="full_name">Full Name:</label>
                        <input value="{{ old('full_name') }}" type="text" name="full_name" class="form-control"
                            placeholder="Enter full name">
                    </div>
                    <div class="form-group">
                        <label for="address">Address:</label>
                        <input value="{{ old('address') }}" type="text" name="address" class="form-control"
                            placeholder="Enter address">
                    </div>

                    <div class="form-group">
                        <label for="gender">Gender:</label>
                        <input value="{{ old('gender') }}" type="text" name="gender" class="form-control"
                            placeholder="Enter gender">
                    </div>

                    <div class="form-group">
                        <label for="birthdate">Birthdate:</label>
                        <input value="{{ old('birthdate') }}" type="date" name="birthdate" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="phone_number">Phone Number:</label>
                        <input value="{{ old('phone_number') }}" type="text" name="phone_number" class="form-control"
                            placeholder="Enter phone number">
                    </div>
                    <div class="form-group">
                        <label for="user_id">user_id:</label>
                        <input value="{{ old('user_id') }}" type="text" name="user_id" id="user_id"
                            class="form-control" placeholder="Enter user_id">
                    </div>

                    <div class="form-group">
                        <label for="company_id">Company Name:</label>
                        <select name="company_id" class="form-control">
                            <option value="">Select Company</option>
                            @foreach ($companies as $company)
                                <option value="{{ $company->id }}">{{ $company->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form> --}}
                <x-organisms.PersonOrganisms.FormCreate
            title="Create"
            class="container"
            :label="[
                'full_name' => 'full_name',
                'address' => 'address',
                'gender' => 'gender',
                'birthdate' => 'birthdate',
                'phone' => 'phone_number',
                'user_id' => 'user_id',
                'company_id'=>'company_id'
            ]"
            :name="[
                'full_name' => 'full_name',
                'address' => 'address',
                'gender' => 'gender',
                'birthdate' => 'birthdate',
                'phone' => 'phone_number',
                'user_id' => 'user_id',
                'company_id'=>'company_id'
            ]"
            :placeholder="[
                'full_name' => 'full_name',
                'address' => 'address',
                'gender' => 'gender',
                'birthdate' => 'birthdate',
                'phone' => 'phone',
                'user_id' => 'user_id',
                
            ]"
            
            :type="[
                'text' => 'text',
                'date' => 'date',
            ]"
            :options="$companies"
            buttonClass="btn btn-primary"
            classInput="form-control"
            classSelect="form-control"
        />
            </div>
           
        </div>
    </div>
</body>

</html>
