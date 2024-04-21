<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LotteryGameMatchUser extends Model
{
    protected $table = 'lottery_game_match_users';

    protected $fillable = [
        'user_id',
        'lottery_game_match_id',
    ];
}
