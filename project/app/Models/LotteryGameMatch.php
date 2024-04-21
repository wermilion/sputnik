<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LotteryGameMatch extends Model
{
    protected $table = 'lottery_game_matches';

    protected $fillable = [
        'game_id',
        'winner_id',
        'start_date',
        'start_time',
    ];
}
