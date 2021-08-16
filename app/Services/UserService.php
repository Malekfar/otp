<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\Eloquent\UserRepository;

class UserService
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function updateOrCreate(array $array, array $fields): User
    {
        return $this->userRepository->updateOrCreate($array, $fields);
    }

    public function findByPhoneAndToken(string $phone, string $token)
    {
        return $this->userRepository->findByPhoneAndToken($phone, $token);
    }
}