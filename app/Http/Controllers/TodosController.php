<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TodosController extends Controller
{
    //
    public function index()
    {
        return view("todos.list");
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
    }

    public function edit($id)
    {
        return view("todos.edit", [
            "title" => "Editar tarefa",
            "action" => "edit",
        ]);
    }

    public function update(Request $request, $id)
    {
    }
}
