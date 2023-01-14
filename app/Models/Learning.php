<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use App\Models\Lesson;
use App\Models\User;


class Learning extends Model
{
    use HasFactory;

    protected $fillable = ['lesson_id', 'student_id', 'grade', 'teacher_id'];

    protected $attributes = ['grade' => 1];

    public function lesson() { // урок
        return $this->belongsTo(Lesson::class);
    }

    public function student() { // пользователь - студент
        return $this->belongsTo(User::class);
    }

    public function teacher() { // учитель, админ
        return $this->belongsTo(User::class);
    }

    protected static function booted()
    {
        static::creating(function (Learning $learning) {
            if (Auth::check()) {
                $learning->student_id = Auth::id();
            }
        });
    }
}
