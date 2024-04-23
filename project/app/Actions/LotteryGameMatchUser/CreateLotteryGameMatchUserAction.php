<?php

namespace App\Actions\LotteryGameMatchUser;

use App\Models\LotteryGameMatch;
use App\Models\LotteryGameMatchUser;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class CreateLotteryGameMatchUserAction
{
    public static function execute(array $data): Model|Builder
    {
        return LotteryGameMatchUser::query()->create($data);
    }
}
