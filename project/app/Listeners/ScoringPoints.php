<?php

namespace App\Listeners;

use App\Events\WinnerSelected;
use App\Models\LotteryGame;
use App\Models\User;

class ScoringPoints
{
    public function handle(WinnerSelected $event): void
    {
        $user = User::query()->find($event->userId);
        $game = LotteryGame::query()->find($event->gameId);

        $user->update([
            'points' => $user->points + $game->reward_points
        ]);

        $user->save();
    }
}
