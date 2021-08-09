<?php

namespace App\Repositories;

use App\Models\User;

interface UserRepositoryInterface
{
    public function updateOrCreate(array $array, array $fields) : User;
}