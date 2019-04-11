<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\QuestionnaireAnswers;
class QuestionnaireAnswersController extends Controller
{
    protected function guard() {
        $this->middleware('auth:web');
    }
    public function index() {
        $firstday = date('Y-m-d') ." 00:00:00";
        $lastday = date('Y-m-d') ." 23:59:59";


        if(auth()->user()->user_type == 'Super') {
            $answers = QuestionnaireAnswers::whereBetween('created_at',array($firstday,$lastday));
        }
        else {

            $answers = QuestionnaireAnswers::whereHas('Questions',function ($query){
                $query->where('shops_in_locations_id',auth()->user()->shops_in_locations_id);
            });//->
            //whereBetween('created_at',array($firstday,$lastday));
        }
        $answers  = $answers->paginate(10);
        return view('Admin.answered',compact('answers'));
    }


}
