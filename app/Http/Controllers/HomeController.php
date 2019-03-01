<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RatingComment;
use App\Questionnaire;
use App\User;
use App\ShopsInLocation;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        if(auth()->user()->user_type == 'Super'){
            $questionCount = Questionnaire::count();
            $comments = RatingComment::where('status','complete')->limit(5)->orderBy('id','DESC')->get();
            $commentsCount = RatingComment::count();
            $usersCount = User::count();
            $ratingCount = ShopsInLocation::pluck('rating');
        }
        else{
            $questionCount = Questionnaire::where('shops_in_locations_id',auth()->user()->shops_in_locations_id)->count();
            $comments = RatingComment::where('shops_in_locations_id',auth()->user()->shops_in_locations_id)->where('status','complete')->limit(5)->orderBy('id','DESC')->get();
            $commentsCount = RatingComment::where('shops_in_locations_id',auth()->user()->shops_in_locations_id)->count();
            $usersCount = User::where('shops_in_locations_id',auth()->user()->shops_in_locations_id)->count();
            $ratingCount = ShopsInLocation::where('id',auth()->user()->shops_in_locations_id)->pluck('rating');
        }


        return view('Admin.home',compact('comments','questionCount','commentsCount','usersCount','ratingCount'));
    }

}
