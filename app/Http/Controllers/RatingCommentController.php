<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RatingComment;
use Session;
class RatingCommentController extends Controller
{
    protected function guard() {
        $this->middleware('auth:web');
    }
    public function getStats(){

        $firstday = date('Y-m-01');
        $lastday = date('Y-m-t');

        if(auth()->user()->user_type == 'Super') {
            $complete =  RatingComment::where('status','complete')
                ->whereBetween('comment_date',array($firstday,$lastday))
                ->count();
            $incomplete =  RatingComment::where('status','incomplete')
                ->whereBetween('comment_date',array($firstday,$lastday))
                ->count();
        }
        else {
            $complete =  RatingComment::where('shops_in_locations_id',auth()->user()->shops_in_locations_id)
                ->where('status','complete')
                ->whereBetween('comment_date',array($firstday,$lastday))
                ->count();
            $incomplete =  RatingComment::where('shops_in_locations_id',auth()->user()->shops_in_locations_id)
                ->where('status','incomplete')
                ->whereBetween('comment_date',array($firstday,$lastday))
                ->count();
        }


        return ['complete'=>$complete,'incomplete'=>$incomplete];
    }
    public function comments(){
        $firstday = date('Y-m-01');
        $lastday = date('Y-m-t');
        if(auth()->user()->user_type == 'Super') {
            $comments = RatingComment::whereBetween('comment_date',array($firstday,$lastday));
        }
        else {
            $comments = RatingComment::where('shops_in_locations_id',auth()->user()->shops_in_locations_id)
                ->whereBetween('comment_date',array($firstday,$lastday));
        }
        $comments = $comments->paginate(10);
        return view('Admin.comments',compact('comments'));
    }

}
