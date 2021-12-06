<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DailyTodo extends Model
{
    use HasFactory;

    protected $table = "daily_todos";

    public function todo(): ?Todo
    {
        return Todo::find($this->todos_id);
    }
}
