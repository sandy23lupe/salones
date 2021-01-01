<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReSalons extends Model
{
    protected $table = 'resalons';   
    protected $fillable=['id','direccion','apellido','tamaño','id_tipos'];
}
