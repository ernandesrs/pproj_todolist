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
            @if ($todos)
                @foreach ($todos as $key => $todo)
                    <tr>
                        <td class="text-right" style="width: 75px; font-size: 0.785rem">
                            <a class="text-{{ $todo->done ? 'success' : 'danger' }}" href="#">
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
                            <button class="btn btn-sm btn-info">
                                <i class="bx bx-edit"></i>
                            </button>
                            <span class="mx-1"></span>
                            <button class="btn btn-sm btn-danger">
                                <i class="bx bx-trash"></i>
                            </button>
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
