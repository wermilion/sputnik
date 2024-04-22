<?php

namespace app\Actions;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class RegisterUserAction
{
    public static function execute(array $data): Model|Builder
    {
        return User::query()->create(array_merge($data, [
            'password' => Hash::make($data['password']),
            'points' => 0,
        ]));
    }
}
