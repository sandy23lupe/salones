<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Clientes;

class clientescontroller extends Controller
{
    
    public function index()
    {
        
        
        $clientes=Clientes::orderBy('nombre','asc')->get();
        return [
            'clientes'=>$clientes
            
        ];
    }

    public function store(Request $request)
    {
        $clientes= new Clientes();
        $clientes->nombre = $request->nombre;
        $clientes->apellido = $request->apellido;
        $clientes->cedula = $request->cedula;
        $clientes->email = $request->email;
        $clientes->tel = $request->tel;
        $clientes->cel = $request->cel;
        $clientes->save();
    }
    

    public function update(Request $request)
    {
        $clientes=Clientes::findOrfail($request->id);
        $clientes->nombre = $request->nombre;
        $clientes->apellido = $request->apellido;
        $clientes->cedula = $request->cedula;
        $clientes->email = $request->email;
        $clientes->tel = $request->tel;
        $clientes->cel = $request->cel;
        $clientes->save();
    }

 
    public function destroy(Request $request)
    {
        $clientes=Clientes::findOrfail($request->id);
        $clientes->delete();
    }
}
