<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Topic;
use App\Models\User;
use function compact;
use Illuminate\Http\Request;
use function view;

class CategoriesController extends Controller
{
    public function show(Category $category,Request $request,Topic $topic,User $user)
    {

       $topics =$topic->where('category_id',$category->id)->WithOrder($request->order)->paginate(10);
       $active_users = $user->getActiveUsers();
       return view('topics.index',compact('category','topics','active_users'));
    }
}
