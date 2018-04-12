<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\UserRequest;
use App\Models\User;
use Cache;
use function dd;
use function hash_equals;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class UsersController extends Controller
{
    public function store(UserRequest $request,User $user)
    {
        $verifyData = Cache::get($request->verification_key);
        if(!$verifyData){
          return  $this->response->error('验证码已失效', 422);
        }

        if(!hash_equals($verifyData['code'], $request->verification_code)){
            return $this->response->error('验证码错误', '401');
        }

        $user->name = $request->name;
        $user->phone = $verifyData['phone'];
        $user->password = Hash::make($request->password);
        $user->save();

        \Illuminate\Support\Facades\Cache::forget($request->verification_key);

        return $this->response->created();



    }
}
