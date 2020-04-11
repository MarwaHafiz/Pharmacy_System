<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\pharmacy;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class PharmacyController extends Controller
{
    public function index()
    {

        $pharmacies=pharmacy::all();

        return view('pharmacies.index',[
            'pharmacies'=>$pharmacies,
        ]);
        
    }

    public function create(){
        return view ('pharmacies.create');
    }

    public function show(){

        $request = request();//global function return request object
		//dd($request->post);
		$pharmacyId=$request->pharmacy;

		$pharmacy=pharmacy::find($pharmacyId);
	

		return view('pharmacies.show',['pharmacy'=>$pharmacy]);
    }




    public function store(Request $request){
        // $pharmacy=new pharmacy();
        // $pharmacy->created_at=request('created_at');
        // $pharmacy->name=request('name');
        // $pharmacy->email=request('email');
        // $pharmacy->password=request('password');
        // $pharmacy->national_id=request('national_id');
        // $pharmacy->revenue=request('revenue');
        // $pharmacy->image=request('image');
        // $pharmacy->area_id=request('area_id');
        // $pharmacy->save();

        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename =time().'.'.$extension;
            Storage::disk('public')->put('pharmacies/'.$filename, File::get($file));
        } else {
            $filename = 'pharmacy.jpg';
        }


        pharmacy::create([
          

            'created_at'=>$request->created_at,
            'name'=>$request->name,
             'email'=>$request->email,
            'password'=>$request->password,
            'national_id'=>$request->national_id,
            'revenue'=>$request->revenue,
            'image'=>$filename,
            'area_id'=>$request->area_id,
        
        ]);

        return redirect()->route('pharmacies.index');

    }


    public function destroy(){
        $request=request();
        $pharmacyId=$request->pharmacy;
        $pharmacy=pharmacy::find($pharmacyId);
        $pharmacy->delete();
        return redirect()->route('pharmacies.index');
    }




    public function edit()
    {   
        $request=request();
        $pharmacyId= $request->pharmacy;
        $pharmacy=pharmacy::find($pharmacyId);
        return view('pharmacies.edit',[
            'pharmacy'=>$pharmacy,  
        ]);
    }

   


public function update()
{   
  
    $request=request();
   
    $pharmacyId= $request->pharmacy;
    $pharmacy=pharmacy::find($pharmacyId);
    // $pharmacy->created_at=$request->get('created_at');
    $pharmacy->name=$request->get('name');
    $pharmacy->email=$request->get('email');
    $pharmacy->password=$request->get('password');
    $pharmacy->national_id=$request->get('national_id');
    $pharmacy->revenue=$request->get('revenue');
     $pharmacy->image=$request->get('image');
    $pharmacy->area_id=$request->get('area_id');
    $pharmacy->save();
     
    return redirect()->route('pharmacies.index');
}


}
