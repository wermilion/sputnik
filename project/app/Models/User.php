<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Laravel\Lumen\Auth\Authorizable;

/**
 * class User
 *
 * @property int id Идентификатор
 * @property string first_name Имя
 * @property string last_name Фамилия
 * @property string email Почта
 * @property string password Пароль
 * @property bool is_admin Является ли пользователь админом
 * @property int points Количество очков
 *
 * @property-read Collection|LotteryGameMatch[] $lotteryGameMatches
 */
class User extends Model implements AuthenticatableContract, AuthorizableContract
{
    use Authenticatable, Authorizable, HasFactory;

    protected $table = 'users';

    public $timestamps = false;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'is_admin',
        'points',
    ];

    protected $casts = [
        'password' => 'hashed',
        'is_admin' => 'boolean',
    ];

    protected $hidden = [
        'password',
    ];

    public function lotteryGameMatches(): HasMany
    {
        return $this->hasMany(LotteryGameMatch::class, 'winner_id');
    }
}
