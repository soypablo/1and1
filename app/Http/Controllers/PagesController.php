<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use function view;

class PagesController extends Controller
{
    public function root()
    {
        return view('pages.root');
    }

    public function home()
    {
        return view('pages.home');
    }
}
