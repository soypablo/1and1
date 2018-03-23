<?php

namespace App\Http\Controllers;

use App\Handlers\ImageUploadHandler;
use App\Http\Requests\UserRequest;
use App\Models\User;
use function asset;
use function back;
use function compact;
use function config;
use function dd;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use function public_path;
use function redirect;
use function str_random;
use function time;
use function view;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['expect' => ['show']]);
    }

    //显示 用户 页面
    public function show(User $user)
    {
        $topics = $user->topics()->orderByDesc('created_at')->paginate(5);
        return view('users.show', compact('user','topics'));
    }

    //显示 编辑个人资料 页面
    public function edit(User $user)
    {
        $this->authorize('update',$user);
        return view('users.edit', compact('user'));
    }

    //保存编辑过的个人资料
    public function update(UserRequest $request, User $user)
    {
        $this->authorize('update',$user);

        Storage::disk('public')->delete($user->avatar);
        $data           = $request->all();
        $path           = $user->uploadFile($request->avatar, $user->id, 200);
        $data['avatar'] = $path;
        $user->update($data);

        return redirect()->route('users.show', [$user])->with('success', '资料已经修改成功了~~');

    }

    public function test()
    {
        $array           = [
            'name'   => 'xiang',
            'age'    => 35,
            'avatar' => '123',
        ];
        $array2          = ['path' => '/a/b'];
        $array['avatar'] = $array2['path'];
        dd($array);
    }
}
