<?php

namespace App\Http\Controllers;

use App\Models\DailyTodo;
use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TodosController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth");
    }

    //
    public function index()
    {
        $dailyTodos = DailyTodo::where("users_id", "=", Auth::user()->id)->orderBy("created_at", "DESC")->get();

        return view("todos.list", [
            "title" => "Lista de tarefas",
            "dailyTodos" => $dailyTodos
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
        if ($todo->save()) {
            $dailyTodo = new DailyTodo();

            $dailyTodo->todos_id = $todo->id;
            $dailyTodo->users_id = Auth::user()->id;
            if ($dailyTodo->save()) {
                $todo->delete();
                return redirect()->route("todos.index")->with("message", [
                    "type" => "success",
                    "message" => "Sua tarefa foi criada e salva com sucesso"
                ]);
            }
        }

        return redirect()->route("todos.index")->with("message", [
            "type" => "danger",
            "message" => "Erro interno ao criar sua tarefa"
        ]);
    }

    public function edit($id)
    {
        $dailyTodo = DailyTodo::where("users_id", "=", Auth::user()->id)
            ->where("todos_id", "=", $id)->first();

        if (!$dailyTodo) {
            return redirect()->route("todos.index")->with("message", [
                "type" => "danger",
                "message" => "Tarefa não existe ou foi excluída"
            ]);
        }

        return view("todos.edit", [
            "title" => "Editar tarefa",
            "action" => "edit",
            "todo" => $dailyTodo->todo()
        ]);
    }

    public function update(Request $request, $id)
    {
        $title = $request->get("title", null);
        if (!$title) {
            return redirect()->route("todos.edit", ["id" => $id])->with("message", [
                "type" => "danger",
                "message" => "Informe um título para sua tarefa"
            ]);
        }

        /** @var DailyTodo $dailyTodo */
        $dailyTodo = DailyTodo::where("users_id", "=", Auth::user()->id)
            ->where("todos_id", "=", $id)->first();

        if (!$dailyTodo) {
            return redirect()->route("todos.index")->with("message", [
                "type" => "danger",
                "message" => "Tarefa não existe ou foi excluída"
            ]);
        }

        $todo = $dailyTodo->todo();
        $todo->title = $title;
        if (!$todo->save()) {
            return redirect()->route("todos.edit", ["id" => $id])->with("message", [
                "type" => "danger",
                "message" => "Erro interno ao atualizar sua tarefa"
            ]);
        }

        return redirect()->route("todos.edit", ["id" => $id])->with("message", [
            "type" => "info",
            "message" => "Sua tarefa foi atualizada com sucesso"
        ]);
    }

    public function delete($id)
    {
        /** @var DailyTodo $dailyTodo */
        $dailyTodo = DailyTodo::where("users_id", "=", Auth::user()->id)
            ->where("todos_id", "=", $id)->first();

        if (!$dailyTodo) {
            return redirect()->route("todos.index")->with("message", [
                "type" => "danger",
                "message" => "Tarefa não existe ou já foi excluída"
            ]);
        }

        $todo = $dailyTodo->todo();
        if (!$todo->delete()) {
            return redirect()->route("todos.index")->with("message", [
                "type" => "danger",
                "message" => "Erro interno ao excluir sua tarefa"
            ]);
        }

        return redirect()->route("todos.index")->with("message", [
            "type" => "warning",
            "message" => "Sua tarefa foi excluída com sucesso"
        ]);
    }

    public function done($id)
    {
        /** @var DailyTodo $dailyTodo */
        $dailyTodo = DailyTodo::where("users_id", "=", Auth::user()->id)
            ->where("todos_id", "=", $id)->first();

        if (!$dailyTodo) {
            return redirect()->route("todos.index")->with("message", [
                "type" => "danger",
                "message" => "Tarefa não existe ou foi excluída"
            ]);
        }

        $todo = $dailyTodo->todo();
        $todo->done = $todo->done ? false : true;
        if (!$todo->save()) {
            return redirect()->route("todos.index")->with("message", [
                "type" => "danger",
                "message" => "Erro interno ao atualizar sua tarefa"
            ]);
        }

        return redirect()->route("todos.index")->with("message", [
            "type" => "info",
            "message" => "Status da tarefa atualizada com sucesso"
        ]);
    }
}
