<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Order;
use App\UserOrder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
// use App\UserAddresses;
use Auth;
use App\Http\Resources\OrderResource;
use App\Http\Resources\UserOrderResource;

class OrderController extends Controller
{
    //get all user orders
    public function index(Request $request){
        $userId=Auth::user()->id;
        //dd($userId);
        return OrderResource::collection(
            Order::where('user_id',$userId)->get()
        );
    }

    //show order
    public function show($order){
        $userId=Auth::user()->id;
        // return  Order::find($order)
        // ?new OrderResource(
        //      Order::find($order)
        //  ) : 'not exist';

        return  Order::where(['user_id'=>$userId,'id'=>$order])->get()
          ?  OrderResource::collection(
            Order::where(['user_id'=>$userId,'id'=>$order])->get()
        ): 'not exist';
    }

    public function store(Request $request)
    {
        $request->validate([
            'Is_insured' => 'required',
            'image' => 'required',
            'delivering_address_id' => 'required',
        ]);

        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename =time().'.'.$extension;
            Storage::disk('public')->put('orders/'.$filename, File::get($file));
        } else {
            $filename = 'laravel.jpg';
        }

        $order=Order::create([
            'user_id'=>Auth::user()->id,
            'is_insured' => $request->Is_insured,
        ]);
        
        // dd($order->id);
        // $images=$request->file('images');

        //  dd($images);

        // dd($userData[0]->id);
        // foreach($images as $image){
        $userorder = UserOrder::create([
            'user_address_id'=> $request->delivering_address_id,
            'order_id'=>$order->id,
            'image' => $filename,
        ]);
        // }
        return new UserOrderResource($userorder);
    }
}

