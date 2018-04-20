<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

$api = app('Dingo\Api\Routing\Router');

$api->version('v1', [
    'namespace' => 'App\Http\Controllers\Api',
], function($api) {
    //登陆接口
    $api->group([
        'middleware' => 'api.throttle',
        'limit'      => config('api.rate_limits.sign.limit'),
        'expires'    => config('api.rate_limits.sign.expires'),
    ], function($api) {
        //短信验证码
        $api->post('verificationcodes', 'VerificationCodesController@store')->name('api.verificationCodes.store');
        //用户注册
        $api->post('users', 'UsersController@store')->name('api.users.stroe');
        //网页验证码
        $api->post('captchas','CaptchasController@store')->name('api.captchas.store');
        //第三方登陆
        $api->post('socials/{social_type}/authorizations', 'AuthorizationsController@socialStore')->name('api.socials.authorizations.store');
        //普通登陆
        $api->post('authorizations', 'AuthorizationsController@store')->name('api.authorizations.store');
    });



});



