<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\LotteryGame;
use App\Resources\LotteryGameResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class LotteryGameController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        return LotteryGameResource::collection(LotteryGame::all());
    }
}
