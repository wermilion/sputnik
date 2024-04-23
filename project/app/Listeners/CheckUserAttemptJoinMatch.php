<?php

namespace App\Listeners;

use App\Events\UserAttemptJoinMatch;
use App\Models\LotteryGameMatchUser;

class CheckUserAttemptJoinMatch
{
    /**
     * @param UserAttemptJoinMatch $event
     * @return void
     */
    public function handle(UserAttemptJoinMatch $event): void
    {
        $lotteryGameMatchUser = LotteryGameMatchUser::query()->where([
            'user_id' => $event->userId,
            'lottery_game_match_id' => $event->lotteryGameMatchId
        ])->exists();

        if ($lotteryGameMatchUser) {
            abort(409, 'You have already joined this game');
        }
    }
}
