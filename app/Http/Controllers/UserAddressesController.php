<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Http\Requests\UserAddressesRequest;
use App\User;
use App\Area;
use App\UserAddresses;

class UserAddressesController extends Controller
{
    public function index()
    {
        $addresses = UserAddresses::all();
        return view('addresses.index',[
            'addresses' => $addresses,
        ]);
    }

    public function create(){
        $users = User::all();
        $areas = Area::all();
        $action =route('addresses.store');
        return view('addresses.create',[
            'action'=> $action,
            'areas'=>$areas,
            'users'=>$users,
        ]);
    }

    public function store(Request $request){
    
         UserAddresses::create([
            'street_name' => $request->street_name,
            'building_number' =>  $request->building_number,
            'floor_number' =>  $request->floor_number,
            'flat_number' =>  $request->flat_number,
            'is_main' =>  $request->is_main,
            'area_id' =>  $request->area_id,
            'user_id' =>  $request->user_id,
        ]);
        //redirect to /Users
        // return view('users.index');
        return redirect()->route('addresses.index');
    }

    public function show(){

        $request=request();
        $addressId=$request->address;
        $address = UserAddresses::find($addressId);

        return view('addresses.show',[
            'address'=>$address,
        ]);
    }


    public function destroy(){
        $request=request();
        $addressId=$request->address;
        $deleted = UserAddresses::find($addressId)->delete();
        return redirect()->route('addresses.index');
    }

    public function edit(){

        $request=request();
        $users= User::all();
        $areas = Area::all();
        $addressId=$request->address;
        $address = UserAddresses::find($addressId);
        $action =route('addresses.update',['address'=>$addressId]);

        return view('addresses.create',[
            'address'=> $address,
            'areas'=>$areas,
            'users'=>$users,
            'action'=> $action,

        ]);
    }
    
    public function update(Request $request){

        $request=request();
        $addressId=$request->address;
        $address= UserAddresses::find($addressId);

        $address->street_name = $request->street_name;
        $address->building_number =  $request->building_number;
        $address->floor_number = $request->floor_number;
        $address->flat_number = $request->flat_number;
        $address->is_main =  $request->is_main;
        $address->area_id =$request->area_id;
        $address->user_id = $request->user_id;

        $address->save();

        //redirect to /posts
        return redirect()->route('addresses.index');
    }
}
