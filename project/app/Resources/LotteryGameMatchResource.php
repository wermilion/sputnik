<?php

namespace App\Resources;

use App\Models\LotteryGame;
use App\Models\LotteryGameMatch;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin LotteryGameMatch
 */
class LotteryGameMatchResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'game_id' => $this->game_id,
            'winner_id' => $this->winner_id,
            'start_date' => $this->start_date,
            'start_time' => $this->start_time,
            'is_finished' => $this->is_finished,
        ];
    }
}
