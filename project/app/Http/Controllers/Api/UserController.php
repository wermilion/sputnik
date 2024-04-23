<?php

namespace App\Http\Controllers\Api;

use App\Actions\Users\RegisterUserAction;
use App\Actions\Users\UpdateUserAction;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Resources\UserResource;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use Laravel\Lumen\Http\ResponseFactory;

class UserController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        return UserResource::collection(User::all());
    }

    /**
     * @throws ValidationException
     */
    public function register(Request $request): Response|ResponseFactory
    {
        $validatedData = $this->validate($request, [
            'first_name' => ['required', 'string'],
            'last_name' => ['required', 'string'],
            'email' => ['required', 'email', Rule::unique('users')],
            'password' => ['required', 'string'],
            'is_admin' => ['required', 'boolean'],
        ]);

        return response(new UserResource(RegisterUserAction::execute($validatedData)), 201);
    }

    /**
     * @throws ValidationException
     */
    public function update(Request $request, int $id): JsonResponse|UserResource
    {
        $validatedData = $this->validate($request, [
            'first_name' => ['required', 'string'],
            'last_name' => ['required', 'string'],
            'email' => ['required', 'email', Rule::unique('users')->ignore($id)],
            'is_admin' => ['required', 'boolean'],
        ]);

        // TODO: make policy for this
        if (Auth::guard('api')->id() !== $id) {
            return response()->json(['message' => 'You do not have permission to edit this user'], 403);
        }

        $validatedData['id'] = $id;

        return new UserResource(UpdateUserAction::execute($validatedData));
    }

    public function destroy(int $id): JsonResponse
    {
        try {
            $user = User::query()->findOrFail($id);
        } catch (Exception $e) {
            return response()->json(['message' => 'User not found'], 404);
        }

        // TODO: make policy for this
        if (Auth::guard('api')->id() !== $id) {
            return response()->json(['message' => 'You do not have permission to delete this user'], 403);
        }

        $user->delete();

        return response()->json([], 204);
    }
}
