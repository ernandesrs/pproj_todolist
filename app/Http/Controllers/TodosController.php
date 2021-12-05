<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TodosController extends Controller
{
    //
    public function index()
    {
        $todos = [
            0 => (object) [
                "id" => 1,
                "done" => false,
                "title" => "Lorem ipsum dolor sit amet consectetur"
            ],
            1 => (object) [
                "id" => 2,
                "done" => false,
                "title" => "Voluptatum aliquid, nesciunt magnam"
            ],
            2 => (object) [
                "id" => 3,
                "done" => true,
                "title" => "Exercitationem laboriosam quia deserunt odit"
            ],
        ];

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
