<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * class LotteryGameMatch
 *
 * @property int $id Идентификатор
 * @property int $game_id Идентификатор игры
 * @property int $winner_id Идентификатор победителя
 * @property string $start_date Дата начала
 * @property string $start_time Время начала
 * @property bool $is_finished Завершена ли игра
 *
 * @property LotteryGame $game Лоттерейная игра
 */
class LotteryGameMatch extends Model
{
    protected $table = 'lottery_game_matches';

    public $timestamps = false;

    protected $fillable = [
        'game_id',
        'winner_id',
        'start_date',
        'start_time',
        'is_finished',
    ];

    protected $casts = [
        'is_finished' => 'boolean',
    ];

    public function game(): BelongsTo
    {
        return $this->belongsTo(LotteryGame::class, 'game_id');
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'lottery_game_match_users', 'lottery_game_match_id', 'user_id');
    }
}
