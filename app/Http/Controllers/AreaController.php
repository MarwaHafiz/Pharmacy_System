<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Area;

class AreaController extends Controller
{
    public function index()
    {

        $areas = Area::paginate(4);
        return view('areas.index', [
            'areas' => $areas,
        ]);
        
    }



    public function show()
    {
        $request = request();
        $areaId = $request->area;

       
        $area = Area::find($areaId);
        
        return view('areas.show',[
            'area' => $area,
            
        ]);
    }

    
    public function create()
    {   
        return view('areas.create');
    }
  

    public function store()
    {
        $request=request();
        $request->validate([
            'name' => 'required',
            'address' => 'required',
        ]);
        Area::create([
            'name'=> $request->name,
            'address'=> $request->address,
        ]);
        return redirect()->route('areas.index');
    }


    public function edit()
    {   
        $request=request();
            $areaId= $request->area;
            $area=Area::find($areaId);
            return view('areas.edit',[
                'area'=>$area,  
            ]);
    }

    
    public function update()
{   
    $request=request();
    $request->validate([
        'name' => 'required',
        'address' => 'required',
    ]);
   
    $areaId= $request->area;
    $area=Area::find($areaId);
    
       $area->name = $request->get('name');
        $area->address = $request->get('address');
        $area->save();
        return redirect()->route('areas.index');
}


    public function destroy()
    {
        $request=request();
        $areaId= $request->area;
        Area::find($areaId)->delete();
        return redirect()->route('areas.index');
    }
   
}
