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

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">





    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script>
        function toggleModal() {
            let showModal = false;
            showModal = !showModal;
            const modalElement = document.querySelector('.modal');
            if (showModal) {
                modalElement.classList.add('show');
            } else {
                modalElement.classList.remove('show');
            }
        }

        function handleClose() {
            showModal = false;
            const modalElement = document.querySelector('.modal');
            modalElement.classList.remove('show');
        }

        function showModal(id, name) {
            toggleModal();
            const destroyForm = document.getElementById('destroyForm');
            destroyForm.action = `{{ route('atomic.destroy', ['atomic' => 'ID_PLACEHOLDER']) }}`.replace('ID_PLACEHOLDER',
                id);
        }
    </script>

</head>

<body class="antialiased">
    <div class="container">
        @include('navbar')
        <div>
            @php
                $headers = ['id', 'Name', 'Phone', 'Date', 'Gender', 'Role', 'Description', 'Action'];

                $allRows = [];

                foreach ($atomics as $atomic) {
                    $roleMap = [
                        '1' => 'Dev',
                        '2' => 'Leader',
                        '3' => 'Admin',
                    ];

                    $role = isset($roleMap[$atomic['role']]) ? $roleMap[$atomic['role']] : '';
                    $atomicRow = [
                        $atomic['id'],
                        $atomic['name'],
                        $atomic['phone'],
                        $atomic['date'],
                        $atomic['gender'],
                        $role,
                        $atomic['description'],
                    ];
                    $allRows[] = $atomicRow;
                }

                $props = [
                    'title' => 'Delete',
                    'body' => 'Are you sure?',
                    'modal' => [
                        'main' => 'modal',
                        'dialog' => 'modal-dialog',
                        'content' => 'modal-content',
                        'header' => 'modal-header',
                        'body' => 'modal-body',
                        'footer' => 'modal-footer',
                        'title' => 'modal-title',
                    ],
                    'buttonClass' => '',
                ];
                $page = request()->query('page', 1);
                $perPage = 3;
                $start = ($page - 1) * $perPage;
                $end = $start + $perPage;
                $rows = array_slice($allRows, $start, $perPage);
                $currentPage = request()->query('page', 1);
                $lastPage = ceil(count($allRows) / $perPage);
            @endphp
            <x-organisms.body :headers="$headers" :rows="$rows" :currentPage="$currentPage" :lastPage="$lastPage" :props="$props"
                :datas="$atomics"></x-organisms.body>
        </div>
    </div>
</body>

</html>
