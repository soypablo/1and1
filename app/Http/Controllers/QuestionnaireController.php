<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use function view;

class QuestionnaireController extends Controller
{
    public function create()
    {
        return view('questionnaires.create');
    }
}
