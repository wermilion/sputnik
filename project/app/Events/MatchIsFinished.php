<?php

namespace App\Events;

/**
 * class MatchIsFinished
 *
 * @property int $lotteryGameMatchId Идентификатор матча
 */
class MatchIsFinished extends Event
{
    public function __construct(public readonly int $lotteryGameMatchId)
    {
    }
}
