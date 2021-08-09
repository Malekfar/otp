<?php

namespace App\Tools;

use Kavenegar\KavenegarApi;

class SmsService
{
    private $api, $sender, $status = true;

    public function __construct()
    {
        $this->sender = "10008663";
        $this->api = new KavenegarApi(config('kavenegar.apikey'));
    }

    public static function sendToken($phone, $token)
    {
        $instance = new self();
        if(!$instance->status)
            return;
        $token = makePersianNumber($token);
        $instance->api->Send($instance->sender, $phone, "رمز یکبار مصرف شما $token میباشد.");
    }
}