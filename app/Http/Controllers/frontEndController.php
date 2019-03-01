<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RatingComment;
use Session;
class frontEndController extends Controller
{
  
    public function store(Request $request) {

        $this->validate($request,[
            'otp'=>['required'],
            'comment'=>['required'],
        ]);


        $comment = RatingComment::where('otp',$request->otp)
                    ->where('status','incomplete')->get();
        $message = "Sorry!, your feedback can't accepted as your opt had already expired or used";


        if($comment->isNotEmpty()){
            $comment = RatingComment::find($comment[0]->id);
            $comment->comments = $request->comment;
            $comment->status = "complete";
            $comment->comment_date = \Carbon\Carbon::now();
            $comment->save();
            $message = "Thank you for your comments, Please comeback again soon!";
        }


        Session::flash('success',$message);
        return redirect()->back();
    }
}
