<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.index',[
            'users' => $users,
        ]);
    }

    public function create(){
        $action =route('users.store');
        return view('users.create',[
            'action'=> $action,
        ]);
    }

    public function show(){

        $request=request();
        $userId=$request->user;
        $user = User::find($userId);

        return view('users.show',[
            'user'=>$user,
        ]);
    }

    public function store(UserRequest $request){
        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename =time().'.'.$extension;
            Storage::disk('public')->put('users/'.$filename, File::get($file));
        } else {
            $filename = 'laravel.jpg';
        }

        User::create([
            'name' => $request->name,
            'email' =>  $request->email,
            'password' => Hash::make($request->password),
            'mobile_number' =>  $request->mobile_number,
            'image' =>  $filename,
            'date_of_birth' =>  $request->date_of_birth,
            'national_id' =>  $request->national_id,
            'gender' =>  $request->gender,
        ]);
        //redirect to /Users
        // return view('users.index');
        return redirect()->route('users.index');
    }

    public function destroy(){
        $request=request();
        $userId=$request->user;
        $deleted = User::find($userId)->delete();
        return redirect()->route('users.index');
    }

    public function edit(){

        $request=request();
        $userId=$request->user;
        $user = User::find($userId);
        $action =route('users.update',['user'=>$userId]);

        return view('users.create',[
            'user'=> $user,
            'action'=> $action,

        ]);
    }
    
    public function update(UserRequest $request){

        $request=request();
        $userId=$request->user;
        $user= User::find($userId);

        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename =time().'.'.$extension;
            Storage::disk('public')->put('users/'.$filename, File::get($file));
        } else {
            $filename = 'laravel.jpg';
        }
        
        $user->name = $request->name;
        $user->email =  $request->email;
        $user->password = Hash::make($request->password);
        $user->mobile_number = $request->mobile_number;
        $user->image = $filename;
        $user->date_of_birth =  $request->date_of_birth;
        $user->national_id =$request->national_id;
        $user->gender = $request->gender;

        $user->save();

        //redirect to /posts
        return redirect()->route('users.index');
    }
}
