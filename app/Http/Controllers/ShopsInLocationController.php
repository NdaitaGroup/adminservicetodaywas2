<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ShopsInLocation;
use Session;
use App\Stores;
use App\LocationShop;
class ShopsInLocationController extends Controller
{
    protected function guard() {
        $this->middleware('auth:web');
    }
    public function index()
    {

        $places = ShopsInLocation::paginate(10);
        $stores = Stores::all();
        $locations = LocationShop::all();

        return view('Admin.places',compact('places','stores','locations'));
    }
    public function store(Request $request) {

        $this->validate($request,[
                'name'=>['required'],
                'location'=>['required'],
                'store'=>['required'],
            ]);


        $isLocationStore = LocationShop::where('id',$request->location)
                            ->where('stores_id',$request->store)
                            ->get();
        if($isLocationStore->isNotEmpty()) {
            //Check if the place is not added

            $isPlaceInLoccation = ShopsInLocation::where('location_shop_id',$request->location)
                                ->where('name','like',"%".$request->name ."%")->get();
            if($isPlaceInLoccation->isNotEmpty()) {
                Session::flash('error','Store already in location for a store.');
            }
            else {
                ShopsInLocation::create([
                    'name'=>$request->name,
                    'location_shop_id'=>$request->location,
                    'rating'=>0
                ]);
                Session::flash('success','Place successfully added.');
            }
        }
        else {
            $getLocation = LocationShop::find($request->location);

             $loc =  LocationShop::create([
                        'name'=>$getLocation->name,
                        'stores_id'=>$request->store
             ]);
             ShopsInLocation::create([
                 'name'=>$request->name,
                 'location_shop_id'=>$loc->id,
                 'rating'=>0
             ]);
            Session::flash('success','Place successfully added.');
        }
        return redirect()->back();
    }
}
