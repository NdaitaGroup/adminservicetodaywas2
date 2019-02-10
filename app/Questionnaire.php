<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Questionnaire extends Model
{
    protected $guarded = [];
    public function ShopsInLocation(){
        return $this->belongsTo(\App\ShopsInLocation::class);
    }
    public function QuestionnaireAnswers(){
        return $this->hasMany(\App\QuestionnaireAnswers::class);
    }
}

