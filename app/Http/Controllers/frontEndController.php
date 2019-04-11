<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RatingComment;
use App\ShopsInLocation;
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
            $rating = ShopsInLocation::find($comment->shops_in_locations_id);
            $rating->rating = $rating->rating + 1;
            $rating->save();

        }



        Session::flash('success',$message);
        return redirect()->back();
    }

    public function getVideo(){

        return asset('videos/swit.mp4');
    }
    public function ratingStats(){

        $comments = RatingComment::where('status','complete')->where('shops_in_locations_id',1)->count();
        $rating = ShopsInLocation::find(1);
        $rating = $rating->rating + $comments;
        $rating->save();

    }
}
