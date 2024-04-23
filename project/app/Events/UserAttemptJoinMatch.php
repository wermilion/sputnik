<?php

namespace App\Events;

/**
 * class UserAttemptJoinMatch
 *
 * @property int $userId Идентификатор пользователя
 * @property int $lotteryGameMatchId Идентификатор матча
 */
class UserAttemptJoinMatch extends Event
{
    public function __construct(public readonly int $userId, public readonly int $lotteryGameMatchId)
    {
    }
}
