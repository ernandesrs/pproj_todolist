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
    return view('home');
});


Route::prefix("tarefas")->group(function () {
    Route::get("/", [TodosController::class, "index"])->name("todos.index");
    Route::get("/nova", [TodosController::class, "new"])->name("todos.new");
    Route::post("/nova", [TodosController::class, "create"])->name("todos.create");

    Route::get("/editar", [TodosController::class, "edit"])->name("todos.edit");
    Route::post("/editar", [TodosController::class, "update"])->name("todos.update");
});
