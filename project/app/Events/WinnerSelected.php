<?php

namespace App\Events;

/**
 * class MatchIsFinished
 *
 * @property int $userId Идентификатор пользователя
 */
class WinnerSelected extends Event
{
    public function __construct(public readonly int $userId, public readonly int $gameId)
    {
    }
}
