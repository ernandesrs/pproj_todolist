<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDailyTodosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daily_todos', function (Blueprint $table) {
            $table->id();
            $table->foreignId("users_id");
            $table->foreignId("todos_id");
            $table->foreign("todos_id")->references("id")->on("todos")->cascadeOnDelete();
            $table->foreign("users_id")->references("id")->on("users")->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('daily_todos');
    }
}
