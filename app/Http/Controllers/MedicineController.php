<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Medicine;

class MedicineController extends Controller
{


    public function index()
    {

        $medicines = Medicine::paginate(4);
        return view('medicines.index', [
            'medicines' => $medicines,
        ]);
        
    }



    public function show()
    {
        $request = request();
        $medicineId = $request->medicine;

       
        $medicine = Medicine::find($medicineId);
        
        return view('medicines.show',[
            'medicine' => $medicine,
            
        ]);
    }



    public function create()
    {   
        return view('medicines.create');
    }
  

    public function store()
    {
        $request=request();
        $request->validate([
            'name' => 'required|unique:medicines|max:255',
            'price' => 'required',
            'type' => 'required',
            'quantity' => 'required',
        ]);
        Medicine::create([
            'name'=> $request->name,
            'quantity'=> $request->quantity,
            'type'=> $request->type,
            'price'=> $request->price,
        ]);
        return redirect()->route('medicines.index');
    }


    public function edit()
    {   
        $request=request();
            $medicineId= $request->medicine;
            $medicine=Medicine::find($medicineId);
            return view('medicines.edit',[
                'medicine'=>$medicine,  
            ]);
    }

    
    public function update()
{   
    $request=request();
    $request->validate([
        'name' => 'required|max:255',
        'price' => 'required',
        'type' => 'required',
        'quantity' => 'required',
    ]);
   
    $medicineId= $request->medicine;
    $medicine=Medicine::find($medicineId);
    
       $medicine->name = $request->get('name');
        $medicine->quantity = $request->get('quantity');
        $medicine->type= $request->get('type');
        $medicine->price= $request->get('price');
        $medicine->save();
        return redirect()->route('medicines.index');
}


    public function destroy()
    {
        $request=request();
        $medicineId= $request->medicine;
        Medicine::find($medicineId)->delete();
        return redirect()->route('medicines.index');
    }
   
}
