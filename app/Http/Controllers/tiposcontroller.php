<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tipos;

class tiposcontroller extends Controller
{
  
    public function index(Request $request)
    {
        $buscar=$request->categoria;
        $criterio=$request->critero;

        if ($buscar==''){
            $tipos= Tipos::orderBy('categoria','asc')->paginate(4);
        }else {
            $tipos=Tipos::where($criterio,'like','%'.$buscar.'%')->orderBy('nombre','asc')->paginate(4);
        }

        return[
            'pagination'=>[
                'total'=>$tipos->total(),
                'current_page'=>$tipos->currentPage(),
                'per_page'=>$tipos->perPage(),
                'last_page'=>$tipos->lastPage(),
                'from'=>$tipos->firstItem(),
                'to'=>$tipos->lastItem(),
            ],
            'tipos'=>$tipos
        ];
    }

  
    public function store(Request $request)
    {
        $tipos= new Tipos();
        $tipos->categoria = $request->categoria;
        $tipos->save();
    }

    public function update(Request $request)
    {
        $tipos=Tipos::findOrfail($request->id);
        $tipos->categoria = $request->categoria;
        $tipos->save();
    }
    

   
    public function destroy(Request $request)
    {
        $tipos=Tipos::findOrfail($request->id);
        $tipos->delete();
    } 
}
