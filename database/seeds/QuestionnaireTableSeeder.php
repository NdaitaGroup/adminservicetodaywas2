<?php

use Illuminate\Database\Seeder;

class QuestionnaireTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $shops= DB::table('shops_in_locations')->get();

        $questions = array(
            array('questionnaire'=>'How was the experience at the store?'),
            array('questionnaire'=>'Were you able to find what u were looking for?'),
            array('questionnaire'=>'Was the staff helpful?'),
            array('questionnaire'=>'Would you recommend the store?'),

        );

        foreach ($shops as $shop)
        {
            foreach ($questions as $question)
            {
                $question = array_merge($question,array('shops_in_locations_id'=> $shop->id));
                \App\Questionnaire::create($question);
            }
        }
    }
}
