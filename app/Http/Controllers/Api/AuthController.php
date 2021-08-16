<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\Auth\LoginRequest;
use App\Http\Requests\Api\Auth\SendTokenRequest;
use App\Http\Controllers\Controller;
use App\Services\UserService;
use App\Tools\SmsService;
use \Illuminate\Http\JsonResponse;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    private $service;

    public function __construct(UserService $service)
    {
        $this->service = $service;
    }

    public function sendToken(SendTokenRequest $request): JsonResponse
    {
        $token = rand(10000, 99999);
        $this->service->updateOrCreate([
            'phone' => $request->phone
        ], ['token' => $token]);
        SmsService::sendToken($request->phone, $token);
        return response()->json(['message'  => 'رمز یکبار مصرف با موفقیت ارسال گردید.']);
    }

    public function login(LoginRequest $request)
    {
        $user = $this->service->findByPhoneAndToken($request->phone, $request->token);
        if(!$user)
            return response()->json(['message' => "The given data was invalid.", 'errors' => ['token' => ["رمز یکبار مصرف صحیح نمیباشد."]]], 422);

        $token = JWTAuth::fromUser($user);
        if (!$token)
            return response()->json(['error' => 'Unauthorized'], 401);

        return $this->respondWithToken($token);
    }

    protected function respondWithToken($token): JsonResponse
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60
        ]);
    }
}
