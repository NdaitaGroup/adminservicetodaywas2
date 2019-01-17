<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LocationShop;
class LocationShopController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index() {
       // return LocationShop::with('ShopsInLocation')->get();
        $stores = LocationShop::all();
        $i = 0;
        $colours = array('#3c8dbc','#f56954','#00c0ef','#932ab6','#39CCCC','#00a65a');

        return view('rating',compact('stores','i','colours'));
    }
}
