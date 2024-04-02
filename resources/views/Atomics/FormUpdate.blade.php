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
        function handleClose() {
            const myModal = document.getElementById("exampleModal");
            myModal.classList.remove('show');
            myModal.style.display = 'none';
        }
        window.onload = function() {
            document.getElementById('launchModalBtn').addEventListener('click', function() {
                const myModal = document.getElementById("exampleModal");
                myModal.classList.add('show');
                myModal.style.display = 'block';
            });




        };
    </script>

</head>

<body class="antialiased">
    <div class="container">
      <div>
        @php
            $props = [
                'title' => 'Update',
                'label' => [
                    'name' => 'Name',
                    'phone' => 'Phone',
                    'date' => 'Date',
                    'description' => 'Description'
                ],
                'name' => [
                    'name' => 'name',
                    'phone' => 'phone',
                    'date' => 'date',
                    'checkboxes' => 'checkboxes',
                    'description' => 'description'
                ],
                'placeholder' => [
                    'name' => 'Enter your name',
                    'phone' => 'Enter your phone number',
                    'date' => 'Select date',
                    'description' => 'Enter description'
                ],
                'type' => [
                    'name' => 'text',
                    'phone' => 'tel',
                    'date' => 'date'
                ],
                'value' => $atomics,
                'buttonClass' => 'button-css' 
            ];
        @endphp
        <x-organisms.formedit
            :title="$props['title']"
            :label="$props['label']"
            :name="$props['name']"
            :placeholder="$props['placeholder']"
            :type="$props['type']"
            :value="$props['value']"
            :buttonClass="$props['buttonClass']"
        />
    </div>
    </div>
</body>

</html>
