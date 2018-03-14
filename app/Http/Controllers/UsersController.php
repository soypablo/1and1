<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use function back;
use function compact;
use Illuminate\Http\Request;
use function redirect;
use function view;

class UsersController extends Controller
{
    //显示 用户 页面
    public function show(User $user)
    {
        return view('users.show',compact('user'));
    }

    //显示 编辑个人资料 页面
    public function edit(User $user)
    {
        return view('users.edit',compact('user'));
    }
    
    //保存编辑过的个人资料
    public function update(UserRequest $request, User $user)
    {
        $user->update($request->all());
        return back()->with('success','个人资料已经更新成功!');

    }
}
