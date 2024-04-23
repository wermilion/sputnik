<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * class LotteryGameMatchUser
 *
 * @property int $id Идентификатор
 * @property int $user_id Идентификатор пользователя
 * @property int $lottery_game_match_id Идентификатор матча
 */
class LotteryGameMatchUser extends Model
{
    protected $table = 'lottery_game_match_users';

    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'lottery_game_match_id',
    ];
}
