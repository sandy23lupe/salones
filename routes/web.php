<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('contenido/contenido');
});

Route::get('empleados','empleadoscontroller@index');
Route::get('clientes','clientescontroller@index');
Route::get('tipos','tiposcontroller@index');
Route::get('re_salons','re_salonscontroller@index');
Route::get('alquilers','alquilerscontroller@index');
Route::post('/empleados/registrar','empleadoscontroller@store');
Route::post('/clientes/registrar','clientescontroller@store');
Route::post('/tipos/registrar','tiposcontroller@store');
Route::put('/empleados/actualizar','empleadoscontroller@update');
Route::put('/clientes/actualizar','clientescontroller@update');
Route::put('/tipos/actualizar','tiposcontroller@update');

Route::post('/tipos/eliminar','tiposcontroller@destroy');
Route::post('/empleados/eliminar','empleadoscontroller@destroy');
Route::post('/clientes/eliminar','clientescontroller@destroy');

