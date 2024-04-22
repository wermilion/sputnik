<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * class LotteryGameMatch
 *
 * @property int $id Идентификатор
 * @property int $game_id Идентификатор игры
 * @property int $winner_id Идентификатор победителя
 * @property string $start_date Дата начала
 * @property string $start_time Время начала
 */
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
