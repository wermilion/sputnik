<?php

namespace App\Actions\LotteryGameMatch;

use App\Models\LotteryGameMatch;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class CreateLotteryGameMatchAction
{
    public static function execute(array $data): Model|Builder
    {
        return LotteryGameMatch::query()->create($data);
    }
}
