<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\Auth\LoginRequest;
use App\Http\Controllers\Controller;
use App\Repositories\Eloquent\UserRepositoryInterface;
use \Illuminate\Http\JsonResponse;

class AuthController extends Controller
{
    private $service;

    public function __construct(UserRepositoryInterface $repository)
    {
        $this->service = $repository;
    }

    public function login(LoginRequest $request): JsonResponse
    {
        $token = rand(10000, 99999);
        $user = $this->service->updateOrCreate([
            'phone' => $request->phone
        ], ['token' => $token]);
        return response()->json(['message'  => 'رمز یکبار مصرف با موفقیت ارسال گردید.']);
    }
}
