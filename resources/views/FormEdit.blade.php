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
                <form method="POST" action="{{ route('update', ['id' => $country->id]) }} }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="code">Code:</label>
                        <input value="{{ old('code', $country->code) }}" type="text" name="code" id="code"
                            class="form-control" placeholder="Enter code">
                        @error('code')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>


                    <div class="form-group">
                        <label for="description">Description:</label>
                        <input value="{{ old('code', $country->description) }}" type="text" name="description"
                            id="description" class="form-control" placeholder="Enter description">

                    </div>

                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input value="{{ old('code', $country->name) }}" type="text" name="name" id="name"
                            class="form-control" placeholder="Enter name">
                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
