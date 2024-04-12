<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script>
        var companyLinks = document.querySelectorAll(
            'nav.pagination[aria-label="Pagination Navigation"] a[aria-label="Pagination Navigation"]');
        companyLinks.forEach(function(link) {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                window.location.href = e.target.href + '&pageName=companies';
            });
        });


        var departmentLinks = document.querySelectorAll(
            'nav.pagination[aria-label="Departments Navigation"] a[aria-label="Pagination Navigation"]');
        departmentLinks.forEach(function(link) {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                window.location.href = e.target.href + '&pageName=departments';
            });
        });
    </script>
</head>

<body class="antialiased">
    <div class="container">
        @include('navbar')
        <div class="table-country" style="display: flex;flex-direction: column">
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div>
                <a href="{{ route('company.create') }}" class="btn btn-primary">Create</a>
                <table>
                    <tr>
                        <th>id</th>
                        <th>name</th>
                        <th>code</th>
                        <th>address</th>
                        <th>department</th>
                        <th>action</th>
                    </tr>
                    @foreach ($companies as $company)
                        <tr>
                            <td>{{ $company->id }}</td>
                            <td>{{ $company->name }}</td>
                            <td>{{ $company->code }}</td>
                            <td>{{ $company->address }}</td>
                            <td style="max-width: 50px; overflow-x: auto">
                                @if ($company->department)
                                    @foreach ($company->department as $department)
                                        {{ $department->name }}
                                    @endforeach
                            </td>
                    @endif
                    <td>

                        <a href="{{ route('company.edit', ['company' => $company->id]) }}"
                            class="btn btn-warning">Update</a>
                        <form action="{{ route('company.destroy', ['company' => $company->id]) }}" method="POST"
                            style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Destroy</button>
                        </form>
                    </td>
                    </tr>
                    @endforeach


                </table>
                <div>
                    {{ $companies->links('pagination::bootstrap-4') }}
                </div>

            </div>
        </div>
        @include('Departments.index')
    </div>
</body>

</html>
