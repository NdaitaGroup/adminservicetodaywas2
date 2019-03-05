<?php

namespace App\Http\Controllers;

use App\Http\Resources\QuestionnaireResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Questionnaire;
use App\QuestionnaireAnswers;
use App\ShopRating;
use App\RatingComment;
use Tymon\JWTAuth\Facades\JWTAuth;

class mobileApiController extends Controller
{

    public function get_questions() {

        $token = JWTAuth::getToken();

        if($token) {
            $user = JWTAuth::toUser($token);
            $questions = Questionnaire::where('shops_in_locations_id',$user->shops_in_locations_id)->get();
        }
        else{
            return response()->json(['error'=>'unauthorized'],400);
        }

        return QuestionnaireResource::collection($questions);
    }
    public function get_answers(Request $request) {
        $token = JWTAuth::getToken();
        $user = JWTAuth::toUser($token);
        $answers = $request->all();
        $firstday = date('Y-m-d');
        $lastday = date('Y-m-d');

        if($token) {
            foreach ($answers as $answer) {

                QuestionnaireAnswers::create([
                    'answer'=>$answer['answer'],
                    'questionnaires_id'=>$answer['id'],
                ]);
            }
            $rating = ShopRating::where('shops_in_locations_id',$user->shops_in_locations_id)
                    ->whereBetween('shop_rating_date',array($firstday,$lastday))->get();

            if($rating->isNotEmpty())
            {
                $shopRete = ShopRating::find($rating[0]->id);
                $shopRete->rating += 1;
                $shopRete->save();
            }
            else{

            }ShopRating::create([
                'shops_in_locations_id'=>$user->shops_in_locations_id,
                'rating'=>1,
                'shop_rating_date'=>\Carbon\Carbon::now(),
            ]);

        }
        else{
            return response()->json(['error'=>'unauthorized'],400);
        }

        $otp = $this->generateOTP();
        //Create comment record
        RatingComment::create([
            'otp'=>$otp,
            'comment_date'=>\Carbon\Carbon::now(),
            'shops_in_locations_id'=>$user->shops_in_locations_id
        ]);
        return response()->json(['status'=>'successfully','opt'=>$otp],200);

    }

    protected function generateOTP() {


        //check if otp exists

        $dbOTP = 999999;
        while(!empty($dbOTP)){
            $otp = rand(1000,10000);
            $result = RatingComment::where('otp',$otp)->get();
            if($result->isEmpty()){
                $dbOTP = null;
            }
        }

        return $otp;

    }
}
