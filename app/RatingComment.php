<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RatingComment extends Model
{
    protected $guarded = [];
    public function ShopsInLocation(){
        return $this->belongsTo(\App\ShopsInLocation::class,'shops_in_locations_id');
    }
}
