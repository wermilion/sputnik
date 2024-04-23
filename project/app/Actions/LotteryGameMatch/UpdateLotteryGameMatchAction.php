<?php

namespace App\Actions\LotteryGameMatch;

use App\Models\LotteryGameMatch;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class UpdateLotteryGameMatchAction
{
    public static function execute(array $data): Model|Builder
    {
        LotteryGameMatch::query()->where('id', $data['id'])->update($data);

        return LotteryGameMatch::query()->find($data['id']);
    }
}
