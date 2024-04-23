<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * class LotteryGame
 *
 * @property int $id Идентификатор
 * @property string $name Название
 * @property int $gamer_count Количество игроков
 * @property int $reward_points Количество очков
 */
class LotteryGame extends Model
{
    use HasFactory;

    protected $table = 'lottery_games';

    public $timestamps = false;

    protected $fillable = [
        'name',
        'gamer_count',
        'reward_points',
    ];
}
