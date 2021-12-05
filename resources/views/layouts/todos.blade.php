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
        <div class="container d-flex justify-content-center align-items-center h-100">
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
