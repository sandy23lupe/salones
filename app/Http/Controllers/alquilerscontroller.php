<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Alquilers;

class alquilerscontroller extends Controller
{
    public function index()
    {
        $alquilers=Alquilers::all();
        return $alquilers;
    }

    public function store(Request $request)
    {
        $alquilers= new Alquilers();
        $alquilers->fe_inicio = $request->fe_inicio;
        $alquilers->fe_entrega = $request->fe_entrega;
        $alquilers->id_empleado = $request->id_empleado;
        $alquilers->id_cliente = $request->id_cliente;
        $alquilers->save();
    }

    public function update(Request $request, $id)
    {
        $alquilers=Alquilers::findorFile($request->id);
        $alquilers->fe_inicio = $request->fe_inicio;
        $alquilers->fe_entrega = $request->fe_entrega;
        $alquilers->id_empleado = $request->id_empleado;
        $alquilers->id_cliente = $request->id_cliente;
        $alquilers->save();
    }

   
    public function destroy(Request $request)
    {
        $alquilers=Alquilers::findorFile($request->id);
        $alquilers->delete();
    }
}
