<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Stores;
use Session;
class StoreController extends Controller
{

    public function index(){
        $stores = Stores::paginate(10);
        return view('Admin.stores',compact('stores'));
    }
    public function addStore(Request $request) {

        $store= $this->validate($request, [
            'name' => ['required', 'unique:stores','string','min:3', 'max:255'],


        ]);

        Stores::create($store);
        Session::flash('success','Store is successfully added.');

        return redirect()->back();
    }
    protected function guard() {
        $this->middleware('auth:web');
    }
}
