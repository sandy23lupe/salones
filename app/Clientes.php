<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clientes extends Model
{
    protected $table = 'clientes';   
    protected $fillable=['id','nombre','apellido','cedula','email','te','cel'];
}
