<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Questionnaire;
class QuestionnaireController extends Controller
{
    //

    public function __construct()
    {
    }
    public function index()
    {
        $questionnaires = Questionnaire::where('shops_in_locations_id',auth()->user()->shops_in_locations_id)->paginate(10);

        return view('Admin.questionnaire',compact('questionnaires'));
    }
    public function store(Request $request){

        $questionnaire = $this->validate($request, [
            'questionnaire' => ['required', 'string','min:10', 'max:255'],


        ]);
        $questionnaire = array_merge($questionnaire,array('shops_in_locations_id'=> auth()->user()->shops_in_locations_id));
        Questionnaire::create($questionnaire);

        return redirect()->back();
    }
}
