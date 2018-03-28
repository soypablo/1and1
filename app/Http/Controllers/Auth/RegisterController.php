<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use function date;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use function str_random;
use function time;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name'     => 'required|string|max:255',
            'email'    => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'sex'      => 'required',
            'captcha'  => 'required|captcha',
        ], [
            'captcha.required' => '验证码不能为空',
            'captcha.captcha'  => '验证码输入不正确',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     * @param  array $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $file_path = 'avatar/'.date('Ym/d', time()).'/'.str_random(5).'.png';
        if($data['sex'] == 'boy'){
            Storage::copy('avatar/1.png', 'public/'.$file_path);
            $data['sex'] =$file_path;
        }
        else {
             Storage::copy('avatar/2.png', 'public/'.$file_path);
             $data['sex'] =$file_path;
        }
        return User::create([
            'name'     => $data['name'],
            'email'    => $data['email'],
            'password' => bcrypt($data['password']),
            'avatar'   => $data['sex'],
        ]);
    }
}
