<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\VerificationCodeRequest;
use function env;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Http\Request;
use Overtrue\EasySms\EasySms;
use const STR_PAD_LEFT;


class VerificationCodesController extends Controller
{
    public function store(VerificationCodeRequest $request, EasySms $easySms)
    {
        $phone = $request->phone;
        $code  = str_pad(random_int(1, 9999), 4, 0, STR_PAD_LEFT);
        if(!(env('APP_ENV') == 'production')){
            $code = '1234';
        }
        else {
            try {
                $result = $easySms->send($phone, [
                    'content' => "【易加益信息技术】您的验证码是{$code}。如非本人操作，请忽略本短信",
                ]);
            } catch(\GuzzleHttp\Exception\ClientException $exception) {
                $response = $exception->getResponse();
                $result   = json_decode($response->getBody()->getContents(), true);
                return $this->response->errorInternal($result['msg']);
            }
        }

        $key       = 'verificationCode_'.str_random(15);
        $expiredAt = now()->addMinutes(10);
        // 缓存验证码 10分钟过期。
        \Cache::put($key, [
            'phone' => $phone,
            'code'  => $code,
        ], $expiredAt);

        return $this->response->array([
            'key'        => $key,
            'expired_at' => $expiredAt->toDateTimeString(),
        ])->setStatusCode(201);
    }
}
