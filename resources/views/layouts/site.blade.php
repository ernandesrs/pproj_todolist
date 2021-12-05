<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield("title") | TodoList</title>

    <link rel="stylesheet" href="{{ asset("css/boxicons.css") }}">
    <link rel="stylesheet" href="{{ asset("css/bootstrap.css") }}">

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
