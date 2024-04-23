<?php

namespace App\Resources;

use App\Models\LotteryGameMatchUser;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin LotteryGameMatchUser
 */
class LotteryGameMatchUserResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'lottery_game_match_id' => $this->lottery_game_match_id,
        ];
    }
}
