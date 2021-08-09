<?php

namespace App\Repositories\Eloquent;

use App\Models\User;

class UserService implements UserRepositoryInterface
{

    public function updateOrCreate(array $array, array $fields): User
    {
        return User::updateOrCreate($array, $fields);
    }
}