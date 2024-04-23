<?php

namespace App\Http\Controllers\Api;

use App\Actions\LotteryGameMatch\CreateLotteryGameMatchUserAction;
use App\Actions\LotteryGameMatch\UpdateLotteryGameMatchAction;
use App\Http\Controllers\Controller;
use App\Models\LotteryGameMatch;
use App\Resources\LotteryGameMatchResource;
use App\Resources\LotteryGameResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

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

    /**
     * @throws ValidationException
     */
    public function store(Request $request): LotteryGameMatchResource
    {
        $validatedData = $this->validate($request, [
            'game_id' => ['required', 'integer', Rule::exists('lottery_games', 'id')],
            'start_date' => ['required', 'date', 'after_or_equal:today'],
            'start_time' => ['required', 'date_format:H:i'],
        ]);

        return new LotteryGameMatchResource(CreateLotteryGameMatchUserAction::execute($validatedData));
    }

    /**
     * @throws ValidationException
     */
    public function update(Request $request, int $id): LotteryGameMatchResource
    {
        $validatedData = $this->validate($request, [
            'is_finished' => ['required', 'boolean'],
        ]);

        $validatedData['id'] = $id;

        return new LotteryGameMatchResource(UpdateLotteryGameMatchAction::execute($validatedData));
    }
}
