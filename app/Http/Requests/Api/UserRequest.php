<?php

namespace App\Http\Requests\Api;



use Dingo\Api\Http\FormRequest;

class UserRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'name'=>'required|string|max:255',
            'password'=>'required|string|min:6',
            'verification_key'=>'required|string',
            'verification_code'=>'required|string',
        ];
    }
}
