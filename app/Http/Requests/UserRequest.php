<?php

namespace App\Http\Requests;

use Auth;
use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|between:3,25|regex:/^[0-9a-zA-Z\_]+$/|unique:users,name,'.Auth::id(),

            'introduction' => 'required|max:80',

        ];
    }

    public function messages()
    {
        return [
            'name.between'          => '傻瓜,用户名必须在3-25个字符之间!!!',
            'introduction.required' => '个人介绍内容不能为空',
            'introduction.max'=>'个人介绍内容不能少于80个字 ',
        ];
    }
}
