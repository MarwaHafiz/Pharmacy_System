<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\User;
use App\Area;
use App\UserAddresses;

use App\Http\Resources\UserAddressesResource;

class UserAddressesController extends Controller
{
     
    public function index(){
        return UserAddressesResource::collection(
            UserAddresses::all()
            // UserAddresses::paginate(4)
        ); 
    }

    public function show($address){
        return  UserAddresses::find($address)
            ?new UserAddressesResource(
                UserAddresses::find($address)
            ) : 'not exist';
    }
    public function store(Request $request)
    {
        $request->validate([
            'street_name' => 'required',
            'building_number' => 'required',
            'floor_number' => 'required',
            'flat_number' => 'required',
            'is_main' => 'required',
            'area_name' => 'required',
            'user_name' => 'required',
        ]);

        $username=$request->user_name;
        $areaname=$request->area_name;
        // dd($username);
        // $userData= DB::table('users')->where('name',$username)->get();
        // $areaData= DB::table('areas')->where('name',$areaname)->get();
           $userData= Area::where('name',$username)->get();
           $areaData= Area::where('name',$areaname)->get();

        // dd($userData[0]->id);
        $address= UserAddresses::create([
            'street_name' => $request->street_name,
            'building_number' =>  $request->building_number,
            'floor_number' =>  $request->floor_number,
            'flat_number' =>  $request->flat_number,
            'is_main' =>  $request->is_main,
            // 'area_id' =>  $request->area_id,
            // 'user_id' =>  $request->user_id,
            'area_id' =>   $areaData[0]->id,
            'user_id' =>   $userData[0]->id,
        ]);
        return new UserAddressesResource($address);
    }

    public function update(Request $request)
    {
        $request->validate([
            'street_name' => 'required',
            'building_number' => 'required',
            'floor_number' => 'required',
            'flat_number' => 'required',
            'is_main' => 'required',
            'area_name' => 'required',
            'user_name' => 'required',
        ]);
        $username=$request->user_name;
        $areaname=$request->area_name;
        // dd($username);
        // $userData= DB::table('users')->where('name',$username)->get();
        // $areaData= DB::table('areas')->where('name',$areaname)->get();
        $userData= Area::where('name',$username)->get();
        $areaData= Area::where('name',$areaname)->get();
        // dd($userData[0]->id);
       
        // $request=request();
        $addressId=$request->address;
        $address= UserAddresses::find($addressId);
        $address->street_name = $request->street_name;
        $address->building_number =  $request->building_number;
        $address->floor_number = $request->floor_number;
        $address->flat_number = $request->flat_number;
        $address->is_main =  $request->is_main;
        $address->area_id =$areaData[0]->id;
        $address->user_id = $userData[0]->id;

        $address->save();
        return new UserAddressesResource($address);
    }
        
}
