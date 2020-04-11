<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\DB;
use App\Notifications\UserNotification;

class UserController extends Controller
{
    public function register(UserRequest $request){
        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename =time().'.'.$extension;
            Storage::disk('public')->put('users/'.$filename, File::get($file));
        } else {
            $filename = 'laravel.jpg';
        }

        $user=User::create([
                'name' => $request->name,
                'email' =>  $request->email,
                'password' => Hash::make($request->password),
                'mobile_number' =>  $request->mobile_number,
                'image' =>  $filename,
                'date_of_birth' =>  $request->date_of_birth,
                'national_id' =>  $request->national_id,
                'gender' =>  $request->gender,
            ]);

        
        $details = [
            'greeting' => "Hi $request->name",
            'body' => 'we will send you total price of your order as soon as possible',
            'thanks' => 'Thank you for using our application',
            'actionText' => 'View our site',
            'actionURL' => url('http://http://127.0.0.1:8000/admin/Users'),
            'order_id' => 101
        ];
  
        Notification::send($user, new UserNotification($details));

        return new UserResource($user);
    }

    public function update(Request $request)
    {
        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename =time().'.'.$extension;
            Storage::disk('public')->put('users/'.$filename, File::get($file));
        } else {
            $filename = 'laravel.jpg';
        }
        
        $request->validate([
            'name' => 'required',
            'password' => 'required',
            'mobile_number' => 'required',
            'image' => 'required',
            'date_of_birth' => 'required',
            'national_id' => 'required',
            'gender' => 'required',
        ]);
        // $username=$request->name;
        // dd($request->username);
        $userData= DB::table('users')->where('name',$request->username)->get(); 
        // dd($userData);
        $userId=$userData[0]->id;      
        // $request=request();
        // $userId=$request->user;
        $user= User::find($userId);
        $user->name = $request->name;
        $user->password =  $request->password;
        $user->mobile_number = $request->mobile_number;
        $user->image = $filename;
        $user->date_of_birth =  $request->date_of_birth;
        $user->national_id =$request->national_id;
        $user->gender =$request->gender;

        $user->save();
        return new UserResource($user);
    }
}
