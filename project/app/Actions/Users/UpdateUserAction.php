<?php

namespace App\Actions\Users;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class UpdateUserAction
{
    public static function execute(array $data): Model|Collection|Builder|array|null
    {
        User::query()->where('id', $data['id'])->update($data);

        return User::query()->find($data['id']);
    }
}
