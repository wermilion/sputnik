<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\LotteryGameMatch;
use App\Resources\LotteryGameResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class LotteryGameMatchController extends Controller
{
    public function getByLotteryGame(Request $request): JsonResponse|AnonymousResourceCollection
    {
        if (!$request->get('lottery_game_id')) {
            return response()->json(['message' => 'lottery_game_id is required'], 400);
        }

        return LotteryGameResource::collection(LotteryGameMatch::query()
            ->where('game_id', $request->get('lottery_game_id'))
            ->get()
        );
    }
}
