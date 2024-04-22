<?php

namespace App\Http\Controllers\Api;

use app\Actions\RegisterUserAction;
use App\Http\Controllers\Controller;
use App\Resources\UserResource;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;
use Laravel\Lumen\Http\ResponseFactory;

class UserController extends Controller
{
    /**
     * @throws ValidationException
     */
    public function register(Request $request): Response|ResponseFactory
    {
        $validatedData = $this->validate($request, [
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|string',
            'is_admin' => 'required|boolean',
        ]);

        return response(new UserResource(RegisterUserAction::execute($validatedData)), 201);
    }
}
