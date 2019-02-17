<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LocationShop extends Model
{
    protected  $fillable = ['name','stores_id'];

    public function ShopsInLocation(){
        return $this->hasMany(\App\ShopsInLocation::class);
    }
    public function stores(){
        return $this->belongsTo(\App\Stores::class,'stores_id');
    }
}
