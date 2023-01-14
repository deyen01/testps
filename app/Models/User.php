<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Learning;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    const TRole = [
        0 => 'Студент',
        1 => 'Администратор'
    ];

    protected $attributes = ['role' => 0];
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getVRoleAttribute()
    {
        return self::TRole[$this->role];
    }

    public function learnings() // пройденные обучения урокам пользователя
    {
        return $this->hasMany(Learning::class);
    }

    public function estimates() // обучения , где поставленны учителями оценки
    {
        return $this->hasMany(Learning::class);
    }
}
