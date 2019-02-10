<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuestionnaireController extends Controller
{
    //

    public function __construct()
    {
    }
    public function index()
    {
        return view('Admin.questionnaire');
    }
}
