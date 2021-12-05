<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield("title") | TodoList</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    {{-- Boxicons --}}
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>

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
        <div class="container d-flex align-items-center h-100">
            <div class="row justify-content-center w-100">
                <div class="col-12 col-md-8 col-lg-6">
                    <div class="card">
                        <div class="card-header d-flex">
                            <h1 class="h5 m-0">
                                @yield("title")
                            </h1>

                            <a class="btn btn-sm btn-success ml-auto" href="{{ route("todos.new") }}" title="Criar nova tarefa">
                                <i class="bx bx-plus"></i>
                            </a>
                        </div>

                        <div class="card-body shadow">
                            @yield("content")
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

</html>
