@extends("layouts.todos");

@section('title', $title)

@section('content')
    <table class="table table-borderless table-hover">
        <thead class="thead-light">
            <tr>
                <td>Status</td>
                <td>Tarefa</td>
                <td>Ações</td>
            </tr>
        </thead>

        <tbody>
            @if ($dailyTodos)
                @foreach ($dailyTodos as $key => $dailyTodo)
                    @php
                        $todo = $dailyTodo->todo();
                    @endphp
                    <tr>
                        <td class="text-right" style="width: 75px; font-size: 0.785rem">
                            <a class="text-{{ $todo->done ? 'success' : 'danger' }}"
                                href="{{ route('todos.done', ['id' => $todo->id]) }}">
                                @if ($todo->done)
                                    <i class="bx bx-check-circle"></i> Feita
                                @else
                                    <i class="bx bx-x-circle"></i> Não feita
                                @endif
                            </a>
                        </td>
                        <td>
                            {{ $todo->title }}
                        </td>
                        <td class="d-flex">
                            <a class="btn btn-sm btn-info" href="{{ route('todos.edit', ['id' => $todo->id]) }}"
                                title="Editar esta tarefa">
                                <i class="bx bx-edit"></i>
                            </a>
                            <span class="mx-1"></span>
                            <a class="btn btn-sm btn-danger" href="{{ route('todos.delete', ['id' => $todo->id]) }}"
                                title="Excluir esta tarefa">
                                <i class="bx bx-trash"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td>---</td>
                    <td>---</td>
                    <td>---</td>
                </tr>
            @endif
        </tbody>
    </table>
@endsection
