<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShopsInLocation extends Model
{
    protected $fillable = ['name','location_shop_id','rating'];

    public function LocationShop(){
        return $this->belongsTo(\App\LocationShop::class);
    }
}
