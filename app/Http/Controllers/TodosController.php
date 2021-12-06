<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodosController extends Controller
{
    //
    public function index()
    {
        $todos = Todo::orderBy("created_at", "DESC")->get();

        return view("todos.list", [
            "title" => "Lista de tarefas",
            "todos" => $todos
        ]);
    }

    public function new()
    {
        return view("todos.edit", [
            "title" => "Nova tarefa",
            "action" => "new",
        ]);
    }

    public function create(Request $request)
    {
        $title = $request->get("title", null);

        if (empty($title)) {
            return redirect()->route("todos.new")->with("message", [
                "type" => "danger",
                "message" => "Informe um título para sua tarefa"
            ]);
        }

        $todo = new Todo();
        $todo->title = $title;
        if (!$todo->save()) {
            return redirect()->route("todos.index")->with("message", [
                "type" => "danger",
                "message" => "Erro interno ao criar a tarefa"
            ]);
        }

        return redirect()->route("todos.index")->with("message", [
            "type" => "success",
            "message" => "Tarefa '{$todo->title}' criada"
        ]);
    }

    public function edit($id)
    {
        $todo = Todo::find($id);

        return view("todos.edit", [
            "title" => "Editar tarefa",
            "action" => "edit",
            "todo" => $todo
        ]);
    }

    public function update(Request $request, $id)
    {
        $title = $request->get("title", null);
        if (!$title) {
            return redirect()->route("todos.edit", ["id" => $id])->with("message", [
                "type" => "error",
                "message" => "Informe um título para sua tarefa"
            ]);
        }

        $todo = Todo::find($id);
        if (!$todo) {
            return redirect()->route("todos.edit", ["id" => $id])->with("message", [
                "type" => "error",
                "message" => "Tarefa não existe ou foi excluída"
            ]);
        }

        $todo->title = $title;
        if (!$todo->save()) {
            return redirect()->route("todos.edit", ["id" => $id])->with("message", [
                "type" => "error",
                "message" => "Erro interno ao atualizar sua tarefa"
            ]);
        }

        return redirect()->route("todos.edit", ["id" => $id])->with("message", [
            "type" => "info",
            "message" => "Sua tarefa foi atualizada com sucesso"
        ]);
    }
}
