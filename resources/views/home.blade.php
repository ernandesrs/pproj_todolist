@extends("layouts.site")

@section('title', $title)

@section('content')
    <section class="d-flex align-items-center h-100">
        <div class="jumbotron w-100">
            <div class="container text-center">
                <h1 class="display-4">Gerencie suas tarefas diárias facilmente</h1>
                <p class="lead">
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Eaque quos ad rem, enim tempora, consectetur
                    quam voluptatibus adipisci maiores nihil alias eum. Beatae numquam vitae pariatur!
                </p>
                <hr class="my-4">
                <a class="btn btn-secondary btn-lg" href="{{ route("todos.index") }}" role="button">Quero gerenciar agora!</a>
            </div>
        </div>
    </section>
@endsection
