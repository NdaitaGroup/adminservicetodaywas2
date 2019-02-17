<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LocationShop;
use App\Stores;
use Session;
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

        return view('Admin.rating',compact('stores','i','colours'));
    }
    public function locations(){
        $locations = LocationShop::paginate(10);
        $stores = Stores::all();
        return view('Admin.location',compact('locations','stores'));
    }
    public function store(Request $request) {

        $this->validate($request,[
                'name'=>['required', 'string','min:3', 'max:255'],
                'store'=>['required']
            ]);

            $isLocationStore = LocationShop::where('stores_id',$request->store)
                               ->where('name','like',"%".$request->name ."%")
                               ->get();
            if($isLocationStore->isNotEmpty()) {
                Session::flash('error','Location already exist for the selected store.');

            }
            else {
                Session::flash('success','Location is successfully added.');
                LocationShop::create([
                    'name'=>$request->name,
                    'stores_id'=>$request->store
                ]);
            }

            return redirect()->back();
    }
}
