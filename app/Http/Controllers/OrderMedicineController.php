<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\OrderMedicine;
use App\Order;
use App\User;
use App\Doctor;
use App\Status;
use App\pharmacy;
use App\Medicine;
use Illuminate\Support\Facades\Auth;

class OrderMedicineController extends Controller
{
    public function index(){
        $orders = OrderMedicine::all();
        // if (Auth::check()) {
            // The user is logged in...
        // }
        // $user = Auth::user();
        // print($user->id);
        // print($user->name);
        // $id = Auth::user()->id;
        
        return view('orders.index',[
            'orders'=> $orders,
        ]);
    } 
    public function create(){
        $orderM = OrderMedicine::all();
        // $orders = Order::all();
        // $doctors = Doctor::all();
        $total_price =0;
        $meds =Medicine::all();
        $users = User::all();
      
        return view('orders.create',[
            // 'orders' => $orders,
            'orderM'=>$orderM,
            'meds'=>$meds,
            'total_price'=>$total_price,
            // 'doctors'=>$doctors,
            'users'=> $users
        ]);
       
    }
    public function store(Request $request){
        $request->validate([
            'name'=>'required',
            'delivering_address' =>  'required|regex:/^(?:\d+ [a-zA-Z ]+, ){2}[a-zA-Z ]+$/',//15 Gordon St, 3121 Cremorne, Australia
            'total_price' => 'required',
            'type'=> 'required|min:3',
            'action'=> 'required|min:3',
            'quantity'=>'required',
            'type'=> 'required',
            'price'=> 'required',
        ]);
        $order_id = DB::table('orders')->max('id')+1;
        $medicine = $request->name;
        $med_id =DB::table('medicines')->where('name',$medicine)->value('id');
       
        $user_id = $request->user_id;

        $area_id = DB::table('user_addresses')->where('user_id',$user_id)->value('area_id');
        $pharmacy = DB::table('pharmacies')->where('area_id',$area_id)->orderBy('priority','asc')->first();
        $pharmacy_id=$pharmacy->id;
        
        if(is_null($med_id)){
            $med_id_new = DB::table('medicines')->max('id')+1;
            
            foreach($request->input(['name']) as $key => $value) {
                
                $med = [
                    $request->input('name.'.$key),
                    $request->input('quantity.'.$key),
                    $request->input('type.'.$key),
                    $request->input('price.'.$key),
                ];
                Medicine::create([
                    'name'=> $med[0],
                    'quantity'=> $med[1],
                    'type'=>$med[2],
                    'price'=>$med[3],
                ]);
                
            }
           
            Order::create([
                'delivering_address'=>$request->delivering_address,
                'is_insured' => $request->is_insured,
                'action' => $request->action, 
                'total_price'=>$request->total_price,
                'user_id'=>$request->user_id,
                'pharmacy_id'=>$pharmacy_id
                // 'doctor_id'=>$request->doctor_id,
            ]);
            $quan=0;
            foreach($request->input(['quantity']) as $key => $value) {
                $quan = $quan + $request->input('quantity.'.$key);
                
            } 
            OrderMedicine::create([
                'quantity'=>$quan,
                'medicine_id' => $med_id_new,
                'order_id' =>$order_id
            ]);
        }
        else{
            Order::create([
                'delivering_address'=>$request->delivering_address,
                'is_insured' => $request->is_insured,
                'action' => $request->action, 
                'user_id'=>$request->user_id,
                'total_price'=>$request->total_price,
                // 'doctor_id'=>$request->doctor_id,
            ]);
            
            OrderMedicine::create([
                'quantity'=>$request->quantity,
                'medicine_id' => $med_id,
                'order_id' =>$order_id
            ]);
        }
        

        return redirect()->route('orders.index');
        
        
    }
    public function edit(){
        $request= request();
        $request->validate([
            'name'=>'required',
            'delivering_address' =>  'required|regex:/^(?:\d+ [a-zA-Z ]+, ){2}[a-zA-Z ]+$/',//15 Gordon St, 3121 Cremorne, Australia
            'total_price' => 'required',
            'type'=> 'required|min:3',
            'action'=> 'required|min:3',
            'quantity'=>'required',
            'type'=> 'required',
            'price'=> 'required',
        ]);
        $stId =DB::table('statuses')->where('status','WaitingForUserConfirmation')->value('id');
        
        $orderId=$request->order;
        
        $medId=$request->medicine;
        $status_id =DB::table('orders')->where('id',$orderId)->value('status_id');
        
        if($status_id<$stId){
            $orderM = OrderMedicine::find($orderId);
            $orders = Order::find($orderId);
            $meds = Medicine::all();
            $users = User::all();
            $doctors = Doctor::all();
            $statuses =Status::all();
            $pharmacies = pharmacy::all();
            return view('orders.edit',[
                'orderM'=>$orderM,
                'orders'=>$orders,
                'users'=>$users,
                'doctors'=>$doctors,
                'statuses'=>$statuses,
                'meds'=>$meds,
                'pharmacies'=>$pharmacies,
            ]);
        }
        else{
            return redirect()->back()->with(['alert','Sorry order cannot be edited it is waiting for user confirmation']);
        }
        
    }
    public function update(Request $request, $orderMId){

        $order_id = DB::table('order_medicines')->where('id', $orderMId)->value('order_id');
        Order::where('id', $order_id)->update([
            'delivering_address'=>$request->delivering_address,
            'is_insured' => $request->is_insured,
            'action' => $request->action, 
            'total_price'=>$request->total_price,
            'status_id' => $request->status_id,
            'user_id'=>$request->user_id,
            'doctor_id' => $request->doctor_id,
            'pharmacy_id' => $request->pharmacy_id,
            
        ]);
        
        OrderMedicine::where('id', $orderMId)->update([
            'quantity'=>$request->quantity,
            'medicine_id' => $request->medicine_id
            ]);
        return redirect()->route('orders.index');
    }
    public function destroy(){
        $request=request();
        $orderId = $request->order;
        $order = Order::where('id',$orderId);
        $order_med = OrderMedicine::where('order_id', $orderId);
        $order -> delete();
        return redirect()->route('orders.index');
    }
    public function show(OrderMedicine $order){
        return view('orders.show',[
            'order'=>$order,
        ]);
    }

}
