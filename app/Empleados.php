<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empleados extends Model
{
    protected $table = 'empleados';   
    protected $fillable=['id','nombre','apellido','cedula','email','tel','cel'];
}
