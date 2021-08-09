<?php

namespace App\Repositories\Eloquent;

use App\Models\User;

class UserService implements UserRepositoryInterface
{

    public function updateOrCreate(array $array, array $fields): User
    {
        return User::updateOrCreate($array, $fields);
    }

    public function findByPhoneAndToken(string $phone, string $token)
    {
        return User::wherePhone($phone)->whereToken($token)->first();
    }
}