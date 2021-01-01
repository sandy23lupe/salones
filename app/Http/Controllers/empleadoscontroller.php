<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Empleados;

class empleadoscontroller extends Controller
{
    //mostrar datos de la tabla 
    public function index()
    {
       
        $empleados=Empleados::orderBy('nombre','asc')->get();
        return[
             'empleados'=>$empleados
        ];  
    }

    //guardar datos
    public function store(Request $request)
    {
        $empleados= new Empleados();
        $empleados->nombre = $request->nombre;
        $empleados->apellido = $request->apellido;
        $empleados->cedula = $request->cedula;
        $empleados->email = $request->email;
        $empleados->tel = $request->tel;
        $empleados->cel = $request->cel;
        $empleados->save();
    }

    //actualizar datos
    public function update(Request $request)
    {
        $empleados=Empleados::findOrFail($request->id);
        $empleados->nombre = $request->nombre;
        $empleados->apellido = $request->apellido;
        $empleados->cedula = $request->cedula;
        $empleados->email = $request->email;
        $empleados->tel = $request->tel;
        $empleados->cel = $request->cel;
        $empleados->save();
    }

    //eliminar datos
    public function destroy(Request $request)
    {
        $empleados=Empleados::findOrfail($request->id);
        $empleados->delete();
    }
}
