<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Stores;
use App\LocationShop;
use App\ShopsInLocation;
use App\User;
use Session;
class UsersController extends Controller
{

    public function index(){
        $users = User::where('user_type','!=','Super')->paginate(10);

        return view('Admin.users',compact('users'));
    }
    public function create(){


        return view('Admin.create_users');
    }
    public function addSuperUser(Request $request) {

          $this->validate($request, [
                    'name' => ['required', 'unique:users','string','min:3', 'max:255'],
                    'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                    'password' => ['required', 'string', 'min:6', 'confirmed'],
              ]);

         User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>bcrypt($request->password),
             'user_type'=>'Super',
        ]);

        Session::flash('success','User is successfully added.');


        return redirect()->back();

    }
    public function createUsers() {
        $stores = Stores::all();
        $locations = LocationShop::all();
        $places = ShopsInLocation::all();

        return view('Admin.createUsers',compact('stores','locations','places'));
    }
    public function store(Request $request) {

            $this->validate($request,[
                'name'=>['required', 'unique:users','string','min:3', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:6', 'confirmed'],
                'place'=>['required'],
                'location'=>['required'],
                'store'=>['required'],
                'user_type'=>['required']
            ]);

        $isLocationStore = LocationShop::where('stores_id',$request->store)
                            ->where('id',$request->location)->get();

        if($isLocationStore->isNotEmpty())
        {
            $isPlaceLocation = ShopsInLocation::where('location_shop_id',$request->location)
                ->where('id',$request->place)->get();

            if($isPlaceLocation->isNotEmpty())
            {

                $user = ['name'=> $request->name,
                         'email'=>$request->email,
                         'password'=> bcrypt($request->password),
                         'shops_in_locations_id'=>$request->location,
                         'user_type'=>$request->user_type,
                        ];

            }
            else{

                $getLocation = ShopsInLocation::create([
                            'name'=> $isPlaceLocation->name,
                            'location_shop_id'=>$request->location,
                            'rating'=> 0,

                        ]);
                $user = ['name'=> $request->name,
                    'email'=>$request->email,
                    'password'=> bcrypt($request->password),
                    'shops_in_locations_id'=>$getLocation->id,
                    'user_type'=>$request->user_type,
                ];
            }

        }
        else {

             $getLocation = LocationShop::find($request->location);
             $createNewLocation = LocationShop::create([
                 'name'=>$getLocation->name,
                 'stores_id'=>$request->store
             ]);
            $getPlace = ShopsInLocation::find($request->place);
            $createNewPlace = ShopsInLocation::create([
                            'name'=>$getPlace,
                            'location_shop_id'=>$createNewLocation->id,
                            'rating'=> 0
                ]);
            $user = ['name'=> $request->name,
                'email'=>$request->email,
                'password'=> bcrypt($request->password),
                'shops_in_locations_id'=>$createNewPlace->id,
                'user_type'=>$request->user_type,
            ];


        }


        User::create($user);

        Session::flash('success','User is successfully added.');


       return redirect()->back();
    }
}
