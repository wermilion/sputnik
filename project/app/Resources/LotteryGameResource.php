<?php

namespace App\Resources;

use App\Models\LotteryGame;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin LotteryGame
 */
class LotteryGameResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'gamer_count' => $this->gamer_count,
            'reward_points' => $this->reward_points,
        ];
    }
}
