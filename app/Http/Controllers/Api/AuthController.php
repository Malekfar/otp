<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\Auth\LoginRequest;
use App\Http\Controllers\Controller;
use \Illuminate\Http\JsonResponse;
use App\Models\User;

class AuthController extends Controller
{
    public function login(LoginRequest $request): JsonResponse
    {
        $token = rand(10000, 99999);
        $user = User::updateOrCreate([
            'phone' => $request->phone
        ], ['token' => $token]);
        return response()->json(['message'  => 'رمز یکبار مصرف با موفقیت ارسال گردید.']);
    }
}
