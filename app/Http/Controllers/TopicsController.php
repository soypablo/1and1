<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Topic;
use Auth;
use function dd;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\TopicRequest;

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

    public function index(Request $request)
    {
       $topic = new Topic();
       $topics =$topic->WithOrder($request->order)->paginate(10);
       return view('topics.index', compact('topics'));
    }

    public function show(Topic $topic)
    {
        return view('topics.show', compact('topic'));
    }

    public function create(Topic $topic)
    {
        $categories =Category::all();
        return view('topics.create_and_edit', compact('topic','categories'));
    }

    public function store(TopicRequest $request,Topic $topic)
    {
        $topic->title = $request['title'];
        $topic->category_id = $request['category_id'];
        $topic->body = $request->body;
        $topic->user_id = Auth::id();
        $topic->save();


        return redirect()->route('topics.show', $topic->id)->with('message', '话题创建成功');
    }

    public function edit(Topic $topic)
    {
        $this->authorize('update', $topic);
        return view('topics.create_and_edit', compact('topic'));
    }

    public function update(TopicRequest $request, Topic $topic)
    {
        $this->authorize('update', $topic);
        $topic->update($request->all());
        return redirect()->route('topics.show', $topic->id)->with('message', 'Updated successfully.');
    }

    public function destroy(Topic $topic)
    {
        $this->authorize('destroy', $topic);
        $topic->delete();

        return redirect()->route('topics.index')->with('message', 'Deleted successfully.');
    }
}