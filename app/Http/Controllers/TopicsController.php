<?php

namespace App\Http\Controllers;

use App\Handlers\ImageUploadHandler;
use App\Models\Category;
use App\Models\Topic;
use App\Models\User;
use Auth;
use function dd;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\TopicRequest;
use function view;

class TopicsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', [
            'except' => [
                'index',
                'show',
            ],
        ]);
    }

    public function index(Request $request, Topic $topic, User $user)
    {

        $topics       = $topic->WithOrder($request->order)->paginate(10);
        $active_users = $user->getActiveUsers();
        return view('topics.index', compact('topics','active_users'));
    }

    public function show(Topic $topic)
    {
        $replies = $topic->replies()->with('user')->orderByDesc('created_at')->paginate(8);

        return view('topics.show', compact('topic', 'replies'));
    }

    public function create(Topic $topic)
    {
        $categories = Category::all();
        return view('topics.create_and_edit', compact('topic', 'categories'));
    }

    public function store(TopicRequest $request, Topic $topic)
    {
        $topic->title       = $request['title'];
        $topic->category_id = $request['category_id'];
        $topic->body        = $request->body;
        $topic->user_id     = Auth::id();
        $topic->save();


        return redirect()->route('topics.show', $topic->id)->with('message', '话题创建成功');
    }

    public function edit(Topic $topic)
    {
        $this->authorize('update', $topic);
        $categories = Category::all();
        return view('topics.create_and_edit', compact('topic', 'categories'));
    }

    public function update(TopicRequest $request, Topic $topic)
    {
        $this->authorize('update', $topic);
        $topic->update($request->all());
        return redirect()->route('topics.show', $topic->id)->with('success', '上传成功！！');
    }

    public function destroy(Topic $topic)
    {
        $this->authorize('destroy', $topic);
        $topic->delete();

        return redirect()->route('users.show', [Auth::id()])->with('danger', '话题删除成功！');
    }

    public function uploadImage(Request $request, ImageUploadHandler $imageUploadHandler)
    {
        // 初始化返回数据,默认是失败的
        $data = [
            'success'   => false,
            'msg'       => '上传失败!',
            'file_path' => '',
        ];
        //判断是否有上传文件,并赋值给 $file
        if($file = $request->upload_file){
            $result = $imageUploadHandler->save($request->upload_file, 'topics', Auth::id(), 1024);
            if($result){
                $data['file_path'] = true;
                $data['msg']       = '图片上传成功';
                $data['success']   = true;
            }
        }
        return $data;
    }
}