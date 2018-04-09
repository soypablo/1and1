<?php

namespace App\Http\Controllers;

use App\Handlers\ImageUploadHandler;
use App\Http\Requests\UserRequest;
use App\Models\User;
use function array_slice;
use function asset;
use Auth;
use function back;
use Carbon\Carbon;
use function collect;
use function compact;
use function config;
use function dd;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redis;
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
        $topics  = $user->topics()->orderByDesc('created_at')->paginate(8);
        $replies = $user->replies()->orderByDesc('created_at')->paginate(8);
        return view('users.show', compact('user', 'topics', 'replies'));
    }

    //显示 编辑个人资料 页面
    public function edit(User $user)
    {
        $this->authorize('update', $user);
        return view('users.edit', compact('user'));
    }

    //保存编辑过的个人资料
    public function update(UserRequest $request, ImageUploadHandler $imageUploadHandler, User $user)
    {
        $this->authorize('update', $user);

        Storage::disk('public')->delete($user->avatar);
        $data           = $request->all();
        $path           = $imageUploadHandler->save($request->avatar, 'avatar', $user->id, 300);
        $data['avatar'] = $path;
        $user->update($data);

        return redirect()->route('users.show', [$user])->with('success', '资料已经修改成功了~~');
    }

    public function test(User $user)
    {
        $hash_prefix = 'larabbs_last_actived_at_';
        $hash = $hash_prefix.Carbon::now()->toDateString();
        $key='user_3';

        $value=Carbon::now()->toDateTimeString();
        Cache::tags('xiang')->put($key, $value,100);

       dd( Cache::tags('xiang')->getStore());


    }

}
