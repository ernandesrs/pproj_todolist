<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield("title") | TodoList</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    {{-- Bootstrap --}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <style>
        body {
            display: grid;
            grid-template-areas: "main";
            grid-template-rows: 1fr;
            min-height: 100vh;
        }

        .main {
            grid-area: main;
        }

    </style>
</head>

<body>
    <main class="main">
        @yield("content")
    </main>
</body>

</html>
