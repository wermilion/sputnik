<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\JwtService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function __construct(private readonly JwtService $JwtService)
    {
    }

    /**
     * @throws ValidationException
     */
    public function login(Request $request): JsonResponse
    {
        $validatedData = $this->validate($request, [
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (!$user = User::query()->firstWhere('email', $validatedData['email'])) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        if (!password_verify($validatedData['password'], $user->password)) {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }

        $token = $this->JwtService->encode([
            'sub' => $user->id,
        ]);

        return response()->json(['token' => $token]);
    }
}
