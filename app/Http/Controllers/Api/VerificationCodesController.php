<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\VerificationCodeRequest;
use function env;
use GuzzleHttp\Exception\ClientException;
use function hash_equals;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Overtrue\EasySms\EasySms;
use const STR_PAD_LEFT;


class VerificationCodesController extends Controller
{
    public function store(VerificationCodeRequest $request, EasySms $easySms)
    {
        $captcha_data = Cache::get($request->captcha_key);
        if(!$captcha_data){
            return $this->response->error('图片验证码已经失效',422);
        }
        if(!hash_equals($captcha_data['code'], $request->captcha_code)){
            //验证错误就清除缓存
            Cache::forget($request->captcha_key);
            return $this->response->error('验证码错误',401);
        }
        $phone = $captcha_data['phone'];
        $code  = str_pad(random_int(1, 9999), 4, 0, STR_PAD_LEFT);
        if(true){
            $code = '1234';
        }
        else {
            try {
                $result = $easySms->send($phone, [
                    'content' => "【易加益信息科技】您的验证码是{$code}。如非本人操作，请忽略本短信",
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
