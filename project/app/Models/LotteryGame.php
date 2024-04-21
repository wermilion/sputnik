<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LotteryGame extends Model
{
    protected $table = 'lottery_games';

    protected $fillable = [
        'name',
        'gamer_count',
        'reward_points',
    ];
}
