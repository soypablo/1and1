<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Topic;
use function compact;
use Illuminate\Http\Request;
use function view;

class CategoriesController extends Controller
{
    public function show(Category $category)
    {
       $topics = Topic::where('category_id',$category->id)->paginate(10);
       return view('topics.index',compact('category','topics'));
    }
}