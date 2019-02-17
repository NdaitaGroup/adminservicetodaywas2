<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShopsInLocation extends Model
{
    protected $fillable = ['name','location_shop_id','rating'];

    public function LocationShop(){
        return $this->belongsTo(\App\LocationShop::class,'location_shop_id');
    }
    public function user(){
        return $this->hasMany(\App\User::class);
    }
    public function Questionnaires(){
        return $this->hasMany(\App\Questionnaire::class);
    }
    public function RatingComments(){
        return $this->hasMany(\App\RatingComment::class);
    }
}
