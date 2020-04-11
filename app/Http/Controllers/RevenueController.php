<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\pharmacy;
use Illuminate\Support\Facades\DB;
use App\Order;

class RevenueController extends Controller
{
    public function index(){
        $pharmacies = pharmacy::all();
        $orders = array();
        $i=0;
            foreach($pharmacies as $pharmacy){
                $pharmacyId = $pharmacy->id;
                $orders[$i] =DB::table('orders')->where('pharmacy_id',$pharmacyId)->count();
                $i=$i+1;
            }
            // dd($orders);
            $i=0;
            return view('Revenue.index',[
                'pharmacies'=> $pharmacies,
                'orders'=>$orders ,
                'i'=>$i
            ]);
       
    } 
    // public function show(){
    //     $pharmacyId;
    //     return view('Revenue.show',[
    //         'pharmacyId'=>$pharmacyId,
    //     ]);
    // }
}
