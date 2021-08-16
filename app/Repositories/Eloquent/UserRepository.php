<?php

namespace App\Repositories\Eloquent;

use App\Models\User;
use App\Repositories\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function updateOrCreate(array $array, array $fields): User
    {
        return $this->user->updateOrCreate($array, $fields);
    }

    public function findByPhoneAndToken(string $phone, string $token)
    {
        return $this->user->wherePhone($phone)->whereToken($token)->first();
    }
}