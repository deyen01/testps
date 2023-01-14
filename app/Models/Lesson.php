<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    protected $fillable = ['title'];

    public function learnings() // пройденные обучения пользователями урока
    {
        return $this->hasMany(Learning::class);
    }

    public function getCvAttribute() // сколько раз прошли обучение уроку
    {
        return $this->learnings->count();
    }
}
