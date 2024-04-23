<?php

namespace App\Http\Controllers\Api;

use App\Actions\LotteryGameMatchUser\CreateLotteryGameMatchUserAction;
use App\Http\Controllers\Controller;
use App\Resources\LotteryGameMatchUserResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class LotteryGameMatchUserController extends Controller
{
    /**
     * @throws ValidationException
     */
    public function store(Request $request): JsonResponse|LotteryGameMatchUserResource
    {
        $validatedData = $this->validate($request, [
            'user_id' => ['required', Rule::exists('users', 'id')],
            'lottery_game_match_id' => ['required', Rule::exists('lottery_game_matches', 'id')],
        ]);

        // TODO: make policy for this
        if (Auth::guard('api')->user()->id !== $validatedData['user_id']) {
            return response()->json(['message' => 'You do not have permission to write this user to the game'], 403);
        }

        return new LotteryGameMatchUserResource(CreateLotteryGameMatchUserAction::execute($validatedData));
    }
}
