<?php

use Illuminate\Database\Seeder;

class RatingCommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Get Spar Location store
        $location = DB::table('location_shops')->where('stores_id', 1)->first();
        //get Shop In Location
        $location = DB::table('shops_in_locations')->where('location_shop_id', $location->id)->first();
        $comments = array(
            array('comments'=>'I give the service of today 7/10. There is always a room from improvement','shops_in_locations_id'=>$location->id,'comment_date'=>\Carbon\Carbon::now(),'status'=>'complete','otp'=>rand(1000,10000)),
            array('comments'=>'Shopping was fantastic','shops_in_locations_id'=>$location->id,'comment_date'=>\Carbon\Carbon::now(),'status'=>'complete','otp'=>rand(1000,10000)),
            array('comments'=>'There are many tellers but less people operating them, not cool','shops_in_locations_id'=>$location->id,'comment_date'=>\Carbon\Carbon::now(),'status'=>'complete','otp'=>rand(1000,10000)),
            array('comments'=>'We cannot stand on long queues, a resolution is required','shops_in_locations_id'=>$location->id,'comment_date'=>\Carbon\Carbon::now(),'status'=>'complete','otp'=>rand(1000,10000)),
            array('comments'=>'The teller lady was friendly and she knows what she was doing','shops_in_locations_id'=>$location->id,'comment_date'=>\Carbon\Carbon::now(),'status'=>'complete','otp'=>rand(1000,10000)),
            array('comments'=>'It was very easy to get what I needed as the workers assisted me at first rate. 5 star from me','shops_in_locations_id'=>$location->id,'comment_date'=>\Carbon\Carbon::now(),'status'=>'complete','otp'=>rand(1000,10000)),
            array('comments'=>'Air condition was not working it made shopping not enjoyable','shops_in_locations_id'=>$location->id,'comment_date'=>\Carbon\Carbon::now(),'status'=>'complete','otp'=>rand(1000,10000)),
            array('comments'=>'I do not understand what was wrong with the teller, she was grumpy','shops_in_locations_id'=>$location->id,'comment_date'=>\Carbon\Carbon::now(),'status'=>'complete','otp'=>rand(1000,10000)),
        );

        foreach ($comments as $comment){
            \App\RatingComment::create($comment);
        }
    }
}
