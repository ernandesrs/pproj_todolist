@extends("layouts.todos");

@section('title', 'Lista de tarefas')

@section('content')
    <form action="{{ $action == 'new' ? route('todos.create') : route('todos.update') }}" method="post">        
        @csrf

        <div class="form-group">
            <label for="title">Título da tarefa</label>
            <input class="form-control form-control-sm" type="text" name="title" id="title">
        </div>

        <div class="d-flex mt-2">
            <a class="btn btn-sm btn-outline-secondary" href="{{ route('todos.index') }}">Voltar para lista</a>
            <span class="mx-auto"></span>
            @if ($action == 'new')
                <button class="btn btn-sm btn-success" type="submit">
                    <i class="bx bxs-save"></i> Criar tarefa
                </button>
            @else
                <button class="btn btn-sm btn-info" type="submit">
                    <i class="bx bxs-save"></i> Atualizar tarefa
                </button>
            @endif
        </div>
    </form>
@endsection
