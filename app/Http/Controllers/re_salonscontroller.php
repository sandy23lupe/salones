<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ReSalons;

class re_salonscontroller extends Controller
{
 
    public function index()
    {
        $re_salons=ReSalons::all();
        return $re_salons;
    }

    public function store(Request $request)
    {
        $re_salons= new ReSalons();
        $re_salons->direccion = $request->direccion;
        $re_salons->tamaño = $request->tamaño;
        $re_salons->id_tipos = $request->cedula;
        $re_salons->save();
    }

   
    public function update(Request $request, $id)
    {
        $re_salons= ReSalons::findorFile($request->id);
        $re_salons->direccion = $request->direccion;
        $re_salons->tamaño = $request->tamaño;
        $re_salons->id_tipos = $request->cedul;
        $re_salons->save();
    }

    public function destroy(Request $request)
    {
        $re_salons=ReSalons::findorFile($request->id);
        $re_salons->delete();
    }
}
