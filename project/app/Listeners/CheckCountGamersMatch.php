<?php

namespace App\Listeners;

use App\Events\UserAttemptJoinMatch;
use App\Models\LotteryGameMatch;
use App\Models\LotteryGameMatchUser;

class CheckCountGamersMatch
{
    /**
     * @param UserAttemptJoinMatch $event
     * @return void
     */
    public function handle(UserAttemptJoinMatch $event): void
    {
        $match = LotteryGameMatch::query()->find($event->lotteryGameMatchId);

        if ($match->game->gamer_count <= LotteryGameMatchUser::query()->where('lottery_game_match_id', $match->id)->count()) {
            abort(409, 'Game is full');
        }
    }
}
