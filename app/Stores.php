<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stores extends Model
{
    protected $guarded = [];
    public function LocationShop(){
        return $this->hasMany(\App\LocationShop::class);
    }
}
