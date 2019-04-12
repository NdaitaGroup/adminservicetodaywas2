<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Questionnaire;
use Session;
class QuestionnaireController extends Controller
{
    //

    protected function guard() {
        $this->middleware('auth:web');
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
    public function edit($id){

        $questionnaire = Questionnaire::findOrFail($id);

        return view('Admin.editQuestionnaire',compact('questionnaire'));
    }
    public function update(Request $request,$id){


        $this->validate($request, [
            'questionnaire' => ['required', 'string','min:10', 'max:255'],

        ]);
        $questionnaire = Questionnaire::findOrFail($id);
        $questionnaire->questionnaire = $request->questionnaire;
        $questionnaire->save();
        Session::flash('success','Question successfully updated');


        return redirect()->route('questionnaire');
    }

}
