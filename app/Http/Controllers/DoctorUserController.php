<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Doctor;
use App\pharmacy;
use App\OrderMedicine;
use App\Http\Requests\StoreDoctorRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Hash;
use Auth;


class DoctorUserController extends Controller
{
    public function index(){
        $orders = OrderMedicine::all();
        return view('doctorUser.index',[
            'orders'=> $orders,
        // return view ('doctorUser.index');
        ]);
    } 
}
