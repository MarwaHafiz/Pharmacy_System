<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Doctor;
use App\pharmacy;
use App\Http\Requests\StoreDoctorRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;
use Hash;
use Auth;

class DoctorController extends Controller
{
    public function index()
    {

        $doctors = Doctor::paginate(5);
        // $doctors = Doctor::all();
    
        return view('doctors.index', [
            'doctors' => $doctors,
        ]);
        
    }

    public function show()
    {
        $request = request();
        $doctorId = $request->doctor;

       
        $doctor = Doctor::find($doctorId);
        $pharmacies = pharmacy::all();
        
        return view('doctors.show',[
            'doctor' => $doctor,
            'pharmacies'=>$pharmacies,
            
        ]);
    }



    public function create()
    {
        $pharmacies = pharmacy::all();

        return view('doctors.create', [
            'pharmacies' => $pharmacies,
        ]);
    }

    public function store(StoreDoctorRequest $request)
    {  
        if($request->hasFile('avatar'))
        {
            $file = $request->file('avatar');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename =time().'.'.$extension;
            Storage::disk('public')->put('doctors/'.$filename, File::get($file));
        } else {
            $filename = 'doctor.jpg';
        }

    

        $doctor= Doctor::create(
            [
            'name' => $request->name,
            'email' =>  $request->email,
            'password' => Hash::make($request->password),
            'national_id'=> $request->national_id,
            'pharmacy_id'=> $request->pharmacy_id,
            'image'=>$filename,
        ]);

        // $role=Role::find(3);
         $doctor->assignRole('doctor');
        return redirect()->route('doctors.index');
    }




    public function edit()
    {
        $request = request();
        $doctorId = $request->doctor;
        $doctor = Doctor::find($doctorId);
        $pharmacies = pharmacy::all();

        return view('doctors.edit',[
            'doctor'=>$doctor,
            'pharmacies'=>$pharmacies,
        ]);

    }
   

    public function update(StoreDoctorRequest $request, $id)
    {
        $doctor = Doctor::find($id);
        $doctor->name= $request->name;
        $doctor->email = $request->email;
        $doctor->national_id= $request->national_id;
        $doctor->password = Hash::make($request->password);
        $pharmacies = pharmacy::all();
       
        $doctor->save();
        return redirect()->route('doctors.index');
    }


    public function destroy()

    {
        $request = request();
        $doctorId = $request->doctor;

       
        Doctor::find($doctorId)->delete();
        return redirect()->route('doctors.index');
    }


    public function ban()
    {

        $request = request();
        $doctorId = $request->doctor;

            $doctor = Doctor::find($doctorId);
            $doctor->ban();
                if($doctor->ban()){
            $doctor->update([
                'ban_flag' => "1"
            ]);
            $doctor->save();
            return redirect()->back();
            
                }
            else{dd('ban failed');}
        
    }

    
    public function unban()
    {
        $request = request();
        $doctorId = $request->doctor;
        
            $doctor = Doctor::find($doctorId);
            if ($doctor->ban_flag){
                $doctor->update([
                    'ban_flag' => "0"
                ]);
                $doctor->save();
            }
            return redirect()->back();
  
    }

   
}