<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Lumen\Auth\Authorizable;

/**
 * Class User
 *
 * @property string first_name Имя
 * @property string last_name Фамилия
 * @property string email Почта
 * @property string password Пароль
 * @property bool is_admin Является ли пользователь админом
 * @property int points Количество очков
 */
class User extends Model implements AuthenticatableContract, AuthorizableContract
{
    use Authenticatable, Authorizable, HasFactory;

    protected $table = 'users';

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'is_admin',
        'points',
    ];

    protected $casts = [
        'is_admin' => 'boolean',
    ];

    protected $hidden = [
        'password',
    ];
}
