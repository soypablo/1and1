<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\CaptchaRequest;
use Gregwar\Captcha\CaptchaBuilder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use function now;
use function str_random;

class CaptchasController extends Controller
{
    public function store(CaptchaRequest $request, CaptchaBuilder $captchaBuilder)
    {
        $captcha_key = 'captcha-'.str_random(15);
        $captcha = $captchaBuilder->build();
        $value=[
            'phone'=>$request->phone,
            'code'=>$captcha->getPhrase()
        ];
        $expired = now()->addMinute(2);
        Cache::put($captcha_key, $value,$expired);

        $result = [
            'captcha_key'=>$captcha_key,
            'expired'=>$expired->toDateTimeString(),
            'captcha_content'=>$captcha->inline(),
        ];

      return  $this->response->array($result)->setStatusCode(201);



    }
}
