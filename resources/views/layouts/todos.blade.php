<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield("title") | TodoList</title>

    <link rel="stylesheet" href="{{ asset('css/boxicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

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
                    <div class="d-flex pb-3 px-4" style="font-size: 0.785rem">
                        <span class="d-flex align-items-center">
                            <i class="bx bxs-user mr-1"></i>
                            <span>
                                {{ Auth::user()->name }}
                            </span>
                        </span>
                        <span class="mx-auto"></span>
                        <span class="d-flex align-items-center">
                            <i class="bx bx-log-out mr-1"></i>
                            <a class="text-dark" href="{{ route('logout') }}" onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                Sair
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                class="d-none">
                                @csrf
                            </form>
                        </span>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex">
                                <h1 class="h5 m-0">
                                    @yield("title")
                                </h1>

                                <a class="btn btn-sm btn-success ml-auto" href="{{ route('todos.new') }}"
                                    title="Criar nova tarefa">
                                    <i class="bx bx-plus"></i>
                                </a>
                            </div>
                        </div>

                        <div class="card-body shadow">
                            @if (session('message'))
                                <x-messageBox>
                                    @slot('type')
                                        {{ session('message')['type'] }}
                                    @endslot
                                    {{ session('message')['message'] }}
                                </x-messageBox>
                            @endif

                            @yield("content")
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
