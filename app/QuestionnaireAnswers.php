<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestionnaireAnswers extends Model
{
    protected $guarded = [];
    public function Questions(){
        return $this->belongsTo(\App\Questionnaire::class,'questionnaires_id');
    }
}
