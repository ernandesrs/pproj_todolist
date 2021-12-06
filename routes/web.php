<?php

use App\Http\Controllers\TodosController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home', [
        "title" => "Simples e rápido gerenciador de tarefas diárias"
    ]);
});


Route::prefix("tarefas")->group(function () {
    Route::get("/", [TodosController::class, "index"])->name("todos.index");
    Route::get("/nova", [TodosController::class, "new"])->name("todos.new");
    Route::post("/nova", [TodosController::class, "create"])->name("todos.create");

    Route::get("/editar/{id}", [TodosController::class, "edit"])->name("todos.edit");
    Route::post("/editar/{id}", [TodosController::class, "update"])->name("todos.update");
    Route::get("/alterar-status/{id}", [TodosController::class, "done"])->name("todos.done");

    Route::get("/excluir/{id}", [TodosController::class, "delete"])->name("todos.delete");
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
