<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LocationShop extends Model
{
    protected  $fillable = ['name'];

    public function ShopsInLocation(){
        return $this->hasMany(\App\ShopsInLocation::class);
    }
}
