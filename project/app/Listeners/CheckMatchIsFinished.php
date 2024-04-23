<?php

namespace App\Listeners;

use App\Events\MatchIsFinished;
use App\Events\WinnerSelected;
use App\Models\LotteryGameMatch;

class CheckMatchIsFinished
{
    public function handle(MatchIsFinished $event): void
    {
        $match = LotteryGameMatch::query()->find($event->lotteryGameMatchId);

        if ($match->users->isNotEmpty()) {
            $randomUserId = $match->users->pluck('id')->random();

            $match->update(['winner_id' => $randomUserId]);
            
            event(new WinnerSelected($randomUserId, $match->game_id));
        }
    }
}
